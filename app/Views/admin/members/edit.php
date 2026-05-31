<?= $this->include('admin/layout/header'); ?>
<?= $this->include('admin/layout/sidebar'); ?>

<section class="content">
    <div class="container-fluid">
        <div class="card shadow-sm" style="border-radius: 8px;">
            <div class="card-header bg-white" style="border-bottom: 2px solid #f4f4f4; padding: 20px;">
                <h4 class="mb-0" style="color: #333; font-weight: 600;">Edit Member: <?= esc($member['full_name']) ?></h4>
            </div>
            <div class="card-body" style="padding: 30px;">
                <form action="<?= base_url('admin/members/update/'.$member['id']) ?>" method="POST" enctype="multipart/form-data">
                    
                    <h5 class="mb-4" style="color: #666; font-size: 16px; border-bottom: 1px solid #eee; padding-bottom: 10px;">Personal Information</h5>
                    <div class="row mb-4">
                        <div class="col-md-4 mb-3">
                            <label class="form-label" style="font-weight: 500;">Name <span class="text-danger">*</span></label>
                            <input type="text" name="full_name" class="form-control p-2" value="<?= esc($member['full_name']) ?>" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label" style="font-weight: 500;">Father/Husband Name</label>
                            <input type="text" name="father_name" class="form-control p-2" value="<?= esc($member['father_name']) ?>">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label" style="font-weight: 500;">Date of Birth</label>
                            <input type="date" name="dob" class="form-control p-2" value="<?= esc($member['dob']) ?>">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label" style="font-weight: 500;">Gender</label>
                            <select name="gender" class="form-control p-2">
                                <option value="">Select Gender</option>
                                <option value="Male" <?= $member['gender'] == 'Male' ? 'selected' : '' ?>>Male</option>
                                <option value="Female" <?= $member['gender'] == 'Female' ? 'selected' : '' ?>>Female</option>
                                <option value="Other" <?= $member['gender'] == 'Other' ? 'selected' : '' ?>>Other</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label" style="font-weight: 500;">Blood Group</label>
                            <select name="blood_group" class="form-control p-2">
                                <option value="">Select Blood Group</option>
                                <option value="A+" <?= $member['blood_group'] == 'A+' ? 'selected' : '' ?>>A+</option>
                                <option value="A-" <?= $member['blood_group'] == 'A-' ? 'selected' : '' ?>>A-</option>
                                <option value="B+" <?= $member['blood_group'] == 'B+' ? 'selected' : '' ?>>B+</option>
                                <option value="B-" <?= $member['blood_group'] == 'B-' ? 'selected' : '' ?>>B-</option>
                                <option value="O+" <?= $member['blood_group'] == 'O+' ? 'selected' : '' ?>>O+</option>
                                <option value="O-" <?= $member['blood_group'] == 'O-' ? 'selected' : '' ?>>O-</option>
                                <option value="AB+" <?= $member['blood_group'] == 'AB+' ? 'selected' : '' ?>>AB+</option>
                                <option value="AB-" <?= $member['blood_group'] == 'AB-' ? 'selected' : '' ?>>AB-</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label" style="font-weight: 500;">Profession/Occupation</label>
                            <input type="text" name="occupation" class="form-control p-2" value="<?= esc($member['occupation']) ?>">
                        </div>
                    </div>

                    <h5 class="mb-4" style="color: #666; font-size: 16px; border-bottom: 1px solid #eee; padding-bottom: 10px;">Contact Information</h5>
                    <div class="row mb-4">
                        <div class="col-md-4 mb-3">
                            <label class="form-label" style="font-weight: 500;">Mobile No. <span class="text-danger">*</span></label>
                            <input type="text" name="mobile" class="form-control p-2" value="<?= esc($member['mobile']) ?>" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label" style="font-weight: 500;">Email ID</label>
                            <input type="email" name="email" class="form-control p-2" value="<?= esc($member['email']) ?>">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label" style="font-weight: 500;">Aadhar No.</label>
                            <input type="text" name="aadhar_no" class="form-control p-2" value="<?= esc($member['aadhar_no']) ?>">
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label" style="font-weight: 500;">Address</label>
                            <textarea name="address" class="form-control p-2" rows="3"><?= esc($member['address']) ?></textarea>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">City</label>
                            <input type="text" name="city" class="form-control p-2" value="<?= esc($member['city']) ?>">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">District</label>
                            <input type="text" name="district" class="form-control p-2" value="<?= esc($member['district']) ?>">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">State</label>
                            <input type="text" name="state" class="form-control p-2" value="<?= esc($member['state']) ?>">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Pincode</label>
                            <input type="text" name="pincode" class="form-control p-2" value="<?= esc($member['pincode']) ?>">
                        </div>
                    </div>

                    <h5 class="mb-4" style="color: #666; font-size: 16px; border-bottom: 1px solid #eee; padding-bottom: 10px;">Documents</h5>
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" style="font-weight: 500;">Profile Picture</label>
                            <input type="file" name="photo" class="form-control p-2" accept="image/*">
                            <?php if(!empty($member['photo'])): ?>
                                <div class="mt-2 text-muted" style="font-size:12px;">Current: <a href="<?= base_url($member['photo']) ?>" target="_blank">View Photo</a></div>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" style="font-weight: 500;">Other Document</label>
                            <input type="file" name="other_document" class="form-control p-2">
                            <?php if(!empty($member['other_document'])): ?>
                                <div class="mt-2 text-muted" style="font-size:12px;">Current: <a href="<?= base_url($member['other_document']) ?>" target="_blank">View Document</a></div>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" style="font-weight: 500;">Select Your ID Type</label>
                            <select name="id_type" class="form-control p-2">
                                <option value="">Select ID</option>
                                <option value="Aadhar Card" <?= $member['id_type'] == 'Aadhar Card' ? 'selected' : '' ?>>Aadhar Card</option>
                                <option value="Voter ID" <?= $member['id_type'] == 'Voter ID' ? 'selected' : '' ?>>Voter ID</option>
                                <option value="PAN Card" <?= $member['id_type'] == 'PAN Card' ? 'selected' : '' ?>>PAN Card</option>
                                <option value="Driving License" <?= $member['id_type'] == 'Driving License' ? 'selected' : '' ?>>Driving License</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" style="font-weight: 500;">Upload ID Document</label>
                            <input type="file" name="id_document" class="form-control p-2">
                            <?php if(!empty($member['id_document'])): ?>
                                <div class="mt-2 text-muted" style="font-size:12px;">Current: <a href="<?= base_url($member['id_document']) ?>" target="_blank">View Document</a></div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <h5 class="mb-4" style="color: #666; font-size: 16px; border-bottom: 1px solid #eee; padding-bottom: 10px;">Administration</h5>
                    <div class="row mb-4">
                        <div class="col-md-4 mb-3">
                            <label class="form-label" style="font-weight: 500;">Account Status</label>
                            <select name="status" class="form-control p-2" style="border-left: 4px solid #007bff;">
                                <option value="pending" <?= $member['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
                                <option value="approved" <?= $member['status'] == 'approved' ? 'selected' : '' ?>>Approved</option>
                                <option value="rejected" <?= $member['status'] == 'rejected' ? 'selected' : '' ?>>Rejected</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="mt-4 pt-3 border-top text-right">
                        <a href="<?= base_url('admin/members') ?>" class="btn btn-light px-4 mr-2" style="border: 1px solid #ccc;">Cancel</a>
                        <button type="submit" class="btn btn-primary px-5 shadow-sm">Update Member</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->include('admin/layout/footer'); ?>
