<?= $this->include('frontend/layout/header'); ?>

<style>
    .form-label-custom {
        font-weight: 600;
        font-size: 14px;
        color: #333;
    }
    .upload-box {
        background-color: #f8f9fa;
        border-radius: 8px;
        border: 1px solid #eef0f3;
        border-left: 3px solid #dc3545;
        padding: 20px 30px;
    }
    .upload-dashed {
        border: 2px dashed #b3c2d6;
        background-color: #fff;
        border-radius: 8px;
        padding: 15px 25px;
        text-align: center;
        color: #0d6efd;
        font-weight: 600;
        cursor: pointer;
        position: relative;
        overflow: visible; /* so action buttons can overflow slightly if needed */
        transition: all 0.3s ease;
        min-width: 120px;
        min-height: 100px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .upload-dashed:hover {
        border-color: #0d6efd;
        background-color: #f8faff;
    }
    .upload-dashed input[type=file] {
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
        height: 100%;
        width: 100%;
        cursor: pointer;
        z-index: 5;
    }
    .upload-content {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .upload-dashed i.fa-cloud-upload {
        font-size: 24px;
        display: block;
        margin-bottom: 5px;
        color: #0d6efd;
    }
    .preview-container {
        display: none;
        position: relative;
        width: 100%;
        height: 100%;
    }
    .preview-img {
        max-width: 100%;
        max-height: 80px;
        border-radius: 4px;
        object-fit: cover;
    }
    .action-buttons {
        position: absolute;
        top: -25px;
        right: -15px;
        display: flex;
        gap: 5px;
        z-index: 10;
    }
    .action-btn {
        width: 28px;
        height: 28px;
        border-radius: 50%;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 12px;
        border: none;
        box-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }
    .btn-view {
        background-color: #4169E1;
    }
    .btn-delete {
        background-color: #ff4d4d;
    }

    .form-control {
        border: 1px solid #ced4da;
        border-radius: 4px;
        color: #555;
    }
    .card-header-custom {
        background-color: #e60000;
        color: #fff;
    }
    .btn-pay {
        background-color: #d10000;
        color: #fff;
        font-weight: bold;
        border-radius: 6px;
        padding: 8px 45px;
        font-size: 18px;
        border: none;
    }
    .btn-pay:hover {
        background-color: #a30000;
        color: #fff;
    }
    .form-section-divider {
        border-top: 1px solid #dee2e6;
        margin: 30px 0;
    }
</style>

<div class="container my-5">
    <div class="card shadow border-0" style="border-radius: 10px; overflow: hidden;">
        <div class="card-header card-header-custom text-center py-4 border-0">
            <h2 class="mb-1 fw-bold text-white">Join Us</h2>
            <p class="mb-0 text-white" style="font-size: 15px;">Submit your application to be part of our team</p>
        </div>

        <div class="card-body p-4 p-md-5">
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('error') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('member-apply-submit') ?>" method="POST" enctype="multipart/form-data">
                <!-- Row 1 -->
                <div class="row align-items-center mb-4">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <div class="row align-items-center">
                            <div class="col-sm-4 text-sm-start">
                                <label class="form-label form-label-custom mb-0">Name <span class="text-danger">*</span> :</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="full_name" class="form-control" placeholder="Name" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3 mb-md-0">
                        <div class="row align-items-center">
                            <div class="col-sm-4 text-sm-start">
                                <label class="form-label form-label-custom mb-0">Gender <span class="text-danger">*</span> :</label>
                            </div>
                            <div class="col-sm-8">
                                <select name="gender" class="form-control" required>
                                    <option value="">Select</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Row 2 -->
                <div class="row align-items-center mb-4">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <div class="row align-items-center">
                            <div class="col-sm-4 text-sm-start">
                                <label class="form-label form-label-custom mb-0">Date of Birth <span class="text-danger">*</span> :</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="date" name="dob" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3 mb-md-0">
                        <div class="row align-items-center">
                            <div class="col-sm-4 pe-sm-1 mb-2 mb-sm-0">
                                <select name="guardian_relation" class="form-control">
                                    <option value="S/O">S/O</option>
                                    <option value="D/O">D/O</option>
                                    <option value="W/O">W/O</option>
                                </select>
                            </div>
                            <div class="col-sm-8 ps-sm-1">
                                <input type="text" name="guardian_name" class="form-control" placeholder="Son of">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Row 3 -->
                <div class="row align-items-center mb-4">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <div class="row align-items-center">
                            <div class="col-sm-4 text-sm-start">
                                <label class="form-label form-label-custom mb-0">Profession :</label>
                            </div>
                            <div class="col-sm-8">
                                <select class="form-control" name="occupation">
                                    <option value="">Select Profession</option>
                                    <option value="Government Job">Government Job</option>
                                    <option value="Private Job">Private Job</option>
                                    <option value="Police">Police</option>
                                    <option value="Army">Army</option>
                                    <option value="Farmer">Farmer</option>
                                    <option value="Self Business">Self Business</option>
                                    <option value="Student">Student</option>
                                    <option value="House Wife">House Wife</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3 mb-md-0">
                        <div class="row align-items-center">
                            <div class="col-sm-4 text-sm-start">
                                <label class="form-label form-label-custom mb-0">Blood Group <span class="text-danger">*</span> :</label>
                            </div>
                            <div class="col-sm-8">
                                <select class="form-control" name="blood_group" required>
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
                        </div>
                    </div>
                </div>

                <!-- Row 4 -->
                <div class="row align-items-center mb-4">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <div class="row align-items-center">
                            <div class="col-sm-4 text-sm-start">
                                <label class="form-label form-label-custom mb-0">State <span class="text-danger">*</span> :</label>
                            </div>
                            <div class="col-sm-8">
                                <select id="state" name="state" class="form-control" onchange="print_city('district', this.selectedIndex);" required>
                                    <option value="">Select State</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3 mb-md-0">
                        <div class="row align-items-center">
                            <div class="col-sm-4 text-sm-start">
                                <label class="form-label form-label-custom mb-0">District <span class="text-danger">*</span> :</label>
                            </div>
                            <div class="col-sm-8">
                                <select id="district" name="district" class="form-control" required>
                                    <option value="">Select District</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Row 5 -->
                <div class="row align-items-center mb-4">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <div class="row align-items-center">
                            <div class="col-sm-4 text-sm-start">
                                <label class="form-label form-label-custom mb-0">Mobile No. <span class="text-danger">*</span> :</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="mobile" class="form-control" placeholder="Mobile Number" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3 mb-md-0">
                        <div class="row align-items-center">
                            <div class="col-sm-4 text-sm-start">
                                <label class="form-label form-label-custom mb-0">Aadhar No. <span class="text-danger">*</span> :</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="aadhar_no" class="form-control" placeholder="Aadhar No." required>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Address -->
                <div class="row align-items-start mb-4">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-2 text-md-start">
                                <label class="form-label form-label-custom mt-md-2 mb-0">Address <span class="text-danger">*</span> :</label>
                            </div>
                            <div class="col-md-10">
                                <textarea name="address" class="form-control" rows="3" placeholder="Address" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Row 6 -->
                <div class="row align-items-center mb-2">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <div class="row align-items-center">
                            <div class="col-sm-4 text-sm-start">
                                <label class="form-label form-label-custom mb-0">Pin Code <span class="text-danger">*</span> :</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="pincode" class="form-control" placeholder="Pincode" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3 mb-md-0">
                        <div class="row align-items-center">
                            <div class="col-sm-4 text-sm-start">
                                <label class="form-label form-label-custom mb-0">Email :</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="email" name="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="form-section-divider"></div>

                <!-- Upload Section -->
                <div class="row mt-4 mb-2">
                    <!-- Profile Picture -->
                    <div class="col-md-6 mb-4">
                        <div class="upload-box d-flex justify-content-between align-items-center h-100">
                            <label class="form-label-custom mb-0">Profile Picture:</label>
                            <div class="upload-dashed">
                                <input type="file" name="photo" class="file-input" accept="image/*" onchange="previewFile(this)">
                                <div class="upload-content">
                                    <i class="fa fa-cloud-upload" aria-hidden="true"></i>
                                    <span>Upload</span>
                                </div>
                                <div class="preview-container">
                                    <img class="preview-img" src="" alt="Preview">
                                    <div class="action-buttons">
                                        <button type="button" class="action-btn btn-view" onclick="viewFile(this, event)"><i class="fa fa-eye"></i></button>
                                        <button type="button" class="action-btn btn-delete" onclick="deleteFile(this, event)"><i class="fa fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ID Proof -->
                    <div class="col-md-6 mb-4">
                        <div class="upload-box d-flex justify-content-between align-items-center h-100">
                            <select name="id_type" class="form-control w-auto" style="min-width: 140px; border-color: #ced4da;">
                                <option value="">Select Your ID</option>
                                <option value="Aadhar Card">Aadhar Card</option>
                                <option value="PAN Card">PAN Card</option>
                                <option value="Voter Card">Voter Card</option>
                                <option value="Driving Licence">Driving Licence</option>
                                <option value="Rashan Card">Rashan Card</option>
                                <option value="Class 10th Marksheet">Class 10th Marksheet</option>
                            </select>
                            <div class="upload-dashed">
                                <input type="file" name="id_document" class="file-input" accept="image/*" onchange="previewFile(this)">
                                <div class="upload-content">
                                    <i class="fa fa-cloud-upload" aria-hidden="true"></i>
                                    <span>Upload</span>
                                </div>
                                <div class="preview-container">
                                    <img class="preview-img" src="" alt="Preview">
                                    <div class="action-buttons">
                                        <button type="button" class="action-btn btn-view" onclick="viewFile(this, event)"><i class="fa fa-eye"></i></button>
                                        <button type="button" class="action-btn btn-delete" onclick="deleteFile(this, event)"><i class="fa fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Other Document -->
                    <div class="col-md-6 mb-4">
                        <div class="upload-box d-flex justify-content-between align-items-center h-100">
                            <label class="form-label-custom mb-0">Other Document:</label>
                            <div class="upload-dashed">
                                <input type="file" name="other_document" class="file-input" accept="image/*" onchange="previewFile(this)">
                                <div class="upload-content">
                                    <i class="fa fa-cloud-upload" aria-hidden="true"></i>
                                    <span>Upload</span>
                                </div>
                                <div class="preview-container">
                                    <img class="preview-img" src="" alt="Preview">
                                    <div class="action-buttons">
                                        <button type="button" class="action-btn btn-view" onclick="viewFile(this, event)"><i class="fa fa-eye"></i></button>
                                        <button type="button" class="action-btn btn-delete" onclick="deleteFile(this, event)"><i class="fa fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-section-divider col-md-12"></div>

                <!-- Initial Pay Button -->
                <div class="text-center mt-4 mb-2" id="payButtonContainer">
                    <button type="button" class="btn btn-pay" onclick="showPaymentSection()">Pay</button>
                </div>

                <!-- Payment Section (Initially Hidden) -->
                <div id="paymentSection" style="display: none;">
                    
                    <!-- Bank Details & QR -->
                    <div class="p-4 mb-4 mt-2" style="background-color: #f1f3f8; border-radius: 12px;">
                        <div class="row">
                            <div class="col-md-7 mb-3 mb-md-0">
                                <div class="card border-0 h-100" style="border-radius: 8px;">
                                    <div class="card-body p-4">
                                        <h5 class="fw-bold mb-4" style="color: #444;">Membership Details</h5>
                                        <div class="p-3 bg-light" style="border-left: 4px solid #dc3545; border-radius: 4px;">
                                            <h5 class="text-danger fw-bold mb-3">Payment Information</h5>
                                            <p class="mb-1 fw-bold text-dark" style="font-size: 14px;">Bank Detail -</p>
                                            <p class="mb-1 fw-bold text-dark" style="font-size: 14px;">BANDHAN BANK</p>
                                            <p class="mb-1 fw-bold text-dark" style="font-size: 14px;">A/C No.- 10220016240591</p>
                                            <p class="mb-0 fw-bold text-dark" style="font-size: 14px;">IFSC Code - BDBL0001545</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="card border-0 h-100 text-center" style="border-radius: 8px;">
                                    <div class="card-body p-4 d-flex flex-column justify-content-center align-items-center">
                                        <div style="border: 2px solid #eee; border-radius: 12px; padding: 10px; display: inline-block;">
                                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=upi://pay?pa=getepay.mbandhan85014@bandhan&pn=KDS%20Seva%20Samiti" alt="QR Code" style="max-width: 130px;">
                                            <p class="mt-2 text-dark fw-bold mb-0" style="font-size: 11px;">VPA: Getepay.mbandhan85014</p>
                                        </div>
                                        <a href="https://api.qrserver.com/v1/create-qr-code/?size=500x500&data=upi://pay?pa=getepay.mbandhan85014@bandhan&pn=KDS%20Seva%20Samiti" download="kds_qr_code.png" target="_blank" class="btn text-white w-100 mt-3" style="background: linear-gradient(90deg, #6b62d3, #817ae0); border-radius: 20px; font-weight: 600; padding: 10px;">
                                            <i class="fa fa-download me-2"></i> Download QR Code
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Mode & Upload Receipt -->
                    <div class="row mt-4 mb-2">
                        <div class="col-md-6 mb-4 mb-md-0">
                            <div class="upload-box d-flex justify-content-between align-items-center h-100" style="padding: 15px 25px;">
                                <label class="form-label-custom mb-0">Payment Mode <span class="text-danger">*</span> :</label>
                                <select class="form-control w-50" name="payment_mode" id="payment_mode" required>
                                    <option hidden="" selected="" value="">Payment Mode</option>
                                    <option value="Bank Transfer Slip">Bank Transfer Slip</option>
                                    <option value="Paytm">Paytm</option>
                                    <option value="Google Pay">Google Pay</option>
                                    <option value="Phonepe">Phonepe</option>
                                    <option value="Amazon Pay">Amazon Pay</option>
                                    <option value="Cheque">Cheque</option>
                                    <option value="Cash">Cash</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4 mb-md-0">
                            <div class="upload-box d-flex justify-content-between align-items-center h-100" style="padding: 15px 25px;">
                                <label class="form-label-custom mb-0">Payment Receipt Upload:</label>
                                <div class="upload-dashed" style="min-width: 100px; min-height: 80px; padding: 10px 15px;">
                                    <input type="file" class="file-input" name="payment_receipt" accept="image/*" onchange="previewFile(this)">
                                    <div class="upload-content">
                                        <i class="fa fa-cloud-upload" aria-hidden="true" style="font-size: 20px;"></i>
                                        <span style="font-size: 14px;">Upload</span>
                                    </div>
                                    <div class="preview-container">
                                        <img class="preview-img" src="" alt="Preview">
                                        <div class="action-buttons">
                                            <button type="button" class="action-btn btn-view" onclick="viewFile(this, event)"><i class="fa fa-eye"></i></button>
                                            <button type="button" class="action-btn btn-delete" onclick="deleteFile(this, event)"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-section-divider col-md-12"></div>

                    <div class="text-center mt-4 mb-2">
                        <button type="submit" class="btn btn-pay px-5">Submit</button>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>

<script>
function previewFile(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        var uploadBox = input.closest('.upload-dashed');
        var uploadContent = uploadBox.querySelector('.upload-content');
        var previewContainer = uploadBox.querySelector('.preview-container');
        var previewImg = uploadBox.querySelector('.preview-img');

        reader.onload = function(e) {
            previewImg.src = e.target.result;
            uploadContent.style.display = 'none';
            previewContainer.style.display = 'block';
            input.style.display = 'none'; // hide file input to not intercept clicks when previewed
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function deleteFile(btn, event) {
    event.stopPropagation();
    event.preventDefault();

    var uploadBox = btn.closest('.upload-dashed');
    var input = uploadBox.querySelector('.file-input');
    var uploadContent = uploadBox.querySelector('.upload-content');
    var previewContainer = uploadBox.querySelector('.preview-container');
    var previewImg = uploadBox.querySelector('.preview-img');

    // Reset
    input.value = '';
    previewImg.src = '';
    uploadContent.style.display = 'flex';
    previewContainer.style.display = 'none';
    input.style.display = 'block';
}

function viewFile(btn, event) {
    event.stopPropagation();
    event.preventDefault();

    var uploadBox = btn.closest('.upload-dashed');
    var previewImg = uploadBox.querySelector('.preview-img');
    
    // Open image in new window/tab for easy viewing
    var image = new Image();
    image.src = previewImg.src;
    var w = window.open("");
    if (w) {
        w.document.write(`
            <html>
                <head><title>Image Preview</title></head>
                <body style="margin: 0; display: flex; justify-content: center; align-items: center; background-color: #333; height: 100vh;">
                    <img src="${image.src}" style="max-width: 100%; max-height: 100vh; object-fit: contain;">
                </body>
            </html>
        `);
        w.document.close();
    }
}
</script>

<script src="https://kdssevasamiti.in/js/cities.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        if(typeof print_state === 'function'){
            print_state("state");
        }
    });

    function showPaymentSection() {
        document.getElementById('payButtonContainer').style.display = 'none';
        document.getElementById('paymentSection').style.display = 'block';
    }
</script>

<?= $this->include('frontend/layout/footer'); ?>