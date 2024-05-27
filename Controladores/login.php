<!DOCTYPE html>
<html>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>
<?php
    session_start();
    require "../Modelos/consultas.php";
    $DNI = filter_input(INPUT_POST,'DNI');
    $Clave = filter_input(INPUT_POST,'Clave');
    $datos = userExists($DNI,$Clave);
    if(isset($datos)){
        foreach($datos as $elemento){
            $_SESSION['usuario'] = $elemento['Nombre'];
            $_SESSION['DNI'] = $elemento['DNI'];
            header('Location:../Vistas/menu.php?session=outOfRun'); 
        }
    }else{
        echo"<script>
Swal.fire({
  title: 'Error!',
  text: 'Do you want to continue',
  icon: 'error',
  confirmButtonText: 'Cool'
})</script>";
    echo"pase";
        //header('location:../Vistas/index.html');
    }

    #}
           
?>