<?php
/**
 * Computed age for the native paragraph in the About hero.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function kacper_portfolio_age_in_years( ?DateTimeImmutable $today = null ) {
	$today    = $today ?? current_datetime();
	$birthday = new DateTimeImmutable( '1999-11-21', $today->getTimezone() );
	return (int) $birthday->diff( $today )->format( '%r%y' );
}

function kacper_portfolio_age_label( int $age, string $language = 'de' ) {
	if ( 'en' === $language ) {
		return $age . ( 1 === $age ? ' year old' : ' years old' );
	}
	if ( 'pl' === $language ) {
		$suffix = 1 === $age ? 'rok' : ( in_array( $age % 10, array( 2, 3, 4 ), true ) && ! in_array( $age % 100, array( 12, 13, 14 ), true ) ? 'lata' : 'lat' );
		return $age . ' ' . $suffix;
	}
	return $age . ( 1 === $age ? ' Jahr' : ' Jahre' );
}

add_action( 'init', function () {
	register_block_bindings_source( 'kacper-portfolio/age', array(
		'label'              => 'Alter (automatisch)',
		'get_value_callback' => static function ( $source_args ) {
			$language = $source_args['language'] ?? ( function_exists( 'pll_current_language' ) ? pll_current_language() : 'de' );
			return esc_html( kacper_portfolio_age_label( kacper_portfolio_age_in_years(), is_string( $language ) ? $language : 'de' ) );
		},
	) );
} );
