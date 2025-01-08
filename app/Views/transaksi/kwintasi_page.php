<div class="flex-container">
    <table id="table" style="width: 100%;">
        <tr>
            <td>‎ </td>
        </tr>
        <tr>
            <td rowspan="3" style="padding:0;padding-left:30px;padding-right:-60px;">
                <img width="80" src="<?= base_url(); ?>public/assets/dist/img/logo_sekolah.png" alt="">
            </td>
            <td>
                <p style="padding: 0;margin:0;">YAYASAN NURUL GINA SINDANGSARI</p>
            </td>

        </tr>
        <tr>
            <td>
                <h2 style="padding: 0;margin:0;">NURUL GINA ABIDIN</h2>
            </td>
        </tr>
        <tr>
            <td>
                <small>Alamat : Jl. Raya Cisalak-Subang KM. 18 No. 09, Kec. Kasomalang - Subang 41283</small>
            </td>
        </tr>
        <tr>
            <td>‎ </td>
        </tr>
        <tr>
            <td colspan="3" style="border-top: 1px solid;border-bottom: 1px solid;">KWINTANSI TRANSAKSI</td>
        </tr>
        <tr>
            <td>‎ </td>
        </tr>


    </table>
</div>
<div class="flex-container">
    <div>

        <table id="table">
            <tr>
                <td><b>NO</b></td>
                <td>:</td>
                <td><?= $data['no_transaksi']; ?></td>
            </tr>
            <?php if ($data['jenis_aktor'] == 'siswa'): ?>

                <tr>
                    <td><b>NIPD</b></td>
                    <td>:</td>
                    <td><?= $data['nik']; ?></td>
                </tr>
                <tr>
                    <td><b>Nama</b></td>
                    <td>:</td>
                    <td><?= $data['nama_aktor']; ?></td>
                </tr>
                <tr>
                    <td><b>Kelas</b></td>
                    <td>:</td>
                    <td><?= $data['nama_kelas']; ?></td>
                </tr>
                <tr>
                    <td><b>Jurusan</b></td>
                    <td>:</td>
                    <td><?= $data['nama_jurusan']; ?></td>
                </tr>
                <tr>
                    <td><b>Tahun Ajar</b></td>
                    <td>:</td>
                    <td><?= $data['nama_tahun']; ?></td>
                </tr>

            <?php elseif ($data['jenis_aktor'] == 'guru'): ?>

                <tr>
                    <td><b>NIK</b></td>
                    <td>:</td>
                    <td><?= $data['nik']; ?></td>
                </tr>
                <tr>
                    <td><b>Nama</b></td>
                    <td>:</td>
                    <td><?= $data['nama_aktor']; ?></td>
                </tr>
                <tr>
                    <td><b>Bulan</b></td>
                    <td>:</td>
                    <td><?= date('M', strtotime($data['tanggal_transaksi'])); ?></td>
                </tr>
            <?php endif; ?>
            <tr>
                <td>‎ </td>
            </tr>

        </table>
    </div>
    <div>
        <table id="table1">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Nominal</th>
                    <th>Qty</th>
                    <th>Bayar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($detail as $d): ?>

                    <tr>
                        <td><?= $d['item']; ?></td>
                        <td><?= number_format($d['harga'], 0, ',', '.'); ?></td>
                        <td><?= $d['qty']; ?></td>
                        <td><?= number_format($d['subtotal'], 0, ',', '.'); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3"><b>Nominal</b></td>
                    <td><b><?= number_format($data['total_nominal'], 0, ',', '.'); ?></b></td>
                </tr>
                <tr>
                    <td><b>Terbilang</b></td>
                    <td colspan="3" style="text-align: end; text-transform: capitalize;"><b><?= terbilang($data['total_nominal']); ?> Rupiah</b></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<?php if ($data['jenis_aktor'] == 'siswa'): ?>
    <div class="flex-container" style="padding-top: 10px;">
        <div style="margin: auto;text-align:center">
            <table>
                <tr>
                    <td>Kasomalang, <?= date('d M Y', strtotime($data['tanggal_transaksi'])); ?></td>
                </tr>
                <tr>
                    <td>‎ </td>
                </tr>
                <tr>
                    <td>‎ </td>
                </tr>
                <tr>
                    <td>‎ </td>
                </tr>

                <tr>
                    <td>( <?= $data['nama_user']; ?> )</td>
                </tr>

            </table>
        </div>
    </div>
<?php else: ?>

    <div class="flex-container" style="padding-top: 10px;">
        <div style="margin: auto;text-align:center">
            <table>
                <tr>
                    <td>Guru Mapel</td>
                </tr>
                <tr>
                    <td>‎ </td>
                </tr>
                <tr>
                    <td>‎ </td>
                </tr>
                <tr>
                    <td>‎ </td>
                </tr>

                <tr>
                    <td>( <?= $data['nama_aktor']; ?> )</td>
                </tr>

            </table>
        </div>
        <div>
            <table style="text-align:center">
                <tr>
                    <td>Kepala Sekolah</td>
                </tr>
                <tr>
                    <td>‎ </td>
                </tr>
                <tr>
                    <td>‎ </td>
                </tr>

                <tr>
                    <td>‎ </td>
                </tr>
                <tr>
                    <td>( <?= ($kepala_sekolah) ? $kepala_sekolah['name'] : 'Kepala Sekolah'; ?> )</td>
                </tr>

            </table>
        </div>
    </div>
<?php endif; ?>

<hr>