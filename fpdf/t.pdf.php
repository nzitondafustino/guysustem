<?php
class PDF extends FPDF {
   function header(){
      $this->SetFont("Arial","B","14");
      $this->cell(100,5,'ITHUB Technology Ltd');
      $this->cell(100,5,date("d/m/Y"));
      $this->Ln();
      $this->Ln();
      $this->cell(100,5,'TIN:106822481');
      $this->Ln();
      $this->Ln();
      $this->cell(100,5,'Tel:+250788607904');
      $this->Ln();
      $this->Ln();
      $this->cell(100,5,'E-mail:ryahagilbo@gamil.com');
      $this->Ln();
      $this->Ln();

   } 
   function total($total){
      $this->Ln();
      $this->SetFont("Arial","B","10");
      $this->cell(10,10,'Total',1,0);
      $this->cell(120,10,$total.'Rwf',1,0,'R');
   }
   function footer(){
      $this->SetFont("Arial","B","14");
      $this->Ln();
      $this->Ln();
      $this->cell(0,5,"Signature");
      $this->Ln();
      $this->cell(0,5,".............");
      $this->Ln();
      $this->Ln();

   }
   function clientName($name){
      $this->Ln();
      $this->cell(0,5,"Client: ".$name,0,0,'C');
      $this->Ln();
      $this->Ln();
      $this->Ln();
   }
   function title()
   {
      $this->Ln();
      $this->Ln();
      $this->cell(0,5,'INVOICE:...........',0,0,'C');
      $this->Ln();
      $this->Ln();
   }
   function headerTable(){
   $this->SetFont("Arial","B","14");
   $this->cell(10,8,'No',1,0);
   $this->cell(100,8,'Description',1,0);
   $this->cell(20,8,'T/P',1,0);
}
}