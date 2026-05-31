<?= $this->include('frontend/layout/header'); ?>

<div class="container my-5">

    <!-- Title -->
    <div class="text-center mb-5">
        <button class="btn title-btn">Photo Gallery</button>
    </div>

    <div class="row g-4 px-lg-4">
        <?php if(!empty($gallery_items)): ?>
            <?php foreach($gallery_items as $item): ?>
                <div class="col-12 col-sm-6 col-md-4 animated" data-animation="fadeInUp">
                    <div class="gallery-page-item shadow-sm" style="border-radius: 12px; overflow: hidden; background: #fff; height: 100%;">
                        <a href="<?= base_url($item['image']); ?>" class="image-popup-vertical-fit" title="<?= esc($item['title']) ?>">
                            <img src="<?= base_url($item['image']); ?>" alt="<?= esc($item['title']) ?>" class="img-fluid" style="width: 100%; height: 250px; object-fit: cover;">
                            <div class="p-3">
                                <h6 class="fw-bold mb-0 text-dark"><?= esc($item['title']) ?></h6>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12 text-center py-5">
                <p class="text-muted">No gallery items found.</p>
            </div>
        <?php endif; ?>
    </div>

</div>

<style>
    .gallery-page-item {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .gallery-page-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    .gallery-page-item a {
        text-decoration: none;
    }
</style>

<?= $this->include('frontend/layout/footer'); ?>