<?php
/**
 * Title: O mnie (PL)
 * Slug: kacper-portfolio/about-pl
 * Categories: text
 * Inserter: no
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$contact_page = get_page_by_path( 'kontakt' );
$contact_id = $contact_page && function_exists( 'pll_get_post' ) ? pll_get_post( $contact_page->ID, 'pl' ) : 0;
$contact_url = $contact_id ? get_permalink( $contact_id ) : home_url( '/pl/skontaktuj-sie/' );
$projects_url = get_post_type_archive_link( 'project' );
if ( has_filter( 'wpml_permalink' ) ) {
    $projects_url = apply_filters( 'wpml_permalink', $projects_url, 'pl' );
}
?>
<!-- wp:group {"className":"about-story"} -->
<div class="wp-block-group about-story"><!-- wp:group {"tagName":"section","className":"about-hero"} -->
<section class="wp-block-group about-hero">
<!-- wp:image {"id":24,"sizeSlug":"full","linkDestination":"none","className":"about-portrait"} -->
<figure class="wp-block-image size-full about-portrait"><img src="<?php echo esc_url( wp_get_attachment_image_url( 24, 'full' ) ); ?>" alt="Kacper Koszarski" class="wp-image-24" /></figure>
<!-- /wp:image -->
<!-- wp:group {"className":"about-hero__body"} -->
<div class="wp-block-group about-hero__body">
<!-- wp:heading {"level":1,"className":"about-hero__greeting"} -->
<h1 class="wp-block-heading about-hero__greeting">Cześć, jestem <strong>Kacper</strong>.</h1>
<!-- /wp:heading -->
<!-- wp:group {"className":"about-hero__bio"} -->
<div class="wp-block-group about-hero__bio">
<!-- wp:paragraph -->
<p>Lubię tworzyć aplikacje, które łączą design, funkcjonalność i technologię. Sprawia mi przyjemność realizowanie własnych pomysłów, rozwiązywanie problemów i obserwowanie, jak pierwsza koncepcja zamienia się w coś, co naprawdę działa.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>Obecnie studiuję <strong>informatykę medialną</strong> na HTWK Leipzig i jestem na końcowym etapie studiów pierwszego stopnia. Dotychczasowe projekty pozwoliły mi zdobyć praktyczne doświadczenie. Nauczyłem się samodzielnie podchodzić do zadań, sprawdzać różne rozwiązania i poznawać nowe zagadnienia.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>Teraz chcę wykorzystać swoją wiedzę w środowisku zawodowym i wspólnie z innymi pracować nad ciekawymi projektami. Szczególnie cieszę się na możliwość wymiany doświadczeń z bardziej doświadczonymi programistami, podejmowania nowych wyzwań, brania odpowiedzialności i dalszego rozwoju.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-hero__facts"} -->
<div class="wp-block-group about-hero__facts">
<!-- wp:group {"className":"about-hero-fact about-hero-fact\u002d\u002dlocation"} -->
<div class="wp-block-group about-hero-fact about-hero-fact--location">
<!-- wp:paragraph {"className":"about-hero-fact__value"} -->
<p class="about-hero-fact__value">Lipsk</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"about-hero-fact__caption"} -->
<p class="about-hero-fact__caption">Gdzie mieszkam</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-hero-fact about-hero-fact\u002d\u002dage"} -->
<div class="wp-block-group about-hero-fact about-hero-fact--age">
<!-- wp:paragraph {"className":"about-hero-fact__value","metadata":{"bindings":{"content":{"source":"kacper-portfolio/age","args":{"language":"pl"}}}}} -->
<p class="about-hero-fact__value"><?php echo esc_html( kacper_portfolio_age_label( kacper_portfolio_age_in_years(), 'pl' ) ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"about-hero-fact__caption"} -->
<p class="about-hero-fact__caption">Mój wiek</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-hero-fact about-hero-fact\u002d\u002deducation"} -->
<div class="wp-block-group about-hero-fact about-hero-fact--education">
<!-- wp:paragraph {"className":"about-hero-fact__value"} -->
<p class="about-hero-fact__value">HTWK Leipzig</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"about-hero-fact__caption"} -->
<p class="about-hero-fact__caption">Moja uczelnia</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-hero-fact about-hero-fact\u002d\u002dorigin"} -->
<div class="wp-block-group about-hero-fact about-hero-fact--origin">
<!-- wp:paragraph {"className":"about-hero-fact__value"} -->
<p class="about-hero-fact__value">Polska</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"about-hero-fact__caption"} -->
<p class="about-hero-fact__caption">Skąd pochodzę</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-hero-fact about-hero-fact\u002d\u002dstudies"} -->
<div class="wp-block-group about-hero-fact about-hero-fact--studies">
<!-- wp:paragraph {"className":"about-hero-fact__value"} -->
<p class="about-hero-fact__value">Informatyka medialna</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"about-hero-fact__caption"} -->
<p class="about-hero-fact__caption">Studia I stopnia · Końcowy etap</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-hero-fact about-hero-fact\u002d\u002dlanguages"} -->
<div class="wp-block-group about-hero-fact about-hero-fact--languages">
<!-- wp:paragraph {"className":"about-hero-fact__value"} -->
<p class="about-hero-fact__value">Polski, niemiecki, angielski</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"about-hero-fact__caption"} -->
<p class="about-hero-fact__caption">W mowie i piśmie</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</section>
<!-- /wp:group -->
<!-- wp:group {"tagName":"section","className":"about-section about-interests","anchor":"zainteresowania"} -->
<section id="zainteresowania" class="wp-block-group about-section about-interests">
<!-- wp:group {"className":"about-section-heading"} -->
<div class="wp-block-group about-section-heading">
<!-- wp:heading -->
<h2 class="wp-block-heading">Co mnie interesuje.</h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"about-interests__intro"} -->
<p class="about-interests__intro">Interesuje mnie, jak technologia i projektowanie łączą się w aplikacjach, które są przydatne w codziennym życiu.</p>
<!-- /wp:paragraph -->
<!-- wp:buttons {"className":"about-interests__actions"} -->
<div class="wp-block-buttons about-interests__actions">
<!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( $projects_url ); ?>">Zobacz moje projekty</a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-interests__list"} -->
<div class="wp-block-group about-interests__list">
<!-- wp:group {"className":"about-interest about-interest\u002d\u002dweb"} -->
<div class="wp-block-group about-interest about-interest--web">
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Aplikacje webowe</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Tworzenie aplikacji internetowych i realizowanie własnych pomysłów, na przykład z wykorzystaniem Laravel i WordPressa.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-interest about-interest\u002d\u002dinterfaces"} -->
<div class="wp-block-group about-interest about-interest--interfaces">
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Frontend i interfejsy</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Projektowanie interfejsów i dbanie o to, żeby aplikacje były przejrzyste oraz proste w obsłudze.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-interest about-interest\u002d\u002ddata"} -->
<div class="wp-block-group about-interest about-interest--data">
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Dane i automatyzacja</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Upraszczanie procesów i powtarzalnych zadań za pomocą baz danych, API i automatyzacji.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-interest about-interest\u002d\u002dpractice"} -->
<div class="wp-block-group about-interest about-interest--practice">
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Projekty i praktyka</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Sprawdzanie różnych technologii we własnych projektach i wykorzystywanie zdobytej wiedzy w praktyce.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","className":"about-section about-process","anchor":"jak-pracuje"} -->
<section id="jak-pracuje" class="wp-block-group about-section about-process">
<!-- wp:group {"className":"about-process__intro"} -->
<div class="wp-block-group about-process__intro">
<!-- wp:heading -->
<h2 class="wp-block-heading">Jak<br>pracuję.</h2>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Od pierwszego pomysłu do gotowego rozwiązania pracuję w sposób uporządkowany i skupiony na celu. Staram się przekładać złożone wymagania na proste, przemyślane rozwiązania.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-process__steps"} -->
<div class="wp-block-group about-process__steps">
<!-- wp:group {"className":"about-process__step"} -->
<div class="wp-block-group about-process__step">
<!-- wp:paragraph {"className":"about-process__number"} -->
<p class="about-process__number">01</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Rozumiem.</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Zaczynam od dokładnego zrozumienia problemu, wymagań i kontekstu.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-process__step"} -->
<div class="wp-block-group about-process__step">
<!-- wp:paragraph {"className":"about-process__number"} -->
<p class="about-process__number">02</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Planuję.</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Porządkuję informacje, planuję rozwiązanie i ustalam kolejne kroki.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-process__step"} -->
<div class="wp-block-group about-process__step">
<!-- wp:paragraph {"className":"about-process__number"} -->
<p class="about-process__number">03</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Tworzę.</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Krok po kroku buduję działające rozwiązanie, dbając o przejrzystą strukturę.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-process__step"} -->
<div class="wp-block-group about-process__step">
<!-- wp:paragraph {"className":"about-process__number"} -->
<p class="about-process__number">04</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Ulepszam.</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Na koniec testuję aplikację, dopracowuję szczegóły i wprowadzam usprawnienia.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-process__goal"} -->
<div class="wp-block-group about-process__goal">
<!-- wp:paragraph {"className":"about-eyebrow"} -->
<p class="about-eyebrow">Cel</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"about-process__result"} -->
<p class="about-process__result">Przejrzyste, działające i przemyślane rozwiązanie.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</section>
<!-- /wp:group -->
<!-- wp:group {"tagName":"section","className":"about-section about-skills","anchor":"skills"} -->
<section id="skills" class="wp-block-group about-section about-skills">
<!-- wp:group {"className":"about-section-heading"} -->
<div class="wp-block-group about-section-heading">
<!-- wp:heading -->
<h2 class="wp-block-heading">Technologie,<br>z których korzystam.</h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"about-skills__intro"} -->
<p class="about-skills__intro">Z tych technologii korzystam we własnych projektach, na studiach i w praktyce.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-skills__rows"} -->
<div class="wp-block-group about-skills__rows">
<!-- wp:group {"className":"about-skills__row"} -->
<div class="wp-block-group about-skills__row">
<!-- wp:heading {"level":3,"className":"about-skills__label"} -->
<h3 class="wp-block-heading about-skills__label">Frontend i backend</h3>
<!-- /wp:heading -->
<!-- wp:group {"className":"about-skills__viewport"} -->
<div class="wp-block-group about-skills__viewport">
<!-- wp:group {"className":"about-skills__track"} -->
<div class="wp-block-group about-skills__track">
<!-- wp:list {"className":"about-skills__items"} -->
<ul class="wp-block-list about-skills__items">
<!-- wp:list-item -->
<li><img src="<?php echo esc_url( get_theme_file_uri( '/assets/icons/skills/html.svg' ) ); ?>" alt="" width="36" height="36" />HTML</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><img src="<?php echo esc_url( get_theme_file_uri( '/assets/icons/skills/css.svg' ) ); ?>" alt="" width="36" height="36" />CSS</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><img src="<?php echo esc_url( get_theme_file_uri( '/assets/icons/skills/javascript.svg' ) ); ?>" alt="" width="36" height="36" />JavaScript</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><img src="<?php echo esc_url( get_theme_file_uri( '/assets/icons/skills/wordpress.svg' ) ); ?>" alt="" width="36" height="36" />WordPress</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><img src="<?php echo esc_url( get_theme_file_uri( '/assets/icons/skills/laravel.svg' ) ); ?>" alt="" width="36" height="36" />Laravel</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><img src="<?php echo esc_url( get_theme_file_uri( '/assets/icons/skills/python.svg' ) ); ?>" alt="" width="36" height="36" />Python</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><img src="<?php echo esc_url( get_theme_file_uri( '/assets/icons/skills/java.svg' ) ); ?>" alt="" width="36" height="36" />Java</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><img src="<?php echo esc_url( get_theme_file_uri( '/assets/icons/skills/csharp.svg' ) ); ?>" alt="" width="36" height="36" />C#</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><img src="<?php echo esc_url( get_theme_file_uri( '/assets/icons/skills/sql.svg' ) ); ?>" alt="" width="36" height="36" />SQL</li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-skills__row"} -->
<div class="wp-block-group about-skills__row">
<!-- wp:heading {"level":3,"className":"about-skills__label"} -->
<h3 class="wp-block-heading about-skills__label">Narzędzia i systemy</h3>
<!-- /wp:heading -->
<!-- wp:group {"className":"about-skills__viewport"} -->
<div class="wp-block-group about-skills__viewport">
<!-- wp:group {"className":"about-skills__track"} -->
<div class="wp-block-group about-skills__track">
<!-- wp:list {"className":"about-skills__items"} -->
<ul class="wp-block-list about-skills__items">
<!-- wp:list-item -->
<li><img src="<?php echo esc_url( get_theme_file_uri( '/assets/icons/skills/docker.svg' ) ); ?>" alt="" width="36" height="36" />Docker</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><img src="<?php echo esc_url( get_theme_file_uri( '/assets/icons/skills/linux.svg' ) ); ?>" alt="" width="36" height="36" />Linux</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><img src="<?php echo esc_url( get_theme_file_uri( '/assets/icons/skills/zabbix.svg' ) ); ?>" alt="" width="36" height="36" />Zabbix</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><img src="<?php echo esc_url( get_theme_file_uri( '/assets/icons/skills/grafana.svg' ) ); ?>" alt="" width="36" height="36" />Grafana</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><img src="<?php echo esc_url( get_theme_file_uri( '/assets/icons/skills/postgresql.svg' ) ); ?>" alt="" width="36" height="36" />PostgreSQL</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><img class="skill-icon--mono" src="<?php echo esc_url( get_theme_file_uri( '/assets/icons/skills/timescaledb.svg' ) ); ?>" alt="" width="36" height="36" />TimescaleDB</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><img src="<?php echo esc_url( get_theme_file_uri( '/assets/icons/skills/fastapi.svg' ) ); ?>" alt="" width="36" height="36" />FastAPI</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><img src="<?php echo esc_url( get_theme_file_uri( '/assets/icons/skills/nginx.svg' ) ); ?>" alt="" width="36" height="36" />Nginx</li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-skills__row"} -->
<div class="wp-block-group about-skills__row">
<!-- wp:heading {"level":3,"className":"about-skills__label"} -->
<h3 class="wp-block-heading about-skills__label">Design i 3D</h3>
<!-- /wp:heading -->
<!-- wp:group {"className":"about-skills__viewport"} -->
<div class="wp-block-group about-skills__viewport">
<!-- wp:group {"className":"about-skills__track"} -->
<div class="wp-block-group about-skills__track">
<!-- wp:list {"className":"about-skills__items"} -->
<ul class="wp-block-list about-skills__items">
<!-- wp:list-item -->
<li><img src="<?php echo esc_url( get_theme_file_uri( '/assets/icons/skills/figma.svg' ) ); ?>" alt="" width="36" height="36" />Figma</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><img src="<?php echo esc_url( get_theme_file_uri( '/assets/icons/skills/canva.svg' ) ); ?>" alt="" width="36" height="36" />Canva</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><img src="<?php echo esc_url( get_theme_file_uri( '/assets/icons/skills/blender.svg' ) ); ?>" alt="" width="36" height="36" />Blender</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><img class="skill-icon--mono" src="<?php echo esc_url( get_theme_file_uri( '/assets/icons/skills/unity.svg' ) ); ?>" alt="" width="36" height="36" />Unity</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><img src="<?php echo esc_url( get_theme_file_uri( '/assets/icons/skills/photoshop.svg' ) ); ?>" alt="" width="36" height="36" />Photoshop</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><img src="<?php echo esc_url( get_theme_file_uri( '/assets/icons/skills/illustrator.svg' ) ); ?>" alt="" width="36" height="36" />Illustrator</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><img src="<?php echo esc_url( get_theme_file_uri( '/assets/icons/skills/premierepro.svg' ) ); ?>" alt="" width="36" height="36" />Premiere Pro</li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-skills__row"} -->
<div class="wp-block-group about-skills__row">
<!-- wp:heading {"level":3,"className":"about-skills__label"} -->
<h3 class="wp-block-heading about-skills__label">Pozostałe narzędzia</h3>
<!-- /wp:heading -->
<!-- wp:group {"className":"about-skills__viewport"} -->
<div class="wp-block-group about-skills__viewport">
<!-- wp:group {"className":"about-skills__track"} -->
<div class="wp-block-group about-skills__track">
<!-- wp:list {"className":"about-skills__items"} -->
<ul class="wp-block-list about-skills__items">
<!-- wp:list-item -->
<li><img src="<?php echo esc_url( get_theme_file_uri( '/assets/icons/skills/vscode.svg' ) ); ?>" alt="" width="36" height="36" />VS Code</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><img src="<?php echo esc_url( get_theme_file_uri( '/assets/icons/skills/git.svg' ) ); ?>" alt="" width="36" height="36" />Git</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><img class="skill-icon--mono" src="<?php echo esc_url( get_theme_file_uri( '/assets/icons/skills/github.svg' ) ); ?>" alt="" width="36" height="36" />GitHub</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><img class="skill-icon--mono" src="<?php echo esc_url( get_theme_file_uri( '/assets/icons/skills/notion.svg' ) ); ?>" alt="" width="36" height="36" />Notion</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><img src="<?php echo esc_url( get_theme_file_uri( '/assets/icons/skills/proxmox.svg' ) ); ?>" alt="" width="36" height="36" />Proxmox</li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</section>
<!-- /wp:group -->





<!-- wp:group {"tagName":"section","className":"about-section about-personal"} -->
<section class="wp-block-group about-section about-personal">
<!-- wp:group {"className":"about-personal__intro"} -->
<div class="wp-block-group about-personal__intro">
<!-- wp:heading -->
<h2 class="wp-block-heading">Poza kodem.</h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"about-personal__statement"} -->
<p class="about-personal__statement">Technologia. Kreatywność.<br>I wszystko pomiędzy.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-personal__copy"} -->
<div class="wp-block-group about-personal__copy"><!-- wp:paragraph -->
<p>Poza studiami też chętnie zajmuję się technologią i mediami cyfrowymi. Interesują mnie nowe technologie, gry, filmy i seriale. Lubię również sprawdzać nowe oprogramowanie i produkty cyfrowe.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>To właśnie połączenie technologii, kreatywności i mediów cyfrowych jest jednym z powodów, dla których wybrałem informatykę medialną.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
</section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","className":"about-section about-contact"} -->
<section class="wp-block-group about-section about-contact">
<!-- wp:heading -->
<h2 class="wp-block-heading">Masz ochotę na współpracę?</h2>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Masz pomysł, ciekawy projekt albo chcesz wymienić się doświadczeniami? Chętnie przeczytam Twoją wiadomość.</p>
<!-- /wp:paragraph -->
<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"about-contact__link"} -->
<div class="wp-block-button about-contact__link"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( $contact_url ); ?>">Napisz do mnie <span aria-hidden="true">↗</span></a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</section>
<!-- /wp:group --></div>
<!-- /wp:group -->
