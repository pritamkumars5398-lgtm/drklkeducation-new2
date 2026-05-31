<?= $this->include('admin/layout/header') ?>
<?= $this->include('admin/layout/sidebar') ?>

<section class="content">
    <div class="container-fluid">

        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Coordinator Users</h4>
                <a href="<?= base_url('admin/coordinators/add') ?>" class="btn btn-primary"><i class="material-icons" style="font-size: 16px; vertical-align: middle;">add</i> Add Coordinator</a>
            </div>

            <div class="card-body">

                <?php if(session()->getFlashdata('success')): ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                <?php endif; ?>
                <?php if(session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                <?php endif; ?>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Username</th>
                                <th>Status</th>
                                <th width="120">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($coordinators)): ?>
                                <?php foreach($coordinators as $row): ?>
                                    <tr>
                                        <td><?= $row['id'] ?></td>
                                        <td><?= esc($row['full_name']) ?></td>
                                        <td>
                                            <?= esc($row['mobile']) ?><br>
                                            <small><?= esc($row['email']) ?></small>
                                        </td>
                                        <td><?= esc($row['username']) ?></td>
                                        <td>
                                            <?php if($row['status'] == 'active'): ?>
                                                <span class="badge bg-green">Active</span>
                                            <?php else: ?>
                                                <span class="badge bg-red">Inactive</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('admin/coordinators/edit/'.$row['id']) ?>" title="Edit" class="btn btn-xs bg-indigo waves-effect">
                                                <i class="material-icons" style="font-size: 16px;">edit</i>
                                            </a>
                                            <a href="<?= base_url('admin/coordinators/delete/'.$row['id']) ?>" onclick="return confirm('Are you sure you want to delete this coordinator?')" title="Delete" class="btn btn-xs bg-red waves-effect">
                                                <i class="material-icons" style="font-size: 16px;">delete</i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" class="text-center">No coordinators found.</td>
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
