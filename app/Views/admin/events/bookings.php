<?= $this->include('admin/layout/header') ?>
<?= $this->include('admin/layout/sidebar') ?>

<section class="content">
    <div class="container-fluid">

        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Event Bookings</h4>
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
                                <th>Event</th>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>City</th>
                                <th>Is Member?</th>
                                <th>Seats</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($bookings)): ?>
                                <?php foreach($bookings as $row): ?>
                                    <tr>
                                        <td><?= $row['id'] ?></td>
                                        <td><?= esc($row['event_title']) ?></td>
                                        <td><?= esc($row['full_name']) ?></td>
                                        <td><?= esc($row['mobile']) ?><br><?= esc($row['email']) ?></td>
                                        <td><?= esc($row['city']) ?></td>
                                        <td>
                                            <?php if($row['is_member'] == 'yes'): ?>
                                                <span class="badge bg-green">Yes (<?= esc($row['member_id']) ?>)</span>
                                            <?php else: ?>
                                                <span class="badge bg-grey">No</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?= esc($row['seats']) ?></td>
                                        <td>
                                            <?php if($row['status'] == 'confirmed'): ?>
                                                <span class="badge bg-green">Confirmed</span>
                                            <?php elseif($row['status'] == 'cancelled'): ?>
                                                <span class="badge bg-red">Cancelled</span>
                                            <?php else: ?>
                                                <span class="badge bg-orange">Pending</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($row['status'] !== 'confirmed'): ?>
                                            <a href="<?= base_url('admin/events/bookings/approve/'.$row['id']) ?>" onclick="return confirm('Approve this booking?')" class="btn btn-xs bg-green" title="Approve">
                                                <i class="material-icons" style="font-size: 16px;">check</i>
                                            </a>
                                            <?php endif; ?>
                                            
                                            <?php if($row['status'] !== 'cancelled'): ?>
                                            <a href="<?= base_url('admin/events/bookings/reject/'.$row['id']) ?>" onclick="return confirm('Reject/Cancel this booking?')" class="btn btn-xs bg-orange" title="Reject">
                                                <i class="material-icons" style="font-size: 16px;">close</i>
                                            </a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="9" class="text-center">No bookings found.</td>
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
