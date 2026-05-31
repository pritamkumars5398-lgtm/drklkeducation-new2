<?= $this->include('admin/layout/header'); ?>
<?= $this->include('admin/layout/sidebar'); ?>

<section class="content">
    <div class="container-fluid">
        <div class="card shadow-sm" style="border-radius: 8px;">
            <div class="card-header bg-white" style="border-bottom: 2px solid #f4f4f4; padding: 20px;">
                <h4 class="mb-0" style="color: #333; font-weight: 600;">Add New Member</h4>
            </div>
            <div class="card-body" style="padding: 30px;">
                <form action="<?= base_url('admin/members/save') ?>" method="POST" enctype="multipart/form-data">
                    
                    <h5 class="mb-4" style="color: #666; font-size: 16px; border-bottom: 1px solid #eee; padding-bottom: 10px;">Personal Information</h5>
                    <div class="row mb-4">
                        <div class="col-md-4 mb-3">
                            <label class="form-label" style="font-weight: 500;">Name <span class="text-danger">*</span></label>
                            <input type="text" name="full_name" class="form-control p-2" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label" style="font-weight: 500;">Father/Husband Name</label>
                            <input type="text" name="father_name" class="form-control p-2">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label" style="font-weight: 500;">Date of Birth</label>
                            <input type="date" name="dob" class="form-control p-2">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label" style="font-weight: 500;">Gender</label>
                            <select name="gender" class="form-control p-2">
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label" style="font-weight: 500;">Blood Group</label>
                            <select name="blood_group" class="form-control p-2">
                                <option value="">Select Blood Group</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label" style="font-weight: 500;">Profession/Occupation</label>
                            <input type="text" name="occupation" class="form-control p-2">
                        </div>
                    </div>

                    <h5 class="mb-4" style="color: #666; font-size: 16px; border-bottom: 1px solid #eee; padding-bottom: 10px;">Contact Information</h5>
                    <div class="row mb-4">
                        <div class="col-md-4 mb-3">
                            <label class="form-label" style="font-weight: 500;">Mobile No. <span class="text-danger">*</span></label>
                            <input type="text" name="mobile" class="form-control p-2" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label" style="font-weight: 500;">Email ID</label>
                            <input type="email" name="email" class="form-control p-2">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label" style="font-weight: 500;">Aadhar No.</label>
                            <input type="text" name="aadhar_no" class="form-control p-2">
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label" style="font-weight: 500;">Address</label>
                            <textarea name="address" class="form-control p-2" rows="3"></textarea>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">City</label>
                            <input type="text" name="city" class="form-control p-2">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">District</label>
                            <input type="text" name="district" class="form-control p-2">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">State</label>
                            <input type="text" name="state" class="form-control p-2">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Pincode</label>
                            <input type="text" name="pincode" class="form-control p-2">
                        </div>
                    </div>

                    <h5 class="mb-4" style="color: #666; font-size: 16px; border-bottom: 1px solid #eee; padding-bottom: 10px;">Documents</h5>
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" style="font-weight: 500;">Profile Picture</label>
                            <input type="file" name="photo" class="form-control p-2" accept="image/*">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" style="font-weight: 500;">Other Document</label>
                            <input type="file" name="other_document" class="form-control p-2">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" style="font-weight: 500;">Select Your ID Type</label>
                            <select name="id_type" class="form-control p-2">
                                <option value="">Select ID</option>
                                <option value="Aadhar Card">Aadhar Card</option>
                                <option value="Voter ID">Voter ID</option>
                                <option value="PAN Card">PAN Card</option>
                                <option value="Driving License">Driving License</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" style="font-weight: 500;">Upload ID Document</label>
                            <input type="file" name="id_document" class="form-control p-2">
                        </div>
                    </div>

                    <h5 class="mb-4" style="color: #666; font-size: 16px; border-bottom: 1px solid #eee; padding-bottom: 10px;">Administration</h5>
                    <div class="row mb-4">
                        <div class="col-md-4 mb-3">
                            <label class="form-label" style="font-weight: 500;">Account Status</label>
                            <select name="status" class="form-control p-2" style="border-left: 4px solid #007bff;">
                                <option value="pending">Pending</option>
                                <option value="approved">Approved</option>
                                <option value="rejected">Rejected</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="mt-4 pt-3 border-top text-right">
                        <a href="<?= base_url('admin/members') ?>" class="btn btn-light px-4 mr-2" style="border: 1px solid #ccc;">Cancel</a>
                        <button type="submit" class="btn btn-primary px-5 shadow-sm">Save Member</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->include('admin/layout/footer'); ?>
