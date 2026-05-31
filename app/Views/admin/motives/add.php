<?= $this->include('admin/layout/header') ?>
<?= $this->include('admin/layout/sidebar') ?>

<section class="content">
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header">
                <h4 class="mb-0">Add New Motive (Objective)</h4>
            </div>
            <div class="card-body">
                <form action="<?= base_url('admin/motives/save') ?>" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" placeholder="e.g. Social Welfare" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Short Title (for Home Cards)</label>
                                <input type="text" name="short_title" class="form-control" placeholder="e.g. SOCIAL WELFARE" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control" accept="image/*" required>
                        <small class="text-muted">Recommended size: 400x500 pixels.</small>
                    </div>

                    <div class="form-group mb-3">
                        <label>Description</label>
                        <textarea name="description" id="motiveEditor" class="form-control"></textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Save Motive</button>
                        <a href="<?= base_url('admin/motives') ?>" class="btn btn-default">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        CKEDITOR.replace('motiveEditor', {
            height: 300,
            versionCheck: false
        });
    });
</script>

<?= $this->include('admin/layout/footer') ?>
