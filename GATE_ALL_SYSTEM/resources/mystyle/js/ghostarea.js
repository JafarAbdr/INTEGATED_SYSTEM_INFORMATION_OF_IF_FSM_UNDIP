var pageLoadActive = false;
var pageActive = null;
var idGhost = 'ghostJaservTech';
function showPage(a){
	if(!loadingPage().open()){
		openWarningMessage("Sorry, Other proses still running, please wait...");
		return;
	}
	if(pageActive != null){
		if(pageActive == a){
			loadingPage().close();
			return;
		}else{
			pageActive = a;
		}
	}else{
		pageActive = a;
	}
	this.getUrl = function(x){
		switch(x){
			case 'mem' : return 'employee';
			case 'api' : return 'apicontrol';
			//case 'stu' : return 'student';
			//case 'das' : return 'dashboard';
			//case 'set' : return 'setting';
			default : 
			return null;
		}
	};
	if(this.getUrl(a)==null){
			loadingPage().close();
		return;
	}
	j('#setAjax').setAjax({
		url : base_url+"Ghost"+this.getUrl(a)+".aspx",
		methode : "post",
		content : "ID="+idGhost,
		bool : true,
		sucOk : function(c){
			loadingPage().close();
			if(c[0] == '3'){
				window.location = base_url+"Gateinout.aspx";
			}else if(c[0] == '1'){
				$("#content-ghost").slideUp('slow',function(){
					$("#content-ghost").html(c.substr(1,c.length-1));
					$("#content-ghost").slideDown('slow',function(){
						switch(a){
							case 'mem' : ghostAreaEmployee(); break;
							case 'api' : ghostAreaApiControl(); break;
							//case 'stu' : return 'student';
							//case 'das' : return 'dashboard';
							//case 'set' : return 'setting';
						}
					});
				});
			}else{
				
			}
		},
		sucEr : function(b, c){
			if(c == 404 || c == 500)
				loadingPage().close();
			console.log('session '+a);
		}
	});
}
$(document).ready(function(){
	$("#tryLogOut").on('click',function(){
		warningMessage2().open('Are You sure you want to logout ?',function(){
			window.location = base_url+"Ghostarea/logOut.aspx";
		});
	});
});
function loadingPage(){
	this.open = function(){
		if(!pageLoadActive){
			pageLoadActive = true;
			$('#loading-icon').fadeIn("slow");
			return true;
		}else{
			return false;
		}
	};
	this.close = function(){
		$('#loading-icon').fadeOut("slow");
		pageLoadActive = false;
	};
	return this;
}
function openWarningMessage(a){
	$('#warning-message-content').html(a);
	$('#warning-message').modal({backdrop : true});
}
var warningMessage2agree = function(){
	return true;
};
function warningMessage2(){
	this.open = function(message,agree){
		$('#warning-message-2-content').html(message);
		$('#warning-message-2').modal({backdrop : true});
		warningMessage2agree = agree;
	};
	this.agree = function(){
		$('#warning-message-2').modal('hide');
	}
	return this;
}
function warningMessage3(){
	this.open = function(a){
		a(this.content);
	};
	this.content = function(content,generate){
		$("#warning-message-3-content").html(content);
		$('#warning-message-3').modal({backdrop : true});
		generate();
	};
	return this;
}