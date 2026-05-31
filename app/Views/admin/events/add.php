<?= $this->include('admin/layout/header') ?>
<?= $this->include('admin/layout/sidebar') ?>

<section class="content">
    <div class="container-fluid">

        <div class="card shadow-sm">
            <div class="card-header">
                <h4 class="mb-0">Add Event</h4>
            </div>

            <div class="card-body">
                <form action="<?= base_url('admin/events/save') ?>" method="POST" enctype="multipart/form-data">
                    
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label>Event Title *</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label>Event Date *</label>
                            <input type="date" name="event_date" class="form-control" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Event Time *</label>
                            <input type="time" name="event_time" class="form-control" required>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Location *</label>
                            <input type="text" name="location" class="form-control" required>
                        </div>
                        
                        <div class="col-md-12 mb-3">
                            <label>Description (Optional)</label>
                            <textarea name="description" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Total Seats *</label>
                            <input type="number" name="total_seats" class="form-control" value="0" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Status *</label>
                            <select name="status" class="form-control" required>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Event Image *</label>
                            <input type="file" name="image" class="form-control" accept="image/*" required>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Save Event</button>
                        <a href="<?= base_url('admin/events') ?>" class="btn btn-default">Cancel</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
</section>

<?= $this->include('admin/layout/footer') ?>
