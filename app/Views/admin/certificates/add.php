<?= $this->include('admin/layout/header') ?>
<?= $this->include('admin/layout/sidebar') ?>

<section class="content">
    <div class="container-fluid">

        <div class="card shadow-sm">
            <div class="card-header">
                <h4 class="mb-0">Add Certificate</h4>
            </div>

            <div class="card-body">
                <form action="<?= base_url('admin/certificates/save') ?>" method="POST" enctype="multipart/form-data">
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Title *</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label>Issued By *</label>
                            <input type="text" name="issued_by" class="form-control" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Issue Date *</label>
                            <input type="date" name="issue_date" class="form-control" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Status *</label>
                            <select name="status" class="form-control" required>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Certificate File (Image) *</label>
                            <input type="file" name="certificate_file" class="form-control" accept="image/*" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Thumbnail (Optional, defaults to Certificate Image)</label>
                            <input type="file" name="thumbnail" class="form-control" accept="image/*">
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Save Certificate</button>
                        <a href="<?= base_url('admin/certificates') ?>" class="btn btn-default">Cancel</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
</section>

<?= $this->include('admin/layout/footer') ?>
