'use strict';

(function ($) {

    $.fn.WPButtonsLiveBuilder = function () {

        const builder = $('#wpie-builder');
        $(builder).empty();



        // Your custom functionality here
        function btn_template() {
            return `{{style}}<div class="wpie-btn__wrap is-dropdown-hover">
                    <button class="wpie-btn"{{atts}}>
                        {{icon}}
                        {{text}}
                        {{counter}}
                        {{triangle}}
                    </button>
                    {{menu}}
                    {{tooltip}}
                    </div>`;
        }

        function btn_title($el) {
            const checked = $el.find('[data-field="text_enable"]');
            if (!$(checked).is(':checked')) {
                return '';
            }
            const title = $el.find('[data-field="text"]').val();
            return `<span class="wpie-btn__text">${title}</span>`;
        }

        function btn_icon($el) {
            const checked = $el.find('[data-field="icon_enable"]');
            if (!$(checked).is(':checked')) {
                return '';
            }
            const type = $el.find('[data-field="icon_type"]').val();
            const icon = $el.find('[data-field="icon"]').val();
            if (type === 'class') {
                return `<span class="wpie-btn__icon"><span class="${icon}"></span></span>`;
            } else if (type === 'img') {
                return `<span class="wpie-btn__icon"><img src="${icon}"></span>`;
            } else {
                return `<span class="wpie-btn__icon">${icon}</span>`;
            }
        }

        function btn_tooltip($el) {
            const checked = $el.find('[data-field="tooltip_enable"]');
            if (!$(checked).is(':checked')) {
                return '';
            }
            const position = $el.find('[data-field="tooltip_position"]').val();
            const tooltip = $el.find('[data-field="tooltip"]').val();
            return `<span class="wpie-btn__tooltip -${position}">${tooltip}</span>`;
        }

        function btn_counter($el) {
            const btn_type = $el.find('[data-field="type"]').val();
            if (btn_type !== 'counter') {
                return '';
            }

            const counter = $el.find('[data-field="counter"]').val();
            return `<span class="wpie-btn__counter">${counter}</span>`;
        }

        function btn_menu($el) {
            const btn_type = $el.find('[data-field="type"]').val();
            if (btn_type !== 'menu') {
                return '';
            }
            const menu_type = $el.find('[data-field="menu_type"]');
            const menu_position = $el.find('[data-field="menu_position"]').val();

            if (menu_type.length < 1) {
                return '';
            }

            let menu = `<ul class="wpie-btn__dropdown -${menu_position}">`;
            $(menu_type).each(function (index) {
                let label = $el.find('[data-field="menu_label"]').eq(index).val();
                let check_icon = $el.find('[data-field="menu_icon_enable"]').eq(index);

                let icon = '';

                if ($(check_icon).is(':checked')) {
                    let type = $el.find('[data-field="menu_icon_type"]').eq(index).val();
                    let icon_val = $el.find('[data-field="menu_icon"]').eq(index).val();
                    if (type === 'class') {
                        icon = `<span class="wpie-item__icon"><span class="${icon_val}"></span></span>`;
                    } else if (type === 'img') {
                        icon = `<span class="wpie-item__icon"><img src="${icon_val}"></span>`;
                    } else {
                        icon = `<span class="wpie-item__icon">${icon_val}</span>`;
                    }
                }
                menu += `<li><a class="wpie-btn__dropdown-item" href="#">${icon} ${label}</a></li>`;
            });
            menu += `</ul>`;
            return menu;

        }

        function btn_atts($el, menu) {
            if(menu === '') {
                return '';
            }
            return ' data-wpie-btn-toggle="dropdown" aria-expanded="false"';
        }

        function btn_triangle($el, menu) {
            if(menu === '') {
                return '';
            }

            const menu_type = $el.find('[data-field="type"]').val();
            const menu_position = $el.find('[data-field="menu_position"]').val();
            if(menu_type !== 'menu') {
                return '';
            }
            let position = '';
            switch (menu_position) {
                case 'bottom':
                case 'bottom-left':
                    position = '-bottom';
                    break;
                case 'top':
                case 'top-left':
                    position = '-top';
                    break;
                case 'right':
                    position = '-right';
                    break;
                case 'left':
                    position = '-left';
                    break;

            }

            return `<span class="wpie-btn__triangle ${position}"></span>`;
        }

        function btn_style($el, index) {

            const gap = $el.find('[data-field="gap"]').val();
            let gap_style = `--wpie-btn-gap: ${gap}px;`;

            const direction = $el.find('[data-field="direction"]').val();
            let direction_style = `--wpie-btn-reverse: ${direction};`;

            const width = $el.find('[data-field="width"]').val();
            const width_opt = $el.find('[data-field="width_option"]').val();
            let width_style = '--wpie-btn-width: auto;';
            if(width_opt !== 'auto') {
                width_style = `--wpie-btn-width: ${width}${width_opt};`
            }

            const height = $el.find('[data-field="height"]').val();
            let height_style = `--wpie-btn-height: ${height}px;`;

            const font_size = $el.find('[data-field="font_size"]').val();
            let font_style = `--wpie-btn-font-size: ${font_size}px;`;

            const color = $el.find('[data-field="color"]').val();
            let color_style = `--wpie-btn-color: ${color};`;

            const color_hover = $el.find('[data-field="color_hover"]').val();
            let color_hover_style = `--wpie-btn-color-hover: ${color_hover};`;

            const background = $el.find('[data-field="background"]').val();
            let background_style = `--wpie-btn-bg: ${background};`;

            const background_hover = $el.find('[data-field="background_hover"]').val();
            let background_hover_style = `--wpie-btn-bg-hover: ${background_hover};`;

            const border_radius = $el.find('[data-field="border_radius"]').val();
            let border_radius_style = `--wpie-btn-border-radius: ${border_radius}px;`;
            const border_width = $el.find('[data-field="border_width"]').val();
            let border_width_style = `--wpie-btn-border-width: ${border_width}px;`;
            const border_style = $el.find('[data-field="border_style"]').val();
            let border_style_style = `--wpie-btn-border-style: ${border_style};`;
            const border_color = $el.find('[data-field="border_color"]').val();
            let border_color_style = `--wpie-btn-border-color: ${border_color};`;
            const border_color_hover = $el.find('[data-field="border_color_hover"]').val();
            let border_color_hover_style = `--wpie-btn-border-color-hover: ${border_color_hover};`;

            const icon_size = $el.find('[data-field="icon_size"]').val();
            let icon_size_style = `--wpie-btn-icon-size: ${icon_size}px;`;

            const icon_color = $el.find('[data-field="icon_color"]').val();
            let icon_color_style = `--wpie-btn-icon-color: ${icon_color};`;

            const icon_rotate = $el.find('[data-field="icon_rotate"]').val();
            let icon_rotate_style = `--wpie-btn-icon-rotate: ${icon_rotate}deg;`;

            const counter_size = $el.find('[data-field="counter_size"]').val();
            let counter_size_style = `--wpie-btn-counter-size: ${counter_size}px;`;

            const counter_color = $el.find('[data-field="counter_color"]').val();
            let counter_color_style = `--wpie-btn-counter-color: ${counter_color};`;

            const triangle_size = $el.find('[data-field="triangle_size"]').val();
            let triangle_size_style = `--wpie-btn-triangle-size: ${triangle_size}px;`;

            let shadow = $el.find('[data-field="shadow"]').val();

            if(shadow !== 'none') {
                let shadow_horizontal = $el.find('[data-field="shadow_horizontal"]').val();
                let shadow_vertical = $el.find('[data-field="shadow_vertical"]').val();
                let shadow_blur = $el.find('[data-field="shadow_blur"]').val();
                let shadow_spread = $el.find('[data-field="shadow_spread"]').val();
                let shadow_color = $el.find('[data-field="shadow_color"]').val();
                if(shadow !== 'outset') {
                    shadow += ` ${shadow_horizontal}px ${shadow_vertical}px ${shadow_blur}px ${shadow_spread}px ${shadow_color}`;
                } else {
                    shadow = `${shadow_horizontal}px ${shadow_vertical}px ${shadow_blur}px ${shadow_spread}px ${shadow_color}`
                }
            }

            let shadow_style = `--wpie-btn-shadow: ${shadow};`;

            const transition_duration = $el.find('[data-field="transition_duration"]').val();
            let transition_duration_style = `--wpie-btn-transition-duration: ${transition_duration}s;`;

            const transition_function = $el.find('[data-field="transition_function"]').val();
            let transition_function_style = `--wpie-btn-transition-function: ${transition_function};`;

            const justify = $el.find('[data-field="justify"]').val();
            let justify_style = `--wpie-btn-justify: ${justify};`;

            const triangle_color = $el.find('[data-field="triangle_color"]').val();
            let triangle_color_style = `--wpie-btn-color-triangle: ${triangle_color};`;

            const dropdown_width = $el.find('[data-field="dropdown_width"]').val();
            let dropdown_width_style = `--wpie-btn-dropdown-min-width: ${dropdown_width}px;`;
            const dropdown_size = $el.find('[data-field="dropdown_size"]').val();
            let dropdown_size_style = `--wpie-btn-dropdown-size: ${dropdown_size}px;`;
            const dropdown_color = $el.find('[data-field="dropdown_color"]').val();
            let dropdown_color_style = `--wpie-btn-dropdown-color: ${dropdown_color};`;
            const dropdown_background = $el.find('[data-field="dropdown_background"]').val();
            let dropdown_background_style = `--wpie-btn-dropdown-bg: ${dropdown_background};`;
            const dropdown_background_hover = $el.find('[data-field="dropdown_background_hover"]').val();
            let dropdown_background_hover_style = `--wpie-btn-dropdown-bg-hover: ${dropdown_background_hover};`;
            const dropdown_border_color = $el.find('[data-field="dropdown_border_color"]').val();
            let dropdown_border_color_style = `--wpie-btn-dropdown-border-color: ${dropdown_border_color};`;
            const dropdown_border_style = $el.find('[data-field="dropdown_border_style"]').val();
            let dropdown_border_style_style = `--wpie-btn-dropdown-border-style: ${dropdown_border_style};`;
            const dropdown_border_width = $el.find('[data-field="dropdown_border_width"]').val();
            let dropdown_border_width_style = `--wpie-btn-dropdown-border-width: ${dropdown_border_width}px;`;
            const dropdown_border_radius = $el.find('[data-field="dropdown_border_radius"]').val();
            let dropdown_border_radius_style = `--wpie-btn-dropdown-border-radius: ${dropdown_border_radius}px;`;

            const order =  index + 1;
            return `<style>.wpie-btn__wrap:nth-of-type(${order}){
                    ${gap_style}
                    ${direction_style}
                    ${width_style}
                    ${height_style}
                    ${font_style}
                    ${color_style}
                    ${color_hover_style}
                    ${background_style}
                    ${background_hover_style}
                    ${border_radius_style}
                    ${border_width_style}
                    ${border_style_style}
                    ${border_color_style}
                    ${border_color_hover_style}
                    ${icon_size_style}
                    ${counter_size_style}
                    ${triangle_size_style}
                    ${icon_color_style}
                    ${counter_color_style}
                    ${triangle_color_style}
                    ${icon_rotate_style}
                    ${shadow_style}
                    ${transition_duration_style}
                    ${transition_function_style}
                    ${justify_style}
                    ${dropdown_width_style}
                    ${dropdown_size_style}
                    ${dropdown_color_style}
                    ${dropdown_background_style}
                    ${dropdown_background_hover_style}
                    ${dropdown_border_color_style}
                    ${dropdown_border_style_style}
                    ${dropdown_border_width_style}
                    ${dropdown_border_radius_style}
                    }</style>`;

        }


        return this.each(function () {
            const index =  $(this).index();
            const $this = $(this);
            let template = btn_template();
            let title = btn_title($this);
            template = template.replace('{{text}}', title);
            let icon = btn_icon($this);
            template = template.replace('{{icon}}', icon);
            let tooltip = btn_tooltip($this);
            template = template.replace('{{tooltip}}', tooltip);
            let counter = btn_counter($this);
            template = template.replace('{{counter}}', counter);
            let menu = btn_menu($this);
            template = template.replace('{{menu}}', menu);
            let atts = btn_atts(menu);
            template = template.replace('{{atts}}', atts);
            let triangle = btn_triangle($this, menu);
            template = template.replace('{{triangle}}', triangle);
            let style = btn_style($(this), index);
            template = template.replace('{{style}}', style);

            $(builder).append(template);

            // Here's where you apply your custom functionality on $this

        });

    };

}(jQuery));

