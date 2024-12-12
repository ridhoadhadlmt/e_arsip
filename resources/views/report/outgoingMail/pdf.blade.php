<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->

    <title>Laporan Surat Keluar</title>
    <style type="text/css">
        @font-face {
        font-family: 'Lexend';
        src: url("https://fonts.googleapis.com/css2?family=Lexend:wght@100;200;300;400;500;600;700;800;900&display=swap") format('truetype');
        font-weight: normal;
            font-style: normal;
        }
    </style>
</head>
<body>
<center>
<h3>Desa Sambirejo Timur</h3>
<h5 style="text-transform: capitalize;width: 50%;margin:auto;font-weight:normal">JL. MAKMUR DUSUN VII TANJUNG DESA SAMBIREJO TIMUR KEC. PERCUT SEI TUAN KAB. DELI SERDANG KODEPOS 20371 KECAMATAN PERCUT SEI TUAN KABUPATEN DELI SERDANG</h5>
<h5 style="font-weight:normal;font-style:italic">Telp: 0281-00011101. Email: sambirejotimurdesa@gmail.com</h5>
<div style="border: 2px solid #000"></div>
<h5 style="margin-bottom: 0">LAPORAN SURAT KELUAR <br>
    <!-- <span style="font-weight: normal">Periode: {{ $date_start}} s/d {{ $date_end}}</span> -->
    <span style="font-weight: normal">Periode: </span>
</h5>
</center>

<table style="width:100%;margin-top: 30px;" border="1" cellspacing="0" cellpadding="5" class="table">
        <tr>
            <th>No</th>
            <th>Tanggal Dan Jam</th>
            <th>No Surat</th>
            <th>Tgl Surat</th>
            <th>Sifat</th>
            <th>Pengirim</th>
            <th>Perihal</th>
            <th>Kepada</th>
            <th>Tanggal Kirim</th>
        </tr>
        @foreach($outgoingMails as $outgoingMail)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $outgoingMail->created_at }}</td>
            <td>{{ $outgoingMail->no_mail }}</td>
            <td>{{ $outgoingMail->date }}</td>
            <td>{{ $outgoingMail->characteristic }}</td>
            <td>{{ $outgoingMail->workunit->name }}</td>
            <td>{{ $outgoingMail->as_for }}</td>
            <td>{{ $outgoingMail->to }}</td>
            <td>
                @if($outgoingMail->archive !== null)
                {{ $outgoingMail->archive->created_at }}
                @else
                @endif
            </td>
        </tr>
        @endforeach
</table>

<div style="float:right">
<h5><center>KEPALA</center> <br>
DESA SAMBI REJO TIMUR</h5>
<br><br><br>

<h5><center>Mhd Arifin</center></h5>
</div>

</body>
</html>
