<?= $this->include('admin/layout/header'); ?>
<?= $this->include('admin/layout/sidebar'); ?>

<section class="content">
    <div class="container-fluid">
        <div class="card shadow-sm" style="border-radius: 8px;">
            <div class="card-header bg-white" style="border-bottom: 2px solid #f4f4f4; padding: 20px;">
                <h4 class="mb-0" style="color: #333; font-weight: 600;">Edit Team Member: <?= esc($member['name']) ?></h4>
            </div>
            <div class="card-body" style="padding: 30px;">
                <form action="<?= base_url('admin/managementteam/update/'.$member['id']) ?>" method="POST" enctype="multipart/form-data">
                    
                    <h5 class="mb-4" style="color: #666; font-size: 16px; border-bottom: 1px solid #eee; padding-bottom: 10px;">Information</h5>
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" style="font-weight: 500;">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control p-2" value="<?= esc($member['name']) ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" style="font-weight: 500;">Designation <span class="text-danger">*</span></label>
                            <input type="text" name="designation" class="form-control p-2" value="<?= esc($member['designation']) ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" style="font-weight: 500;">Department</label>
                            <input type="text" name="department" class="form-control p-2" value="<?= esc($member['department']) ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" style="font-weight: 500;">Mobile</label>
                            <input type="text" name="mobile" class="form-control p-2" value="<?= esc($member['mobile']) ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" style="font-weight: 500;">Email ID</label>
                            <input type="email" name="email" class="form-control p-2" value="<?= esc($member['email']) ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" style="font-weight: 500;">Profile Picture</label>
                            <input type="file" name="photo" class="form-control p-2" accept="image/*">
                            <?php if(!empty($member['photo']) && file_exists(FCPATH . $member['photo'])): ?>
                                <div class="mt-2 text-muted" style="font-size:12px;">Current: <a href="<?= base_url($member['photo']) ?>" target="_blank">View Photo</a></div>
                            <?php endif; ?>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label" style="font-weight: 500;">Description</label>
                            <textarea name="description" class="form-control p-2" rows="4"><?= esc($member['description']) ?></textarea>
                        </div>
                    </div>

                    <h5 class="mb-4" style="color: #666; font-size: 16px; border-bottom: 1px solid #eee; padding-bottom: 10px;">Administration</h5>
                    <div class="row mb-4">
                        <div class="col-md-4 mb-3">
                            <label class="form-label" style="font-weight: 500;">Sort Order</label>
                            <input type="number" name="sort_order" class="form-control p-2" value="<?= esc($member['sort_order']) ?>">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label" style="font-weight: 500;">Account Status</label>
                            <select name="status" class="form-control p-2" style="border-left: 4px solid #007bff;">
                                <option value="active" <?= $member['status'] == 'active' ? 'selected' : '' ?>>Active</option>
                                <option value="inactive" <?= $member['status'] == 'inactive' ? 'selected' : '' ?>>Inactive</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="mt-4 pt-3 border-top text-right">
                        <a href="<?= base_url('admin/managementteam') ?>" class="btn btn-light px-4 mr-2" style="border: 1px solid #ccc;">Cancel</a>
                        <button type="submit" class="btn btn-primary px-5 shadow-sm">Update Member</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->include('admin/layout/footer'); ?>
