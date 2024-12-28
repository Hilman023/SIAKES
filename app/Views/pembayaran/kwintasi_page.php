<div class="flex-container">
    <div>

        <table id="table">
            <tr>
                <td rowspan="2">
                    <img width="70" src="<?= base_url(); ?>public/assets/dist/img/logo_sekolah.png" alt="">
                </td>
                <td></td>
                <td>
                    <h2>SMK</h2>
                </td>

            </tr>
            <tr>
                <td></td>
                <td>
                    <h2>NURUL GINA ABIDIN</h2>
                </td>
            </tr>
            <tr>
                <td>‎ </td>
            </tr>
            <tr>
                <td colspan="3" style="border-top: 1px solid;border-bottom: 1px solid;">BUKTI BAYAR <?= strtoupper($data['nama_kategori_sub']); ?></td>
            </tr>
            <tr>
                <td>‎ </td>
            </tr>
            <tr>
                <td><b>NO</b></td>
                <td>:</td>
                <td><?= $data['no_pembayaran']; ?></td>
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
                    <td><?= date('M', strtotime($data['tanggal_pembayaran'])); ?></td>
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
                    <td><b><?= number_format($data['bayar_nominal'], 0, ',', '.'); ?></b></td>
                </tr>
                <tr>
                    <td><b>Terbilang</b></td>
                    <td colspan="3" style="text-align: end; text-transform: capitalize;"><b><?= terbilang($data['bayar_nominal']); ?></b></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<div class="flex-container" style="padding-top: 10px;">
    <div style="margin: auto;text-align:center">
        <table>
            <tr>
                <td>Kasomalang, <?= date('d M Y', strtotime($data['tanggal_pembayaran'])); ?></td>
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

<hr>