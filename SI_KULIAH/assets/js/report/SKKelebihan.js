$(document).ready(function() {     
      $("#thn_ajar").select2({
         placeholder: "Pilih Tahun Ajar",
         //allowClear: true
      }); 
      
      $("#semester").select2({
         placeholder: "Pilih Semester",
         //allowClear: true
      });
		
		$('#skswajib').keypress(function(data){
      if(data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)){
         $('#cek_skswajib').html("isikan angka").show().fadeOut("slow");
         return false;
      }
		});
		
      $('#formSKDekan').validate({
         //ignore: null,
         ignore: 'input[type="hidden"]',
         rules: {
            thn_ajar: {
               required: true,   
            },
            semester:{
               required:true,
            },
				skswajib:{
               required:true,
            }            
         },
			messages: {
				thn_ajar: {
					required: "Field ini tidak boleh kosong",
				},
				semester: {
					required: "Field ini tidak boleh kosong",
				},
				skswajib: {
					required: "Field ini tidak boleh kosong",
				},			
 		}
      });
});