jQuery(document).ready(function ($) {
    $('#wpie-items-list .wpie-item').WPButtonsLiveBuilder();
    $('#wpie-items-list').on('change keyup click', function () {
        $('#wpie-items-list .wpie-item').WPButtonsLiveBuilder();
    });


    wpie_general_style();
    $('.wpie-general-style').on('change keyup click', wpie_general_style);
    function wpie_general_style() {
        let style = $('#wpie-live-preview-style');
        $(style).empty();
        const btns_gap = $('.wpie-tabs-contents [data-field="btns_gap"]').val();
        let btns_gap_style = `--wpie-btns-gap: ${btns_gap}px;`;

        const btns_direction = $('.wpie-tabs-contents [data-field="btns_direction"]').val();
        let btns_direction_style = `--wpie-btns-direction: ${btns_direction};`;

        const btns_align = $('.wpie-tabs-contents [data-field="btns_align"]').val();
        let btns_align_style = `--wpie-btns-align: ${btns_align};`;

        const btns_justify = $('.wpie-tabs-contents [data-field="btns_justify"]').val();
        let btns_justify_style = `--wpie-btns-justify: ${btns_justify};`;

        let css = `.wpie-buttons__group{${btns_gap_style}${btns_direction_style}${btns_align_style}${btns_justify_style}`;
        $(style).html(css);
    }

});

