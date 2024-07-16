document.addEventListener('DOMContentLoaded', function() {
    const opcOfertaSelect = document.getElementById('opcOfertaSelect');
    const ofertaFields = document.getElementById('ofertaFields');
    const precio = document.getElementById('precio');
    const descuento = document.getElementById('descuento');
    const valorFinal = document.getElementById('valor_final');
    
    opcOfertaSelect.addEventListener('change', function() {
        if (opcOfertaSelect.value === 'si') {
            ofertaFields.style.display = 'block';
        } else {
            ofertaFields.style.display = 'none';
        }
        calcularPrecioTotal();
    });

    precio.addEventListener('input', calcularPrecioTotal);
    descuento.addEventListener('input', calcularPrecioTotal);

    function calcularPrecioTotal () {
        const precioValue = parseFloat(precio.value) || 0;
        const descuentoValue = parseFloat(descuento.value) || 0;
        if (opcOfertaSelect.value === 'si' && descuentoValue > 0) {
            const valorConDescuento = precioValue - (precioValue * (descuentoValue / 100));
            valorFinal.value = valorConDescuento.toFixed(0);
        } else {
            valorFinal.value = precioValue.toFixed(0);
        }
    }

});