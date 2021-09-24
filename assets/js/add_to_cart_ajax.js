jQuery(document).ready(function($) {
    $('.single_add_to_cart_button').on('click', function(e) {
        e.preventDefault();

        var $thisbutton = $(this);
        var $form = $thisbutton.closest('form.cart')
        var variation_id = '';
        var quantity = 1;

        if($thisbutton.attr('id')) {
            var id = $thisbutton.attr('id').replace('single_add_to_cart_button_', '')
            var product_id = id
        }

        if(!product_id) {
            product_id = $form.find('input[name=product_id]').val();
        }
        
        variation_id = $form.find('input[name=variation_id]').val();
        quantity = $form.find('input[name=quantity]').val();

        var data = {
                action: 'ql_woocommerce_ajax_add_to_cart',
                product_id: product_id,
                product_sku: '',
                quantity: quantity,
                variation_id: variation_id,
            };
        $.ajax({
                type: 'post',
                url: wc_add_to_cart_params.ajax_url,
                data: data,
                beforeSend: function (response) {
                    $thisbutton.removeClass('added').addClass('loading');
                },
                complete: function (response) {
                    $thisbutton.addClass('added').removeClass('loading');
                }, 
                success: function (response) { 
                    if (response.error & response.product_url) {
                        window.location = response.product_url;
                        return;
                    } else { 
                        $(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash, $thisbutton]);
                        $(".added_to_cart").attr('target' ,'_blank');
                    } 
                }, 
        }); 
    });

    $("a.added_to_cart").attr('target' ,'_blank');
    
    $('a.added_to_cart').on('click', function(e) {
        e.preventDefault();
    });
    
});