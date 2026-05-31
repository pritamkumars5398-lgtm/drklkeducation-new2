<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Temporary Deployment Helper Routes
$routes->get('unzip_assets', function() {
    header('Content-Type: text/plain; charset=utf-8');
    $zips = ['revolution.zip', 'line-awesome.zip', 'lib-others.zip'];
    $all_success = true;
    echo "📂 CodeIgniter Routed Asset Extractor\n";
    echo "==========================================\n\n";
    foreach ($zips as $zipName) {
        $zipFile = FCPATH . $zipName;
        if (!file_exists($zipFile)) {
            echo "⚠️ Warning: $zipName not found in " . FCPATH . "\n";
            continue;
        }
        echo "📦 Extracting $zipName... ";
        $zip = new ZipArchive;
        if ($zip->open($zipFile) === TRUE) {
            if ($zip->extractTo(FCPATH)) {
                $zip->close();
                unlink($zipFile);
                echo "✅ Success! Deleted zip.\n";
            } else {
                $zip->close();
                echo "❌ Failed to extract files!\n";
                $all_success = false;
            }
        } else {
            echo "❌ Could not open archive!\n";
            $all_success = false;
        }
    }
    if ($all_success) echo "\n🎉 ALL ASSETS SUCCESSFULLY EXTRACTED!";
});

$routes->get('import_database', function() {
    header('Content-Type: text/plain; charset=utf-8');
    echo "🔋 CodeIgniter Routed Database Importer\n";
    echo "==========================================\n\n";
    $host = 'sql102.infinityfree.com';
    $user = 'if0_42009009';
    $pass = 'dMQk9QkeTognvP';
    $db   = 'if0_42009009_drlkeducation';
    $mysqli = new mysqli($host, $user, $pass, $db, 3306);
    if ($mysqli->connect_error) die("❌ Connect failed: " . $mysqli->connect_error);
    $mysqli->set_charset("utf8mb4");
    
    $mysqli->query("SET foreign_key_checks = 0");
    $result = $mysqli->query("SHOW TABLES");
    $dropped = 0;
    while ($row = $result->fetch_array()) {
        $mysqli->query("DROP TABLE IF EXISTS `{$row[0]}`");
        $dropped++;
    }
    $mysqli->query("SET foreign_key_checks = 1");
    echo "🗑️ Dropped $dropped existing tables.\n";
    
    $sqlFile = FCPATH . 'database/drlkeducation.sql';
    if (!file_exists($sqlFile)) die("❌ Error: drlkeducation.sql not found at " . $sqlFile);
    $sql = file_get_contents($sqlFile);
    if ($mysqli->multi_query($sql)) {
        $count = 0;
        do {
            $count++;
            if ($res = $mysqli->store_result()) $res->free();
        } while ($mysqli->more_results() && $mysqli->next_result());
        if ($mysqli->errno) {
            echo "❌ Error: " . $mysqli->error . "\n";
        } else {
            echo "🎉 Success! Database imported successfully! ($count queries executed)\n";
        }
    } else {
        echo "❌ Error: " . $mysqli->error . "\n";
    }
    $mysqli->close();
});
$routes->get('/member-apply', 'Home::memberApply');
$routes->post('/member-apply-submit', 'Home::memberApplySubmit');
$routes->get('/id-card-download', 'Home::idCard');
$routes->post('/id-card-process', 'Home::idCardProcess');
$routes->get('/membership-renewal', 'Home::membershipRenewal');
$routes->post('/membership-renewal-process', 'Home::membershipRenewalProcess');
$routes->post('/membership-renewal-submit', 'Home::membershipRenewalSubmit');
$routes->get('/about-us', 'Home::about');
$routes->get('/president-message', 'Home::presidentMessage');
$routes->get('/management-team', 'Home::team');
$routes->get('/our-members', 'Home::members');
$routes->get('/achievements', 'Home::achievements');
$routes->get('/certificates', 'Home::certificates');
$routes->get('/crowdfunding', 'Home::crowdfunding');
$routes->get('/donation', 'Home::donation');
$routes->get('/donors', 'Home::donors');
$routes->get('/gallery', 'Home::gallery');
$routes->get('/press-media', 'Home::pressMedia');
$routes->get('/audit-reports', 'Home::auditReports');
$routes->get('/events', 'Home::events');
$routes->get('/solutions', 'Home::solutions');
$routes->get('/complain', 'Home::complain');
$routes->get('/projects', 'Home::projects');
$routes->get('/coordinator-login', 'Admin\Auth::coordinatorLogin');
$routes->get('/manager-login', 'Admin\Auth::managerLogin');
$routes->get('/contact-us', 'Home::contactUs');
$routes->post('/contact-submit', 'Home::contactSubmit');
$routes->get('/terms-condition', 'Home::terms');
$routes->get('/privacy-policy', 'Home::privacy');
$routes->get('/disclaimer', 'Home::disclaimer');
$routes->get('/refund-policy', 'Home::refund');
$routes->get('/admin/dashboard', 'Admin\Dashboard::index');
$routes->post('save-student-enquiry', 'Home::saveStudentEnquiry');

