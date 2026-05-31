<?= $this->include('admin/layout/header') ?>
<?= $this->include('admin/layout/sidebar') ?>

<section class="content">
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Latest News (Homepage)</h4>
                <a href="<?= base_url('admin/latest-news/add') ?>" class="btn btn-primary">Add News</a>
            </div>
            <div class="card-body">
                <?php if(session()->getFlashdata('success')): ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                <?php endif; ?>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Order</th>
                            <th>Title</th>
                            <th>Link</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($news)): ?>
                            <?php foreach($news as $row): ?>
                                <tr>
                                    <td><?= $row['display_order'] ?></td>
                                    <td><?= esc($row['title']) ?></td>
                                    <td><?= esc($row['link']) ?></td>
                                    <td>
                                        <?php if($row['status'] == 'active'): ?>
                                            <span class="badge bg-success">Active</span>
                                        <?php else: ?>
                                            <span class="badge bg-secondary">Inactive</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('admin/latest-news/edit/'.$row['id']) ?>" class="btn btn-xs bg-indigo waves-effect">
                                            <i class="material-icons" style="font-size: 16px;">edit</i>
                                        </a>
                                        <a href="<?= base_url('admin/latest-news/delete/'.$row['id']) ?>" class="btn btn-xs bg-red waves-effect" onclick="return confirm('Delete this latest news?')">
                                            <i class="material-icons" style="font-size: 16px;">delete</i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="5" class="text-center">No latest news found.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<?= $this->include('admin/layout/footer') ?>
