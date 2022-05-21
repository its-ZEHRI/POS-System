$(document).ready(function () {

    refresh();
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')}
    })

    // ENTRY FORM OF PURCHASE
    $(this).on('click', '#purchase_form_btn', function (e) {
        e.preventDefault();
        // var formdata = new FormData(this);
        var data = {
            'product_name': $('#temp_p_name_field').val(),
            'p_code'      : $('#temp_p_code_field').val(),
            'p_price'     : $('#temp_p_price_field').val(),
            'ws_price'    : $('#temp_ws_price_field').val(),
            's_price'     : $('#temp_s_price_field').val(),
            'quantity'    : $('#temp_quantity_field').val(),
            'category_id' : $('#temp_category_field').val(),
        }
        $.ajax({
            type     : 'POST',
            url      : '/purchase/tempCreateData',
            dataType : 'json',
            data     : data,
            success: function (response) {
                if (response.status == 200) {
                    refresh()
                    var s_no = parseInt($('#s_no').text())
                    $('#s_no').text(s_no + 1)
                    $("#data_entry_form")[0].reset();
                    $('#save_alert').click();
                    resetForm()
                }
                else
                    alert('else wala error')
            },
            error: function (response) {
                alert('function Error -- error')
            }
        })  // END OF AJAX
    }) // END OF ENTRY FORM OF PURCHASE

    //  UPDATE FORM OF PURCHASE
    $(this).on('click', '#purchase_form_update_btn', function (event) {
        event.preventDefault()
        var FormData = {
            'id'          : $('#temp_p_id_field').val(),
            'product_name': $('#temp_p_name_field').val(),
            'p_code'      : $('#temp_p_code_field').val(),
            'p_price'     : $('#temp_p_price_field').val(),
            'ws_price'    : $('#temp_ws_price_field').val(),
            's_price'     : $('#temp_s_price_field').val(),
            'quantity'    : $('#temp_quantity_field').val(),
            'category_id' : $('#temp_category_field').val(),
        }
        $.ajax({
            type: 'POST',
            url: '/purchase/tempUpdateData',
            data: FormData,
            success: function (response) {
                if (response.status == 200)
                    refresh()
                    $('#data_entry_form')[0].reset()
                    $('#update_alert').click();
                    $('#purchase_form_update_btn'  ).text('Save');
                    $('#purchase_form_update_btn').attr('id', 'purchase_form_btn');
                    resetForm()
            },
            error: function (response) {
                alert('Ajax function Error...!!')
            }

        }) // END OF AJAX
    }) // END OF UPDATE FORM OF PURCHASE

    $(this).on('click', '.temp_delete_btn', function () {
        var id = $(this).val();
        // alert(id)
        $.ajax({
            type: 'GET',
            url: '/purchase/destroy/' + id,
            success: function (response) {
                if (response.status == 400) {
                    alert(response.message)
                }
                else if (response.status == 200) {
                    refresh()
                    $('#delete_alert').click();
                }
            }

        })//END OF AJAX
    })//END OF DELETE

    function refresh(e) {
        $.ajax({
            type: 'GET',
            url: '/refreshPurchase',
            success: function (response) {
                $('#temp_table tbody').html('');
                $.each(response.products, function (key, item) {
                    $('#temp_table').append('<tr>\
                        <td> '+key              +'  </td>\
                        <td> '+item.product_name+'  </td>\
                        <td> '+item.p_code      +'  </td>\
                        <td> '+item.p_price     +'/-</td>\
                        <td> '+item.ws_price    +'/-</td>\
                        <td> '+item.s_price     +'/-</td>\
                        <td> '+item.quantity    +'  </td>\
                        <td class="d-none">'+item.id+'</td>\
                        <td>'+"<a href='#top'><i id='' style='font-size: 20px' class='temp_edit_btn text-info fa-solid fa-pen-to-square'></i>"+'</td>\
                        <td>'+'<button value="'+item.id+'" class="temp_delete_btn">\
                            <i style = "font-size: 20px" class= "text-rose fa-solid fa-trash-can" ></i>\
                            </button>'+'</td >\
                    </tr> ')
                })//END OF EACH
            }
        })//END OF AJAX
    }//END OF REFRESH

    // RESET ALL THE INPUT FIELD OF DATA ENTRY FORM
    function resetForm() {
        $('#temp_p_name_field'  ).parent().removeClass('is-focused is-filled');
        $('#temp_p_code_field'  ).parent().removeClass('is-focused is-filled');
        $('#temp_p_price_field' ).parent().removeClass('is-focused is-filled');
        $('#temp_s_price_field' ).parent().removeClass('is-focused is-filled');
        $('#temp_ws_price_field').parent().removeClass('is-focused is-filled');
        $('#temp_quantity_field').parent().removeClass('is-focused is-filled');
    }// END


})//END OF READY
