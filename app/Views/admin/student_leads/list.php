<?= $this->include('admin/layout/header'); ?>
<?= $this->include('admin/layout/sidebar'); ?>

<section class="content">
    <div class="container-fluid">

<div class="card shadow-sm">
<div class="card-header d-flex justify-content-between align-items-center">
<h4 class="mb-0">Student Leads</h4>
</div>

<div class="card-body">

<table id="leadsTable" class="table table-bordered table-striped">

<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>Mobile</th>
<th>Course</th>
<th>City</th>
<th>Status</th>
<th>Date</th>
<th width="120">Action</th>
</tr>
</thead>

<tbody>

<?php if(!empty($leads)): ?>
<?php foreach($leads as $row): ?>

<tr>
<td><?= $row['id']; ?></td>
<td><?= esc($row['name']); ?></td>
<td><?= esc($row['mobile']); ?></td>
<td><?= esc($row['course']); ?></td>
<td><?= esc($row['city']); ?></td>

<td>
<?php if($row['status'] == 1): ?>
<span class="badge bg-green">Contacted</span>
<?php elseif($row['status'] == 2): ?>
<span class="badge bg-red">Closed</span>
<?php else: ?>
<span class="badge bg-orange">Pending</span>
<?php endif; ?>
</td>

<td><?= date('d M Y', strtotime($row['created_at'])); ?></td>

<td>

<a href="<?= base_url('admin/studentleads/status/'.$row['id'].'/1') ?>" title="Mark Contacted" class="btn btn-xs bg-green waves-effect" style="padding: 2px 6px;">
<i class="material-icons" style="font-size: 16px;">check</i>
</a>

<a href="<?= base_url('admin/studentleads/view/'.$row['id']) ?>" title="View Details" class="btn btn-xs bg-blue waves-effect" style="padding: 2px 6px;">
<i class="material-icons" style="font-size: 16px;">visibility</i>
</a>

<a href="<?= base_url('admin/studentleads/delete/'.$row['id']) ?>" title="Delete" onclick="return confirm('Delete this lead?')" class="btn btn-xs bg-red waves-effect" style="padding: 2px 6px;">
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
