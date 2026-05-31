<?= view('frontend/layout/header'); ?>

<!-- SLIDER STARTS
            ========================================================================= --> 
        <section id="home" >
            <div id="slider">
                <div id="rev_slider_24_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="website-intro" data-source="gallery" style="background:#000000;padding:0px;">
                    <!-- START REVOLUTION SLIDER 5.4.1 fullscreen mode -->
                    <div id="rev_slider_24_1" class="rev_slider fullscreenbanner tiny_bullet_slider" style="display:none;" data-version="5.4.1">
                        <ul>
                            <?php if(!empty($sliders)): ?>
                                <?php foreach($sliders as $index => $slide): ?>
                                    <!-- SLIDE <?= $index + 1 ?> -->
                                    <li data-index="rs-<?= 100 + $index ?>" data-transition="zoomout" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000"  data-thumb="<?= base_url($slide['image']) ?>"  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off"  data-title="<?= esc($slide['title']) ?>" data-description="<?= esc($slide['subtitle']) ?>">
                                        <!-- MAIN IMAGE -->
                                        <img src="<?= base_url($slide['image']); ?>" alt="<?= esc($slide['title']) ?>" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                                        
                                        <!-- LAYERS -->
                                        <?php if(!empty($slide['title'])): ?>
                                        <!-- LAYER NR. 1: TITLE -->
                                        <div class="tp-caption tp-resizeme text-white fw-bold" 
                                            data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                                            data-y="['middle','middle','middle','middle']" data-voffset="['-50','-50','-50','-50']" 
                                            data-fontsize="['60','50','40','30']"
                                            data-lineheight="['70','60','50','40']"
                                            data-width="none" data-height="none" data-whitespace="nowrap"
                                            data-type="text" data-responsive_offset="on" 
                                            data-frames='[{"delay":500,"speed":1500,"frame":"0","from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                                            style="z-index: 5; white-space: nowrap; text-shadow: 2px 2px 10px rgba(0,0,0,0.5);">
                                            <?= esc($slide['title']) ?>
                                        </div>
                                        <?php endif; ?>

                                        <?php if(!empty($slide['subtitle'])): ?>
                                        <!-- LAYER NR. 2: SUBTITLE -->
                                        <div class="tp-caption tp-resizeme text-white" 
                                            data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                                            data-y="['middle','middle','middle','middle']" data-voffset="['20','20','20','20']" 
                                            data-fontsize="['24','20','18','16']"
                                            data-lineheight="['30','26','24','22']"
                                            data-width="none" data-height="none" data-whitespace="nowrap"
                                            data-type="text" data-responsive_offset="on" 
                                            data-frames='[{"delay":800,"speed":1500,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                                            style="z-index: 6; white-space: nowrap;">
                                            <?= esc($slide['subtitle']) ?>
                                        </div>
                                        <?php endif; ?>

                                        <?php if(!empty($slide['button_text']) && !empty($slide['button_link'])): ?>
                                        <!-- LAYER NR. 3: BUTTON -->
                                        <div class="tp-caption" 
                                            data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                                            data-y="['middle','middle','middle','middle']" data-voffset="['100','100','100','80']" 
                                            data-width="none" data-height="none" data-whitespace="nowrap"
                                            data-type="button" data-responsive_offset="on" 
                                            data-frames='[{"delay":1100,"speed":1500,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                                            style="z-index: 7;">
                                            <a href="<?= $slide['button_link'] ?>" class="btn btn-primary px-4 py-2 fw-bold text-uppercase"><?= esc($slide['button_text']) ?></a>
                                        </div>
                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                        <div class="tp-bannertimer tp-bottom" style="height: 5px; background: rgb(0,123,255);"></div>
                    </div>
                </div>
                <!-- END REVOLUTION SLIDER -->
            </div>
        </section>
        <!-- /.. SLIDER ENDS
            ========================================================================= -->	

