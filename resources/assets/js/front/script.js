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
    FormInputMask.init();
});

$(document).ready(function() {

    $('[data-toggle="confirmation"]').confirmation();

    $('.delete').on('confirmed.bs.confirmation', function (event) {
        var url = $(this).data('url');
        var tr = $(this).parents('tr');

        $.ajax({
            url: url,
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                _method: 'delete'
            },
            type: "POST",
        })
            .done(function(data) {
                tr.remove();
            });
    });

    $('div#user-login button[type=submit]').on('click', function(event) {
        event.preventDefault();

        var form = $('div#user-login form');
        var email = $($(form).find('input[name=email]')[0]).val();
        var password = $($(form).find('input[name=password]')[0]).val();

        $.ajax({
            url: '/service/check-login',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                email: email,
                password: password
            },
            type: "POST"
        })
            .done(function(json) {
                if(json.success) {
                    form.submit();
                }
                else {
                    var error_message = '';
                    json.message.forEach(function(item, index) {
                        error_message += ('<li>' + item + '</li>')
                    });
                    $($(form).find('div.errors ul')[0]).html(error_message);
                    $($(form).find('div.errors')).show();
                }
            });
    });
});