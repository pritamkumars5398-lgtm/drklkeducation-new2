<?= $this->include('admin/layout/header'); ?>
<?= $this->include('admin/layout/sidebar'); ?>

<section class="content">
    <div class="container-fluid">
        <div class="card shadow-sm" style="border-radius: 8px;">
            <div class="card-header bg-white" style="border-bottom: 2px solid #f4f4f4; padding: 20px;">
                <h4 class="mb-0" style="color: #333; font-weight: 600;">View Donation: <?= esc($donation['full_name']) ?></h4>
            </div>
            <div class="card-body" style="padding: 30px;">
                <div class="row">
                    <div class="col-md-4 text-center mb-4">
                        <?php $photoPath = (!empty($donation['photo']) && file_exists(FCPATH . $donation['photo'])) ? base_url($donation['photo']) : base_url('imgs/member/member-01.jpg'); ?>
                        <img src="<?= $photoPath ?>" alt="Profile" class="img-fluid rounded" style="max-height: 250px; object-fit: cover; border: 1px solid #ddd;">
                    </div>
                    <div class="col-md-8">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 200px;">Full Name</th>
                                <td><?= esc($donation['full_name']) ?></td>
                            </tr>
                            <tr>
                                <th>Mobile Number</th>
                                <td><?= esc($donation['mobile']) ?></td>
                            </tr>
                            <tr>
                                <th>Email ID</th>
                                <td><?= esc($donation['email']) ?></td>
                            </tr>
                            <tr>
                                <th>PAN Card</th>
                                <td><?= esc($donation['pancard_no']) ?></td>
                            </tr>
                            <tr>
                                <th>Amount</th>
                                <td><strong class="text-success">₹ <?= number_format($donation['amount'], 2) ?></strong></td>
                            </tr>
                            <tr>
                                <th>Payment Mode</th>
                                <td><?= esc($donation['payment_mode']) ?></td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td><?= esc($donation['address']) ?></td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    <?php if($donation['status'] == 'verified'): ?>
                                    <span class="badge bg-green">Verified</span>
                                    <?php elseif($donation['status'] == 'rejected'): ?>
                                    <span class="badge bg-red">Rejected</span>
                                    <?php else: ?>
                                    <span class="badge bg-orange">Pending</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Submission Date</th>
                                <td><?= date('d F Y, h:i A', strtotime($donation['created_at'])) ?></td>
                            </tr>
                        </table>
                        
                        <?php if(!empty($donation['payment_receipt'])): ?>
                            <div class="mt-4">
                                <h5>Payment Receipt</h5>
                                <?php if(file_exists(FCPATH . $donation['payment_receipt'])): ?>
                                    <a href="<?= base_url($donation['payment_receipt']) ?>" target="_blank">
                                        <img src="<?= base_url($donation['payment_receipt']) ?>" style="max-width:300px; border:1px solid #ccc; border-radius:4px;" alt="Receipt">
                                    </a>
                                <?php else: ?>
                                    <p class="text-danger">Receipt file not found on server.</p>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
                
                <div class="mt-4 pt-3 border-top text-right">
                    <a href="<?= base_url('admin/donations') ?>" class="btn btn-secondary px-4 mr-2">Back to List</a>
                    <?php if($donation['status'] == 'pending'): ?>
                        <a href="<?= base_url('admin/donations/approve/'.$donation['id']) ?>" class="btn btn-success px-4 mr-2" onclick="return confirm('Verify and list this donation?');">Verify & Approve</a>
                        <a href="<?= base_url('admin/donations/reject/'.$donation['id']) ?>" class="btn btn-warning px-4" onclick="return confirm('Reject this donation?');">Reject</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->include('admin/layout/footer'); ?>
