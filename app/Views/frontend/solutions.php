<?= $this->include('frontend/layout/header'); ?>

<div class="container my-5">

    <!-- Title -->
    <div class="text-center mb-5">
        <button class="title-btn">Latest Solutions</button>
    </div>

    <div class="row">

        <!-- Card 1 -->
        <div class="col-md-4 mb-5">
            <div class="solution-card">
                <div class="solution-img-wrapper">
                    <img src="<?= base_url('images/solution_1.png') ?>" class="solution-img" alt="Education Support">
                </div>
                <h5>Education Support</h5>
                <p>Helping underprivileged students with education, books, and scholarships.</p>
                <a href="#" class="btn btn-sm btn-danger">Learn More</a>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="col-md-4 mb-5">
            <div class="solution-card">
                <div class="solution-img-wrapper">
                    <img src="<?= base_url('images/solution_2.png') ?>" class="solution-img" alt="Healthcare Services">
                </div>
                <h5>Healthcare Services</h5>
                <p>Providing medical camps, health awareness, and free treatment support.</p>
                <a href="#" class="btn btn-sm btn-danger">Learn More</a>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="col-md-4 mb-5">
            <div class="solution-card">
                <div class="solution-img-wrapper">
                    <img src="<?= base_url('images/solution_3.png') ?>" class="solution-img" alt="Women Empowerment">
                </div>
                <h5>Women Empowerment</h5>
                <p>Supporting women with skill training and self-employment programs.</p>
                <a href="#" class="btn btn-sm btn-danger">Learn More</a>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="col-md-4 mb-5">
            <div class="solution-card">
                <div class="solution-img-wrapper">
                    <img src="<?= base_url('images/solution_4.png') ?>" class="solution-img" alt="Tree Plantation">
                </div>
                <h5>Tree Plantation</h5>
                <p>Promoting environmental awareness through plantation drives.</p>
                <a href="#" class="btn btn-sm btn-danger">Learn More</a>
            </div>
        </div>

        <!-- Card 5 -->
        <div class="col-md-4 mb-5">
            <div class="solution-card">
                <div class="solution-img-wrapper">
                    <img src="<?= base_url('images/solution_5.png') ?>" class="solution-img" alt="Blood Donation">
                </div>
                <h5>Blood Donation</h5>
                <p>Organizing blood donation camps to save lives.</p>
                <a href="#" class="btn btn-sm btn-danger">Learn More</a>
            </div>
        </div>

        <!-- Card 6 -->
        <div class="col-md-4 mb-5">
            <div class="solution-card">
                <div class="solution-img-wrapper">
                    <img src="<?= base_url('images/solution_6.png') ?>" class="solution-img" alt="Community Support">
                </div>
                <h5>Community Support</h5>
                <p>Helping poor families with food, clothes, and essential needs.</p>
                <a href="#" class="btn btn-sm btn-danger">Learn More</a>
            </div>
        </div>

    </div>

</div>

<?= $this->include('frontend/layout/footer'); ?>