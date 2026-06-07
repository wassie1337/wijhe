<?php
/**
 * Title: Moderne hero met doelgroep-tabs
 * Slug: wijhe-studio/hero
 * Categories: featured, call-to-action
 * Viewport width: 1180
 * Inserter: true
 */
?>
<!-- wp:group {"align":"full","gradient":"warm-hero","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-warm-hero-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)"><!-- wp:columns {"align":"wide","verticalAlignment":"center"} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%"><!-- wp:paragraph {"className":"wijhe-kicker","style":{"typography":{"fontWeight":"800"}},"textColor":"primary","fontSize":"small"} -->
<p class="wijhe-kicker has-primary-color has-text-color has-small-font-size" style="font-weight:800"><?php esc_html_e( 'Voor iedereen een duidelijke route', 'wijhe-studio' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"fontSize":"jumbo"} -->
<h1 class="wp-block-heading has-jumbo-font-size"><?php esc_html_e( 'Een modern thema dat meebeweegt met je merk.', 'wijhe-studio' ); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"large"} -->
<p class="has-large-font-size"><?php esc_html_e( 'Pas kleuren, typografie en ruimte aan in de Site Editor. De keuzes werken automatisch door in knoppen, kaarten, patronen en de tabs.', 'wijhe-studio' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'Start met aanpassen', 'wijhe-studio' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-ghost"} -->
<div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'Bekijk doelgroepen', 'wijhe-studio' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:wijhe-studio/audience-tabs {"eyebrow":"Doelgroepen","title":"Kies de ingang die past","tabs":[{"label":"Inwoners","heading":"Snel vinden wat lokaal telt","content":"Bundel populaire taken, nieuws en contactmomenten voor inwoners in een overzichtelijke route.","cta":"Bekijk inwonerinfo","url":"#"},{"label":"Ondernemers","heading":"Maak zakelijke acties direct vindbaar","content":"Gebruik deze tab voor vergunningen, subsidies, locaties of diensten voor lokale ondernemers.","cta":"Voor ondernemers","url":"#"},{"label":"Bezoekers","heading":"Inspireer bezoekers met highlights","content":"Plaats routes, evenementen en verhalen in een compacte tab zonder de pagina druk te maken.","cta":"Ontdek de omgeving","url":"#"},{"label":"Verenigingen","heading":"Geef initiatieven een eigen plek","content":"Maak duidelijk waar verenigingen terecht kunnen voor ondersteuning, zalen, materiaal of promotie.","cta":"Ondersteuning vinden","url":"#"},{"label":"Professionals","heading":"Toon partners relevante details","content":"Richt deze tab in voor samenwerkingen, downloads, contactpersonen en procesinformatie.","cta":"Partnerinformatie","url":"#"}]} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
