<?= $this->include('admin/layout/header') ?>
<?= $this->include('admin/layout/sidebar') ?>

<section class="content">
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Testimonials</h4>
                <a href="<?= base_url('admin/testimonials/add') ?>" class="btn btn-primary btn-sm">Add New Testimonial</a>
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
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($testimonials)): ?>
                                <?php foreach($testimonials as $testi): ?>
                                    <tr>
                                        <td><?= $testi['id'] ?></td>
                                        <td>
                                            <?php if($testi['photo']): ?>
                                                <img src="<?= base_url($testi['photo']) ?>" width="50" height="50" class="rounded-circle shadow-sm" style="object-fit: cover;">
                                            <?php else: ?>
                                                No Photo
                                            <?php endif; ?>
                                        </td>
                                        <td><?= esc($testi['name']) ?></td>
                                        <td><?= esc($testi['designation']) ?></td>
                                        <td>
                                            <span class="badge <?= $testi['status'] == 'active' ? 'bg-green' : 'bg-red' ?>">
                                                <?= ucfirst($testi['status']) ?>
                                            </span>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('admin/testimonials/edit/'.$testi['id']) ?>" class="btn btn-xs bg-indigo waves-effect">
                                                <i class="material-icons" style="font-size: 16px;">edit</i>
                                            </a>
                                            <a href="<?= base_url('admin/testimonials/delete/'.$testi['id']) ?>" class="btn btn-xs bg-red waves-effect" onclick="return confirm('Are you sure?')">
                                                <i class="material-icons" style="font-size: 16px;">delete</i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr><td colspan="6" class="text-center">No testimonials found.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->include('admin/layout/footer') ?>
