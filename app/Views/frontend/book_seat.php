<?= $this->include('frontend/layout/header'); ?>

<div class="container my-5">

    <div class="text-center mb-4">
        <button class="btn title-btn events-title-btn rounded-pill px-4 py-2" style="font-weight: 500;">Book Seat</button>
    </div>
    
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0" style="border-radius: 10px; background-color: #f8f9fa;">
                <div class="card-body p-5">
                    
                    <h5 class="text-center text-primary mb-4"><?= esc($event['title']) ?></h5>

                    <?php if(session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                    <?php endif; ?>

                    <form action="<?= base_url('book-seat-submit') ?>" method="POST">
                        <input type="hidden" name="event_id" value="<?= esc($event['id']) ?>">
                        
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Full Name:</label>
                                <input type="text" name="full_name" class="form-control" placeholder="Full Name" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Mobile:</label>
                                <input type="text" name="mobile" class="form-control" placeholder="Mobile Number" required>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">City:</label>
                                <input type="text" name="city" class="form-control" placeholder="City" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">If you are in our team:</label>
                                <div class="mt-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="is_member" id="member_yes" value="yes" onchange="toggleMemberId(this)">
                                        <label class="form-check-label" for="member_yes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="is_member" id="member_no" value="no" checked onchange="toggleMemberId(this)">
                                        <label class="form-check-label" for="member_no">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4" id="id_number_row" style="display: none;">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">ID Number:</label>
                                <input type="text" name="member_id" id="member_id_input" class="form-control" placeholder="ID Number">
                            </div>
                        </div>

                        <div class="text-center mt-5">
                            <button type="submit" class="btn btn-warning px-5 py-2 fw-bold text-white" style="background-color: #ff5722; border: none; border-radius: 5px;">SUBMIT</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>

<script>
    function toggleMemberId(radio) {
        var row = document.getElementById('id_number_row');
        var input = document.getElementById('member_id_input');
        if (radio.value === 'yes') {
            row.style.display = 'flex';
            input.setAttribute('required', 'required');
        } else {
            row.style.display = 'none';
            input.removeAttribute('required');
            input.value = '';
        }
    }
</script>

<?= $this->include('frontend/layout/footer'); ?>
