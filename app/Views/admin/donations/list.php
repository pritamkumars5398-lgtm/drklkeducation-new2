<?= $this->include('admin/layout/header'); ?>
<?= $this->include('admin/layout/sidebar'); ?>

<section class="content">
    <div class="container-fluid">

<div class="card shadow-sm">
<div class="card-header d-flex justify-content-between align-items-center">
<h4 class="mb-0">Donations List</h4>
</div>

<div class="card-body">

<table id="donationsTable" class="table table-bordered table-striped">

<thead>
<tr>
<th>ID</th>
<th>Donor Name</th>
<th>Mobile</th>
<th>Email</th>
<th>Amount</th>
<th>Status</th>
<th>Date</th>
<th width="120">Action</th>
</tr>
</thead>

<tbody>

<?php if(!empty($donations)): ?>
<?php foreach($donations as $row): ?>

<tr>
<td><?= $row['id']; ?></td>
<td>
    <?php $photoPath = (!empty($row['photo']) && file_exists(FCPATH . $row['photo'])) ? base_url($row['photo']) : base_url('imgs/member/member-01.jpg'); ?>
    <img src="<?= $photoPath ?>" alt="Profile" style="width: 35px; height: 35px; object-fit: cover; border-radius: 50%; margin-right: 10px; border: 1px solid #eee; vertical-align: middle;">
    <span style="vertical-align: middle;"><?= esc($row['full_name']); ?></span>
</td>
<td><?= esc($row['mobile']); ?></td>
<td><?= esc($row['email']); ?></td>
<td>₹ <?= number_format($row['amount'], 2); ?></td>

<td>
<?php if($row['status'] == 'verified'): ?>
<span class="badge bg-green">Verified</span>
<?php elseif($row['status'] == 'rejected'): ?>
<span class="badge bg-red">Rejected</span>
<?php else: ?>
<span class="badge bg-orange">Pending</span>
<?php endif; ?>
</td>

<td><?= date('d M Y', strtotime($row['created_at'])); ?></td>

<td>

<a href="<?= base_url('admin/donations/view/'.$row['id']) ?>" title="View Details" class="btn btn-xs bg-blue waves-effect" style="padding: 2px 6px;">
<i class="material-icons" style="font-size: 16px;">visibility</i>
</a>

<?php if($row['status'] == 'pending'): ?>
<a href="<?= base_url('admin/donations/approve/'.$row['id']) ?>" title="Approve" class="btn btn-xs bg-green waves-effect" onclick="return confirm('Verify and list this donation?')" style="padding: 2px 6px;">
<i class="material-icons" style="font-size: 16px;">check</i>
</a>
<a href="<?= base_url('admin/donations/reject/'.$row['id']) ?>" title="Reject" class="btn btn-xs bg-orange waves-effect" onclick="return confirm('Reject this donation?')" style="padding: 2px 6px;">
<i class="material-icons" style="font-size: 16px;">close</i>
</a>
<?php endif; ?>

<a href="<?= base_url('admin/donations/delete/'.$row['id']) ?>" title="Delete" onclick="return confirm('Permanently delete this donation?')" class="btn btn-xs bg-red waves-effect" style="padding: 2px 6px;">
<i class="material-icons" style="font-size: 16px;">delete</i>
</a>

</td>

</tr>

<?php endforeach; ?>
<?php endif; ?>

</tbody>
</table>

</div>
</div>

    </div>
</section>

<?= $this->include('admin/layout/footer'); ?>
