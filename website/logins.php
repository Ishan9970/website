<?php
session_start();
// After validating user credentials:
$_SESSION['username'] = $username; // Replace with actual variable
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IK Travel Guide - Login</title>
    
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="2" fill="rgba(255,255,255,0.1)"/><circle cx="80" cy="80" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="40" cy="60" r="1.5" fill="rgba(255,255,255,0.1)"/></svg>');
            opacity: 0.3;
            z-index: 1;
        }

        .login-container {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 450px;
            margin: 2rem;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            border-radius: 25px;
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.3);
            overflow: hidden;
            animation: slideInUp 0.8s ease;
        }

        .login-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 2.5rem 2rem 1.5rem;
            text-align: center;
            color: white;
        }

        .login-header i {
            font-size: 3rem;
            margin-bottom: 1rem;
            background: linear-gradient(45deg, #ff6b6b, #feca57);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .login-header h1 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .login-header p {
            font-size: 1rem;
            opacity: 0.9;
            font-weight: 300;
        }

        .login-body {
            padding: 2.5rem 2rem;
        }

        .form-group {
            margin-bottom: 1.8rem;
            position: relative;
        }

        .form-group label {
            font-weight: 600;
            color: #555;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
        }

        .form-group label i {
            margin-right: 0.5rem;
            color: #667eea;
        }

        .form-control {
            border-radius: 15px;
            border: 2px solid rgba(102, 126, 234, 0.2);
            padding: 1rem 1.5rem;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.8);
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 20px rgba(102, 126, 234, 0.3);
            background: #fff;
        }

        .btn-login {
            background: linear-gradient(45deg, #667eea, #764ba2);
            border: none;
            border-radius: 15px;
            padding: 1rem 2rem;
            font-size: 1.1rem;
            font-weight: 600;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            width: 100%;
            color: white;
        }

        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
            background: linear-gradient(45deg, #764ba2, #667eea);
            color: white;
        }

        .footer-text {
            margin-top: 2rem;
            text-align: center;
            color: #666;
            font-size: 1rem;
        }

        .footer-text a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .footer-text a:hover {
            color: #764ba2;
            text-decoration: none;
        }

        .alert-message {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 1rem 1.5rem;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            animation: slideInRight 0.5s ease;
        }

        .alert-success {
            background: linear-gradient(45deg, #48bb78, #38a169);
            color: white;
        }

        .alert-error {
            background: linear-gradient(45deg, #f56565, #e53e3e);
            color: white;
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(100px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Responsive adjustments */
        @media (max-width: 576px) {
            .login-container {
                margin: 1rem;
            }
            
            .login-header {
                padding: 2rem 1.5rem 1rem;
            }
            
            .login-body {
                padding: 2rem 1.5rem;
            }
        }
    </style>
</head>

<body>
    <?php
    include 'serverdb.php';
    $message = '';
    $messageType = '';
    
    if (isset($_POST['submit'])) {
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = $_POST['password'];

        $email_search = "SELECT * FROM regis WHERE email = '$email'";
        $query = mysqli_query($con, $email_search);
        $email_count = mysqli_num_rows($query);
        
        if ($email_count) {
            $email_pass = mysqli_fetch_assoc($query);
            $db_pass = $email_pass["password"];
            $pass_decode = password_verify($password, $db_pass);
            
            if ($pass_decode) {
                $_SESSION['user_email'] = $email;
                $message = "Login Successful! Redirecting...";
                $messageType = "success";
                echo "<script>
                    setTimeout(function() {
                        location.replace('index.php');
                    }, 2000);
                </script>";
            } else {
                $message = "Password Incorrect";
                $messageType = "error";
            }
        } else {
            $message = "Invalid Email Address";
            $messageType = "error";
        }
    }
    ?>

    <?php if (!empty($message)): ?>
        <div class="alert-message alert-<?php echo $messageType; ?>">
            <i class="fas <?php echo $messageType == 'success' ? 'fa-check-circle' : 'fa-exclamation-circle'; ?>"></i>
            <?php echo $message; ?>
        </div>
    <?php endif; ?>

    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <i class="fas fa-compass"></i>
                <h1>IK Travel Guide</h1>
                <p>Welcome back, explorer!</p>
            </div>
            
            <div class="login-body">
                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                    <div class="form-group">
                        <label for="email">
                            <i class="fas fa-envelope"></i> Email Address
                        </label>
                        <input name="email" id="email" class="form-control" 
                               placeholder="Enter your email address" type="email" required>
                    </div>

                    <div class="form-group">
                        <label for="password">
                            <i class="fas fa-lock"></i> Password
                        </label>
                        <input name="password" id="password" class="form-control" 
                               placeholder="Enter your password" type="password" required>
                    </div>

                    <button type="submit" name="submit" class="btn btn-login">
                        <i class="fas fa-sign-in-alt"></i> Login to Continue
                    </button>

                    <p class="footer-text">
                        Don't have an account? 
                        <a href="register.php">
                            <i class="fas fa-user-plus"></i> Sign Up Here
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
