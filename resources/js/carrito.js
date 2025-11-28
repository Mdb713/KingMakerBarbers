emailjs.init("kFWHJhU1kOf5F5X2Q");

const btnPagar = document.getElementById("btnPagar");

btnPagar?.addEventListener("click", async (e) => {
    e.preventDefault();

    const carritoData = JSON.parse(document.getElementById("carritoData").value);
    const emailCliente = document.getElementById("emailCliente").value.trim();
    const nombreCliente = document.getElementById("clienteNombre").value.trim();
    const totalCarrito = document.getElementById("totalCarritoInput").value;

    // 🔹 Depuración: ver qué email se está cogiendo
    console.log("Email del cliente:", emailCliente);
    console.log("Nombre del cliente:", nombreCliente);
    console.log("Total del carrito:", totalCarrito);

    let items_html = "";
    for (let id in carritoData) {
        const p = carritoData[id];
        items_html += `<tr>
            <td>${p.nombre}</td>
            <td>${p.cantidad}</td>
            <td>${p.precio} €</td>
            <td>${(p.precio * p.cantidad).toFixed(2)} €</td>
        </tr>`;
    }

    const templateParams = {
        cliente_nombre: nombreCliente,
        cliente_email: emailCliente,
        metodo_pago: "Pago en línea",
        total: totalCarrito,
        fecha: new Date().toLocaleDateString(),
        items_html: items_html,
        year: new Date().getFullYear()
    };

    try {
        await emailjs.send("service_8i6leb5", "template_ipujnwt", templateParams);
        alert("Pago confirmado y factura enviada al correo 📩");

        fetch("/carrito/vaciar", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                Accept: "application/json",
            },
        }).then(() => location.reload());
    } catch (err) {
        console.error(err);
        alert("Error al enviar la factura. Intenta nuevamente.");
    }
});
