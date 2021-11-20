/*******************************************************************************
*  LARAVEL PHP FRAMEWORK  JSS Invoice Management System                                                *
*                                                                              *                                                               *
* Author:  Alagie Singhateh                                   				   *
* Email:  3939919@gmail.com                                    				   *
* Website:  https:://www.jambasangsang.com                                    				   *
*******************************************************************************/

$(document).ready(function () {

    // Invoice Type
    $('#invoice_types').change(function () {
        var invoiceType = $("#invoice_types option:selected").text();
        $(".invoice_type").text(invoiceType);
    });

    // Load dataTables
    $("#data-table").dataTable();

    // password strength
    var options = {
        onLoad: function () {
            $('#messages').text('Start typing password');
        },
        onKeyUp: function (evt) {
            $(evt.target).pwstrength("outputErrorList");
        }
    };
    $('#password').pwstrength(options);


    $(document).on('click', ".item-select", function (e) {

        e.preventDefault;

        var product = $(this);

        $('#add_product').modal({ backdrop: 'static', keyboard: false }).one('click', '#selected', function (e) {

            var itemText = $('#add_product').find("option:selected").text();
            var itemValue = $('#add_product').find("option:selected").val();
            var itemId = $('#add_product').find("option:selected").attr('data-product-id');

            $(product).closest('tr').find('.invoice_product').val(itemText);
            $(product).closest('tr').find('.invoice_product_price').val(itemValue);
            $(product).closest('tr').find('.invoice_product_id').val(itemId);

            updateTotals('.calculate');
            calculateTotal();

        });

        return false;

    });

    $(document).on('click', ".create-new-customer", function (e) {
        e.preventDefault;
        $('#add_new_customer').modal({ backdrop: 'static', keyboard: false });
        return false;
    });

    $(document).on('click', ".select-existing-customer", function (e) {

        e.preventDefault;

        var customer = $(this);

        $('#add_customer').modal({ backdrop: 'static', keyboard: false });

        return false;

    });

    $(document).on('click', ".customer-select", function (e) {

        $('.customers-templete').css('display', 'block');
        var customer_id = $(this).attr('data-customer-id');
        var customer_name = $(this).attr('data-customer-name');
        var customer_email = $(this).attr('data-customer-email');
        var customer_phone = $(this).attr('data-customer-phone');

        var customer_address_1 = $(this).attr('data-customer-address-1');
        var customer_address_2 = $(this).attr('data-customer-address-2');
        var customer_city = $(this).attr('data-customer-city');
        var customer_country = $(this).attr('data-customer-country');
        var customer_postcode = $(this).attr('data-customer-postcode');

        var customer_name_ship = $(this).attr('data-customer-name-ship');
        var customer_address_1_ship = $(this).attr('data-customer-address-1-ship');
        var customer_address_2_ship = $(this).attr('data-customer-address-2-ship');
        var customer_city_ship = $(this).attr('data-customer-city-ship');
        var customer_country_ship = $(this).attr('data-customer-country-ship');
        var customer_postcode_ship = $(this).attr('data-customer-postcode-ship');

        $('#customer_id').val(customer_id);
        $('#customer_name').val(customer_name);
        $('#customer_email').val(customer_email);
        $('#customer_phone').val(customer_phone);

        $('#customer_address_1').val(customer_address_1);
        $('#customer_address_2').val(customer_address_2);
        $('#customer_city').val(customer_city);
        $('#customer_country').val(customer_country);
        $('#customer_post_code').val(customer_postcode);


        $('#customer_ship_name').val(customer_name_ship);
        $('#customer_ship_address_1').val(customer_address_1_ship);
        $('#customer_ship_address_2').val(customer_address_2_ship);
        $('#customer_ship_city').val(customer_city_ship);
        $('#customer_ship_country').val(customer_country_ship);
        $('#customer_ship_post_code').val(customer_postcode_ship);

        $('#add_customer').modal('hide');

    });

    // update invoice
    $(document).on('click', "#action_edit_invoice", function (e) {
        e.preventDefault();
        updateInvoice();
    });

    // enable date pickers for due date and invoice date
    var dateFormat = $(this).attr('data-vat-rate');
    $('#invoice_date, #invoice_due_date').datetimepicker({
        showClose: false,
        format: 'YYYY-MM-DD HH:mm'
    });

    // copy customer details to shipping
    $('input.copy-input').on("input", function () {
        $('input#' + this.id + "_ship").val($(this).val());
    });

    // remove product row
    $('#invoice_table').on('click', ".delete-row", function (e) {
        e.preventDefault();
        $(this).closest('tr').remove();
        calculateTotal();
    });

    // add new product row on invoice
    var cloned = $('#invoice_table tr:last').clone();
    $(".add-row").click(function (e) {
        e.preventDefault();
        cloned.clone().appendTo('#invoice_table');
    });

    calculateTotal();

    $('#invoice_table').on('input', '.calculate', function () {
        updateTotals(this);
        calculateTotal();
    });

    $('#invoice_totals').on('input', '.calculate', function () {
        calculateTotal();
    });

    $('#invoice_product').on('input', '.calculate', function () {
        calculateTotal();
    });

    $('.remove_vat').on('change', function () {
        calculateTotal();
    });

    function updateTotals(elem) {

        var tr = $(elem).closest('tr'),
            quantity = $('[name="invoice_product_qty[]"]', tr).val(),
            price = $('[name="invoice_product_price[]"]', tr).val(),
            isPercent = $('[name="invoice_product_discount[]"]', tr).val().indexOf('%') > -1,
            percent = $.trim($('[name="invoice_product_discount[]"]', tr).val().replace('%', '')),
            subtotal = parseInt(quantity) * parseFloat(price);

        if (percent && $.isNumeric(percent) && percent !== 0) {
            if (isPercent) {
                subtotal = subtotal - ((parseFloat(percent) / 100) * subtotal);
            } else {
                subtotal = subtotal - parseFloat(percent);
            }
        } else {
            $('[name="invoice_product_discount[]"]', tr).val('');
        }

        $('.calculate-sub', tr).val(subtotal.toFixed(2));
    }

    function calculateTotal() {

        var grandTotal = 0,
            disc = 0,
            c_ship = parseInt($('.calculate.shipping').val()) || 0;

        $('#invoice_table tbody tr').each(function () {
            var c_sbt = $('.calculate-sub', this).val(),
                quantity = $('[name="invoice_product_qty[]"]', this).val(),
                price = $('[name="invoice_product_price[]"]', this).val() || 0,
                subtotal = parseInt(quantity) * parseFloat(price);

            grandTotal += parseFloat(c_sbt);
            disc += subtotal - parseFloat(c_sbt);
        });

        // VAT, DISCOUNT, SHIPPING, TOTAL, SUBTOTAL:
        var subT = parseFloat(grandTotal),
            finalTotal = parseFloat(grandTotal + c_ship),
            vat = parseInt($('.invoice-vat').attr('data-vat-rate'));

        $('.invoice-sub-total').text(subT.toFixed(2));
        $('#invoice_subtotal').val(subT.toFixed(2));
        $('.invoice-discount').text(disc.toFixed(2));
        $('#invoice_discount').val(disc.toFixed(2));

        if ($('.invoice-vat').attr('data-enable-vat') === '1') {

            if ($('.invoice-vat').attr('data-vat-method') === '1') {
                $('.invoice-vat').text(((vat / 100) * finalTotal).toFixed(2));
                $('#invoice_vat').val(((vat / 100) * finalTotal).toFixed(2));
                $('.invoice-total').text((finalTotal).toFixed(2));
                $('#invoice_total').val((finalTotal).toFixed(2));
            } else {
                $('.invoice-vat').text(((vat / 100) * finalTotal).toFixed(2));
                $('#invoice_vat').val(((vat / 100) * finalTotal).toFixed(2));
                $('.invoice-total').text((finalTotal + ((vat / 100) * finalTotal)).toFixed(2));
                $('#invoice_total').val((finalTotal + ((vat / 100) * finalTotal)).toFixed(2));
            }
        } else {
            $('.invoice-total').text((finalTotal).toFixed(2));
            $('#invoice_total').val((finalTotal).toFixed(2));
        }

        // remove vat
        if ($('input.remove_vat').is(':checked')) {
            $('.invoice-vat').text("0.00");
            $('#invoice_vat').val("0.00");
            $('.invoice-total').text((finalTotal).toFixed(2));
            $('#invoice_total').val((finalTotal).toFixed(2));
        }

    }

    // Form Validations
    function validateForm() {
        // error handling
        var errorCounter = 0;

        $(".required").each(function (i, obj) {

            if ($(this).val() === '') {
                $(this).parent().addClass("has-error");
                errorCounter++;
            } else {
                $(this).parent().removeClass("has-error");
            }


        });

        return errorCounter;
    }

    // Reset FlashMessage
    $(document).on('click', ".fa-lg", function (event) {
        $('#FlashMessage').html('');
    })

    $(document).on('submit', "#CurrentForm", function (event) {

        event.preventDefault(); //prevent default action
        var url = $(this).attr("action"); //get form action url
        var request_method = $(this).attr("method"); //get form GET/POST method
        var form_data = new FormData(this);

        var errorCounter = validateForm();
        var URL = $('#InvoiceIndex').attr('data-url');
        if (errorCounter > 0) {
            $('#FlashMessage').html('<div class="alert alert-danger text-white"><i class="fa fa-exclamation-circle fa-lg float-left " ></i>&nbsp;&nbsp;  ' + data.error + ' <i class="fa fa-times fa-lg" style="cursor:pointer"><i></div>').fadeIn('slow');
            $("#response").removeClass("alert-success").addClass("alert-danger").fadeIn();
            $("#response .message").html("<strong>Error</strong>: It appear's you have forgotten to complete something!");
        } else {
            $.ajax({
                url: url,
                type: request_method,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: form_data,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function (data) {

                    if (data.invoice_id != null) {
                        location.replace(URL);
                    } else {

                        $('#FlashMessage').html('<div class="alert alert-success text-white"><i class="fa fa-exclamation-circle fa-lg float-left " ></i>&nbsp;&nbsp;  ' + data.success + ' <i class="fa fa-times-circle fa-lg float-right" style="cursor:pointer"><i></div>').fadeIn('slow');
                        $("#CurrentForm")[0].reset();
                        $('#openCreateModal').modal('hide');
                        Index();


                        // Redirect Route to Download or Preview Pdf Start Here
                        var urls = $('#printUrl').attr('data-print-url');
                        var newUrls = urls.replace('id', data.printInvoiceId);
                        var downloadUrl = newUrls.replace('optionvalue', data.option);
                        if (data.option == 'download') {
                            location.replace(downloadUrl);
                        } else if (data.option == 'preview') {
                            window.open(downloadUrl, '_blank');
                        }
                        // Ends Herer

                    }
                },
                error: function (data) {
                    $('#FlashMessage').html('<div class="alert alert-danger text-white"><i class="fa fa-exclamation-circle fa-lg float-left " ></i>&nbsp;&nbsp;  ' + data.error + ' <i class="fa fa-times-circle fa-lg float-right" style="cursor:pointer"><i></div>').fadeIn('slow');
                    $("#CurrentForm")[0].reset();
                }
            });
        }



    });

    $(document).on('click', ".openCreateModal", function (e) {
        e.preventDefault;
        $('#openCreateModal').modal({ backdrop: 'static', keyboard: false });
        return false;

    });

    // Showing Invoice Edit Modal
    if ($('#editModalshow').val() == 'editModalshow') {
        $('#openCreateModal').modal({ backdrop: 'static', keyboard: false });
    }

});


