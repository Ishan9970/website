<!DOCTYPE html>
<html lang="en">

<head>
    <title>IK Travel Guide - About</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
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
            color: #333;
            overflow-x: hidden;
            min-height: 100vh;
        }

        /* Navbar styling matching landing page */
        nav.navbar .container {
            display: flex !important;
            justify-content: space-between !important;
            align-items: center !important;
            width: 100% !important;
        }

        nav.navbar .navbar-brand {
            flex: 0 0 auto !important;
            margin-right: 0 !important;
            font-size: 2.2rem;
            font-weight: 700;
            background: linear-gradient(45deg, #ff6b6b, #feca57);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: 2px;
        }

        nav.navbar .navbar-collapse {
            flex-grow: 0 !important;
        }

        nav.navbar .navbar-nav {
            margin-left: auto !important;
            display: flex !important;
        }

        nav.navbar .nav-link {
            color: #fff !important;
            font-weight: 500;
            font-size: 1.1rem;
            margin: 0 15px;
            position: relative;
            transition: all 0.3s ease;
        }

        nav.navbar .nav-link:hover {
            color: #feca57 !important;
            transform: translateY(-3px);
        }

        nav.navbar .nav-link::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 50%;
            width: 0;
            height: 2px;
            background: linear-gradient(45deg, #ff6b6b, #feca57);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        nav.navbar .nav-link:hover::after {
            width: 100%;
        }

        /* Main content background */
        .main-content {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            min-height: 100vh;
            position: relative;
            padding-bottom: 6rem;
        }

        .main-content::before {
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

        .content-wrapper {
            position: relative;
            z-index: 2;
            padding-top: 6rem;
        }

        /* Hero section */
        .hero-section {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            border-radius: 30px;
            padding: 4rem 3rem;
            margin: 3rem auto;
            max-width: 900px;
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            animation: slideInUp 0.8s ease;
            text-align: center;
        }

        .hero-section h1 {
            font-size: 3.5rem;
            font-weight: 700;
            background: linear-gradient(45deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 2rem;
        }

        .hero-section p {
            font-size: 1.3rem;
            line-height: 1.8;
            color: #666;
            font-weight: 400;
        }

        /* About cards section */
        .about-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 3rem;
            margin: 4rem 0;
        }

        .about-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 25px;
            padding: 3rem 2rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: all 0.4s ease;
            text-align: center;
        }

        .about-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }

        .about-card i {
            font-size: 3rem;
            background: linear-gradient(45deg, #ff6b6b, #feca57);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1.5rem;
        }

        .about-card h3 {
            font-size: 1.8rem;
            font-weight: 700;
            background: linear-gradient(45deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
        }

        .about-card p {
            color: #666;
            font-size: 1.1rem;
            line-height: 1.6;
        }

        /* Skills section */
        .skills-section {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 30px;
            padding: 3rem 2rem;
            margin: 4rem 0;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .skills-section h2 {
            font-size: 2.8rem;
            font-weight: 700;
            color: #fff;
            text-align: center;
            margin-bottom: 3rem;
        }

        .skills-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
        }

        .skill-item {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 1.5rem;
            text-align: center;
            transition: all 0.3s ease;
        }

        .skill-item:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: scale(1.05);
        }

        .skill-item i {
            font-size: 2.5rem;
            color: #feca57;
            margin-bottom: 1rem;
        }

        .skill-item h4 {
            color: #fff;
            font-weight: 600;
            font-size: 1.2rem;
        }

        /* Footer */
        footer {
            background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
            color: #fff;
            text-align: center;
            padding: 2rem 0;
            font-weight: 600;
            font-size: 1.1rem;
            margin-top: auto;
        }

        /* Animations */
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

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .hero-section h1 {
                font-size: 2.5rem;
            }
            
            .hero-section {
                padding: 3rem 2rem;
            }
            
            .about-cards {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar matching landing page -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="fas fa-compass"></i> IK Travel Guide</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" 
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="about.php"><i class="fas fa-user"></i> About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <div class="content-wrapper">
            <div class="container">
                <!-- Hero Section -->
                <div class="hero-section">
                    <h1><i class="fas fa-user-circle"></i> About IK Travel Guide</h1>
                    <p>Greetings! I'm <strong>Ishan Kukreti</strong>, the visionary behind this dynamic travel platform, proudly hosted on AWS. This website isn't just a project; it's a manifestation of my passion for web development, travel exploration, and the continual pursuit of knowledge. Through this platform, my goal is to deliver a captivating and interactive experience for fellow travel enthusiasts. Join me on this exciting journey as we navigate the intricacies of cloud hosting and unlock the boundless possibilities within the realm of travel and web development.</p>
                </div>

                <!-- About Cards -->
                <div class="about-cards">
                    <div class="about-card">
                        <i class="fas fa-code"></i>
                        <h3>Web Developer</h3>
                        <p>Passionate about creating modern, responsive web applications using cutting-edge technologies and best practices in development.</p>
                    </div>

                    <div class="about-card">
                        <i class="fas fa-plane"></i>
                        <h3>Travel Enthusiast</h3>
                        <p>Exploring destinations worldwide and sharing insights to help fellow travelers discover amazing places and create unforgettable memories.</p>
                    </div>

                    <div class="about-card">
                        <i class="fas fa-cloud"></i>
                        <h3>Cloud Computing</h3>
                        <p>Experienced in AWS cloud services, server deployment, and scalable web hosting solutions for modern applications.</p>
                    </div>
                </div>

                <!-- Skills Section -->
                <div class="skills-section">
                    <h2><i class="fas fa-tools"></i> Technical Skills</h2>
                    <div class="skills-grid">
                        <div class="skill-item">
                            <i class="fab fa-html5"></i>
                            <h4>HTML5</h4>
                        </div>
                        <div class="skill-item">
                            <i class="fab fa-css3-alt"></i>
                            <h4>CSS3</h4>
                        </div>
                        <div class="skill-item">
                            <i class="fab fa-js"></i>
                            <h4>JavaScript</h4>
                        </div>
                        <div class="skill-item">
                            <i class="fab fa-php"></i>
                            <h4>PHP</h4>
                        </div>
                        <div class="skill-item">
                            <i class="fas fa-database"></i>
                            <h4>MySQL</h4>
                        </div>
                        <div class="skill-item">
                            <i class="fab fa-aws"></i>
                            <h4>AWS</h4>
                        </div>
                        <div class="skill-item">
                            <i class="fab fa-bootstrap"></i>
                            <h4>Bootstrap</h4>
                        </div>
                        <div class="skill-item">
                            <i class="fab fa-git-alt"></i>
                            <h4>Git</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p><i class="fas fa-globe"></i> &copy; <?php echo date("Y"); ?> IK Travel Guide. Discover the World with Us.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
