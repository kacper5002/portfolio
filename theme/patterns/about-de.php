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

?>
<!-- wp:group {"className":"about-story"} -->
<div class="wp-block-group about-story">
<!-- wp:group {"tagName":"section","className":"about-hero"} -->
<section class="wp-block-group about-hero">
<!-- wp:group {"className":"about-hero__title"} -->
<div class="wp-block-group about-hero__title">
<!-- wp:paragraph {"className":"about-display"} -->
<p class="about-display"><span>Ich bin Kacper.</span><span>Ich studiere Medieninformatik</span><span>in Leipzig.</span></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-hero__composition"} -->
<div class="wp-block-group about-hero__composition">
<!-- wp:group {"className":"about-hero__aside about-hero__aside--left"} -->
<div class="wp-block-group about-hero__aside about-hero__aside--left">
<!-- wp:group {"className":"about-hero-fact"} -->
<div class="wp-block-group about-hero-fact">
<!-- wp:paragraph {"className":"about-hero-fact__value"} -->
<p class="about-hero-fact__value">Leipzig</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"about-hero-fact__caption"} -->
<p class="about-hero-fact__caption">Mein Standort</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-hero-fact"} -->
<div class="wp-block-group about-hero-fact">
<!-- wp:paragraph {"className":"about-hero-fact__value"} -->
<p class="about-hero-fact__value">HTWK Leipzig</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"about-hero-fact__caption"} -->
<p class="about-hero-fact__caption">Meine Hochschule</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-hero-fact"} -->
<div class="wp-block-group about-hero-fact">
<!-- wp:paragraph {"className":"about-hero-fact__value"} -->
<p class="about-hero-fact__value">Medieninformatik</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"about-hero-fact__caption"} -->
<p class="about-hero-fact__caption">Bachelor · Abschlussphase</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"about-portrait"} -->
<figure class="wp-block-image size-full about-portrait"><img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/kacper-portrait.jpg' ) ); ?>" alt="Kacper Koszarski im weißen Hemd"/></figure>
<!-- /wp:image -->
<!-- wp:group {"className":"about-hero__aside about-hero__aside--right"} -->
<div class="wp-block-group about-hero__aside about-hero__aside--right">
<!-- wp:group {"className":"about-hero-fact"} -->
<div class="wp-block-group about-hero-fact">
<!-- wp:paragraph {"className":"about-hero-fact__value","metadata":{"bindings":{"content":{"source":"kacper-portfolio/age"}}}} -->
<p class="about-hero-fact__value"><?php echo esc_html( kacper_portfolio_age_in_years() . ' Jahre' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"about-hero-fact__caption"} -->
<p class="about-hero-fact__caption">Mein Alter</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-hero-fact"} -->
<div class="wp-block-group about-hero-fact">
<!-- wp:paragraph {"className":"about-hero-fact__value"} -->
<p class="about-hero-fact__value">Polen</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"about-hero-fact__caption"} -->
<p class="about-hero-fact__caption">Meine Herkunft</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-hero-fact"} -->
<div class="wp-block-group about-hero-fact">
<!-- wp:paragraph {"className":"about-hero-fact__value"} -->
<p class="about-hero-fact__value">Łódź</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"about-hero-fact__caption"} -->
<p class="about-hero-fact__caption">Geboren in</p>
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
<p>Webanwendungen entwickeln und eigene Ideen umsetzen – unter anderem mit Laravel und WordPress.</p>
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