$routes->group('admin', function($routes){

   $routes->get('/', 'Admin\Auth::login');
   $routes->get('dashboard', 'Admin\Dashboard::index');
   $routes->post('auth/login', 'Admin\Auth::checkLogin');

});

$routes->get('/admin/dashboard', 'Admin\Dashboard::index');
$routes->get('/coordinator/dashboard', 'Coordinator\Dashboard::index');

$routes->get('/logout', 'Admin\Auth::logout');

$routes->get('/admin/members', 'Admin\Members::index');
$routes->get('/admin/members/applications', 'Admin\Members::applications');
$routes->get('/admin/members/renewals', 'Admin\Members::renewals');
$routes->get('/admin/members/view/(:num)', 'Admin\Members::view/$1');

$routes->get('/admin/members/approve/(:num)', 'Admin\Members::approve/$1');
$routes->get('/admin/members/reject/(:num)', 'Admin\Members::reject/$1');
$routes->get('/admin/members/renewals/approve/(:num)', 'Admin\Members::approveRenewal/$1');
$routes->get('/admin/members/renewals/reject/(:num)', 'Admin\Members::rejectRenewal/$1');
$routes->get('/admin/members/delete/(:num)', 'Admin\Members::delete/$1');

$routes->get('/admin/members/add', 'Admin\Members::add');
$routes->post('/admin/members/save', 'Admin\Members::save');
$routes->get('/admin/members/edit/(:num)', 'Admin\Members::edit/$1');
$routes->post('/admin/members/update/(:num)', 'Admin\Members::update/$1');

$routes->get('/admin/managementteam', 'Admin\ManagementTeam::index');
$routes->get('/admin/managementteam/view/(:num)', 'Admin\ManagementTeam::view/$1');
$routes->get('/admin/managementteam/add', 'Admin\ManagementTeam::add');
$routes->post('/admin/managementteam/save', 'Admin\ManagementTeam::save');
$routes->get('/admin/managementteam/edit/(:num)', 'Admin\ManagementTeam::edit/$1');
$routes->post('/admin/managementteam/update/(:num)', 'Admin\ManagementTeam::update/$1');
$routes->get('/admin/managementteam/delete/(:num)', 'Admin\ManagementTeam::delete/$1');

$routes->get('/admin/studentleads', 'Admin\StudentLeads::index');
$routes->get('/admin/studentleads/view/(:num)', 'Admin\StudentLeads::view/$1');
$routes->get('/admin/studentleads/delete/(:num)', 'Admin\StudentLeads::delete/$1');
$routes->get('/admin/studentleads/status/(:num)/(:segment)', 'Admin\StudentLeads::status/$1/$2');

$routes->post('/donation-submit', 'Home::donationSubmit');

