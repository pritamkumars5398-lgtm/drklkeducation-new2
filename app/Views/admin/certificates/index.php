<?= $this->include('admin/layout/header') ?>
<?= $this->include('admin/layout/sidebar') ?>

<section class="content">
    <div class="container-fluid">

        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Certificates</h4>
                <a href="<?= base_url('admin/certificates/add') ?>" class="btn btn-primary">Add New</a>
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
                                <th>Thumbnail</th>
                                <th>Title</th>
                                <th>Issued By</th>
                                <th>Issue Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($certificates)): ?>
                                <?php foreach($certificates as $row): ?>
                                    <tr>
                                        <td><?= $row['id'] ?></td>
                                        <td>
                                            <?php if(!empty($row['thumbnail'])): ?>
                                                <img src="<?= base_url($row['thumbnail']) ?>" style="height:50px; width:50px; object-fit:cover;">
                                            <?php else: ?>
                                                No Image
                                            <?php endif; ?>
                                        </td>
                                        <td><?= esc($row['title']) ?></td>
                                        <td><?= esc($row['issued_by']) ?></td>
                                        <td><?= esc($row['issue_date']) ?></td>
                                        <td>
                                            <?php if($row['status'] == 'active'): ?>
                                                <span class="badge bg-green">Active</span>
                                            <?php else: ?>
                                                <span class="badge bg-red">Inactive</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('admin/certificates/delete/'.$row['id']) ?>" onclick="return confirm('Delete this certificate?')" class="btn btn-xs bg-red">
                                                <i class="material-icons" style="font-size: 16px;">delete</i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center">No certificates found.</td>
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
