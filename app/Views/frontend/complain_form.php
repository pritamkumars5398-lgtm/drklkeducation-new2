<?= $this->include('frontend/layout/header'); ?>

<div class="container my-5">

    <div class="complaint-box p-0">

        <!-- Heading -->
        <div class="complaint-header text-center py-4">
            <h3>Complaint or Suggestion</h3>
            <p>Your feedback helps us improve—let us know what's on your mind</p>
        </div>

        <div class="complaint-body p-4 p-md-5">
            <form method="post" enctype="multipart/form-data">
                
                <div class="row align-items-center mb-4">
                    <div class="col-md-2 text-md-end">
                        <label class="fw-bold mb-0">Name<span class="text-danger">*</span> :</label>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <input type="text" class="form-control" placeholder="Full Name">
                    </div>

                    <div class="col-md-2 text-md-end">
                        <label class="fw-bold mb-0">Mobile No.<span class="text-danger">*</span> :</label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Mobile No.">
                    </div>
                </div>

                <div class="row align-items-center mb-4">
                    <div class="col-md-2 text-md-end">
                        <label class="fw-bold mb-0">City<span class="text-danger">*</span> :</label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="City">
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-2 text-md-end pt-2">
                        <label class="fw-bold mb-0">Message<span class="text-danger">*</span> :</label>
                    </div>
                    <div class="col-md-10">
                        <textarea class="form-control" rows="3" placeholder="Write a message...."></textarea>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-2 text-md-end pt-2">
                        <label class="fw-bold mb-0">Description<span class="text-danger">*</span> :</label>
                    </div>
                    <div class="col-md-10">
                        <textarea class="form-control" rows="3" placeholder="Description"></textarea>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-2 text-md-end pt-2">
                        <label class="fw-bold mb-0">Video URL<span class="text-danger">*</span> :</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control" placeholder="Video URL">
                    </div>
                </div>

                <hr class="my-5 border-secondary bg-secondary">

                <!-- Upload Section -->
                <div class="row mb-4">
                    <div class="col-md-6 mb-4 mb-md-0 d-flex justify-content-center justify-content-md-start align-items-center">
                        <label class="fw-bold me-4" style="width: 140px; text-align: right;">Upload Documents<span class="text-danger">*</span> :</label>
                        <div class="upload-container">
                            <input type="file" id="docUpload" class="d-none" accept="image/*" onchange="previewImage(event, 'docPreview', 'docUploadArea')">
                            <label for="docUpload" class="upload-area m-0" id="docUploadArea">
                                <i class="fa fa-cloud-upload" style="font-size: 30px; color: #4e73df;"></i>
                                <span class="d-block mt-2 fw-bold">Upload</span>
                            </label>
                            <div class="preview-area d-none" id="docPreview">
                                <img src="" alt="Preview">
                                <div class="overlay">
                                    <button type="button" class="btn btn-primary btn-sm rounded-circle me-2" onclick="viewImage('docPreview')" style="width:30px;height:30px;padding:0;"><i class="fa fa-eye"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm rounded-circle" onclick="removeImage('docUpload', 'docPreview', 'docUploadArea')" style="width:30px;height:30px;padding:0;"><i class="fa fa-trash"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex justify-content-center justify-content-md-start align-items-center" style="border-left: 2px solid #edafaf;">
                        <label class="fw-bold border-danger me-4" style="width: 140px; text-align: right;">Upload Documents<span class="text-danger">*</span> :</label>
                        <div class="upload-container border-danger">
                            <input type="file" id="imgUpload" class="d-none" accept="image/*" onchange="previewImage(event, 'imgPreview', 'imgUploadArea')">
                            <label for="imgUpload" class="upload-area m-0" id="imgUploadArea">
                                <i class="fa fa-cloud-upload" style="font-size: 30px; color: #4e73df;"></i>
                                <span class="d-block mt-2 fw-bold">Upload</span>
                            </label>
                            <div class="preview-area d-none" id="imgPreview">
                                <img src="" alt="Preview">
                                <div class="overlay">
                                    <button type="button" class="btn btn-primary btn-sm rounded-circle me-2" onclick="viewImage('imgPreview')" style="width:30px;height:30px;padding:0;"><i class="fa fa-eye"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm rounded-circle" onclick="removeImage('imgUpload', 'imgPreview', 'imgUploadArea')" style="width:30px;height:30px;padding:0;"><i class="fa fa-trash"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-5">
                    <button type="submit" class="btn btn-danger px-5 fw-bold" style="background-color: #d10000; border-radius: 5px;">Submit</button>
                </div>

            </form>
        </div>
    </div>
</div>

<!-- Modal for viewing full image -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header border-0">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center p-0">
        <img src="" id="fullImagePreview" class="img-fluid w-100">
      </div>
    </div>
  </div>
</div>

<script>
function previewImage(event, previewId, areaId) {
    const input = event.target;
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById(areaId).classList.add('d-none');
            const previewBox = document.getElementById(previewId);
            previewBox.querySelector('img').src = e.target.result;
            previewBox.classList.remove('d-none');
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function removeImage(inputId, previewId, areaId) {
    document.getElementById(inputId).value = "";
    document.getElementById(previewId).classList.add('d-none');
    document.getElementById(areaId).classList.remove('d-none');
}

function viewImage(previewId) {
    const imgSrc = document.getElementById(previewId).querySelector('img').src;
    document.getElementById('fullImagePreview').src = imgSrc;
    var myModal = new bootstrap.Modal(document.getElementById('imageModal'));
    myModal.show();
}
</script>

<?= $this->include('frontend/layout/footer'); ?>