$routes->get('/admin/donations', 'Admin\Donations::index');
$routes->get('/admin/donations/view/(:num)', 'Admin\Donations::view/$1');
$routes->get('/admin/donations/approve/(:num)', 'Admin\Donations::approve/$1');
$routes->get('/admin/donations/reject/(:num)', 'Admin\Donations::reject/$1');
$routes->get('/admin/donations/delete/(:num)', 'Admin\Donations::delete/$1');

$routes->get('/admin/certificates', 'Admin\Certificates::index');
$routes->get('/admin/certificates/add', 'Admin\Certificates::add');
$routes->post('/admin/certificates/save', 'Admin\Certificates::save');
$routes->get('/admin/certificates/delete/(:num)', 'Admin\Certificates::delete/$1');

// Events Admin Routes
$routes->get('/admin/events', 'Admin\Events::index');
$routes->get('/admin/events/add', 'Admin\Events::add');
$routes->post('/admin/events/save', 'Admin\Events::save');
$routes->get('/admin/events/delete/(:num)', 'Admin\Events::delete/$1');
$routes->get('/admin/events/bookings', 'Admin\Events::bookings');
$routes->get('/admin/events/bookings/approve/(:num)', 'Admin\Events::approveBooking/$1');
$routes->get('/admin/events/bookings/reject/(:num)', 'Admin\Events::rejectBooking/$1');

// Events Frontend Routes
$routes->get('/book-seat/(:num)', 'Home::bookSeat/$1');
$routes->post('/book-seat-submit', 'Home::bookSeatSubmit');

// Gallery Admin Routes
$routes->get('/admin/gallery', 'Admin\Gallery::index');
$routes->get('/admin/gallery/add', 'Admin\Gallery::add');
$routes->post('/admin/gallery/save', 'Admin\Gallery::save');
$routes->get('/admin/gallery/delete/(:num)', 'Admin\Gallery::delete/$1');

// Contact Enquiry Admin Routes
$routes->get('/admin/contact-enquiry', 'Admin\ContactEnquiry::index');
$routes->get('/admin/contact-enquiry/view/(:num)', 'Admin\ContactEnquiry::view/$1');
$routes->post('/admin/contact-enquiry/reply/(:num)', 'Admin\ContactEnquiry::reply/$1');
$routes->get('/admin/contact-enquiry/delete/(:num)', 'Admin\ContactEnquiry::delete/$1');

// Coordinator Users Admin Routes
$routes->get('/admin/coordinators', 'Admin\Coordinators::index');
$routes->get('/admin/coordinators/add', 'Admin\Coordinators::add');
$routes->post('/admin/coordinators/save', 'Admin\Coordinators::save');
$routes->get('/admin/coordinators/edit/(:num)', 'Admin\Coordinators::edit/$1');
$routes->post('/admin/coordinators/update/(:num)', 'Admin\Coordinators::update/$1');
$routes->get('/admin/coordinators/delete/(:num)', 'Admin\Coordinators::delete/$1');

// CMS Pages Admin Routes
$routes->get('/admin/cms', 'Admin\Cms::index');
$routes->get('/admin/cms/edit/(:num)', 'Admin\Cms::edit/$1');
$routes->post('/admin/cms/update/(:num)', 'Admin\Cms::update/$1');

// News Updates Admin Routes
$routes->get('/admin/news-updates', 'Admin\NewsUpdates::index');
$routes->get('/admin/news-updates/add', 'Admin\NewsUpdates::add');
$routes->post('/admin/news-updates/save', 'Admin\NewsUpdates::save');
$routes->get('/admin/news-updates/edit/(:num)', 'Admin\NewsUpdates::edit/$1');
$routes->post('/admin/news-updates/update/(:num)', 'Admin\NewsUpdates::update/$1');
$routes->get('/admin/news-updates/delete/(:num)', 'Admin\NewsUpdates::delete/$1');

