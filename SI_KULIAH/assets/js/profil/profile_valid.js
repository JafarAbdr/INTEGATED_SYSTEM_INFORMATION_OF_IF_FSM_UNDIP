$(document).ready(function() {  
		$("#jabatan").select2({
         placeholder: "Pilih jabatan",
         allowClear: true
      });   
      $('#formeditprofil').validate({
         //ignore: null,
         ignore: 'input[type="hidden"]',
         rules: {
				oldpassword: {
					required: true,
					minlength: 4
				},
				password: {
					required: true,
					minlength: 4
				},
				confirm_password: {
					required: true,
					minlength: 4,
					equalTo: "#password"
				},
            nama_user:{
               required:true,
            },
			email:{
				required:true,
				email:true,
			},
				username:{
               required:true,
            }
				           
         },
			messages: {
				password: {
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
			}
      });
		$('#formeditprofil2').validate({
         //ignore: null,
         ignore: 'input[type="hidden"]',
         rules: {
				password2: {
					required: true,
					minlength: 4
				},
				confirm_password: {
					required: true,
					minlength: 4,
					equalTo: "#password2"
				},
            nama_user:{
               required:true,
            },
				username:{
               required:true,
            },
			email:{
				required:true,
				email:true,
			},
				jabatan:{
               required:true,
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
				email: {
					required: "Tolong isikan email",
					email: "Tolong masukkan email yang benar"
				},
				nama: "Nama pengguna tidak boleh kososng",
				username: "Username tidak boleh kososng",
				jabatan: "Jabatan harus dipilih",
			}
      });
});