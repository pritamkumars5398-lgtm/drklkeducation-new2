<?= $this->include('admin/layout/header'); ?>
<?= $this->include('admin/layout/sidebar'); ?>

<section class="content">
    <div class="container-fluid">

<div class="card shadow-sm">
<div class="card-header d-flex justify-content-between align-items-center">
<h4 class="mb-0">Management Team</h4>

<a href="<?= base_url('admin/managementteam/add') ?>" class="btn btn-primary waves-effect">
<i class="material-icons" style="vertical-align: middle; font-size:18px;">add</i> Add Member
</a>
</div>

<div class="card-body">

<table id="teamTable" class="table table-bordered table-striped">

<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>Designation</th>
<th>Department</th>
<th>Mobile</th>
<th>Status</th>
<th>Sort</th>
<th width="150">Action</th>
</tr>
</thead>

<tbody>

<?php if(!empty($team)): ?>
<?php foreach($team as $row): ?>

<tr>
<td><?= $row['id']; ?></td>
<td>
    <?php $photoPath = (!empty($row['photo']) && file_exists(FCPATH . $row['photo'])) ? base_url($row['photo']) : base_url('imgs/member/member-01.jpg'); ?>
    <img src="<?= $photoPath ?>" alt="Profile" style="width: 35px; height: 35px; object-fit: cover; border-radius: 50%; margin-right: 10px; border: 1px solid #eee; vertical-align: middle;">
    <span style="vertical-align: middle;"><?= esc($row['name']); ?></span>
</td>
<td><?= esc($row['designation']); ?></td>
<td><?= esc($row['department']); ?></td>
<td><?= esc($row['mobile']); ?></td>

<td>
<?php if($row['status']=='active'): ?>
<span class="badge bg-green">Active</span>
<?php else: ?>
<span class="badge bg-red">Inactive</span>
<?php endif; ?>
</td>

<td><?= $row['sort_order']; ?></td>

<td>

<a href="<?= base_url('admin/managementteam/view/'.$row['id']) ?>" title="View" class="btn btn-xs bg-blue waves-effect" style="padding: 2px 6px;">
<i class="material-icons" style="font-size: 16px;">visibility</i>
</a>

<a href="<?= base_url('admin/managementteam/edit/'.$row['id']) ?>" title="Edit" class="btn btn-xs bg-indigo waves-effect" style="padding: 2px 6px;">
<i class="material-icons" style="font-size: 16px;">edit</i>
</a>

<a href="<?= base_url('admin/managementteam/delete/'.$row['id']) ?>" title="Delete" onclick="return confirm('Delete this team member?')" class="btn btn-xs bg-red waves-effect" style="padding: 2px 6px;">
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