function Index() {
    var url = $('#ContainerTable').attr('data-url');
    $.ajax({
        url: url,
        type: 'GET',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        dataType: 'json',
        success: function (data) {
            $("#tableIndex").html(data.view);
            window.history.pushState(null, null, url);
        },

    });
}

function singleDelete(id) {
    var singleDelete_url = $('.singleDelete' + id).attr('data-singleDelete');
    var password = $('#confirmPassword').val();

    $.ajax({
        url: singleDelete_url,
        type: 'DELETE',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: { password: password },
        dataType: 'json',
        success: function (data) {
            if (data.not_valid) {
                Confirm('Confirm', 'Are you sure you want to delete this?', 'Yes', 'Cancel', id);
                $('#errorMessage').text(data.not_valid);
                return;
            }
            else if (data.success) {
                $('#FlashMessage').html('<div class="alert alert-success text-white"><i class="fa fa-exclamation-circle fa-lg float-left " ></i>&nbsp;&nbsp;  ' + data.success + ' <i class="fa fa-times-circle fa-lg float-right" style="cursor:pointer"><i></div>').fadeIn('slow');
                Index()
            } else {
                $('#FlashMessage').html('<div class="alert alert-danger text-white"><i class="fa fa-exclamation-circle fa-lg float-left " ></i>&nbsp;&nbsp;  ' + data.error + ' <i class="fa fa-times-circle fa-lg float-right" style="cursor:pointer"><i></div>').fadeIn('slow');
            }
        },
    });
}

