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

<script src="<?= base_url(); ?>public/assets/sweetalert2/sweetalert2.all.min.js"></script>

<script src="<?= base_url(); ?>public/assets/plugins/select2/js/select2.min.js"></script>


<?= initAlert(); ?>
<script>
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

  let date = new Date();
  let year = date.getFullYear();
  let month = date.getMonth();

  const day = document.querySelector(".calendar-dates");

  if (day) {

    const currdate = document
      .querySelector(".calendar-current-date");

    const prenexIcons = document
      .querySelectorAll(".calendar-navigation span");

    // Array of month names
    const months = [
      "Januari",
      "Februari",
      "Maret",
      "April",
      "Mei",
      "Juni",
      "Juli",
      "Agustus",
      "September",
      "Oktober",
      "November",
      "Desember"
    ];

    // Function to generate the calendar
    const manipulate = () => {

      // Get the first day of the month
      let dayone = new Date(year, month, 1).getDay();

      // Get the last date of the month
      let lastdate = new Date(year, month + 1, 0).getDate();

      // Get the day of the last date of the month
      let dayend = new Date(year, month, lastdate).getDay();

      // Get the last date of the previous month
      let monthlastdate = new Date(year, month, 0).getDate();

      // Variable to store the generated calendar HTML
      let lit = "";

      // Loop to add the last dates of the previous month
      for (let i = dayone; i > 0; i--) {
        lit +=
          `<li class="inactive">${monthlastdate - i + 1}</li>`;
      }

      // Loop to add the dates of the current month
      for (let i = 1; i <= lastdate; i++) {

        // Check if the current date is today
        let isToday = i === date.getDate() &&
          month === new Date().getMonth() &&
          year === new Date().getFullYear() ?
          "active" :
          "";
        lit += `<li class="${isToday}">${i}</li>`;
      }

      // Loop to add the first dates of the next month
      for (let i = dayend; i < 6; i++) {
        lit += `<li class="inactive">${i - dayend + 1}</li>`
      }

      // Update the text of the current date element 
      // with the formatted current month and year
      currdate.innerText = `${months[month]} ${year}`;

      // update the HTML of the dates element 
      // with the generated calendar
      day.innerHTML = lit;
    }

    manipulate();

    // Attach a click event listener to each icon
    prenexIcons.forEach(icon => {

      // When an icon is clicked
      icon.addEventListener("click", () => {

        // Check if the icon is "calendar-prev"
        // or "calendar-next"
        month = icon.id === "calendar-prev" ? month - 1 : month + 1;

        // Check if the month is out of range
        if (month < 0 || month > 11) {

          // Set the date to the first day of the 
          // month with the new year
          date = new Date(year, month, new Date().getDate());

          // Set the year to the new year
          year = date.getFullYear();

          // Set the month to the new month
          month = date.getMonth();
        } else {

          // Set the date to the current date
          date = new Date();
        }

        // Call the manipulate function to 
        // update the calendar display
        manipulate();
      });
    });
  }
</script>


<?= $this->renderSection('script'); ?>