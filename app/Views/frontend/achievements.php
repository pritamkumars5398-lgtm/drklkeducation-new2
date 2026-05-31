<?= $this->include('frontend/layout/header'); ?>

<div class="container my-5 text-center">

    <!-- Title -->
    <div class="mb-4">
        <button class="btn title-btn">Achievements / Awards</button>
    </div>

    <!-- Achievements Grid -->
    <div class="row">

        <?php for($i=0; $i<6; $i++): ?>
        <div class="col-md-4 mb-4">
            <div class="achievement-card">

                <img src="<?= base_url('imgs/achievements/achievements-img01.png') ?>" alt="">

                <h6>Achievement Title</h6>

                <p>
                    Short description about this achievement or award received by the organization.
                </p>

            </div>
        </div>
        <?php endfor; ?>

    </div>

</div>

<?= $this->include('frontend/layout/footer'); ?>