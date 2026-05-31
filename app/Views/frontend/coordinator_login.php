<?= view('frontend/layout/header') ?>

<style>
.login-section {
    padding: 60px 0;
    background: #eef3f7;
}

.login-card {
    max-width: 500px;
    margin: auto;
    background: #fff;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}

.login-title {
    text-align: center;
    color: #ff5722;
    font-weight: bold;
    margin-bottom: 20px;
}

.form-control {
    height: 45px;
    border-radius: 8px;
}

.btn-login {
    background: linear-gradient(45deg,#ff5722,#ff9800);
    color: #fff;
    border-radius: 8px;
    padding: 10px;
    width: 120px;
}

.btn-login:hover {
    opacity: 0.9;
}
</style>

<section class="login-section">
    <div class="container">

        <div class="login-card">

            <h3 class="login-title">COORDINATOR LOGIN</h3>
            <?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

            <form method="post" action="<?= base_url('admin/auth/login') ?>">
<input type="hidden" name="login_type" value="coordinator">
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <!-- reCAPTCHA here -->
                </div>

                <button type="submit" class="btn btn-login">LOGIN</button>

            </form>

        </div>

    </div>
</section>

<?= view('frontend/layout/footer') ?>