<?= $this->include('frontend/layout/header'); ?>

<div class="container my-5 text-center">

    <!-- Title -->
    <div class="mb-4">
        <button class="btn title-btn">Our Certifications</button>
    </div>

    <!-- Certificates Grid -->
    <div class="row popup-gallery">

        <?php if(!empty($certificates)): ?>
            <?php foreach($certificates as $cert): ?>
            <div class="col-md-4 mb-4">
                <div class="certificate-card">

                    <div class="certificate-img-container">
                        <a href="<?= base_url($cert['certificate_file']) ?>" title="<?= esc($cert['title']) ?>">
                            <img src="<?= base_url($cert['thumbnail'] ?: $cert['certificate_file']) ?>" alt="<?= esc($cert['title']) ?>" class="img-fluid">
                            <div class="hover-overlay">
                                <i class="bi bi-zoom-in"></i>
                            </div>
                        </a>
                    </div>

                    <div class="certificate-info">
                        <h6><?= esc($cert['title']) ?></h6>
                        <p>Issued by <?= esc($cert['issued_by']) ?></p>
                    </div>

                </div>
            </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12">
                <div class="alert alert-info">No certifications available at the moment.</div>
            </div>
        <?php endif; ?>

    </div>

</div>

<?= $this->include('frontend/layout/footer'); ?>