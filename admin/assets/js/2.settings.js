'use strict';

jQuery(document).ready(function ($) {

    const settings_main = $('.wpie-settings__main');
    const items_list = $('.wpie-items__list');

    wp_color_picker();

    $('.wpie-link-delete, .wpie-list .delete a').on('click', function (e) {
        const proceed = confirm("Are you sure want to Delete Menu?");
        if (!proceed) {
            e.preventDefault();
        }
    });

    // Set color Picker
    function wp_color_picker() {
        $('.wpie-color').wpColorPicker({
            change: function (event, ui) {
                $('#wpie-items-list .wpie-item').WPButtonsLiveBuilder();
            }
        });
    }


    // Sortible
    $(items_list).sortable({
        items: '> .wpie-item',
        placeholder: "wpie-item ui-state-highlight",
        stop: function (event, ui) {
            set_order();
            $('.wpie-button-menu').each(set_menu_name);
        }
    });
    $(items_list).disableSelection();

    // CheckBox
    $(settings_main).on('change', '.wpie-field input[type="checkbox"]', checkbox);

    function checkbox() {
        const next = $(this).next('input[type="hidden"]');
        if ($(this).is(':checked')) {
            next.val('1');
        } else {
            next.val('0');
        }
    }

    // Menu insert the name index
    $('.wpie-button-menu').each(set_menu_name);

    function set_menu_name() {
        const item = get_parent_fields($(this), '.wpie-item');
        const index = $(item).index();
        $(this).find('[name]').each(function () {
            let currentName = $(this).attr('name');
            let newName = currentName.replace(/\[\d*\]/, '[' + index + ']');
            $(this).attr('name', newName);
        });
    }


    // Chage the button Type

    $(settings_main).on('change', '[data-field="type"]', item_type);
    $('[data-field="type"]').each(item_type);

    function item_type() {
        const parent = get_parent_fields($(this));
        const box = get_field_box($(this));
        const type = $(this).val();
        const fields = $(parent).find('[data-field-box]').not($(box));
        const parentTab = get_parent_fields($(this), '.wpie-tabs-wrapper');
        $(fields).addClass('is-hidden');
        $(parentTab).find('.wpie-button-menu').addClass('is-hidden');
        $(parentTab).find('.wpie-tab__type-menu').addClass('is-hidden');

        switch (type) {
            case 'link':
                $(parent).find('[data-field-box="btn_link"]').removeClass('is-hidden');
                $(parent).find('[data-field-box="link_rel"]').removeClass('is-hidden');
                break;
            case 'share':
                $(parent).find('[data-field-box="share"]').removeClass('is-hidden');
                break;
            case 'counter':
                $(parent).find('[data-field-box="counter"]').removeClass('is-hidden');
                break;
            case 'translate':
                $(parent).find('[data-field-box="translate"]').removeClass('is-hidden');
                break;
            case 'scroll':
            case 'login':
            case 'logout':
            case 'lostpassword':
                $(parent).find('[data-field-box="extra_link"]').removeClass('is-hidden');
                break;
            case 'menu':
                $(parentTab).find('.wpie-button-menu').removeClass('is-hidden');
                $(parent).find('[data-field-box="menu_position"]').removeClass('is-hidden');
                $(parent).find('[data-field-box="menu_open"]').removeClass('is-hidden');
                $(parentTab).find('.wpie-tab__type-menu').removeClass('is-hidden');
                break;
        }
    }

    // Chage the button Menu Item Type

    $(settings_main).on('change', '[data-field="menu_type"]', menu_type);
    $('[data-field="menu_type"]').each(menu_type);

    function menu_type() {
        const parent = get_parent_fields($(this));
        const box = get_field_box($(this));
        const type = $(this).val();
        const fields = $(parent).find('[data-field-box]:not([data-field-box="menu_icon"], [data-field-box="menu_label"])').not($(box));
        $(fields).addClass('is-hidden');
        switch (type) {
            case 'link':
                $(parent).find('[data-field-box="menu_link"]').removeClass('is-hidden');
                $(parent).find('[data-field-box="menu_link_rel"]').removeClass('is-hidden');
                break;
            case 'share':
                $(parent).find('[data-field-box="menu_share"]').removeClass('is-hidden');
                break;
            case 'translate':
                $(parent).find('[data-field-box="menu_translate"]').removeClass('is-hidden');
                break;
            case 'scroll':
            case 'login':
            case 'logout':
            case 'lostpassword':
                $(parent).find('[data-field-box="menu_extra_link"]').removeClass('is-hidden');
                break;
        }
    }

    set_order();

    function set_order() {
        $('.wpie-item_heading_icon').each(function (index) {
            $(this).text(index + 1);
        });
    }

    // Clone the Buttons
    $(settings_main).on('click', '.wpie-add-button', clone_button);

    function clone_button(e) {
        e.preventDefault();
        const parent = get_parent_fields($(this), '.wpie-items__list');
        const selector = $(parent).find('.wpie-buttons__hr');
        const template = $('#template-button').clone().html();
        $(template).insertBefore($(selector));
        $('[data-field="type"]').each(item_type);
        set_order();
        wp_color_picker();
        $('.wpie-item [data-field="width_option"]').each(change_width_option);
        $('#wpie-items-list .wpie-item').WPButtonsLiveBuilder();
    }

    // Clone the Button Menu Item
    $(settings_main).on('click', '.wpie-add-menu', clone_button_menu);

    function clone_button_menu(e) {
        e.preventDefault();
        const parent = get_parent_fields($(this), '.wpie-button-menu');
        const selector = $(parent).find('hr');
        const item = get_parent_fields($(this), '.wpie-item');
        const index = $(item).index();
        let templateContent = $('#template-button-menu')[0].content.cloneNode(true);
        let template = $(templateContent);
        template.find('[name$="[][]"]').each(function () {
            const currentName = $(this).attr('name');
            const newName = currentName.replace('[]', '[' + index + ']');
            $(this).attr('name', newName);
        });
        let newNode = template.get(0);
        $(newNode).insertBefore($(selector));
        $('[data-field="menu_type"]').each(menu_type);

        wp_color_picker();
        $('#wpie-items-list .wpie-item').WPButtonsLiveBuilder();
    }


    // Remove the Button Menu Item
    $(settings_main).on('click', '.wpie-remove', remove_menu_item);

    function remove_menu_item() {
        const parent = get_parent_fields($(this));
        $(parent).remove();
    }

    // Delete Item
    $(settings_main).on("click", '.wpie-item_heading .dashicons-trash', removeItem);

    function removeItem() {
        const userConfirmed = confirm("Are you sure you want to remove this element?");
        if (userConfirmed) {
            const parent = $(this).closest('.wpie-item');
            $(parent).remove();
            $('#wpie-items-list .wpie-item').WPButtonsLiveBuilder();
        }
    }

    // Toogle Item
    $(settings_main).on('click', '.wpie-item .wpie-item_heading', item_toggle);

    function item_toggle() {
        const parent = get_parent_fields($(this), '.wpie-item');
        const val = $(parent).attr('open') ? '0' : '1';
        $(parent).find('.wpie-item__toggle').val(val);
    }

    $(settings_main).on('change', '.wpie-item [data-field="type"]', set_header_type);
    $('.wpie-item [data-field="type"]').each(set_header_type);

    function set_header_type() {
        const parent = get_parent_fields($(this), '.wpie-item');
        const type = $(this).find(":selected").text();
        $(parent).find('.wpie-item_heading_type').text(type);
    }


    $(settings_main).on('change', '.wpie-item [data-field="width_option"]', change_width_option);
    $('.wpie-item [data-field="width_option"]').each(change_width_option);

    function change_width_option() {
        const val = $(this).val();
        const parent = get_field_box($(this));
        const field = $(parent).find('[data-field="width"]');
        // const label = get_field_box($(field), '.wpie-field__label');

        if (val === 'auto') {
            $(field).attr('readonly', 'readonly');
            $(field).addClass('is-blur');
        } else {
            $(field).removeAttr('readonly');
            $(field).removeClass('is-blur');
        }
    }

    $(settings_main).on('change', '[data-field="btns_type"]', change_btns_type);
    $('[data-field="btns_type"]').each(change_btns_type);

    function change_btns_type() {
        const type = $(this).val();
        const parent = get_parent_fields($(this));
        const box = get_field_box($(this));
        const fields = $(parent).find('[data-field-box]').not($(box));
        $(fields).addClass('is-hidden');
        if (type === 'standard') {
            $(parent).find('[data-field-box="btns_standard"]').removeClass('is-hidden');
        } else if (type === 'floating') {
            $(parent).find('[data-field-box="btns_float"]').removeClass('is-hidden');
            $(parent).find('[data-field-box="btns_offset_inline"]').removeClass('is-hidden');
            $(parent).find('[data-field-box="btns_offset_block"]').removeClass('is-hidden');
        }
    }

    $(settings_main).on('change', '[data-field="users"]', change_users);
    $('[data-field="users"]').each(change_users);

    function change_users() {
        const type = $(this).val();
        const parent = get_parent_fields($(this));
        const box = get_field_box($(this));
        const fields = $(parent).find('[data-field-box]').not($(box));
        $(fields).addClass('is-hidden');
        if (type === '2') {
            $(fields).removeClass('is-hidden');
        }
    }

    $(settings_main).on('change', '[data-field="dates"]', change_dates);
    $('[data-field="dates"]').each(change_dates);

    function change_dates() {
        const type = $(this).val();
        const parent = get_parent_fields($(this));
        const box = get_field_box($(this));
        const fields = $(parent).find('[data-field-box="date_start"], [data-field-box="date_end"]');
        $(fields).addClass('is-hidden');
        if (type === 'enabled') {
            $(fields).removeClass('is-hidden');
        }
    }

    // Clone the Schedule
    $(settings_main).on('click', '.wpie-add-schedule', clone_schedule);

    function clone_schedule(e) {
        e.preventDefault();
        const parent = get_parent_fields($(this), '.wpie-fieldset');
        const selector = $(parent).find('hr');
        const template = $('#template-schedule').clone().html();
        $(template).insertBefore($(selector));
        $('[data-field="dates"]').each(change_dates);
    }

    // Clone the Rules
    $(settings_main).on('click', '.wpie-add-rule', clone_rules);

    function clone_rules(e) {
        e.preventDefault();
        const parent = get_parent_fields($(this), '.wpie-fieldset');
        const selector = $(parent).find('hr');
        const template = $('#template-rules').clone().html();
        $(template).insertBefore($(selector));
    }

    $(settings_main).on('change', '[data-field="show"]', change_show);
    $('[data-field="show"]').each(change_show);

    function change_show() {
        const parent = get_parent_fields($(this));
        const box = get_field_box($(this));
        let type = $(this).val();
        const fields = $(parent).find('[data-field-box]').not($(box));
        $(fields).addClass('is-hidden');

        if (type.indexOf('custom_post_selected') !== -1) {
            type = 'post_selected';
        }
        if (type.indexOf('custom_post_tax') !== -1) {
            type = 'post_category';
        }

        switch (type) {
            case 'post_selected':
            case 'post_category':
            case 'page_selected':
                $(parent).find('[data-field-box="operator"], [data-field-box="ids"]').removeClass('is-hidden');
                break;
            case 'page_type':
                $(parent).find('[data-field-box="operator"], [data-field-box="page_type"]').removeClass('is-hidden');
                break;
        }
    }


    function get_parent_fields($el, $class = '.wpie-fields') {
        return $el.closest($class);
    }

    function get_field_box($el, $class = '.wpie-field') {
        return $el.closest($class);
    }

});