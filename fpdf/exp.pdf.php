<?php
class PDF extends FPDF {
   function header(){
      $this->SetFont("Arial","B","14");
      $this->cell(0,5,date("d/m/Y").'       ',0,0,"R");
      $this->Ln();
      $this->cell(100,5,'Tel:+250788607904');
      $this->Ln();
      $this->cell(100,5,'E-mail:ryahagilbo@gamil.com');
      $this->Ln();


   } 
   function title($start,$end)
   {
    $this->Ln();
    $this->setFont('Arial','B',16);
    $this->cell(0,10,"Expenses Report ".$start." TO ".$end,0,0,'C'); 
   }
   function footer(){
      $this->setY(-15);
      $this->setFont('Arial','',8);
      $this->cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
   }
   function total($total){
      $this->Ln();
      $this->SetFont("Arial","B","14");
      $this->cell(150,8,'Total',1,0);
      $this->cell(120,8,$total.' Rwf',1,0,'R');
   }
   function headerTable(){
   $this->Ln();
   $this->Ln();
   $this->SetFont("Arial","B","14");
   $this->cell(20,8,'ID',1,0);
   $this->cell(130,8,'Reason',1,0);
   $this->cell(40,8,'Paid By',1,0);
   $this->cell(40,8,'Amount(Rwf)',1,0);
   $this->cell(40,8,"Date",1,0);
}
}