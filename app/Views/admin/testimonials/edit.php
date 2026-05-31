<?= $this->include('admin/layout/header') ?>
<?= $this->include('admin/layout/sidebar') ?>

<section class="content">
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header">
                <h4 class="mb-0">Edit Testimonial</h4>
            </div>
            <div class="card-body">
                <form action="<?= base_url('admin/testimonials/update/'.$testimonial['id']) ?>" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?= esc($testimonial['name']) ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Designation</label>
                            <input type="text" name="designation" class="form-control" value="<?= esc($testimonial['designation']) ?>" required>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label>Message</label>
                        <textarea name="message" class="form-control" rows="5" required><?= esc($testimonial['message']) ?></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Photo</label>
                            <input type="file" name="photo" class="form-control" accept="image/*">
                            <?php if($testimonial['photo']): ?>
                                <div class="mt-2">
                                    <img src="<?= base_url($testimonial['photo']) ?>" width="80" class="img-thumbnail">
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="active" <?= $testimonial['status'] == 'active' ? 'selected' : '' ?>>Active</option>
                                <option value="inactive" <?= $testimonial['status'] == 'inactive' ? 'selected' : '' ?>>Inactive</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Update Testimonial</button>
                        <a href="<?= base_url('admin/testimonials') ?>" class="btn btn-default">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->include('admin/layout/footer') ?>
