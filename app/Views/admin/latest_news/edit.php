<?= $this->include('admin/layout/header') ?>
<?= $this->include('admin/layout/sidebar') ?>

<section class="content">
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header">
                <h4 class="mb-0">Edit Latest News</h4>
            </div>
            <div class="card-body">
                <form action="<?= base_url('admin/latest-news/update/'.$news['id']) ?>" method="POST">
                    <div class="form-group mb-3">
                        <label>Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" placeholder="News Title" value="<?= esc($news['title']) ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Link (Optional)</label>
                        <input type="text" name="link" class="form-control" placeholder="URL Link" value="<?= esc($news['link']) ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label>Display Order (Lower numbers show first)</label>
                        <input type="number" name="display_order" class="form-control" value="<?= $news['display_order'] ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="active" <?= $news['status'] == 'active' ? 'selected' : '' ?>>Active</option>
                            <option value="inactive" <?= $news['status'] == 'inactive' ? 'selected' : '' ?>>Inactive</option>
                        </select>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Update News</button>
                        <a href="<?= base_url('admin/latest-news') ?>" class="btn btn-default">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->include('admin/layout/footer') ?>
