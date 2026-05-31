<?= $this->include('admin/layout/header') ?>
<?= $this->include('admin/layout/sidebar') ?>

<section class="content">
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header">
                <h4 class="mb-0">Add New YouTube Video</h4>
            </div>
            <div class="card-body">
                <form action="<?= base_url('admin/youtube-videos/save') ?>" method="POST">
                    <div class="form-group mb-3">
                        <label>Video Title</label>
                        <input type="text" name="title" class="form-control" placeholder="e.g. Our Annual Event 2024" required>
                    </div>

                    <div class="form-group mb-3">
                        <label>YouTube Link</label>
                        <input type="url" name="youtube_link" class="form-control" placeholder="https://www.youtube.com/watch?v=..." required>
                        <small class="text-muted">Enter the full YouTube URL.</small>
                    </div>

                    <div class="form-group mb-3">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Save Video</button>
                        <a href="<?= base_url('admin/youtube-videos') ?>" class="btn btn-default">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->include('admin/layout/footer') ?>
