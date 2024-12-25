<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Edit <?= $title; ?></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
          <li class="breadcrumb-item"><?= $title; ?></li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>
      </div>
      <!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <form action="<?= base_url($link . '/' . $data['id']); ?>" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-6 mb-2">
          <div class="card">
            <div class="card-body">

              <?= csrf_field(); ?>
              <input type='hidden' name='_method' value='PUT' />
              <!-- GET, POST, PUT, PATCH, DELETE-->


              <div class="row">
                <div class="col-md-6 mb-2">
                  <div class="form-group">
                    <label for="no_transaksi">No Transaksi</label>
                    <input readonly type="text" id="no_transaksi" name="no_transaksi" class="form-control" value="<?= $data['no_transaksi']; ?>">
                  </div>

                </div>
                <div class="col-md-6 mb-2">
                  <div class="form-group">
                    <label for="tanggal_transaksi">Tanggal Transaksi</label>
                    <input readonly type="text" id="tanggal_transaksi" name="tanggal_transaksi" class="form-control" value="<?= $data['tanggal_transaksi']; ?>">
                  </div>

                </div>
              </div>


              <div class="row">
                <div class="col-md-6 mb-2">
                  <div class="form-group">
                    <label for="jenis_aktor">Jenis Aktor</label>
                    <input readonly type="text" class="form-control" value="<?= $data['jenis_aktor']; ?>">
                  </div>

                </div>
                <div class="col-md-6 mb-2">
                  <div class="form-group">
                    <label for="nama_aktor">Aktor</label>
                    <input readonly type="text" id="nama_aktor" name="nama_aktor" class="form-control" value="<?= $data['nama_aktor']; ?>">
                  </div>

                </div>
              </div>

              <div id="view-siswa" class="<?= ($data['jenis_aktor'] == 'siswa') ? '' : 'd-none'; ?>">

                <div class="row">
                  <div class="col-md-6 mb-2">
                    <div class="form-group">
                      <label for="nama_kelas">Kelas</label>
                      <input type="text" readonly id="nama_kelas" name="nama_kelas" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6 mb-2">
                    <div class="form-group">
                      <label for="nama_jurusan">Jurusan</label>
                      <input type="text" readonly id="nama_jurusan" name="nama_jurusan" class="form-control">
                    </div>
                  </div>
                </div>


                <div class="row">
                  <div class="col-md-6 mb-2">
                    <div class="form-group">
                      <label for="nama_tahun">Tahun</label>
                      <input type="text" readonly id="nama_tahun" name="nama_tahun" class="form-control">
                    </div>

                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-2">
                  <div class="form-group">
                    <label for="id_kategori">Kategori</label>
                    <input readonly type="text" class="form-control" value="<?= $data['nama_kategori']; ?>">
                  </div>

                </div>

                <div class="col-md-6 mb-2">
                  <div class="form-group">
                    <label for="id_kategori_sub">Kategori Sub</label>
                    <input readonly type="text" class="form-control" value="<?= $data['nama_kategori_sub']; ?>">
                  </div>

                </div>
              </div>







            </div>
          </div>
        </div>
        <div class="col-md-6 mb-2">
          <div class="card">
            <div class="card-body">

              <div class="row">
                <div class="col-md-6 mb-2">
                  <div class="form-group">
                    <label for="id_kategori">Kategori</label>
                    <select disabled required name="id_kategori" id="id_kategori" class="form-control <?= ($error = validation_show_error('id_kategori')) ? 'border-danger' : ''; ?>">
                      <option disabled selected>== SELECT ==</option>
                      <?php foreach ($kategori as $d): ?>
                        <?php if ($data['nama_kategori'] == $d['nama']): ?>
                          <option selected value="<?= $d['id']; ?>"><?= $d['nama']; ?></option>
                        <?php else: ?>
                          <option value="<?= $d['id']; ?>"><?= $d['nama']; ?></option>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <?= ($error) ? '<div class="error text-danger mb-2" style="margin-top: -15px">' . $error . '</div>' : ''; ?>

                </div>

                <div class="col-md-6 mb-2">
                  <div class="form-group">
                    <label for="id_kategori_sub">Kategori Sub</label>
                    <select required disabled name="id_kategori_sub" id="id_kategori_sub" class="form-control <?= ($error = validation_show_error('id_kategori_sub')) ? 'border-danger' : ''; ?>">
                    </select>
                  </div>
                  <?= ($error) ? '<div class="error text-danger mb-2" style="margin-top: -15px">' . $error . '</div>' : ''; ?>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-2">
                  <div class="form-group">
                    <label for="item">Item</label>
                    <select required disabled name="item" id="item" class="form-control <?= ($error = validation_show_error('item')) ? 'border-danger' : ''; ?>">
                    </select>
                  </div>
                  <?= ($error) ? '<div class="error text-danger mb-2" style="margin-top: -15px">' . $error . '</div>' : ''; ?>
                </div>

                <div class="col-md-6 mb-2">
                  <div class="form-group">
                    <label for="qty">Qty</label>
                    <input type="number" readonly class="form-control <?= ($error = validation_show_error('qty')) ? 'border-danger' : ''; ?>" id="qty" name="qty">
                  </div>
                  <?= ($error) ? '<div class="error text-danger mb-2" style="margin-top: -15px">' . $error . '</div>' : ''; ?>
                </div>
              </div>

              <div class="row">

                <div class="col-md-6 mb-2">
                  <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" readonly class="form-control <?= ($error = validation_show_error('harga')) ? 'border-danger' : ''; ?>" id="harga" name="harga">
                  </div>
                  <?= ($error) ? '<div class="error text-danger mb-2" style="margin-top: -15px">' . $error . '</div>' : ''; ?>
                </div>

                <div class="col-md-6 mb-2">
                  <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea readonly name="keterangan" id="keterangan" class="form-control <?= ($error = validation_show_error('qty')) ? 'border-danger' : ''; ?>"></textarea>
                  </div>
                  <?= ($error) ? '<div class="error text-danger mb-2" style="margin-top: -15px">' . $error . '</div>' : ''; ?>
                </div>
              </div>

              <div class="row">

                <div class="col-md-6 mb-2">
                  <div class="form-group">
                    <label for="subtotal">Sub Total</label>
                    <input type="number" readonly class="form-control <?= ($error = validation_show_error('subtotal')) ? 'border-danger' : ''; ?>" id="subtotal" name="subtotal">
                  </div>
                  <?= ($error) ? '<div class="error text-danger mb-2" style="margin-top: -15px">' . $error . '</div>' : ''; ?>
                </div>
              </div>




              <button type="button" id="add" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>



            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-8 mb-2">
          <div class="card">
            <div class="card-body">
              <h5>Detail Transaksi</h5>
              <table class="table">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Item</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th>Sub Total</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="res-item">

                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-2">
          <div class="card">
            <div class="card-body">
              <div class="form-group">
                <label for="total_nominal">Total Nominal</label>
                <input type="text" readonly class="form-control <?= ($error = validation_show_error('total_nominal')) ? 'border-danger' : ''; ?>" id="total_nominal" name="total_nominal">
              </div>
              <?= ($error) ? '<div class="error text-danger mb-2" style="margin-top: -15px">' . $error . '</div>' : ''; ?>

              <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Simpan</button>
              <a href="<?= base_url($link); ?>" class="btn btn-secondary">Batal</a>

            </div>
          </div>
        </div>
      </div>
    </form>


  </div>
