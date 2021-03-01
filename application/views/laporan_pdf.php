
<!DOCTYPE html>
<html><head>
    <title></title>
</head><body>
    <h3 style="font-size:4rem;text-align:center;margin:0;padding:0">Bank Sampah Malang</h3>
    <p style="text-align:center;margin:0;padding:0">Jalan S Supriyadi No.38 A, Sukun, Kec. Sukun, Kota Malang, Jawa Timur 65147</p>
    <p style="text-align:center;margin:0;padding:0">telp : (0341) 341618(0341) &nbsp;&nbsp; FAX : 44556634</p>
    <hr>
    <hr>
    <br>

    <div>

        <p>
            <span style="margin-left:1rem"></span> Donasi yang telah Anda lakukan Semoga menjadi berkah bagi kita semua.
            Kontribusi Anda sangat berpengaruh bagi keselamatan bumin kita.
        </p>
        <br>
        <p>Berikut data donasi yang anda lakukan : </p>
      

            <?php foreach ($user as $pmj) : ?>
                <br>
            <span style="margin-left:1rem">Nama : </span> <?= $pmj->nama ?>
            <?php endforeach ?>

            <?php foreach ($poin as $pmj) : ?>
                <br>
            <span style="margin-left:1rem">Jumlah Poin Anda : </span> <?= $pmj->total_poin ?>
            <?php endforeach ?>

            <br>
            <p>

        <table border="1">
            <tr>
                <th>No</th>
                <th>Jenis Donasi</th>
                <th>Berat</th>
                <th>Alamat</th>
                <th>Tgl Donasi</th>
                <th>Tgl Pengambilan</th>
                <th>Pegawai yg mengambil</th>
            </tr>

            <?php $no = 1;
            foreach ($detail_donasi_member as $pmj) : ?>
                <tr>

                    <td><?= $no++ ?></td>
                    <td><?= $pmj->jenis_donasi ?></td>
                    <td><?= $pmj->berat ?> Kg</td>
                    <td><?= $pmj->alamat ?></td>
                    <td><?= date('d F Y', strtotime($pmj->tgl_donasi)); ?></td>
                    <td><?= $pmj->tgl_pengambilan == '0000-00-00' ? 'belum di ambil' : date('d F Y', strtotime($pmj->tgl_pengambilan)) ?></td>
                    <td><?= $pmj->tgl_pengambilan == '0000-00-00' ? 'belum ada' : $pmj->nama_pegawai ?></td>
                </tr>
            <?php endforeach ?>
        </table>


        <br><br>
        <p>
            <span style="margin-left:1rem">Terima kasih atas</span> donasi yang telah anda lakukan.
          
        </p>
        <br><br><br><br><br><br><br><br>
 
        <p style="text-align:right">Malang,...,.........,.....</p>
        
        <br><br><br><br>
        <p style="text-align:right"> Bank Sampah Malang </p>
    </div>
</body></html>