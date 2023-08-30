<?php
include 'fpdf.php';
include '../../../koneksi.php';
class pdf extends FPDF
{
    function letak($gambar)
    {
        //memasukkan gambar untuk header
        $this->Image($gambar, 11, 9, 23, 23);
        //menggeser posisi sekarang
    }

    function judul($teks1, $teks2, $teks3, $teks4, $teks5)
    {
        $this->Cell(25);
        $this->SetFont('Times', 'B', '14');
        $this->Cell(0, 5, $teks1, 0, 1, 'C');
        $this->Cell(25);
        $this->Cell(0, 5, $teks2, 0, 1, 'C');
        $this->Cell(25);
        $this->SetFont('Times', 'B', '15');
        $this->Cell(0, 5, $teks3, 0, 1, 'C');
        $this->Cell(25);
        $this->SetFont('Times', 'I', '11');
        $this->Cell(0, 5, $teks4, 0, 1, 'C');
        $this->Cell(25);
        $this->Cell(0, 2, $teks5, 0, 1, 'C');
    }

    function garis()
    {
        $this->SetLineWidth(1);
        $this->Line(10, 36, 200, 36);
        $this->SetLineWidth(0);
        $this->Line(10, 37, 200, 37);
    }

    function garis2()
    {
        $this->SetLineWidth(1);
        $this->Line(10, 36, 50, 36);
    }
}

//instantisasi objek
$pdf = new pdf();
$pdf->SetTitle('Data Jadwal');
//Mulai dokumen
$pdf->AddPage('P', 'A4');
//meletakkan gambar
$pdf->letak('../../assets/img/logo.png');
//meletakkan judul disamping logo diatas
$pdf->judul('PEMERINTAH KABUPATEN SLEMAN', 'DINAS PENDIDIKAN', 'SD NEGERI MADUSARI 1', 'Jl. Raya Piyungan - Prambanan Madubaru No.Km, 4 Kec. Prambanan, Kabupaten Sleman, DIY 5557', 'Telp. (0274) 2850685');
//membuat garis ganda tebal dan tipis
$pdf->garis();





$pdf->Cell(10, 10, '', 0, 1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell('C', 7, 'LIST DATA JADWAL', 0, 1, 'C');
$pdf->Cell('C', 7,  'Tahun Ajaran ' . (date('Y')) . '/' . (date('Y') + 1), 0, 0, 'C');
$pdf->Cell(10, 10, '', 0, 1);
$pdf->SetFont('Arial', 'B', 10);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(10, 1, '', 0, 1);
$pdf->SetFont('Arial', '', 10);
$id_kelas = $_GET['id_kelas'];
$nam = mysqli_query($koneksi, "SELECT id_jadwal, hari, jam, kelas.id_kelas, kelas.nama_kelas, mapel.nama AS nama_mapel,guru.nama FROM jadwal
                      INNER JOIN kelas ON jadwal.id_kelas = kelas.id_kelas
                      INNER JOIN mapel ON jadwal.id_mapel = mapel.id_mapel
                      INNER JOIN guru ON jadwal.id_guru = guru.id_guru  
	where jadwal.id_kelas='$id_kelas'

	") or die(mysqli_error($koneksi));

while ($dd = mysqli_fetch_array($nam)) {
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(20, 6, 'Tingkat      : ', 0, 0);
    $pdf->Cell(10, 6, $dd['nama_kelas'], 0, 1);
    $pdf->Cell(21, 6, 'Wali Kelas : ', 0, 0);
    $pdf->Cell(10, 6, $dd['nama'], 0, 1);
    $pdf->Cell(0, 3, '', 0, 1);
    break;
}

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(13, 13, '  No.', 1, 0);
$pdf->Cell(20, 13, '  Hari', 1, 0);
$pdf->Cell(35, 13, '  Jam ', 1, 0);
$pdf->Cell(45, 13, '  Mata Pelajaran', 1, 0);
$pdf->Cell(54, 13, '  Pengajar', 1, 1);


$pdf->SetFont('Arial', '', 10);

$no = 1;


$query = mysqli_query($koneksi, "SELECT  hari, jam,  mapel.nama AS nama_mapel,guru.nama FROM jadwal
                      INNER JOIN kelas ON jadwal.id_kelas = kelas.id_kelas
                      INNER JOIN mapel ON jadwal.id_mapel = mapel.id_mapel
                      INNER JOIN guru ON jadwal.id_guru = guru.id_guru WHERE jadwal.id_kelas='$id_kelas' ORDER BY hari,jam ASC ");
while ($data = mysqli_fetch_array($query)) {
    $pdf->Cell(13, 7, $no, 1, 0);
    if ($data['hari'] == 0) {
        $hari = "Senin";
    } else if ($data['hari'] == 1) {
        $hari = "Selasa";
    } else if ($data['hari'] == 2) {
        $hari = "Rabu";
    } else if ($data['hari'] == 3) {
        $hari = "Kamis";
    } else if ($data['hari'] == 4) {
        $hari = "Jumat";
    } else if ($data['hari'] == 5) {
        $hari = "Sabtu";
    }
    $pdf->Cell(20, 7, $hari, 1, 0);
    $pdf->Cell(35, 7, $data['jam'], 1, 0);
    $pdf->Cell(45, 7, $data['nama_mapel'], 1, 0);
    $pdf->Cell(54, 7, $data['nama'], 1, 1);

    $no++;
}




$pdf->Output();
