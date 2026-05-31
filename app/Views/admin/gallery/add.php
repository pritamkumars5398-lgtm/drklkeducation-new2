<?= $this->include('admin/layout/header') ?>
<?= $this->include('admin/layout/sidebar') ?>

<section class="content">
    <div class="container-fluid">

        <div class="card shadow-sm">
            <div class="card-header">
                <h4 class="mb-0">Add Gallery/Media Item</h4>
            </div>

            <div class="card-body">
                <form action="<?= base_url('admin/gallery/save') ?>" method="POST" enctype="multipart/form-data">
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Title *</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label>Type *</label>
                            <select name="type" class="form-control" required>
                                <option value="photo">Photo Gallery</option>
                                <option value="media">Press Media</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Publish Date *</label>
                            <input type="date" name="publish_date" class="form-control" value="<?= date('Y-m-d') ?>" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Category (Optional)</label>
                            <input type="text" name="category" class="form-control" placeholder="E.g., Event, Campaign">
                        </div>
                        
                        <div class="col-md-12 mb-3">
                            <label>Description (Optional)</label>
                            <textarea name="description" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Status *</label>
                            <select name="status" class="form-control" required>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>

                        <div class="col-md-8 mb-3">
                            <label>Image/Thumbnail *</label>
                            <input type="file" name="image" class="form-control" accept="image/*" required>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Video URL (Optional, for Media)</label>
                            <input type="url" name="video_url" class="form-control" placeholder="E.g., https://youtube.com/...">
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="is_featured" value="1" id="is_featured">
                                <label class="form-check-label" for="is_featured">
                                    Mark as Featured
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Save Item</button>
                        <a href="<?= base_url('admin/gallery') ?>" class="btn btn-default">Cancel</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
</section>

<?= $this->include('admin/layout/footer') ?>
