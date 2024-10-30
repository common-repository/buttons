<?php

use WPButtons\Admin\DBManager;
use WPButtons\Admin\Link;
use WPButtons\Admin\Settings;
use WPButtons\WOWP_Plugin;

defined( 'ABSPATH' ) || exit;

$link   = $options['link'] ?? '';
$tag    = $options['tag'] ?? '';
$status = $options['status'] ?? false;
$test   = $options['mode'] ?? false;

$shortcode = '';
if ( ! empty( $options['id'] ) ) {
	$shortcode = '[' . WOWP_Plugin::SHORTCODE . ' id="' . absint( $options['id'] ) . '"]';
}

?>

<div class="wpie-sidebar">

    <h2 class="wpie-title"><?php esc_attr_e( ' Publish', 'buttons' ); ?></h2>

    <div class="wpie-fields__box">

        <div class="wpie-field">
            <div class="wpie-field__title"><?php esc_html_e( 'Status', 'buttons' ); ?></div>
            <label class="wpie-field__label">
                <input type="checkbox" name="status" value="true" <?php checked( "true", $status ); ?>>
                <span class=""><?php esc_html_e( 'Deactivate', 'buttons' ); ?></span>
            </label>
        </div>

        <div class="wpie-field">
            <div class="wpie-field__title"><?php esc_html_e( 'Test mode', 'buttons' ); ?></div>
            <label class="wpie-field__label">
                <input type="checkbox" name="mode" value="true" <?php checked( "true", $test ); ?>>
                <span class=""><?php esc_html_e( 'Activate', 'buttons' ); ?></span>
            </label>
        </div>

        <div class="wpie-field">
            <label class="wpie-field__label has-icon">
                <span class="dashicons dashicons-tag"></span>
                <input list="wpie-tags" type="text" name="tag" id="tag" value="<?php echo esc_attr( $tag ); ?>">
                <datalist id="wpie-tags">
					<?php DBManager::display_tags(); ?>
                </datalist>
            </label>
        </div>

        <div class="wpie-field">
            <label class="wpie-field__label has-icon">
				<?php if ( ! empty( $link ) ): ?>
                    <a href="<?php echo esc_url( $link ); ?>" target="_blank">
                        <span class="dashicons dashicons-admin-links"></span>
                    </a>
				<?php else: ?>
                    <span class="dashicons dashicons-admin-links"></span>
				<?php endif; ?>
                <input type="url" name="param[link]" id="link" value="<?php echo esc_url( $link ); ?>">
            </label>
        </div>

		<?php if ( ! empty( $shortcode ) ) : ?>
            <div class="wpie-field">
                <label class="wpie-field__label has-icon">
                    <span class="dashicons dashicons-shortcode"></span>
                    <input type="text" id="shortcode" value="<?php echo esc_attr( $shortcode ); ?>" readonly>
                </label>
            </div>
		<?php endif; ?>

    </div>

    <div class="wpie-actions__box">

        <div class="wpie-action__link">
			<?php if ( ! empty( $options['id'] ) ): ?>
                <a class="wpie-link-delete" href="<?php echo esc_url( Link::remove( $options['id'] ) ); ?>">
					<?php esc_html_e( 'Delete', 'buttons' ); ?>
                </a>
			<?php endif; ?>
        </div>

        <div class="wpie-action__btn">
			<?php submit_button( null, 'primary', 'submit_settings', false ); ?>
        </div>
    </div>


</div>
<?php
require_once plugin_dir_path( __FILE__ ) . 'pro-plugin.php';
