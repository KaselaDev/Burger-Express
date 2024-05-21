function eliminar(cod){
    Swal.fire({
		title: "Realmente desea eliminar esta sucursal?",
		text: "",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Si, Eliminarla!"
    }).then((result) => {
    if (result.isConfirmed) {
    	window.location.href = `delete_sucursal.php?codigo=${cod}`

    	}
    });
}
function modificar(a, b, c, d, e, f){
    const contenido= `<form action='modify.php?cod=${a}&table=sucursales' method="post">
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