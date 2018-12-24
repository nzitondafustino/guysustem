 var date=new Date();
 y=date.getFullYear();
 m=date.getMonth();
 $('#date').datepicker({  
    format: 'yyyy-mm-dd'  
  }).datepicker("setDate", new Date());
 $('#date').on('changeDate', function(ev){
    $(this).datepicker('hide');
});
 $('#end').datepicker({  
    format: 'yyyy-mm-dd'  
  }).datepicker("setDate", new Date());
 $('#end').on('changeDate', function(ev){
    $(this).datepicker('hide');
});
 $('#start').datepicker({  
    format: 'yyyy-mm-dd'  
  }).datepicker("setDate", new Date(y,m,1));
 $('#start').on('changeDate', function(ev){
    $(this).datepicker('hide');
});
 $('#end1').datepicker({  
    format: 'yyyy-mm-dd'  
  }).datepicker("setDate", new Date());
 $('#end1').on('changeDate', function(ev){
    $(this).datepicker('hide');
});
 $('#start2').datepicker({  
    format: 'yyyy-mm-dd'  
  }).datepicker("setDate", new Date(y,m,1));
 $('#start2').on('changeDate', function(ev){
    $(this).datepicker('hide');
});
 $('#end2').datepicker({  
    format: 'yyyy-mm-dd'  
  }).datepicker("setDate", new Date());
 $('#end2').on('changeDate', function(ev){
    $(this).datepicker('hide');
});
 $('#start1').datepicker({  
    format: 'yyyy-mm-dd'  
  }).datepicker("setDate", new Date(y,m,1));
 $('#start1').on('changeDate', function(ev){
    $(this).datepicker('hide');
});
  $('#warranty').datepicker({  
    format: 'yyyy-mm-dd'  
  }).datepicker("setDate", new Date());
 $('#warranty').on('changeDate', function(ev){
    $(this).datepicker('hide');
});