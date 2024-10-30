<?php
/*
 * Page Name: Targeting & Rules
 */

use WPButtons\Admin\CreateFields;
use WPButtons\Helper;

defined( 'ABSPATH' ) || exit;

$page_opt = include( 'options/rules.php' );

$field = new CreateFields( $options, $page_opt );

?>

<div class="wpie-fieldset wpie-rules">
    <div class="wpie-legend"><?php esc_html_e( 'Display Rules', 'buttons' ); ?></div>
    <div class="wpie-fields">
		<?php $field->create( 'show', 0 ); ?>
    </div>
</div>


<div class="wpie-fieldset">
    <div class="wpie-legend"><?php esc_html_e( 'Other', 'buttons' ); ?></div>
    <div class="wpie-fields">
		<?php $field->create( 'fontawesome' ); ?>
    </div>
</div>
