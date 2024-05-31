<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    // Conexión a la base de datos
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "p03";
    // Crea la conexión
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
    //Verificar la conexión
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    //Prepara la sentencia SQL
    $stmt = $conn->prepare("INSERT INTO usuario (usrName, usrPw) VALUES (?, ?)");
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }
    $stmt->bind_param("ss", $username, $password);

    //Ejecutar la sentencia SQL
    if ($stmt->execute()) {
        echo "Usuario registrado con éxito.";
    } else {
        echo "Error executing statement: " . $stmt->error;
    }

    //Cierra la sentencia y la conexión
    $stmt->close();
    $conn->close();
}
?>
