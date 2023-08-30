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
$pdf->SetTitle('Data Nilai Siswa');
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
$pdf->Cell('C', 7, 'LAPORAN HASIL BELAJAR SISWA', 0, 1, 'C');
$pdf->Cell('C', 7,  'Tahun Ajaran ' . (date('Y')) . '/' . (date('Y') + 1), 0, 0, 'C');
$pdf->Cell(10, 10, '', 0, 1);
$pdf->SetFont('Arial', 'B', 10);

$pdf->SetFont('Arial', '', 10);
$id_siswa = $_GET['id_siswa'];
$nam = mysqli_query($koneksi, "SELECT nilai.id_nilai, siswa.nama AS nama_siswa, siswa.nis, kelas.nama_kelas, semester_thnAjaran, mapel.nama AS nama_mapel, guru.nama AS nama_guru, mapel.kkm, nilai.tgs1, nilai.tgs2, nilai.tgs3, nilai.tgs4, nilai.tgs5, nilai.uts, nilai.uas, nilai.hasil FROM nilai
INNER JOIN subkelas ON nilai.id_subKelas = subkelas.id_subKelas
INNER JOIN siswa ON subkelas.id_siswa = siswa.id_siswa
INNER JOIN kelas ON subkelas.id_kelas = kelas.id_kelas
INNER JOIN guru ON nilai.id_guru = guru.id_guru
INNER JOIN mapel ON nilai.id_mapel = mapel.id_mapel
	where subkelas.id_siswa='$id_siswa'

	") or die(mysqli_error($koneksi));

while ($dd = mysqli_fetch_array($nam)) {
	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(25, 6, 'Nama Siswa   : ', 0, 0);
	$pdf->Cell(10, 6, $dd['nama_siswa'], 0, 1);
	$pdf->Cell(25, 6, 'NIS                 : ', 0, 0);
	$pdf->Cell(10, 6, $dd['nis'], 0, 1);
	$pdf->Cell(25, 6, 'Kelas              : ', 0, 0);
	$pdf->Cell(10, 6, $dd['nama_kelas'], 0, 1);
	$pdf->Cell(25, 6, 'Semester        : ', 0, 0);
	$pdf->Cell(10, 6, $dd['semester_thnAjaran'], 0, 1);
	$pdf->Cell(0, 3, '', 0, 1);
	break;
}


$pdf->Cell(10, 10, 'No', 1, 0);
$pdf->Cell(40, 10, 'Mapel', 1, 0);

$pdf->Cell(86, 5, 'Nilai', 1, 0, 'C');
$pdf->Cell(12, 10, 'KKM', 1, 0);
$pdf->Cell(18, 10, 'Rata-rata', 1, 0);
$pdf->Cell(23, 10, 'Keterangan', 1, 0);

$pdf->Cell(0, 5, '', 0, 1);

$pdf->Cell(50, 5, '', 0, 0);
$pdf->Cell(12, 5, 'T1', 1, 0);
$pdf->Cell(12, 5, 'T2', 1, 0);
$pdf->Cell(12, 5, 'T3', 1, 0);
$pdf->Cell(12, 5, 'T4', 1, 0);
$pdf->Cell(12, 5, 'T5', 1, 0);
$pdf->Cell(13, 5, 'UTS', 1, 0);
$pdf->Cell(13, 5, 'UAS', 1, 1);



$pdf->SetFont('Arial', '', 10);

$no = 1;
$id_siswa = $_GET['id_siswa'];

$query = mysqli_query($koneksi, "SELECT nilai.id_nilai, siswa.nama AS nama_siswa, kelas.nama_kelas, semester_thnAjaran, mapel.nama AS nama_mapel, guru.nama AS nama_guru, mapel.kkm, nilai.tgs1, nilai.tgs2, nilai.tgs3, nilai.tgs4, nilai.tgs5, nilai.uts, nilai.uas, nilai.hasil FROM nilai
INNER JOIN subkelas ON nilai.id_subKelas = subkelas.id_subKelas
INNER JOIN siswa ON subkelas.id_siswa = siswa.id_siswa
INNER JOIN kelas ON subkelas.id_kelas = kelas.id_kelas
INNER JOIN guru ON nilai.id_guru = guru.id_guru
INNER JOIN mapel ON nilai.id_mapel = mapel.id_mapel
	where subkelas.id_siswa='$id_siswa'

	") or die(mysqli_error($koneksi));

while ($data = mysqli_fetch_array($query)) {

	//data rows
	$pdf->Cell(10, 5, $no, 1, 0);
	$pdf->Cell(40, 5, $data['nama_mapel'], 1, 0);

	$pdf->Cell(12, 5, $data['tgs1'], 1, 0);
	$pdf->Cell(12, 5, $data['tgs2'], 1, 0);
	$pdf->Cell(12, 5, $data['tgs3'], 1, 0);
	$pdf->Cell(12, 5, $data['tgs4'], 1, 0);
	$pdf->Cell(12, 5, $data['tgs5'], 1, 0);
	$pdf->Cell(13, 5, $data['uts'], 1, 0);
	$pdf->Cell(13, 5, $data['uas'], 1, 0);
	$pdf->Cell(12, 5, $data['kkm'], 1, 0);
	$pdf->Cell(18, 5, ceil($data['hasil']), 1, 0);


	$nilai = ceil($data['hasil']);

	if ($nilai < $data['kkm']) {
		$keterangan = "Remidial";
	} elseif ($nilai >= $data['kkm']) {
		$keterangan = "Lulus";
	}
	$pdf->Cell(23, 5, $keterangan, 1, 1);


	$no++;
}




$pdf->Output();
