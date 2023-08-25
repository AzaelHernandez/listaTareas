const btn_insertar = document.getElementById("insertar");
const tabla = document.getElementById("cuerpoTabla");

function leerDatos() {
    let template = "";
    const url = "leer.php";
    fetch(url)
    .then(r => r.json())
    .then(data => {
        data.forEach(element => {
            const id = element.id;
            const nombre = element.nombre;
            const descripcion = element.descripcion;
            const fecha = element.fecha;
            const estatus = element.estatus;
            const estatusInt = parseInt(estatus, 10); // Convierte el valor de estatus a número entero
            const checkboxHTML = estatusInt === 1 ? '<input type="checkbox" checked>' : '<input type="checkbox">';

            template += `<tr>
            <th scope="row">${id}</th>
            <td>${nombre}</td>
            <td>${descripcion}</td>
            <td>${fecha}</td>
            <td>${checkboxHTML}</td>
            <td class="text-center"><button class="btn btn-success" id="editar" value="${id}">Editar</button> <button class="btn btn-danger" id="borrar" value="${id}">Borrar</button></td>
            
            </tr>`
        });
        document.getElementById("cuerpoTabla").innerHTML = template;
    });
}

leerDatos();

btn_insertar.addEventListener("click", function (e) {
    e.preventDefault();

    const url = "insertar.php";
    const data = new FormData();//se utiliza para almacenar y enviar los datos del formulario al servidor.

    const nombre = document.getElementById("nombre").value;
    const descripcion = document.getElementById("descripcion").value;
    const fecha = document.getElementById("fecha").value;
    const estatus = 0;

    data.append('nombre', nombre);
    data.append('descripcion', descripcion);
    data.append('fecha', fecha);
    data.append('estatus', estatus);

    fetch(url, { method: 'POST', body: data })
        .then(response => response.json()) // Parsea la respuesta como JSON
        .then(nuevoRegistro => {
            // Limpia los campos del formulario
            document.getElementById("nombre").value = "";
            document.getElementById("descripcion").value = "";
            document.getElementById("fecha").value = "";
            
            // Asegúrate de convertir el valor del estatus a un número entero
            const estatusInt = parseInt(nuevoRegistro.estatus, 10);

            // Genera el HTML del checkbox en función del valor del estatus
            const checkboxHTML = estatusInt === 1 ? '<input type="checkbox" checked>' : '<input type="checkbox">';

            // Agrega el nuevo registro a la tabla sin recargar la página
            const template = `<tr>
            <th scope="row">${nuevoRegistro.id}</th>
            <td>${nuevoRegistro.nombre}</td>
            <td>${nuevoRegistro.descripcion}</td>
            <td>${nuevoRegistro.fecha}</td>
            <td>${checkboxHTML}</td>
            <td class="text-center"><button class="btn btn-success" id="editar" value="${nuevoRegistro.id}">Editar</button> <button class="btn btn-danger" id="borrar" value="${nuevoRegistro.id}">Borrar</button></td>
            </tr>`;
            tabla.insertAdjacentHTML('beforeend', template);//se agrega la nueva fila con el nuevo registro a la tabla en la página web sin recargar la página utilizando tabla.insertAdjacentHTML('beforeend', template);
        })
        .catch(error => {
            console.error("Error al insertar el registro:", error);
        });

})

tabla.addEventListener("click",function(e){
    if (e.target.id == "borrar") {
        const id = e.target.value;
        const url = "borrar.php";
        const data = new FormData();//se utiliza para almacenar y enviar los datos del formulario al servidor.

        data.append('id', id);
        fetch(url, { method: 'POST', body: data })
            .then(response => response.json()) // Parsea la respuesta como JSON
            .then(data => {
                // Borra todos los elementos de la tabla
                while (tabla.firstChild) {
                    tabla.removeChild(tabla.firstChild);
                }

                // Agrega los registros actualizados a la tabla sin recargar la página
                data.forEach(element => {
                    const id = element.id;
                    const nombre = element.nombre;
                    const descripcion = element.descripcion;
                    const fecha = element.fecha;
                    const estatusInt = parseInt(element.estatus, 10); // Convierte el valor de estatus a número entero
                    const checkboxHTML = estatusInt === 1 ? '<input type="checkbox" checked>' : '<input type="checkbox">';

                    const template = `<tr>
                        <th scope="row">${id}</th>
                        <td>${nombre}</td>
                        <td>${descripcion}</td>
                        <td>${fecha}</td>
                        <td>${checkboxHTML}</td>
                        <td class="text-center"><button class="btn btn-success" id="editar" value="${id}">Editar</button> <button class="btn btn-danger" id="borrar" value="${id}">Borrar</button></td>
                    </tr>`;
                    tabla.insertAdjacentHTML('beforeend', template);
                });
            })
            .catch(error => {
                console.error("Error al borrar el registro:", error);
            });
    }

    if(e.target.id=="editar"){
        const id=e.target.value;//obtenemos el id con e.target.value
        window.location=`actualizar.php?id=${id}` ;
    }
},true)

