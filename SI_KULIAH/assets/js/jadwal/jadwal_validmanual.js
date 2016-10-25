$(document).ready(function() {  
   $("#thn_ajar").select2({
      allowClear: true
   }); 
	$("#thn_ajar2").select2({
      allowClear: true
   }); 
   $("#semesterke").select2({
      placeholder: "Pilih semesterke",
      allowClear: true
   });
	$("#semester").select2({
      placeholder: "Pilih semester",
      allowClear: true
   });
	$("#semesterb").select2({
      placeholder: "Pilih semester",
      allowClear: true
   });
	$("#hari").select2({
      placeholder: "Pilih Hari",
      allowClear: true
   });
	$("#uts_uas").select2({
      placeholder: "Pilih UTS/ UAS",
      allowClear: true
   });
	$("#kelas").select2({
      placeholder: "Pilih Kelas",
      allowClear: true
   });
	$("#ruang").select2({
      placeholder: "Pilih Ruang",
      allowClear: true
   });
   $("#matkul").select2({
      placeholder: "Pilih Mata Kuliah",
      //minimumInputLength: 2,
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
   
   jQuery.validator.addMethod("notEqual", function(value, element, param) {
      return this.optional(element) || value != $(param).val();
   }, "This has to be different...");
   
   
   $("#thn_ajar").change(function(){
      var thn_ajar = $("#thn_ajar").val();
      var semester = $("#semester").val();
      var url_b = $("#url_a").val(); 
      //alert(thn_ajar);
      //alert(semester);
      //alert(url_b);
      $.ajax({
         url: url_b,
         data: "thn_ajar="+thn_ajar+"&semester="+semester,
         success: function(data){
            $("#matkul").html(data);
         }
      });
   });

   $("#semester").change(function(){
      var thn_ajar = $("#thn_ajar").val();
      var semester = $("#semester").val();
      var url_b = $("#url_a").val(); 
      //alert(thn_ajar);
      //alert(semester);
      //alert(url_b);
      $.ajax({
         url: url_b,
         data: "thn_ajar="+thn_ajar+"&semester="+semester,
         success: function(data){
            $("#matkul").html(data);
         }
      });
   });

   $('#formjadwal').validate({
      //ignore: null,
      ignore: 'input[type="hidden"]',
      rules: {
         thn_ajar: {
            required: true
         },
         semester: {
            required: true
         },
         semesterke: {
            required: true
         },
			ruang: {
            required: true
         },
			jammulai: {
            required: true
         },
			jamselesai: {
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
				required: "Tolong isi Tahun Ajaran",
			},
			semesterke: {
				required: "Tolong isi Semester Ke",
				
			},
         semester: {
            required: "Tolong isi Semester",
            
         },
			ruang: {
				required: "Tolong isi Nama Ruang",
				
			},
			jammulai: {
				required: "Tolong isi Jam Mulai",
			},
			jamselesai: {
				required: "Tolong isi Jam Selesai",
			},
			matkul: {
				required: "Tolong isi Nama Mata Kuliah",
			},
			hari: {
				required: "Tolong isi Nama Hari",
			},
			uts_uas: {
				required: "Tolong isi UTS/ UAS",
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