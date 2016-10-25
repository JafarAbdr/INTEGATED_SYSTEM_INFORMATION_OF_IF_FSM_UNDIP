$(document).ready(function(){
   $('#nip').keypress(function(data){
      if(data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)){
         $('#cek_nip').html("isikan angka").show().fadeOut("slow");
         return false;
      }
   })
})