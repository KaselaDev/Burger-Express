function eliminar(cod){
    Swal.fire({
		title: "Realmente desea eliminar este empleado?",
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

function modificar(a, b, c, d, e, f, g, h, i){
    const contenido= `<form action='modify_empleado.php?cod=${a}' method="post">
        DNI:
        <p>
        <input type="varchar" name="dni" placeholder="${b}" value="${b}" class="swal2-input">
        <p>
        Nombre:
        <p>
        <input type="text" name="nombre" placeholder="${c}" value="${c}" class="swal2-input">
        <p>
        Apellido:
        <p>
         <input type="text" name="apellido" placeholder="${d}" value="${d}" class="swal2-input">
        <p>
        Telefono
        <p>
         <input type="varchar" name="telefono" placeholder="${e}" value="${e}" class="swal2-input" >
        <p>
        Direccion
        <p>
        <input type="varchar" name="direccion" placeholder="${f}" value="${f}" class="swal2-input">
        <p>
        Fecha de nacimiento:
        <p>
        <input type="varchar" name="fecha" placeholder="${g}" value="${g}" class="swal2-input">
        <p>
        Puesto
        <p>
         <input type="text" name="puesto" placeholder="${h}" value="${h}" class="swal2-input">
        <p>
        Sueldo
        <p>
         <input type="text" name="sueldo" placeholder="${i}" value="${i}" class="swal2-input">
        <p> 
        <button type="submit" class="buton-carrito-r">Modificar</button>
        </form>
        <p style="margin-top:10px;">
        <br>
        <a href="view_empleados.php"><button class="buton-carrito-c">Volver</button></a></p>`;
    Swal.fire({
        title: "Modificar",
        html: contenido,
        allowOutsideClick: true,
        showConfirmButton: false,
        footer: "",
    });
    
}

function add(){
    const contenido= `<form action='up_empleado.php' method="post">
        
        DNI:
        <p>
        <input type="text" name="dni"  class="swal2-input" required>
        <p>
        Nombre:
        <p>
         <input type="text" name="nom"  class="swal2-input" required>
        <p>
        Apellido:
        <p>
         <input type="text" name="ape" class="swal2-input" required>
        <p>
        Telefono:
        <p>
         <input type="text" name="tel" class="swal2-input" required>
        <p>
         Direccion:
        <p>
         <input type="text" name="dir" class="swal2-input" required>
        <p>
         Fecha de nacimiento:
        <p>
         <input type="text" name="fec" class="swal2-input" required>
        <p>
         Puesto:
        <p>
         <input type="text" name="puesto" class="swal2-input" required>
        <p>
         Sueldo:
        <p>
         <input type="text" name="sueldo" class="swal2-input" required>
        <p>
        <button type="submit" class="buton-carrito-r">Ingresar</button>
        </form>
        <p style="margin-top:10px;">
        <br>
        <a href="view_empleados.php"><button class="buton-carrito-c">Volver</button></a></p>`;
    Swal.fire({
        title: "Nuevo empleado",
        html: contenido,
        allowOutsideClick: true,
        showConfirmButton: false,
        footer:"",
    });
    
}