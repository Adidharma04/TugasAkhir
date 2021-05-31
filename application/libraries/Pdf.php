<?php

include_once APPPATH . '/third_party/tcpdf/tcpdf.php';
class Pdf extends TCPDF {
 
    function __construct() {
        
    }
    

    function letak($gambar){
        //memasukkan gambar untuk header
        $this->Image($gambar,10,10,20,25);
        //menggeser posisi sekarang
    }



    function judul($teks1, $teks2, $teks3, $teks4, $teks5){
        $this->Cell(25);
        $this->SetFont('Times','B','12');
        $this->Cell(0,5,$teks1,0,1,'C');
        $this->Cell(25);
        $this->Cell(0,5,$teks2,0,1,'C');
        $this->Cell(25);
        $this->SetFont('Times','B','15');
        $this->Cell(0,5,$teks3,0,1,'C');
        $this->Cell(25);
        $this->SetFont('Times','I','8');
        $this->Cell(0,5,$teks4,0,1,'C');
        $this->Cell(25);
        $this->Cell(0,2,$teks5,0,1,'C');
    }



    function garis(){
        $this->SetLineWidth(1);
        $this->Line(10,36,138,36);
        $this->SetLineWidth(0);
        $this->Line(10,37,138,37);
    }
         
}