// Latest News Admin Routes
$routes->get('/admin/latest-news', 'Admin\LatestNews::index');
$routes->get('/admin/latest-news/add', 'Admin\LatestNews::add');
$routes->post('/admin/latest-news/save', 'Admin\LatestNews::save');
$routes->get('/admin/latest-news/edit/(:num)', 'Admin\LatestNews::edit/$1');
$routes->post('/admin/latest-news/update/(:num)', 'Admin\LatestNews::update/$1');
$routes->get('/admin/latest-news/delete/(:num)', 'Admin\LatestNews::delete/$1');

// Slider Admin Routes
$routes->get('/admin/sliders', 'Admin\Sliders::index');
$routes->get('/admin/sliders/add', 'Admin\Sliders::add');
$routes->post('/admin/sliders/save', 'Admin\Sliders::save');
$routes->get('/admin/sliders/edit/(:num)', 'Admin\Sliders::edit/$1');
$routes->post('/admin/sliders/update/(:num)', 'Admin\Sliders::update/$1');
$routes->get('/admin/sliders/delete/(:num)', 'Admin\Sliders::delete/$1');

// Press Media Frontend Route
$routes->get('/press-media', 'Home::pressMedia');

// Motives (Our Objectives) Admin Routes
$routes->get('/admin/motives', 'Admin\Motives::index');
$routes->get('/admin/motives/add', 'Admin\Motives::add');
$routes->post('/admin/motives/save', 'Admin\Motives::save');
$routes->get('/admin/motives/edit/(:num)', 'Admin\Motives::edit/$1');
$routes->post('/admin/motives/update/(:num)', 'Admin\Motives::update/$1');
$routes->get('/admin/motives/delete/(:num)', 'Admin\Motives::delete/$1');

// YouTube Videos Admin Routes
$routes->get('/admin/youtube-videos', 'Admin\YoutubeVideos::index');
$routes->get('/admin/youtube-videos/add', 'Admin\YoutubeVideos::add');
$routes->post('/admin/youtube-videos/save', 'Admin\YoutubeVideos::save');
$routes->get('/admin/youtube-videos/edit/(:num)', 'Admin\YoutubeVideos::edit/$1');
$routes->post('/admin/youtube-videos/update/(:num)', 'Admin\YoutubeVideos::update/$1');
$routes->get('/admin/youtube-videos/delete/(:num)', 'Admin\YoutubeVideos::delete/$1');

// Testimonials Admin Routes
$routes->get('/admin/testimonials', 'Admin\Testimonials::index');
$routes->get('/admin/testimonials/add', 'Admin\Testimonials::add');
$routes->post('/admin/testimonials/save', 'Admin\Testimonials::save');
$routes->get('/admin/testimonials/edit/(:num)', 'Admin\Testimonials::edit/$1');
$routes->post('/admin/testimonials/update/(:num)', 'Admin\Testimonials::update/$1');
$routes->get('/admin/testimonials/delete/(:num)', 'Admin\Testimonials::delete/$1');

// WhatsApp Settings Admin Routes
$routes->get('/admin/whatsapp-settings', 'Admin\WhatsappSettings::index');
$routes->post('/admin/whatsapp-settings/update', 'Admin\WhatsappSettings::update');

// Campaigns Admin Routes
$routes->get('/admin/campaigns', 'Admin\Campaigns::index');
$routes->get('/admin/campaigns/add', 'Admin\Campaigns::add');
$routes->post('/admin/campaigns/save', 'Admin\Campaigns::save');
$routes->get('/admin/campaigns/edit/(:num)', 'Admin\Campaigns::edit/$1');
$routes->post('/admin/campaigns/update/(:num)', 'Admin\Campaigns::update/$1');
$routes->get('/admin/campaigns/delete/(:num)', 'Admin\Campaigns::delete/$1');

// Motives Frontend Route
$routes->get('/motive/(:num)', 'Home::motive/$1');

// Gallery Frontend Route
$routes->get('/gallery', 'Home::gallery');

// Crowdfunding & Donation Frontend Routes
$routes->get('/crowdfunding', 'Home::crowdfunding');
$routes->get('/donate', 'Home::donation');
$routes->post('/donation-submit', 'Home::donationSubmit');