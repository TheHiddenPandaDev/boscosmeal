jQuery(document).ready(function($) {
    $.urlParam = function(name) {
	var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
        if (results == null) {
            return null;
        } else {
            console.log('order_id = ' + results[1] || 0 + '');
            return results[1] || 0;
        }
    }
    if ($('#payment_method_redsys').is(':checked')) {
		var order_id = $.urlParam('order_id');
		var domain = '<?php echo esc_url( $final_notify_url ); ?>';
		var url = domain + '&redsys-order-id=' + order_id + '&redsys-iframe=yes';
		if (order_id != null) {
			console.log('order_id = ' + order_id);
			$('#redsys-iframe').attr('src', url);
			$('#open-popup').fadeIn();
		}
	}
    $('body').on('click', '#close-popup', function() {
		var url = '<?php echo esc_url( $current_page ); ?>';
		$('#open-popup').fadeOut();
		window.location.href = url;
	});
});