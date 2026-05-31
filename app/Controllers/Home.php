<?php

namespace App\Controllers;
use App\Models\StudentEnquiryModel;
class Home extends BaseController
{
    public function index()
    {
        $memberModel = new \App\Models\MemberModel();
        $members = $memberModel->where('status', 'approved')->findAll();
        
        $teamModel = new \App\Models\ManagementTeamModel();
        $mc = $teamModel->where('status', 'active')->orderBy('sort_order', 'ASC')->findAll();

        $latestNewsModel = new \App\Models\LatestNewsModel();
        $latest_news = $latestNewsModel->where('status', 'active')->orderBy('display_order', 'ASC')->findAll();

        $sliderModel = new \App\Models\SliderModel();
        $sliders = $sliderModel->where('status', 'active')->orderBy('sort_order', 'ASC')->findAll();
        
        $motiveModel = new \App\Models\MotiveModel();
        $motives = $motiveModel->where('status', 'active')->findAll();

        $videoModel = new \App\Models\YoutubeVideoModel();
        $videos = $videoModel->where('status', 'active')->orderBy('id', 'DESC')->findAll();

        $galleryModel = new \App\Models\GalleryModel();
        $gallery = $galleryModel->where('status', 'active')->where('type', 'photo')->orderBy('id', 'DESC')->findAll();

        $testiModel = new \App\Models\TestimonialModel();
        $testimonials = $testiModel->where('status', 'active')->orderBy('id', 'DESC')->findAll();

        $cmsModel = new \App\Models\CmsModel();
        $about_us = $cmsModel->where('slug', 'about-us')->first();
        $president_message = $cmsModel->where('slug', 'president-message')->first();

        $data = [
            'our_members' => $members,
            'management_team' => $mc,
            'latest_news' => $latest_news,
            'sliders' => $sliders,
            'motives' => $motives,
            'youtube_videos' => $videos,
            'gallery_items' => $gallery,
            'testimonials' => $testimonials,
            'about_us' => $about_us,
            'president_message' => $president_message
        ];
        return view('frontend/home', $data);
    }

