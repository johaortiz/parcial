<?php
include '../jo_db/jo_db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jo_username = $_POST['jo_username'];
    $jo_email = $_POST['jo_email'];
    $jo_password = password_hash($_POST['jo_password'], PASSWORD_DEFAULT);
    $jo_role = 'user';

    $sql = "INSERT INTO jo_users (username, email, password, role) VALUES ('$jo_username', '$jo_email', '$jo_password', '$jo_role')";

    if ($conn->query($sql) === TRUE) {
        // Iniciar sesión automáticamente
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $jo_username;
        $_SESSION['role'] = $jo_role;
        $_SESSION['user_id'] = $conn->insert_id; // Obtener el ID del usuario recién registrado

        // Redirigir al inicio
        header("Location: /blog_project/index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../jo_assets/jo_css/jo_styles.css">
    <script src="../jo_assets/jo_js/jo_validations.js"></script>
</head>
<body>
    <div class="jo_form-container">
        <h2>Register</h2>
        <form id="jo_registerForm" method="POST" action="jo_register.php" onsubmit="return jo_validateRegister()">
            <label for="jo_username">Username:</label>
            <input type="text" id="jo_username" name="jo_username" required>
            <label for="jo_email">Email:</label>
            <input type="email" id="jo_email" name="jo_email" required>
            <label for="jo_password">Password:</label>
            <input type="password" id="jo_password" name="jo_password" required>
            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>