<!-- Auto Popup Modal -->
        <div class="modal fade" id="admissionModal" tabindex="-1" aria-labelledby="admissionModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
          <div class="modal-dialog modal-lg modal-dialog-centered" style="max-width: 800px;">
            <div class="modal-content overflow-hidden" style="border-radius: 12px; border: none; box-shadow: 0 10px 40px rgba(0,0,0,0.2);">
              <div class="row g-0">
                <!-- Left Side -->
                <div class="col-md-5 d-flex flex-column justify-content-center align-items-center text-white popup-modal-left" style="padding: 40px 30px; position:relative;">
                    <div class="text-center mb-4">
                        <i class="bi bi-shield-check" style="font-size: 4rem;"></i>
                        <i class="bi bi-laptop" style="font-size: 2.5rem; margin-left: -15px;"></i>
                    </div>
                    <h4 class="fw-bold mb-4 text-center" style="font-size: 18px; line-height: 1.4;">DRLK Foundation: Empowering Students' Ambitions</h4>
                    <ul class="list-unstyled text-start w-100" style="font-size: 13px; opacity: 0.95;">
                        <li class="mb-3 d-flex align-items-start"><i class="bi bi-check-circle-fill" style="margin-right: 10px; margin-top:2px;"></i> Get Direct NGO Support & Counseling for Top Medical Colleges!</li>
                        <li class="d-flex align-items-start"><i class="bi bi-check-circle-fill" style="margin-right: 10px; margin-top:2px;"></i> Special Educational Assistance & Guidance for Future Doctors</li>
                    </ul>
                </div>
                <!-- Right Side -->
                <div class="col-md-7 position-relative" style="padding: 40px 30px; background: #fff;">
                    <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close" style="z-index: 10;"></button>
                    
                    <h4 class="fw-bold mb-2 text-center" style="color: #100D64; font-size: 22px;">Medical Career Admission Guidance</h4>
                    <p class="text-center mb-4" style="color: #D90D0E; font-size: 14px; font-weight: 500;">Apply for MBBS, BAMS, MD, Nursing, NEET Coaching & More</p>
                    
                    <?php if(session()->getFlashdata('success')): ?>
                        <div class="alert alert-success mt-2" style="font-size: 14px;">
                        <?= session()->getFlashdata('success'); ?>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('save-student-enquiry') ?>" method="post">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <input type="text" name="name" class="form-control popup-input" placeholder="First Name / Last Name" required>
                            </div>
                            <div class="col-12 mb-3">
                                <input type="text" name="mobile" class="form-control popup-input" placeholder="Phone Number" required>
                            </div>
                            <div class="col-12 mb-3">
                                <input type="email" name="email" class="form-control popup-input" placeholder="Email Address">
                            </div>
                            <div class="col-md-6 mb-3">
                                <select name="course" class="form-control popup-input" required>
                                    <option value="">Select Course</option>
                                    <option>MBBS</option>
                                    <option>BAMS</option>
                                    <option>BHMS</option>
                                    <option>BDS</option>
                                    <option>MD</option>
                                    <option>MS</option>
                                    <option>BSc Nursing</option>
                                    <option>GNM</option>
                                    <option>ANM</option>
                                    <option>NEET Coaching</option>
                                    <option>NET Coaching</option>
                                    <option>Pharmacy</option>
                                    <option>Paramedical</option>
                                    <option>Other</option>
                                </select>
                            </div>
                            <!-- Keeping city/percentage per db schema but fitting smoothly into grid -->
                            <div class="col-md-6 mb-3">
                                <input type="text" name="city" class="form-control popup-input" placeholder="City">
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <input type="text" name="percentage" class="form-control popup-input" placeholder="12th Percentage (%)">
                            </div>
                            
                            <!-- Hidden or small message block if wanted. Removed for brevity to match original reference size better. Let's keep a tiny input if needed, or simply let it submit without. The DB accepts NULL. We'll add a minimal message input to keep functionality. -->
                            <div class="col-md-6 mb-3">
                                <input type="text" name="message" class="form-control popup-input" placeholder="Short Message">
                            </div>

                            <div class="col-12 mb-4 text-start">
                                <div class="form-check d-flex align-items-center">
                                  <input class="form-check-input" type="checkbox" value="" id="ageCheck" required style="margin-top:0; border-color: #ccc;">
                                  <label class="form-check-label text-muted ms-2" for="ageCheck" style="font-size: 12px;">
                                    I confirm that I am 18 years of age or older.
                                  </label>
                                </div>
                            </div>

                            <div class="col-12 text-center">
                                <button type="submit" class="btn w-100 popup-btn rounded-pill">Apply Now</button>
                            </div>
                        </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                <?php if(session()->getFlashdata('success')): ?>
                // Show modal if successfully submitted
                var admissionModal = new bootstrap.Modal(document.getElementById('admissionModal'));
                admissionModal.show();
                <?php else: ?>
                // Show modal on every page load after 2 seconds
                setTimeout(function() {
                    var admissionModal = new bootstrap.Modal(document.getElementById('admissionModal'));
                    admissionModal.show();
                }, 2000);
                <?php endif; ?>
            });
        </script>

        <!-- 3-MODULE SECTION STARTS
            ========================================================================= -->
        <section class="home-modules pt-5 mb-5 pb-0">
            <div class="container">
                <div class="row">
                    <!-- Left: Latest News -->
                    <div class="col-12 col-lg-3 mb-4">
                        <div class="d-flex justify-content-center">
                            <div class="red-title-box">Latest News</div>
                        </div>
                        <div class="green-outer-box">
                            <div class="inner-white-box ticker-vertical-wrapper">
                                <ul class="list-unstyled mb-0 ticker-vertical-content">
                                    <?php if(!empty($latest_news)): ?>
                                        <?php foreach($latest_news as $news): ?>
                                            <li class="news-list-item">
                                                <?php if(!empty($news['link'])): ?>
                                                    <a href="<?= $news['link'] ?>" target="_blank" class="text-dark text-decoration-none"><?= esc($news['title']) ?></a>
                                                <?php else: ?>
                                                    <?= esc($news['title']) ?>
                                                <?php endif; ?>
                                            </li>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <li class="news-list-item">Stay tuned for more updates!</li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                        <a href="<?= base_url('member-apply'); ?>" class="action-btn-custom mt-4">
                            <div class="action-btn-icon"><i class="bi bi-person-plus-fill"></i></div>
                            <span>Member Apply</span>
                        </a>
                        <a href="<?= base_url('donation'); ?>" class="action-btn-custom">
                            <div class="action-btn-icon"><i class="bi bi-wallet2"></i></div>
                            <span>Donate Us</span>
                        </a>
                        <a href="<?= base_url('id-card-download'); ?>" class="action-btn-custom">
                            <div class="action-btn-icon"><i class="bi bi-card-text"></i></div>
                            <span>ID Card Download</span>
                        </a>
                         <a href="<?= base_url('crowdfunding'); ?>" class="action-btn-custom">
                            <div class="action-btn-icon"><i class="bi bi-megaphone"></i></div>
                            <span>Crowdfunding</span>
                        </a>
                    </div>

                    <!-- Middle: Latest Activity -->
                    <div class="col-12 col-lg-6 mb-4">
                        <div class="d-flex justify-content-center">
                            <div class="red-title-box">Latest Activity</div>
                        </div>
                        <div class="latest-activity-scroll container-fluid px-0" style="max-height: 850px; overflow-y: auto; padding-right: 10px; overflow-x: hidden;">
                            <!-- Post 1: YouTube Video -->
                            <div class="video-card-border shadow-sm p-3 mb-4">
                                <h6 class="fw-bold mb-3" style="color: #333; font-size: 15px;">DRLK वार्षिक उत्सव एवं सम्मान समारोह का आयोजन</h6>
                                <div class="ratio ratio-16x9">
                                    <!-- YouTube Video placeholder -->
                                    <iframe src="https://www.youtube.com/embed/ScMzIvxBSi4?rel=0" title="YouTube video" allowfullscreen></iframe>
                                </div>
                                <p class="mt-3 text-muted" style="font-size:14px; line-height:1.6;">
                                    कर्म धैर्य संचार सेवा समिति के द्वारा तृतीय वर्ष वार्षिक उत्सव एवं सम्मान समारोह का आयोजन किया गया जिसमें हर वर्ष की भांति इस वर्ष भी समिति के सदस्य एवं कार्यकर्ताओं के द्वारा बढ़-चढ़कर हिस्सा लिया गया इस कार्यक्रम में समिति की योजनाओं को भली भांती सभी ग्राम पंचायत में पहुंचाने हेतु संकल्प लिया गया
                                </p>
                                <div class="mt-2 text-start">
                                    <a href="#" class="btn-outline-red">Read More</a>
                                </div>
                                <div class="post-footer-social">
                                    <span>Posted on March 1, 2026 at 3:18 PM</span>
                                    <div>
                                        <a href="#"><i class="bi bi-facebook"></i></a>
                                        <a href="#"><i class="bi bi-twitter"></i></a>
                                        <a href="#"><i class="bi bi-whatsapp"></i></a>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Post 2: Image Slider -->
                            <div class="video-card-border shadow-sm p-3 mb-2">
                                <h6 class="fw-bold mb-3" style="color: #333; font-size: 15px;">ग्रामीण क्षेत्रों में सामग्री वितरण एवं सहायता</h6>
                                <div id="activityImageCarousel" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#activityImageCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                        <button type="button" data-bs-target="#activityImageCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                        <button type="button" data-bs-target="#activityImageCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                    </div>
                                    <div class="carousel-inner ratio ratio-16x9" style="border-radius: 8px; overflow: hidden;">
                                        <div class="carousel-item active">
                                            <img src="<?= base_url('imgs/slider/1000953854_09152025130758.webp'); ?>" class="d-block w-100" alt="Activity Photo 1" style="object-fit: cover;">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="<?= base_url('imgs/slider/1000953854_09152025130758.webp'); ?>" class="d-block w-100" alt="Activity Photo 2" style="object-fit: cover;">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="<?= base_url('imgs/slider/1000953854_09152025130758.webp'); ?>" class="d-block w-100" alt="Activity Photo 3" style="object-fit: cover;">
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#activityImageCarousel" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: rgba(0,0,0,0.5); border-radius: 50%; padding: 15px;"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#activityImageCarousel" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: rgba(0,0,0,0.5); border-radius: 50%; padding: 15px;"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                                <p class="mt-3 text-muted" style="font-size:14px; line-height:1.6;">
                                    हाल ही में हमारी टीम द्वारा ग्रामीण क्षेत्रों में जाकर जरूरतमंद परिवारों को वस्त्र एवं खाद्य सामग्री का वितरण किया गया। इस अवसर पर समिति के सदस्यों ने बढ़-चढ़कर अपना योगदान दिया।
                                </p>
                                <div class="mt-2 text-start">
                                    <a href="#" class="btn-outline-red">Read More</a>
                                </div>
                                <div class="post-footer-social">
                                    <span>Posted on March 15, 2026 at 10:30 AM</span>
                                    <div>
                                        <a href="#"><i class="bi bi-facebook"></i></a>
                                        <a href="#"><i class="bi bi-twitter"></i></a>
                                        <a href="#"><i class="bi bi-whatsapp"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Our Members / Management Team -->
                    <div class="col-12 col-lg-3 mb-4">
                        <div class="d-flex justify-content-center">
                            <div class="red-title-box">Our Members</div>
                        </div>
                        
                        <div id="memberCarousel" class="carousel slide member-carousel mb-5 pb-3" data-bs-ride="carousel">
                            <?php if (!empty($our_members)): ?>
                                <div class="carousel-indicators">
                                    <?php foreach ($our_members as $index => $member): ?>
                                        <button type="button" data-bs-target="#memberCarousel" data-bs-slide-to="<?= $index ?>" class="<?= $index === 0 ? 'active' : '' ?>" <?= $index === 0 ? 'aria-current="true"' : '' ?>></button>
                                    <?php endforeach; ?>
                                </div>
                                
                                <div class="carousel-inner">
                                    <?php foreach ($our_members as $index => $member): ?>
                                    <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                                        <div class="member-card-wrapper shadow-sm mx-auto" style="max-width: 240px;">
                                            <div class="member-card-img-wrapper">
                                                <?php $photo = (!empty($member['photo']) && file_exists(FCPATH . $member['photo'])) ? base_url($member['photo']) : base_url('imgs/member/member-01.jpg'); ?>
                                                <img src="<?= $photo ?>" alt="Member Photo" style="height: 220px; object-fit: cover;">
                                            </div>
                                            <div class="member-card-details">
                                                <?= esc($member['full_name']) ?><br><small>(<?= esc($member['occupation'] ?? 'Member') ?>)</small>
                                                <?php if(!empty($member['city'])): ?><br><small><?= esc($member['city']) ?> (<?= esc($member['state'] ?? '') ?>)</small><?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                                
                                <div class="member-carousel-controls">
                                    <button class="carousel-control carousel-control-prev" type="button" data-bs-target="#memberCarousel" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true" style="padding: 15px;"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control carousel-control-next" type="button" data-bs-target="#memberCarousel" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true" style="padding: 15px;"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            <?php else: ?>
                                <div class="text-center">No members found.</div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="text-center mb-5">
                            <a href="<?= base_url('our-members') ?>" class="btn-red-solid shadow-sm" style="text-decoration:none;">View All</a>
                        </div>
                        
                        <div class="d-flex justify-content-center mt-3">
                            <div class="red-title-box">Management Team</div>
                        </div>
                        
                        <div id="managementCarousel" class="carousel slide member-carousel mb-4 pb-3" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#managementCarousel" data-bs-slide-to="0" class="active" aria-current="true"></button>
                                <button type="button" data-bs-target="#managementCarousel" data-bs-slide-to="1"></button>
                            </div>
                            
                            <div class="carousel-inner">
                                <?php if (!empty($management_team)): ?>
                                    <?php foreach ($management_team as $index => $manager): ?>
                                    <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                                        <div class="member-card-wrapper shadow-sm mx-auto" style="max-width: 240px;">
                                            <div class="member-card-img-wrapper">
                                                <?php $photo = (!empty($manager['photo']) && file_exists(FCPATH . $manager['photo'])) ? base_url($manager['photo']) : base_url('imgs/member/member-01.jpg'); ?>
                                                <img src="<?= $photo ?>" alt="Manager Photo" style="height: 220px; object-fit: cover;">
                                            </div>
                                            <div class="member-card-details">
                                                <?= esc($manager['name']) ?><br><small>(<?= esc($manager['designation']) ?>)</small>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="text-center">No team members found.</div>
                                <?php endif; ?>
                            </div>
                            
                            <div class="member-carousel-controls">
                                <button class="carousel-control carousel-control-prev" type="button" data-bs-target="#managementCarousel" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true" style="padding: 15px;"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control carousel-control-next" type="button" data-bs-target="#managementCarousel" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true" style="padding: 15px;"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>

                        <div class="text-center mb-5">
                            <a href="<?= base_url('management-team') ?>" class="btn-red-solid shadow-sm" style="text-decoration:none;">View All</a>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- /.. 3-MODULE SECTION ENDS
            ========================================================================= -->	

        <!-- ABOUT US STARTS
            ========================================================================= -->	
        <section class="home-about pb-5 pt-3" id="about">
            <div class="container">
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <div class="about-section-title animated" data-animation="fadeInUp" data-animation-delay="200"><span class="scroll-fill-text">About Us</span></div>
                    </div>
                </div>
                <div class="row">
                    <!-- Left: Logo Card -->
                    <div class="col-12 col-md-4 mb-4 animated" data-animation="fadeInLeft" data-animation-delay="300">
                        <div class="about-logo-card">
                            <!-- Placeholder logo. Ensure base_url matches your actual path to the DRLK logo -->
                            <img src="<?= base_url('images/logo-04-512x512.png'); ?>" alt="DRLK Logo" style="max-width: 180px; margin-bottom: 20px;">
                            <h5 style="color: #D90D0E; font-weight: bold; margin: 0; font-size: 16px;">UDYAM:- CG10-0014421</h5>
                        </div>
                    </div>
                    
                    <!-- Right: Text Card -->
                    <div class="col-12 col-md-8 mb-4 animated" data-animation="fadeInRight" data-animation-delay="400">
                        <div class="about-text-card pt-4 pb-5">
                            <div class="mb-3">
                                <?php 
                                    if(!empty($about_us)) {
                                        $clean_text = strip_tags($about_us['content']);
                                        echo strlen($clean_text) > 400 ? substr($clean_text, 0, 400) . '...' : $clean_text;
                                    } else {
                                        echo "DRLK Education Foundation is a passionate advocate for positive change, dedicated to making a tangible difference in the world. Since our inception, we have been driven by a singular mission: to empower individuals and communities to thrive through sustainable development initiatives, education, healthcare access, and environmental stewardship.";
                                    }
                                ?>
                            </div>
                            
                            <div class="text-end position-absolute" style="bottom: 20px; right: 30px;">
                                <a href="<?= base_url('about-us'); ?>" class="btn-outline-red" style="padding: 4px 15px; font-size: 14px;">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Custom scroll-based text fill effect -->
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const fillTexts = document.querySelectorAll('.scroll-fill-text');
                    
                    function updateFills() {
                        const windowHeight = window.innerHeight;
                        fillTexts.forEach(el => {
                            const rect = el.getBoundingClientRect();
                            if (rect.top < windowHeight && rect.bottom > 0) {
                                // Calculate percentage based on scroll depth
                                let percentage = ((windowHeight - rect.top) / windowHeight) * 100;
                                // Add offset so it finishes filling right before it leaves the screen
                                percentage = Math.max(0, Math.min(100, (percentage - 15) * 1.5));
                                el.style.backgroundPosition = (100 - percentage) + "% 0";
                            }
                        });
                    }
                    
                    window.addEventListener('scroll', updateFills);
                    updateFills(); // Initialize on load
                });
            </script>
        </section>
        <!-- /. ABOUT US ENDS
            ========================================================================= -->	

        <!-- PRESIDENT MESSAGE STARTS
            ========================================================================= -->	
        <section class="home-president pb-5 pt-3" id="president">
            <div class="container">
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <div class="about-section-title animated" data-animation="fadeInUp" data-animation-delay="200"><span class="scroll-fill-text">President Message</span></div>
                    </div>
                </div>
                <div class="row">
                    <!-- Left: Logo Card -->
                    <div class="col-12 col-md-4 mb-4 animated" data-animation="fadeInLeft" data-animation-delay="300">
                        <div class="about-logo-card">
                            <img src="<?= base_url('images/logo-04-512x512.png'); ?>" alt="DRLK Logo" style="max-width: 180px;">
                        </div>
                    </div>
                    
                    <!-- Right: Text Card -->
                    <div class="col-12 col-md-8 mb-4 animated" data-animation="fadeInRight" data-animation-delay="400">
                        <div class="about-text-card pt-4 pb-5">
                            <div class="mb-3">
                                <?php 
                                    if(!empty($president_message)) {
                                        $clean_text = strip_tags($president_message['content']);
                                        echo strlen($clean_text) > 400 ? substr($clean_text, 0, 400) . '...' : $clean_text;
                                    } else {
                                        echo "It is with great pride and humility that I address you as the President of DRLK Education Foundation. Since our founding 2022, our organization has been driven by a simple yet profound belief: that every individual, regardless of circumstance, deserves the opportunity to thrive.";
                                    }
                                ?>
                            </div>
                            
                            <div class="text-end position-absolute" style="bottom: 20px; right: 30px;">
                                <a href="<?= base_url('president-message'); ?>" class="btn-outline-red" style="padding: 4px 15px; font-size: 14px;">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /. PRESIDENT MESSAGE ENDS
            ========================================================================= -->	
            
        <!-- OUR OBJECTIVES STARTS
            ========================================================================= -->	
        <section class="home-objectives pb-5 pt-3" id="objectives">
            <div class="container-fluid px-4 px-lg-5">
                <div class="row mb-5">
                    <div class="col-12 text-center">
                        <div class="about-section-title animated" data-animation="fadeInUp" data-animation-delay="200" style="margin-bottom:0;"><span class="scroll-fill-text">Our Objectives</span></div>
                    </div>
                </div>
                <!-- 5 column flex row -->
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4 justify-content-center px-lg-4">
                    
                    <?php if(!empty($motives)): ?>
                        <?php foreach($motives as $motive): ?>
                            <div class="col animated" data-animation="fadeInUp" data-animation-delay="300">
                                <a href="<?= base_url('motive/'.$motive['id']) ?>" class="objective-card">
                                    <img src="<?= base_url($motive['image']); ?>" alt="<?= esc($motive['title']) ?>">
                                    <div class="objective-card-overlay">
                                        <h5><?= nl2br(esc($motive['short_title'])) ?></h5>
                                        <div class="objective-arrow-btn"><i class="bi bi-chevron-right"></i></div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-12 text-center">No objectives found.</div>
                    <?php endif; ?>
                    
                </div>
            </div>
        </section>
        <!-- /. OUR OBJECTIVES ENDS
            ========================================================================= -->
            
        <!-- YOUTUBE VIDEOS STARTS
            ========================================================================= -->	
        <section class="home-youtube pb-5 pt-3" id="youtube">
            <div class="container-fluid px-4 px-lg-5">
                <div class="row mb-5">
                    <div class="col-12 text-center">
                        <div class="about-section-title animated" data-animation="fadeInUp" data-animation-delay="200" style="margin-bottom:0;"><span class="scroll-fill-text">Youtube Videos</span></div>
                    </div>
                </div>
                
                <!-- White container card for videos -->
                <div class="row justify-content-center bg-white shadow-sm p-4 p-md-5 mx-lg-4" style="border-radius: 12px; border: 1px solid #eaeaea;">
                    <?php if(!empty($youtube_videos)): ?>
                        <?php foreach($youtube_videos as $video): ?>
                            <?php 
                                // Convert youtube link to embed link
                                $url = $video['youtube_link'];
                                $videoId = '';
                                if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/i', $url, $match)) {
                                    $videoId = $match[1];
                                }
                                $embedUrl = "https://www.youtube.com/embed/" . $videoId;
                            ?>
                            <div class="col-12 col-md-6 mb-4 animated" data-animation="fadeInUp" data-animation-delay="300">
                                <div class="ratio ratio-16x9 shrink-hover-effect" style="border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                                    <iframe src="<?= $embedUrl ?>?rel=0" title="<?= esc($video['title']) ?>" allowfullscreen style="border:0;"></iframe>
                                </div>
                                <h6 class="text-center mt-2 fw-bold"><?= esc($video['title']) ?></h6>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-12 text-center py-5">No videos available at the moment.</div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <!-- /. YOUTUBE VIDEOS ENDS
            ========================================================================= -->

        <!-- PHOTO GALLERY STARTS
            ========================================================================= -->	
        <section class="home-gallery pb-5 pt-3" id="gallery">
            <div class="container-fluid px-4 px-lg-5">
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <div class="about-section-title animated" data-animation="fadeInUp" data-animation-delay="200" style="margin-bottom:0;"><span class="scroll-fill-text">Photo Gallery</span></div>
                    </div>
                </div>
                
                <div class="row animated" data-animation="fadeInUp" data-animation-delay="300">
                    <div class="col-12 px-lg-4">
                        <div class="photo-gallery-carousel owl-carousel owl-theme">
                            
                            <?php if(!empty($gallery_items)): ?>
                                <?php foreach($gallery_items as $item): ?>
                                    <div class="item">
                                        <a href="<?= base_url($item['image']); ?>" class="gallery-photo-card image-popup-vertical-fit" title="<?= esc($item['title']) ?>">
                                            <img src="<?= base_url($item['image']); ?>" alt="<?= esc($item['title']) ?>">
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="item">
                                    <a href="https://via.placeholder.com/800x600.png?text=Gallery+Photo+1" class="gallery-photo-card image-popup-vertical-fit">
                                        <img src="https://via.placeholder.com/800x600.png?text=Gallery+Photo+1" alt="Gallery Photo 1">
                                    </a>
                                </div>
                            <?php endif; ?>

                        </div>
                        
                        <!-- Custom Navigation Controls -->
                        <div class="gallery-custom-nav">
                            <button class="gallery-prev"><i class="las la-angle-left"></i></button>
                            <button class="gallery-next"><i class="las la-angle-right"></i></button>
                        </div>
                        
                        <!-- View All Button -->
                        <div class="text-center mt-2">
                            <a href="<?= base_url('gallery'); ?>" class="btn-solid-red">View All</a>
                        </div>
                        
                    </div>
                </div>
            </div>
            
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    $(document).ready(function(){
                        var galleryCarousel = $('.photo-gallery-carousel');
                        galleryCarousel.owlCarousel({
                            autoplay: true,
                            autoplayTimeout: 4000,
                            autoplayHoverPause: true,
                            nav: false, 
                            dots: false,
                            mouseDrag: true,
                            smartSpeed: 500,
                            margin: 24,
                            loop: true,
                            responsive: {
                                0:    { items: 1 },
                                768:  { items: 2 },
                                1024: { items: 3 }
                            }
                        });
                        
                        $('.gallery-custom-nav .gallery-prev').click(function() {
                            galleryCarousel.trigger('prev.owl.carousel');
                        });
                        $('.gallery-custom-nav .gallery-next').click(function() {
                            galleryCarousel.trigger('next.owl.carousel');
                        });
                    });
                });
            </script>
        </section>
        <!-- /. PHOTO GALLERY ENDS
            ========================================================================= -->

        <!-- WHAT PEOPLE SAYS STARTS
            ========================================================================= -->	
        <section class="home-testimonials pb-5 pt-3" id="testimonials">
            <div class="container-fluid px-4 px-lg-5">
                <div class="row mb-5">
                    
                     <div class="col-12 text-center">
                        <div class="about-section-title animated" data-animation="fadeInUp" data-animation-delay="200" style="margin-bottom:0;"><span class="scroll-fill-text">What People Says</span></div>
                    </div>
                </div>
                
                <div class="row animated" data-animation="fadeInUp" data-animation-delay="300">
                    <div class="col-12 position-relative d-flex justify-content-center">
                        <div style="max-width: 1200px; width: 100%; position: relative;">
                        
                            <div class="testimonials-slider owl-carousel owl-theme pb-4">
                                
                                <?php if(!empty($testimonials)): ?>
                                    <?php foreach($testimonials as $testi): ?>
                                        <div class="item">
                                            <div class="testimonial-wrapper">
                                                <div class="testimonial-box shadow-sm" style="max-width: 1100px;">
                                                    <div class="testimonial-avatar shadow-sm">
                                                        <?php $photo = (!empty($testi['photo']) && file_exists(FCPATH . $testi['photo'])) ? base_url($testi['photo']) : base_url('imgs/testimonials/avatar_11112022054206.jpg'); ?>
                                                        <img src="<?= $photo ?>" alt="<?= esc($testi['name']) ?>">
                                                    </div>
                                                    <div><span class="testimonial-quote-icon">"</span></div>
                                                    <p class="testimonial-text">
                                                        <?= esc($testi['message']) ?>
                                                    </p>
                                                    <div class="testimonial-name"><?= esc($testi['name']) ?></div>
                                                    <div class="testimonial-role"><?= esc($testi['designation']) ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="item text-center">No testimonials available.</div>
                                <?php endif; ?>
                                
                            </div>
                            
                            <!-- Custom Navigation Controls positioned relative to the 1200px container -->
                            <button class="testimonial-nav-btn testimonial-prev" style="left: 0px;"><i class="las la-angle-left"></i></button>
                            <button class="testimonial-nav-btn testimonial-next" style="right: 0px;"><i class="las la-angle-right"></i></button>
                            
                        </div>
                    </div>
                </div>
            </div>
            
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    $(document).ready(function(){
                        var testiCarousel = $('.testimonials-slider');
                        testiCarousel.owlCarousel({
                            autoplay: true,
                            autoplayTimeout: 6000,
                            autoplayHoverPause: true,
                            nav: false, 
                            dots: false,
                            mouseDrag: true,
                            smartSpeed: 500,
                            margin: 30,
                            loop: true,
                            items: 1
                        });
                        
                        $('.testimonial-prev').click(function() {
                            testiCarousel.trigger('prev.owl.carousel');
                        });
                        $('.testimonial-next').click(function() {
                            testiCarousel.trigger('next.owl.carousel');
                        });
                    });
                });
            </script>
        </section>
        <!-- /. WHAT PEOPLE SAYS ENDS
            ========================================================================= -->

        <!-- LOCATE US STARTS
            ========================================================================= -->	
        <section class="home-locate-us pt-3 pb-0" id="locate">
            <div class="container-fluid px-4 px-lg-5">
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <div class="about-section-title animated" data-animation="fadeInUp" data-animation-delay="200" style="margin-bottom:0;"><span class="scroll-fill-text">Locate us</span></div>
                    </div>
                </div>
            </div>
            
            <div class="animated" data-animation="fadeInIn" data-animation-delay="300" style="margin-bottom: -5px;"> <!-- Prevent margin gap if any -->
                <!-- Google Maps Embed: Fragron Infotech, Satellite/Hyper-realistic mode if possible -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14333.19794017387!2d78.3242636!3d25.8432321!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x397705df5e7aaabb%3A0xe54c46f39cd5ac!2sFragron%20Infotech!5e1!3m2!1sen!2sus!4v1711910000000!5m2!1sen!2sus" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </section>
        <!-- /. LOCATE US ENDS
            ========================================================================= -->
        

<?= view('frontend/layout/footer'); ?>