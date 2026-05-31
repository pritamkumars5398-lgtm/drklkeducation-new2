<?= $this->include('admin/layout/header') ?>
<?= $this->include('admin/layout/sidebar') ?>

<section class="content">
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header">
                <h4 class="mb-0">Add News & Update</h4>
            </div>
            <div class="card-body">
                <form action="<?= base_url('admin/news-updates/save') ?>" method="POST">
                    <div class="form-group mb-3">
                        <label>Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" placeholder="News Title" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Link (Optional)</label>
                        <input type="text" name="link" class="form-control" placeholder="URL Link">
                    </div>
                    <div class="form-group mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_breaking" id="is_breaking" value="1">
                            <label class="form-check-label" for="is_breaking">Is Breaking News? (Shown prominently)</label>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Save News</button>
                        <a href="<?= base_url('admin/news-updates') ?>" class="btn btn-default">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->include('admin/layout/footer') ?>
