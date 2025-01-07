<?php


function copyright($year = null)
{
  $tahun_start = ($year == null) ? '2023' : $year;
  $tahun_now = date('Y');
  if ($tahun_start == $tahun_now) {
    return $tahun_start;
  } else {
    return $tahun_start . '-' . $tahun_now;
  }
}


function logged($key)
{
  return session()->get($key);
}


if (!function_exists('getProfile')) {

  function getProfile()
  {
    $id = logged('id');
    $data = model('App\Models\UserModel')->select('tb_user.*, title')->join('tb_role', 'tb_role.id = tb_user.role_id')->find($id);
    return $data;
  }
}

function setAlert($icon, $title, $text = '', $type = 'sweetalert', $url = null)
{

  $session = session();

  $session->setFlashdata('iconFlash', $icon);
  $session->setFlashdata('titleFlash', $title);
  $session->setFlashdata('textFlash', $text);
  $session->setFlashdata('typeFlash', $type);
  $session->setFlashdata('urlFlash', $url);
}

function initAlert()
{
  $session = session();
  return "

  <div id='flash' data-icon='" . $session->getFlashdata('iconFlash') . "' data-title='" . $session->getFlashdata('titleFlash') . "' data-text='" . $session->getFlashdata('textFlash') . "' data-url='" . $session->getFlashdata('urlFlash') . "' data-type='" . $session->getFlashdata('typeFlash') . "'></div>

  <script>

  const Swal2 = Swal.mixin({
    customClass: {
      input: 'form-control'
    }
  })
  
  const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })
  
  
  function deleteTombol(e){
    const ket = e.getAttribute('data-ket');
    const href = e.getAttribute('data-href') ? e.getAttribute('data-href') : e.getAttribute('href');
    Swal.fire({
      title: 'Apakah Yakin Menghapus ?',
      text: ket,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Iya, hapus ini'
    }).then((result) => {
      if (result.value) {
        if(href){
          window.location.href = href;
        }else{
          e.parentElement.submit();
        }
      }
    })
    e.preventDefault();
  }
  
  const iconFlash = document.getElementById('flash').getAttribute('data-icon');
  const titleFlash = document.getElementById('flash').getAttribute('data-title');
  const textFlash = document.getElementById('flash').getAttribute('data-text');
  const urlFlash = document.getElementById('flash').getAttribute('data-url');
  const typeFlash = document.getElementById('flash').getAttribute('data-type');


  if(typeFlash == 'sweetalert'){
    
    if (iconFlash && urlFlash) {
      Swal.fire({
        icon: iconFlash,
        title: titleFlash,
        text: textFlash
      }).then((result) => {
        if (result.value) {
          window.location.href = urlFlash;
        }
      })
    } else if (iconFlash) {
      Swal.fire({
        icon: iconFlash,
        title: titleFlash,
        text: textFlash
      })
    }

  }else if(typeFlash =='toast'){
    Toast.fire({
      icon: iconFlash,
      title: titleFlash
    })
  }

  </script>
  
  
  ";
}


// helper cart
function setCart($key, $data = [])
{
  session()->start();
  $get_data = session()->get($key);
  $get_data = ($get_data) ? $get_data : [];
  $new_data = $data;
  $new_data['id'] = time();
  $get_data[] = $new_data;
  return session()->set($key, $get_data);
}


function getCart($key, $id = null)
{
  $get_data = session()->get($key);
  $get_data = ($get_data) ? $get_data : [];

  if ($id == null) {
    return $get_data;
  } else {
    foreach ($get_data as $d) {
      if ($d['id'] == $id) {
        return $d;
      }
    }
  }
}

function updateCart($key, $id, $data = [])
{
  $get_data = session()->get($key);
  $get_data = ($get_data) ? $get_data : [];

  $new_data = [];
  foreach ($get_data as $d) {
    if ($d['id'] == $id) {
      $new_data_update = $data;
      $new_data_update['id'] = $id;
      $new_data[] = $new_data_update;
    } else {
      $new_data[] = $d;
    }
  }
  session()->set($key, $new_data);
  return true;
}

function deleteCart($key, $id)
{
  $get_data = session()->get($key);
  $get_data = ($get_data) ? $get_data : [];

  $new_data = [];
  foreach ($get_data as $d) {
    if ($d['id'] != $id) {
      $new_data[] = $d;
    }
  }
  session()->set($key, $new_data);
  return true;
}



function autonumberDate($id_terakhir, $panjang_kode, $panjang_angka)
{

  // mengambil nilai kode ex: KNS0015 hasil KNS
  $kode = substr($id_terakhir, 0, $panjang_kode);

  // panjang kode
  $lengthKode = strlen($id_terakhir);
  $dateAdd = "";
  if ($lengthKode == $panjang_angka + $panjang_kode) {
    $angka = substr($id_terakhir, $panjang_kode, $panjang_angka);
    $angka_baru = str_repeat("0", $panjang_angka - strlen($angka + 1)) . ($angka + 1);
  } else {

    $panjang_date = $lengthKode - $panjang_angka - $panjang_kode;
    $getDate = substr($id_terakhir, $panjang_kode, $panjang_date);
    // $dateNow = date('ymd');
    $dateNow = date('d/m/Y/');

    // mengambil nilai angka
    // ex: KNS0015 hasilnya 0015
    // jika date nya sama maka kita auto increment jika beda kita reset ke 0000
    if ($dateNow == $getDate) {
      $dateAdd = $getDate;
      $angka = substr($id_terakhir, $panjang_kode + $panjang_date, $panjang_angka);

      // menambahkan nilai angka dengan 1
      // kemudian memberikan string 0 agar panjang string angka menjadi 4
      // ex: angka baru = 6 maka ditambahkan strig 0 tiga kali
      // sehingga menjadi 0006   
      $angka_baru = str_repeat("0", $panjang_angka - strlen($angka + 1)) . ($angka + 1);
    } else {
      $dateAdd = $dateNow;
      $angka_baru = str_repeat('0', $panjang_angka);
    }
  }
  // menggabungkan kode dengan nilang angka baru
  $id_baru = $kode . $dateAdd . $angka_baru;

  return $id_baru;
}


function terbilang($x)
{
  $angka = ["", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas"];

  if ($x < 12)
    return " " . $angka[$x];
  elseif ($x < 20)
    return terbilang($x - 10) . " belas";
  elseif ($x < 100)
    return terbilang($x / 10) . " puluh" . terbilang($x % 10);
  elseif ($x < 200)
    return "seratus" . terbilang($x - 100);
  elseif ($x < 1000)
    return terbilang($x / 100) . " ratus" . terbilang($x % 100);
  elseif ($x < 2000)
    return "seribu" . terbilang($x - 1000);
  elseif ($x < 1000000)
    return terbilang($x / 1000) . " ribu" . terbilang($x % 1000);
  elseif ($x < 1000000000)
    return terbilang($x / 1000000) . " juta" . terbilang($x % 1000000);
}
