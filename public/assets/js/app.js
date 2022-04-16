// console.log('working');
$(document).ready(function () {

    // FORCUSTOM DROPDOWN IN PURCHASE PAGE
    $('#category_card + div').hide();
    $('#supplier_card + div').hide();
    $('#category_card + div').removeClass('d-none');
    $('#supplier_card + div').removeClass('d-none');
    // END

    // GETTING THE VALUES FROM TABLE FOR DISPLAY TO USER
    $('#temp_table .col_price').each(function () {
        var total = parseInt($('#total_amount').text().slice(0, -2));
        total = parseInt($(this).text().slice(0,-2)) + total;
        $('#total_amount').text(total + "/-");
    });
    // END

    // FIXED FLUGIN
    $(this).on('click', '#purple', function () {
        var selected_color = $(this).attr('data-color');
        var shadow = $(this).attr('data-shadow');
        $(this).addClass('active');
        $(this).siblings().removeClass('active');
        $('.sidebar ul li.active a').css({
            'background-color': selected_color,
            'box-shadow': shadow
        });
    });

    $(this).on('click', '#azure', function () {
        var selected_color = $(this).attr('data-color');
        var shadow = $(this).attr('data-shadow');
        $(this).addClass('active');
        $(this).siblings().removeClass('active');
        $('.sidebar ul li.active a').css({
            'background-color': selected_color,
            'box-shadow': shadow
        });
    });

    $(this).on('click', '#green', function () {
        var selected_color = $(this).attr('data-color');
        var shadow = $(this).attr('data-shadow');
        $(this).addClass('active');
        $(this).siblings().removeClass('active');
        $('.sidebar ul li.active a').css({
            'background-color': selected_color,
            'box-shadow': shadow
        });
    });

    $(this).on('click', '#orange', function () {
        var selected_color = $(this).attr('data-color');
        var shadow = $(this).attr('data-shadow');
        $(this).addClass('active');
        $(this).siblings().removeClass('active');
        $('.sidebar ul li.active a').css({
            'background-color': selected_color,
            'box-shadow': shadow
        });
    });

    $(this).on('click', '#danger', function () {
        var selected_color = $(this).attr('data-color');
        var shadow = $(this).attr('data-shadow');
        $(this).addClass('active');
        $(this).siblings().removeClass('active');
        $('.sidebar ul li.active a').css({
            'background-color': selected_color,
            'box-shadow': shadow
        });
    });

    $(this).on('click', '#rose', function () {
        var selected_color = $(this).attr('data-color');
        var shadow = $(this).attr('data-shadow');
        $(this).addClass('active');
        $(this).siblings().removeClass('active');
        $('.sidebar ul li.active a').css({
            'background-color': selected_color,
            'box-shadow': shadow
        });
    });

    $(this).on('click', '#data_entry_form .form-group', function () {
        $('#data_entry_form .is-focused').removeClass('is-focused');
        $(this).addClass('is-focused');
    });
    // END

    // CUSTOM DROP DOWN
    $(this).on('click', '.temp_edit_btn', function () {
        var $row = $(this).closest("tr");
        $('#temp_p_name_field').parent().addClass('is-focused');
        $('#temp_p_code_field').parent().addClass('is-focused');
        $('#temp_p_price_field').parent().addClass('is-focused');
        $('#temp_s_price_field').parent().addClass('is-focused');
        $('#temp_ws_price_field').parent().addClass('is-focused');
        $('#temp_quantity_field').parent().addClass('is-focused');

        $('#temp_p_name_field').val($row.find("td:eq(1)").text());
        $('#temp_p_code_field').val($row.find("td:eq(2)").text());
        $('#temp_p_price_field').val($row.find("td:eq(3)").text().slice(0, -2));
        $('#temp_s_price_field').val($row.find("td:eq(4)").text().slice(0, -2));
        $('#temp_ws_price_field').val($row.find("td:eq(5)").text().slice(0, -2));
        $('#temp_quantity_field').val($row.find("td:eq(6)").text());
        $('#temp_p_id_field').val($row.find("td:eq(7)").text());
        $('#data_entry_form').attr('action', '/purchase/tempUpdateData');
        $('#purchase_form_btn').text('Update');
    });

    $(this).on('click', '#category_card', function () {
        $('#category_card + div').slideToggle(500);
        $('#category_card i').toggleClass('rotation');
        $('#supplier_card + div').slideUp(500);
        $('#supplier_card i').removeClass('rotation')
        return false;
    });

    $(this).on('click', '#supplier_card', function () {
        $('#supplier_card + div').slideToggle(500);
        $('#supplier_card i').toggleClass('rotation');
        $('#category_card + div').slideUp(500);
        $('#category_card i').removeClass('rotation');
        return false;
    });

    $(document).click(function () {
        $('#category_card + div').slideUp(500);
        $('#supplier_card + div').slideUp(500);
        $('#category_card i').removeClass('rotation')
        $('#supplier_card i').removeClass('rotation')
    });

    $(".categ_list").click(function() {
        var catg = $(this).find(".categ").text();
        $('#category_card h5').text(catg);
        console.log(catg);
    });

    $(".supp_list").click(function() {
        var supp = $(this).find(".supp").text();
        $('#supplier_card h5').text(supp);
    });
    // END

    // WHEN USER SELECT CATEGORY
    $(this).on('click', '.selected_category', function () {
        $('#temp_category_field').val($(this).children('span').text());
    });
    // END

}); //END OF READY
