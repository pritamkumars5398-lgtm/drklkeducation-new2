<?= $this->include('frontend/layout/header'); ?>

<div class="container my-5 text-center">

    <!-- Top Button -->
    <div class="mb-4">
        <button class="btn download-btn">Download ID Card</button>
    </div>

    <!-- Form Box -->
    <div class="idcard-wrapper mx-auto">
        <?php if(session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('id-card-process') ?>" method="POST" target="_blank">

            <!-- Membership ID -->
            <div class="form-group text-start mb-3">
                <label class="form-label">Membership ID :</label>
                <input type="text" name="member_code" class="form-control custom-input" placeholder="User Id" required>
            </div>

            <!-- DOB -->
            <div class="form-group text-start mb-3">
                <label class="form-label">Date Of Birth :</label>
                <input type="date" name="dob" class="form-control custom-input" required>
            </div>

            <!-- Buttons -->
            <div class="row mt-4">
                <div class="col-6 pe-2">
                    <button type="submit" name="action" value="id_card" class="btn btn-blue-custom w-100 d-flex justify-content-center align-items-center py-2 px-1" style="font-size: 12.5px;">
                        ID Card Download
                    </button>
                </div>
                <div class="col-6 ps-2">
                    <button type="submit" name="action" value="appointment_letter" class="btn btn-blue-custom w-100 d-flex justify-content-center align-items-center py-2 px-1" style="font-size: 12.5px;">
                        Appointment Letter
                    </button>
                </div>
            </div>

        </form>

    </div>

</div>

<?= $this->include('frontend/layout/footer'); ?>