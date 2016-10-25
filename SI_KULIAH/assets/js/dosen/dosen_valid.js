$(document).ready(function() {     
      $("#pangkat").select2({
         placeholder: "e.g: IV A",
         allowClear: true
      }); 
      $("#jabatan").select2({
         placeholder: "Pilih Jabatan",
         allowClear: true
      });
		$("#jurusan").select2({
         placeholder: "Pilih Asal Jurusan",
         allowClear: true
      });
      $('#nip').keypress(function(data){
      if(data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)){
         $('#cek_nip').html("isikan angka").show().fadeOut("slow");
         return false;
      }
      })
      $('#nidn').keypress(function(data){
      if(data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)){
         $('#cek_nidn').html("isikan angka").show().fadeOut("slow");
         return false;
      }
      })
      $('#formdosen').validate({
         //ignore: null,
         ignore: 'input[type="hidden"]',
         rules: {
            nip: {
               required: true,
               minlength:18,
               maxlength:21   
            },
            nama_dosen:{
               required:true,
            },
				id_dosen:{
               required:true,
            },
            nidn:{
               required:true,
            },
            pangkat:{
               required:true,
            },
            jabatan:{
               required:true,
            },
				jurusan:{
               required:true,
            }                        
         },
			messages: {
				nip: {
					required: "Tolong isi NIP",
					minlength: "Minimal isian 18 karakter",
					maxlength: "Maksimal isian 21 karakter",
					
				},
				nama_dosen: {
					required: "Tolong isi Nama Dosen",
					
				},
				id_dosen: {
					required: "Tolong isi ID Dosen",
					
				},
				nidn: {
					required: "Tolong isi NIDN",
				},
				pangkat: {
					required: "Tolong isi Pangkat",
				},
				jabatan: {
					required: "Tolong isi Jabatan",
				},
				jurusan: {
					required: "Tolong isi Jurusan",
				}
			}
      });
});