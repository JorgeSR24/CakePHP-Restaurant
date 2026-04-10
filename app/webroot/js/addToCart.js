// $(document).ready(function(){
//     $('.addToCart').on('click', function(event) {
//         $.ajax({
//             type: "POST",
//             url: basePath + "pedidos/add",
//             data: {
//                 id: $(this).data("id"),
//                 cantidad: 1
//             },
//             dataType: "html",
//             success: function(data) {
//                 $('#msg').html('<div class="alert alert-success flash-msg">Platillo agregado al pedido.</div>');
//             }
//         });
//     });
// });
// $(document).ready(function(){
//  $('.addToCart').on('click', function(event) {

//     console.log("Button clicked. ID: " + $(this).data("id") + ", Precio: " + $(this).data("precio"));
//  });
// });

document.addEventListener('DOMContentLoaded', () => {

    document.addEventListener('click', async (event) => {

        const target = event.target.closest('.addToCart');
        
        if (!target) return;

        event.preventDefault();

        const id = target.dataset.id;

        console.log(`Button clicked. ID: ${id}`);

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

                // 🔥 CAMBIO IMPORTANTE
                const data = await response.json();

                console.log(data);

                // 🔁 En lugar de bloquear, puedes dejarlo activo
                // o cambiar texto dinámicamente:
                target.textContent = `Añadir más (${data.cantidad})`;

                // Mensaje dinámico desde backend
                const msgContainer = document.getElementById('msg');
                if (msgContainer) {
                    msgContainer.innerHTML = `
                        <div class="alert alert-success flash-msg">
                            ${data.msg}
                        </div>
                    `;

                    setTimeout(() => {
                        const flash = msgContainer.querySelector('.flash-msg');
                        if (flash) flash.style.opacity = '0';
                    }, 3000);
                }

            } else {
                console.error('Error en la respuesta del servidor');
            }

        } catch (error) {
            console.error('Error de red o de servidor:', error);
        }
    });
});
// document.addEventListener('DOMContentLoaded', function() {
// 		const buttons = document.querySelectorAll('.addToCart');
// 		buttons.forEach(button => {
// 			button.addEventListener('click', function() {
// 				const platilloId = this.getAttribute('data-id');
// 				const precio = this.getAttribute('data-precio');

// 				fetch('/restaurante/pedidos/addToCart', {
// 					method: 'POST',
// 					headers: {
// 						'Content-Type': 'application/json'
// 					},
// 					body: JSON.stringify({ platilloId, precio })
// 				})
// 				.then(response => response.json())
// 				.then(data => {
// 					if (data.success) {
// 						alert('Plato agregado al pedido');
// 					} else {
// 						alert('Error al agregar el plato al pedido');
// 					}
// 				})
// 				.catch(error => {
// 					console.error('Error:', error);
// 					alert('Error al agregar el plato al pedido');
// 				});
// 			});
// 		});
// 	});