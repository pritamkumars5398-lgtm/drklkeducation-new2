<?= $this->include('admin/layout/header') ?>
<?= $this->include('admin/layout/sidebar') ?>

<section class="content">
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header">
                <h4 class="mb-0">Edit Motive: <?= esc($motive['title']) ?></h4>
            </div>
            <div class="card-body">
                <form action="<?= base_url('admin/motives/update/'.$motive['id']) ?>" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" value="<?= esc($motive['title']) ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Short Title (for Home Cards)</label>
                                <input type="text" name="short_title" class="form-control" value="<?= esc($motive['short_title']) ?>" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label>Image</label>
                        <?php if(!empty($motive['image'])): ?>
                            <div class="mb-2">
                                <img src="<?= base_url($motive['image']) ?>" width="100" style="border-radius: 4px;">
                            </div>
                        <?php endif; ?>
                        <input type="file" name="image" class="form-control" accept="image/*">
                        <small class="text-muted">Leave blank to keep existing image.</small>
                    </div>

                    <div class="form-group mb-3">
                        <label>Description</label>
                        <textarea name="description" id="motiveEditor" class="form-control"><?= $motive['description'] ?></textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="active" <?= $motive['status'] == 'active' ? 'selected' : '' ?>>Active</option>
                            <option value="inactive" <?= $motive['status'] == 'inactive' ? 'selected' : '' ?>>Inactive</option>
                        </select>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Update Motive</button>
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
