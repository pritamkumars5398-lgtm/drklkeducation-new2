<?= $this->include('admin/layout/header') ?>
<?= $this->include('admin/layout/sidebar') ?>

<section class="content">
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header">
                <h4 class="mb-0">CMS Pages</h4>
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
                            <th>Slug</th>
                            <th>Last Updated</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($pages)): ?>
                            <?php foreach($pages as $page): ?>
                                <tr>
                                    <td><?= $page['id'] ?></td>
                                    <td><?= esc($page['title']) ?></td>
                                    <td><?= esc($page['slug']) ?></td>
                                    <td><?= date('d M Y, h:i A', strtotime($page['updated_at'])) ?></td>
                                    <td>
                                        <a href="<?= base_url('admin/cms/edit/'.$page['id']) ?>" class="btn btn-xs bg-indigo waves-effect">
                                            <i class="material-icons" style="font-size: 16px;">edit</i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="5" class="text-center">No pages found.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<?= $this->include('admin/layout/footer') ?>
