<<<<<<< HEAD:Vistas/JavaScript/script.js

function updatemenu() {
  if (document.getElementById('responsive-menu').checked == true) {
    document.getElementById('menu').style.borderBottomRightRadius = '0';
    document.getElementById('menu').style.borderBottomLeftRadius = '0';
  }else{
    document.getElementById('menu').style.borderRadius = '<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">10</font></font>px';
  }
}


/**********************************
*
*   FUNCIONES CRUD PRODUCTOS
*
***********************************/
function block(){
    Swal.fire({
  title: 'Error',
  text: 'No se pueden realizar pedidos una vez cerrada la caja',
  icon: 'error',
  confirmButtonText: 'Ok'

})
}
function addProducto(){
    let contenido=`
        <form action="../Controladores/agregar_producto.php" style="font-size:.9rem;">
            <label for="ing_nom">Nombre
            <p>
            <input type="text" name="ing_nom" class="swal2-input" required></label>
            <p>
            <label for="ing_des">Descripcion
            <p>
            <input type="text" name="ing_des" class="swal2-input" required></label>
            <p>
            <label for="ing_pre">Precio
            <p>
            <input type="double" name="ing_pre" class="swal2-input" min="0" required></label>
            <p>
            <button type="submit" class="buton-carrito-r" style="margin:10px 0;">Agregar</button>
        </form>`
    Swal.fire({
        title: "Agregar Producto",
        html: contenido,
        showConfirmButton: false,
        showCloseButton: true,
    });
}

function eliminarProducto(cod){
    Swal.fire({
        title: "Realmente desea eliminar este Producto?",
        text: "",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, Eliminarla!"
    }).then((result) => {
    if (result.isConfirmed) {
        window.location.href = `../Controladores/eliminar_producto.php?ubi=${cod}`

        }
    });
}

function modifyProducto(id,nombre,descr,precio) {
    console.log(nombre,descr,precio)
    const contenido=`
    <form action="../Controladores/modificar_producto.php" style="display:inline-grid">
        <span>Id Producto<p><input type="text" name="ubi_Id" value="${id}" class="swal2-input" readonly><p></span>
        <span>Nombre<p><input type="text" name="nuev_nombre" value="${nombre}" class="swal2-input" required><p></span>
        <span>Descripcion<p><input type="text" name="nuev_descrip" value="${descr}" class="swal2-input" required><p></span>
        <span>Precio<p><input type="double" name="nuev_precio" value="${precio}" class="swal2-input" required><p></span>
        <button type="submit" class="buton-carrito-r" style="margin:10px 0;">Editar</button>
    </form>`
    Swal.fire({
        title:"Editar Producto",
        html: contenido,
        showConfirmButton: false,
        showCloseButton: true,
    })
}

/********************************
*
*       FUNCIONES PEDIDOS
*
*********************************/
function nombre(mesa){
  (async()=>{
    const { value: nombre } = await Swal.fire({
      title: "Pedido",
      icon: 'question',
      input: 'text',
      inputPlaceholder: "Ingrese nombre del pedido",
      inputAutoFocus: true,
      showCancelButton: true,
      cancelButtonColor: "red",
      confirmButtonColor: "green",
      confirmButtonText: "Realizar",
      position: 'center',
    });

    if (nombre) {
        window.location.assign(`tomar_pedido.php?nom=${nombre}&mesa=${mesa}&ac=nuevo`);
    }
  })()
}

function addPedido(producto,mesa,id,nombre) {
    console.log(producto+id+mesa+nombre)
    window.location.assign(`../../Controladores/agregar_pedido.php?pro=${producto}&mesa=${mesa}&id=${id}&nom=${nombre}`);
}

function eliminar_pedido(cod,accion){
    Swal.fire({
        title: "Realmente desea eliminar este pedido?",
        text: "",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, Eliminarla!"
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = `../../Controladores/eliminar_pedido.php?id=${cod}&ac=${accion}`
        }
    });
}

function realizar_pedido(cod, id){
    Swal.fire({
        title: "Desea realizar el pedido?",
        text: "",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, realizar"
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = `../../Controladores/realizar_pedido.php?ubi=${cod}&id=${id}`
        }
    });
}

