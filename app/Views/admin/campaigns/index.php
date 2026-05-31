<?= $this->include('admin/layout/header') ?>
<?= $this->include('admin/layout/sidebar') ?>

<section class="content">
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Crowdfunding Campaigns</h4>
                <a href="<?= base_url('admin/campaigns/add') ?>" class="btn btn-primary btn-sm">Create New Campaign</a>
            </div>
            <div class="card-body">
                <?php if(session()->getFlashdata('success')): ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                <?php endif; ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Goal</th>
                                <th>Raised</th>
                                <th>Progress</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($campaigns)): ?>
                                <?php foreach($campaigns as $camp): ?>
                                    <tr>
                                        <td><?= $camp['id'] ?></td>
                                        <td>
                                            <?php if($camp['image']): ?>
                                                <img src="<?= base_url($camp['image']) ?>" width="80" class="rounded">
                                            <?php endif; ?>
                                        </td>
                                        <td><?= esc($camp['title']) ?></td>
                                        <td>₹ <?= number_format($camp['goal_amount'], 2) ?></td>
                                        <td>₹ <?= number_format($camp['raised_amount'], 2) ?></td>
                                        <td>
                                            <?php 
                                                $percent = ($camp['goal_amount'] > 0) ? ($camp['raised_amount'] / $camp['goal_amount']) * 100 : 0;
                                                $percent = min($percent, 100);
                                            ?>
                                            <div class="progress mb-0" style="height: 10px;">
                                                <div class="progress-bar bg-blue" role="progressbar" style="width: <?= $percent ?>%"></div>
                                            </div>
                                            <small><?= round($percent, 1) ?>%</small>
                                        </td>
                                        <td>
                                            <span class="badge <?= $camp['status'] == 'active' ? 'bg-green' : 'bg-red' ?>">
                                                <?= ucfirst($camp['status']) ?>
                                            </span>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('admin/campaigns/edit/'.$camp['id']) ?>" class="btn btn-xs bg-indigo waves-effect">
                                                <i class="material-icons" style="font-size: 16px;">edit</i>
                                            </a>
                                            <a href="<?= base_url('admin/campaigns/delete/'.$camp['id']) ?>" class="btn btn-xs bg-red waves-effect" onclick="return confirm('Are you sure?')">
                                                <i class="material-icons" style="font-size: 16px;">delete</i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr><td colspan="8" class="text-center">No campaigns found.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->include('admin/layout/footer') ?>
