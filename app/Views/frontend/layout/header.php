<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Main CSS -->
        <link href="<?= base_url('css/main.css'); ?>" rel="stylesheet" >
         <link rel="icon" href="<?= base_url('images/logo-04-512x512.png'); ?>" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <title>DRLK Education Foundation</title>
    </head>
    <body data-bs-spy="scroll" data-bs-target="#navigation">
        <!-- PRELOADER STARTS -->
        <div id="main-preloader" class="main-preloader semi-dark-background">
            
            <div class="loader-wrapper">
                <img src="<?= base_url('imgs/loader-DRLK.gif'); ?>" alt="Loading..." class="loader-gif">
            </div>

        </div>
        <!-- PRELOADER ENDS -->

        <!-- ================= HEADER WRAPPER ================= -->
        <div class="sticky-top" style="z-index: 1050;">

        <!-- ================= DESKTOP HEADER ================= -->
        <div class="d-none d-lg-block">

        <!-- ================= TOP BAR ================= -->
        <div class="top-bar-custom py-2">
            <div class="container d-flex justify-content-between align-items-center gap-3 flex-wrap">
                
                <!-- Left Social -->
                <div class="social-icons-wrapper d-flex gap-2">
                    <a href="#" class="social-icon"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="social-icon"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="social-icon"><i class="bi bi-youtube"></i></a>
                    <a href="#" class="social-icon"><i class="bi bi-twitter"></i></a>
                </div>

                <!-- Center News -->
                <div class="news-ticker-wrapper d-flex align-items-center flex-grow-1">
                    <div class="news-label d-flex align-items-center text-white px-3 py-1">
                        <i class="bi bi-lightning-fill me-2"></i> News & Updates
                    </div>
                    <div class="ticker-container flex-grow-1 bg-white px-2 py-1 align-items-center overflow-hidden">
                        <div class="ticker-text text-dark marquee-text m-0">
                            <?php 
                                $newsModel = new \App\Models\NewsUpdateModel();
                                $allNews = $newsModel->where('status', 'active')->orderBy('id', 'DESC')->findAll();
                                if(!empty($allNews)):
                                    foreach($allNews as $news):
                            ?>
                                <span>
                                    • 
                                    <?php if(!empty($news['link'])): ?>
                                        <a href="<?= $news['link'] ?>" target="_blank" class="text-dark text-decoration-none"><?= esc($news['title']) ?></a>
                                    <?php else: ?>
                                        <?= esc($news['title']) ?>
                                    <?php endif; ?>
                                </span>
                            <?php 
                                    endforeach;
                                else:
                            ?>
                                <span>• Welcome to DRLK Education Foundation | Serving for a better tomorrow.</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Right Contact -->
                <div class="contact-number text-white fw-bold d-flex align-items-center gap-2 text-end" style="font-size:14px; line-height:1.2;">
                    <i class="bi bi-telephone-fill" style="font-size: 20px;"></i>
                    <div class="d-flex flex-column text-start">
                        <span>+919876543210,</span>
                        <span>9876543211</span>
                    </div>
                </div>

            </div>
        </div>


        <!-- ================= LOGO SECTION ================= -->
        <div class="bg-white py-3 border-bottom shadow-sm">
            <div class="container d-flex justify-content-between align-items-center flex-wrap gap-3">

                <!-- Logo + Title -->
                <div class="d-flex align-items-center logo-brand">
                    <img class="logo_img" src="<?= base_url('images/logo-03.png'); ?>" height="85" alt="Logo">
                    <h3 class="ms-3 brand-text fw-bold mb-0 logo_text">
                        DRLK Education Foundation
                    </h3>
                </div>

                <!-- Donate Button + Translate -->
                <div class="d-flex align-items-center gap-3">
                    <a href="<?= base_url('donation') ?>" class="btn btn-donate-custom d-flex align-items-center gap-2 px-4 py-2 rounded-pill fw-bold text-white shadow-sm">
                        <i class="bi bi-currency-rupee fs-5"></i> Donate Us
                    </a>
                    
                    <!-- Google Translate Widget -->
                    <div id="google_translate_element" class="translate-widget border p-1 rounded bg-light" style="min-width: 160px; height: 42px; overflow: hidden; display: flex; align-items: center; justify-content: center;"></div>
                </div>

            </div>
        </div>
        </div> <!-- End Desktop Header -->

        <!-- ================= MOBILE HEADER ================= -->
        <div class="d-block d-lg-none w-100">
            <!-- Mobile Top Bar: Blue bg -->
            <div class="py-1" style="background-color: #100D64;">
                <div class="container d-flex justify-content-between align-items-center gap-2">
                    <!-- Custom Mobile Translate Dropdown -->
                    <div class="dropdown">
                        <style>
                            .mobile-lang-menu .dropdown-item:hover {
                                background-color: #1a1580 !important;
                                color: #ffffff !important;
                            }
                        </style>
                        <button class="btn btn-danger dropdown-toggle" type="button" id="mobileLangDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #cc0000; border: 1px solid #fff; font-size: 13px; padding: 4px 8px; font-weight: bold; border-radius: 4px; color: white;">
                            Select Language
                        </button>
                        <ul class="dropdown-menu shadow-sm mobile-lang-menu" aria-labelledby="mobileLangDropdown" style="background-color: #100D64; font-size: 14px; min-width: 160px; z-index: 1050; margin-top: 5px; border: 1px solid rgba(255,255,255,0.2);">
                            <li><a class="dropdown-item text-white py-2" href="#" onclick="translateLanguage('en'); return false;">English</a></li>
                            <li><a class="dropdown-item text-white py-2" href="#" onclick="translateLanguage('ar'); return false;">Arabic</a></li>
                            <li><a class="dropdown-item text-white py-2" href="#" onclick="translateLanguage('bn'); return false;">Bengali</a></li>
                            <li><a class="dropdown-item text-white py-2" href="#" onclick="translateLanguage('gu'); return false;">Gujarati</a></li>
                            <li><a class="dropdown-item text-white py-2" href="#" onclick="translateLanguage('hi'); return false;">Hindi</a></li>
                            <li><a class="dropdown-item text-white py-2" href="#" onclick="translateLanguage('kn'); return false;">Kannada</a></li>
                            <li><a class="dropdown-item text-white py-2" href="#" onclick="translateLanguage('ml'); return false;">Malayalam</a></li>
                            <li><a class="dropdown-item text-white py-2" href="#" onclick="translateLanguage('mr'); return false;">Marathi</a></li>
                            <li><a class="dropdown-item text-white py-2" href="#" onclick="translateLanguage('pa'); return false;">Punjabi (Gurmukhi)</a></li>
                            <li><a class="dropdown-item text-white py-2" href="#" onclick="translateLanguage('ta'); return false;">Tamil</a></li>
                            <li><a class="dropdown-item text-white py-2" href="#" onclick="translateLanguage('te'); return false;">Telugu</a></li>
                            <li><a class="dropdown-item text-white py-2" href="#" onclick="translateLanguage('ur'); return false;">Urdu</a></li>
                        </ul>
                    </div>
                    
                    <!-- News Ticker -->
                    <div class="ticker-container flex-grow-1 px-2 py-1 align-items-center overflow-hidden" style="background: transparent; color: white;">
                        <div class="ticker-text text-white marquee-text m-0" style="font-size: 14px;">
                            <?php 
                                $newsModel = new \App\Models\NewsUpdateModel();
                                $allNews = $newsModel->where('status', 'active')->orderBy('id', 'DESC')->findAll();
                                if(!empty($allNews)):
                                    foreach($allNews as $news):
                            ?>
                                <span>
                                    • 
                                    <?php if(!empty($news['link'])): ?>
                                        <a href="<?= $news['link'] ?>" target="_blank" class="text-white text-decoration-none"><?= esc($news['title']) ?></a>
                                    <?php else: ?>
                                        <?= esc($news['title']) ?>
                                    <?php endif; ?>
                                </span>
                            <?php 
                                    endforeach;
                                else:
                            ?>
                                <span>• Welcome to DRLK Education Foundation | Serving for a better tomorrow.</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile Middle Bar: White bg -->
            <div class="bg-white py-2 border-bottom">
                <div class="container d-flex align-items-center justify-content-start">
                    <!-- Hamburger Menu -->
                    <button class="navbar-toggler me-2" type="button" data-bs-toggle="collapse" data-bs-target="#menu" style="border: none; background: transparent; padding: 0; box-shadow: none;">
                        <i class="bi bi-list" style="font-size: 2.2rem; color: #000;"></i>
                    </button>
                    
                    <!-- Logo & Title -->
                    <div class="d-flex align-items-center justify-content-start flex-grow-1">
                        <img class="logo_img" src="<?= base_url('images/logo-03.png'); ?>" height="45" alt="Logo">
                        <h5 class="ms-2 brand-text fw-bold mb-0 text-start" style="font-size: 14px; color: #ed1c24; line-height: 1.2; white-space: nowrap;">
                            DRLK Education Foundation
                        </h5>
                    </div>
                </div>
            </div>

            <!-- Mobile Bottom Bar: Blue bg -->
            <div class="py-2" style="background-color: #100D64;">
                <div class="container d-flex justify-content-between align-items-center">
                    <!-- Social Icons -->
                    <div class="d-flex gap-2">
                        <a href="#" class="d-flex align-items-center justify-content-center bg-white rounded-circle" style="width: 32px; height: 32px; color: #ed1c24; text-decoration: none;">
                            <i class="bi bi-facebook fs-6"></i>
                        </a>
                        <a href="#" class="d-flex align-items-center justify-content-center bg-white rounded-circle" style="width: 32px; height: 32px; color: #ed1c24; text-decoration: none;">
                            <i class="bi bi-instagram fs-6"></i>
                        </a>
                        <a href="#" class="d-flex align-items-center justify-content-center bg-white rounded-circle" style="width: 32px; height: 32px; color: #ed1c24; text-decoration: none;">
                            <i class="bi bi-youtube fs-6"></i>
                        </a>
                        <a href="#" class="d-flex align-items-center justify-content-center bg-white rounded-circle" style="width: 32px; height: 32px; color: #ed1c24; text-decoration: none;">
                            <i class="bi bi-twitter fs-6"></i>
                        </a>
                    </div>

                    <!-- Donate Button -->
                    <a href="<?= base_url('donation') ?>" class="btn d-flex align-items-center gap-1 px-3 py-1 fw-bold text-white shadow-sm" style="background-color: #ed1c24; border-radius: 4px; font-size: 14px; border: none;">
                        Donate Us
                    </a>
                </div>
            </div>
        </div>
        
        <!-- ================= NAVBAR ================= -->
        <nav class="navbar navbar-expand-lg navbar-custom navbar-dark py-0" style="padding-top: 0; padding-bottom: 0;">
            <div class="container">
                <button class="navbar-toggler my-2 d-none" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="menu">
                    <ul class="navbar-nav w-100 d-flex justify-content-between">
                        <li class="nav-item"><a class="nav-link fs-5 py-3" href="/"><i class="bi bi-house-door-fill"></i></a></li>
                        <li class="nav-item"><a class="nav-link py-3" href="<?= base_url('member-apply') ?>">Member Apply</a></li>
                        <li class="nav-item dropdown dropdown-hover">
                            <a class="nav-link dropdown-toggle py-3" href="#" id="idCardDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                ID Card
                            </a>
                            <ul class="dropdown-menu shadow m-0 rounded-0 border-0" aria-labelledby="idCardDropdown">
                                <li><a class="dropdown-item py-2 fw-semibold" href="<?= base_url('id-card-download') ?>">Download ID Card</a></li>
                                <li><a class="dropdown-item py-2 fw-semibold" href="<?= base_url('membership-renewal') ?>">Renew ID Card</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown dropdown-hover">
                            <a class="nav-link dropdown-toggle py-3" href="#" id="aboutDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                About Us
                            </a>
                            <ul class="dropdown-menu shadow m-0 rounded-0 border-0" aria-labelledby="aboutDropdown">
                                <li><a class="dropdown-item py-2 fw-semibold" href="<?= base_url('about-us') ?>">About Us</a></li>
                                <li><a class="dropdown-item py-2 fw-semibold" href="<?= base_url('president-message') ?>">President Message</a></li>
                                <li><a class="dropdown-item py-2 fw-semibold" href="<?= base_url('management-team') ?>">Management Team</a></li>
                                <li><a class="dropdown-item py-2 fw-semibold" href="<?= base_url('our-members') ?>">Our Members</a></li>
                                <li><a class="dropdown-item py-2 fw-semibold" href="<?= base_url('achievements') ?>">Achievements</a></li>
                                <li><a class="dropdown-item py-2 fw-semibold" href="<?= base_url('certificates') ?>">Certifications</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link py-3" href="<?= base_url('crowdfunding') ?>">Crowdfunding</a></li>
                        <li class="nav-item"><a class="nav-link py-3" href="<?= base_url('donation') ?>">Donate</a></li>
                        <li class="nav-item"><a class="nav-link py-3" href="<?= base_url('donors') ?>">List of Donors</a></li>
                        <li class="nav-item dropdown dropdown-hover">
                            <a class="nav-link dropdown-toggle py-3" href="#" id="galleryDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Gallery
                            </a>
                            <ul class="dropdown-menu shadow m-0 rounded-0 border-0" aria-labelledby="galleryDropdown">
                                <li><a class="dropdown-item py-2 fw-semibold" href="<?= base_url('gallery') ?>">Photo Gallery</a></li>
                                <li><a class="dropdown-item py-2 fw-semibold" href="<?= base_url('press-media') ?>">Press Media</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link py-3" href="<?= base_url('audit-reports') ?>">Audit Report</a></li>
                        <li class="nav-item dropdown dropdown-hover">
                            <a class="nav-link dropdown-toggle py-3" href="#" id="linksDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Important Links
                            </a>
                            <ul class="dropdown-menu shadow m-0 rounded-0 border-0" aria-labelledby="linksDropdown">
                                <li><a class="dropdown-item py-2 fw-semibold" href="<?= base_url('events') ?>">Upcoming Events</a></li>
                             <li><a class="dropdown-item py-2 fw-semibold" href="<?= base_url('solutions') ?>">Our Solutions</a></li>
                            <li><a class="dropdown-item py-2 fw-semibold" href="<?= base_url('complain') ?>">Your Problems</a></li>
                            <li><a class="dropdown-item py-2 fw-semibold" href="<?= base_url('projects') ?>">Our Projects</a></li>
                           
                            </ul>
                        </li>
                        <li class="nav-item dropdown dropdown-hover">
                            <a class="nav-link dropdown-toggle py-3" href="#" id="loginDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Login
                            </a>
                            <ul class="dropdown-menu shadow m-0 rounded-0 border-0" aria-labelledby="loginDropdown">
                                <li><a class="dropdown-item py-2 fw-semibold" href="<?= base_url('coordinator-login') ?>">Coordinator Login</a></li>
                                <li><a class="dropdown-item py-2 fw-semibold" href="<?= base_url('manager-login') ?>">Manager Login</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link py-3" href="<?= base_url('contact-us') ?>">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        </div> <!-- End Sticky Header Wrapper -->

        <!-- Google Translate Script -->
        <script type="text/javascript">
            function googleTranslateElementInit() {
                if(document.getElementById('google_translate_element')) {
                    new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
                }
            }
            
            function translateLanguage(lang) {
                // Reliable method using cookies and reload to avoid iframe DOM issues
                document.cookie = "googtrans=/en/" + lang + "; path=/";
                document.cookie = "googtrans=/en/" + lang + "; path=/; domain=" + location.hostname;
                window.location.reload();
            }
        </script>
        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>