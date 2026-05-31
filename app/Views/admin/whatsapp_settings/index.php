<?= $this->include('admin/layout/header') ?>
<?= $this->include('admin/layout/sidebar') ?>

<section class="content">
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header">
                <h4 class="mb-0">WhatsApp "Click to Chat" Settings</h4>
            </div>
            <div class="card-body">
                <?php if(session()->getFlashdata('success')): ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                <?php endif; ?>

                <form action="<?= base_url('admin/whatsapp-settings/update') ?>" method="POST">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>WhatsApp Number (with country code, e.g., 919876543210)</label>
                            <input type="text" name="number" class="form-control" value="<?= esc($settings['number']) ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Button Position</label>
                            <select name="position" class="form-control">
                                <option value="left" <?= $settings['position'] == 'left' ? 'selected' : '' ?>>Bottom Left</option>
                                <option value="right" <?= $settings['position'] == 'right' ? 'selected' : '' ?>>Bottom Right</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label>Default Message</label>
                        <textarea name="message" class="form-control" rows="3"><?= esc($settings['message']) ?></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="active" <?= $settings['status'] == 'active' ? 'selected' : '' ?>>Active (Visible)</option>
                                <option value="inactive" <?= $settings['status'] == 'inactive' ? 'selected' : '' ?>>Inactive (Hidden)</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Update Settings</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->include('admin/layout/footer') ?>
