<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">New <?= $title; ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                    <li class="breadcrumb-item">Kelola <?= $title; ?></li>
                    <li class="breadcrumb-item active">New</li>
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
                <div class="col-md-6 mb-2">
                    <div class="card">
                        <div class="card-body">

                            <?= csrf_field(); ?>


                            <div class="form-group">
                                <label for="id_transaksi">Transaksi</label>
                                <select class="form-control <?= ($error = validation_show_error('id_transaksi')) ? 'border-danger' : ''; ?>" name="id_transaksi" id="id_transaksi">
                                    <option disabled selected>== SELECT ==</option>
                                    <?php foreach ($transaksi as $d): ?>
                                        <option value="<?= $d['id']; ?>"><?= $d['no_transaksi']; ?> - <?= $d['nama_aktor']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <?= ($error) ? '<div class="error text-danger mb-2" style="margin-top: -15px">' . $error . '</div>' : ''; ?>



                            <div class="form-group">
                                <label for="method">Method</label>
                                <select class="form-control <?= ($error = validation_show_error('nama')) ? 'border-danger' : ''; ?>" name="method" id="method">
                                    <?php foreach ($method as $d): ?>

                                        <option><?= $d; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <?= ($error) ? '<div class="error text-danger mb-2" style="margin-top: -15px">' . $error . '</div>' : ''; ?>


                            <div class="form-group">
                                <label for="bayar_nominal">Bayar</label>
                                <input type="number" id="bayar_nominal" name="bayar_nomnial" class="form-control <?= ($error = validation_show_error('nama')) ? 'border-danger' : ''; ?>">
                            </div>
                            <?= ($error) ? '<div class="error text-danger mb-2" style="margin-top: -15px">' . $error . '</div>' : ''; ?>






                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
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
                                        <th>Alokasi</th>
                                    </tr>
                                </thead>
                                <tbody id="res-item">

                                </tbody>
                            </table>



                            <button type="submit" id="add" class="btn btn-primary mt-4"><i class="fas fa-check"></i> Bayar</button>



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
        var id_transaksi = $(this).val();
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
                    var array = data.data;
                    for (let index = 0; index < array.length; index++) {
                        const element = array[index];
                        list += `<tr>
                                    <td>` + (index + 1) + `</td>
                                    <td>` + element.item + `</td>
                                    <td>` + element.qty + `</td>
                                    <td>` + element.harga + `</td>
                                    <td>` + element.subtotal + `</td>
                                    <td>` + element.keterangan + `</td>
                                    <td>
                                        <input type="hidden" name="id_detail[]" value="` + element.id + `">
                                        <input type="number" name="alokasi[]" class="form-control">
                                    </td>
                                </tr>`;

                    }

                    $('#res-item').html(list);
                }
            }
        });
    })
</script>
<?= $this->endSection('script') ?>