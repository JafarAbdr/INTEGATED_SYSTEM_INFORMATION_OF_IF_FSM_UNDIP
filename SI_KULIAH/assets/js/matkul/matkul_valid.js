$(document).ready(function() {     
      $("#semester").select2({
         placeholder: "Pilih Ganjil/ Genap",
         allowClear: true
      });
		$("#semesterke").select2({
         placeholder: "Pilih Semester Ke-",
         allowClear: true
      });
      $('#sks').keypress(function(data){
      if(data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)){
         $('#cek_sks').html("isikan angka").show().fadeOut("slow");
         return false;
      }
      });
      $('#formmatkul').validate({
         //ignore: null,
         ignore: 'input[type="hidden"]',
         rules: {
            sks: {
               required: true,
               minlength:1,
               maxlength:1   
            },
            nama_matkul:{
               required:true,
            },
				kode_matkul:{
               required:true,
            },
            semester:{
               required:true,
            },            
				semesterke:{
               required:true,
            } 
         },
			messages: {
				sks: {
					required: "Tolong isi Jumlah SKS",
				},
				nama_matkul: {
					required: "Tolong isi Nama Mata Kuliah",
					
				},
				kode_matkul: {
					required: "Tolong isi Kode Mata Kuliah",
					
				},
				semester: {
					required: "Tolong isi Semester (ganjil/genap)",
				},
				semesterke: {
					required: "Tolong isi Semester Ke",
				}
			}
      });
});