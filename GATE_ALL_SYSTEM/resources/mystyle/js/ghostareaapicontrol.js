function ghostAreaApiControl(){
    $('#api-add').on('click',function(){
		$('#api-add-error').html("");
		$('#api-add-succ').html("");
		$('#api-domain').val("");
		$('#api-email').val("");
		$('#api-add-error').val("");
		$('#api-mahasiswa-register-default').trigger('click');
		$('#api-employee-register-default').trigger('click');
		$('#api-form').modal({backdrop : true});
		$(".btn-group > .btn[data-toggle-class]").click(function(){
			var $this = $(this),
				$parent = $this.parent();

			if ($parent.data("toggle") == "buttons-radio"){
				$parent.children(".btn[data-toggle-class]").removeClass(function(){
					return $(this).data("toggle-class")
				}).addClass(function(){
						return $(this).data("toggle-passive-class")
					});
				$this.removeClass($(this).data("toggle-passive-class")).addClass($this.data("toggle-class"));
			} else {
				$this.toggleClass($(this).data("toggle-passive-class")).toggleClass($this.data("toggle-class"));
			}
		});
	});
	$('#api-list').on('click',function(){
		tempQueryName = "";
		$('#search-name-api').val("");
		refreshShowListApi();
	});
	refreshShowListApi();
	$("#search-name-api").keyup(function(event){
		tempQueryDomain = $(this).val();
		refreshShowListApi();
		/*
		if(event.keyCode == 13){
			tempQueryDomain = $(this).val();
			refreshShowListApi();
		}
		*/
	});
	$('#api-add-exe').on('click',function(){
		if(!loadingPage().open()){
			openWarningMessage("Sorry, Other proses still running, please wait...");
			return;
		}
		$("#api-add-exe").attr("disabled","true");
		$("#api-add-diss").attr("disabled","true");
		j('#setAjax').setAjax({
			url : base_url+"Ghostapicontrol/addNewApi.aspx",
			methode : "post",
			content : "ID="+idGhost+"&"+"IDF=ghostAddApi&domain="+$("#api-domain").val()+"&email="+$("#api-email").val()+"&mahasiswaid="+$("#api-mahasiswa-register").val()+"&employeeid="+$("#api-employee-register").val(),
			bool : true,
			sucOk : function(c){
				loadingPage().close();
				$("#api-add-exe").removeAttr("disabled");
				$("#api-add-diss").removeAttr("disabled");
				if(c[0] == '3'){
					window.location = base_url+"Gateinout.aspx";
				}else if(c[0] == '1'){
					$('#api-add-error').html("");
					$('#api-add-succ').html(" - "+c.substr(1,c.length-1));
					setTimeout(function(){
						$('#api-add-diss').trigger('click');
					},1000);
					refreshShowListApi();
				}else{
					$('#api-add-succ').html("");
					$('#api-add-error').html(" - "+c.substr(1,c.length-1));
				}
			},
			sucEr : function(b, c){
				if(c == 404 || c == 500)
					loadingPage().close();
				console.log('session add new api');
			}
		});
	});
}
var tempQueryDomain = null;
function refreshShowListApi(){
	/*
	if(!loadingPage().open()){
		alert();
		openWarningMessage("Sorry, Other proses still running, please wait...");
		return;
	}
	*/
	//pageLoadActive = true;
	if(tempQueryDomain == null){
		tempQueryDomain = "";
		$('#search-name-api').val("");
	}else{
		$('#search-name-api').val(tempQueryDomain);
	}
	j('#setAjax').setAjax({
		url : base_url+"Ghostapicontrol/showListApi.aspx",
			methode : "post",
			content : "ID="+idGhost+"&"+"IDF=ghostShowApi&name="+tempQueryDomain,
			bool : true,
			sucOk : function(c){
				//loadingPage().close();
				if(c[0] == '3'){
					window.location = base_url+"Gateinout.aspx";
				}else if(c[0] == '1'){
					a = JSON.parse(c.substr(1,c.length-1));
					stringTableApi = "";
					for(i = 1; i <= a.count; i++){
						stringTableApi += getRowListApi(a.data[i]);
					}
					$('#table-list-api').html(stringTableApi);
					//$('.detail-employee').tooltip();
					$('button').tooltip();
				}else{
					
				}
			},
			sucEr : function(b, c){
				if(c == 404 || c == 500)
					loadingPage().close();
				console.log('session get list api');
			}
	});
}
function getRowListApi(a){
	return "<tr>"+
			"<td style='text-align : center;'>"+a.domain+"</td>"+
			"<td style='text-align : center;'>"+a.email+"</td>"+
			"<td style='text-align : center;'>"+a.dateregister+"</td>"+
			"<td style='text-align : center;'>"+a.statue+"</td>"+
			"</tr>";
}
function mailThisDomain(tempDomain){
	if(!loadingPage().open()){
		alert();
		openWarningMessage("Sorry, Other proses still running, please wait...");
		return;
	}
	j('#setAjax').setAjax({
		url : base_url+"Ghostapicontrol/mailThisApi.aspx",
			methode : "post",
			content : "ID="+idGhost+"&"+"IDF=ghostMailThisApi&domain="+tempDomain,
			bool : true,
			sucOk : function(c){
				loadingPage().close();
				if(c[0] == '3'){
					window.location = base_url+"Gateinout.aspx";
				}else if(c[0] == '1'){
					openWarningMessage("Successfull send mail to the syncr email of this host");
				}else{
					openWarningMessage("failed send mail to the syncr email of this host");
				}
			},
			sucEr : function(b, c){
				if(c == 404 || c == 500)
					loadingPage().close();
				console.log('session sen mail of api');
			}
	});
}
function deleteThisDomain(tempDomain){
	if(!loadingPage().open()){
		alert();
		openWarningMessage("Sorry, Other proses still running, please wait...");
		return;
	}
	j('#setAjax').setAjax({
		url : base_url+"Ghostapicontrol/removeApi.aspx",
			methode : "post",
			content : "ID="+idGhost+"&"+"IDF=ghostRemoveApi&domain="+tempDomain,
			bool : true,
			sucOk : function(c){
				loadingPage().close();
				if(c[0] == '3'){
					window.location = base_url+"Gateinout.aspx";
				}else if(c[0] == '1'){
					openWarningMessage("Successfull send mail to the syncr email of this host");
					refreshShowListApi();
				}else{
					openWarningMessage("failed send mail to the syncr email of this host");
				}
			},
			sucEr : function(b, c){
				if(c == 404 || c == 500)
					loadingPage().close();
				console.log('session sen mail of api');
			}
	});
}
tempShowActorOfThisActiveDomain = "";
function showActorOfThis(tempDomain){
	tempShowActorOfThisActiveDomain = tempDomain;
	$('#api-actor-form').modal({backdrop : 'static'});
	refreshApiActor();
}

