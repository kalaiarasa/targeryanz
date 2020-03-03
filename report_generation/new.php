<?php

require('fpdf/fpdf.php');

class PDF extends FPDF{
    function setcol_name($w,$h,$t,$x,$y){
        $this->Cell($w,$h,$t,$x,$y,'C');

    }
    function setbr_name($w,$h,$t,$x,$y){
        $this->SetFont('Arial','B',17);
        $this->Cell($w,$h,$t,$x,$y,'C');

    }
    function set_records($n,$an,$nm,$co,$q,$nt,$r){
        $this->Cell(10,10,$n,1,0);
        $this->Cell(29,10,$an,1,0);
        $this->Cell(50,10,$nm,1,0);
        $this->Cell(25,10,$co,1,0);
        $this->Cell(29,10,$q,1,0);
        $this->Cell(28,10,$nt,1,0);
        $this->Cell(19,10,$r,1,1);
    }

}
$pdf = new PDF('p','mm','A4');
$pdf->AliasNbPages('{pages}');
$pdf->SetAutoPageBreak(true,15);
$pdf->AddPage();
$pdf->SetFont('Arial','B',22);
$pdf->setcol_name(190,20,'govt college of engg',1,1);
$pdf->SetFont('Arial','B',17);
$pdf->setbr_name(190,10,'COMPUTER SCIENCE',1,1);
$pdf->SetFont('Arial','',11);
$pdf->Cell(10,10,'S.no',1,0);
$pdf->Cell(29,10,'Application no',1,0);
$pdf->Cell(50,10,'Name',1,0);
$pdf->Cell(25,10,'Community',1,0);
$pdf->Cell(29,10,'Quota',1,0);
$pdf->Cell(28,10,'Nationality',1,0);
$pdf->Cell(19,10,'Religion',1,1);
$pdf->set_records('1','123456','xyz','MBC','Government','Indian','Hindu');
$pdf->set_records('1','123456','xyz','MBC','Government','Indian','Hindu');
$pdf->set_records('1','123456','xyz','MBC','Government','Indian','Hindu');
$pdf->set_records('1','123456','xyz','MBC','Government','Indian','Hindu');
$pdf->set_records('1','123456','xyz','MBC','Government','Indian','Hindu');
$pdf->set_records('1','123456','xyz','MBC','Government','Indian','Hindu');
$pdf->set_records('1','123456','xyz','MBC','Government','Indian','Hindu');
$pdf->set_records('1','123456','xyz','MBC','Government','Indian','Hindu');
$pdf->set_records('1','123456','xyz','MBC','Government','Indian','Hindu');
$pdf->set_records('1','123456','xyz','MBC','Government','Indian','Hindu');
$pdf->set_records('1','123456','xyz','MBC','Government','Indian','Hindu');
$pdf->set_records('1','123456','xyz','MBC','Government','Indian','Hindu');
$pdf->set_records('1','123456','xyz','MBC','Government','Indian','Hindu');
$pdf->set_records('1','123456','xyz','MBC','Government','Indian','Hindu');
$pdf->set_records('1','123456','xyz','MBC','Government','Indian','Hindu');
$pdf->set_records('1','123456','xyz','MBC','Government','Indian','Hindu');
$pdf->set_records('1','123456','xyz','MBC','Government','Indian','Hindu');
$pdf->set_records('1','123456','xyz','MBC','Government','Indian','Hindu');
$pdf->set_records('1','123456','xyz','MBC','Government','Indian','Hindu');
$pdf->set_records('1','123456','xyz','MBC','Government','Indian','Hindu');
$pdf->set_records('1','123456','xyz','MBC','Government','Indian','Hindu');
$pdf->set_records('1','123456','xyz','MBC','Government','Indian','Hindu');
$pdf->set_records('1','123456','xyz','MBC','Government','Indian','Hindu');
$pdf->set_records('1','123456','xyz','MBC','Government','Indian','Hindu');
$pdf->set_records('1','123456','xyz','MBC','Government','Indian','Hindu');
$pdf->set_records('1','123456','xyz','MBC','Government','Indian','Hindu');
$pdf->set_records('1','123456','xyz','MBC','Government','Indian','Hindu');
$pdf->set_records('1','123456','xyz','MBC','Government','Indian','Hindu');
$pdf->set_records('1','123456','xyz','MBC','Government','Indian','Hindu');
$pdf->set_records('1','123456','xyz','MBC','Government','Indian','Hindu');
$pdf->set_records('1','123456','xyz','MBC','Government','Indian','Hindu');
$pdf->set_records('1','123456','xyz','MBC','Government','Indian','Hindu');
$pdf->set_records('1','123456','xyz','MBC','Government','Indian','Hindu');
$pdf->set_records('1','123456','xyz','MBC','Government','Indian','Hindu');
$pdf->set_records('1','123456','xyz','MBC','Government','Indian','Hindu');
$pdf->set_records('1','123456','xyz','MBC','Government','Indian','Hindu');
$pdf->setbr_name(190,10,'COMPUTER SCIENCE',1,1);

$pdf->Output();


?>