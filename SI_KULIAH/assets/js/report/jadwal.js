$(document).ready(function() {     
      $("#thn_ajar").select2({
         placeholder: "Pilih Tahun Ajar",
         //allowClear: true
      }); 
      
      $("#semester").select2({
         placeholder: "Pilih Semester",
         //allowClear: true
      });
	  
      $("#uts_uas").select2({
         placeholder: "Pilih UTS/ UAS",
         //allowClear: true
      });
	  
      $('#formjadwal').validate({
         //ignore: null,
         ignore: 'input[type="hidden"]',
         rules: {
            thn_ajar: {
               required: true,   
            },
            uts_uas: {
               required: true,   
            },
			semester:{
               required:true,
            }            
         }
      });
});