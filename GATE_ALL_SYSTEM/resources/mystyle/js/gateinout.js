$(document).ready(function(){
	$('#login-exe').on('click',function(){
		j("#setAjax").setAjax({
			url : base_url+"Gateinout/getSignIn.aspx",
			bool : true,
			methode : "POST",
			content : "login-akun="+$('#login-akun').val()+"&login-nim="+$('#login-nim').val()+"&login-password="+$('#login-password').val(),
			sucOk : function(a){
				if(a[0] == '1'){
					window.location = base_url+a.substr(1,a.length-1);
				}else{
					$('#user-alert-message').html(a.substr(1,a.length-1));
					$('#user-alert').modal({backdrop : true});
				}
			},
			sucEr : function(a,b){
				Console.log(a+" "+b+" side effect server");
			}
		});
	});
});