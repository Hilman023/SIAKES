<!-- jQuery -->
<script src="<?= base_url(); ?>public/assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url(); ?>public/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url(); ?>public/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>public/assets/dist/js/adminlte.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url(); ?>public/assets/plugins/chart.js/Chart.min.js"></script>
<!-- sweet alert -->
<script src="<?= base_url(); ?>public/assets/sweetalert2/sweetalert2.all.min.js"></script>
<!-- select2 -->
<script src="<?= base_url(); ?>public/assets/plugins/select2/js/select2.min.js"></script>

<script src="<?= base_url(); ?>public/assets/plugins/autonumeric/autoNumeric.min.js"></script>

<script src="<?= base_url(); ?>public/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>public/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>public/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>public/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>public/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>public/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>public/assets/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url(); ?>public/assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url(); ?>public/assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url(); ?>public/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url(); ?>public/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url(); ?>public/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>



<?= initAlert(); ?>
<script>
  // window.onscroll = function() {

  //   // myFunction();
  // };

  function setNumeric() {

    $('.uang').autoNumeric('init', {
      aDec: ',',
      aSep: '.',
      mDec: '0',
      vMin: '0.00'
    });
  }


  $.fn.select2.defaults.set("theme", "bootstrap");

  $('select.form-control').select2({
    theme: 'bootstrap4',
    width: '100%' // need to override the changed default
    // width: 'resolve' // need to override the changed default
  })

  function previewImage(input, previewDom) {

    if (input.files && input.files[0]) {

      $(previewDom).show();

      var reader = new FileReader();

      reader.onload = function(e) {
        $(previewDom).find('img').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    } else {
      $(previewDom).hide();
    }

  }

  $(function() {
    $("#table2").DataTable({
      "responsive": true,
      dom: 'Bflrtip',
      buttons: [{
        extend: 'print',
        className: "btn bg-tranparent btn-sm btn-secondary",
        footer: true
      }, {
        extend: 'excel',
        className: "btn bg-tranparent btn-sm btn-success",
        footer: true
      }, ],
      "pageLength": 5,
      "lengthMenu": [
        [5, 100, 1000, -1],
        [5, 100, 1000, "ALL"],
      ],
    });

  });

  function setDataTables(id) {
    $(id).DataTable({
      "responsive": true,
      dom: 'Bflrtip',
      buttons: [{
        extend: 'excel',
        className: "btn bg-tranparent btn-sm btn-success",
        footer: true
      }, ],
      "pageLength": 5,
      "lengthMenu": [
        [5, 100, 1000, -1],
        [5, 100, 1000, "ALL"],
      ],
    });
  }
</script>

<script>
  $(function() {})
</script>


<?= $this->renderSection('script'); ?>