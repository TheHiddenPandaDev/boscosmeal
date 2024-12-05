jQuery(document).ready(function($) {
    // Captura los datos del navegador y la pantalla
    const navegadorBase64 = btoa(navigator.userAgent);
    const idioma = navigator.language;
    const jsHabilitado = 'true';
    const alturaPantalla = window.screen.height;
    const anchuraPantalla = window.screen.width;
    const profundidadColor = screen.colorDepth;
    const diferenciaHoraria = new Date().getTimezoneOffset();
    const tzHoraria = new Date().getTimezoneOffset();

    // Captura los headers Accept
    const acceptHeaders = navigator.userAgent.includes("AppleWebKit") ? navigator.userAgent : navigator.userAgent;

    // Utiliza CHECKOUT_STORE_KEY para acceder a la tienda de checkout y obtener el order ID
    const { CHECKOUT_STORE_KEY } = window.wc.wcBlocksData;
    const store = wp.data.select(CHECKOUT_STORE_KEY);
    const RedsysOrderID = store.getOrderId();

    // Función para enviar los datos
    const enviarDatos = () => {
        $.ajax({
            url: redsysAjax.ajaxurl,
            method: 'POST',
            data: {
                'action': 'redsys_check_order_id',
                'nonce': redsysAjax.nonce,
                'order_id': RedsysOrderID,
                'navegadorBase64': navegadorBase64,
                'idioma': idioma,
                'jsHabilitado': jsHabilitado,
                'alturaPantalla': alturaPantalla,
                'anchuraPantalla': anchuraPantalla,
                'profundidadColor': profundidadColor,
                'diferenciaHoraria': diferenciaHoraria,
                'tzHoraria': tzHoraria,
                'acceptHeaders': acceptHeaders
            },
            success: function(response) {
                console.log('Datos guardados con éxito:', response);
            },
            error: function(error) {
                console.error('Error al enviar datos:', error);
            }
        });
    };
    enviarDatos();
});