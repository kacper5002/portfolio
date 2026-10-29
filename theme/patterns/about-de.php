<?php
/**
 * Title: Über mich – Editorial
 * Slug: kacper-portfolio/about-de
 * Categories: text
 * Description: Deutsche Über-mich-Seite mit editierbaren nativen Blöcken.
 * Inserter: false
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$contact_page = get_page_by_path( 'kontakt' );
$contact_url = $contact_page ? get_permalink( $contact_page ) : home_url( '/kontakt/' );

?>
<!-- wp:group {"className":"about-story"} -->
<div class="wp-block-group about-story">
<!-- wp:group {"tagName":"section","className":"about-hero"} -->
<section class="wp-block-group about-hero">
<!-- wp:image {"id":24,"sizeSlug":"full","linkDestination":"none","className":"about-portrait"} -->
<figure class="wp-block-image size-full about-portrait"><img src="<?php echo esc_url( wp_get_attachment_image_url( 24, 'full' ) ); ?>" alt="Kacper Koszarski" class="wp-image-24" /></figure>
<!-- /wp:image -->
<!-- wp:group {"className":"about-hero__body"} -->
<div class="wp-block-group about-hero__body">
<!-- wp:heading {"level":1,"className":"about-hero__greeting"} -->
<h1 class="wp-block-heading about-hero__greeting">Hi, ich bin <strong>Kacper</strong>.</h1>
<!-- /wp:heading -->
<!-- wp:group {"className":"about-hero__bio"} -->
<div class="wp-block-group about-hero__bio">
<!-- wp:paragraph -->
<p>Ich entwickle gerne digitale Anwendungen, bei denen Design, Funktionalität und Technik zusammenkommen. Mir macht es Spaß, eigene Ideen umzusetzen, Herausforderungen zu lösen und am Ende zu sehen, wie aus einer ersten Überlegung etwas Funktionierendes entsteht.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>Aktuell studiere ich <strong>Medieninformatik</strong> an der HTWK Leipzig und befinde mich in der Abschlussphase meines Bachelors. Durch meine bisherigen Projekte konnte ich bereits praktische Erfahrungen sammeln und habe gelernt, Aufgaben eigenständig anzugehen, verschiedene Lösungswege auszuprobieren und mich in neue Themen einzuarbeiten.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>Jetzt möchte ich meine Kenntnisse in einem professionellen Umfeld einbringen und gemeinsam mit anderen an spannenden Projekten arbeiten. Dabei freue ich mich besonders auf den Austausch mit erfahrenen Entwicklern, neue Herausforderungen und die Möglichkeit, Verantwortung zu übernehmen und mich weiterzuentwickeln.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-hero__facts"} -->
<div class="wp-block-group about-hero__facts">
<!-- wp:group {"className":"about-hero-fact about-hero-fact--location"} -->
<div class="wp-block-group about-hero-fact about-hero-fact--location">
<!-- wp:paragraph {"className":"about-hero-fact__value"} -->
<p class="about-hero-fact__value">Leipzig</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"about-hero-fact__caption"} -->
<p class="about-hero-fact__caption">Mein Standort</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-hero-fact about-hero-fact--age"} -->
<div class="wp-block-group about-hero-fact about-hero-fact--age">
<!-- wp:paragraph {"className":"about-hero-fact__value","metadata":{"bindings":{"content":{"source":"kacper-portfolio/age"}}}} -->
<p class="about-hero-fact__value"><?php echo esc_html( kacper_portfolio_age_in_years() . ' Jahre' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"about-hero-fact__caption"} -->
<p class="about-hero-fact__caption">Mein Alter</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-hero-fact about-hero-fact--education"} -->
<div class="wp-block-group about-hero-fact about-hero-fact--education">
<!-- wp:paragraph {"className":"about-hero-fact__value"} -->
<p class="about-hero-fact__value">HTWK Leipzig</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"about-hero-fact__caption"} -->
<p class="about-hero-fact__caption">Meine Hochschule</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-hero-fact about-hero-fact--origin"} -->
<div class="wp-block-group about-hero-fact about-hero-fact--origin">
<!-- wp:paragraph {"className":"about-hero-fact__value"} -->
<p class="about-hero-fact__value">Polen</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"about-hero-fact__caption"} -->
<p class="about-hero-fact__caption">Meine Herkunft</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-hero-fact about-hero-fact--studies"} -->
<div class="wp-block-group about-hero-fact about-hero-fact--studies">
<!-- wp:paragraph {"className":"about-hero-fact__value"} -->
<p class="about-hero-fact__value">Medieninformatik</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"about-hero-fact__caption"} -->
<p class="about-hero-fact__caption">Bachelor · Abschlussphase</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-hero-fact about-hero-fact--languages"} -->
<div class="wp-block-group about-hero-fact about-hero-fact--languages">
<!-- wp:paragraph {"className":"about-hero-fact__value"} -->
<p class="about-hero-fact__value">Polnisch, Deutsch, Englisch</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"about-hero-fact__caption"} -->
<p class="about-hero-fact__caption">In Wort und Schrift</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</section>
<!-- /wp:group -->
<!-- wp:group {"tagName":"section","className":"about-section about-interests","anchor":"was-mich-interessiert"} -->
<section id="was-mich-interessiert" class="wp-block-group about-section about-interests">
<!-- wp:group {"className":"about-section-heading"} -->
<div class="wp-block-group about-section-heading">
<!-- wp:heading -->
<h2 class="wp-block-heading">Was mich interessiert.</h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"about-interests__intro"} -->
<p class="about-interests__intro">Mich interessiert, wie Technik und Gestaltung zusammenspielen und daraus Anwendungen entstehen, die im Alltag tatsächlich einen Mehrwert bieten.</p>
<!-- /wp:paragraph -->
<!-- wp:buttons {"className":"about-interests__actions"} -->
<div class="wp-block-buttons about-interests__actions">
<!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( get_post_type_archive_link( 'project' ) ); ?>">Meine Projekte ansehen</a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-interests__list"} -->
<div class="wp-block-group about-interests__list">
<!-- wp:group {"className":"about-interest about-interest--web"} -->
<div class="wp-block-group about-interest about-interest--web">
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Webentwicklung</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Webanwendungen entwickeln und eigene Ideen umsetzen, zum Beispiel mit Laravel und WordPress.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-interest about-interest--interfaces"} -->
<div class="wp-block-group about-interest about-interest--interfaces">
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Frontend &amp; Interfaces</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Benutzeroberflächen gestalten und dafür sorgen, dass Anwendungen übersichtlich und einfach zu bedienen sind.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-interest about-interest--data"} -->
<div class="wp-block-group about-interest about-interest--data">
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Daten &amp; Automatisierung</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Mit Datenbanken, APIs und Automatisierung Prozesse vereinfachen und wiederkehrende Aufgaben effizienter gestalten.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-interest about-interest--practice"} -->
<div class="wp-block-group about-interest about-interest--practice">
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Projekte &amp; praktische Erfahrung</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>In eigenen Projekten verschiedene Technologien ausprobieren und das Gelernte direkt anwenden.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","className":"about-section about-process","anchor":"wie-ich-arbeite"} -->
<section id="wie-ich-arbeite" class="wp-block-group about-section about-process">
<!-- wp:group {"className":"about-process__intro"} -->
<div class="wp-block-group about-process__intro">
<!-- wp:heading -->
<h2 class="wp-block-heading">Wie ich<br>arbeite.</h2>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Von der ersten Idee bis zur finalen Lösung arbeite ich strukturiert und fokussiert. Mein Ziel ist es, aus komplexen Anforderungen einfache, durchdachte Ergebnisse zu schaffen.</p>
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
<h3 class="wp-block-heading">Verstehen.</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Ich beginne damit, das Problem, die Anforderungen und den Kontext genau zu verstehen.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-process__step"} -->
<div class="wp-block-group about-process__step">
<!-- wp:paragraph {"className":"about-process__number"} -->
<p class="about-process__number">02</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Strukturieren.</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Danach ordne ich Informationen, plane die Lösung und definiere einen klaren Ablauf.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-process__step"} -->
<div class="wp-block-group about-process__step">
<!-- wp:paragraph {"className":"about-process__number"} -->
<p class="about-process__number">03</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Umsetzen.</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Ich entwickle eine funktionierende Lösung Schritt für Schritt und achte auf einen sauberen Aufbau.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-process__step"} -->
<div class="wp-block-group about-process__step">
<!-- wp:paragraph {"className":"about-process__number"} -->
<p class="about-process__number">04</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Verbessern.</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Zum Schluss teste ich, optimiere Details und verbessere die Anwendung gezielt weiter.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-process__goal"} -->
<div class="wp-block-group about-process__goal">
<!-- wp:paragraph {"className":"about-eyebrow"} -->
<p class="about-eyebrow">Ziel</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"about-process__result"} -->
<p class="about-process__result">Eine klare, funktionierende und durchdachte Lösung.</p>
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
<h2 class="wp-block-heading">Technologien,<br>mit denen ich arbeite.</h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"about-skills__intro"} -->
<p class="about-skills__intro">Diese Technologien nutze ich in meinen Projekten, im Studium und in der praktischen Arbeit.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-skills__rows"} -->
<div class="wp-block-group about-skills__rows">
<!-- wp:group {"className":"about-skills__row"} -->
<div class="wp-block-group about-skills__row">
<!-- wp:heading {"level":3,"className":"about-skills__label"} -->
<h3 class="wp-block-heading about-skills__label">Frontend &amp; Backend</h3>
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
<h3 class="wp-block-heading about-skills__label">Tools &amp; Systeme</h3>
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
<h3 class="wp-block-heading about-skills__label">Design &amp; 3D</h3>
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
<h3 class="wp-block-heading about-skills__label">Weitere Tools</h3>
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
<!-- wp:group {"tagName":"section","className":"about-section about-practice"} -->
<section class="wp-block-group about-section about-practice">
<!-- wp:group {"className":"about-section-heading"} -->
<div class="wp-block-group about-section-heading">
<!-- wp:paragraph {"className":"about-eyebrow"} -->
<p class="about-eyebrow">03 / TECHNIK IN DER PRAXIS</p>
<!-- /wp:paragraph -->
<!-- wp:heading -->
<h2 class="wp-block-heading">Praxiserfahrung.</h2>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-practice__feature"} -->
<div class="wp-block-group about-practice__feature">
<!-- wp:group {"className":"about-practice__meta"} -->
<div class="wp-block-group about-practice__meta">
<!-- wp:paragraph {"className":"about-eyebrow"} -->
<p class="about-eyebrow">MAI 2026 – JULI 2026</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">ProSoft<br>Krippner</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>IT-Praktikum · Leipzig</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-practice__body"} -->
<div class="wp-block-group about-practice__body">
<!-- wp:paragraph {"className":"about-lead"} -->
<p class="about-lead">Von einzelnen Systemen zum zentralen Überblick.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>Im Rahmen meines Pflichtpraktikums beschäftigte ich mich mit der Konzeption und Umsetzung einer zentralen Monitoring-Lösung für mehrere Kundennetzwerke eines IT-Dienstleisters.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>Dabei arbeitete ich unter anderem mit Zabbix, Grafana, PostgreSQL/TimescaleDB, Docker und Portainer. Ein Schwerpunkt lag auf einer Architektur mit zentralem Monitoring-System sowie separaten Zabbix-Proxys und Agents für unterschiedliche Kundenstandorte und Windows- bzw. Linux-Systeme.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>Zusätzlich entwickelte ich eine eigene Verwaltungsoberfläche auf Basis von FastAPI, über die unter anderem Kunden, Standorte, Proxy-Konfigurationen, Agent-Pakete und Backups verwaltet werden konnten.</p>
<!-- /wp:paragraph -->
<!-- wp:list {"className":"about-tags about-tags--small"} -->
<ul class="wp-block-list about-tags about-tags--small"><!-- wp:list-item -->
<li>Zabbix</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li>Grafana</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li>Docker</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li>PostgreSQL</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li>TimescaleDB</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li>FastAPI</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li>Linux</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li>Windows</li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</section>
<!-- /wp:group -->
<!-- wp:group {"tagName":"section","className":"about-section about-experience"} -->
<section class="wp-block-group about-section about-experience">
<!-- wp:group {"className":"about-section-heading"} -->
<div class="wp-block-group about-section-heading">
<!-- wp:paragraph {"className":"about-eyebrow"} -->
<p class="about-eyebrow">04 / ERFAHRUNG MIT MENSCHEN</p>
<!-- /wp:paragraph -->
<!-- wp:heading -->
<h2 class="wp-block-heading">Weitere Berufserfahrung.</h2>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-timeline"} -->
<div class="wp-block-group about-timeline">
<!-- wp:group {"className":"about-work-row"} -->
<div class="wp-block-group about-work-row">
<!-- wp:paragraph {"className":"about-eyebrow"} -->
<p class="about-eyebrow">Oktober 2020 – Oktober 2022</p>
<!-- /wp:paragraph -->
<!-- wp:group {"className":"about-work-row__body"} -->
<div class="wp-block-group about-work-row__body">
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">OTTO Work Force GmbH</h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"about-role"} -->
<p class="about-role">Personaldisponent für polnische Mitarbeiter</p>
<!-- /wp:paragraph -->
<!-- wp:list {"className":"about-task-list"} -->
<ul class="wp-block-list about-task-list"><!-- wp:list-item -->
<li>Erstellung personalrelevanter Dokumente</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li>Datenerfassung und -pflege</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li>Management und Recruiting</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li>Betreuung polnischer Mitarbeiter</li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-work-row"} -->
<div class="wp-block-group about-work-row">
<!-- wp:paragraph {"className":"about-eyebrow"} -->
<p class="about-eyebrow">Juni 2020 – Oktober 2020</p>
<!-- /wp:paragraph -->
<!-- wp:group {"className":"about-work-row__body"} -->
<div class="wp-block-group about-work-row__body">
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">HBM Heimbetriebe Mühlhausen</h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"about-role"} -->
<p class="about-role">Sachbearbeiter / Assistent</p>
<!-- /wp:paragraph -->
<!-- wp:list {"className":"about-task-list"} -->
<ul class="wp-block-list about-task-list"><!-- wp:list-item -->
<li>Erstellung personalrelevanter Dokumente</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li>Datenerfassung und -pflege</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li>Verwaltung von Bewohnergeldern</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li>Bearbeitung von Post und administrativen Aufgaben</li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
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
<h2 class="wp-block-heading">Abseits vom Code.</h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"about-personal__statement"} -->
<p class="about-personal__statement">Technik. Kreativität.<br>Und alles dazwischen.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-personal__copy"} -->
<div class="wp-block-group about-personal__copy">
<!-- wp:paragraph -->
<p>Auch außerhalb des Studiums beschäftige ich mich gerne mit Technik und digitalen Medien. Neue Technologien, Games, Filme und Serien gehören genauso zu meinen Interessen wie das Ausprobieren neuer Software und digitaler Produkte.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>Gerade die Mischung aus Technik, Kreativität und digitalen Medien ist einer der Gründe, warum ich mich für Medieninformatik entschieden habe.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</section>
<!-- /wp:group -->
<!-- wp:group {"tagName":"section","className":"about-section about-contact"} -->
<section class="wp-block-group about-section about-contact">
<!-- wp:heading -->
<h2 class="wp-block-heading">Lust auf Zusammenarbeit?</h2>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Du hast eine Idee, ein spannendes Projekt oder möchtest dich austauschen? Ich freue mich auf deine Nachricht.</p>
<!-- /wp:paragraph -->
<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"about-contact__link"} -->
<div class="wp-block-button about-contact__link"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( $contact_url ); ?>">Kontakt aufnehmen <span aria-hidden="true">↗</span></a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</section>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