    public function memberApply()
{
    return view('frontend/member_apply');
}

public function memberApplySubmit()
{
    $model = new \App\Models\MemberModel();

    $guardian_relation = $this->request->getPost('guardian_relation');
    $guardian_name = $this->request->getPost('guardian_name');
    $father_name = ($guardian_relation && $guardian_name) ? $guardian_relation . ' ' . $guardian_name : $guardian_name;

    $data = [
        'full_name' => $this->request->getPost('full_name'),
        'father_name' => $father_name,
        'mobile' => $this->request->getPost('mobile'),
        'aadhar_no' => $this->request->getPost('aadhar_no'),
        'email' => $this->request->getPost('email'),
        'dob' => $this->request->getPost('dob'),
        'gender' => $this->request->getPost('gender'),
        'blood_group' => $this->request->getPost('blood_group'),
        'occupation' => $this->request->getPost('occupation'),
        'address' => $this->request->getPost('address'),
        'state' => $this->request->getPost('state'),
        'district' => $this->request->getPost('district'),
        'pincode' => $this->request->getPost('pincode'),
        'id_type' => $this->request->getPost('id_type'),
        'payment_mode' => $this->request->getPost('payment_mode'),
        'status' => 'pending',
    ];

    $uploadPath = ROOTPATH . 'public/imgs/member';
    if (!is_dir($uploadPath)) {
        mkdir($uploadPath, 0777, true);
    }

    $files = ['photo', 'id_document', 'other_document', 'payment_receipt'];
    foreach ($files as $file) {
        $uploadedFile = $this->request->getFile($file);
        if ($uploadedFile && $uploadedFile->isValid() && !$uploadedFile->hasMoved()) {
            $newName = $uploadedFile->getRandomName();
            $uploadedFile->move($uploadPath, $newName);
            $data[$file] = 'imgs/member/' . $newName;
        }
    }

    $model->insert($data);

    return redirect()->to(base_url('member-apply'))->with('success', 'Your membership application has been submitted successfully and is pending approval.');
}

public function idCard()
{
    return view('frontend/id_card');
}

public function idCardProcess()
{
    $memberCode = $this->request->getPost('member_code');
    $dob = $this->request->getPost('dob');
    $action = $this->request->getPost('action');

    $model = new \App\Models\MemberModel();
    $member = $model->where('member_code', $memberCode)
                    ->where('dob', $dob)
                    ->where('status', 'approved')
                    ->first();

    if (!$member) {
        return redirect()->to(base_url('id-card-download'))->with('error', 'Invalid Membership ID or Date of Birth, or membership not approved.');
    }

    $data['member'] = $member;

    if ($action === 'appointment_letter') {
        return view('frontend/appointment_letter_print', $data);
    } else {
        return view('frontend/id_card_print', $data);
    }
}

public function membershipRenewal()
{
    return view('frontend/membership_renewal');
}

public function membershipRenewalProcess()
{
    $memberCode = $this->request->getPost('member_code');
    $dob = $this->request->getPost('dob');

    $model = new \App\Models\MemberModel();
    $member = $model->where('member_code', $memberCode)
                    ->where('dob', $dob)
                    ->first();

    if (!$member) {
        return redirect()->to(base_url('membership-renewal'))->with('error', 'Invalid Membership ID or Date of Birth.');
    }

    $data['member'] = $member;
    return view('frontend/membership_renewal', $data);
}

public function membershipRenewalSubmit()
{
    $memberId = $this->request->getPost('member_id');
    $paymentMode = $this->request->getPost('payment_mode');
    
    if (!$memberId) {
        return redirect()->to(base_url('membership-renewal'))->with('error', 'Invalid request.');
    }

    $memberModel = new \App\Models\MemberModel();
    $member = $memberModel->find($memberId);

    if (!$member) {
        return redirect()->to(base_url('membership-renewal'))->with('error', 'Member not found.');
    }

    $uploadPath = ROOTPATH . 'public/imgs/member';
    if (!is_dir($uploadPath)) {
        mkdir($uploadPath, 0777, true);
    }

    $paymentReceiptPath = null;
    $receipt = $this->request->getFile('payment_receipt');
    if ($receipt && $receipt->isValid() && !$receipt->hasMoved()) {
        $newName = $receipt->getRandomName();
        $receipt->move($uploadPath, $newName);
        $paymentReceiptPath = 'imgs/member/' . $newName;
    }

    // Insert into member_renewals table
    $renewalModel = new \App\Models\MemberRenewalModel();
    $renewalModel->insert([
        'member_id'       => $memberId,
        'membership_id'   => $member['member_code'],
        'full_name'       => $member['full_name'],
        'payment_mode'    => $paymentMode,
        'payment_receipt' => $paymentReceiptPath,
        'status'          => 'pending'
    ]);

    // Update members table status
    $memberModel->update($memberId, [
        'status' => 'pending_renewal'
    ]);

    return redirect()->to(base_url('membership-renewal'))->with('success', 'Your membership renewal request and payment details have been submitted successfully. It is pending approval from the administration.');
}

public function about()
{
    $cmsModel = new \App\Models\CmsModel();
    $data['page'] = $cmsModel->where('slug', 'about-us')->first();
    return view('frontend/about', $data);
}

public function presidentMessage()
{
    $cmsModel = new \App\Models\CmsModel();
    $page = $cmsModel->where('slug', 'president-message')->first();
    
    if (!$page) {
        // Create default if not exists
        $content = '<h3>President Message</h3>
        <p>Dear Friends,</p>
        <p>It is with great pride and humility that I address you as the President of DRLK Education Foundation. Since our founding 2022, our organization has been driven by a simple yet profound belief: that every individual, regardless of circumstance, deserves the opportunity to thrive.</p>
        <p>At DRLK Education Foundation, we are not just dreamers; we are doers. We roll up our sleeves and work tirelessly to turn our vision of a better world into reality. From providing access to education and healthcare to championing environmental sustainability and social justice, our efforts are guided by a deep commitment to making a meaningful difference in the lives of others.</p>
        <p>But we cannot do it alone. Our success is built on the support of passionate individuals like you—individuals who share our values and our vision for a brighter future. Together, we can amplify our impact and create lasting change that reverberates far beyond our borders.</p>
        <p>As we look to the future, I am filled with hope and optimism. The challenges we face are great, but too is our resolve to overcome them. With your continued support, I am confident that we can build a world where every person has the opportunity to flourish and thrive.</p>
        <p>Thank you for your unwavering commitment to our cause. Together, we are truly making a difference.</p>
        <p>Warm regards,</p>
        <p>DRLK Education Foundation</p>';

        $cmsModel->insert([
            'title' => 'President Message',
            'slug' => 'president-message',
            'content' => $content
        ]);
        $page = $cmsModel->where('slug', 'president-message')->first();
    }

    $data['page'] = $page;
    return view('frontend/president_message', $data);
}

public function motive($id)
{
    $model = new \App\Models\MotiveModel();
    $data['motive'] = $model->find($id);

    if (!$data['motive']) {
        return redirect()->to('/')->with('error', 'Objective not found.');
    }

    return view('frontend/motive_detail', $data);
}


public function team()
{
    $teamModel = new \App\Models\ManagementTeamModel();
    $data['team'] = $teamModel->where('status', 'active')->orderBy('sort_order', 'ASC')->findAll();
    return view('frontend/management_team', $data);
}
public function members()
{
    $memberModel = new \App\Models\MemberModel();
    // Assuming you want to get active/approved members, adjust condition if needed
    $data['members'] = $memberModel->where('status', 'approved')->findAll();
    return view('frontend/members', $data);
}
public function achievements()
{
    return view('frontend/achievements');
}
public function certificates()
{
    $model = new \App\Models\CertificateModel();
    $data['certificates'] = $model->where('status', 'active')->orderBy('id', 'DESC')->findAll();
    return view('frontend/certificates', $data);
}
public function crowdfunding()
{
    $model = new \App\Models\CampaignModel();
    $data['campaigns'] = $model->where('status', 'active')->orderBy('id', 'DESC')->findAll();
    return view('frontend/crowdfunding', $data);
}
public function donation()
{
    $campaignId = $this->request->getGet('campaign_id');
    $campaignModel = new \App\Models\CampaignModel();
    
    $data['selected_campaign'] = null;
    if ($campaignId) {
        $data['selected_campaign'] = $campaignModel->find($campaignId);
    }
    
    $data['campaigns'] = $campaignModel->where('status', 'active')->findAll();
    return view('frontend/donation', $data);
}

public function donationSubmit()
{
    $model = new \App\Models\DonationModel();
    
    $data = [
        'full_name'      => $this->request->getPost('full_name'),
        'mobile'         => $this->request->getPost('mobile'),
        'email'          => $this->request->getPost('email'),
        'pancard_no'     => $this->request->getPost('pancard_no'),
        'address'        => $this->request->getPost('address'),
        'amount'         => $this->request->getPost('amount') ? $this->request->getPost('amount') : 0,
        'custom_amount'  => $this->request->getPost('custom_amount') ? $this->request->getPost('custom_amount') : 0,
        'campaign_id'    => $this->request->getPost('campaign_id'),
        'payment_mode'   => 'UPI',
        'status'         => 'pending'
    ];

    $uploadPath = ROOTPATH . 'public/imgs/member';
    if (!is_dir($uploadPath)) {
        mkdir($uploadPath, 0777, true);
    }

    $photo = $this->request->getFile('photo');
    if ($photo && $photo->isValid() && !$photo->hasMoved()) {
        $newName = $photo->getRandomName();
        $photo->move($uploadPath, $newName);
        $data['photo'] = 'imgs/member/' . $newName;
    }

    $receipt = $this->request->getFile('payment_receipt');
    if ($receipt && $receipt->isValid() && !$receipt->hasMoved()) {
        $newName = $receipt->getRandomName();
        $receipt->move($uploadPath, $newName);
        $data['payment_receipt'] = 'imgs/member/' . $newName;
    }

    $model->insert($data);

    return redirect()->to(base_url('donation'))->with('success', 'Your donation details have been submitted successfully. It will be shown on the website upon verification.');
}

public function donors()
{
    $model = new \App\Models\DonationModel();
    $data['donors'] = $model->where('status', 'verified')->orderBy('id', 'DESC')->findAll();
    return view('frontend/donors', $data);
}
public function gallery()
{
    $model = new \App\Models\GalleryModel();
    $data['gallery_items'] = $model->where('type', 'photo')
                                   ->where('status', 'active')
                                   ->orderBy('id', 'DESC')
                                   ->findAll();
    return view('frontend/gallery', $data);
}

public function pressMedia()
{
    $model = new \App\Models\GalleryModel();
    $data['media'] = $model->where('type', 'media')
                           ->where('status', 'active')
                           ->orderBy('id', 'DESC')
                           ->findAll();
    return view('frontend/press_media', $data);
}

public function auditReports()
{
    return view('frontend/audit_reports');
}
public function events()
{
    $model = new \App\Models\EventModel();
    $data['events'] = $model->where('status', 'active')->orderBy('event_date', 'ASC')->findAll();
    return view('frontend/events', $data);
}

public function bookSeat($id)
{
    $model = new \App\Models\EventModel();
    $event = $model->find($id);

    if (!$event || $event['status'] !== 'active') {
        return redirect()->to('/events')->with('error', 'Event not found or inactive.');
    }

    $data['event'] = $event;
    return view('frontend/book_seat', $data);
}

public function bookSeatSubmit()
{
    $eventId = $this->request->getPost('event_id');
    $isMember = $this->request->getPost('is_member');
    $memberId = $this->request->getPost('member_id');

    $model = new \App\Models\EventModel();
    $event = $model->find($eventId);

    if (!$event || $event['available_seats'] <= 0) {
        return redirect()->back()->with('error', 'Sorry, no seats available for this event.');
    }

    $bookingModel = new \App\Models\EventBookingModel();
    $data = [
        'event_id'  => $eventId,
        'full_name' => $this->request->getPost('full_name'),
        'mobile'    => $this->request->getPost('mobile'),
        'city'      => $this->request->getPost('city'),
        'is_member' => $isMember,
        'member_id' => $isMember == 'yes' ? $memberId : null,
        'seats'     => 1, // Currently booking 1 seat per submission
        'status'    => 'pending'
    ];

    $bookingModel->insert($data);

    return redirect()->to('/events')->with('success', 'Your seat booking request has been submitted successfully.');
}
public function solutions()
{
    return view('frontend/solutions');
}
public function complain()
{
    return view('frontend/complain_form');
}
public function projects()
{
    return view('frontend/projects');
}
 public function coordinatorLogin()
{
    return view('frontend/coordinator_login');
}
public function coordinatorLoginSubmit()
{
    $email = $this->request->getPost('email');
    $password = $this->request->getPost('password');

    // TODO: Check coordinator credentials
    // if ($email === 'coordinator@example.com' && $password === 'password') {
    //     return redirect()->to('/admin/dashboard');
    // }

    return redirect()->back()->with('error', 'Invalid credentials');
}
public function managerLogin()
{
    return view('frontend/manager_login');
}
public function managerLoginSubmit()
{
    $email = $this->request->getPost('email');
    $password = $this->request->getPost('password');

    // TODO: Check manager credentials
    // if ($email === 'manager@example.com' && $password === 'password') {
    //     return redirect()->to('/admin/dashboard');
    // }

    return redirect()->back()->with('error', 'Invalid credentials');
}
public function contactUs()
{
    return view('frontend/contact_us');
}

public function contactSubmit()
{
    $model = new \App\Models\ContactEnquiryModel();

    $data = [
        'name' => $this->request->getPost('name'),
        'email' => $this->request->getPost('email'),
        'mobile' => $this->request->getPost('mobile'),
        'topic' => $this->request->getPost('topic'),
        'message' => $this->request->getPost('message'),
        'status' => 'new'
    ];

    $model->insert($data);

    return redirect()->back()->with('success', 'Message Sent Successfully. We will contact you soon.');
}
public function terms()
{
    return view('frontend/terms_condition');
}
public function privacy()
{
    return view('frontend/privacy_policy');
}
public function disclaimer()
{
    return view('frontend/disclaimer');
}
public function refund()
{
    return view('frontend/refund_policy');
}

public function saveStudentEnquiry()
{
    $model = new StudentEnquiryModel();

    $model->save([
        'name'       => $this->request->getPost('name'),
        'mobile'     => $this->request->getPost('mobile'),
        'email'      => $this->request->getPost('email'),
        'city'       => $this->request->getPost('city'),
        'course'     => $this->request->getPost('course'),
        'percentage' => $this->request->getPost('percentage'),
        'message'    => $this->request->getPost('message'),
    ]);

    return redirect()->to('/')->with('success', 'Your enquiry submitted successfully.');
}


}

