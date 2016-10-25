$(document).ready(function() {     
      
      $('#nip').keypress(function(data){
      if(data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)){
         $('#cek_nip').html("isikan angka").show().fadeOut("slow");
         return false;
      }
      });
      
      $('#formpimpinanfakultas').validate({
         //ignore: null,
         ignore: 'input[type="hidden"]',
         rules: {
            nip: {
               required: true,
               minlength:18,
               maxlength:18   
            },
            nama_pimpinan:{
               required:true,
            }           
         }
      });
});