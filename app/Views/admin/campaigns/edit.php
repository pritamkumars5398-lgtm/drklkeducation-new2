<?= $this->include('admin/layout/header') ?>
<?= $this->include('admin/layout/sidebar') ?>

<section class="content">
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header">
                <h4 class="mb-0">Edit Campaign</h4>
            </div>
            <div class="card-body">
                <form action="<?= base_url('admin/campaigns/update/'.$campaign['id']) ?>" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <label>Campaign Title</label>
                            <input type="text" name="title" class="form-control" value="<?= esc($campaign['title']) ?>" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Goal Amount (₹)</label>
                            <input type="number" step="0.01" name="goal_amount" class="form-control" value="<?= esc($campaign['goal_amount']) ?>" required>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="4" required><?= esc($campaign['description']) ?></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Campaign Image</label>
                            <input type="file" name="image" class="form-control" accept="image/*">
                            <?php if($campaign['image']): ?>
                                <div class="mt-2">
                                    <img src="<?= base_url($campaign['image']) ?>" width="120" class="img-thumbnail">
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="active" <?= $campaign['status'] == 'active' ? 'selected' : '' ?>>Active</option>
                                <option value="inactive" <?= $campaign['status'] == 'inactive' ? 'selected' : '' ?>>Inactive</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Update Campaign</button>
                        <a href="<?= base_url('admin/campaigns') ?>" class="btn btn-default">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->include('admin/layout/footer') ?>