function getRowListApiActor(a){
	return "<tr>"+
			"<td style='text-align : center;'>"+a.level+"</td>"+
			"<td style='text-align : center;'>"+a.nama+"</td>"+
			"<td style='text-align : center;'>"+a.dateregister+"</td>"+
			"<td style='text-align : center;'>"+a.statue+"</td>"+
			"</tr>";
}
function refreshApiActor(){
	j('#setAjax').setAjax({
		url : base_url+"Ghostapicontrol/showListApiActor.aspx",
			methode : "post",
			content : "ID="+idGhost+"&"+"IDF=ghostShowListApiActor&domain="+tempShowActorOfThisActiveDomain,
			bool : true,
			sucOk : function(c){
				//alert(c);
				//loadingPage().close();
				if(c[0] == '3'){
					window.location = base_url+"Gateinout.aspx";
				}else if(c[0] == '1'){
					a = JSON.parse(c.substr(1,c.length-1));
					stringTableApi = "";
					for(i = 1; i <= a.count; i++){
						stringTableApi += getRowListApiActor(a.data[i]);
					}
					$('#table-list-api-actor').html(stringTableApi);
					$('#api-actor-nip').html(a.dosenList);
					$('#api-actor-level').val("0");
				}else{

				}
			},
			sucEr : function(b, c){
				if(c == 404 || c == 500)
					loadingPage().close();
				console.log('session sen mail of api');
			}
	});
}
function addNewApiActor(){
	if(!loadingPage().open()){
		alert();
		openWarningMessage("Sorry, Other proses still running, please wait...");
		return;
	}
	$("#api-actor-add-diss").attr("disabled","true");
	$("#api-actor-add").attr("disabled","true");
	level = $("#api-actor-level").val();
	nip = $("#api-actor-nip").val();
	//alert(nip);
	j('#setAjax').setAjax({
		url : base_url+"Ghostapicontrol/addNewApiActor.aspx",
			methode : "post",
			content : "ID="+idGhost+"&"+"IDF=ghostAddApiActor&domain="+tempShowActorOfThisActiveDomain+"&level="+level+"&nip="+nip,
			bool : true,
			sucOk : function(c){
				//alert(c);
				loadingPage().close();
				$("#api-actor-add-diss").removeAttr("disabled");
				$("#api-actor-add").removeAttr("disabled");
				if(c[0] == '3'){
					window.location = base_url+"Gateinout.aspx";
				}else if(c[0] == '1'){
					//openWarningMessage("Successfull send mail to the syncr email of this host");
					$("#api-actor-level").val("0");
					$("#api-actor-nip").val("0");
					refreshApiActor();
				}else{
					openWarningMessage("failed add new actor for this api host");
				}
			},
			sucEr : function(b, c){
				if(c == 404 || c == 500)
					loadingPage().close();
				console.log('session sen mail of api');
			}
	});
}

function deleteThisDomainActor(domain,nip,level){
	if(!loadingPage().open()){
		alert();
		openWarningMessage("Sorry, Other proses still running, please wait...");
		return;
	}
	$("#api-actor-add-diss").attr("disabled","true");
	$("#api-actor-add").attr("disabled","true");
	//alert(nip);
	j('#setAjax').setAjax({
		url : base_url+"Ghostapicontrol/removeApiActor.aspx",
			methode : "post",
			content : "ID="+idGhost+"&"+"IDF=ghostRemoveApiActor&domain="+domain+"&level="+level+"&nip="+nip,
			bool : true,
			sucOk : function(c){
				//alert(c);
				loadingPage().close();
				$("#api-actor-add-diss").removeAttr("disabled");
				$("#api-actor-add").removeAttr("disabled");
				if(c[0] == '3'){
					window.location = base_url+"Gateinout.aspx";
				}else if(c[0] == '1'){
					//openWarningMessage("Successfull send mail to the syncr email of this host");
					$("#api-actor-level").val("0");
					$("#api-actor-nip").val("0");
					refreshApiActor();
				}else{
					openWarningMessage("failed add new actor for this api host");
				}
			},
			sucEr : function(b, c){
				if(c == 404 || c == 500)
					loadingPage().close();
				console.log('session sen mail of api');
			}
	});
}