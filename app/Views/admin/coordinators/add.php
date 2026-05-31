<?= $this->include('admin/layout/header') ?>
<?= $this->include('admin/layout/sidebar') ?>

<section class="content">
    <div class="container-fluid">

        <div class="card shadow-sm">
            <div class="card-header">
                <h4 class="mb-0">Add Coordinator User</h4>
            </div>

            <div class="card-body">
                
                <?php if(session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                <?php endif; ?>

                <form action="<?= base_url('admin/coordinators/save') ?>" method="POST">
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Full Name <span class="text-danger">*</span></label>
                            <input type="text" name="full_name" class="form-control" required>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label>Mobile <span class="text-danger">*</span></label>
                            <input type="text" name="mobile" class="form-control" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label>Status <span class="text-danger">*</span></label>
                            <select name="status" class="form-control" required>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>

                        <div class="col-md-12"><hr></div>

                        <div class="col-md-6 mb-3">
                            <label>Login Username <span class="text-danger">*</span></label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label>Login Password <span class="text-danger">*</span></label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Save Coordinator</button>
                        <a href="<?= base_url('admin/coordinators') ?>" class="btn btn-default">Cancel</a>
                    </div>
                </form>

            </div>
        </div>

    </div>
</section>

<?= $this->include('admin/layout/footer') ?>
