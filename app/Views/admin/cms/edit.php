<?= $this->include('admin/layout/header') ?>
<?= $this->include('admin/layout/sidebar') ?>

<section class="content">
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header">
                <h4 class="mb-0">Edit Page: <?= esc($page['title']) ?></h4>
            </div>
            <div class="card-body">
                <form action="<?= base_url('admin/cms/update/'.$page['id']) ?>" method="POST">
                    <div class="form-group mb-3">
                        <label>Page Title</label>
                        <input type="text" name="title" class="form-control" value="<?= esc($page['title']) ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Slug</label>
                        <input type="text" class="form-control" value="<?= esc($page['slug']) ?>" disabled>
                    </div>
                    <div class="form-group mb-3">
                        <label>Content</label>
                        <textarea name="content" id="cmsEditor" class="form-control"><?= $page['content'] ?></textarea>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Update Page</button>
                        <a href="<?= base_url('admin/cms') ?>" class="btn btn-default">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Include CKEditor 4 -->
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        CKEDITOR.replace('cmsEditor', {
            height: 400,
            versionCheck: false
        });
    });
</script>

<?= $this->include('admin/layout/footer') ?>
