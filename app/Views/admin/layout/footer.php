



 <!-- Jquery Core Js -->
    <script src="<?= base_url('admin/assets/plugins/jquery/jquery.min.js') ?>"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?= base_url('admin/assets/plugins/bootstrap/js/bootstrap.js') ?>"></script>

    <!-- Select Plugin Js -->
    <script src="<?= base_url('admin/assets/plugins/bootstrap-select/js/bootstrap-select.js') ?>"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?= base_url('admin/assets/plugins/jquery-slimscroll/jquery.slimscroll.js') ?>"></script>

    <!-- Bootstrap Colorpicker Js -->
    <script src="<?= base_url('admin/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js') ?>"></script>

    <!-- Dropzone Plugin Js -->
    <script src="<?= base_url('admin/assets/plugins/dropzone/dropzone.js') ?>"></script>

    <!-- Input Mask Plugin Js -->
    <script src="<?= base_url('admin/assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js') ?>"></script>

    <!-- Multi Select Plugin Js -->
    <script src="<?= base_url('admin/assets/plugins/multi-select/js/jquery.multi-select.js') ?>"></script>

   
  


    <!-- Waves Effect Plugin Js -->
    <script src="<?= base_url('admin/assets/plugins/node-waves/waves.js') ?>"></script>

       <!-- Jquery CountTo Plugin Js -->
    <script src="<?= base_url('admin/assets/plugins/jquery-countto/jquery.countTo.js') ?>"></script>

    <!-- Morris Plugin Js -->
    <script src="<?= base_url('admin/assets/plugins/raphael/raphael.min.js') ?>"></script>
    <script src="<?= base_url('admin/assets/plugins/morrisjs/morris.js') ?>"></script>
      <!-- ChartJs -->
    <script src="<?= base_url('admin/assets/plugins/chartjs/Chart.bundle.js') ?>"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="<?= base_url('admin/assets/plugins/flot-charts/jquery.flot.js') ?>"></script>
    <script src="<?= base_url('admin/assets/plugins/flot-charts/jquery.flot.resize.js') ?>"></script>
    <script src="<?= base_url('admin/assets/plugins/flot-charts/jquery.flot.pie.js') ?>"></script>
    <script src="<?= base_url('admin/assets/plugins/flot-charts/jquery.flot.categories.js') ?>"></script>
    <script src="<?= base_url('admin/assets/plugins/flot-charts/jquery.flot.time.js') ?>"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="<?= base_url('admin/assets/plugins/jquery-sparkline/jquery.sparkline.js') ?>"></script>

      <!-- Jquery DataTable Plugin Js -->
    <script src="<?= base_url('admin/assets/plugins/jquery-datatable/jquery.dataTables.js') ?>"></script>
    <script src="<?= base_url('admin/assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') ?>"></script>
    <script src="<?= base_url('admin/assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') ?>"></script>
    <script src="<?= base_url('admin/assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') ?>"></script>
    <script src="<?= base_url('admin/assets/plugins/jquery-datatable/extensions/export/jszip.min.js') ?>"></script>
    <script src="<?= base_url('admin/assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js') ?>"></script>
    <script src="<?= base_url('admin/assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js') ?>"></script>
    <script src="<?= base_url('admin/assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') ?>"></script>
    <script src="<?= base_url('admin/assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js') ?>"></script>

    <!-- Custom Js -->
    <script src="<?= base_url('admin/assets/js/admin.js') ?>"></script>
    <script src="<?= base_url('admin/assets/js/pages/tables/jquery-datatable.js') ?>"></script>


    <!-- Demo Js -->
    <script src="<?= base_url('admin/assets/js/demo.js') ?>"></script>

    <!-- test section start-->
      <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
    const ctx = document.getElementById('positionChart').getContext('2d');
    const labels = ['Oct 27', 'Oct 28', 'Oct 29', 'Oct 30', 'Oct 31'];
    const data = [1.7, 2.2, 3.9, 4.6, 5.3];

    new Chart(ctx, {
      type: 'line',
      data: {
        labels: labels,
        datasets: [{
          data: data,
          borderColor: '#fb8c00',
          backgroundColor: 'rgba(251, 140, 0, 0.12)',
          fill: false,
          tension: 0.35,
          pointBackgroundColor: '#ffffff',
          pointBorderColor: '#fb8c00',
          pointRadius: 6,
          pointHoverRadius: 8,
          pointHoverBorderWidth: 3,
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: { display: false },
          tooltip: {
            backgroundColor: '#fff',
            titleColor: '#333',
            bodyColor: '#333',
            borderColor: '#eee',
            borderWidth: 1,
            padding: 12,
            displayColors: false,
            callbacks: {
              title: function(items) { return items[0].label; },
              label: function(context) { return `Average Position: ${context.parsed.y}`; }
            }
          }
        },
        scales: {
          x: {
            grid: { display: false },
            ticks: { color: '#90a4ae', font: { family: 'Roboto', weight: 'bold' } }
          },
          y: {
            min: 1,
            max: 7,
            grid: { color: '#f1f1f1' },
            ticks: { color: '#b0bec5', stepSize: 0.5 }
          }
        },
        layout: {
          padding: {
            top: 0, right: 0, left: 0, bottom: 0
          }
        }
      }
    });
  </script>
    <!-- test section end -->

    <script>
    const toggleButton = document.querySelector('.theme-toggle');

    toggleButton.addEventListener('click', () => {
      document.body.classList.toggle('dark-mode');
      
      // Save mode in local storage
      if (document.body.classList.contains('dark-mode')) {
        localStorage.setItem('theme', 'dark');
      } else {
        localStorage.setItem('theme', 'light');
      }
    });

    // Load saved theme on page load
    if (localStorage.getItem('theme') === 'dark') {
      document.body.classList.add('dark-mode');
    }
  </script>


<script>
$(document).ready(function () {
    $('#memberTable').DataTable({
        dom: 'Bfrtip',
        buttons: ['excel', 'pdf', 'csv']
    });
});
</script>


</body>
</html>