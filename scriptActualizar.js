const btn_actualizar = document.getElementById("actualizar");

btn_actualizar.addEventListener("click",function(e){
    e.preventDefault();
    const url = "actualizarDatos.php";
    const data = new FormData();

    const id= document.getElementById("id").value;
    const nombre= document.getElementById("nombre").value;
    const descripcion=document.getElementById("descripcion").value;
    const fecha=document.getElementById("fecha").value;
     // Verificamos si el checkbox está marcado o no, y establecemos el valor de estatus en consecuencia
     const estatus = document.getElementById("estatus").checked ? 1 : 0;

    
    data.append('nombre',nombre);
    data.append('descripcion',descripcion);
    data.append('fecha',fecha);
    data.append('estatus',estatus);
    data.append('id',id);

    fetch(url, { method: 'POST', body: data })
    .then(response => {
        if (response.ok) {
            // Si la respuesta del servidor es exitosa, redireccionamos a index.php
            window.location = "index.php";
        } else {
            console.error("Error al actualizar el registro.");
        }
    })
    .catch(error => {
        console.error("Error al actualizar el registro:", error);
    });
})