function eliminar_pedidoProducto(cod,producto,accion) {
    window.location.href = `../../Controladores/eliminar_pedido.php?id=${cod}&pro=${producto}&ac=${accion}`
}

function ver_pedido(mesa,accion) {
    if (accion == 'proceso') {
        window.location.assign(`tomar_pedido.php?mesa=${mesa}&ac=ver`);
    }
    else if (accion == 'finalizado') {
        window.location.assign(`ver_pedido.php?mesa=${mesa}`);
    }

}

function limpiar_mesa(cod,id){
    Swal.fire({
        title: "Desea desocupar la mesa?",
        text: "",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, realizar"
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = `../../Controladores/limpiar_mesa.php?ubi=${cod}&id=${id}`
        }
    });
}

function estado_pedido(){
    Swal.fire({
        title: "Se a preparado el pedido?",
        text: "",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, realizar"
    }).then((result) => {
        if (result.isConfirmed) {
            //window.location.href = `../../Controladores/limpiar_mesa.php`
        }
    });
=======

function updatemenu() {
  if (document.getElementById('responsive-menu').checked == true) {
    document.getElementById('menu').style.borderBottomRightRadius = '0';
    document.getElementById('menu').style.borderBottomLeftRadius = '0';
  }else{
    document.getElementById('menu').style.borderRadius = '<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">10</font></font>px';
  }
}

function modificar(a, b, c, d, e, f){
    const contenido= `<form action='modify.php?cod=${a}' method="post">
        Direccion:
        <p>
        <input type="text" name="direccion" placeholder="${b}" class="swal2-input">
        <p>
        Capacidad:
        <p>
         <input type="text" name="capacidad" placeholder="${c}" class="swal2-input">
        <p> 
        Supervisor
        <p>
         <input type="text" name="supervisor" placeholder="${d}" class="swal2-input" >
        <p>
        Fecha
        <p>
        <input type="date" name="fecha" placeholder="${e}" class="swal2-input">
        <p>
        Cantidad de empleados
        <p>
         <input type="text" name="cant" placeholder="${f}" class="swal2-input">
        <p>
        <button type="submit" class="buton-carrito-r">Modificar</button>
        </form>
        <p style="margin-top:10px;">
        <br>
        <a href="view_sucursales.php"><button class="buton-carrito-c">Volver</button></a></p>`;
    Swal.fire({
        title: "Modificar",
        html: contenido,
        allowOutsideClick: true,
        showConfirmButton: false,
        footer: "",
    });
    
}
function add(){
    const contenido= `<form action='up_sucursal.php' method="post">
        
        Direccion:
        <p>
        <input type="text" name="dir"  class="swal2-input" required>
        <p>
        Capacidad:
        <p>
         <input type="text" name="cap"  class="swal2-input" required>
        <p>
        Cantidad de empleados
        <p>
         <input type="text" name="cant" class="swal2-input" required>
        <p>
        <button type="submit" class="buton-carrito-r">Ingresar</button>
        </form>
        <p style="margin-top:10px;">
        <br>
        <a href="view_sucursales.php"><button class="buton-carrito-c">Volver</button></a></p>`;
    Swal.fire({//MUESTRA UNA VENTANA EMERGENTE PARA INGRESAR NOMBRE
        title: "Nueva sucursal",
        html: contenido,
        allowOutsideClick: true,
        showConfirmButton: false,
        footer:"Luego debera asignar los empleados y supervisor correspondientes",
    });//MUESTRA UNA VENTANA EMERGENTE PARA INGRESAR NOMBRE
    
}

/**********************************
*
*   FUNCIONES CRUD PRODUCTOS
*
***********************************/

function addProducto(){
    let contenido=`
        <form action="../Controladores/agregar_producto.php" style="font-size:.9rem;">
            <label for="ing_nom">Nombre
            <p>
            <input type="text" name="ing_nom" class="swal2-input" required></label>
            <p>
            <label for="ing_des">Descripcion
            <p>
            <input type="text" name="ing_des" class="swal2-input" required></label>
            <p>
            <label for="ing_pre">Precio
            <p>
            <input type="number" name="ing_pre" class="swal2-input" min="0" required></label>
            <p>
            <button type="submit" class="buton-carrito-r" style="margin:10px 0;">Agregar</button>
        </form>`
    Swal.fire({
        title: "Agregar Producto",
        html: contenido,
        showConfirmButton: false,
        showCloseButton: true,
    });
}

function eliminarProducto(cod){
    Swal.fire({
        title: "Realmente desea eliminar este Producto?",
        text: "",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, Eliminarla!"
    }).then((result) => {
    if (result.isConfirmed) {
        window.location.href = `../Controladores/eliminar_producto.php?ubi=${cod}`

        }
    });
}

function modifyProducto(id,nombre,descr,precio) {
    console.log(nombre,descr,precio)
    const contenido=`
    <form action="../Controladores/modificar_producto.php" style="display:inline-grid">
        <span>Id Producto<p><input type="text" name="ubi_Id" value="${id}" class="swal2-input" readonly><p></span>
        <span>Nombre<p><input type="text" name="nuev_nombre" value="${nombre}" class="swal2-input" required><p></span>
        <span>Descripcion<p><input type="text" name="nuev_descrip" value="${descr}" class="swal2-input" required><p></span>
        <span>Precio<p><input type="number" name="nuev_precio" value="${precio}" class="swal2-input" required><p></span>
        <button type="submit" class="buton-carrito-r" style="margin:10px 0;">Editar</button>
    </form>`
    Swal.fire({
        title:"Editar Producto",
        html: contenido,
        showConfirmButton: false,
        showCloseButton: true,
    })
}

/********************************
*
*       FUNCIONES PEDIDOS
*
*********************************/
function nombre(mesa){
  (async()=>{
    const { value: nombre } = await Swal.fire({
      title: "Pedido",
      icon: 'question',
      input: 'text',
      inputPlaceholder: "Ingrese nombre del pedido",
      inputAutoFocus: true,
      showCancelButton: true,
      cancelButtonColor: "red",
      confirmButtonColor: "green",
      confirmButtonText: "Realizar",
      position: 'center',
    });

    if (nombre) {
        window.location.assign(`tomar_pedido.php?nom=${nombre}&mesa=${mesa}&ac=nuevo`);
    }
  })()
}

function addPedido(producto,mesa,id,nombre) {
    console.log(producto+id+mesa+nombre)
    window.location.assign(`../../Controladores/agregar_pedido.php?pro=${producto}&mesa=${mesa}&id=${id}&nom=${nombre}`);
}

function eliminar_pedido(cod,accion){
    Swal.fire({
        title: "Realmente desea eliminar este pedido?",
        text: "",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, Eliminarla!"
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = `../../Controladores/eliminar_pedido.php?id=${cod}&ac=${accion}`
        }
    });
}

