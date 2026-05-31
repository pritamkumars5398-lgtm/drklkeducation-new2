<?= $this->include('admin/layout/header') ?>
<?= $this->include('admin/layout/sidebar') ?>

<section class="content">
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Homepage Sliders</h4>
                <a href="<?= base_url('admin/sliders/add') ?>" class="btn btn-primary">Add Slider</a>
            </div>
            <div class="card-body">
                <?php if(session()->getFlashdata('success')): ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                <?php endif; ?>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Order</th>
                            <th>Image</th>
                            <th>Title/Subtitle</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($sliders)): ?>
                            <?php foreach($sliders as $row): ?>
                                <tr>
                                    <td><?= $row['sort_order'] ?></td>
                                    <td>
                                        <img src="<?= base_url($row['image']) ?>" width="100" class="img-thumbnail">
                                    </td>
                                    <td>
                                        <strong><?= esc($row['title']) ?></strong><br>
                                        <small><?= esc($row['subtitle']) ?></small>
                                    </td>
                                    <td>
                                        <?php if($row['status'] == 'active'): ?>
                                            <span class="badge bg-success">Active</span>
                                        <?php else: ?>
                                            <span class="badge bg-secondary">Inactive</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('admin/sliders/edit/'.$row['id']) ?>" class="btn btn-xs bg-indigo waves-effect">
                                            <i class="material-icons" style="font-size: 16px;">edit</i>
                                        </a>
                                        <a href="<?= base_url('admin/sliders/delete/'.$row['id']) ?>" class="btn btn-xs bg-red waves-effect" onclick="return confirm('Delete this slider?')">
                                            <i class="material-icons" style="font-size: 16px;">delete</i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="5" class="text-center">No sliders found.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<?= $this->include('admin/layout/footer') ?>