<!-- wp:group {"tagName":"section","className":"about-section about-skills","anchor":"skills"} -->
<section id="skills" class="wp-block-group about-section about-skills">
<!-- wp:group {"className":"about-section-heading"} -->
<div class="wp-block-group about-section-heading">
<!-- wp:heading -->
<h2 class="wp-block-heading">Skills.</h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"about-skills__intro"} -->
<p class="about-skills__intro">Technologien sind für mich Werkzeuge. Entscheidend ist für mich, neue Lösungen zu verstehen, mich schnell einzuarbeiten und technische Anforderungen mit einer klaren Gestaltung zu verbinden.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-skills__grid"} -->
<div class="wp-block-group about-skills__grid">
<!-- wp:group {"className":"about-skill-group"} -->
<div class="wp-block-group about-skill-group">
<!-- wp:group {"className":"about-skill-group__heading"} -->
<div class="wp-block-group about-skill-group__heading">
<!-- wp:paragraph {"className":"about-skill-group__number"} -->
<p class="about-skill-group__number">01</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Web</h3>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->
<!-- wp:list {"className":"about-skill-list"} -->
<ul class="wp-block-list about-skill-list"><!-- wp:list-item -->
<li>HTML</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li>CSS</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li>WordPress</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li>Laravel</li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-skill-group"} -->
<div class="wp-block-group about-skill-group">
<!-- wp:group {"className":"about-skill-group__heading"} -->
<div class="wp-block-group about-skill-group__heading">
<!-- wp:paragraph {"className":"about-skill-group__number"} -->
<p class="about-skill-group__number">02</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Programmierung</h3>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->
<!-- wp:list {"className":"about-skill-list"} -->
<ul class="wp-block-list about-skill-list"><!-- wp:list-item -->
<li>Java</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li>C#</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li>Python</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li>SQL</li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-skill-group"} -->
<div class="wp-block-group about-skill-group">
<!-- wp:group {"className":"about-skill-group__heading"} -->
<div class="wp-block-group about-skill-group__heading">
<!-- wp:paragraph {"className":"about-skill-group__number"} -->
<p class="about-skill-group__number">03</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Systeme &amp; Monitoring</h3>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->
<!-- wp:list {"className":"about-skill-list"} -->
<ul class="wp-block-list about-skill-list"><!-- wp:list-item -->
<li>Docker</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li>Linux</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li>Zabbix</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li>Grafana</li>
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
</ul>
<!-- /wp:list -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-skill-group"} -->
<div class="wp-block-group about-skill-group">
<!-- wp:group {"className":"about-skill-group__heading"} -->
<div class="wp-block-group about-skill-group__heading">
<!-- wp:paragraph {"className":"about-skill-group__number"} -->
<p class="about-skill-group__number">04</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Design &amp; Interactive</h3>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->
<!-- wp:list {"className":"about-skill-list"} -->
<ul class="wp-block-list about-skill-list"><!-- wp:list-item -->
<li>Figma</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li>Canva</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li>Blender</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li>Unity</li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
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
<!-- wp:group {"tagName":"section","className":"about-section about-education"} -->
<section class="wp-block-group about-section about-education">
<!-- wp:group {"className":"about-section-heading"} -->
<div class="wp-block-group about-section-heading">
<!-- wp:paragraph {"className":"about-eyebrow"} -->
<p class="about-eyebrow">05 / BILDUNGSWEG</p>
<!-- /wp:paragraph -->
<!-- wp:heading -->
<h2 class="wp-block-heading">Mein Weg.</h2>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-education__timeline"} -->
<div class="wp-block-group about-education__timeline">
<!-- wp:group {"className":"about-education-row"} -->
<div class="wp-block-group about-education-row">
<!-- wp:paragraph {"className":"about-year"} -->
<p class="about-year">2022</p>
<!-- /wp:paragraph -->
<!-- wp:group {"className":"about-education-row__body"} -->
<div class="wp-block-group about-education-row__body">
<!-- wp:paragraph {"className":"about-eyebrow"} -->
<p class="about-eyebrow">2022 – heute</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Hochschule für Technik, Wirtschaft und Kultur Leipzig</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Medieninformatik (Bachelor)</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-education-row"} -->
<div class="wp-block-group about-education-row">
<!-- wp:paragraph {"className":"about-year"} -->
<p class="about-year">2017</p>
<!-- /wp:paragraph -->
<!-- wp:group {"className":"about-education-row__body"} -->
<div class="wp-block-group about-education-row__body">
<!-- wp:paragraph {"className":"about-eyebrow"} -->
<p class="about-eyebrow">2017 – 2020</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Berufliche Schulen des Unstrut-Hainich-Kreises „Johann August Röbling“</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Allgemeine Hochschulreife<br>Fachrichtung Wirtschaft</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-education-row"} -->
<div class="wp-block-group about-education-row">
<!-- wp:paragraph {"className":"about-year"} -->
<p class="about-year">2012</p>
<!-- /wp:paragraph -->
<!-- wp:group {"className":"about-education-row__body"} -->
<div class="wp-block-group about-education-row__body">
<!-- wp:paragraph {"className":"about-eyebrow"} -->
<p class="about-eyebrow">2012 – 2017</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Regelschule „Thomas Müntzer“</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Mühlhausen / Thüringen<br>Realschulabschluss</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</section>
<!-- /wp:group -->
<!-- wp:group {"tagName":"section","className":"about-section about-languages"} -->
<section class="wp-block-group about-section about-languages">
<!-- wp:group {"className":"about-section-heading"} -->
<div class="wp-block-group about-section-heading">
<!-- wp:paragraph {"className":"about-eyebrow"} -->
<p class="about-eyebrow">06 / IM AUSTAUSCH</p>
<!-- /wp:paragraph -->
<!-- wp:heading -->
<h2 class="wp-block-heading">Sprachen.</h2>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->
<!-- wp:list {"className":"about-language-list"} -->
<ul class="wp-block-list about-language-list"><!-- wp:list-item -->
<li>Deutsch</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li>Polnisch</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li>Englisch</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li>Französisch</li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
</section>
<!-- /wp:group -->
<!-- wp:group {"tagName":"section","className":"about-section about-personal"} -->
<section class="wp-block-group about-section about-personal">
<!-- wp:group {"className":"about-section-heading"} -->
<div class="wp-block-group about-section-heading">
<!-- wp:paragraph {"className":"about-eyebrow"} -->
<p class="about-eyebrow">07 / DIE ANDERE SEITE</p>
<!-- /wp:paragraph -->
<!-- wp:heading -->
<h2 class="wp-block-heading">Abseits vom Code.</h2>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-personal__body"} -->
<div class="wp-block-group about-personal__body">
<!-- wp:paragraph {"className":"about-personal__statement"} -->
<p class="about-personal__statement">Technik. Kreativität.<br>Und alles dazwischen.</p>
<!-- /wp:paragraph -->
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
</div>
<!-- /wp:group -->
</section>
<!-- /wp:group -->
<!-- wp:group {"tagName":"section","className":"about-section about-cv"} -->
<section class="wp-block-group about-section about-cv">
<!-- wp:paragraph {"className":"about-eyebrow"} -->
<p class="about-eyebrow">08 / ZUM MITNEHMEN</p>
<!-- /wp:paragraph -->
<!-- wp:heading -->
<h2 class="wp-block-heading">Mehr über meinen<br>bisherigen Weg?</h2>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Hier findest du bald meinen vollständigen Lebenslauf als PDF.</p>
<!-- /wp:paragraph -->
<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"about-download"} -->
<div class="wp-block-button about-download"><a class="wp-block-button__link wp-element-button">LEBENSLAUF HERUNTERLADEN <span>↘</span></a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
<!-- wp:paragraph {"className":"about-caption"} -->
<p class="about-caption">PDF folgt in Kürze.</p>
<!-- /wp:paragraph -->
</section>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
