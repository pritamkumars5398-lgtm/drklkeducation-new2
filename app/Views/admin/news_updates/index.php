<?= $this->include('admin/layout/header') ?>
<?= $this->include('admin/layout/sidebar') ?>

<section class="content">
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">News & Updates</h4>
                <a href="<?= base_url('admin/news-updates/add') ?>" class="btn btn-primary">Add News</a>
            </div>
            <div class="card-body">
                <?php if(session()->getFlashdata('success')): ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                <?php endif; ?>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Link</th>
                            <th>Is Breaking?</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($news)): ?>
                            <?php foreach($news as $row): ?>
                                <tr>
                                    <td><?= $row['id'] ?></td>
                                    <td><?= esc($row['title']) ?></td>
                                    <td><?= esc($row['link']) ?></td>
                                    <td><?= $row['is_breaking'] ? '<span class="badge bg-danger">Yes</span>' : 'No' ?></td>
                                    <td>
                                        <?php if($row['status'] == 'active'): ?>
                                            <span class="badge bg-success">Active</span>
                                        <?php else: ?>
                                            <span class="badge bg-secondary">Inactive</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('admin/news-updates/edit/'.$row['id']) ?>" class="btn btn-xs bg-indigo waves-effect">
                                            <i class="material-icons" style="font-size: 16px;">edit</i>
                                        </a>
                                        <a href="<?= base_url('admin/news-updates/delete/'.$row['id']) ?>" class="btn btn-xs bg-red waves-effect" onclick="return confirm('Delete this news update?')">
                                            <i class="material-icons" style="font-size: 16px;">delete</i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="6" class="text-center">No news updates found.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<?= $this->include('admin/layout/footer') ?>
