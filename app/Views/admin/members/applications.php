<?= $this->include('admin/layout/header'); ?>
<?= $this->include('admin/layout/sidebar'); ?>

<section class="content">
    <div class="container-fluid">

<div class="card shadow-sm">
<div class="card-header d-flex justify-content-between align-items-center">
<h4 class="mb-0">Member Applications</h4>
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
<th>Status</th>
<th>Date</th>
<th width="220">Action</th>
</tr>
</thead>

<tbody>

<?php if(!empty($members)): ?>
<?php foreach($members as $row): ?>

<tr>
<td><?= $row['id']; ?></td>
<td>
    <?php $photoPath = (!empty($row['photo']) && file_exists(FCPATH . $row['photo'])) ? base_url($row['photo']) : base_url('imgs/member/member-01.jpg'); ?>
    <img src="<?= $photoPath ?>" alt="Profile" style="width: 35px; height: 35px; object-fit: cover; border-radius: 50%; margin-right: 10px; border: 1px solid #eee; vertical-align: middle;">
    <span style="vertical-align: middle;"><?= esc($row['full_name']); ?></span>
</td>
<td><?= $row['mobile']; ?></td>
<td><?= $row['email']; ?></td>
<td><?= $row['city']; ?></td>

<td>
<?php if($row['status']=='approved'): ?>
<span class="badge bg-green">Approved</span>

<?php elseif($row['status']=='rejected'): ?>
<span class="badge bg-red">Rejected</span>

<?php else: ?>
<span class="badge bg-orange">Pending</span>
<?php endif; ?>
</td>

<td><?= date('d M Y', strtotime($row['created_at'])); ?></td>

<td>

<?php if($row['status'] !== 'approved'): ?>
<a href="<?= base_url('admin/members/approve/'.$row['id']) ?>" title="Approve" class="btn btn-xs bg-green waves-effect" style="padding: 2px 6px;">
<i class="material-icons" style="font-size: 16px;">check</i>
</a>
<?php endif; ?>

<?php if($row['status'] !== 'rejected'): ?>
<a href="<?= base_url('admin/members/reject/'.$row['id']) ?>" title="Reject" class="btn btn-xs bg-orange waves-effect" style="padding: 2px 6px;">
<i class="material-icons" style="font-size: 16px;">close</i>
</a>
<?php endif; ?>

<a href="<?= base_url('admin/members/view/'.$row['id']) ?>" title="View" class="btn btn-xs bg-blue waves-effect" style="padding: 2px 6px;">
<i class="material-icons" style="font-size: 16px;">visibility</i>
</a>

<a href="<?= base_url('admin/members/edit/'.$row['id']) ?>" title="Edit" class="btn btn-xs bg-indigo waves-effect" style="padding: 2px 6px;">
<i class="material-icons" style="font-size: 16px;">edit</i>
</a>

<a href="<?= base_url('admin/members/delete/'.$row['id']) ?>" title="Delete" onclick="return confirm('Delete this member?')" class="btn btn-xs bg-red waves-effect" style="padding: 2px 6px;">
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
