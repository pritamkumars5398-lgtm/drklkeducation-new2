<?= $this->include('frontend/layout/header'); ?>

<div class="container my-5">

    <!-- Title -->
    <div class="text-center mb-5">
        <button class="btn title-btn">Our Objective</button>
    </div>

    <div class="card border-0 shadow-sm p-4 mb-5" style="border-radius: 12px; border: 1px solid #eee !important;">
        <div class="row align-items-center">
            <!-- Left Side: Image -->
            <div class="col-md-5 mb-4 mb-md-0 text-center">
                <img src="<?= base_url($motive['image']) ?>" alt="<?= esc($motive['title']) ?>" class="img-fluid rounded shadow-sm" style="max-height: 400px; width: 100%; object-fit: cover;">
            </div>
            
            <!-- Right Side: Content -->
            <div class="col-md-7 ps-md-5">
                <h3 class="fw-bold mb-3" style="color: #D90D0E; border-bottom: 2px solid #D90D0E; display: inline-block; padding-bottom: 5px;">
                    <?= esc($motive['title']) ?>
                </h3>
                <div class="motive-description mt-3" style="line-height: 1.8; color: #444; font-size: 16px;">
                    <?= $motive['description'] ?>
                </div>
            </div>
        </div>
    </div>

</div>

<style>
    .motive-description p {
        margin-bottom: 1.5rem;
    }
</style>

<?= $this->include('frontend/layout/footer'); ?>
