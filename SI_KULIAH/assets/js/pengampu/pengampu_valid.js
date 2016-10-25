$(document).ready(function() {
    
   $("#thn_ajar").select2({
      allowClear: true
   }); 
   $("#semester").select2({
      placeholder: "Pilih Semester",
      allowClear: true
   });
   $("#matkul").select2({
      placeholder: "Pilih Mata Kuliah",
      minimumInputLength: 2,
      allowClear: true
   });
   $("#dosen_1").select2({
      placeholder: "Pilih Dosen 1",
      minimumInputLength: 2,
      allowClear: true
   });
   $("#dosen_2").select2({
      placeholder: "Pilih Dosen 2",
      minimumInputLength: 2,
      allowClear: true
   });
   
   $('#jumlah_kelas').keypress(function(data){
      if(data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)){
         $('#cek_jumlah_kelas').html("isikan angka").show().fadeOut("slow");
         return false;
      }
   });
   
   jQuery.validator.addMethod("notEqual", function(value, element, param) {
      return this.optional(element) || value != $(param).val();
   }, "This has to be different...");
   
   $('#formbeban').validate({
      //ignore: null,
      ignore: 'input[type="hidden"]',
      rules: {
         thn_ajar: {
            required: true
         },
         semester: {
            required: true
         },
			jumlah_kelas: {
            required: true
         },
         matkul: {
            required: true
         },
         dosen_1: {
            required: true
         },
         dosen_2: {
            notEqual: '#nama_dosen_1'
         }
      },
		messages: {
 			thn_ajar: {
				required: "Field ini tidak boleh kosong",
			},
			semester: {
				required: "Field ini tidak boleh kosong",
			},
			jumlah_kelas: {
				required: "Field ini tidak boleh kosong",
			},
			matkul: {
				required: "Field ini tidak boleh kosong",
			},
			dosen_1: {
				required: "Field ini tidak boleh kosong",
			},
			
 		}
   }) 
})