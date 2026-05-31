<?= $this->include('frontend/layout/header'); ?>

<div class="container my-5">

    <!-- Heading -->
    <div class="text-center mb-5">
        <button class="title-btn">Our Projects</button>
    </div>

    <div class="row">

        <!-- Project Card -->
        <div class="col-md-4 mb-5">
            <div class="project-card">
                <div class="solution-img-wrapper">
                    <img src="<?= base_url('public/images/project1.png') ?>" class="solution-img" alt="Education Support Program">
                </div>
                <div class="project-content">
                    <h5>Education Support Program</h5>
                    <p>Providing free education and study materials to underprivileged children.</p>

                    <a href="#" class="btn btn-sm btn-danger">View Details</a>
                </div>
            </div>
        </div>

        <!-- Project 2 -->
        <div class="col-md-4 mb-5">
            <div class="project-card">
                <div class="solution-img-wrapper">
                    <img src="<?= base_url('public/images/project2.png') ?>" class="solution-img" alt="Health Awareness Camp">
                </div>
                <div class="project-content">
                    <h5>Health Awareness Camp</h5>
                    <p>Organizing free medical camps and awareness programs in rural areas.</p>

                    <a href="#" class="btn btn-sm btn-danger">View Details</a>
                </div>
            </div>
        </div>

        <!-- Project 3 -->
        <div class="col-md-4 mb-5">
            <div class="project-card">
                <div class="solution-img-wrapper">
                    <img src="<?= base_url('public/images/project3.png') ?>" class="solution-img" alt="Tree Plantation Drive">
                </div>
                <div class="project-content">
                    <h5>Tree Plantation Drive</h5>
                    <p>Promoting environment by planting trees and awareness campaigns.</p>

                    <a href="#" class="btn btn-sm btn-danger">View Details</a>
                </div>
            </div>
        </div>

    </div>

</div>

<?= $this->include('frontend/layout/footer'); ?>