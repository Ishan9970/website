<!DOCTYPE html>
<html lang="en">

<head>
    <title>IK Tech</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: url('images/bg2.jpg') center center fixed;
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: #343a40; 
            margin: 0; 
            padding: 0; 
        }

        nav {
            background-color: rgba(0, 0, 0, 0.7); 
        }

        .carousel-item {
            text-align: center; 
        }

        .my-5 {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px; 
            margin: 20px 0; 
        }

        footer {
            background-color: #343a40; 
            color: white; 
            padding: 10px 0;
        }

        /* Custom Styles */
        .welcome-section {
            text-align: center;
        }

        .welcome-text {
            font-size: 24px; 
            margin-bottom: 10px; 
        }
    </style>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">IK Tech</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </nav>

  <div id="demo" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
    </ul>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/japan.jpg" alt="Japan" width="1100" height="500">
        <div class="carousel-caption">
          <h3>Japan</h3>
          <p>We had such a great time in Japan!</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/swit.jpg" alt="Switzerland" width="1100" height="500">
        <div class="carousel-caption">
          <h3>Switzerland</h3>
          <p>Thank you, Switzerland!</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/london.jpg" alt="london" width="1100" height="500">
        <div class="carousel-caption">
          <h3>london</h3>
          <p>We love the Great london!</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>
  </div>

  <section class="my-5 welcome-section" style="background-color: rgba(255, 255, 255, 0.3); colour: #000;">
    <div class="py-5">
      <h2 class="text-center">Welcome</h2>
    </div>
    <div class="container-fluid">
      <div class="col-lg-6 col-md-6 col-12 mx-auto">
        <h2 class="display-2 welcome-text">Hello, my name is Ishan Kukreti.</h2>
        <p class="py-1 welcome-text">Welcome to my Dynamic website page, and I am making this for my mini project.</p>
        <a href="about.php" class="btn btn-success">Check More</a>
      </div>
    </div>
  </section>

  <section class="my-5" style="background-color: rgba(255, 255, 255, 0.3); color: #000;">
    <div class="py-5">
      <h2 class="text-center">Gallery</h2>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4  col-md-4  col-12">
          <img src="images/paris.avif" class="img-fluid pb-3">
        </div>
        <div class="col-lg-4  col-md-4  col-12">
          <img src="images/lv.jpg" class="img-fluid pb-3">
        </div>
        <div class="col-lg-4  col-md-4  col-12">
          <img src="images/goa.png" class="img-fluid pb-3">
        </div>
        <div class="col-lg-4  col-md-4  col-12">
          <img src="images/korea.png" class="img-fluid pb-3">
        </div>
        <div class="col-lg-4  col-md-4  col-12">
          <img src="images/swe.png" class="img-fluid pb-3">
        </div>
        <div class="col-lg-4  col-md-4  col-12">
          <img src="images/ger.png" class="img-fluid pb-3">
        </div>
        <div class="col-lg-4  col-md-4  col-12">
          <img src="images/phi.png" class="img-fluid pb-3">
        </div>
        <div class="col-lg-4  col-md-4  col-12">
          <img src="images/rome.png" class="img-fluid pb-3">
        </div>

        <div class="col-lg-4  col-md-4  col-12">
          <img src="images/aus.png" class="img-fluid pb-3">
        </div>

      </div>
  </section>

  <section class="my-5" style="background-color: rgba(255, 255, 255, 0.3); colour: #000;">
    <div class="py-5">
      <h2 class="text-center">Contact Us</h2>
    </div>
    <div class="w-50 m-auto">
      <form action="userinfo.php" method="post">
        <div class="form-group">
        <label style="color: #000;">Username</label>
          <input type="text" name="user" autocomplete="off" class="form-control">
        </div>
        <div class="form-group">
          <label>Email Id</label>
          <input type="text" name="email" autocomplete="off" class="form-control">
        </div>
        <div class="form-group">
          <label>Mobile</label>
          <input type="text" name="mobile" autocomplete="off" class="form-control">
        </div>
        <div class="form-group">
          <label>Comments</label>
          <textarea class="form-control" name="comments">
        </textarea>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
      </form>
    </div>
  </section>

  <footer>
    <p class="p-3 bg-dark text-white text-center">
      @IK Tech</p>
  </footer>


  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
