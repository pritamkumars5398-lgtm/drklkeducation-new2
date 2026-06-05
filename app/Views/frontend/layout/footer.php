        <!-- FOOTER STARTS
            ========================================================================= -->
        <footer class="footer-wrap">
            <div class="container-fluid px-4 px-lg-5">
                
                <!-- Top Contact Strip -->
                <div class="row footer-top-strip">
                    <div class="col-12 col-md-4 footer-contact-block mb-4 mb-md-0">
                        <h6><i class="las la-map-marker-alt" style="font-size:22px; color:#000;"></i> Office Address</h6>
                        <p>State Office - Noida Sector 70 Uttar Pradesh</p>
                    </div>
                    <div class="col-12 col-md-4 footer-contact-block mb-4 mb-md-0">
                        <h6><i class="las la-phone" style="font-size:20px; color:#000;"></i> Contact With Us</h6>
                        <p>+919876543210, 9876543210</p>
                    </div>
                    <div class="col-12 col-md-4 footer-contact-block">
                        <h6><i class="las la-envelope" style="font-size:22px; color:#000;"></i> Email ID</h6>
                        <p>info@drlkfoundation.com</p>
                    </div>
                </div>
                
                <!-- Main Footer Body -->
                <div class="row pt-2 pb-4">
                    <!-- Column 1: Logo -->
                    <div class="col-12 col-lg-4 text-center mb-5 mb-lg-0 d-flex justify-content-center align-items-center">
                        <img src="<?= base_url('images/logo-04-512x512.png'); ?>" alt="KDS Logo" style="max-height: 250px;">
                    </div>
                    
                    <!-- Column 2: Useful Links -->
                    <div class="col-12 col-md-6 col-lg-5 mb-5 mb-md-0">
                        <h5 class="footer-heading">Useful Links</h5>
                        <div class="useful-links-grid">
                            <a href="#">Home</a>
                            <a href="#">Upcoming Events</a>
                            <a href="#">Crowdfunding</a>
                            <a href="<?= base_url('member-apply') ?>">Member Apply</a>
                            <a href="<?= base_url('donate') ?>">Donation</a>
                            <a href="#">Our Members</a>
                            <a href="#">Photo Gallery</a>
                            <a href="#">List Of Donors</a>
                            <a href="#">Management Team</a>
                            <a href="#">Contact Us</a>
                            <a href="<?= base_url('id-card-download') ?>">ID Card Download</a>
                            <a href="#">Achievements</a>
                            <a href="#">Certifications</a>
                            <a href="#">Our Projects</a>
                            <a href="<?= base_url('audit-reports') ?>">Audit Report</a>
                            <a href="<?= base_url('press-media') ?>">Media Gallery</a>
                            <a href="<?= base_url('coordinator-login') ?>">Coordinator Login</a>
                            <a href="<?= base_url('manager-login') ?>">Manager Login</a>
                        </div>
                    </div>
                    
                    <!-- Column 3: Socials & Logins -->
                    <div class="col-12 col-md-6 col-lg-3 text-center">
                        <h5 class="footer-heading">Follow us</h5>
                        <div class="footer-social-icons">
                            <a href="#" class="fb-bg"><i class="lab la-facebook-f"></i></a>
                            <a href="#" class="tw-bg"><span style="font-family: Arial, sans-serif; font-weight: bold; font-style: normal; font-size: 18px;">X</span></a>
                            <a href="#" class="ig-bg"><i class="lab la-instagram"></i></a>
                            <a href="#" class="yt-bg"><i class="lab la-youtube"></i></a>
                        </div>
                        
                        <a href="<?= base_url('manager-login') ?>" class="footer-login-btn">
                            <div class="footer-login-icon"><i class="las la-sign-in-alt"></i></div>
                            Manager Login
                        </a>
                        <a href="<?= base_url('coordinator-login') ?>" class="footer-login-btn">
                            <div class="footer-login-icon"><i class="las la-sign-in-alt"></i></div>
                            Coordinator Login
                        </a>
                    </div>
                </div>
                
                <!-- Bottom Copyright Strip -->
                <div class="row footer-bottom-strip">
                    <div class="col-12 col-lg-4 text-center text-lg-start mb-3 mb-lg-0">
                        Copyright © 2026, All Right Reserved <span style="color:#D90D0E; font-weight:500;">DRLK Education Foundation</span>
                    </div>
                    <div class="col-12 col-lg-8 footer-bottom-links text-center text-lg-end">
                        <a href="<?= base_url('terms-condition') ?>">Terms & Condition</a>
                        <a href="<?= base_url('privacy-policy') ?>">Privacy Policy</a>
                        <a href="<?= base_url('disclaimer') ?>">Disclaimer</a>
                        <a href="<?= base_url('refund-policy') ?>">Refund Policy</a>
                    </div>
                    <div class="col-12 text-center mt-4 mb-2" style="font-weight: 600; font-size: 14px; color: #000;">
                        Website Designed By - Tvam Key Software, Mob. - 9876543210
                    </div>
                </div>
                
            </div>
            
            <!-- WhatsApp Floating Button -->
            <?php 
                $waModel = new \App\Models\WhatsappSettingModel();
                $waSettings = $waModel->find(1);
                if($waSettings && $waSettings['status'] == 'active'):
                    $waNumber = $waSettings['number'];
                    $waMsg = urlencode($waSettings['message']);
                    $waPosClass = ($waSettings['position'] == 'left') ? 'wa-left' : 'wa-right';
            ?>
                <a href="https://wa.me/<?= $waNumber ?>?text=<?= $waMsg ?>" class="wa-float-btn <?= $waPosClass ?>" target="_blank">
                    <i class="lab la-whatsapp"></i>
                </a>
            <?php endif; ?>
            
        </footer>
        <!-- /.. FOOTER ENDS
            ========================================================================= -->
        <!-- TO TOP STARTS
            ========================================================================= -->
        <a href="#home" class="back-to-top animated" data-animation="fadeInUp" data-animation-delay="400"><i class="las la-angle-up"></i></a>
        <!-- /.. TO TOP ENDS
            ========================================================================= -->
        <!-- INCLUD ALL JS FILES 
            ========================================================================= -->
        <!--JQUERY MIN JS-->
        <script src="<?= base_url('lib/jquery-1.12.4/jquery.min.js'); ?>"></script>
        <!--BOOTSTRAP JS-->
        <script src="<?= base_url('lib/bootstrap/js/bootstrap.min.js'); ?>"></script>
        <!-- REVOLUTION JS FILES -->
        <script src="<?= base_url('lib/revolution/js/jquery.themepunch.tools.min.js'); ?>"></script>
        <script src="<?= base_url('lib/revolution/js/jquery.themepunch.revolution.min.js'); ?>"></script>
        <!-- SLICEY ADD-ON FILES -->
        <script src='<?= base_url('lib/revolution/revolution-addons/slicey/js/revolution.addon.slicey.min.js?ver=1.0.0'); ?>'></script>
        <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  
            (Load Extensions only on Local File Systems !  
            
            The following part can be removed on Server for On Demand Loading) -->	
        <script src="<?= base_url('lib/revolution/js/extensions/revolution.extension.actions.min.js'); ?>"></script>
        <script src="<?= base_url('lib/revolution/js/extensions/revolution.extension.carousel.min.js'); ?>"></script>
        <script src="<?= base_url('lib/revolution/js/extensions/revolution.extension.kenburn.min.js'); ?>"></script>
        <script src="<?= base_url('lib/revolution/js/extensions/revolution.extension.layeranimation.min.js'); ?>"></script>
        <script src="<?= base_url('lib/revolution/js/extensions/revolution.extension.migration.min.js'); ?>"></script>
        <script src="<?= base_url('lib/revolution/js/extensions/revolution.extension.navigation.min.js'); ?>"></script>
        <script src="<?= base_url('lib/revolution/js/extensions/revolution.extension.parallax.min.js'); ?>"></script>
        <script src="<?= base_url('lib/revolution/js/extensions/revolution.extension.slideanims.min.js'); ?>"></script>
        <script src="<?= base_url('lib/revolution/js/extensions/revolution.extension.video.min.js'); ?>"></script>
        <script >
            var tpj=jQuery;
            
            var revapi24;
            
            tpj(document).ready(function() {
            
            	if(tpj("#rev_slider_24_1").revolution == undefined){
            
            		revslider_showDoubleJqueryError("#rev_slider_24_1");
            
            	}else{
            
            		revapi24 = tpj("#rev_slider_24_1").show().revolution({
            
            			sliderType:"standard",
            
            			jsFileLocation:"revolution/js/",
            
            			sliderLayout:"fullscreen",
            
            			dottedOverlay:"none",
            
            			delay:9000,
            
            			navigation: {
            
            				keyboardNavigation:"off",
            
            				keyboard_direction: "horizontal",
            
            				mouseScrollNavigation:"off",
            
            					mouseScrollReverse:"default",
            
            				onHoverStop:"off",
            
            				bullets: {
            
            					enable:true,
            
            					hide_onmobile:false,
            
            					style:"bullet-bar",
            
            					hide_onleave:false,
            
            					direction:"horizontal",
            
            					h_align:"center",
            
            					v_align:"bottom",
            
            					h_offset:0,
            
            					v_offset:50,
            
            					space:5,
            
            					tmp:''
            
            				}
            
            				,
            
            	arrows: {
            
            		style:"uranus",
            
            		enable:true,
            
            		hide_onmobile:false,
            
            		hide_onleave:false,
            
            		tmp:'',
            
            		left: {
            
            			h_align:"left",
            
            			v_align:"center",
            
            			h_offset:10,
            
            			v_offset:0
            
            		},
            
            		right: {
            
            			h_align:"right",
            
            			v_align:"center",
            
            			h_offset:10,
            
            			v_offset:0
            
            		}
            
            	}
            
            			},
            
            			responsiveLevels:[1240,1024,778,480],
            
            			visibilityLevels:[1240,1024,778,480],
            
            			gridwidth:[1240,1024,778,480],
            
            			gridheight:[868,768,960,720],
            
            			lazyType:"none",
            
            			shadow:0,
            
            			spinner:"spinner1",
            
            			stopLoop:"off",
            
            			stopAfterLoops:-1,
            
            			stopAtSlide:-1,
            
            			shuffle:"off",
            
            			autoHeight:"off",
            
            			fullScreenAutoWidth:"off",
            
            			fullScreenAlignForce:"off",
            
            			fullScreenOffsetContainer: "",
            
            			fullScreenOffset: "0px",
            
            			hideThumbsOnMobile:"off",
            
            			hideSliderAtLimit:0,
            
            			hideCaptionAtLimit:0,
            
            			hideAllCaptionAtLilmit:0,
            
            			debugMode:false,
            
            			fallbacks: {
            
            				simplifyAll:"off",
            
            				nextSlideOnWindowFocus:"off",
            
            				disableFocusListener:false,
            
            			}
            
            		});
            
            	}
            
            
            
            						 if(revapi24) revapi24.revSliderSlicey();
            
            });	/*ready*/
            
        </script>
        <!-- PRELOADER -->
        <script src="<?= base_url('lib/preloader/sPreloader.js'); ?>"></script>
        <!-- Animation --> 
        <script src="<?= base_url('lib/animations/jquery.appear.js'); ?>"></script>
        <!-- OWL CAROUSEL --> 
        <script src="<?= base_url('lib/owl-carousel/owl.carousel.js'); ?>"></script> 
        <!-- ISOTOPE GALLERY --> 
        <script src="<?= base_url('lib/isotope/jquery.isotope.min.js'); ?>"></script> 
        <script src="<?= base_url('lib/isotope/custom-isotope-mansory.js'); ?>"></script> 
        <!-- MAGNIFIC POPUP -->
        <script src="<?= base_url('lib/magnific-popup/jquery.magnific-popup.js'); ?>"></script>
        <!-- CONTACT FORM JS -->
        <script src="<?= base_url('js/contact-form/contact-form.js'); ?>"></script>
        <!-- CUSTOM JS -->
         <script src="<?= base_url('js/script.js'); ?>"></script>
        <script>
        window.addEventListener("load", function () {

            document.getElementById("main-preloader").style.display = "none";

        });
        </script>
    </body>
</html>