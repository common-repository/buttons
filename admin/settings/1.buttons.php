<?php
/*
 * Page Name: Buttons
 */

use WPButtons\Admin\CreateFields;

defined( 'ABSPATH' ) || exit;

$page_opt = include( 'options/buttons.php' );

$field = new CreateFields( $options, $page_opt );

$count = ( ! empty( $options['type'] ) && is_array( $options['type'] ) ) ? count( $options['type'] ) : 0;

?>
    <div class="wpie-items__list" id="wpie-items-list">
		<?php if ( $count > 0 ) :
			for ( $i = 0; $i < $count; $i ++ ):
				$order = $i + 1;
				$item_order = ! empty( $options['item_order'][ $i ] ) ? 1 : 0;
				$open = ! empty( $item_order ) ? ' open' : '';
				?>
                <details class="wpie-item"<?php echo esc_attr( $open ); ?>>
                    <input type="hidden" name="item_order[]" class="wpie-item__toggle" value="<?php echo absint( $item_order ); ?>">
                    <summary class="wpie-item_heading">
                        <span class="wpie-item_heading_icon"></span>
                        <span class="wpie-item_heading_label"></span>
                        <span class="wpie-item_heading_type"></span>
                        <span class="dashicons dashicons-move"></span>
                        <span class="dashicons dashicons-trash"></span>
                        <span class="wpie-item_heading_toogle">
                            <span class="dashicons dashicons-arrow-down"></span>
                            <span class="dashicons dashicons-arrow-up "></span>
                        </span>
                    </summary>
                    <div class="wpie-item_content">

                        <div class="wpie-fieldset">
                            <div class="wpie-fields">
								<?php
								$field->create( 'text', $i );
								$field->create( 'tooltip', $i );
								$field->create( 'icon', $i );
								?>
                            </div>
                        </div>

                        <div class="wpie-tabs-wrapper">

                            <div class="wpie-tabs-link">
                                <a class="wpie-tab__link is-active"><?php esc_html_e( 'Type', 'buttons' ); ?></a>
                                <a class="wpie-tab__link"><?php esc_html_e( 'Appearance', 'buttons' ); ?></a>
                                <a class="wpie-tab__link"><?php esc_html_e( 'Style', 'buttons' ); ?></a>
                                <a class="wpie-tab__link"><?php esc_html_e( 'Elements', 'buttons' ); ?></a>
                            </div>

                            <div class="wpie-tab-settings is-active">

                                <div class="wpie-fieldset">
                                    <div class="wpie-fields">
										<?php
										$field->create( 'type', $i );
										$field->create( 'btn_link', $i );
										$field->create( 'share', $i );
										$field->create( 'extra_link', $i );
										?>
                                    </div>

                                </div>


                            </div>

                            <div class="wpie-tab-settings">
                                <div class="wpie-fieldset">
                                    <div class="wpie-fields">
			                            <?php $field->create( 'gap', $i ); ?>
			                            <?php $field->create( 'direction', $i ); ?>
			                            <?php $field->create( 'justify', $i ); ?>
			                            <?php $field->create( 'transition_duration', $i ); ?>
			                            <?php $field->create( 'transition_function', $i ); ?>
                                    </div>

                                </div>

                                <div class="wpie-fieldset">
                                    <div class="wpie-legend"><?php esc_html_e( 'Size', 'buttons' ); ?></div>

                                    <div class="wpie-fields">
			                            <?php $field->create( 'width', $i ); ?>
			                            <?php $field->create( 'height', $i ); ?>
			                            <?php $field->create( 'font_size', $i ); ?>
                                    </div>

                                </div>
                            </div>

                            <div class="wpie-tab-settings">

                                <div class="wpie-fieldset">
                                    <div class="wpie-legend"><?php esc_html_e( 'Colors', 'buttons' ); ?></div>

                                    <div class="wpie-fields">
										<?php $field->create( 'color', $i ); ?>
										<?php $field->create( 'color_hover', $i ); ?>
										<?php $field->create( 'background', $i ); ?>
										<?php $field->create( 'background_hover', $i ); ?>
                                    </div>

                                </div>

                                <div class="wpie-fieldset">
                                    <div class="wpie-legend"><?php esc_html_e( 'Border', 'buttons' ); ?></div>

                                    <div class="wpie-fields">
			                            <?php $field->create( 'border_radius', $i ); ?>
			                            <?php $field->create( 'border_width', $i ); ?>
			                            <?php $field->create( 'border_style', $i ); ?>
			                            <?php $field->create( 'border_color', $i ); ?>
			                            <?php $field->create( 'border_color_hover', $i ); ?>
                                    </div>

                                </div>

                                <div class="wpie-fieldset">
                                    <div class="wpie-legend"><?php esc_html_e( 'Shadow', 'buttons' ); ?></div>

                                    <div class="wpie-fields">
			                            <?php $field->create( 'shadow', $i ); ?>
			                            <?php $field->create( 'shadow_horizontal', $i ); ?>
			                            <?php $field->create( 'shadow_vertical', $i ); ?>
			                            <?php $field->create( 'shadow_blur', $i ); ?>
			                            <?php $field->create( 'shadow_spread', $i ); ?>
			                            <?php $field->create( 'shadow_color', $i ); ?>
                                    </div>

                                </div>



                            </div>
                            <div class="wpie-tab-settings">
                                <div class="wpie-fieldset">
                                    <div class="wpie-fields">
			                            <?php $field->create( 'icon_size', $i ); ?>
			                            <?php $field->create( 'icon_rotate', $i ); ?>

                                    </div>
                                    <div class="wpie-fields">
			                            <?php $field->create( 'icon_color', $i ); ?>
                                    </div>

                                </div>
                            </div>

                        </div>


                    </div>
                </details>

			<?php endfor; endif; ?>


        <hr class="wpie-buttons__hr">
        <div class="wpie-fields">
            <button class="button button-primary wpie-add-button"
                    type="button"><?php esc_html_e( 'Add Button', 'buttons' ); ?></button>
        </div>

    </div>


    <template id="template-button">
        <details class="wpie-item" open>
            <input type="hidden" name="item_order[]" class="wpie-item__toggle" value="1">
            <summary class="wpie-item_heading">
                <span class="wpie-item_heading_icon"></span>
                <span class="wpie-item_heading_label"></span>
                <span class="wpie-item_heading_type"></span>
                <span class="dashicons dashicons-move"></span>
                <span class="dashicons dashicons-trash"></span>
                <span class="wpie-item_heading_toogle">
                <span class="dashicons dashicons-arrow-down"></span>
                <span class="dashicons dashicons-arrow-up "></span>
            </span>
            </summary>
            <div class="wpie-item_content">


                <div class="wpie-fieldset">
                    <div class="wpie-fields">
						<?php $field->create( 'text', - 1 ); ?>
						<?php $field->create( 'tooltip', - 1 ); ?>
						<?php $field->create( 'icon', - 1 ); ?>
                    </div>
                </div>

                <div class="wpie-tabs-wrapper">

                    <div class="wpie-tabs-link">
                        <a class="wpie-tab__link is-active"><?php esc_html_e( 'Type', 'buttons' ); ?></a>
                        <a class="wpie-tab__link"><?php esc_html_e( 'Appearance', 'buttons' ); ?></a>
                        <a class="wpie-tab__link"><?php esc_html_e( 'Style', 'buttons' ); ?></a>
                        <a class="wpie-tab__link"><?php esc_html_e( 'Elements', 'buttons' ); ?></a>
                    </div>

                    <div class="wpie-tab-settings is-active">

                        <div class="wpie-fieldset">
                            <div class="wpie-fields">
								<?php $field->create( 'type', - 1 ); ?>
								<?php $field->create( 'btn_link', - 1 ); ?>
								<?php $field->create( 'share', - 1 ); ?>
								<?php $field->create( 'extra_link', - 1 ); ?>
                            </div>

                        </div>

                        <div class="wpie-fieldset is-hidden wpie-button-menu">
                            <div class="wpie-legend"><?php esc_html_e( 'Menu', 'buttons' ); ?></div>
                            <hr>
                            <div class="wpie-fields">
                                <button class="button button-small wpie-add-menu">
									<?php esc_html_e( 'Add Item', 'buttons' ); ?>
                                </button>
                            </div>
                        </div>

                    </div>

                    <div class="wpie-tab-settings">
                        <div class="wpie-fieldset">
                            <div class="wpie-fields">
				                <?php $field->create( 'gap', -1 ); ?>
				                <?php $field->create( 'reverse', -1 ); ?>
				                <?php $field->create( 'justify', -1 ); ?>
				                <?php $field->create( 'transition_duration', -1 ); ?>
				                <?php $field->create( 'transition_function', -1 ); ?>
                            </div>

                        </div>

                        <div class="wpie-fieldset">
                            <div class="wpie-legend"><?php esc_html_e( 'Size', 'buttons' ); ?></div>

                            <div class="wpie-fields">
				                <?php $field->create( 'width', -1 ); ?>
				                <?php $field->create( 'height', -1 ); ?>
				                <?php $field->create( 'font_size', -1 ); ?>
                            </div>

                        </div>
                    </div>

                    <div class="wpie-tab-settings">

                        <div class="wpie-fieldset">
                            <div class="wpie-legend"><?php esc_html_e( 'Colors', 'buttons' ); ?></div>

                            <div class="wpie-fields">
				                <?php $field->create( 'color', - 1 ); ?>
				                <?php $field->create( 'color_hover', - 1 ); ?>
				                <?php $field->create( 'background', - 1 ); ?>
				                <?php $field->create( 'background_hover', - 1 ); ?>
                            </div>

                        </div>

                        <div class="wpie-fieldset">
                            <div class="wpie-legend"><?php esc_html_e( 'Border', 'buttons' ); ?></div>

                            <div class="wpie-fields">
			                    <?php $field->create( 'border_radius', - 1 ); ?>
			                    <?php $field->create( 'border_width', - 1 ); ?>
			                    <?php $field->create( 'border_style', - 1 ); ?>
			                    <?php $field->create( 'border_color', - 1 ); ?>
			                    <?php $field->create( 'border_color_hover', - 1 ); ?>
                            </div>

                        </div>

                        <div class="wpie-fieldset">
                            <div class="wpie-legend"><?php esc_html_e( 'Shadow', 'buttons' ); ?></div>

                            <div class="wpie-fields">
			                    <?php $field->create( 'shadow', - 1 ); ?>
			                    <?php $field->create( 'shadow_horizontal', - 1 ); ?>
			                    <?php $field->create( 'shadow_vertical', - 1 ); ?>
			                    <?php $field->create( 'shadow_blur', - 1 ); ?>
			                    <?php $field->create( 'shadow_spread', - 1 ); ?>
			                    <?php $field->create( 'shadow_color', - 1 ); ?>
                            </div>

                        </div>

                    </div>

                    <div class="wpie-tab-settings">
                        <div class="wpie-fieldset">
                            <div class="wpie-fields">
				                <?php $field->create( 'icon_size', -1 ); ?>
				                <?php $field->create( 'icon_rotate', -1 ); ?>


                            </div>
                            <div class="wpie-fields">
				                <?php $field->create( 'icon_color', -1 ); ?>
                            </div>

                        </div>
                    </div>

                </div>


            </div>
        </details>
    </template>
<?php
