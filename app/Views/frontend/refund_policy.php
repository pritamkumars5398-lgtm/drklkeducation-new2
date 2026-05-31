<?= $this->include('frontend/layout/header') ?>

<style>
.refund-section {
    padding: 60px 0;
    background: #f4f8fb;
}

.refund-content-container {
    background: #f4f8fb;
    padding: 0 15px;
}

.refund-text {
    font-size: 14px;
    color: #333;
    line-height: 1.6;
}

.refund-text p {
    margin-bottom: 20px;
}
</style>

<section class="refund-section">
    <div class="container">
        <!-- Page Title -->
        <div class="text-center mb-5">
            <button class="title-btn">Refund Policy</button>
        </div>

        <!-- Content -->
        <div class="refund-content-container">
            <div class="refund-text">
                <p>you can cancel a donation that you have made any time up to 30 days after your payment was made. If you decide to cancel a donation after 30 days, we will refund the donation provided the donation has not been used for a charitable project.</p>
            </div>
        </div>

    </div>
</section>

<?= $this->include('frontend/layout/footer') ?>