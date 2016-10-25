$(document).ready(function(){
   //Bind Content Loading Script
   $('#bobottab_if').on("click",function(){
   //alert('m');
   var dt = $(this).attr('data-target');
      $.ajax({
         url: dt,
         cache:false,
         success:function(data){
            //alert(data);
            $('#bobotmenu').empty();
            $('#bobotmenu').html(data);
      }
      })
   })
   $('#bobottab_nonif').on("click",function(){
   //alert('m');
   var dt = $(this).attr('data-target');
      $.ajax({
         url: dt,
         cache:false,
         success:function(data){
            //alert(data);
            $('#bobotmenu').empty();
            $('#bobotmenu').html(data);
      }
      })
   })
   $('#bobottab_nonfsm').on("click",function(){
  // alert('m');
   var dt = $(this).attr('data-target');
      $.ajax({
         url: dt,
         cache:false,
         success:function(data){
            //alert(data);
            $('#bobotmenu').empty();
            $('#bobotmenu').html(data);
      }
      })
   })
})