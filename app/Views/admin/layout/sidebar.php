<section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?= base_url('admin/assets/images/user.png') ?>" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= esc(session()->get('fullname') ?? 'User') ?></div>
                    <div class="email"><?= esc(session()->get('email') ?? '') ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                           <li role="seperator" class="divider"></li>
                            <li><a href="<?= base_url('logout') ?>"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    
                    <?php $role = session()->get('admin_role') ?? 'manager'; ?>
                    
                    <li>
                        <a href="<?= $role === 'manager' ? base_url('admin/dashboard') : base_url('coordinator/dashboard') ?>">
                            <i class="material-icons">dashboard</i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <?php if($role === 'manager'): ?>
                    <li>
                        <a href="<?= base_url('admin/members') ?>">
                            <i class="material-icons">group</i>
                            <span>Members</span>
                        </a>
                    </li>
                    <?php endif; ?>

                     <?php if($role === 'manager'): ?>
                    <li>
                        <a href="<?= base_url('admin/managementteam') ?>">
                            <i class="material-icons">group</i>
                            <span>Management Team</span>
                        </a>
                    </li>
                    <?php endif; ?>

                    <li>
                        <a href="<?= base_url('admin/members/applications') ?>">
                            <i class="material-icons">assignment</i>
                            <span>Member Applications</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?= base_url('admin/members/renewals') ?>">
                            <i class="material-icons">autorenew</i>
                            <span>Renewal Requests</span>
                        </a>
                    </li>

                    <?php if($role === 'manager'): ?>
                    <li>
                        <a href="<?= base_url('admin/campaigns') ?>">
                            <i class="material-icons">monetization_on</i>
                            <span>Crowdfunding</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/donations') ?>">
                            <i class="material-icons">favorite</i>
                            <span>Donations</span>
                        </a>
                    </li>
                    <?php endif; ?>

                    <li>
                        <a href="<?= base_url('admin/studentleads') ?>">
                            <i class="material-icons">school</i>
                            <span>Student Leads</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?= base_url('admin/gallery') ?>">
                            <i class="material-icons">photo_library</i>
                            <span>Gallery</span>
                        </a>
                    </li>

                    <?php if($role === 'manager'): ?>
                    <li>
                        <a href="<?= base_url('admin/events') ?>">
                            <i class="material-icons">event</i>
                            <span>Events</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?= base_url('admin/events/bookings') ?>">
                            <i class="material-icons">confirmation_number</i>
                            <span>Event Bookings</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?= base_url('admin/certificates') ?>">
                            <i class="material-icons">card_membership</i>
                            <span>Certificates</span>
                        </a>
                    </li>
                    <?php endif; ?>

                    <li>
                        <a href="<?= base_url('admin/contact-enquiry') ?>">
                            <i class="material-icons">contact_mail</i>
                            <span>Contact Enquiry</span>
                        </a>
                    </li>

                    <?php if($role === 'manager'): ?>
                    <li>
                        <a href="<?= base_url('admin/cms') ?>">
                            <i class="material-icons">description</i>
                            <span>CMS Pages</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?= base_url('admin/motives') ?>">
                            <i class="material-icons">star</i>
                            <span>Our Objectives</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?= base_url('admin/testimonials') ?>">
                            <i class="material-icons">comment</i>
                            <span>Testimonials</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/whatsapp-settings') ?>">
                            <i class="material-icons">chat</i>
                            <span>WhatsApp Settings</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/youtube-videos') ?>">
                            <i class="material-icons">video_library</i>
                            <span>YouTube Videos</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?= base_url('admin/news-updates') ?>">
                            <i class="material-icons">campaign</i>
                            <span>News & Updates</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?= base_url('admin/latest-news') ?>">
                            <i class="material-icons">new_releases</i>
                            <span>Latest News</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?= base_url('admin/sliders') ?>">
                            <i class="material-icons">burst_mode</i>
                            <span>Sliders</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="#">
                            <i class="material-icons">settings</i>
                            <span>Settings</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?= base_url('admin/coordinators') ?>">
                            <i class="material-icons">person_add</i>
                            <span>Coordinator Users</span>
                        </a>
                    </li>
                    <?php endif; ?>

                    <li>
                        <a href="<?= base_url('logout') ?>">
                            <i class="material-icons">exit_to_app</i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2026 <a href="javascript:void(0);">Admin - NGO</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.4
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="skins">
                    <ul class="demo-choose-skin">
                        <li data-theme="red" class="active">
                            <div class="red"></div>
                            <span>Red</span>
                        </li>
                        <li data-theme="pink">
                            <div class="pink"></div>
                            <span>Pink</span>
                        </li>
                        <li data-theme="purple">
                            <div class="purple"></div>
                            <span>Purple</span>
                        </li>
                        <li data-theme="deep-purple">
                            <div class="deep-purple"></div>
                            <span>Deep Purple</span>
                        </li>
                        <li data-theme="indigo">
                            <div class="indigo"></div>
                            <span>Indigo</span>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div>
                            <span>Blue</span>
                        </li>
                        <li data-theme="light-blue">
                            <div class="light-blue"></div>
                            <span>Light Blue</span>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                            <span>Cyan</span>
                        </li>
                        <li data-theme="teal">
                            <div class="teal"></div>
                            <span>Teal</span>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                            <span>Green</span>
                        </li>
                        <li data-theme="light-green">
                            <div class="light-green"></div>
                            <span>Light Green</span>
                        </li>
                        <li data-theme="lime">
                            <div class="lime"></div>
                            <span>Lime</span>
                        </li>
                        <li data-theme="yellow">
                            <div class="yellow"></div>
                            <span>Yellow</span>
                        </li>
                        <li data-theme="amber">
                            <div class="amber"></div>
                            <span>Amber</span>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                            <span>Orange</span>
                        </li>
                        <li data-theme="deep-orange">
                            <div class="deep-orange"></div>
                            <span>Deep Orange</span>
                        </li>
                        <li data-theme="brown">
                            <div class="brown"></div>
                            <span>Brown</span>
                        </li>
                        <li data-theme="grey">
                            <div class="grey"></div>
                            <span>Grey</span>
                        </li>
                        <li data-theme="blue-grey">
                            <div class="blue-grey"></div>
                            <span>Blue Grey</span>
                        </li>
                        <li data-theme="black">
                            <div class="black"></div>
                            <span>Black</span>
                        </li>
                    </ul>
                </div>

            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>