<?= $this->include('admin/layout/header') ?>
<?= $this->include('admin/layout/sidebar') ?>

<section class="content">
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">YouTube Videos</h4>
                <a href="<?= base_url('admin/youtube-videos/add') ?>" class="btn btn-primary btn-sm">Add New Video</a>
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
                                <th>Title</th>
                                <th>YouTube Link</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($videos)): ?>
                                <?php foreach($videos as $video): ?>
                                    <tr>
                                        <td><?= $video['id'] ?></td>
                                        <td><?= esc($video['title']) ?></td>
                                        <td>
                                            <a href="<?= esc($video['youtube_link']) ?>" target="_blank"><?= esc($video['youtube_link']) ?></a>
                                        </td>
                                        <td>
                                            <span class="badge <?= $video['status'] == 'active' ? 'bg-green' : 'bg-red' ?>">
                                                <?= ucfirst($video['status']) ?>
                                            </span>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('admin/youtube-videos/edit/'.$video['id']) ?>" class="btn btn-xs bg-indigo waves-effect">
                                                <i class="material-icons" style="font-size: 16px;">edit</i>
                                            </a>
                                            <a href="<?= base_url('admin/youtube-videos/delete/'.$video['id']) ?>" class="btn btn-xs bg-red waves-effect" onclick="return confirm('Are you sure?')">
                                                <i class="material-icons" style="font-size: 16px;">delete</i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr><td colspan="5" class="text-center">No videos found.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->include('admin/layout/footer') ?>
