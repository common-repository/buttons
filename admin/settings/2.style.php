<?php
/*
 * Page Name: General
 */

use WPButtons\Admin\CreateFields;

defined( 'ABSPATH' ) || exit;

$page_opt = include( 'options/style.php' );

$field = new CreateFields( $options, $page_opt );

?>
    <div class="wpie-general-style" id="wpie-general-style">
        <div class="wpie-fieldset">
            <div class="wpie-fields">
				<?php $field->create( 'btns_gap' ); ?>
				<?php $field->create( 'btns_direction' ); ?>
				<?php $field->create( 'btns_align' ); ?>
				<?php $field->create( 'btns_justify' ); ?>
            </div>
        </div>
        <div class="wpie-fieldset">
            <div class="wpie-fields">
			    <?php $field->create( 'btns_type' ); ?>
			    <?php $field->create( 'btns_standard' ); ?>
			    <?php $field->create( 'btns_float' ); ?>
			    <?php $field->create( 'btns_offset_inline' ); ?>
			    <?php $field->create( 'btns_offset_block' ); ?>
            </div>
        </div>
    </div>

<?php
