<?php
session_start();
include 'serverdb.php';

$message = '';
$messageType = '';

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email    = mysqli_real_escape_string($con, $_POST['email']);
    $mobile   = mysqli_real_escape_string($con, $_POST['mobile']);
    $password = $_POST['password'];
    $cpassword= $_POST['cpassword'];

    // Server-side validations
    if (strlen($username) < 2) {
        $message = "Name must be at least 2 characters";
        $messageType = "error";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Invalid email format";
        $messageType = "error";
    } elseif (!preg_match('/^\d{10,13}$/', $mobile)) {
        $message = "Phone must be 10–13 digits (including country code)";
        $messageType = "error";
    } elseif ($password !== $cpassword) {
        $message = "Passwords do not match";
        $messageType = "error";
    } else {
        // Hash passwords
        $hashPass = password_hash($password, PASSWORD_BCRYPT);
        $hashCPass= password_hash($cpassword, PASSWORD_BCRYPT);

        // Check email uniqueness
        $res = mysqli_query($con, "SELECT * FROM regis WHERE email='$email'");
        if (mysqli_num_rows($res) > 0) {
            $message = "Email already exists";
            $messageType = "error";
        } else {
            // Insert new user
            $insert = mysqli_query($con,
                "INSERT INTO regis (username, email, mobile, password, cpassword)
                 VALUES ('$username','$email','$mobile','$hashPass','$hashCPass')"
            );
            if ($insert) {
                $message = "Account created successfully! Redirecting to login...";
                $messageType = "success";
                echo "<script>setTimeout(()=>location.replace('logins.php'),2000);</script>";
            } else {
                $message = "Registration failed: " . mysqli_error($con);
                $messageType = "error";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" /><meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>IK Travel Guide - Register</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <style>
    body{font-family:'Poppins',sans-serif;background:linear-gradient(135deg,#667eea,#764ba2);min-height:100vh;display:flex;align-items:center;justify-content:center;position:relative;padding:2rem 0;}
    body::before{content:'';position:absolute;inset:0;background:url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="2" fill="rgba(255,255,255,0.1)"/><circle cx="80" cy="80" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="40" cy="60" r="1.5" fill="rgba(255,255,255,0.1)"/></svg>');opacity:.3;z-index:1;}
    .register-container{position:relative;z-index:2;width:100%;max-width:500px;margin:1rem;}
    .register-card{background:rgba(255,255,255,.95);backdrop-filter:blur(15px);border-radius:25px;box-shadow:0 15px 50px rgba(0,0,0,.3);border:1px solid rgba(255,255,255,.3);overflow:hidden;animation:slideInUp .8s ease;}
    .register-header{background:linear-gradient(135deg,#667eea,#764ba2);padding:2.5rem 2rem 1.5rem;text-align:center;color:#fff;}
    .register-header i{font-size:3rem;margin-bottom:1rem;background:linear-gradient(45deg,#ff6b6b,#feca57);-webkit-background-clip:text;-webkit-text-fill-color:transparent;}
    .register-header h1{font-size:2rem;font-weight:700;margin-bottom:.5rem;}
    .register-header p{font-size:1rem;opacity:.9;font-weight:300;}
    .register-body{padding:2.5rem 2rem;}
    .form-group{margin-bottom:1.5rem;position:relative;}
    .form-group label{font-weight:600;color:#555;display:flex;align-items:center;margin-bottom:.5rem;}
    .form-group label i{margin-right:.5rem;color:#667eea;width:20px;}
    .form-control{border-radius:15px;border:2px solid rgba(102,126,234,.2);padding:1rem 1.5rem;font-size:1rem;transition:.3s;background:rgba(255,255,255,.8);}
    .form-control:focus{border-color:#667eea;box-shadow:0 0 20px rgba(102,126,234,.3);background:#fff;}
    .btn-register{background:linear-gradient(45deg,#667eea,#764ba2);border:none;border-radius:15px;padding:1rem 2rem;font-size:1.1rem;font-weight:600;transition:.3s;text-transform:uppercase;letter-spacing:1px;width:100%;color:#fff;margin-top:1rem;}
    .btn-register:hover{transform:translateY(-3px);box-shadow:0 10px 30px rgba(102,126,234,.4);background:linear-gradient(45deg,#764ba2,#667eea);}
    .footer-text{margin-top:2rem;text-align:center;color:#666;font-size:1rem;}
    .footer-text a{color:#667eea;text-decoration:none;font-weight:600;transition:.3s;}
    .footer-text a:hover{color:#764ba2;}
    .alert-message{position:fixed;top:20px;right:20px;padding:1rem 1.5rem;border-radius:15px;box-shadow:0 5px 15px rgba(0,0,0,.2);z-index:1000;animation:slideInRight .5s ease;max-width:350px;}
    .alert-success{background:linear-gradient(45deg,#48bb78,#38a169);color:#fff;}
    .alert-error{background:linear-gradient(45deg,#f56565,#e53e3e);color:#fff;}
    @keyframes slideInUp{from{opacity:0;transform:translateY(50px);}to{opacity:1;transform:translateY(0);}}
    @keyframes slideInRight{from{opacity:0;transform:translateX(100px);}to{opacity:1;transform:translateX(0);}}
  </style>
</head>

<body>
  <?php if($message): ?>
    <div class="alert-message alert-<?php echo $messageType;?>">
      <i class="fas <?php echo $messageType=='success'?'fa-check-circle':'fa-exclamation-circle';?>"></i>
      <?php echo $message;?>
    </div>
  <?php endif; ?>

  <div class="register-container">
    <div class="register-card">
      <div class="register-header">
        <i class="fas fa-user-plus"></i>
        <h1>Create Your Account</h1>
        <p>Join IK Travel Guide in under a minute!</p>
      </div>
      <div class="register-body">
        <form id="registerForm" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>">
          <div class="form-group">
            <label for="username"><i class="fas fa-user"></i> Full Name</label>
            <input type="text" id="username" name="username" class="form-control" placeholder="Your Name" required>
            <small class="text-danger d-none" id="nameError">Enter at least 2 characters.</small>
          </div>
          <div class="form-group">
            <label for="email"><i class="fas fa-envelope"></i> Email Address</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="you@example.com" required>
            <small class="text-danger d-none" id="emailError">Enter a valid email.</small>
          </div>
          <div class="form-group">
            <label for="mobile"><i class="fas fa-phone"></i> Phone Number</label>
            <input type="tel" id="mobile" name="mobile" class="form-control" placeholder="Country code + number" required>
            <small class="text-danger d-none" id="phoneError">Enter 10–13 digits (incl. country code).</small>
          </div>
          <div class="form-group">
            <label for="password"><i class="fas fa-lock"></i> Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Min 6 characters" required>
            <small class="text-danger d-none" id="passError">Minimum 6 characters.</small>
          </div>
          <div class="form-group">
            <label for="cpassword"><i class="fas fa-lock"></i> Confirm Password</label>
            <input type="password" id="cpassword" name="cpassword" class="form-control" placeholder="Repeat password" required>
            <small class="text-danger d-none" id="cpassError">Passwords do not match.</small>
          </div>
          <button type="submit" class="btn-register" name="submit"><i class="fas fa-rocket"></i> Register</button>
          <p class="footer-text">Already have an account? <a href="logins.php"><i class="fas fa-sign-in-alt"></i> Login</a></p>
        </form>
      </div>
    </div>
  </div>

  <script>
    document.getElementById('registerForm').addEventListener('submit', function(e) {
      let valid = true;
      const name = document.getElementById('username'), nameError = document.getElementById('nameError');
      if (name.value.trim().length < 2) { nameError.classList.remove('d-none'); valid = false; }
      else nameError.classList.add('d-none');

      const email = document.getElementById('email'), emailError = document.getElementById('emailError');
      const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailPattern.test(email.value.trim())) { emailError.classList.remove('d-none'); valid = false; }
      else emailError.classList.add('d-none');

      const phone = document.getElementById('mobile'), phoneError = document.getElementById('phoneError');
      if (!/^\d{10,13}$/.test(phone.value.trim())) { phoneError.classList.remove('d-none'); valid = false; }
      else phoneError.classList.add('d-none');

      const pass = document.getElementById('password'), passError = document.getElementById('passError');
      if (pass.value.length < 6) { passError.classList.remove('d-none'); valid = false; }
      else passError.classList.add('d-none');

      const cpass = document.getElementById('cpassword'), cpassError = document.getElementById('cpassError');
      if (cpass.value !== pass.value || cpass.value==='') { cpassError.classList.remove('d-none'); valid = false; }
      else cpassError.classList.add('d-none');

      if (!valid) e.preventDefault();
    });
  </script>
</body>
</html>
