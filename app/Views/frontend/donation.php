<?= $this->include('frontend/layout/header'); ?>

<style>
/* Scoped overrides to ensure pixel perfect match */
.donation-card {
    max-width: 800px;
    margin: auto;
    border-radius: 8px;
    overflow: hidden;
    background: #fdfdfd;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    border: 1px solid #eaeaea;
}
.donation-header {
    background: #E50914; /* Deep Red */
    color: #fff;
    padding: 25px;
}
.donation-header h3 {
    margin: 0;
    font-weight: 700;
    font-size: 26px;
}
.donation-header p {
    margin: 5px 0 0;
    font-size: 15px;
}
.form-label {
    font-size: 13px;
    font-weight: 600;
    margin-bottom: 5px;
    color: #333;
}
.form-control {
    font-size: 14px;
}
.custom-card-box {
    background: #fdfdfd;
    border: 1px solid #dcdcdc;
    border-left: 4px solid #E50914;
    border-radius: 6px;
}
.upload-btn-wrapper {
    position: relative;
    border: 2px dashed #a3b0cc;
    border-radius: 6px;
    width: 110px;
    background: #fff;
    cursor: pointer;
    transition: 0.3s;
}
.upload-btn-wrapper:hover {
    border-color: #5552D9;
}
.upload-btn-wrapper input[type="file"] {
    opacity: 0;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    cursor: pointer;
    z-index: 10;
}
.amount-btn {
    border: 1px solid #ccc;
    background: #fff;
    color: #333;
    padding: 10px 0;
    border-radius: 6px;
    transition: 0.3s;
    font-weight: 600;
    font-size: 14px;
    flex: 1;
    text-align: center;
}
.amount-btn:hover {
    border-color: #E50914;
    color: #E50914;
}
.amount-btn.active {
    background-color: #E50914 !important;
    border-color: #E50914 !important;
    color: #fff !important;
}
.custom-amount-wrapper {
    position: relative;
}
.custom-amount-wrapper .currency {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    font-weight: bold;
    font-size: 14px;
    color: #555;
}
.qr-container {
    border: 1px solid #dcdcdc;
    padding: 10px;
    border-radius: 8px;
    background: #fff;
    display: inline-block;
}

/* Image Preview Styles */
.image-preview-wrapper {
    position: relative;
    width: 100%;
    height: 100%;
    display: none;
    padding: 2px;
}
.image-preview-wrapper img {
    width: 100%;
    height: 70px;
    object-fit: cover;
    border-radius: 4px;
}
.image-preview-actions {
    position: absolute;
    top: -12px;
    right: -12px;
    display: flex;
    gap: 4px;
    z-index: 20;
}
.img-action-btn {
    width: 24px;
    height: 24px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 12px;
    border: none;
    cursor: pointer;
    box-shadow: 0 2px 4px rgba(0,0,0,0.2);
    text-decoration: none;
}
.img-action-btn:hover {
    color: #fff;
    opacity: 0.8;
}
.btn-view {
    background-color: #5552D9;
}
.btn-delete {
    background-color: #E50914;
}
</style>

