<?php require 'config.php'; // Added missing semicolon  
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $duplicate = mysqli_query($conn, "SELECT * FROM tb_userss WHERE username = '$username' OR email = '$email'");
    
    if (mysqli_num_rows($duplicate) > 0) {
        echo "<script>alert('Username or email is already taken');</script>"; // Added semicolon
    } else {
        if ($password == $confirmpassword) {
            $query = "INSERT INTO tb_userss (name, username, email, password)
                      VALUES('$name', '$username', '$email', '$password')";
            mysqli_query($conn, $query);  // This is line 17
            echo "<script>alert('Registration Successful');</script>";
            header("location: login.php");
        } else {
            echo "<script>alert('Password does not match');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="music.png" type="image/x-icon">
    <title>Wave-Tune - regestration</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            background-color:rgba(245, 245, 245, 0.43);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .container {
            display: flex;
            width: 100%;
            height: 100vh;
            background: white;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border-radius: 4px;
            overflow: hidden;
        }
        
        .form-container {
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
        }
        
        .image-container {
            flex: 1;
            background-image: url('mark-cruz-w3-zaydSNRY-unsplash.jpg');
            background-size: cover;
            background-position: center;
            position: relative;
        }
        
        .brand {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 40px;
            color: #333;
            letter-spacing: 0.5px;
        }
        
        h1 {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            margin-bottom: 8px;
            font-weight: 600;
        }
        
        .subtitle {
            font-size: 14px;
            color: #777;
            margin-bottom: 30px;
            font-weight: 300;
        }
        
        label {
            display: block;
            font-size: 14px;
            margin-bottom: 6px;
            color: #333;
            font-weight: 500;
        }
        
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 18px;
            border: 1px solid #e1e1e1;
            border-radius: 4px;
            font-size: 14px;
            transition: border-color 0.3s;
        }
        
        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #333;
            outline: none;
        }
        
        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            font-size: 13px;
        }
        
        .remember-me {
            display: flex;
            align-items: center;
        }
        
        .remember-me input {
            margin-right: 5px;
        }
        
        .forgot-password {
            color: #333;
            text-decoration: none;
            font-size: 13px;
        }
        
        button[type="submit"] {
            width: 100%;
            padding: 14px;
            background-color: #000;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 15px;
            font-weight: 500;
            margin-bottom: 16px;
            transition: background-color 0.3s;
        }
        
        button[type="submit"]:hover {
            background-color: #333;
        }
        
        .google-signin {
            width: 100%;
            padding: 12px;
            background-color: white;
            border: 1px solid #e1e1e1;
            border-radius: 4px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 14px;
            margin-bottom: 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .google-signin:hover {
            background-color: #f9f9f9;
        }
        
        .google-icon {
            margin-right: 10px;
            font-size: 18px;
            color: #4285F4;
        }
        
        .signup-link {
            font-size: 13px;
            text-align: center;
            /* margin-top: auto; */
            color: #777;
        }
        
        .signup-link a {
            color: #333;
            text-decoration: none;
            font-weight: 600;
        }
        
        .image-overlay {
            position: absolute;
            bottom: 40px;
            left: 30px;
            color: white;
        }
        
        .image-title {
            font-family: 'Playfair Display', serif;
            font-size: 42px;
            margin-bottom: 12px;
            letter-spacing: 1px;
        }

        .imagee {
            position: relative;
            top: 9px;
            width: 30px;
            height: 30px;
        }

        .flexee {
            gap: 10px;
            display: flex;
            flex-direction: row;
        }
        
        .image-desc {
            font-size: 13px;
            max-width: 80%;
            line-height: 1.5;
            text-shadow: 0 1px 3px rgba(0,0,0,0.2);
        }
        
        /* Adding a beautiful overlay effect to the image */
        .image-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.5) 0%, rgba(0,0,0,0.3) 30%, rgba(0,0,0,0.1) 100%);
        }
        
        /* Korean text */
        .korean-text {
            font-size: 14px;
            opacity: 0.8;
            margin-top: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
        <div class="flexee">
                <img class="imagee" src="music.png" alt="">
                <h1>WaveTune</h1>
            </div><br>
            <p class="subtitle">Join us today to access all our features</p>
            
            <form action="" method="post" autocomplete="off">
                <label for="name">Full Name</label>
                <input type="text" name="name" id="name" required placeholder="Enter your full name">
                
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required placeholder="Choose a username">
                
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required placeholder="Enter your email address">
                
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required placeholder="Create a password">
                
                <label for="confirmpassword">Confirm Password</label>
                <input type="password" name="confirmpassword" id="confirmpassword" required placeholder="Confirm your password">
                
                <button type="submit" name="submit">Register</button>
            </form>
            
            <div class="signup-link">
                Already have an account? <a href="login.php">Sign in</a>
            </div>
        </div>
        
        <div class="image-container">
            
        </div>
    </div>
</body>
</html>