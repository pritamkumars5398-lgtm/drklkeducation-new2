<?= $this->include('admin/layout/header') ?>
<?= $this->include('admin/layout/sidebar') ?>

<section class="content">
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header">
                <h4 class="mb-0">Edit YouTube Video</h4>
            </div>
            <div class="card-body">
                <form action="<?= base_url('admin/youtube-videos/update/'.$video['id']) ?>" method="POST">
                    <div class="form-group mb-3">
                        <label>Video Title</label>
                        <input type="text" name="title" class="form-control" value="<?= esc($video['title']) ?>" required>
                    </div>

                    <div class="form-group mb-3">
                        <label>YouTube Link</label>
                        <input type="url" name="youtube_link" class="form-control" value="<?= esc($video['youtube_link']) ?>" required>
                    </div>

                    <div class="form-group mb-3">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="active" <?= $video['status'] == 'active' ? 'selected' : '' ?>>Active</option>
                            <option value="inactive" <?= $video['status'] == 'inactive' ? 'selected' : '' ?>>Inactive</option>
                        </select>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Update Video</button>
                        <a href="<?= base_url('admin/youtube-videos') ?>" class="btn btn-default">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->include('admin/layout/footer') ?>
