<?php
include 'fpdf.php';

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
$pdf->SetTitle('Data Diri User');
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
$pdf->Cell('C', 7, 'LIST DATA USER', 0, 1, 'C');
$pdf->Cell('C', 7,  'Tahun Ajaran ' . (date('Y')) . '/' . (date('Y') + 1), 0, 0, 'C');
$pdf->Cell(10, 10, '', 0, 1);
$pdf->SetFont('Arial', 'B', 10);

$pdf->Cell(13, 13, '  No.', 1, 0);
$pdf->Cell(20, 13, '  ID User', 1, 0);
$pdf->Cell(35, 13, '  Nama ', 1, 0);
$pdf->Cell(43, 13, '  Jabatan', 1, 0);
$pdf->Cell(25, 13, '  Username', 1, 0);
$pdf->Cell(34, 13, '  Hak Akses', 1, 1);


$pdf->SetFont('Arial', '', 10);

$no = 1;
include '../../../koneksi.php';
$query = mysqli_query($koneksi, "SELECT * FROM users ");
while ($data = mysqli_fetch_array($query)) {
	$pdf->Cell(13, 7, $no, 1, 0);
	$pdf->Cell(20, 7, $data['id_user'], 1, 0);
	$pdf->Cell(35, 7, $data['nama_user'], 1, 0);
	$pdf->Cell(43, 7, $data['jabatan_user'], 1, 0);
	$pdf->Cell(25, 7, $data['username'], 1, 0);
	$pdf->Cell(34, 7, $data['hak_akses'], 1, 1);

	$no++;
}




$pdf->Output();
