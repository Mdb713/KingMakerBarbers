// carrito.js

// Inicializar EmailJS
(function() {
    emailjs.init('TU_PUBLIC_KEY_EMAILJS');
})();

// Elementos del modal y formulario
const btnPagar = document.getElementById('btnPagar');
const modalPago = document.getElementById('modalPago');
const cancelarPago = document.getElementById('cancelarPago');
const formPago = document.getElementById('formPago');
const metodoPago = document.getElementById('metodoPago');
const errorPago = document.getElementById('errorPago');
const formTarjeta = document.getElementById('formTarjeta');
const formPayPal = document.getElementById('formPayPal');
const formEfectivo = document.getElementById('formEfectivo');

// Abrir modal
btnPagar?.addEventListener('click', () => modalPago.classList.remove('hidden'));

// Cerrar modal
cancelarPago?.addEventListener('click', () => {
    modalPago.classList.add('hidden');
    errorPago.classList.add('hidden');
    metodoPago.value = "";
    formTarjeta.classList.add('hidden');
    formPayPal.classList.add('hidden');
    formEfectivo.classList.add('hidden');
});

// Mostrar formulario según método
metodoPago?.addEventListener('change', () => {
    formTarjeta.classList.add('hidden');
    formPayPal.classList.add('hidden');
    formEfectivo.classList.add('hidden');

    if (metodoPago.value === 'tarjeta') formTarjeta.classList.remove('hidden');
    else if (metodoPago.value === 'paypal') formPayPal.classList.remove('hidden');
    else if (metodoPago.value === 'efectivo') formEfectivo.classList.remove('hidden');
});

// Validación y pago
formPago?.addEventListener('submit', async e => {
    e.preventDefault(); // Muy importante para que JS controle el submit

    if(!metodoPago.value){
        errorPago.classList.remove('hidden');
        return;
    }
    errorPago.classList.add('hidden');

    // Validar inputs según método
    let inputs = [];
    if(metodoPago.value === 'tarjeta') inputs = formTarjeta.querySelectorAll('input');
    else if(metodoPago.value === 'paypal') inputs = formPayPal.querySelectorAll('input');

    for(let input of inputs){
        if(!input.checkValidity()){
            alert('Completa correctamente los campos.');
            return;
        }
    }

    // Datos para EmailJS
    const carritoJS = window.carritoData || [];
    const totalJS = window.carritoTotal || 0;
    const emailCliente = window.clienteEmail || '';

    try {
        await emailjs.send('TU_SERVICE_ID', 'TU_TEMPLATE_ID', {
            metodo: metodoPago.value,
            carrito: JSON.stringify(carritoJS),
            total: totalJS,
            emailCliente: emailCliente
        });

        alert('Pago realizado y factura enviada.');
        modalPago.classList.add('hidden');

        // Vaciar carrito
        await fetch("/carrito/vaciar", {
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json'
            }
        });
        location.reload();

    } catch(err){
        console.error(err);
        alert('Error al enviar factura. Revisa la consola.');
    }
});
