<?php
require_once 'config.php';

if(isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit();
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = ($_POST['password']);
    
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            font-family: Arial;
            margin: 50px;
            background: #f0f0f0;
        }
        .login-box {
            width: 300px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
        }
        input {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
        }
        button {
            width: 100%;
            padding: 10px;
            background: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .error {
            color: red;
            margin-bottom: 10px;
        }
        button:hover {
            background: #2e6b31;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Service HP</h2>
        <?php if(isset($error)) echo "<div class='error'>$error</div>"; ?>
        <form method="POST">
        <input type="text" name="username" placeholder="Username" required ><br>
    
            <div style="position: relative;">
                <input type="password" name="password" id="inputPassword" placeholder="Password" required >
                <span id="togglePassword" style="position: absolute; right: 10px; top: 15px; cursor: pointer;">👁️</span>
            </div><br>

            <button type="submit">Login</button>
        </form>
    </div>

    <script src="js/global.js"></script>
    <script src ="js/login.js"></script>
</body>
</html>