$(document).ready(function() {
     
   $("#thn_ajar").select2({
      placeholder: "Pilih Tahun Ajar",
      //allowClear: true
   });
	$("#fakultas").select2({
      placeholder: "Pilih Fakultas",
      //allowClear: true
   });
	$("#semesterke").select2({
      placeholder: "Pilih Semester Ke",
      //allowClear: true
   });
	$("#jurusan").select2({
      placeholder: "Pilih Jurusan/ Prodi",
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
   
   $('#jumlah_kelas').keypress(function(data){
      if(data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)){
         $('#cek_jumlah_kelas').html("isikan angka").show().fadeOut("slow");
         return false;
      }
   });
   $('#sks').keypress(function(data){
      if(data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)){
         $('#cek_sks').html("isikan angka").show().fadeOut("slow");
         return false;
      }
   });
   
   jQuery.validator.addMethod("notEqual", function(value, element, param) {
      return this.optional(element) || value != $(param).val();
   }, "This has to be different...");
   
   $('#formbebannonfsm').validate({
      //ignore: null,
      //ignore: 'input[type="hidden"]',
      rules: {
         thn_ajar: {
            required: true
         },
         matkul: {
            required: true
         },
			semesterke: {
            required: true
         },
			jurusan: {
            required: true
         },
			fakultas: {
            required: true
         },
			sks: {
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
				required: "Tolong isi Tahun Ajar",
				
			},
			semester: {
				required: "Tolong isi Semester",
				
			},
			matkul: {
				required: "Tolong isi Nama Mata Kuliah",
				
			},
			semesterke: {
				required: "Tolong isi Semester Ke",
				
			},
			sks: {
				required: "Tolong isi Jumlah SKS",
				
			},
			jurusan: {
				required: "Tolong isi Nama Jurusan",
				
			},
			fakultas: {
				required: "Tolong isi Nama Fakultas",
				
			},
			jumlah_kelas: {
				required: "Tolong isi Jumlah Kelas",
				
			},
			dosen_1: {
				required: "Tolong isi Nama Dosen 1",
				
			},
			dosen_2: {
				notEqual: "Isian tidak boleh sama dengan dosen 1"
			}
				
 		}
   }) 
})