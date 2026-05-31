<?= $this->include('admin/layout/header') ?>
<?= $this->include('admin/layout/sidebar') ?>

<section class="content">
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header">
                <h4 class="mb-0">Edit Slider</h4>
            </div>
            <div class="card-body">
                <form action="<?= base_url('admin/sliders/update/'.$slider['id']) ?>" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label>Current Image</label><br>
                            <img src="<?= base_url($slider['image']) ?>" width="300" class="img-thumbnail mb-2"><br>
                            <label>Change Image (Optional)</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" value="<?= esc($slider['title']) ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Subtitle</label>
                            <input type="text" name="subtitle" class="form-control" value="<?= esc($slider['subtitle']) ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Button Text</label>
                            <input type="text" name="button_text" class="form-control" value="<?= esc($slider['button_text']) ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Button Link</label>
                            <input type="text" name="button_link" class="form-control" value="<?= esc($slider['button_link']) ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Sort Order</label>
                            <input type="number" name="sort_order" class="form-control" value="<?= $slider['sort_order'] ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="active" <?= $slider['status'] == 'active' ? 'selected' : '' ?>>Active</option>
                                <option value="inactive" <?= $slider['status'] == 'inactive' ? 'selected' : '' ?>>Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Update Slider</button>
                        <a href="<?= base_url('admin/sliders') ?>" class="btn btn-default">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->include('admin/layout/footer') ?>
