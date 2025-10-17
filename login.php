<?php require 'config.php'; if(isset($_POST["submit"])){
    $usernameemail = $_POST["usernameemail"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM tb_userss WHERE username = '$usernameemail' OR email = '$usernameemail'");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){
        if($password == $row["password"]){
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("location: indexee.php");
        }else{
            echo "<script>alert('Wrong Password');</script>";
        }
    }else{
        echo "<script>alert('User Not Registered');</script>";
    }
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="music.png" type="image/x-icon">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <title>Wave-Tune - login</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;500&display=swap"
        rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            height: 100vh;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            display: flex;
            width: 100%;
            height: 100vh;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        .login-form {
            padding-top: 15vh;
            padding-left: 50px;
            padding-right: 50px;
            width: 50%;
            background-color: rgba(255, 255, 255, 0.695);
            display: flex;
            flex-direction: column;
        }

        .hero-image {
            width: 50%;
            position: relative;
            background: linear-gradient(to right, rgba(22, 21, 21, 0.67), rgba(0, 0, 0, 0.1)), url('mark-cruz-w3-zaydSNRY-unsplash.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 30px;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
        }

        .logo {
            margin-bottom: 30px;
            font-size: 18px;
            font-weight: 500;
            color: #333;
        }

        h1 {
            font-family: 'Playfair Display', serif;
            font-size: 32px;
            margin-bottom: 10px;
            color: #222;
        }

        .subtitle {
            color: #777;
            font-size: 14px;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            color: #444;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #e1e1e1;
            border-radius: 5px;
            font-size: 14px;
        }

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 13px;
            margin-bottom: 20px;
        }

        .remember-me {
            display: flex;
            align-items: center;
        }

        input[type="checkbox"] {
            margin-right: 5px;
        }

        .forgot-link {
            color: #666;
            text-decoration: none;
        }

        .signin-btn {
            display: inline;
            background-color: #000;
            color: white;
            border: none;
            padding: 14px;
            width: 100%;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            margin-bottom: 15px;
        }

        .google-signin {
            display: none;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 12px;
            border: 1px solid #e1e1e1;
            border-radius: 5px;
            font-size: 14px;
            color: #444;
            cursor: pointer;
            margin-bottom: 30px;
        }

        .google-icon {
            width: 18px;
            margin-right: 10px;
        }

        .signup-link {
            font-size: 13px;
            text-align: center;
        }

        .signup-link a {
            color: #111;
            text-decoration: none;
            font-weight: 500;
        }

        .imagee {
            position: relative;
            top: 9px;
            width: 30px;
            height: 30px;
        }

        .hero-content {
            z-index: 1;
        }

        .brand-name {
            font-family: 'Playfair Display', serif;
            font-size: 36px;
            margin-bottom: 5px;
        }

        .flexee {
            gap: 10px;
            display: flex;
            flex-direction: row;
        }

        .korean-text {
            font-size: 24px;
            margin-bottom: 15px;
        }

        .description {
            font-size: 12px;
            max-width: 80%;
            line-height: 1.5;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-form">
            <div class="flexee">
                <img class="imagee" src="music.png" alt="">
                <h1>WaveTune</h1>
            </div>
            <p class="subtitle">Where Music Finds Its Rhythm</p>


            <form action="" method="post" autocomplete="off">
                <div class="form-group">
                    <label for="usernameemail">Email</label>
                    <input type="text" name="usernameemail" id="usernameemail" placeholder="Enter your email" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="••••••••" required>
                </div>

                <div class="remember-forgot">
                    <div class="remember-me">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">Remember me</label>
                    </div>
                    <a href="#" class="forgot-link">Forgot Password</a>
                </div>

                <button type="submit" name="submit" class="signin-btn">Sign In</button>
            </form>

            <div class="signup-link">
                Don't have an account? <a href="regestration.php">Sign up</a>
            </div>
        </div>

        <div class="hero-image">
            <div class="hero-content">

            </div>
        </div>
    </div>
</body>

</html>