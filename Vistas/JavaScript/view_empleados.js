function eliminar(cod){
    Swal.fire({
		title: "Realmente desea eliminar este empleados?",
		text: "",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Si, Eliminar!"
    }).then((result) => {
    if (result.isConfirmed) {
    	window.location.href = `delete_empleado.php?codigo=${cod}`

    	}
    });
}
function modificar(a, b, c, d, e, f){
    const contenido= `<form action='modify_empleado.php?cod=${a}' method="post">
        Nombre:
        <p>
        <input type="text" name="nombre" placeholder="${b}" class="swal2-input">
        <p>
        Apellido:
        <p>
         <input type="text" name="apellido" placeholder="${c}" class="swal2-input">
        <p> 
        DNI    Nombre  Apellido    Telefono    Direccion   Ingreso Fnac    Turno   Puesto  Sueldo  
        Telefono
        <p>
         <input type="text" name="telefono" placeholder="${d}" class="swal2-input" >
        <p>
        Direccion
        <p>
        <input type="text" name="direccion" placeholder="${e}" class="swal2-input">
        <p>
        Turno
        <p>
         <input type="text" name="turno" placeholder="${f}" class="swal2-input">
        <p>
        Puesto
        <p>
         <input type="text" name="puesto" placeholder="${f}" class="swal2-input">
        <p>
        Sueldo
        <p>
         <input type="text" name="sueldo" placeholder="${f}" class="swal2-input">
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