<?= $this->include('frontend/layout/header'); ?>




<!-- CROWDFUNDING STARTS
    ========================================================================= -->
<section class="crowdfunding-section py-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <button class="btn title-btn animated" data-animation="fadeInUp" data-animation-delay="200">CROWDFUNDING</button>
            </div>
        </div>

        <div class="row">
            <?php if(!empty($campaigns)): ?>
                <?php foreach($campaigns as $camp): ?>
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="campaign-card shadow-sm h-100 border-0">
                            <div class="campaign-img-wrapper">
                                <?php $imgPath = (!empty($camp['image']) && file_exists(FCPATH . $camp['image'])) ? base_url($camp['image']) : base_url('imgs/campaigns/edu.jpg'); ?>
                                <img src="<?= $imgPath ?>" class="card-img-top" alt="<?= esc($camp['title']) ?>">
                            </div>
                            <div class="card-body text-center d-flex flex-column">
                                <h5 class="campaign-title mb-2"><?= esc($camp['title']) ?></h5>
                                <p class="campaign-desc text-muted mb-4 small">
                                    <?= esc($camp['description']) ?>
                                </p>
                                
                                <div class="mt-auto">
                                    <?php 
                                        $percent = ($camp['goal_amount'] > 0) ? ($camp['raised_amount'] / $camp['goal_amount']) * 100 : 0;
                                        $percent = min($percent, 100);
                                    ?>
                                    <div class="progress campaign-progress mb-2" style="height: 10px; border-radius: 50px; background-color: #eee;">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: <?= $percent ?>%;" aria-valuenow="<?= $percent ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    
                                    <div class="d-flex justify-content-between mb-4 small fw-bold">
                                        <span>₹<?= number_format($camp['raised_amount']) ?> raised of ₹<?= number_format($camp['goal_amount']) ?></span>
                                    </div>
                                    
                                    <a href="<?= base_url('donate?campaign_id='.$camp['id']) ?>" class="btn btn-danger btn-donate-now w-100 rounded-pill">Donate Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <p>No active campaigns available at the moment.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- /.. CROWDFUNDING ENDS
    ========================================================================= -->

<style>
.campaign-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border-radius: 12px;
    overflow: hidden;
    background: #fff;
}
.campaign-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1) !important;
}
.campaign-img-wrapper {
    height: 220px;
    overflow: hidden;
}
.campaign-img-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.campaign-title {
    font-weight: 700;
    font-size: 1.1rem;
    color: #333;
}
.btn-donate-now {
    background-color: #D90D0E;
    border: none;
    padding: 10px 20px;
    font-weight: 600;
    letter-spacing: 0.5px;
}
.btn-donate-now:hover {
    background-color: #b00808;
}
</style>

<?= $this->include('frontend/layout/footer'); ?>