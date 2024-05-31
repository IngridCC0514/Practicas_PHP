<?php
$host = "localhost";
$db   = "p03";
$user = "root";
$pass = "";
// Crear conexión
$conn = new mysqli($host, $user, $pass, $db);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
//Recoger los datos del formulario
$username = $_POST['username'];
$password = $_POST['password'];
// Crear la consulta SQL
$sql = "SELECT * FROM usuario WHERE  usrName = '$username' AND usrPw = '$password'";

// Ejecutar la consulta
$result = $conn->query($sql);

//Verificar si el usuario existe
if ($result->num_rows > 0) {
    include ('views/logged.html');
    echo "¡Has ingresado con éxito!";
} else {
    include ('views/errorLogin.html');
    echo "Usuario o contraseña incorrectos.";
}

$conn->close();
?>