<div class="container my-5 py-3">

    <div class="donation-card">

        <!-- Header -->
        <div class="donation-header text-center">
            <h3>Make a Donation</h3>
            <p>Your contribution makes a difference</p>
        </div>

        <div class="donation-body p-4 p-md-5 pt-4">

            <?php if(session()->getFlashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                    <strong>Success!</strong> <?= session()->getFlashdata('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('donation-submit') ?>" method="POST" enctype="multipart/form-data">
                
                <?php if(!empty($selected_campaign)): ?>
                    <div class="alert alert-info border-0 shadow-sm mb-4 d-flex align-items-center" style="background: #f0f7ff; border-left: 4px solid #007bff !important;">
                        <img src="<?= base_url($selected_campaign['image']) ?>" width="60" height="60" class="rounded me-3" style="object-fit: cover;">
                        <div>
                            <h6 class="mb-1 text-dark fw-bold">Donating to: <?= esc($selected_campaign['title']) ?></h6>
                            <p class="mb-0 small text-muted">Your contribution will directly support this initiative.</p>
                        </div>
                        <input type="hidden" name="campaign_id" value="<?= $selected_campaign['id'] ?>">
                    </div>
                <?php elseif(!empty($campaigns)): ?>
                    <div class="mb-4">
                        <label class="form-label">Select Campaign (Optional):</label>
                        <select name="campaign_id" class="form-control">
                            <option value="">General Donation</option>
                            <?php foreach($campaigns as $camp): ?>
                                <option value="<?= $camp['id'] ?>"><?= esc($camp['title']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                <?php endif; ?>

                <!-- Row 1 -->
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Full Name<span class="text-danger">*</span>:</label>
                        <input type="text" name="full_name" class="form-control" placeholder="Full Name" required>
                    </div>

                    <div class="col-md-6 mb-4">
                        <label class="form-label">Mobile No.<span class="text-danger">*</span>:</label>
                        <input type="text" name="mobile" class="form-control" placeholder="Mobile Number" required>
                    </div>
                </div>

                <!-- Row 2 -->
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Email (optional):</label>
                        <input type="email" name="email" class="form-control" placeholder="Email">
                    </div>

                    <div class="col-md-6 mb-4">
                        <label class="form-label">PAN Card No. (optional):</label>
                        <input type="text" name="pancard_no" class="form-control" placeholder="Pancard Number">
                    </div>
                </div>

                <!-- Address -->
                <div class="mb-4">
                    <label class="form-label">Address<span class="text-danger">*</span>:</label>
                    <textarea class="form-control" name="address" rows="3" placeholder="Address" required></textarea>
                </div>

                <!-- Photo Upload -->
                <div class="custom-card-box mt-2 mb-4 p-3 d-flex align-items-center justify-content-between">
                    <span class="fw-semibold" style="font-size: 14px;">Your Photo (optional)</span>
                    <div class="upload-btn-wrapper p-2 d-flex flex-column justify-content-center">
                        <div id="photoPlaceholder">
                            <i class="bi bi-cloud-arrow-up-fill fs-3 text-primary" style="color: #4b6cb7 !important;"></i>
                            <div class="mt-1 fw-bold" style="font-size: 13px; color: #444;">Upload</div>
                        </div>
                        
                        <input type="file" id="photoInput" name="photo" accept="image/*" onchange="previewImage(this, 'photoPreview', 'photoPlaceholder')">
                        
                        <!-- Preview -->
                        <div class="image-preview-wrapper" id="photoPreview">
                            <img src="" id="photoPreviewImg" alt="Preview">
                            <div class="image-preview-actions">
                                <a href="#" id="photoViewLink" class="img-action-btn btn-view image-popup-vertical-fit"><i class="bi bi-eye-fill"></i></a>
                                <button type="button" class="img-action-btn btn-delete" onclick="deleteImage('photoInput', 'photoPreview', 'photoPlaceholder', event)"><i class="bi bi-trash-fill"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Amount -->
                <div class="mb-4 mt-2">
                    <label class="form-label">Donation Amount <span class="text-danger">*</span>:</label>
                    <div class="d-flex gap-2 mb-3 mt-1 flex-wrap">
                        <button type="button" class="amount-btn">₹100</button>
                        <button type="button" class="amount-btn">₹500</button>
                        <button type="button" class="amount-btn">₹1,000</button>
                        <button type="button" class="amount-btn">₹2,000</button>
                        <button type="button" class="amount-btn">₹5,000</button>
                    </div>

                    <div class="custom-amount-wrapper">
                        <input type="number" id="customAmount" name="amount" class="form-control p-2 ps-3" placeholder="Enter custom amount" required>
                        <span class="currency">INR</span>
                    </div>
                </div>

                <!-- Payment Section -->
                <div class="custom-card-box mb-4 p-4 p-md-5 d-flex flex-wrap align-items-center justify-content-between bg-light mt-5">

                    <div class="col-md-6 mb-4 mb-md-0">
                        <h4 class="text-danger fw-bold mb-3" style="font-size:20px;">Payment Information</h4>
                        <div style="font-size: 13px; font-weight: 600; color: #333; line-height: 1.8;">
                            Bank Detail -<br>
                            Axis Bank<br>
                            A/C No.- 925020020210298<br>
                            IFSC Code - UTIB0003635
                        </div>
                    </div>

                    <div class="col-md-6 text-center text-md-end d-flex flex-column align-items-center align-items-md-end">
                        <div class="qr-container bg-white shadow-sm">
                            <img src="<?= base_url('imgs/qr-code-payment-crop.jpeg') ?>" width="150" alt="QR Code">
                            <div class="mt-1" style="font-size: 9px; font-weight: bold; overflow-wrap: break-word;">UPI: 9302drlk@idfcbank</div>
                        </div>
                        <a href="<?= base_url('imgs/qr-code-payment-crop.jpeg') ?>"
   download="DRLK-UPI-QR-Code.jpeg"
   class=""
   style=""><button type="button" class="btn btn-primary mt-3 fw-semibold px-4 py-2" style="background-color: #6366f1; border-color: #6366f1; border-radius: 8px; font-size: 13px;">
                            <i class="bi bi-download me-1"></i> Download QR Code
                        </button></a>
                    </div>

                </div>

                <!-- Receipt Upload -->
                <div class="custom-card-box mt-2 mb-4 p-3 d-flex align-items-center justify-content-between">
                    <span class="fw-semibold" style="font-size: 14px;">Payment Receipt Upload</span>
                    <div class="upload-btn-wrapper p-2 d-flex flex-column justify-content-center">
                        <div id="receiptPlaceholder">
                            <i class="bi bi-cloud-arrow-up-fill fs-3 text-primary" style="color: #4b6cb7 !important;"></i>
                            <div class="mt-1 fw-bold" style="font-size: 13px; color: #444;">Upload</div>
                        </div>
                        
                        <input type="file" id="receiptInput" name="payment_receipt" accept="image/*" onchange="previewImage(this, 'receiptPreview', 'receiptPlaceholder')">
                        
                        <!-- Preview -->
                        <div class="image-preview-wrapper" id="receiptPreview">
                            <img src="" id="receiptPreviewImg" alt="Preview">
                            <div class="image-preview-actions">
                                <a href="#" id="receiptViewLink" class="img-action-btn btn-view image-popup-vertical-fit"><i class="bi bi-eye-fill"></i></a>
                                <button type="button" class="img-action-btn btn-delete" onclick="deleteImage('receiptInput', 'receiptPreview', 'receiptPlaceholder', event)"><i class="bi bi-trash-fill"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="text-center mt-5 mb-2">
                    <button type="submit" class="btn text-white px-5 py-2 fw-bold" style="background: #E50914; border-radius: 6px; font-size: 15px; letter-spacing: 0.5px;">
                        <i class="bi bi-suit-heart-fill me-1"></i> DONATE NOW
                    </button>
                </div>

            </form>

        </div>

    </div>

</div>

<script>
// Amount Selection Logic
document.addEventListener('DOMContentLoaded', function() {
    const amountBtns = document.querySelectorAll('.amount-btn');
    const customAmountInput = document.getElementById('customAmount');

    amountBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            // Remove active style from all amount buttons
            amountBtns.forEach(b => b.classList.remove('active'));
            
            // Add active style to the clicked button
            this.classList.add('active');
            
            // Extract the numerical value
            let val = this.innerText.replace('₹', '').replace(/,/g, '');
            customAmountInput.value = val;
        });
    });

    customAmountInput.addEventListener('input', function() {
        // Remove active class if custom amount is manually typed
        amountBtns.forEach(b => b.classList.remove('active'));
    });
});

// Image Preview Logic
function previewImage(input, previewId, placeholderId) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            // Hide placeholder, show preview
            document.getElementById(placeholderId).style.display = 'none';
            document.getElementById(previewId).style.display = 'block';
            
            // Set image sources
            document.getElementById(previewId + 'Img').src = e.target.result;
            
            let viewLink = document.getElementById(previewId.replace('Preview', 'ViewLink'));
            if(viewLink) {
                viewLink.href = e.target.result;
            }
        }
        
        reader.readAsDataURL(input.files[0]);
    }
}

function deleteImage(inputId, previewId, placeholderId, event) {
    event.preventDefault();
    event.stopPropagation(); // prevent opening file browser again
    
    // Clear input
    document.getElementById(inputId).value = "";
    
    // Hide preview, show placeholder
    document.getElementById(previewId).style.display = 'none';
    document.getElementById(placeholderId).style.display = 'block';
    
    // Clear image sources
    document.getElementById(previewId + 'Img').src = "";
}
</script>

<?= $this->include('frontend/layout/footer'); ?>