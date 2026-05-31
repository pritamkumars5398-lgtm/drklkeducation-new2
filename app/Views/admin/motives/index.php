<?= $this->include('admin/layout/header') ?>
<?= $this->include('admin/layout/sidebar') ?>

<section class="content">
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Our Objectives (Motives)</h4>
                <a href="<?= base_url('admin/motives/add') ?>" class="btn btn-primary btn-sm">Add New Motive</a>
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
                                <th>Short Title</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($motives)): ?>
                                <?php foreach($motives as $motive): ?>
                                    <tr>
                                        <td><?= $motive['id'] ?></td>
                                        <td>
                                            <?php if(!empty($motive['image'])): ?>
                                                <img src="<?= base_url($motive['image']) ?>" width="50" height="50" style="object-fit: cover; border-radius: 4px;">
                                            <?php else: ?>
                                                N/A
                                            <?php endif; ?>
                                        </td>
                                        <td><?= esc($motive['title']) ?></td>
                                        <td><?= esc($motive['short_title']) ?></td>
                                        <td>
                                            <span class="badge <?= $motive['status'] == 'active' ? 'bg-green' : 'bg-red' ?>">
                                                <?= ucfirst($motive['status']) ?>
                                            </span>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('admin/motives/edit/'.$motive['id']) ?>" class="btn btn-xs bg-indigo waves-effect">
                                                <i class="material-icons" style="font-size: 16px;">edit</i>
                                            </a>
                                            <a href="<?= base_url('admin/motives/delete/'.$motive['id']) ?>" class="btn btn-xs bg-red waves-effect" onclick="return confirm('Are you sure?')">
                                                <i class="material-icons" style="font-size: 16px;">delete</i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr><td colspan="6" class="text-center">No motives found.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->include('admin/layout/footer') ?>
