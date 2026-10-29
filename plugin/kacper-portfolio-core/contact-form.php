<?php
/** Direct contact using WordPress mail, without storing messages in the database. */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function kacper_portfolio_contact_labels( $language ) {
	$labels = array(
		'de' => array(
			'name' => 'Dein Name', 'email' => 'E-Mail-Adresse', 'phone' => 'Telefonnummer (optional)', 'message' => 'Nachricht', 'send' => 'Nachricht senden',
			'invalid' => 'Bitte überprüfe die markierten Felder.', 'name_error' => 'Bitte gib deinen Namen ein (max. 100 Zeichen).',
			'email_error' => 'Bitte gib eine gültige E-Mail-Adresse ein.', 'phone_error' => 'Bitte überprüfe die Telefonnummer (max. 40 Zeichen).',
			'message_error' => 'Bitte gib eine Nachricht ein (max. 5000 Zeichen).',
			'expired' => 'Bitte lade die Seite neu und versuche es noch einmal.', 'limited' => 'Bitte warte eine Minute, bevor du erneut eine Nachricht sendest.',
			'failed' => 'Deine Nachricht konnte nicht gesendet werden. Deine Eingaben bleiben erhalten. Du kannst mir direkt eine E-Mail schreiben:',
			'sent' => 'Danke für deine Nachricht! Ich melde mich so schnell wie möglich bei dir.',
		),
		'en' => array(
			'name' => 'Your name', 'email' => 'Email address', 'phone' => 'Phone number (optional)', 'message' => 'Message', 'send' => 'Send message',
			'invalid' => 'Please check the highlighted fields.', 'name_error' => 'Please enter your name (max. 100 characters).',
			'email_error' => 'Please enter a valid email address.', 'phone_error' => 'Please check your phone number (max. 40 characters).',
			'message_error' => 'Please enter a message (max. 5000 characters).',
			'expired' => 'Please reload the page and try again.', 'limited' => 'Please wait a minute before sending another message.',
			'failed' => 'Your message could not be sent. Your entries have been kept. You can email me directly:',
			'sent' => 'Thank you for your message! I’ll get back to you as soon as I can.',
		),
		'pl' => array(
			'name' => 'Twoje imię', 'email' => 'Adres e-mail', 'phone' => 'Numer telefonu (opcjonalnie)', 'message' => 'Wiadomość', 'send' => 'Wyślij wiadomość',
			'invalid' => 'Sprawdź zaznaczone pola.', 'name_error' => 'Wpisz swoje imię (maks. 100 znaków).',
			'email_error' => 'Wpisz poprawny adres e-mail.', 'phone_error' => 'Sprawdź numer telefonu (maks. 40 znaków).',
			'message_error' => 'Wpisz wiadomość (maks. 5000 znaków).',
			'expired' => 'Odśwież stronę i spróbuj ponownie.', 'limited' => 'Odczekaj minutę przed wysłaniem kolejnej wiadomości.',
			'failed' => 'Nie udało się wysłać wiadomości. Wpisany tekst został zachowany. Możesz napisać do mnie bezpośrednio:',
			'sent' => 'Dziękuję za wiadomość! Odpowiem tak szybko, jak będę mógł.',
		),
	);
	return $labels[ $language ] ?? $labels['de'];
}

/** Validate first; keep the recipient fixed and visitor email only in Reply-To. */
function kacper_portfolio_contact_submit( $data, $page_id ) {
	$result = array( 'status' => 'invalid', 'values' => array(), 'errors' => array() );
	$limits = array( 'name' => 100, 'email' => 254, 'phone' => 40, 'message' => 5000 );
	foreach ( $limits as $field => $limit ) {
		$raw = isset( $data[ $field ] ) && is_string( $data[ $field ] ) ? trim( $data[ $field ] ) : '';
		$value = 'message' === $field ? sanitize_textarea_field( $raw ) : sanitize_text_field( $raw );
		$result['values'][ $field ] = mb_substr( $value, 0, $limit );
		if ( mb_strlen( $raw ) > $limit || ( 'phone' !== $field && '' === $value ) || ( 'email' === $field && ! is_email( $raw ) ) ) {
			$result['errors'][] = $field;
		}
	}
	$nonce = isset( $data['contact_nonce'] ) && is_string( $data['contact_nonce'] ) ? $data['contact_nonce'] : '';
	if ( ! wp_verify_nonce( $nonce, 'portfolio_contact_' . $page_id ) || ! empty( $data['website'] ) ) {
		$result['status'] = 'expired';
		return $result;
	}
	if ( $result['errors'] ) {
		return $result;
	}
	// Only a salted hash is stored, never the visitor's address or message.
	$rate_key = 'portfolio_contact_' . hash_hmac( 'sha256', $_SERVER['REMOTE_ADDR'] ?? 'unknown', wp_salt( 'nonce' ) );
	if ( get_transient( $rate_key ) ) {
		$result['status'] = 'limited';
		return $result;
	}
	set_transient( $rate_key, 1, MINUTE_IN_SECONDS );
	$values = $result['values'];
	$body = "Name: {$values['name']}\nE-Mail: {$values['email']}\nTelefon: {$values['phone']}\n\n{$values['message']}";
	$sent = wp_mail( 'koszarski.kacper@gmail.com', 'Portfolio: Kontakt', $body, array( 'Reply-To: ' . $values['email'] ) );
	$result['status'] = $sent ? 'sent' : 'failed';
	return $result;
}

