<?php
/**
 * Title: About me (EN)
 * Slug: kacper-portfolio/about-en
 * Categories: text
 * Inserter: no
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$contact_page = get_page_by_path( 'kontakt' );
$contact_id = $contact_page && function_exists( 'pll_get_post' ) ? pll_get_post( $contact_page->ID, 'en' ) : 0;
$contact_url = $contact_id ? get_permalink( $contact_id ) : home_url( '/en/contact/' );
$projects_url = get_post_type_archive_link( 'project' );
if ( has_filter( 'wpml_permalink' ) ) {
    $projects_url = apply_filters( 'wpml_permalink', $projects_url, 'en' );
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
<h1 class="wp-block-heading about-hero__greeting">Hi, I’m <strong>Kacper</strong>.</h1>
<!-- /wp:heading -->
<!-- wp:group {"className":"about-hero__bio"} -->
<div class="wp-block-group about-hero__bio">
<!-- wp:paragraph -->
<p>I enjoy building digital applications that bring together design, functionality and technology. I like turning my own ideas into reality, solving challenges and seeing an initial thought become something that works.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>I’m currently studying <strong>Media Informatics</strong> at HTWK Leipzig and am in the final stage of my bachelor’s degree. Through my projects so far, I’ve gained practical experience and learned to tackle tasks independently, explore different approaches and get to grips with new topics.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>I now want to put my knowledge into practice in a professional environment and work with others on interesting projects. I’m especially looking forward to learning from experienced developers, taking on new challenges and having the opportunity to take responsibility and grow.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-hero__facts"} -->
<div class="wp-block-group about-hero__facts">
<!-- wp:group {"className":"about-hero-fact about-hero-fact\u002d\u002dlocation"} -->
<div class="wp-block-group about-hero-fact about-hero-fact--location">
<!-- wp:paragraph {"className":"about-hero-fact__value"} -->
<p class="about-hero-fact__value">Leipzig</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"about-hero-fact__caption"} -->
<p class="about-hero-fact__caption">Based in</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-hero-fact about-hero-fact\u002d\u002dage"} -->
<div class="wp-block-group about-hero-fact about-hero-fact--age">
<!-- wp:paragraph {"className":"about-hero-fact__value","metadata":{"bindings":{"content":{"source":"kacper-portfolio/age","args":{"language":"en"}}}}} -->
<p class="about-hero-fact__value"><?php echo esc_html( kacper_portfolio_age_label( kacper_portfolio_age_in_years(), 'en' ) ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"about-hero-fact__caption"} -->
<p class="about-hero-fact__caption">My age</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-hero-fact about-hero-fact\u002d\u002deducation"} -->
<div class="wp-block-group about-hero-fact about-hero-fact--education">
<!-- wp:paragraph {"className":"about-hero-fact__value"} -->
<p class="about-hero-fact__value">HTWK Leipzig</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"about-hero-fact__caption"} -->
<p class="about-hero-fact__caption">My university</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-hero-fact about-hero-fact\u002d\u002dorigin"} -->
<div class="wp-block-group about-hero-fact about-hero-fact--origin">
<!-- wp:paragraph {"className":"about-hero-fact__value"} -->
<p class="about-hero-fact__value">Poland</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"about-hero-fact__caption"} -->
<p class="about-hero-fact__caption">Where I’m from</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-hero-fact about-hero-fact\u002d\u002dstudies"} -->
<div class="wp-block-group about-hero-fact about-hero-fact--studies">
<!-- wp:paragraph {"className":"about-hero-fact__value"} -->
<p class="about-hero-fact__value">Media Informatics</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"about-hero-fact__caption"} -->
<p class="about-hero-fact__caption">Bachelor’s degree · Final stage</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-hero-fact about-hero-fact\u002d\u002dlanguages"} -->
<div class="wp-block-group about-hero-fact about-hero-fact--languages">
<!-- wp:paragraph {"className":"about-hero-fact__value"} -->
<p class="about-hero-fact__value">Polish, German, English</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"about-hero-fact__caption"} -->
<p class="about-hero-fact__caption">Spoken and written</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</section>
<!-- /wp:group -->
<!-- wp:group {"tagName":"section","className":"about-section about-interests","anchor":"interests"} -->
<section id="interests" class="wp-block-group about-section about-interests">
<!-- wp:group {"className":"about-section-heading"} -->
<div class="wp-block-group about-section-heading">
<!-- wp:heading -->
<h2 class="wp-block-heading">What interests me.</h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"about-interests__intro"} -->
<p class="about-interests__intro">I’m interested in how technology and design come together to create applications that make a real difference in everyday life.</p>
<!-- /wp:paragraph -->
<!-- wp:buttons {"className":"about-interests__actions"} -->
<div class="wp-block-buttons about-interests__actions">
<!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( $projects_url ); ?>">View my projects</a></div>
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
<h3 class="wp-block-heading">Web development</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Building web applications and bringing my own ideas to life, for example with Laravel and WordPress.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-interest about-interest\u002d\u002dinterfaces"} -->
<div class="wp-block-group about-interest about-interest--interfaces">
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Frontend &amp; interfaces</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Designing user interfaces and making applications clear and easy to use.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-interest about-interest\u002d\u002ddata"} -->
<div class="wp-block-group about-interest about-interest--data">
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Data &amp; automation</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Using databases, APIs and automation to simplify processes and make repetitive tasks more efficient.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-interest about-interest\u002d\u002dpractice"} -->
<div class="wp-block-group about-interest about-interest--practice">
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Projects &amp; practical experience</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Trying different technologies in my own projects and putting what I learn into practice.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","className":"about-section about-process","anchor":"how-i-work"} -->
<section id="how-i-work" class="wp-block-group about-section about-process">
<!-- wp:group {"className":"about-process__intro"} -->
<div class="wp-block-group about-process__intro">
<!-- wp:heading -->
<h2 class="wp-block-heading">How I<br>work.</h2>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>From the first idea to the finished solution, I take a structured and focused approach. My goal is to turn complex requirements into simple, thoughtful results.</p>
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
<h3 class="wp-block-heading">Understand.</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>I start by understanding the problem, the requirements and the context.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-process__step"} -->
<div class="wp-block-group about-process__step">
<!-- wp:paragraph {"className":"about-process__number"} -->
<p class="about-process__number">02</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Structure.</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>I organise the information, plan the solution and define a clear sequence of steps.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-process__step"} -->
<div class="wp-block-group about-process__step">
<!-- wp:paragraph {"className":"about-process__number"} -->
<p class="about-process__number">03</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Build.</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>I develop a working solution step by step, keeping the structure clean and clear.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-process__step"} -->
<div class="wp-block-group about-process__step">
<!-- wp:paragraph {"className":"about-process__number"} -->
<p class="about-process__number">04</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Improve.</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Finally, I test the application, refine the details and make targeted improvements.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-process__goal"} -->
<div class="wp-block-group about-process__goal">
<!-- wp:paragraph {"className":"about-eyebrow"} -->
<p class="about-eyebrow">The goal</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"about-process__result"} -->
<p class="about-process__result">A clear, functional and carefully considered solution.</p>
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
<h2 class="wp-block-heading">Technologies<br>I work with.</h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"about-skills__intro"} -->
<p class="about-skills__intro">I use these technologies in my projects, during my studies and in practical work.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-skills__rows"} -->
<div class="wp-block-group about-skills__rows">
<!-- wp:group {"className":"about-skills__row"} -->
<div class="wp-block-group about-skills__row">
<!-- wp:heading {"level":3,"className":"about-skills__label"} -->
<h3 class="wp-block-heading about-skills__label">Frontend &amp; backend</h3>
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
<h3 class="wp-block-heading about-skills__label">Tools &amp; systems</h3>
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
<h3 class="wp-block-heading about-skills__label">Other tools</h3>
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
<h2 class="wp-block-heading">Beyond the code.</h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"about-personal__statement"} -->
<p class="about-personal__statement">Technology. Creativity.<br>And everything in between.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"about-personal__copy"} -->
<div class="wp-block-group about-personal__copy"><!-- wp:paragraph -->
<p>Outside my studies, I also enjoy exploring technology and digital media. My interests include new technologies, games, films and series, as well as trying out new software and digital products.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>This combination of technology, creativity and digital media is one of the reasons I chose to study Media Informatics.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
</section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","className":"about-section about-contact"} -->
<section class="wp-block-group about-section about-contact">
<!-- wp:heading -->
<h2 class="wp-block-heading">Interested in working together?</h2>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Have an idea, an interesting project or simply want to exchange thoughts? I’d love to hear from you.</p>
<!-- /wp:paragraph -->
<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"about-contact__link"} -->
<div class="wp-block-button about-contact__link"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( $contact_url ); ?>">Get in touch <span aria-hidden="true">↗</span></a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</section>
<!-- /wp:group --></div>
<!-- /wp:group -->
