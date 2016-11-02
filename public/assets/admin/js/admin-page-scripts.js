/**
 * Created by trungtran on 26/2/2016.
 */

/**
 * remove vi sign
 *
 * @param str
 * @returns {string|*}
 */
function vnToEn(str) {

    str= str.toLowerCase();
    str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");
    str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");
    str= str.replace(/ì|í|ị|ỉ|ĩ/g,"i");
    str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");
    str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");
    str= str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");
    str= str.replace(/đ/g,"d");
    str= str.replace(/ /g,"-");
    return str;

}

function getFormSelectedItem(form) {
    var message = '';
    var checkbox = $(form).find('input:checked').not('input.group-checkable');

    if(checkbox.length == 0) {
        return '';
    }

    // Build body dialog box message
    checkbox.each(function(index) {
        var tableRow = $(this).parents('tr');
        var itemId = $(tableRow).find('.item-id');
        var itemName = $(tableRow).find('.item-name');

        message += '<p>';
        message += '<b>' + $(itemName).text() + '</b> [';
        message +=  $(itemId).text().length == 0 ? $(itemId).val() : $(itemId).text();
        message += ']</p>';
    });

    return message;
}

$(document).ready(function() {
    //$('ul.page-sidebar-menu > li > ul').addClass('sub-menu');

    $('.to-slug').on('keyup blur', function(event) {
        var target = $(this).attr('data-target');
        var data = $(this).val();

        console.log(target);
        console.log(data);
        console.log(vnToEn(data));

        $(target).val(vnToEn(data));
    });

    $('.delete-file').on('confirmed.bs.confirmation', function(event) {
        var button = $(this);
        var link = button.data('link');
        var id = button.data('id');

        $.ajax({
            url: link,
            data: {
                id: id,
                _token: $('meta[name="csrf-token"]').attr('content'),
                _method: 'delete',
                delete_image: '1',
                id: id
            },
            type: "POST",
            success: function(data) {
                console.log('Trung');
                console.log(data);
                $(button.parents('tr')).remove();
            }
        });


    });

    $('#confirmation-modal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);

        var modalTitle = button.data('modal-title');

        // Form attributes
        var formAction = button.data('form-action');
        var formTarget = button.data('form-target');
        var formAction = button.data('form-action');
        var formMethod = button.data('form-method');


        var form = $('form' + formTarget);

        // set form attributes
        form.attr('action', formAction);
        form.find('input[name="_method"]').val(formMethod);

        var modal = $(this);
        var modalMessage = getFormSelectedItem(form);
        if(modalMessage.length == 0) event.preventDefault();
        modal.find('div.model-message').html(modalMessage);
        modal.find('.submit-form').attr('data-target', formTarget);
    });

    $('.submit-form').on('click', function(event) {
        var form = $($(this).data('target'));
        var action = $(this).data('action');
        var method = $(this).data('method');

        if(typeof action != 'undefined') {
            form.attr('action', action);
            form.find('input[name="_method"]').val(method);
        }

        form.submit();
    });

    $('.x-editable').editable({
        params: function(params) {
            params._token = $("meta[name=csrf-token]").attr("content");
            params._method = 'put';

            return params;
        }
    });

    $('.click-to-enable').on('click', function(event) {
        $($(this).data('target')).prop('disabled', false);
    });
});
var FormInputMask = function () {

    var handleInputMasks = function () {
        $(".mask-date").inputmask("d/m/y", {
            autoUnmask: true
        });

        $(".mask-datetime").inputmask("d/m/y h:s", {
            autoUnmask: true
        });

        $(".mask-currency").inputmask("decimal", {
            groupSeparator: ',',
            autoGroup: true,
            rightAlign: false
        });

        $(".mask-numeric").inputmask("decimal", {
            rightAlign: false
        });
    };

    return {
        //main function to initiate the module
        init: function () {
            handleInputMasks();
        }
    };

}();

jQuery(document).ready(function() {
    FormInputMask.init(); // init metronic core componets
});
/**
 * Created by trungtran on 23/2/2016.
 */
