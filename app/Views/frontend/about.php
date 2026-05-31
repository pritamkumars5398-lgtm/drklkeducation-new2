<?= $this->include('frontend/layout/header'); ?>

<div class="container my-5">

    <!-- Title -->
    <div class="text-center mb-4">
        <button class="btn title-btn">About Us</button>
    </div>

    <!-- Content -->
    <div class="about-content">
        <?php if(!empty($page)): ?>
            <?= $page['content'] ?>
        <?php else: ?>
            <p>Content is being updated. Please check back soon.</p>
        <?php endif; ?>
    </div>

</div>

<?= $this->include('frontend/layout/footer'); ?>