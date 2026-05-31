<?= $this->include('admin/layout/header') ?>
<?= $this->include('admin/layout/sidebar') ?>

<section class="content">
    <div class="container-fluid">

        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Contact Enquiries</h4>
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
                                <th>Name</th>
                                <th>Contact Info</th>
                                <th>Topic</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($enquiries)): ?>
                                <?php foreach($enquiries as $row): ?>
                                    <tr>
                                        <td><?= $row['id'] ?></td>
                                        <td><?= esc($row['name']) ?></td>
                                        <td>
                                            <?= esc($row['mobile']) ?><br>
                                            <small><?= esc($row['email']) ?></small>
                                        </td>
                                        <td><?= esc($row['topic']) ?></td>
                                        <td><?= date('d M Y', strtotime($row['created_at'])) ?></td>
                                        <td>
                                            <?php if($row['status'] == 'resolved'): ?>
                                                <span class="badge bg-green">Resolved</span>
                                            <?php elseif($row['status'] == 'in_progress'): ?>
                                                <span class="badge bg-blue">In Progress</span>
                                            <?php else: ?>
                                                <span class="badge bg-orange">New</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('admin/contact-enquiry/view/'.$row['id']) ?>" title="View/Reply" class="btn btn-xs bg-indigo">
                                                <i class="material-icons" style="font-size: 16px;">visibility</i>
                                            </a>
                                            <a href="<?= base_url('admin/contact-enquiry/delete/'.$row['id']) ?>" onclick="return confirm('Delete this enquiry?')" class="btn btn-xs bg-red">
                                                <i class="material-icons" style="font-size: 16px;">delete</i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center">No contact enquiries found.</td>
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