</section>
<?= $this->endSection('content') ?>


<?= $this->section('script') ?>

<script>
  $('#jenis_aktor').on('change', function() {
    var jenis_aktor = $(this).val();
    $('#view-siswa').addClass('d-none');
    $.ajax({
      url: '<?= base_url($link); ?>/ajax_list_aktor',
      method: 'GET', // POST
      data: {
        jenis_aktor: jenis_aktor
      },
      dataType: 'json', // json
      success: function(data) {
        if (data.success !== false) {
          $('#id_aktor').removeAttr('disabled');
          var array = data.data
          var list = '<option selected disabled>== SELECT ==</option>';
          for (let index = 0; index < array.length; index++) {
            const element = array[index];
            list += `<option value="` + element.id_aktor + `">` + element.nama + ` ( ` + element.nomer_induk + ` )</option>`;
          }

          $('#id_aktor').html(list);

        } else {
          $('#id_aktor').html('');
          $('#id_aktor').attr('disabled', true);
        }
      }
    });
  })

  $('#id_aktor').on('change', function() {
    var jenis_aktor = $('#jenis_aktor').val();
    var id_aktor = $('#id_aktor').val();
    if (jenis_aktor == 'siswa') {
      $('#view-siswa').removeClass('d-none');

      $.ajax({
        url: '<?= base_url($link); ?>/ajax_aktor',
        method: 'GET', // POST
        data: {
          jenis_aktor: jenis_aktor,
          id_aktor: id_aktor,
        },
        dataType: 'json', // json
        success: function(data) {
          if (data.success !== false) {
            $('#nama_kelas').val(data.data.nama_kelas);
            $('#nama_jurusan').val(data.data.nama_jurusan);
            $('#nama_tahun').val(data.data.nama_tahun);
          } else {
            $('#nama_kelas').val('');
            $('#nama_jurusan').val('');
            $('#nama_tahun').val('');
          }
        }
      });
    } else {
      $('#view-siswa').addClass('d-none');
    }
  })


  $('#id_kategori').on('change', function() {
    setKategoriSub();
  })

  setKategoriSub();

  function setKategoriSub() {
    var id = $('#id_kategori').val();
    $.ajax({
      url: '<?= base_url($link); ?>/ajax_kategori_sub',
      method: 'GET', // POST
      data: {
        id: id
      },
      dataType: 'json', // json
      success: function(data) {
        if (data.success !== false) {
          $('#id_kategori_sub').removeAttr('disabled');
          var array = data.data
          var list = '<option selected disabled>== SELECT ==</option>';
          for (let index = 0; index < array.length; index++) {
            const element = array[index];
            var is_manual = (element.is_manual == 1) ? 'Manual' : 'Auto'
            var id_kategori_sub = '<?= $data['id_kategori_sub']; ?>';
            if (id_kategori_sub == element.id) {

              list += `<option selected value="` + element.id + `">` + element.nama + ` ( ` + is_manual + ` )</option>`;
            } else {
              list += `<option value="` + element.id + `">` + element.nama + ` ( ` + is_manual + ` )</option>`;

            }
          }


          $('#id_kategori_sub').html(list);

          $('#id_kategori_sub').attr('disabled', true);

          setItem();

        } else {
          $('#qty').attr('readonly', true);
          $('#harga').attr('readonly', true);
          $('#id_kategori_sub').html('');
          $('#id_kategori_sub').attr('disabled', true);
        }
      }
    });
  }

  $('#id_kategori_sub').on('change', function() {
    setItem();
  })

  setItem();

  function setItem() {
    var id = $('#id_kategori_sub').val();
    $.ajax({
      url: '<?= base_url($link); ?>/ajax_item_transaksi',
      method: 'GET', // POST
      data: {
        id: id
      },
      dataType: 'json', // json
      success: function(data) {
        if (data.success !== false) {
          $('#item').removeAttr('disabled');
          var array = data.data
          var list = '<option selected disabled>== SELECT ==</option>';
          for (let index = 0; index < array.length; index++) {
            const element = array[index];
            list += `<option value="` + element.nama + `">` + element.nama + `</option>`;
          }

          $('#item').html(list);

          $('#qty').removeAttr('readonly');

          if (data.is_manual == 1) {
            $('select.form-control#item').select2({
              theme: 'bootstrap4',
              tags: true,
              width: '100%' // need to override the changed default
              // width: 'resolve' // need to override the changed default
            })


            $('#harga').removeAttr('readonly');
            $('#keterangan').removeAttr('readonly');


          } else {
            $('#harga').attr('readonly', true);
            $('#keterangan').attr('readonly', true);
          }


        } else {

          $('#harga').attr('readonly', true);
          $('#keterangan').attr('readonly', true);
          $('#item').html('');
          $('#item').attr('disabled', true);
        }
        resetDetail();
      }
    });
  }


  $('#item').on('change', function() {
    var id = $(this).val();

    $.ajax({
      url: '<?= base_url($link); ?>/ajax_item',
      method: 'GET', // POST
      data: {
        id: id
      },
      dataType: 'json', // json
      success: function(data) {
        if (data.success !== false) {
          $('#qty').val(data.data.qty);
          $('#harga').val(data.data.nominal);
          $('#keterangan').val(data.data.keterangan);

          calSubTotal();
        } else {
          resetDetail();
        }
      }
    });
  })

  $('#qty').on('keyup', calSubTotal);
  $('#harga').on('keyup', calSubTotal);

  function resetDetail() {
    $('#qty').val('');
    $('#harga').val('');
    $('#keterangan').val('');
    $('#subtotal').val('');
  }


  function calSubTotal() {
    var harga = parseFloat($('#harga').val());
    var qty = parseFloat($('#qty').val());
    $('#subtotal').val(harga * qty);
  }

  $('#add').on('click', function() {
    var item = $('#item').val();
    var qty = $('#qty').val();
    var harga = $('#harga').val();
    var keterangan = $('#keterangan').val();
    var subtotal = $('#subtotal').val();

    $.ajax({
      url: '<?= base_url($link); ?>/set_item',
      method: 'GET', // POST
      data: {
        item: item,
        qty: qty,
        harga: harga,
        keterangan: keterangan,
        subtotal: subtotal,
      },
      dataType: 'json', // json
      success: function(data) {
        if (data.success !== false) {
          resetDetail();
          getItem();
        }
      }
    });
  })

  getItem();

  function getItem() {
    $.ajax({
      url: '<?= base_url($link); ?>/get_item',
      method: 'GET', // POST
      data: {
        // id: id
      },
      dataType: 'json', // json
      success: function(data) {
        if (data.success !== false) {
          var list = '';
          var array = data.data;
          var total_nominal = 0;
          for (let index = 0; index < array.length; index++) {
            const element = array[index];
            total_nominal += parseFloat(element.subtotal);
            list += `<tr>
              <td>` + (index + 1) + `</td>
              <td>` + element.item + `</td>
              <td>` + element.qty + `</td>
              <td>` + element.harga + `</td>
              <td>` + element.subtotal + `</td>
              <td>` + element.keterangan + `</td>
              <td><button type="button" onclick="deleteItem(` + element.id + `)" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button></td>

              
            </tr>`

          }

          $('#res-item').html(list);
          $('#total_nominal').val(total_nominal);
        }
      }
    });
  }

  function deleteItem(id) {
    $.ajax({
      url: '<?= base_url($link); ?>/delete_item',
      method: 'GET', // POST
      data: {
        id: id
      },
      dataType: 'json', // json
      success: function(data) {
        if (data.success !== false) {
          getItem();
        }
      }
    });
  }
</script>
<?= $this->endSection('script') ?>