<?= $this->include('frontend/layout/header'); ?>

<div class="container my-5 text-center">

    <!-- Title -->
    <div class="mb-4">
        <button class="btn title-btn">Press / Media</button>
    </div>

    <!-- Media Grid -->
    <div class="row">

        <?php if(!empty($media)): ?>
            <?php foreach($media as $item): ?>
            <div class="col-md-4 mb-4">

                <div class="media-card" style="position: relative;">

                    <!-- Image or Video -->
                    <?php if(!empty($item['video_url'])): ?>
                        <a href="<?= esc($item['video_url']) ?>" class="popup-youtube" title="<?= esc($item['title']) ?>">
                            <img src="<?= base_url($item['image']) ?>" alt="<?= esc($item['title']) ?>" class="img-fluid">
                            <div style="position:absolute; top:40%; left:50%; transform:translate(-50%, -50%); color:white; font-size:40px; text-shadow:0px 0px 10px rgba(0,0,0,0.5);"><i class="bi bi-play-circle-fill"></i></div>
                        </a>
                    <?php else: ?>
                        <!-- We use popup-gallery just for this item if needed, or open in new tab if we want to avoid mixing types in magnific -->
                        <a href="<?= base_url($item['image']) ?>" class="image-popup-vertical-fit" title="<?= esc($item['title']) ?>">
                            <img src="<?= base_url($item['image']) ?>" alt="<?= esc($item['title']) ?>" class="img-fluid">
                        </a>
                    <?php endif; ?>

                    <!-- Content -->
                    <div class="media-content mt-2 p-2" style="background-color: #fff; border-radius: 5px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                        <h6 style="font-weight: 600; color: #333; margin-bottom: 5px;"><?= esc($item['title']) ?></h6>
                        <small style="color: #666;">Published: <?= date('d F Y', strtotime($item['publish_date'])) ?></small>
                        <?php if(!empty($item['description'])): ?>
                            <p class="mt-2" style="font-size: 13px; color: #555;"><?= esc($item['description']) ?></p>
                        <?php endif; ?>
                    </div>

                </div>

            </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12"><div class="alert alert-info">No press/media items available.</div></div>
        <?php endif; ?>

    </div>

</div>

<?= $this->include('frontend/layout/footer'); ?>