<?php

$a1 = ['nama'=>'Syukron Katsir','NIM'=>'12121','nilai'=>95];
$a2 = ['nama'=>'Samsi','NIM'=>'21212','nilai'=>70];
$a3 = ['nama'=>'Alfinoy','NIM'=>'12345','nilai'=>50];
$a4 = ['nama'=>'Abdullah','NIM'=>'43432','nilai'=>85];
$a5 = ['nama'=>'Aminatuz Zahra','NIM'=>'32333','nilai'=>65];
$a6 = ['nama'=>'Siti Badriyah','NIM'=>'45456','nilai'=>78];
$a7 = ['nama'=>'Andik','NIM'=>'34376','nilai'=>56];
$a8 = ['nama'=>'Sidik','NIM'=>'12324','nilai'=>90];
$a9 = ['nama'=>'Arif Setia Budi','NIM'=>'13241','nilai'=>89];
$a10 = ['nama'=>'Nanda Fitriah','NIM'=>'35356','nilai'=>95];
$a11 = ['nama'=>'Eka Wati','NIM'=>'12354','nilai'=>93];
$a12 = ['nama'=>'Daniel','NIM'=>'21324','nilai'=>50];
$a13 = ['nama'=>'Mamang Sugeng','NIM'=>'78784','nilai'=>75];
$a14 = ['nama'=>'Rizki Arman','NIM'=>'34532','nilai'=>88];
$a15 = ['nama'=>'Barannel Tiqa','NIM'=>'73469','nilai'=>45];

$ar_data = [$a1,$a2,$a3,$a4,$a5,$a6,$a7,$a8,$a9,$a10,$a11,$a12,$a13,$a14,$a15];
$ar_judul = ['No','NAMA MAHASISWA','NIM','NILAI','KETERANGAN','GRADE','PREDIKAT'];

  // fungsi agregat di array
        $nilai=array_column($ar_data,'nilai');
        $nilai_total=array_sum($nilai);
        $nilai_tertinggi=max($nilai);
        $nilai_terendah=min($nilai);
        $jumlah_mhs= count($ar_data);
        $nilai_rata2=$nilai_total / $jumlah_mhs;

        $keterangan= [
            'JUMLAH NILAI'=>$nilai_total,
            'JUMLAH MAHASISWA'=>$jumlah_mhs,
            'NILAI TERTINGGI'=>$nilai_tertinggi,
            'NILAI TERENDAH'=>$nilai_terendah,
            'NILAI RATA-RATA'=>$nilai_rata2
        ];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data MHS</title>
    <style>
        .odd {
            background-color:aquamarine; 
        }
        .even {
            background-color:cadetblue; 
        }
    </style>
</head>
<body>
    <h1 align="center">DATA NILAI MAHASISWA</h1>
    <table border="1" cellpadding="10" cellspacing="2" width="95%" align="center">
    <thead style="background-color:gold;">
    <tr>
        <?php
        foreach($ar_judul as $judul){?>
        <th> <?=$judul?> </th>
        <?php } ?>
    </tr>
    </thead>
    <tbody>
        
        <?php
        $no=1;
        foreach($ar_data as $data){
            $ket=($data['nilai']>=65) ? 'LULUS': 'GAGAL';

            if($data['nilai']>=90) $grade='A';
            else if($data['nilai']>=80) $grade='B';
            else if($data['nilai']>=65) $grade='C';
            else if($data['nilai']>=50) $grade='D';
            else $grade='E';

            switch($grade){
                case 'A':$predikat='MEMUASKAN';break;
                case 'B':$predikat='BAGUS';break;
                case 'C':$predikat='CUKUP';break;
                case 'D':$predikat='KURANG';break;
                case 'E':$predikat='BURUK';break;
            };

    $warna = ($no % 2 == 0) ? 'even' : 'odd';

        
        ?>
    <tr class="<?=$warna?>">
        <td style="text-align:center"><?= $no++ ?></td>
        <td><?=$data['nama']?></td>
        <td style="text-align:center"><?=$data['NIM']?></td>
        <td style="text-align:center"><?=$data['nilai']?></td>
        <td style="text-align:center"><?=$ket?></td>
        <td style="text-align:center"><?=$grade?></td>
        <td style="text-align:center"><?=$predikat?></td>
    </tr>
    <?php } ?>
    </tbody>
    
    <tfoot style="background-color:gold;">
        <?php
            foreach($keterangan as $ket => $hasil) {
            ?>
            <tr>
                <th colspan="5"> <?=$ket?> </th>
                <th colspan="2"> <?=$hasil?> </th>
            </tr>
       <?php } ?>
    
    </tfoot>
    </table>

</body>
</html>