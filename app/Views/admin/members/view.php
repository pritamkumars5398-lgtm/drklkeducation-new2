<?= $this->include('admin/layout/header'); ?>
<?= $this->include('admin/layout/sidebar'); ?>

<section class="content">
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Member Details: <?= esc($member['full_name']) ?></h4>
                <a href="<?= base_url('admin/members') ?>" class="btn btn-secondary btn-sm">Back</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Profile Details -->
                    <div class="col-md-8">
                        <table class="table table-bordered">
                            <tbody>
                                <tr><th width="30%">Name</th><td><?= esc($member['full_name']) ?></td></tr>
                                <tr><th>Father/Husband Name</th><td><?= esc($member['father_name']) ?></td></tr>
                                <tr><th>Mobile</th><td><?= esc($member['mobile']) ?></td></tr>
                                <tr><th>Email</th><td><?= esc($member['email']) ?></td></tr>
                                <tr><th>Date of Birth</th><td><?= esc($member['dob']) ?></td></tr>
                                <tr><th>Gender</th><td><?= esc($member['gender']) ?></td></tr>
                                <tr><th>Blood Group</th><td><?= esc($member['blood_group']) ?></td></tr>
                                <tr><th>Occupation</th><td><?= esc($member['occupation']) ?></td></tr>
                                <tr><th>Aadhar No.</th><td><?= esc($member['aadhar_no']) ?></td></tr>
                                <tr><th>Address</th><td><?= esc($member['address']) ?></td></tr>
                                <tr><th>City</th><td><?= esc($member['city']) ?></td></tr>
                                <tr><th>State</th><td><?= esc($member['state']) ?></td></tr>
                                <tr><th>District</th><td><?= esc($member['district']) ?></td></tr>
                                <tr><th>Pincode</th><td><?= esc($member['pincode']) ?></td></tr>
                                <tr><th>Status</th>
                                    <td>
                                        <?php if($member['status']=='approved'): ?>
                                            <span class="badge bg-green">Approved</span>
                                        <?php elseif($member['status']=='rejected'): ?>
                                            <span class="badge bg-red">Rejected</span>
                                        <?php else: ?>
                                            <span class="badge bg-orange">Pending</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr><th>Applied On</th><td><?= date('d M Y h:i A', strtotime($member['created_at'])) ?></td></tr>
                            </tbody>
                        </table>
                        
                        <h5 class="mt-4 border-bottom pb-2">Payment Details</h5>
                        <table class="table table-bordered">
                            <tbody>
                                <tr><th width="30%">Payment Mode</th><td><?= esc($member['payment_mode']) ?></td></tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Documents -->
                    <div class="col-md-4">
                        <div class="mb-4 text-center">
                            <h6>Profile Photo</h6>
                            <?php if(!empty($member['photo'])): ?>
                                <img src="<?= base_url($member['photo']) ?>" class="img-thumbnail" style="max-width: 100%; height: auto;">
                            <?php else: ?>
                                <div class="p-3 border text-muted">No Photo Available</div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-4 text-center">
                            <h6>ID Proof (<?= esc($member['id_type']) ?>)</h6>
                            <?php if(!empty($member['id_document'])): ?>
                                <a href="<?= base_url($member['id_document']) ?>" target="_blank">
                                    <img src="<?= base_url($member['id_document']) ?>" class="img-thumbnail" style="max-height: 200px;">
                                </a>
                                <div class="mt-1"><a href="<?= base_url($member['id_document']) ?>" class="btn btn-sm btn-info" target="_blank">View Document</a></div>
                            <?php else: ?>
                                <div class="p-3 border text-muted">No ID Proof Available</div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-4 text-center">
                            <h6>Other Document</h6>
                            <?php if(!empty($member['other_document'])): ?>
                                <a href="<?= base_url($member['other_document']) ?>" target="_blank">
                                    <img src="<?= base_url($member['other_document']) ?>" class="img-thumbnail" style="max-height: 200px;">
                                </a>
                                <div class="mt-1"><a href="<?= base_url($member['other_document']) ?>" class="btn btn-sm btn-info" target="_blank">View Document</a></div>
                            <?php else: ?>
                                <div class="p-3 border text-muted">No Other Document</div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-4 text-center">
                            <h6>Payment Receipt</h6>
                            <?php if(!empty($member['payment_receipt'])): ?>
                                <a href="<?= base_url($member['payment_receipt']) ?>" target="_blank">
                                    <img src="<?= base_url($member['payment_receipt']) ?>" class="img-thumbnail" style="max-height: 200px;">
                                </a>
                                <div class="mt-1"><a href="<?= base_url($member['payment_receipt']) ?>" class="btn btn-sm btn-info" target="_blank">View Receipt</a></div>
                            <?php else: ?>
                                <div class="p-3 border text-muted">No Payment Receipt</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->include('admin/layout/footer'); ?>
