<?= view('frontend/layout/header') ?>

<style>
.contact-section {
    padding: 50px 0;
    background: #f4f8fb;
}

.contact-card {
    background: #fff;
    border-radius: 5px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08); /* slight shadow to match card */
    overflow: hidden;
}

.contact-title-box {
    text-align: center;
    background: #dd0d0d;
    color: #fff;
    padding: 25px 20px;
}

.contact-title-box h3 {
    margin: 0;
    font-weight: 700;
    font-size: 32px;
    color: #fff;
}
.contact-title-box p {
    margin: 5px 0 0;
    font-size: 16px;
    color: #fff;
}

.contact-form-body {
    padding: 40px;
}

.form-label-custom {
    font-weight: 700;
    color: #333;
    font-size: 14px;
}

.form-control {
    border-radius: 4px;
    border: 1px solid #ced4da;
    height: 45px;
}

.btn-send {
    background: #dd0d0d;
    color: #fff;
    font-weight: 600;
    padding: 10px 45px;
    border: none;
    border-radius: 5px;
    font-size: 18px;
    transition: 0.3s;
}

.btn-send:hover {
    background: #b30000;
    color: #fff;
}
</style>

<section class="contact-section">
    <div class="container">
        
        <div class="row justify-content-center">
            <div class="col-lg-11">
                <div class="contact-card">
                    <div class="contact-title-box">
                        <h3>Contact Us</h3>
                        <p>We're here to help—reach out anytime</p>
                    </div>

                    <div class="contact-form-body">
                        <?php if(session()->getFlashdata('success')): ?>
                            <div class="alert alert-success">
                                <?= session()->getFlashdata('success') ?>
                            </div>
                        <?php endif; ?>

                        <form method="post" action="<?= base_url('contact-submit') ?>">

                            <div class="row mb-4 align-items-center">
                                <div class="col-md-2">
                                    <label class="form-label-custom">Name<span class="text-danger">*</span> :</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="name" class="form-control" placeholder="Full Name" required>
                                </div>
                                <div class="col-md-2 mt-3 mt-md-0">
                                    <label class="form-label-custom">Mobile No.<span class="text-danger">*</span> :</label>
                                </div>
                                <div class="col-md-4 mt-3 mt-md-0">
                                    <input type="text" name="mobile" class="form-control" placeholder="Number" required>
                                </div>
                            </div>

                            <div class="row mb-4 align-items-center">
                                <div class="col-md-2">
                                    <label class="form-label-custom">Email<span class="text-danger">*</span> :</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                                </div>
                                <div class="col-md-2 mt-3 mt-md-0">
                                    <label class="form-label-custom">Topic<span class="text-danger">*</span> :</label>
                                </div>
                                <div class="col-md-4 mt-3 mt-md-0">
                                    <input type="text" name="topic" class="form-control" placeholder="Topic" required>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-2">
                                    <label class="form-label-custom pt-2">Description<span class="text-danger">*</span> :</label>
                                </div>
                                <div class="col-md-10">
                                    <textarea name="message" id="descriptionEditor" class="form-control" required></textarea>
                                </div>
                            </div>

                            <div class="text-center mt-5">
                                <button type="submit" class="btn btn-send">Send</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Include CKEditor 4 -->
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        CKEDITOR.replace('descriptionEditor', {
            height: 250,
            versionCheck: false
        });
    });
</script>

<?= view('frontend/layout/footer') ?>