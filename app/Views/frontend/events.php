<?= $this->include('frontend/layout/header'); ?>

<div class="container my-5">

    <!-- Title -->
    <div class="text-center mb-5">
        <button class="btn title-btn events-title-btn rounded-pill px-4 py-2" style="font-weight: 500;">Upcoming Events</button>
    </div>
    
    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success text-center"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>
    <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger text-center"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <!-- Event List -->
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <?php if(!empty($events)): ?>
                <?php foreach($events as $event): ?>
                <div class="event-card mb-4 bg-white p-3 shadow-sm" style="border-radius: 8px;">

                    <div class="row align-items-center">

                        <!-- Image -->
                        <div class="col-md-5">
                            <img src="<?= base_url($event['image']) ?>" class="img-fluid event-img w-100" style="border-radius: 6px;" alt="<?= esc($event['title']) ?>">
                        </div>

                        <!-- Content -->
                        <div class="col-md-7 pt-3 pt-md-0 px-md-4">

                            <div class="d-flex justify-content-between text-secondary" style="font-size: 13px; font-weight: 600;">
                                <span>Location - <?= esc($event['location']) ?></span>
                                <span><?= date('F j, Y', strtotime($event['event_date'])) ?> at <?= date('g:i A', strtotime($event['event_time'])) ?></span>
                            </div>
                            
                            <hr class="mt-2 mb-3 align-self-center mx-auto" style="border-color: #ddd;">

                            <h4 class="event-title text-danger fw-bold mb-3" style="font-size: 22px;">
                                <?= esc($event['title']) ?>
                            </h4>

                            <p class="event-desc mb-4" style="font-size: 14px; color: #444; line-height: 1.6;">
                                <?= esc($event['description']) ?>
                            </p>

                            <div class="d-flex align-items-center justify-content-between">
                                <span style="font-size: 13px; color: #555;">Available Seats: <strong><?= esc($event['available_seats']) ?> / <?= esc($event['total_seats']) ?></strong></span>
                                <?php if($event['available_seats'] > 0): ?>
                                    <a href="<?= base_url('book-seat/'.$event['id']) ?>" class="btn book-seat-btn px-4 py-2" style="font-size: 14px; background: #1a237e; color: #fff; border-radius: 5px; text-decoration: none;">Book Seat</a>
                                <?php else: ?>
                                    <button class="btn btn-secondary px-4 py-2 disabled" style="font-size: 14px; cursor: not-allowed;">House Full</button>
                                <?php endif; ?>
                            </div>

                        </div>

                    </div>

                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="alert alert-info text-center">No upcoming events at the moment.</div>
            <?php endif; ?>

        </div>
    </div>

</div>

<?= $this->include('frontend/layout/footer'); ?>