function realizar_pedido(cod, id){
    Swal.fire({
        title: "Desea realizar el pedido?",
        text: "",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, realizar"
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = `../../Controladores/realizar_pedido.php?ubi=${cod}&id=${id}`
        }
    });
}

function eliminar_pedidoProducto(cod,producto,accion) {
    window.location.href = `../../Controladores/eliminar_pedido.php?id=${cod}&pro=${producto}&ac=${accion}`
}

function ver_pedido(mesa,accion) {
    if (accion == 'proceso') {
        window.location.assign(`tomar_pedido.php?mesa=${mesa}&ac=ver`);
    }
    else if (accion == 'finalizado') {
        window.location.assign(`ver_pedido.php?mesa=${mesa}`);
    }

}

function limpiar_mesa(cod,id){
    Swal.fire({
        title: "Desea desocupar la mesa?",
        text: "",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, realizar"
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = `../../Controladores/limpiar_mesa.php?ubi=${cod}&id=${id}`
        }
    });
}

function estado_pedido(){
    Swal.fire({
        title: "Se a preparado el pedido?",
        text: "",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, realizar"
    }).then((result) => {
        if (result.isConfirmed) {
            //window.location.href = `../../Controladores/limpiar_mesa.php`
        }
    });
>>>>>>> main:sucursal/Vistas/JavaScript/script.js
}