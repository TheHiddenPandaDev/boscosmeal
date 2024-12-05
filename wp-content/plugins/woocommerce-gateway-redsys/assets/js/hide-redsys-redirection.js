document.addEventListener("DOMContentLoaded", function() {
    const hideRedsysMethod = () => {
        const redsysRadioInput = document.getElementById('radio-control-wc-payment-method-options-redsys');
        if (redsysRadioInput) {
            const parentOption = redsysRadioInput.closest('.wc-block-components-radio-control-accordion-option');
            if (parentOption) {
                parentOption.style.display = 'none';
                return true;
            }
        }
        return false;
    };

    // Intentar ocultar el método Redsys de inmediato
    if (!hideRedsysMethod()) {
        // Si no se encuentra de inmediato, configurar un intervalo para volver a intentarlo
        const interval = setInterval(() => {
            if (hideRedsysMethod()) {
                clearInterval(interval); // Detener el intervalo una vez que se oculte
            }
        }, 500); // Ajustar el tiempo según sea necesario
    }

    // Usar MutationObserver para observar cambios en el contenedor del checkout
    const checkoutContainer = document.querySelector('.wc-block-components-radio-control');
    if (checkoutContainer) {
        const observer = new MutationObserver(() => {
            hideRedsysMethod();
        });

        observer.observe(checkoutContainer, { childList: true, subtree: true });
    }
});