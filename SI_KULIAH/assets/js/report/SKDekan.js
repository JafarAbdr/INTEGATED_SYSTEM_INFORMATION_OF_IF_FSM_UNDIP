$(document).ready(function() {     
      $("#thn_ajar").select2({
         placeholder: "Pilih Tahun Ajar",
         //allowClear: true
      }); 
      
      $("#semester").select2({
         placeholder: "Pilih Semester",
         //allowClear: true
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
            }            
         }
      });
});