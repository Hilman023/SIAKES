<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><?= $title; ?> Baru</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item"><?= $title; ?></li>
                    <li class="breadcrumb-item active">Baru</li>
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
        <form action="<?= base_url($link); ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-5 mb-2">
                    <div class="card">
                        <div class="card-body">

                            <?= csrf_field(); ?>

                            <?php

                            $request = \Config\Services::request();
                            $custom_id = $request->getVar('id');

                            ?>

                            <div class="form-group">
                                <label for="id_transaksi">Transaksi</label>
                                <select class="form-control <?= ($error = validation_show_error('id_transaksi')) ? 'border-danger' : ''; ?>" name="id_transaksi" id="id_transaksi">
                                    <option disabled selected>== PILIH ==</option>
                                    <?php foreach ($transaksi as $d): ?>
                                        <?php if ($custom_id == $d['id']): ?>

                                            <option selected value="<?= $d['id']; ?>"><?= $d['no_transaksi']; ?> - <?= $d['nama_aktor']; ?></option>
                                        <?php else: ?>
                                            <option value="<?= $d['id']; ?>"><?= $d['no_transaksi']; ?> - <?= $d['nama_aktor']; ?></option>

                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <?= ($error) ? '<div class="error text-danger mb-2" style="margin-top: -15px">' . $error . '</div>' : ''; ?>



                            <div class="form-group">
                                <label for="method">Metode Pembayaran</label>
                                <select class="form-control <?= ($error = validation_show_error('method')) ? 'border-danger' : ''; ?>" name="method" id="method">
                                    <?php foreach ($method as $d): ?>

                                        <option><?= $d; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <?= ($error) ? '<div class="error text-danger mb-2" style="margin-top: -15px">' . $error . '</div>' : ''; ?>

                            <div class="form-group">
                                <label for="tagihan">Tagihan</label>
                                <input type="text" readonly id="tagihan" name="tagihan" class="form-control uang">
                            </div>

                            <div class="form-group">
                                <button type="button" id="bayar-50" class="btn btn-warning btn-sm">50%</button>
                                <button type="button" id="bayar-100" class="btn btn-primary btn-sm">100%</button>
                            </div>

                            <div class="form-group">
                                <label for="bayar_nominal">Bayar</label>
                                <input type="text" id="bayar_nominal" name="bayar_nominal" class="form-control uang <?= ($error = validation_show_error('bayar_nominal')) ? 'border-danger' : ''; ?>">
                            </div>
                            <?= ($error) ? '<div class="error text-danger mb-2" style="margin-top: -15px">' . $error . '</div>' : ''; ?>

                            <!-- <div class="form-group">
                                <label for="kembalian">Kembalian</label>
                                <input type="number" readonly id="kembalian" name="kembalian" class="form-control">
                            </div> -->




                        </div>
                    </div>
                </div>
                <div class="col-md-7 mb-2">
                    <div class="card">
                        <div class="card-body">
                            <h5>Detail Transaksi</h5>
                            <div class="table-responsive">
                                <table class="table w-100">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Item</th>
                                            <th>Keterangan</th>
                                            <th>Qty</th>
                                            <th>Total</th>
                                            <th>Bayar</th>
                                            <th>Alokasi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="res-item">

                                    </tbody>
                                </table>

                            </div>


                            <div class="row mt-4">
                                <div class="col">

                                    <button type="submit" id="add" class="btn btn-primary "><i class="fas fa-check"></i> Bayar</button>
                                    <a href="<?= base_url($link); ?>" class="btn btn-secondary">Batal</a>
                                </div>
                            </div>



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
    $('#id_transaksi').on('change', function() {
        $('#bayar_nominal').val(0);
        setDetail(0);
    })

    <?php if ($custom_id): ?>
        setDetail();

    <?php endif; ?>

    function setDetail(bayar_nominal = 0) {
        var id_transaksi = $('#id_transaksi').val();
        $.ajax({
            url: '<?= base_url($link); ?>/ajax_transaksi_detail',
            method: 'GET', // POST
            data: {
                id_transaksi: id_transaksi
            },
            dataType: 'json', // json
            success: function(data) {
                if (data.success !== false) {
                    var list = '';
                    var array = data.data.detail;
                    var alokasi = parseFloat(bayar_nominal);

                    var bayar = 0;
                    var bayar_alokasi = 0;
                    for (let index = 0; index < array.length; index++) {
                        const element = array[index];

                        done = (parseFloat(element.bayar_nominal) == parseFloat(element.subtotal)) ? true : false;

                        if (!done) {
                            bayar = (parseFloat(element.bayar_nominal) == 0) ? parseFloat(element.subtotal) : parseFloat(element.bayar_nominal);

                            // bayar_alokasi = (bayar >= alokasi) ? alokasi : alokasi - bayar;
                            // bayar_alokasi = (bayar >= alokasi) ? alokasi : ((alokasi >= bayar) ? alokasi : alokasi - bayar);
                            bayar_alokasi = ((bayar >= alokasi) || (alokasi >= bayar)) ? alokasi : alokasi - bayar;
                            // jika yang di bayar lebih sama alokasi yang akan di bayar maka pake alokasi, 

                            alokasi = (bayar >= alokasi) ? ((alokasi == 0) ? 0 : bayar - alokasi) : alokasi - bayar;
                        }

                        attr_done = (done) ? 'disabled' : '';

                        list += `<tr>
                                    <td>` + (index + 1) + `</td>
                                    <td>` + element.item + `</td>
                                    <td>` + element.keterangan + `</td>
                                    <td>` + element.qty + `</td>
                                    <td  class="uang">` + element.subtotal + `</td>
                                    <td  class="bayar uang ">` + element.bayar_nominal + `</td>
                                    <td>
                                        <input type="hidden" name="id_detail[]" ` + attr_done + ` value="` + element.id + `">
                                        <input type="text" name="alokasi[]" ` + attr_done + ` class="form-control uang" value="` + bayar_alokasi + `">
                                    </td>
                                </tr>`;

                    }

                    $('#tagihan').val(data.data.transaksi.sisa_nominal);

                    $('#res-item').html(list);

                    setNumeric();

                    $('#tagihan').autoNumeric('set', data.data.transaksi.sisa_nominal);

                }
            }
        });
    }

    $('#bayar-50').on('click', function() {
        // var tagihan = $('#tagihan').val();
        var tagihan = $('#tagihan').autoNumeric('get');
        tagihan = parseFloat(tagihan);
        var bayar = (tagihan / 2);

        $('#bayar_nominal').autoNumeric('set', bayar);
        // $('#bayar_nominal').val(bayar);

        setDetail(bayar);

        Swal.fire({
            icon: 'success',
            title: 'Selesai',
            text: 'Pembayaran 50% berhasil'
        })
    })

    $('#bayar-100').on('click', function() {
        // var tagihan = $('#tagihan').val();
        var tagihan = $('#tagihan').autoNumeric('get');
        var bayar = (tagihan);
        $('#bayar_nominal').autoNumeric('set', bayar);

        // $('#bayar_nominal').val(bayar);

        setDetail(bayar);

        Swal.fire({
            icon: 'success',
            title: 'Selesai',
            text: 'Pembayaran 100% berhasil'
        })
    })
</script>
<?= $this->endSection('script') ?>