function Confirm(title, msg, $true, $false, link = null) { /*change*/
    var $content = "<div class='dialog-ovelay'>" +
        "<div class='dialog'><header>" +
        " <h3> " + title + " </h3> " +
        "<i class='fa fa-close'></i>" +
        "</header>" +
        "<div class='dialog-msg'>" +
        " <p> " + msg + " </p> <br>" +
        "<span class='text-danger' id='errorMessage'></span>" +
        " <input type='text' autocomplete='off' id='confirmPassword'  placeholder='Enter your password to delete' class='form-control'> " +
        "</div>" +
        "<footer>" +
        "<div class='controls'>" +
        " <button class='button button-danger text-center doAction' data-option=" + link + ">" + $true + "</button> " +
        " <button class='button button-default text-center cancelAction'>" + $false + "</button> " +
        "</div>" +
        "</footer>" +
        "</div>" +
        "</div>";
    $('body').prepend($content);

    $('.doAction').click(function () {
        if ($('#confirmPassword').val() == '') {
            return $('#errorMessage').text('please enter password is required');
        }
        var global = $(this).attr('data-option');

        if (global != 'bulkDelete') {
            singleDelete(global)
        } else {
            bulkDelete();
        }

        $(this).parents('.dialog-ovelay').fadeOut(500, function () {
            $(this).remove();
        });
    });
    $('.cancelAction, .fa-close').click(function () {
        $(this).parents('.dialog-ovelay').fadeOut(500, function () {
            $(this).remove();
        });
    });

    $('#confirmPassword').on('keyup', function () {
        if ($(this).val() != '') {
            $(this).prop("type", "password");
        } else {
            $(this).prop("type", "text");
        }
    })
}
