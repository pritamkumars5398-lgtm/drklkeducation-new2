<?= $this->include('frontend/layout/header'); ?>

<div class="container my-5">

    <!-- Title -->
    <div class="text-center mb-4">
        <button class="btn title-btn">Audit Reports</button>
    </div>

    <!-- Table -->
    <div class="table-responsive">

        <table class="table table-bordered text-center audit-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Financial Year</th>
                    <th>Report Name</th>
                    <th>Download</th>
                </tr>
            </thead>

            <tbody>

                <?php for($i=1; $i<=5; $i++): ?>
                <tr>
                    <td><?= $i ?></td>
                    <td>202<?= $i ?> - 202<?= $i+1 ?></td>
                    <td>Audit Report <?= $i ?></td>
                    <td>
                        <button type="button" class="btn btn-sm btn-danger view-pdf-btn" 
                                data-bs-toggle="modal" 
                                data-bs-target="#pdfModal" 
                                data-pdf="<?= base_url('pdf/audit'.$i.'.pdf') ?>" 
                                data-title="Audit Report <?= $i ?> (202<?= $i ?> - 202<?= $i+1 ?>)">
                            📄 View PDF
                        </button>
                    </td>
                </tr>
                <?php endfor; ?>

            </tbody>

        </table>

    </div>

</div>

<!-- PDF Viewer Modal -->
<div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header border-bottom-0 pb-0">
        <h5 class="modal-title fw-bold" id="pdfModalLabel">View Audit Report</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-3" style="height: 80vh;">
        <iframe id="pdfIframe" src="" width="100%" height="100%" style="border: 1px solid #ddd; border-radius: 4px;"></iframe>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var pdfModal = document.getElementById('pdfModal');
    if(pdfModal) {
        pdfModal.addEventListener('show.bs.modal', function (event) {
            // Button that triggered the modal
            var button = event.relatedTarget;
            // Extract info from data-* attributes
            var pdfUrl = button.getAttribute('data-pdf');
            var pdfTitle = button.getAttribute('data-title');
            
            // Update the modal's content.
            var modalTitle = pdfModal.querySelector('.modal-title');
            var iframe = pdfModal.querySelector('#pdfIframe');
            
            modalTitle.textContent = pdfTitle;
            iframe.src = pdfUrl;
        });
        
        pdfModal.addEventListener('hidden.bs.modal', function() {
            // Clear iframe src when modal is closed to stop loading
            var iframe = pdfModal.querySelector('#pdfIframe');
            iframe.src = "";
        });
    }
});
</script>

<?= $this->include('frontend/layout/footer'); ?>