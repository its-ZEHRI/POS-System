$(document).ready(function () {

    refresh_Temp_Product_table();
    refresh_Supplier_table();
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')}
    })
// <====================>  PURCHASE PAGE <====================>

    // ENTRY FORM OF PURCHASE
    $(this).on('click', '#purchase_form_btn', function (event) {
        event.preventDefault();``
        // var formdata = new FormData(this);
        var data = {
            'product_name': $('#temp_p_name_field').val(),
            'p_code'      : $('#temp_p_code_field').val(),
            'p_price'     : $('#temp_p_price_field').val(),
            'ws_price'    : $('#temp_ws_price_field').val(),
            's_price'     : $('#temp_s_price_field').val(),
            'quantity'    : $('#temp_quantity_field').val(),
            'category_id' : $('#temp_category_field').val(),
            'supplier_id' : $('#temp_category_field').val(),
        }
        $.ajax({
            type     : 'POST',
            url      : '/purchase/tempCreateData',
            dataType : 'json',
            data     : data,
            success: function (response) {
                if (response.status == 200) {
                    refresh_Temp_Product_table()
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
                $('#error_alert').click();
                // alert('function Error -- error')
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
                {
                    refresh_Temp_Product_table()
                    $('#data_entry_form')[0].reset()
                    $('#update_alert').click();
                    $('#purchase_form_update_btn'  ).text('Save');
                    $('#purchase_form_update_btn').attr('id', 'purchase_form_btn');
                    resetForm()
                }
                    if(response.status == 400){
                        $('#invalid_update_alert').click()
                        $('#data_entry_form')[0].reset()
                        resetForm();
                    }
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
                    $('#invalid_alert').click()
                }
                else if (response.status == 200) {
                    refresh_Temp_Product_table()
                    $('#delete_alert').click();
                }
            }
        })//END OF AJAX
    })//END OF DELETE

    function refresh_Temp_Product_table(e) {
        $.ajax({
            type: 'GET',
            url: '/refreshPurchase',
            success: function (response) {
                if (response.status == 200) {
                    $('#temp_table tbody').html('')
                    $("#total_amount").removeClass('disabled')
                    $('#total_amount').val('0/-')
                    $.each(response.products, function (key, item) {
                        $('#temp_table').append('<tr>\
                        <td> '+ (key + 1) + '  </td>\
                        <td> '+ item.product_name + '  </td>\
                        <td> '+ item.p_code + '  </td>\
                        <td class="col_price"> '+ item.p_price + '/-</td>\
                        <td> '+ item.ws_price + '/-</td>\
                        <td> '+ item.s_price + '/-</td>\
                        <td> '+ item.quantity + '  </td>\
                        <td class="d-none">'+ item.id + '</td>\
                        <td>'+ "<a href='#top'><i id='' style='font-size: 20px' class='temp_edit_btn text-info fa-solid fa-pen-to-square'></i>" + '</td>\
                        <td>'+ '<button value="' + item.id + '" class="temp_delete_btn">\
                            <i style = "font-size: 20px" class= "text-rose fa-solid fa-trash-can" ></i>\
                            </button>'+ '</td >\
                    </tr> ')
                    })//END OF EACH
                    PriceTable()
                }//END OF IF
                else {
                    $('#error_alert').click()
                }
            },//END OF SUCCESS
            error: function (response) {
                $('#error_alert').click()
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

    // GETTING THE VALUES FROM TABLE FOR DISPLAY TO USER
    function PriceTable() {
        $('#temp_table .col_price').each(function () {
            var total = parseInt($('#total_amount').val().slice(0, -2));
            total = parseInt($(this).text().slice(0, -2)) + total;
            $('#total_amount').val(total + "/-");
            $("#total_amount").addClass('disabled')
        });
    }
    // END

    // <====================>  PURCHASE PAGE END  <====================>


    // <====================>  SUPPLIER PAGE <====================>

    $(this).on('submit', '#add_supplier_form', function (event) {
        // alert('done')
        event.preventDefault()
        // var formdata = new FormData(this);
        var formdata = {
            'name' : $('#supplier_name').val(),
            'contact' : $('#supplier_contact').val(),
            'address': $('#supplier_address').val(),
        }
        $.ajax({
            type : 'POST',
            url  : 'supplier/createSupplier',
            data: formdata,
            success: function (response) {
                if (response.status == 200) {
                    $('#save_alert').click()
                    refresh_Supplier_table()
                }
                else
                    $('#error_alert').click()

            },
            error: function (response) {
                $('#error_alert').click()
            },
        })//END OF AJAX
    })//END OF SUBMIT


    function refresh_Supplier_table() {
        $.ajax({
            type: 'GET',
            url: '/refreshSupplier',
            success: function (response) {
                if (response.status == 200) {
                    $('#supplier_table tbody').html('')
                    $.each(response.suppliers, function (key, item) {
                        $('#supplier_table').append('<tr>\
                        <td> '+ (key + 1) +    '  </td>\
                        <td> '+ item.name +    '  </td>\
                        <td> '+ item.contact + '  </td>\
                        <td> '+ item.address + '  </td>\
                        <td class="d-none">'+ item.id + '</td>\
                        <td>'+ "<a href='#top'><i id='' style='font-size: 20px' class='temp_edit_btn text-info fa-solid fa-pen-to-square'></i>" + '</td>\
                        <td>'+ '<button value="' + item.id + '" class="temp_delete_btn">\
                            <i style = "font-size: 20px" class= "text-rose fa-solid fa-trash-can" ></i>\
                            </button>'+ '</td >\
                    </tr> ')
                    })//END OF EACH
                }//END OF IF
                else {
                    $('#error_alert').click()
                }
            },//END OF SUCCESS
            error: function (response) {
                $('#error_alert').click()
            }
        })//END OF AJAX
    }//END OF REFRESH


















    // <====================>  SUPPLIER PAGE END  <====================>

})//END OF READY
