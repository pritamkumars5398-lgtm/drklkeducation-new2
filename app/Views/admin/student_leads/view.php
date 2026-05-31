<?= $this->include('admin/layout/header'); ?>
<?= $this->include('admin/layout/sidebar'); ?>

<section class="content">
    <div class="container-fluid">
        <div class="card shadow-sm" style="border-radius: 8px;">
            <div class="card-header bg-white" style="border-bottom: 2px solid #f4f4f4; padding: 20px;">
                <h4 class="mb-0" style="color: #333; font-weight: 600;">View Student Lead: <?= esc($lead['name']) ?></h4>
            </div>
            <div class="card-body" style="padding: 30px;">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 200px;">Applicant Name</th>
                                <td><?= esc($lead['name']) ?></td>
                            </tr>
                            <tr>
                                <th>Mobile Number</th>
                                <td><?= esc($lead['mobile']) ?></td>
                            </tr>
                            <tr>
                                <th>Email ID</th>
                                <td><?= esc($lead['email']) ?></td>
                            </tr>
                            <tr>
                                <th>City</th>
                                <td><?= esc($lead['city']) ?></td>
                            </tr>
                            <tr>
                                <th>Course Interested</th>
                                <td><?= esc($lead['course']) ?></td>
                            </tr>
                            <tr>
                                <th>Previous Percentage</th>
                                <td><?= esc($lead['percentage']) ?>%</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    <?php if($lead['status'] == 1): ?>
                                    <span class="badge bg-green">Contacted / Processed</span>
                                    <?php elseif($lead['status'] == 2): ?>
                                    <span class="badge bg-red">Closed / Rejected</span>
                                    <?php else: ?>
                                    <span class="badge bg-orange">Pending / New</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Submission Date</th>
                                <td><?= date('d F Y, h:i A', strtotime($lead['created_at'])) ?></td>
                            </tr>
                        </table>
                        
                        <?php if(!empty($lead['message'])): ?>
                            <div class="mt-4">
                                <h5>Additional Message / Query</h5>
                                <div class="p-3 bg-light rounded border">
                                    <?= nl2br(esc($lead['message'])) ?>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
                
                <div class="mt-4 pt-3 border-top text-right">
                    <a href="<?= base_url('admin/studentleads') ?>" class="btn btn-secondary px-4 mr-2">Back to Leads</a>
                    <?php if($lead['status'] != 1): ?>
                        <a href="<?= base_url('admin/studentleads/status/'.$lead['id'].'/1') ?>" class="btn btn-success px-4" onclick="return confirm('Mark this lead as contacted?');">Mark Contacted</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->include('admin/layout/footer'); ?>
