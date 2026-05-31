<?= $this->include('admin/layout/header'); ?>
<?= $this->include('admin/layout/sidebar'); ?>

<section class="content">
    <div class="container-fluid">

<div class="card shadow-sm">
<div class="card-header d-flex justify-content-between align-items-center">
<h4 class="mb-0">Member Renewal Requests</h4>
</div>

<div class="card-body">

<table id="memberTable" class="table table-bordered table-striped">

<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>Mobile</th>
<th>Email</th>
<th>City</th>
<th>Renewal Date</th>
<th>Status</th>
<th width="220">Action</th>
</tr>
</thead>

<tbody>

<?php if(!empty($renewals)): ?>
<?php foreach($renewals as $row): ?>

<tr>
<td><?= $row['id']; ?></td>
<td>
    <strong><?= esc($row['full_name']); ?></strong><br>
    <small><?= esc($row['membership_id']); ?></small>
</td>
<td><?= esc($row['mobile']); ?></td>
<td><?= esc($row['email']); ?></td>
<td><?= esc($row['city']); ?></td>

<td><?= date('d M Y', strtotime($row['created_at'])); ?></td>

<td>
<?php if($row['status']=='approved'): ?>
<span class="badge bg-green">Approved</span>

<?php elseif($row['status']=='rejected'): ?>
<span class="badge bg-red">Rejected</span>

<?php else: ?>
<span class="badge bg-orange">Pending</span>
<?php endif; ?>
</td>

<td>

<?php if($row['status'] !== 'approved'): ?>
<a href="<?= base_url('admin/members/renewals/approve/'.$row['id']) ?>" title="Approve Renewal" class="btn btn-xs bg-green waves-effect" style="padding: 2px 6px;">
<i class="material-icons" style="font-size: 16px;">check</i>
</a>
<?php endif; ?>

<?php if($row['status'] !== 'rejected'): ?>
<a href="<?= base_url('admin/members/renewals/reject/'.$row['id']) ?>" title="Reject Renewal" class="btn btn-xs bg-orange waves-effect" style="padding: 2px 6px;">
<i class="material-icons" style="font-size: 16px;">close</i>
</a>
<?php endif; ?>

<?php if(!empty($row['payment_receipt'])): ?>
<a href="<?= base_url($row['payment_receipt']) ?>" target="_blank" title="View Receipt" class="btn btn-xs bg-blue waves-effect" style="padding: 2px 6px;">
<i class="material-icons" style="font-size: 16px;">receipt</i>
</a>
<?php endif; ?>

<a href="<?= base_url('admin/members/view/'.$row['member_id']) ?>" title="View Member" class="btn btn-xs bg-indigo waves-effect" style="padding: 2px 6px;">
<i class="material-icons" style="font-size: 16px;">person</i>
</a>

</td>

</tr>

<?php endforeach; ?>
<?php else: ?>
<tr><td colspan="8" class="text-center">No renewal requests found.</td></tr>
<?php endif; ?>

</tbody>
</table>

</div>
</div>

    </div>
</section>

<?= $this->include('admin/layout/footer'); ?>
