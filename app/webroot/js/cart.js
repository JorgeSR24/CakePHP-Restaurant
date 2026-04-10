document.addEventListener('DOMContentLoaded', () => {

    document.addEventListener('click', async (event) => {

        const btn = event.target.closest('.addMore');
        if (!btn) return;

        event.preventDefault();

        const id = btn.dataset.id;

        const formData = new URLSearchParams();
        formData.append('id', id);
        formData.append('cantidad', 1);

        try {
            const response = await fetch(basePath + "pedidos/add", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: formData.toString()
            });

            if (response.ok) {

                const data = await response.json();

                // 🔄 Actualizar cantidad
                const cantidadEl = document.getElementById("cantidad-" + id);
                if (cantidadEl) {
                    cantidadEl.innerText = data.cantidad;
                }

                // 🔄 Actualizar subtotal
                const subtotalEl = document.getElementById("subtotal-" + id);
                if (subtotalEl) {
                    subtotalEl.innerText = data.subtotal;
                }

                // 🔄 Actualizar total general
                actualizarTotal();

            }

        } catch (error) {
            console.error(error);
        }
    });

    function actualizarTotal() {
        let total = 0;

        document.querySelectorAll("[id^='subtotal-']").forEach(el => {
            total += parseFloat(el.innerText);
        });

        document.getElementById("total-general").innerText = total.toFixed(2);
    }
});