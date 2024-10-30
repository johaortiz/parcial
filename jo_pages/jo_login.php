<?php
include '../jo_db/jo_db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jo_email = $_POST['jo_email'];
    $jo_password = $_POST['jo_password'];

    $sql = "SELECT * FROM jo_users WHERE email='$jo_email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($jo_password, $row['password'])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['user_id'] = $row['id'];
            header("Location: /blog_project/index.php");
            exit();
        } else {
            echo "Incorrect password";
        }
    } else {
        echo "No account found with that email";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../jo_assets/jo_css/jo_styles.css">
    <script src="../jo_assets/jo_js/jo_validations.js"></script>
</head>
<body>
    <div class="jo_form-container">
        <h2>Login</h2>
        <form id="jo_loginForm" method="POST" action="jo_login.php" onsubmit="return jo_validateLogin()">
            <label for="jo_email">Email:</label>
            <input type="email" id="jo_email" name="jo_email" required>
            <label for="jo_password">Password:</label>
            <input type="password" id="jo_password" name="jo_password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>