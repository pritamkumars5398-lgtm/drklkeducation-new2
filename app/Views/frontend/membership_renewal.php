<?= $this->include('frontend/layout/header'); ?>

<div class="container my-5">

    <div class="renewal-card mx-auto">

        <!-- Header -->
        <div class="renewal-header text-center">
            <h3>Membership Renewal</h3>
            <p>Renew your membership by verifying your details and making payment</p>
        </div>

        <!-- Form -->
        <div class="renewal-body">

            <?php if(session()->getFlashdata('error')): ?>
                <div class="alert alert-danger text-center">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>
            <?php if(session()->getFlashdata('success')): ?>
                <div class="alert alert-success text-center">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <?php if(isset($member)): ?>
                <div class="alert alert-info text-center">
                    Member verified: <strong><?= esc($member['full_name']) ?></strong> (<?= esc($member['member_code']) ?>)
                </div>

                <form action="<?= base_url('membership-renewal-submit') ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="member_id" value="<?= $member['id'] ?>">
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Payment Mode *</label>
                            <select name="payment_mode" class="form-control custom-input" required>
                                <option value="">Select Payment Mode</option>
                                <option value="UPI">UPI / Online</option>
                                <option value="Cash">Cash</option>
                                <option value="Bank Transfer">Bank Transfer</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Payment Receipt / Screenshot *</label>
                            <input type="file" name="payment_receipt" class="form-control custom-input" required>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn verify-btn px-5">Submit Renewal</button>
                    </div>
                </form>

            <?php else: ?>
                <form action="<?= base_url('membership-renewal-process') ?>" method="POST">
                    <div class="row align-items-end">
                        <!-- Membership ID -->
                        <div class="col-md-6 mb-3">
                            <label>Membership ID *</label>
                            <input type="text" name="member_code" class="form-control custom-input" placeholder="e.g. DRLK-001" required>
                        </div>

                        <!-- DOB -->
                        <div class="col-md-6 mb-3">
                            <label>Date of Birth *</label>
                            <input type="date" name="dob" class="form-control custom-input" required>
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="text-center mt-4">
                        <button type="submit" class="btn verify-btn px-5">Verify Membership</button>
                    </div>
                </form>
            <?php endif; ?>

        </div>

    </div>

</div>

<?= $this->include('frontend/layout/footer'); ?>