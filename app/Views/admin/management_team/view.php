<?= $this->include('admin/layout/header'); ?>
<?= $this->include('admin/layout/sidebar'); ?>

<section class="content">
    <div class="container-fluid">
        <div class="card shadow-sm" style="border-radius: 8px;">
            <div class="card-header bg-white" style="border-bottom: 2px solid #f4f4f4; padding: 20px;">
                <h4 class="mb-0" style="color: #333; font-weight: 600;">View Team Member: <?= esc($member['name']) ?></h4>
            </div>
            <div class="card-body" style="padding: 30px;">
                <div class="row">
                    <div class="col-md-4 text-center mb-4">
                        <?php $photoPath = (!empty($member['photo']) && file_exists(FCPATH . $member['photo'])) ? base_url($member['photo']) : base_url('imgs/member/member-01.jpg'); ?>
                        <img src="<?= $photoPath ?>" alt="Profile" class="img-fluid rounded" style="max-height: 250px; object-fit: cover; border: 1px solid #ddd;">
                    </div>
                    <div class="col-md-8">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 200px;">Name</th>
                                <td><?= esc($member['name']) ?></td>
                            </tr>
                            <tr>
                                <th>Designation</th>
                                <td><?= esc($member['designation']) ?></td>
                            </tr>
                            <tr>
                                <th>Department</th>
                                <td><?= esc($member['department']) ?></td>
                            </tr>
                            <tr>
                                <th>Mobile</th>
                                <td><?= esc($member['mobile']) ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?= esc($member['email']) ?></td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    <?php if($member['status']=='active'): ?>
                                    <span class="badge bg-green">Active</span>
                                    <?php else: ?>
                                    <span class="badge bg-red">Inactive</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Sort Order</th>
                                <td><?= $member['sort_order'] ?></td>
                            </tr>
                        </table>
                        
                        <?php if(!empty($member['description'])): ?>
                            <div class="mt-4">
                                <h5>Description</h5>
                                <div class="p-3 bg-light rounded border">
                                    <?= nl2br(esc($member['description'])) ?>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
                
                <div class="mt-4 pt-3 border-top text-right">
                    <a href="<?= base_url('admin/managementteam') ?>" class="btn btn-secondary px-4">Back to List</a>
                    <a href="<?= base_url('admin/managementteam/edit/'.$member['id']) ?>" class="btn btn-primary px-4">Edit Member</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->include('admin/layout/footer'); ?>