/** A regular POST also works without JavaScript; errors preserve the typed message. */
function kacper_portfolio_contact_handle_request() {
	if ( ! is_page_template( 'contact' ) || ! has_shortcode( get_post_field( 'post_content', get_queried_object_id() ), 'portfolio_contact_form' ) ) {
		return;
	}
	// Nonces and submission feedback must not be cached.
	nocache_headers();
	if ( 'POST' !== ( $_SERVER['REQUEST_METHOD'] ?? '' ) || 'portfolio_contact' !== ( $_POST['contact_action'] ?? '' ) ) {
		return;
	}
	$data = wp_unslash( $_POST );
	foreach ( array( 'name', 'email', 'phone', 'message' ) as $field ) {
		$data[ $field ] = $data[ 'contact_' . $field ] ?? '';
	}
	$GLOBALS['portfolio_contact_result'] = kacper_portfolio_contact_submit( $data, get_queried_object_id() );
	if ( 'sent' === $GLOBALS['portfolio_contact_result']['status'] ) {
		wp_safe_redirect( add_query_arg( 'contact', 'sent', get_permalink() ) . '#contact-form', 303 );
		exit;
	}
}
add_action( 'template_redirect', 'kacper_portfolio_contact_handle_request' );

function kacper_portfolio_contact_form( $attributes ) {
	$attributes = shortcode_atts( array( 'language' => 'de' ), $attributes, 'portfolio_contact_form' );
	$labels = kacper_portfolio_contact_labels( $attributes['language'] );
	$result = $GLOBALS['portfolio_contact_result'] ?? array( 'status' => '', 'values' => array(), 'errors' => array() );
	if ( 'sent' === ( $_GET['contact'] ?? '' ) && '' === $result['status'] ) {
		$result['status'] = 'sent';
	}
	ob_start();
	?>
	<form class="contact-form" id="contact-form" action="<?php echo esc_url( get_permalink() . '#contact-form' ); ?>" method="post" aria-label="<?php echo esc_attr( $labels['send'] ); ?>">
		<?php if ( isset( $labels[ $result['status'] ] ) ) : ?>
			<p class="contact-form__notice" role="<?php echo 'sent' === $result['status'] ? 'status' : 'alert'; ?>" tabindex="-1" autofocus>
				<?php echo esc_html( $labels[ $result['status'] ] ); ?>
				<?php if ( 'failed' === $result['status'] ) : ?>
					<a href="mailto:koszarski.kacper@gmail.com">koszarski.kacper@gmail.com</a>
				<?php endif; ?>
			</p>
		<?php endif; ?>
		<?php foreach ( array( 'name' => array( 'text', 'name', 100 ), 'email' => array( 'email', 'email', 254 ), 'phone' => array( 'tel', 'tel', 40 ), 'message' => array( 'textarea', '', 5000 ) ) as $field => $settings ) : ?>
			<div class="contact-form__field">
				<label for="contact-<?php echo esc_attr( $field ); ?>"><?php echo esc_html( $labels[ $field ] ); ?></label>
				<?php
				$error = in_array( $field, $result['errors'], true );
				$common = ' id="contact-' . esc_attr( $field ) . '" name="contact_' . esc_attr( $field ) . '" maxlength="' . $settings[2] . '"';
				$common .= 'phone' !== $field ? ' required' : '';
				$common .= $error ? ' aria-invalid="true" aria-describedby="contact-' . esc_attr( $field ) . '-error"' : '';
				if ( 'textarea' === $settings[0] ) {
					echo '<textarea' . $common . ' rows="4">' . esc_textarea( $result['values'][ $field ] ?? '' ) . '</textarea>';
				} else {
					echo '<input' . $common . ' type="' . esc_attr( $settings[0] ) . '" autocomplete="' . esc_attr( $settings[1] ) . '" value="' . esc_attr( $result['values'][ $field ] ?? '' ) . '">';
				}
				?>
				<?php if ( $error ) : ?>
					<p class="contact-form__error" id="contact-<?php echo esc_attr( $field ); ?>-error"><?php echo esc_html( $labels[ $field . '_error' ] ); ?></p>
				<?php endif; ?>
			</div>
		<?php endforeach; ?>
		<div class="contact-form__trap" aria-hidden="true" inert>
			<label for="contact-website">Website</label><input id="contact-website" name="website" type="text" tabindex="-1" autocomplete="off">
		</div>
		<?php wp_nonce_field( 'portfolio_contact_' . get_queried_object_id(), 'contact_nonce', false ); ?>
		<input type="hidden" name="contact_action" value="portfolio_contact">
		<button class="contact-form__submit" type="submit"><?php echo esc_html( $labels['send'] ); ?> <span aria-hidden="true">→</span></button>
	</form>
	<?php
	return ob_get_clean();
}
add_shortcode( 'portfolio_contact_form', 'kacper_portfolio_contact_form' );
