<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: logins.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>IK Travel Guide - Explore Your Next Destination</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg,#667eea,#764ba2);
            color:#333; overflow-x:hidden;
        }
        /* Navbar */
        nav.navbar { background:rgba(0,0,0,0.9)!important; backdrop-filter:blur(10px); box-shadow:0 2px 20px rgba(0,0,0,0.3); padding:.8rem 0; }
        .navbar .container { display:flex!important; justify-content:space-between!important; align-items:center!important; width:100%!important; }
        .navbar-brand {
            font-size:2.2rem; font-weight:700;
            background:linear-gradient(45deg,#ff6b6b,#feca57);
            -webkit-background-clip:text; -webkit-text-fill-color:transparent;
            letter-spacing:2px; flex:none; margin-right:0;
        }
        .navbar-collapse { flex-grow:0!important; }
        .navbar-nav { margin-left:auto!important; }
        .nav-link {
            color:#fff!important; font-weight:500; font-size:1.1rem;
            margin:0 15px; position:relative; transition:.3s;
        }
        .nav-link:hover { color:#feca57!important; transform:translateY(-2px); }
        .nav-link::after {
            content:''; position:absolute; bottom:-5px; left:50%; width:0; height:2px;
            background:linear-gradient(45deg,#ff6b6b,#feca57); transition:.3s; transform:translateX(-50%);
        }
        .nav-link:hover::after { width:100%; }
        /* Carousel */
        .carousel-item img { height:80vh; object-fit:cover; filter:brightness(.7); }
        .carousel-caption {
            background:rgba(0,0,0,.6); backdrop-filter:blur(10px);
            border-radius:20px; padding:2rem 3rem; border:1px solid rgba(255,255,255,.2);
            animation:slideInUp .8s ease;
        }
        .carousel-caption h3 {
            font-size:3.5rem; font-weight:700;
            background:linear-gradient(45deg,#ff6b6b,#feca57);
            -webkit-background-clip:text; -webkit-text-fill-color:transparent;
        }
        .carousel-caption p { font-size:1.4rem; color:#fff; font-weight:300; opacity:.9; }
        /* Main */
        .main-content { background:linear-gradient(135deg,#f093fb,#f5576c); position:relative; }
        .main-content::before {
            content:''; position:absolute; inset:0;
            background:url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg"><circle cx="20" cy="20" r="2" fill="rgba(255,255,255,0.1)"/><circle cx="80" cy="80" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="40" cy="60" r="1.5" fill="rgba(255,255,255,0.1)"/></svg>');
            opacity:.3; z-index:1;
        }
        .content-wrapper { position:relative; z-index:2; }
        .section-title {
            font-weight:700; font-size:3.2rem; text-align:center; margin:4rem 0 3rem;
            background:linear-gradient(45deg,#667eea,#764ba2);
            -webkit-background-clip:text; -webkit-text-fill-color:transparent;
            position:relative; animation:fadeInUp .8s ease;
        }
        .section-title::after {
            content:''; position:absolute; bottom:-10px; left:50%; width:80px; height:4px;
            background:linear-gradient(45deg,#ff6b6b,#feca57); border-radius:2px;
            transform:translateX(-50%);
        }
        /* Destination Cards */
        .destination-card {
            background:rgba(255,255,255,.95); backdrop-filter:blur(10px);
            border-radius:25px; overflow:hidden; box-shadow:0 10px 40px rgba(0,0,0,.2);
            border:1px solid rgba(255,255,255,.3); transition:.4s;
        }
        .destination-card:hover { transform:translateY(-15px) scale(1.03); box-shadow:0 20px 60px rgba(0,0,0,.3); }
        .destination-card img { width:100%; height:280px; object-fit:cover; transition:.4s; }
        .destination-card:hover img { transform:scale(1.1); }
        .destination-card-body { padding:2rem 1.8rem; }
        .destination-card-body h5 {
            font-weight:700; font-size:1.6rem;
            background:linear-gradient(45deg,#667eea,#764ba2);
            -webkit-background-clip:text; -webkit-text-fill-color:transparent;
        }
        .destination-card-body p { color:#666; font-size:1.1rem; line-height:1.6; }
        /* Testimonials */
        .testimonials { background:rgba(255,255,255,.1); backdrop-filter:blur(10px); border-radius:30px; padding:3rem 2rem; margin:4rem 0; border:1px solid rgba(255,255,255,.2); }
        .testimonial-item { text-align:center; padding:2rem; }
        .testimonial-item p { font-style:italic; color:#fff; margin-bottom:1.5rem; }
        .testimonial-item h5 { color:#feca57; font-weight:700; }
        .testimonial-item .stars { color:#ffca28; margin-bottom:1rem; }
        /* Tips */
        .tips-section { background:rgba(255,255,255,.1); backdrop-filter:blur(10px); border-radius:30px; padding:3rem 2rem; margin:4rem 0; border:1px solid rgba(255,255,255,.2); }
        .tips-list{list-style:none;padding:0;}
        .tips-list li {
            font-size:1.3rem;color:#fff;font-weight:400;padding-left:3rem;position:relative;margin-bottom:1.5rem;opacity:0;animation:fadeInLeft .6s ease forwards;
        }
        .tips-list li:nth-child(1){animation-delay:.1s;} .tips-list li:nth-child(2){animation-delay:.2s;}
        .tips-list li:nth-child(3){animation-delay:.3s;} .tips-list li:nth-child(4){animation-delay:.4s;}
        .tips-list li:nth-child(5){animation-delay:.5s;}
        .tips-list li::before {
            content:'\f5a0'; font-family:'Font Awesome 6 Free'; font-weight:900;
            position:absolute; left:0; color:#feca57; font-size:1.5rem;
        }
        /* Contact Form */
        .contact-section {
            background:rgba(255,255,255,.95); backdrop-filter:blur(15px);
            border-radius:30px; padding:3rem 2.5rem; box-shadow:0 15px 50px rgba(0,0,0,.2);
            max-width:700px; margin:4rem auto 2rem; border:1px solid rgba(255,255,255,.3);
            animation:slideInUp .8s ease;
        }
        .contact-section h2 {
            background:linear-gradient(45deg,#667eea,#764ba2);
            -webkit-background-clip:text; -webkit-text-fill-color:transparent;
            font-weight:700; font-size:2.5rem; margin-bottom:2rem; text-align:center;
        }
        .form-control {
            border-radius:15px; border:2px solid rgba(102,126,234,.2);
            padding:1rem 1.5rem; font-size:1.1rem; transition:.3s;background:rgba(255,255,255,.8);
        }
        .form-control:focus { border-color:#667eea; box-shadow:0 0 20px rgba(102,126,234,.3); background:#fff; }
        .btn-primary {
            background:linear-gradient(45deg,#667eea,#764ba2); border:none; border-radius:15px;
            padding:1rem 2rem; font-size:1.2rem; font-weight:600; text-transform:uppercase; letter-spacing:1px;
            transition:.3s; width:100%;
        }
        .btn-primary:hover { transform:translateY(-3px); box-shadow:0 10px 30px rgba(102,126,234,.4); background:linear-gradient(45deg,#764ba2,#667eea); }
        /* FAQ */
        .faq-section { max-width:800px; margin:4rem auto; }
        .faq-item { background:rgba(255,255,255,.9); border-radius:15px; margin-bottom:1rem; overflow:hidden; }
        .faq-question {
            padding:1rem 1.5rem; cursor:pointer; position:relative;
            font-weight:600; background:linear-gradient(45deg,#667eea,#764ba2); color:#fff;
        }
        .faq-question i { position:absolute; right:1.5rem; top:50%; transform:translateY(-50%); transition:.3s; }
        .faq-answer {
            max-height:0; padding:0 1.5rem; background:#fff; transition:max-height .3s ease, padding .3s ease;
        }
        .faq-answer p { margin:1rem 0; color:#333; }
        .faq-item.open .faq-answer { max-height:200px; padding:1rem 1.5rem; }
        .faq-item.open .faq-question i { transform:translateY(-50%) rotate(180deg); }
        /* Footer */
        footer {
            background:linear-gradient(90deg,#667eea,#764ba2);
            color:#fff; text-align:center; padding:2rem 0; font-weight:600; font-size:1.1rem;
        }
        @keyframes fadeInUp{from{opacity:0;transform:translateY(30px);}to{opacity:1;transform:translateY(0);}}
        @keyframes fadeInLeft{from{opacity:0;transform:translateX(-30px);}to{opacity:1;transform:translateX(0);}}
        @keyframes slideInUp{from{opacity:0;transform:translateY(50px);}to{opacity:1;transform:translateY(0);}}
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="fas fa-compass"></i> IK Travel Guide</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div style="height:80px;"></div>

    <!-- Carousel -->
    <div id="destinationCarousel" class="carousel slide" data-ride="carousel" data-interval="5000">
        <ol class="carousel-indicators">
            <li data-target="#destinationCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#destinationCarousel" data-slide-to="1"></li>
            <li data-target="#destinationCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/japan.jpg" class="d-block w-100" alt="Japan">
                <div class="carousel-caption d-none d-md-block">
                    <h3><i class="fas fa-torii-gate"></i> Tokyo, Japan</h3>
                    <p>Experience the vibrant blend of tradition and futurism in the heart of Japan.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/swit.jpg" class="d-block w-100" alt="Switzerland">
                <div class="carousel-caption d-none d-md-block">
                    <h3><i class="fas fa-mountain"></i> Swiss Alps, Switzerland</h3>
                    <p>Breathe in breathtaking alpine views & world-class skiing destinations.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/london.jpg" class="d-block w-100" alt="London">
                <div class="carousel-caption d-none d-md-block">
                    <h3><i class="fas fa-crown"></i> London, United Kingdom</h3>
                    <p>Discover rich history, iconic landmarks & vibrant cultural scenes.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#destinationCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#destinationCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>

    <div class="main-content">
        <div class="content-wrapper container">

            <!-- Featured Destinations -->
            <section class="py-5">
                <h2 class="section-title"><i class="fas fa-map-marked-alt"></i> Explore Top Destinations</h2>
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="destination-card">
                            <img src="images/paris.avif" alt="Paris, France">
                            <div class="destination-card-body">
                                <h5><i class="fas fa-heart"></i> Paris, France</h5>
                                <p>The city of love, style, and iconic architecture like the Eiffel Tower awaits your arrival.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="destination-card">
                            <img src="images/goa.png" alt="Goa, India">
                            <div class="destination-card-body">
                                <h5><i class="fas fa-sun"></i> Goa, India</h5>
                                <p>Sun, sand, and vibrant nightlife make Goa a dream beach destination in India.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="destination-card">
                            <img src="images/rome.png" alt="Rome, Italy">
                            <div class="destination-card-body">
                                <h5><i class="fas fa-landmark"></i> Rome, Italy</h5>
                                <p>Step back in time and discover ancient ruins, art, and romantic piazzas.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Testimonials -->
            <section class="testimonials">
                <h2 class="section-title" style="color:#fff;"><i class="fas fa-star"></i> What Travelers Say</h2>
                <div class="row">
                    <div class="col-md-4 testimonial-item">
                        <div class="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i></div>
                        <p>"IK Travel Guide helped me plan the perfect trip to Europe. Every recommendation was spot on!"</p>
                        <h5>– Emily R.</h5>
                    </div>
                    <div class="col-md-4 testimonial-item">
                        <div class="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></div>
                        <p>"The destination guides are so detailed and beautifully laid out. Highly recommend to fellow travelers."</p>
                        <h5>– Michael T.</h5>
                    </div>
                    <div class="col-md-4 testimonial-item">
                        <div class="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i><i class="far fa-star"></i></div>
                        <p>"I loved it how they exploring new places so easy and fun!"</p>
                        <h5>– Sofia L.</h5>
                    </div>
                </div>
            </section>

            <!-- Travel Tips -->
            <section>
                <div class="tips-section">
                    <h2 class="section-title" style="color:#fff; margin-top:0;"><i class="fas fa-lightbulb"></i> Expert Travel Tips</h2>
                    <ul class="tips-list">
                        <li>Always carry a copy of your important documents and store them separately.</li>
                        <li>Learn basic local phrases to enhance your travel experience and connect with locals.</li>
                        <li>Research weather patterns and pack accordingly for your destination's climate.</li>
                        <li>Try local cuisines but choose reputable restaurants for the best experience.</li>
                        <li>Respect local customs and traditions to build meaningful cultural connections.</li>
                    </ul>
                </div>
            </section>

            <!-- Contact Form -->
            <div class="contact-section">
                <h2><i class="fas fa-paper-plane"></i> Plan Your Journey</h2>
                <form action="userinfo.php" method="post" novalidate>
                    <div class="form-group">
                        <label for="user"><i class="fas fa-user"></i> Full Name</label>
                        <input type="text" name="user" id="user" class="form-control" placeholder="Enter your full name" required />
                    </div>
                    <div class="form-group">
                        <label for="email"><i class="fas fa-envelope"></i> Email Address</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email address" required />
                    </div>
                    <div class="form-group">
                        <label for="mobile"><i class="fas fa-phone"></i> Mobile Number</label>
                        <input type="tel" name="mobile" id="mobile" class="form-control" placeholder="Enter your phone number" required />
                    </div>
                    <div class="form-group">
                        <label for="comments"><i class="fas fa-comment"></i> Travel Inquiry</label>
                        <textarea name="comments" id="comments" rows="4" class="form-control" placeholder="Tell us about your dream destination or travel plans..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="fas fa-rocket"></i> Start My Adventure
                    </button>
                </form>
            </div>

            <!-- FAQ Section -->
            <section class="faq-section">
                <h2 class="section-title"><i class="fas fa-question-circle"></i> Frequently Asked Questions</h2>
                <div class="faq-item">
                    <div class="faq-question">How do I book a recommended tour?<i class="fas fa-chevron-down"></i></div>
                    <div class="faq-answer"><p>You can contact us via the form above, and we’ll guide you through booking options.</p></div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">Can I customize my travel itinerary?<i class="fas fa-chevron-down"></i></div>
                    <div class="faq-answer"><p>Yes—just fill in your preferences in the inquiry form and we’ll work with you to create a personalized itinerary.</p></div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">Do you offer group discounts?<i class="fas fa-chevron-down"></i></div>
                    <div class="faq-answer"><p>We do! Contact us with your group details and travel dates, and we’ll provide a custom group rate.</p></div>
                </div>
            </section>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p><i class="fas fa-globe"></i> &copy; <?php echo date("Y"); ?> IK Travel Guide. Discover the World with Us.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // FAQ toggle
        document.querySelectorAll('.faq-question').forEach(q => {
            q.addEventListener('click', () => {
                const item = q.parentElement;
                item.classList.toggle('open');
            });
        });
    </script>
</body>

</html>
