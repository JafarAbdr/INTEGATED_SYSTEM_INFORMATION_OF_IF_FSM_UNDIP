$(document).ready(function() {  
   
   jQuery.validator.addMethod("notEqual", function(value, element, param) {
      return this.optional(element) || value != $(param).val();
   }, "This has to be different...");
   
   $('#formruang').validate({
      //ignore: null,
      ignore: 'input[type="hidden"]',
      rules: {
         nama_ruang: {
            required: true
         },
         kapasitas_kuliah: {
            required: true
         },
			kapasitas_ujian: {
            required: true
         }
      },
		messages: {
 			nama_ruang: {
				required: "Tolong isi nama ruang",
			},
			kapasitas_kuliah: {
				required: "Tolong isi kapasitas kuliah",
				
			},
			kapasitas_ujian: {
				required: "Tolong isi kapasitas ujian",
				
			}
		}
   }) 
})