$(document).ready(function() {

   $("#nama_pimpinan").select2({
      placeholder: "Masukkan Nama Dosen Informatika",
      minimumInputLength: 2,
   });
   $('#formpimpinanjurusan').validate({
      //ignore: null,
      ignore: 'input[type="hidden"]',
      rules: {
         nama_pimpinan: {
            required: true
         }
      },
		messages: {
 			nama_pimpinan: {
				required: "Field ini tidak boleh kosong",
			}			
 		}
   }) 
})