$(document).ready(function() { 
   $("#thn_ajar").select2({
      //allowClear: true
   }); 
	$("#jurusan").select2({
      placeholder: "Pilih Jurusan",
      //allowClear: true
   });
	$("#semesterke").select2({
      placeholder: "Pilih Semester Ke",
      //allowClear: true
   });
   $("#dosen_1").select2({
      placeholder: "Pilih Dosen 1",
      minimumInputLength: 2,
      //allowClear: true
   });
   $("#dosen_2").select2({
      placeholder: "Pilih Dosen 2",
      minimumInputLength: 2,
      allowClear: true
   });
   $('#sks').keypress(function(data){
      if(data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)){
         $('#cek_sks').html("isikan angka").show().fadeOut("slow");
         return false;
      }
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
   
   $('#formbebannonif').validate({
      //ignore: null,
      //ignore: 'input[type="hidden"]',
      rules: {
         thn_ajar: {
            required: true
         },
         semesterke: {
            required: true
         },
         jurusan: {
            required: true
         },
         matkul: {
            required: true
         },
			sks: {
            required: true
         },
			jumlah_kelas: {
            required: true
         },
         dosen_1: {
            required: true
         },
         dosen_2: {
            notEqual: '#dosen_1'
         }
      },
		messages: {
 			thn_ajar: {
				required: "Tolong isi Tahun Ajaran",
				
			},
         semesterke: {
            required: "Tolong isi Semester Ke",
            
         },
         jurusan: {
            required: "Tolong isi Nama Jurusan",
            
         },
			matkul: {
				required: "Tolong isi Nama Mata Kuliah",
				
			},
			sks: {
				required: "Tolong isi Jumlah SKS",
				
			},
			jumlah_kelas: {
				required: "Tolong isi Jumlah Kelas",
				
			},
			dosen_1: {
				required: "Tolong isi Nama Dosen 1",
				
			},
			dosen_2: {
				notEqual: "Nama dosen 2 tidak boleh sama dengan dosen 1"
			}
				
 		}
   }) 
})