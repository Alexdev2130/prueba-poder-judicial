document.addEventListener('DOMContentLoaded', ()=>{
    setFacturas();
    getFacturas();
})


async function getFacturas(){
    const table = document.querySelector('#content');
    if(table.childNodes){
        table.innerHTML = '';
    }
    try {
        const url = 'http://localhost:3000/admin/home/facturacion/get';
        const request = await fetch(url);
        const respuesta = await request.json();
        const res = Object.values(respuesta);
        res.forEach(factura => {
            const tr = document.createElement('tr');
            const nombre = factura.cliente.split(' ')[0];
            const correo = factura.cliente.split(' ')[1];
            tr.innerHTML = `
                <td>${factura.id}</td>
                <td>${nombre}</td>
                <td>${correo}</td>
                <td>${factura.created_at}</td>
                <td class="padding">
                    <a class="boton" href="/admin/home/factura?id=${factura.id}">Ver Factura</a>
                </td>
            `;
            table.appendChild(tr);
        })
    } catch (error) {
        console.log(error)
    }

}

async function setFacturas()
{
    const boton = document.querySelector('#facturar');


    boton.onclick = async function(){
        try {
          const form = new FormData();
          form.append('_token', document.querySelector('input[type="hidden"]').value);
          form.append('orden', 'FACTURAR');

          const url = 'http://localhost:3000/admin/home/facturacion';

          const request = await fetch(url, {
              method: 'POST',
              body: form
          });

          const respuesta = await request.json();

            if (respuesta.STATUS == 'OK'){
                getFacturas();
            }
        } catch (error) {
            console.log(error);
        }
    }

}
