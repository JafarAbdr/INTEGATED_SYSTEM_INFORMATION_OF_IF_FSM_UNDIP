$(document).ready(function() {
		$("#pilihan").select2({
         placeholder: "Pilih Tahun Ajar",
         //allowClear: true
      });      
      $("#thn_ajar").select2({
         placeholder: "Pilih Tahun Ajar",
         //allowClear: true
      }); 		
      $("#semester").select2({
         placeholder: "Pilih Semester",
         //allowClear: true
      });
	  $("#uts_uas").select2({
         placeholder: "Pilih UTS/UAS",
         allowClear: true
      });
		/*
		$("#pilihan").change({
			var pil = $(this).val();
			//alert(pil);
			if(pil){
				$("#thn_ajar").prop("disabled", false);
				$("#semester").prop("disabled", false);
			}else{
				$("#thn_ajar").prop("disabled", true);
				$("#semester").prop("disabled", true);
			}
		});
		*/
		
		$('#form_edit_date').validate({
         //ignore: null,
         ignore: 'input[type="hidden"]',
         rules: {
				pilihan: {
					required: true,
				},
				semester: {
					required: true,
				},
				thn_ajar: {
					required: true,
				},
				uts_uas: {
					required: true,
				}
         },
			messages: {
				password2: {
					required: "Tolong isikan password",
					minlength: "Panjang password harus lebih dari 4 karakter"
				},
				confirm_password: {
					required: "Tolong isikan password",
					minlength: "Panjang password harus lebih dari 4 karakter",
					equalTo: "Isian harus sama dengan password"
				},
				oldpassword: "Password lama harus diisi",
				nama: "Nama pengguna tidak boleh kososng",
				username: "Username tidak boleh kososng",
				jabatan: "Jabatan harus dipilih",
			}
      });
});