var TableDatatablesManaged = function () {

    var initTable = function () {

        var table = $('.data-table-checkable');

        // begin first table
        var dataTable = table.dataTable({
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ records",
                "infoEmpty": "No records found",
                "infoFiltered": "(filtered1 from _MAX_ total records)",
                "lengthMenu": "Show _MENU_",
                "search": "Search:",
                "zeroRecords": "No matching records found",
                "paginate": {
                    "previous":"Prev",
                    "next": "Next",
                    "last": "Last",
                    "first": "First"
                }
            },

            "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.

            "columnDefs": [ {
                "targets": 0,
                "orderable": false,
                "searchable": false
            }],

            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 15,
            "pagingType": "bootstrap_full_number",
            "order": [
            ] // set first column as a default sort by asc


        });


        var ajaxDeleteLink  = $(table).attr('data-delete-link');
        var ajaxToggleLink = $(table).attr('data-toggle-link');
        var ajaxCategoryLink = $(table).attr('data-category-link');

        // Delete row
        table.on('confirmed.bs.confirmation', '.delete-item', function (e) {
            var current_row = $(this).parents('tr')[0];
            // ID of current user
            var id = $(current_row).find('input[type=checkbox]').val();

            $.ajax({
                url: ajaxDeleteLink,
                data: {
                    id: id,
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    _method: 'delete'
                },
                type: "POST",
                success: function($data) {
                    if($data > 1){
                        bootbox.dialog({
                            message: 'Chứa tin rao vat hoặc danh danh mục con',
                            title: "Không được phép xóa danh mục ",
                            buttons: {
                                main: {
                                    label: "Cancel",
                                    className: "blue",
                                    callback: function() {

                                    }
                                }

                            }
                        });
                        exit();
                    }
                    dataTable.fnDeleteRow(current_row);
                }
            });

        });

        $("select#find").change(function(){
            $('#engine').find('option').remove().end();
            var category_id = $(this).find("option:selected").val();

            $.ajax({
                url: ajaxCategoryLink,
                type:'POST',
                data:{
                    category_id:category_id,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                dataType:'text',
                cache:false,
                success:function(data){
                    console.log(data);
                    $("#engine").empty();
                    $("#engine").html(data);
                },

            });
        });


        // Toggle item
        table.on('click', '.toggle-item', function (e) {

            e.preventDefault();

            var current_row = $(this).parents('tr')[0];
            // ID of current user
            var id = $(current_row).find('input[type=checkbox]').val();
            var property = $(this).attr('data-property');

            var activeStatusIcon = $(this).find('i');

            $(activeStatusIcon).removeClass().addClass('fa fa-cog fa-spin fa-lg');

            $.ajax({
                url: ajaxToggleLink,
                data: {
                    id: id,
                    property: property,
                    _method: 'PUT',
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                success: function(data) {
                    if(data == 1) {
                        $(activeStatusIcon).removeClass().addClass('fa fa-check fa-lg');
                    }
                    else {
                        $(activeStatusIcon).removeClass().addClass('fa fa-times fa-lg');
                    }
                }
            });

        });



        table.find('.group-checkable').change(function () {
            var set = jQuery(this).attr("data-set");
            var checked = jQuery(this).is(":checked");
            jQuery(set).each(function () {
                if (checked) {
                    $(this).prop("checked", true);
                    $(this).parents('tr').addClass("active");
                } else {
                    $(this).prop("checked", false);
                    $(this).parents('tr').removeClass("active");
                }
            });
            jQuery.uniform.update(set);
        });

        table.on('change', 'tbody tr .checkboxes', function () {
            $(this).parents('tr').toggleClass("active");
        });
    };

    return {

        //main function to initiate the module
        init: function () {
            if (!jQuery().dataTable) {
                return;
            }

            initTable();
        }

    };

}();

if (App.isAngularJsApp() === false) {
    jQuery(document).ready(function() {
        TableDatatablesManaged.init();
    });
}
    var UIBootbox = function () {

    var handleDemo = function() {

        $('.delete-items').click(function(){
            var targetForm = $(this).attr('data-target');
            var form = $('form' + targetForm);
            var message = '';
            var checkbox = $(form).find('input:checked').not('input.group-checkable');
            var link = $(this).attr('data-delete-link');

            // Set action form attribute
            $(form).attr('action', link);

            // Return if doesn't any item
            if(checkbox.length == 0) {
                return;
            }

            // Build body dialog box message
            checkbox.each(function(index) {
                var tableRow = $(this).parents('tr');
                var itemId = $(tableRow).find('.item-id');
                var itemName = $(tableRow).find('.item-name');

                message += '<p>';
                message += '<b>' + $(itemName).text() + '</b> [';
                message +=  $(itemId).text().length == 0 ? $(itemId).val() : $(itemId).text();
                message += ']</p>';
            });

            // Show dialog box
            bootbox.dialog({
                message: message,
                title: "Are you sure to delete following items: ",
                buttons: {
                    main: {
                        label: "Cancel",
                        className: "blue",
                        callback: function() {

                        }
                    },
                    delete: {
                        label: "Delete",
                        className: "red",
                        callback: function() {
                            $(form).append('<input type="hidden" name="_method" value="delete" />');
                            $(form).submit();
                        }
                    }
                }
            });
        });

        $('.confirmation-box').click(function() {

        });

    };

    return {

        //main function to initiate the module
        init: function () {
            handleDemo();
        }
    };

}();

jQuery(document).ready(function() {
   UIBootbox.init();
});