<?php
session_start();

$username_correct = "admin";
$password_correct = "WG-0226";
$error = "";

if (isset($_POST['login'])) {
    $user = $_POST['username'] ?? '';
    $pass = $_POST['password'] ?? '';

    if ($user === $username_correct && $pass === $password_correct) {
        $_SESSION['authenticated'] = true;
    } else {
        $error = "Invalid username or password.";
    }
}

if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    include 'style_css.php';
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Login | Wealth Genius</title>
        <style>
            :root {
                --primary-green: #279C5C;
                --dark-green: #043B1C;
                --white: #ffffff;
                --gray: #f4f7f6;
            }
            body {
                background: linear-gradient(135deg, var(--dark-green) 0%, #0a1f14 100%);
                height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                font-family: 'Inter', sans-serif;
                margin: 0;
            }
            .login-card {
                background: rgba(255, 255, 255, 0.05);
                backdrop-filter: blur(20px);
                border: 1px solid rgba(255, 255, 255, 0.1);
                padding: 3rem;
                border-radius: 24px;
                width: 100%;
                max-width: 450px;
                box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
                text-align: center;
                animation: fadeInUp 0.8s ease-out;
            }
            @keyframes fadeInUp {
                from { opacity: 0; transform: translateY(20px); }
                to { opacity: 1; transform: translateY(0); }
            }
            .logo-placeholder {
                margin-bottom: 2rem;
            }
            .logo-placeholder img {
                max-width: 180px;
            }
            h2 {
                color: var(--white);
                margin-bottom: 0.5rem;
                font-weight: 700;
                letter-spacing: -0.02em;
            }
            p.subtitle {
                color: rgba(255, 255, 255, 0.6);
                margin-bottom: 2.5rem;
                font-size: 0.95rem;
            }
            .form-group {
                text-align: left;
                margin-bottom: 1.5rem;
            }
            label {
                display: block;
                color: rgba(255, 255, 255, 0.8);
                margin-bottom: 0.5rem;
                font-size: 0.85rem;
                font-weight: 500;
            }
            input {
                width: 100%;
                padding: 12px 16px;
                background: rgba(255, 255, 255, 0.08);
                border: 1px solid rgba(255, 255, 255, 0.1);
                border-radius: 12px;
                color: white;
                font-size: 1rem;
                transition: all 0.3s ease;
                outline: none;
            }
            input:focus {
                background: rgba(255, 255, 255, 0.12);
                border-color: var(--primary-green);
                box-shadow: 0 0 0 4px rgba(39, 156, 92, 0.15);
            }
            .error-msg {
                color: #ff4d4d;
                background: rgba(255, 77, 77, 0.1);
                padding: 10px;
                border-radius: 8px;
                font-size: 0.85rem;
                margin-bottom: 1.5rem;
                border: 1px solid rgba(255, 77, 77, 0.2);
            }
            button {
                width: 100%;
                padding: 14px;
                background: linear-gradient(to right, var(--primary-green), #1e7d4a);
                border: none;
                border-radius: 12px;
                color: white;
                font-weight: 600;
                font-size: 1rem;
                cursor: pointer;
                transition: transform 0.2s, box-shadow 0.2s;
                margin-top: 1rem;
            }
            button:hover {
                transform: translateY(-2px);
                box-shadow: 0 10px 15px -3px rgba(39, 156, 92, 0.4);
            }
            button:active {
                transform: translateY(0);
            }
            .copyright {
                margin-top: 2.5rem;
                color: rgba(255, 255, 255, 0.3);
                font-size: 0.75rem;
            }
        </style>
    </head>
    <body>
        <div class="login-card">
            <div class="logo-placeholder">
                <img src="<?= $base_url ?>assets/images/logo.png" alt="Wealth Genius">
            </div>
            <h2>Secure Access</h2>
            <p class="subtitle">Please enter your credentials to proceed.</p>
            
            <?php if ($error): ?>
                <div class="error-msg"><?php echo $error; ?></div>
            <?php endif; ?>

            <form method="POST">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" required autocomplete="off">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" required>
                </div>
                <button type="submit" name="login">Sign In</button>
            </form>

            <div class="copyright">
                &copy; <?php echo date('Y'); ?> Wealth Genius Ltd. All rights reserved.
            </div>
        </div>
    </body>
    </html>
    <?php
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title></title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <?php include 'style_css.php' ?>
</head>

<body>

    <!--Header-->
    <?php include 'header.php' ?>
    <!--Header-->



    <section class="index-banner-new">
        <img src="<?= $base_url ?>assets/images/banner-1.webp" alt="Wealth Genius Banner" class="banner-bg-img">
        <div class="banner-content">
            <div class="badge-pill" data-aos="fade-up">
                <span class="dot"></span>
                Trusted by NHS Professionals
            </div>
            <h1 data-aos="fade-up" data-aos-delay="100">
                Your Financial Future,<br>
                <span class="green-text">Secured with Confidence</span>
            </h1>
            <p data-aos="fade-up" data-aos-delay="200">
                Expert guidance on NHS pensions, retirement planning, and wealth management tailored for healthcare professionals across the UK.
            </p>
            <div class="banner-actions" data-aos="fade-up" data-aos-delay="300">
                <a href="<?= $base_url ?>contact.php" class="btn-premium solid">
                    Book Free Consultation
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </a>
                <a href="#" class="btn-premium outline">
                    Download McCloud Guide
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><polyline points="19 12 12 19 5 12"></polyline></svg>
                </a>
            </div>
        </div>
    </section>


    <section class="our-services">
        <div class="container-sm">
            <div class="service_main">
                <div class="serviceHd">
                    <h1 data-aos="fade-up" data-aos-delay="100">Our Services</h1>
                    <p data-aos="fade-up" data-aos-delay="200">Featured below are the ones our clients ask for most frequently.</p>
                </div>
                <div class="service_grid_main">
                    <div class="service_grid">
                        <a href="<?= $base_url ?>services/retirement-planning.php" data-aos="fade-up">
                            <img src="<?= $base_url ?>assets/images/services/service-1.webp">
                            <div class="service-text">
                                <h3 data-aos="fade-up" data-aos-delay="100">Retirement<br>Planning</h3>
                                <span class="arrow"><svg width="19" height="18" viewBox="0 0 19 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 9H17" stroke="url(#paint0_linear_785_234)" stroke-width="2"
                                            stroke-linecap="round" />
                                        <path d="M10 1L18 9L10 17" stroke="url(#paint1_linear_785_234)" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <defs>
                                            <linearGradient id="paint0_linear_785_234" x1="1" y1="9" x2="2.91369"
                                                y2="14.7292" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#279C5C" />
                                                <stop offset="1" stop-color="#043B1C" />
                                            </linearGradient>
                                            <linearGradient id="paint1_linear_785_234" x1="10" y1="1" x2="19.4503"
                                                y2="1.88414" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#279C5C" />
                                                <stop offset="1" stop-color="#043B1C" />
                                            </linearGradient>
                                        </defs>
                                    </svg></span>
                            </div>
                        </a>
                    </div>
                    <div class="service_grid">
                        <a href="<?= $base_url ?>nhs-pension-guidance.php" data-aos="fade-up" data-aos-delay="100">
                            <img src="<?= $base_url ?>assets/images/services/service-2.webp">
                            <div class="service-text">
                                <h3 data-aos="fade-up" data-aos-delay="300">NHS pension<br>support</h3>
                                <span class="arrow"><svg width="19" height="18" viewBox="0 0 19 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 9H17" stroke="url(#paint0_linear_785_234)" stroke-width="2"
                                            stroke-linecap="round" />
                                        <path d="M10 1L18 9L10 17" stroke="url(#paint1_linear_785_234)" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <defs>
                                            <linearGradient id="paint0_linear_785_234" x1="1" y1="9" x2="2.91369"
                                                y2="14.7292" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#279C5C" />
                                                <stop offset="1" stop-color="#043B1C" />
                                            </linearGradient>
                                            <linearGradient id="paint1_linear_785_234" x1="10" y1="1" x2="19.4503"
                                                y2="1.88414" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#279C5C" />
                                                <stop offset="1" stop-color="#043B1C" />
                                            </linearGradient>
                                        </defs>
                                    </svg></span>
                            </div>
                        </a>
                    </div>
                    <div class="service_grid">
                        <a href="<?= $base_url ?>contingent-decisions.php" data-aos="fade-up" data-aos-delay="200">
                            <img src="<?= $base_url ?>assets/images/services/service-3.webp">
                            <div class="service-text">
                                <h3 data-aos="fade-up" data-aos-delay="500">McCloud and<br>Contingent decision</h3>
                                <span class="arrow"><svg width="19" height="18" viewBox="0 0 19 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 9H17" stroke="url(#paint0_linear_785_234)" stroke-width="2"
                                            stroke-linecap="round" />
                                        <path d="M10 1L18 9L10 17" stroke="url(#paint1_linear_785_234)" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <defs>
                                            <linearGradient id="paint0_linear_785_234" x1="1" y1="9" x2="2.91369"
                                                y2="14.7292" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#279C5C" />
                                                <stop offset="1" stop-color="#043B1C" />
                                            </linearGradient>
                                            <linearGradient id="paint1_linear_785_234" x1="10" y1="1" x2="19.4503"
                                                y2="1.88414" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#279C5C" />
                                                <stop offset="1" stop-color="#043B1C" />
                                            </linearGradient>
                                        </defs>
                                    </svg></span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="text-link home-text-link" data-aos="fade-up" data-aos-delay="100">
                    <a href="<?= $base_url ?>service.php">Know More <span><svg viewBox="0 0 9 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0.5 3.18188C0.223858 3.18188 0 3.40574 0 3.68188C0 3.95803 0.223858 4.18188 0.5 4.18188V3.68188V3.18188ZM8.85355 4.03544C9.04882 3.84018 9.04882 3.52359 8.85355 3.32833L5.67157 0.146351C5.47631 -0.0489113 5.15973 -0.0489113 4.96447 0.146351C4.7692 0.341613 4.7692 0.658195 4.96447 0.853458L7.79289 3.68188L4.96447 6.51031C4.7692 6.70557 4.7692 7.02216 4.96447 7.21742C5.15973 7.41268 5.47631 7.41268 5.67157 7.21742L8.85355 4.03544ZM0.5 3.68188V4.18188H8.5V3.68188V3.18188H0.5V3.68188Z"
                                    fill="url(#paint0_linear_711_11794)" />
                                <defs>
                                    <linearGradient id="paint0_linear_711_11794" x1="0.5" y1="3.68188" x2="3.44161"
                                        y2="8.08522" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#279C5C" />
                                        <stop offset="1" stop-color="#043B1C" />
                                    </linearGradient>
                                </defs>
                            </svg>
                        </span></a>
                </div>
            </div>
        </div>
    </section>

    <section class="whyNeed">
        <div class="container-sm">
            <div class="whyPensionMain">
                <div class="whyPensionImg">
                    <img data-aos="fade-up" data-aos-delay="100"
                        src="<?= $base_url ?>assets/images/about-wealth-genius.webp">
                </div>
                <div class="PensionTxt">
                    <h2 data-aos="fade-up" data-aos-delay="200">Welcome to<br>Wealth Genius Ltd</h2>
                    <p data-aos="fade-up" data-aos-delay="300"><b>Experience the true joy of financial freedom—peace of
                            mind and a life free from the worries of uncertainty.</b></p>
                    <p data-aos="fade-up" data-aos-delay="400">Our mission is to guide you and your family toward a
                        secure and prosperous financial future.</p>
                    <p data-aos="fade-up" data-aos-delay="500">This is the start of our journey together, to prepare the
                        plan to meet your goals, to ensure that you, your family and your assets are protected, and to
                        help you build a brighter, more secure future.</p>
                    <p data-aos="fade-up" data-aos-delay="600">Call us today on <a href="tel:07919 101 221">07919 101
                            221</a> or email us at <a
                            href="mailto:support@wealthgenius.co.uk">support@wealthgenius.co.uk</a> and we'll be pleased
                        to help you.</p>
                    <div class="about-links">
                        <a href="<?= $base_url ?>about-us.php" data-aos="fade-up">View More <span><svg width="9" height="8" viewBox="0 0 9 8"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0.5 3.18164C0.223858 3.18164 0 3.4055 0 3.68164C0 3.95778 0.223858 4.18164 0.5 4.18164V3.68164V3.18164ZM8.85355 4.03519C9.04882 3.83993 9.04882 3.52335 8.85355 3.32809L5.67157 0.146107C5.47631 -0.0491555 5.15973 -0.0491555 4.96447 0.146107C4.7692 0.341369 4.7692 0.657951 4.96447 0.853214L7.79289 3.68164L4.96447 6.51007C4.7692 6.70533 4.7692 7.02191 4.96447 7.21717C5.15973 7.41244 5.47631 7.41244 5.67157 7.21717L8.85355 4.03519ZM0.5 3.68164V4.18164H8.5V3.68164V3.18164H0.5V3.68164Z"
                                        fill="white" />
                                </svg>

                            </span></a>
                        <a href="<?= $base_url ?>contact.php" data-aos="fade-up">Contact Us <span><svg width="9" height="8" viewBox="0 0 9 8"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0.5 3.18164C0.223858 3.18164 0 3.4055 0 3.68164C0 3.95778 0.223858 4.18164 0.5 4.18164V3.68164V3.18164ZM8.85355 4.03519C9.04882 3.83993 9.04882 3.52335 8.85355 3.32809L5.67157 0.146107C5.47631 -0.0491555 5.15973 -0.0491555 4.96447 0.146107C4.7692 0.341369 4.7692 0.657951 4.96447 0.853214L7.79289 3.68164L4.96447 6.51007C4.7692 6.70533 4.7692 7.02191 4.96447 7.21717C5.15973 7.41244 5.47631 7.41244 5.67157 7.21717L8.85355 4.03519ZM0.5 3.68164V4.18164H8.5V3.68164V3.18164H0.5V3.68164Z"
                                        fill="white" />
                                </svg>

                            </span></a>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="container-sm">
            <div class="aboutUsMain">
                <div class="aboutUsTxt homegoal">
                    <h3 data-aos="fade-up">Here's how we formulate<Br>the plan towards Your Goals</h3>
                    <p data-aos="fade-up">A meticulously crafted roadmap to financial freedom, combining precision,
                        expertise, and attention to detail to ensure security, peace of mind, and a confident future for
                        you and your family.</p>
                    <p data-aos="fade-up">Our mission is to guide you and your family toward a secure and prosperous
                        financial future.</p>
                    <div class="homegoal-txt">
                        <a href="#" data-aos="fade-up" data-aos-delay="200">View Complete Plan <span><svg
                                    viewBox="0 0 9 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0.5 3.18188C0.223858 3.18188 0 3.40574 0 3.68188C0 3.95803 0.223858 4.18188 0.5 4.18188V3.68188V3.18188ZM8.85355 4.03544C9.04882 3.84018 9.04882 3.52359 8.85355 3.32833L5.67157 0.146351C5.47631 -0.0489113 5.15973 -0.0489113 4.96447 0.146351C4.7692 0.341613 4.7692 0.658195 4.96447 0.853458L7.79289 3.68188L4.96447 6.51031C4.7692 6.70557 4.7692 7.02216 4.96447 7.21742C5.15973 7.41268 5.47631 7.41268 5.67157 7.21742L8.85355 4.03544ZM0.5 3.68188V4.18188H8.5V3.68188V3.18188H0.5V3.68188Z"
                                        fill="url(#paint0_linear_711_11794)" />
                                    <defs>
                                        <linearGradient id="paint0_linear_711_11794" x1="0.5" y1="3.68188" x2="3.44161"
                                            y2="8.08522" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#279C5C" />
                                            <stop offset="1" stop-color="#043B1C" />
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </span></a>
                    </div>
                </div>
                <div class="aboutUsImg" data-aos="fade-up" data-aos-delay="100">
                    <img src="<?= $base_url ?>assets/images/services/directors-pension.webp">
                </div>
            </div>
        </div>
    </section>

    <section class="our-area-serivces">
        <div class="container-sm">
            <div class="area-services-slider">
                <div class="item">
                    <div class="areaService">
                        <img src="<?= $base_url ?>assets/images/our-area-service-1.webp">
                        <div class="areaServiceTxt">
                            <h4>About You</h4>
                            <p>We meet together to discuss your personal circumstances and your current financial
                                situation.</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="areaService">
                        <img src="<?= $base_url ?>assets/images/our-area-service-2.webp">
                        <div class="areaServiceTxt">
                            <h4>Your Goals & Ambitions</h4>
                            <p>Next we discuss your objectives and your aspirations, as well as any concerns that may
                                arise.</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="areaService">
                        <img src="<?= $base_url ?>assets/images/our-area-service-1.webp">
                        <div class="areaServiceTxt">
                            <h4>Review the Plan & Progress Updates</h4>
                            <p>If required, review dates will be agreed and can take place annually or more regularly if
                                required or requested.</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="areaService">
                        <img src="<?= $base_url ?>assets/images/our-area-service-1.webp">
                        <div class="areaServiceTxt">
                            <h4>Analysis</h4>
                            <p>We'll discuss with you our analysis of your current financial position, and outline our
                                initial thoughts for the plan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonial">
        <div class="container-sm">
            <div class="testimonialHd">
                <h3 data-aos="fade-up" data-aos-delay="100">Testimonials</h3>
                <p data-aos="fade-up" data-aos-delay="200">See What Our Clients Have to Say About Us</p>
            </div>
            <div class="testimonial-slider">
                <div class="item">
                    <div class="testimonial-box">
                        <div class="quote-img">
                            <img src="<?= $base_url ?>assets/images/quote.png">
                            <span>Review from <br>Verified Client</span>
                        </div>
                        <div class="testiMaintxt">
                            <div class="testiTxt">
                                <p><b>What were the circumstances that caused you to initially look for a financial
                                        adviser?</b></p>
                                <p>concerns about pension planning</p>
                            </div>
                            <div class="testiTxt">
                                <p><b>How has Dinesh helped you?</b></p>
                                <p>clear advice on future pension benefits</p>
                            </div>
                            <div class="testiTxt">
                                <p><b>Have you seen the outcome you were hoping for?</b></p>
                                <p>in terms of advice yes....</p>
                            </div>
                            <div class="testiTxt">
                                <p><b>What could they have done better?</b></p>
                                <p>possibly less technical and more accessible language?</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="testimonial-box">
                        <div class="quote-img">
                            <img src="<?= $base_url ?>assets/images/quote.png">
                            <span>Review from <br>Verified Client</span>
                        </div>
                        <div class="testiMaintxt">
                            <div class="testiTxt">
                                <p><b>What were the circumstances that caused you to initially look for a financial
                                        adviser?</b></p>
                                <p>concerns about pension planning</p>
                            </div>
                            <div class="testiTxt">
                                <p><b>How has Dinesh helped you?</b></p>
                                <p>clear advice on future pension benefits</p>
                            </div>
                            <div class="testiTxt">
                                <p><b>Have you seen the outcome you were hoping for?</b></p>
                                <p>in terms of advice yes....</p>
                            </div>
                            <div class="testiTxt">
                                <p><b>What could they have done better?</b></p>
                                <p>possibly less technical and more accessible language?</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="testimonial-box">
                        <div class="quote-img">
                            <img src="<?= $base_url ?>assets/images/quote.png">
                            <span>Review from <br>Verified Client</span>
                        </div>
                        <div class="testiMaintxt">
                            <div class="testiTxt">
                                <p><b>What were the circumstances that caused you to initially look for a financial
                                        adviser?</b></p>
                                <p>concerns about pension planning</p>
                            </div>
                            <div class="testiTxt">
                                <p><b>How has Dinesh helped you?</b></p>
                                <p>clear advice on future pension benefits</p>
                            </div>
                            <div class="testiTxt">
                                <p><b>Have you seen the outcome you were hoping for?</b></p>
                                <p>in terms of advice yes....</p>
                            </div>
                            <div class="testiTxt">
                                <p><b>What could they have done better?</b></p>
                                <p>possibly less technical and more accessible language?</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="testimonial-box">
                        <div class="quote-img">
                            <img src="<?= $base_url ?>assets/images/quote.png">
                            <span>Review from <br>Verified Client</span>
                        </div>
                        <div class="testiMaintxt">
                            <div class="testiTxt">
                                <p><b>What were the circumstances that caused you to initially look for a financial
                                        adviser?</b></p>
                                <p>concerns about pension planning</p>
                            </div>
                            <div class="testiTxt">
                                <p><b>How has Dinesh helped you?</b></p>
                                <p>clear advice on future pension benefits</p>
                            </div>
                            <div class="testiTxt">
                                <p><b>Have you seen the outcome you were hoping for?</b></p>
                                <p>in terms of advice yes....</p>
                            </div>
                            <div class="testiTxt">
                                <p><b>What could they have done better?</b></p>
                                <p>possibly less technical and more accessible language?</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="network">
        <div class="container-sm">
            <div class="networkHd">
                <p data-aos="fade-up" data-aos-delay="100">We are proud to be part of the</p>
                <h3 data-aos="fade-up" data-aos-delay="200">Quilter Financial Planning network</h3>
            </div>
            <div class="networkList">
                <div class="networkImg" data-aos="fade-up" data-aos-delay="100">
                    <img src="<?= $base_url ?>assets/images/network-1.png">
                </div>
                <div class="networkImg" data-aos="fade-up" data-aos-delay="200">
                    <img src="<?= $base_url ?>assets/images/network-2.png">
                </div>
                <div class="networkImg" data-aos="fade-up" data-aos-delay="300">
                    <img src="<?= $base_url ?>assets/images/network-3.png">
                </div>
                <div class="networkImg" data-aos="fade-up" data-aos-delay="400">
                    <img src="<?= $base_url ?>assets/images/network-4.png">
                </div>
            </div>
        </div>
    </section>
    <section class="subscribe">
        <div class="container-sm">
            <div class="subscribeMain">
                <div class="subscribeHd">
                    <h3 data-aos="fade-up" data-aos-delay="100">Subscribe to Our Newsletter</h3>
                    <p data-aos="fade-up" data-aos-delay="200">Send us your email address if you would like <br>to receive our regular newsletter</p>
                </div>
                <div class="subscribe-wrapper">
                    <form class="subscribe-form">
                        <div class="subscribe-input">
                            <input type="email" placeholder="Your email" required />
                            <button type="submit">Send</button>
                        </div>

                        <label class="privacy-check">
                            <input type="checkbox" required />
                            <span>
                                Please tick this box to confirm you have read and understood our privacy notice<br>
                                <a href="https://wealthgenius.co.uk/sites/default/files/clients/922/Privacy-notice.pdf"
                                    target="_blank">
                                    https://wealthgenius.co.uk/sites/default/files/clients/922/Privacy-notice.pdf
                                </a>
                            </span>
                        </label>
                    </form>
                </div>

            </div>
        </div>
    </section>

    <section class="map">
        <div class="container-sm">
            <div class="mapMain">
                <div class="mapAddress">
                    <p data-aos="fade-up" data-aos-delay="100">Where we are</p>
                    <h5 data-aos="fade-up" data-aos-delay="200">Beaufort Park<br>15 Coed Pengam<br>Lisvane, CF14 0AU</h5>
                    <div class="mapContact">
                        <a data-aos="fade-up" data-aos-delay="100" href="tel:+447919101221"><svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M16.95 18C14.8667 18 12.8083 17.546 10.775 16.638C8.74167 15.73 6.89167 14.4423 5.225 12.775C3.55833 11.1077 2.271 9.25767 1.363 7.225C0.455 5.19233 0.000666667 3.134 0 1.05C0 0.75 0.0999999 0.5 0.3 0.3C0.5 0.0999999 0.75 0 1.05 0H5.1C5.33333 0 5.54167 0.0793332 5.725 0.238C5.90833 0.396667 6.01667 0.584 6.05 0.8L6.7 4.3C6.73333 4.56667 6.725 4.79167 6.675 4.975C6.625 5.15833 6.53333 5.31667 6.4 5.45L3.975 7.9C4.30833 8.51667 4.704 9.11233 5.162 9.687C5.62 10.2617 6.12433 10.816 6.675 11.35C7.19167 11.8667 7.73333 12.346 8.3 12.788C8.86667 13.23 9.46667 13.634 10.1 14L12.45 11.65C12.6 11.5 12.796 11.3877 13.038 11.313C13.28 11.2383 13.5173 11.2173 13.75 11.25L17.2 11.95C17.4333 12.0167 17.625 12.1377 17.775 12.313C17.925 12.4883 18 12.684 18 12.9V16.95C18 17.25 17.9 17.5 17.7 17.7C17.5 17.9 17.25 18 16.95 18Z"
                                    fill="url(#paint0_linear_944_669)" />
                                <defs>
                                    <linearGradient id="paint0_linear_944_669" x1="0" y1="0" x2="20.7237" y2="3.8777"
                                        gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#279C5C" />
                                        <stop offset="1" stop-color="#043B1C" />
                                    </linearGradient>
                                </defs>
                            </svg>
                            07919 101 221</a>
                        <a data-aos="fade-up" data-aos-delay="200" href="mailto:support@wealthgenius.co.uk"><svg width="20" height="16" viewBox="0 0 20 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M2 16C1.45 16 0.979333 15.8043 0.588 15.413C0.196667 15.0217 0.000666667 14.5507 0 14V2C0 1.45 0.196 0.979333 0.588 0.588C0.98 0.196666 1.45067 0.000666667 2 0H18C18.55 0 19.021 0.196 19.413 0.588C19.805 0.98 20.0007 1.45067 20 2V14C20 14.55 19.8043 15.021 19.413 15.413C19.0217 15.805 18.5507 16.0007 18 16H2ZM10 9L18 4V2L10 7L2 2V4L10 9Z"
                                    fill="url(#paint0_linear_944_672)" />
                                <defs>
                                    <linearGradient id="paint0_linear_944_672" x1="0" y1="0" x2="22.5964" y2="5.28513"
                                        gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#279C5C" />
                                        <stop offset="1" stop-color="#043B1C" />
                                    </linearGradient>
                                </defs>
                            </svg>

                            support@wealthgenius.co.uk</a>
                    </div>
                </div>
                <div class="mapImg">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2484.884448923262!2d-3.157942396208602!3d51.47863527132557!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x486e1dd0c58b3c9f%3A0x84c1c0cadfb30064!2sWealth%20Genius%20Ltd!5e0!3m2!1sen!2sin!4v1768759237930!5m2!1sen!2sin"
                        width="700" height="500" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>


    <!--Footer-->
    <?php include 'footer.php' ?>
    <!--Footer-->

    <?php include 'style_js.php' ?>
</body>

</html>