<?= $this->include('admin/layout/header') ?>
<?= $this->include('admin/layout/sidebar') ?>

<section class="content">
    <div class="container-fluid">

        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Events</h4>
                <a href="<?= base_url('admin/events/add') ?>" class="btn btn-primary">Add New Event</a>
            </div>

            <div class="card-body">

                <?php if(session()->getFlashdata('success')): ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                <?php endif; ?>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Location</th>
                                <th>Date & Time</th>
                                <th>Seats (Total/Avail)</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($events)): ?>
                                <?php foreach($events as $row): ?>
                                    <tr>
                                        <td><?= $row['id'] ?></td>
                                        <td>
                                            <?php if(!empty($row['image'])): ?>
                                                <img src="<?= base_url($row['image']) ?>" style="height:50px; width:80px; object-fit:cover;">
                                            <?php else: ?>
                                                No Image
                                            <?php endif; ?>
                                        </td>
                                        <td><?= esc($row['title']) ?></td>
                                        <td><?= esc($row['location']) ?></td>
                                        <td><?= date('d M Y', strtotime($row['event_date'])) ?> <br> <?= date('h:i A', strtotime($row['event_time'])) ?></td>
                                        <td><?= esc($row['total_seats']) ?> / <?= esc($row['available_seats']) ?></td>
                                        <td>
                                            <?php if($row['status'] == 'active'): ?>
                                                <span class="badge bg-green">Active</span>
                                            <?php else: ?>
                                                <span class="badge bg-red">Inactive</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('admin/events/delete/'.$row['id']) ?>" onclick="return confirm('Delete this event?')" class="btn btn-xs bg-red">
                                                <i class="material-icons" style="font-size: 16px;">delete</i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="8" class="text-center">No events found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</section>

<?= $this->include('admin/layout/footer') ?>
