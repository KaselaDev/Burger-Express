# Burger Express

Burger Express es una aplicación diseñada para ayudar a un restaurante de comida rápida y sus sucursales a gestionar pedidos, menús, y operaciones de forma eficiente. Esta aplicación está optimizada para facilitar la administración de un negocio con múltiples puntos de venta.

## Características principales
- Gestor de pedidos en tiempo real.
- Administración de menús y precios.
- Gestión de usuarios y roles (empleados y administradores).
- Reportes sobre ventas y desempeño de sucursales.

---

## Instalación
Sigue estos pasos para instalar y configurar Burger Express en tu hosting:

### Paso 1: Subir los archivos al hosting
1. Descarga o clona el repositorio desde GitHub:
   ```bash
   git clone https://github.com/tu-usuario/burger-express.git
   ```
2. Mueve la carpeta descargada al directorio de tu hosting donde deseas instalar la aplicación.

### Paso 2: Configurar la base de datos
1. Dentro de la carpeta `system`, encontrarás un archivo llamado `sucursal.sql`.
2. Accede a tu hosting de base de datos (puede ser a través de herramientas como phpMyAdmin o una consola de comandos de MySQL).
3. Importa el archivo `sucursal.sql` a tu base de datos:
   - En phpMyAdmin, selecciona tu base de datos y haz clic en la pestaña "Importar". Carga el archivo `sucursal.sql` y sigue las instrucciones.
   - Por consola, usa el siguiente comando:
     ```bash
     mysql -u tu_usuario -p tu_base_de_datos < ruta/al/archivo/sucursal.sql
     ```

### Paso 3: Configurar las credenciales de conexión a la base de datos
1. Localiza el archivo `conexion.php` en la ruta `/system/Modelos/conexion.php`.
2. Abre el archivo con un editor de texto o código.
3. Modifica las credenciales de acceso a la base de datos con la información de tu hosting. El archivo contiene un código similar al siguiente:
   ```php
   <?php
	$user="agrega_tus_Credenciales";
	$psw="agrega_tus_Credenciales";
	$dbname="agrega_tus_Credenciales";
	$host="agrega_tus_Credenciales";
	try{
		$dsn="mysql:host=localhost;dbname=$dbname";
		$conexion = new PDO($dsn, $user, $psw);
	}catch(PDOException $e){
		echo "Error al conectar: " . $e->getMessage();
	}
   ```
4. Guarda los cambios y cierra el archivo.

### Paso 4: Verificar la instalación
1. Accede a la URL donde subiste los archivos desde tu navegador.
2. Verifica que la aplicación cargue correctamente y que se conecte a la base de datos.

---

## Soporte
Si encuentras algún problema durante la instalación o configuración, puedes crear un issue en el repositorio de GitHub o contactar al equipo de desarrollo.

---

### Licencia
Este proyecto está bajo la licencia [MIT](LICENSE).

