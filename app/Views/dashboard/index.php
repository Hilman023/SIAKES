<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
      </div>
      <!-- /.col 
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Dashboard</a></li>
        </ol>
      </div> -->

    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <p>Pemasukan bulan ini</p>
            <!-- data yang ditampilkan dari total jumlah pemasukan perbulan -->
            <font size="5">Rp. </font>
            <font size="6"><b><?= number_format($pemasukan, 0, ',', '.'); ?></b></font>
          </div>
          <div class="icon">
            <i class="fas fa-download"></i>
          </div>
          <a href="#" class="small-box-footer"></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <p>Pengeluaran bulan ini</p>
            <!-- data yang ditampilkan dari total jumlah pengeluaran perbulan -->
            <font size="5">Rp. </font>
            <font size="6"><b><?= number_format($pengeluaran, 0, ',', '.'); ?></b></font>
          </div>
          <div class="icon">
            <i class="fas fa-upload"></i>
          </div>
          <a href="#" class="small-box-footer"></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <p>Saldo Kas</p>
            <!-- data yang ditampilkan dari total sisa jumlah uang -->
            <font size="5">Rp. </font>
            <font size="6"><b><?= (count($saldo) > 0) ? number_format($saldo[0]['saldo'], 0, ',', '.') : 0; ?></b></font>
          </div>
          <div class="icon">
            <i class="fas fa-money-bill-wave-alt"></i>
          </div>
          <a href="#" class="small-box-footer"></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <p>Total Siswa</p>
            <!-- data yang ditampilkan dari jumlah crud siswa yang dibuat -->
            <font size="6"><b><?= $siswa; ?></b></font>
          </div>
          <div class="icon">
            <i class="fas fa-users"></i>
          </div>
          <a href="#" class="small-box-footer"></a>
        </div>
      </div>
    </div>

    <!-- ./col -->
    <div class="row">
      <!-- BAR CHART -->
      <div class="col-lg-8 col-md-6 col-12">
        <div class="card bg-white">
          <div class="card-header">
            <div class="row">
              <div class="col">
                <h3 class="card-title">
                  <i class="far fa-chart-bar mr-1"></i>
                  Grafik Pemasukan & Pengeluaran
                </h3>
              </div>
              <div class="col-2">
                <select name="chart_tahun" id="chart_tahun" class="form-control form-control-sm">
                  <?php foreach ($chart_tahun as $d): ?>
                    <?php if ($select_tahun == $d['tahun']): ?>
                      <option selected><?= $d['tahun']; ?></option>
                    <?php else: ?>
                      <option><?= $d['tahun']; ?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
          </div>
          <div class="card-body bg-white">
            <div class="chart">
              <canvas id="barChart"></canvas>
            </div>
          </div>
        </div>
      </div>

      <!-- Calender -->
      <div class="col-lg-4 col-md-6 col-12">
        <div class="card bg-white">
          <div class="card-header">
            <div class="row justify-content-between">
              <div class="col-10">
                <h3 class="card-title">
                  <i class="far fa-calendar-alt mr-1"></i>
                  Kalender
                  <b class="calendar-current-date ml-1"></b>
                </h3>

              </div>
              <div class="col">
                <div class="calendar-navigation">
                  <span id="calendar-prev" class="fas fa-caret-square-left">
                  </span>
                  <span id="calendar-next" class="fas fa-caret-square-right">
                  </span>
                </div>

              </div>
            </div>
            <!--  -->
          </div>

          <div class=" calendar-body">
            <ul class="calendar-weekdays">
              <li>Min</li>
              <li>Sen</li>
              <li>Sel</li>
              <li>Rab</li>
              <li>Kam</li>
              <li>Jum</li>
              <li>Sab</li>
            </ul>
            <ul class="calendar-dates"></ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</section>

<!-- /.content -->
<?= $this->endSection('content') ?>


<?= $this->section('script') ?>
<script>
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

  // setup 
  const data = {
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
    datasets: [{
      label: 'Pemasukan',
      data: <?= json_encode($chart_pemasukan); ?>,
      backgroundColor: 'rgb(40,167,69)',
      borderColor: 'rgb(40,167,69)',
      borderWidth: 1
    }, {
      label: 'Pengeluaran',
      data: <?= json_encode($chart_pengeluaran); ?>,
      backgroundColor: 'rgb(220,53,69)',
      borderColor: 'rgb(220,53,69)',
      borderWidth: 1
    }]
  };

  // config 
  const config = {
    type: 'bar',
    data,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  };

  // render init block
  const myChart = new Chart(
    document.getElementById('barChart'),
    config
  );

  $('#chart_tahun').on('change', function() {
    var tahun = $('#chart_tahun').val();
    window.location.href = '<?= base_url(); ?>dashboard?tahun=' + tahun
  })
</script>

<?= $this->endSection('script') ?>