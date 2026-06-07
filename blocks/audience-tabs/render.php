<?php
/**
 * Server-rendered audience tabs block.
 *
 * @package WijheStudio
 */

$tabs = isset( $attributes['tabs'] ) && is_array( $attributes['tabs'] ) ? $attributes['tabs'] : array();
$tabs = array_values(
	array_filter(
		$tabs,
		static function ( $tab ) {
			return is_array( $tab ) && ! empty( $tab['label'] );
		}
	)
);

if ( empty( $tabs ) ) {
	return;
}

$block_id = wp_unique_id( 'wijhe-audience-tabs-' );
$wrapper_attributes = get_block_wrapper_attributes(
	array(
		'class' => 'wijhe-audience-tabs',
		'data-wijhe-tabs' => '',
	)
);
$eyebrow = isset( $attributes['eyebrow'] ) ? $attributes['eyebrow'] : '';
$title   = isset( $attributes['title'] ) ? $attributes['title'] : '';
?>
<section <?php echo $wrapper_attributes; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
	<?php if ( $eyebrow || $title ) : ?>
		<header class="wijhe-audience-tabs__header">
			<?php if ( $eyebrow ) : ?>
				<p class="wijhe-audience-tabs__eyebrow wijhe-kicker"><?php echo esc_html( $eyebrow ); ?></p>
			<?php endif; ?>
			<?php if ( $title ) : ?>
				<h2 class="wijhe-audience-tabs__title"><?php echo esc_html( $title ); ?></h2>
			<?php endif; ?>
		</header>
	<?php endif; ?>

	<div class="wijhe-audience-tabs__shell">
		<div aria-label="<?php esc_attr_e( 'Doelgroepen', 'wijhe-studio' ); ?>" class="wijhe-audience-tabs__tablist" role="tablist">
			<?php foreach ( $tabs as $index => $tab ) : ?>
				<?php
				$tab_id   = $block_id . '-tab-' . $index;
				$panel_id = $block_id . '-panel-' . $index;
				$selected = 0 === $index;
				?>
				<button
					aria-controls="<?php echo esc_attr( $panel_id ); ?>"
					aria-selected="<?php echo $selected ? 'true' : 'false'; ?>"
					class="wijhe-audience-tabs__tab"
					id="<?php echo esc_attr( $tab_id ); ?>"
					role="tab"
					type="button"
					<?php echo $selected ? '' : 'tabindex="-1"'; ?>
				>
					<span><?php echo esc_html( $tab['label'] ); ?></span>
				</button>
			<?php endforeach; ?>
		</div>

		<div class="wijhe-audience-tabs__panels">
			<?php foreach ( $tabs as $index => $tab ) : ?>
				<?php
				$tab_id   = $block_id . '-tab-' . $index;
				$panel_id = $block_id . '-panel-' . $index;
				$hidden   = 0 === $index ? '' : 'hidden';
				$heading  = isset( $tab['heading'] ) ? $tab['heading'] : '';
				$content  = isset( $tab['content'] ) ? $tab['content'] : '';
				$cta      = isset( $tab['cta'] ) ? $tab['cta'] : '';
				$url      = isset( $tab['url'] ) ? $tab['url'] : '';
				?>
				<article
					aria-labelledby="<?php echo esc_attr( $tab_id ); ?>"
					class="wijhe-audience-tabs__panel"
					id="<?php echo esc_attr( $panel_id ); ?>"
					role="tabpanel"
					<?php echo esc_attr( $hidden ); ?>
				>
					<?php if ( $heading ) : ?>
						<h3><?php echo esc_html( $heading ); ?></h3>
					<?php endif; ?>
					<?php if ( $content ) : ?>
						<p><?php echo esc_html( $content ); ?></p>
					<?php endif; ?>
					<?php if ( $cta && $url ) : ?>
						<a class="wijhe-audience-tabs__cta" href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $cta ); ?></a>
					<?php endif; ?>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
