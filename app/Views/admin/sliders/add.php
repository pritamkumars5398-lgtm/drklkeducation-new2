<?= $this->include('admin/layout/header') ?>
<?= $this->include('admin/layout/sidebar') ?>

<section class="content">
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header">
                <h4 class="mb-0">Add Slider Image</h4>
            </div>
            <div class="card-body">
                <form action="<?= base_url('admin/sliders/save') ?>" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label>Slider Image <span class="text-danger">*</span></label>
                            <input type="file" name="image" class="form-control" required>
                            <small class="text-muted">Recommended size: 1920x800px</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Main Title (Optional)">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Subtitle</label>
                            <input type="text" name="subtitle" class="form-control" placeholder="Subtitle (Optional)">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Button Text</label>
                            <input type="text" name="button_text" class="form-control" placeholder="e.g. Read More">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Button Link</label>
                            <input type="text" name="button_link" class="form-control" placeholder="URL Link">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Sort Order</label>
                            <input type="number" name="sort_order" class="form-control" value="0">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Save Slider</button>
                        <a href="<?= base_url('admin/sliders') ?>" class="btn btn-default">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->include('admin/layout/footer') ?>
