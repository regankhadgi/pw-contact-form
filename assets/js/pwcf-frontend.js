jQuery(document).ready(function ($) {
    $('body').on('submit', '.pwcf-form', function (e) {
        var selector = $(this);
        e.preventDefault();
        var name_field = selector.find('.pwcf-name-field').val();
        var email_field = selector.find('.pwcf-email-field').val();
        var message_field = selector.find('.pwcf-message-field').val();
        $.ajax({
            type: 'post',
            url: pwcf_js_obj.ajax_url,
            data: {
                name_field: name_field,
                email_field: email_field,
                message_field: message_field,
                _wpnonce: pwcf_js_obj.ajax_nonce
            },
            beforeSend: function (xhr) {
                selector.find('.pwcf-ajax-loader').show();
            },
            success: function (res) {
                selector.find('.pwcf-ajax-loader').hide();
                res = $.parseJSON(res);
                if (res.status == 200) {

                } else {

                }
            }
        });

    });
});