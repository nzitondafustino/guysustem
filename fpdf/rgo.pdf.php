<?php
class PDF extends FPDF {
   function header(){
      $this->SetFont("Arial","B","14");
      $this->cell(100,5,'RGO Technology Ltd');
      $this->cell(100,5,date("d/m/Y").'       ',0,0,"R");
      $this->Ln();
      $this->cell(100,5,'TIN:106822481');
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
    $this->cell(0,10,"RGO report From ".$start." TO ".$end,0,0,'C'); 
   }
   function footer(){
      $this->setY(-15);
      $this->setFont('Arial','',8);
      $this->cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
   }
   function total($qty,$total){
      $this->Ln();
      $this->SetFont("Arial","B","14");
      $this->cell(90,8,'Total',1,0);
      $this->cell(55,8,$qty,1,0);
      $this->cell(135,8,$total.' Rwf',1,0,'R');
   }
   function pdata($paid,$qty){
      $this->Ln();
      $this->Ln();
      $this->cell(100,5,'Total paid products\' Price: '.$paid." Rwf");
      $this->cell(100,5,'Total paid qty:  '.$qty);
   }
   function udata($upaid,$uqty){
      $this->Ln();
      $this->Ln();
      $this->cell(100,5,'Total paid products\' Price: '.$upaid." Rwf",0);
      $this->cell(100,5,'Total paid qty:  '.$uqty,0);
   }
   function headerTable(){
   $this->Ln();
   $this->Ln();
   $this->SetFont("Arial","B","12");
   $this->cell(10,8,'ID',1,0);
   $this->cell(40,8,'Product name',1,0);
   $this->cell(40,8,'Product Model',1,0);
   $this->cell(15,8,'Qty',1,0);
   $this->cell(20,8,'U/P(F)',1,0);
   $this->cell(20,8,'T/P(F)',1,0);
   $this->cell(40,8,'Customer name',1,0);
   $this->cell(40,8,'Customer contact',1,0);
   $this->cell(20,8,'Paid',1,0);
   $this->cell(35,8,"Paid Date",1,0);
}
}