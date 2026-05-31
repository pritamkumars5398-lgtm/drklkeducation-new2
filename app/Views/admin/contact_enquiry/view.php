<?= $this->include('admin/layout/header') ?>
<?= $this->include('admin/layout/sidebar') ?>

<section class="content">
    <div class="container-fluid">

        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">View Contact Enquiry</h4>
                <a href="<?= base_url('admin/contact-enquiry') ?>" class="btn btn-default">Back</a>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="text-muted">Name</label>
                        <div class="form-control" style="background-color: #f9f9f9;"><?= esc($enquiry['name']) ?></div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="text-muted">Mobile</label>
                        <div class="form-control" style="background-color: #f9f9f9;"><?= esc($enquiry['mobile']) ?></div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="text-muted">Email</label>
                        <div class="form-control" style="background-color: #f9f9f9;"><?= esc($enquiry['email']) ?></div>
                    </div>
                    
                    <div class="col-md-12 mb-3">
                        <label class="text-muted">Topic</label>
                        <div class="form-control" style="background-color: #f9f9f9;"><?= esc($enquiry['topic']) ?></div>
                    </div>

                    <div class="col-md-12 mb-4">
                        <label class="text-muted">Message / Description</label>
                        <div class="p-3" style="background-color: #f9f9f9; border: 1px solid #ccc; border-radius: 4px; min-height: 100px;">
                            <?= $enquiry['message'] ?>
                        </div>
                    </div>
                </div>

                <hr>

                <h5 class="mt-4 mb-3">Admin Reply</h5>
                
                <?php if($enquiry['status'] == 'resolved'): ?>
                    <div class="alert alert-success">
                        <strong>Resolved on:</strong> <?= date('d M Y, h:i A', strtotime($enquiry['replied_at'])) ?>
                    </div>
                    <div class="p-3" style="background-color: #e8f5e9; border: 1px solid #c8e6c9; border-radius: 4px;">
                        <?= nl2br(esc($enquiry['admin_reply'])) ?>
                    </div>
                <?php else: ?>
                    <form action="<?= base_url('admin/contact-enquiry/reply/'.$enquiry['id']) ?>" method="POST">
                        <div class="form-group mb-3">
                            <label>Write a reply/note (this marks the enquiry as resolved):</label>
                            <textarea name="admin_reply" class="form-control" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Mark as Resolved</button>
                    </form>
                <?php endif; ?>

            </div>
        </div>

    </div>
</section>

<?= $this->include('admin/layout/footer') ?>
