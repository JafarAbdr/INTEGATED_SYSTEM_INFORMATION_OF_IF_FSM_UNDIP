
function ghostAreaEmployee(){
	$('#employee-add').on('click',function(){
		$('#employee-add-error').html("");
		$('#employee-add-succ').html("");
		$('#employee-nip').val("");
		$('#employee-name').val("");
		$('#employee-add-error').val("");
		$('#employee-register-default').trigger('click');
		$('#employee-form').modal({backdrop : true});
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
	$('#employee-list').on('click',function(){
		tempQueryName = "";
		$('#search-name-employee').val("");
		refreshShowListEmployee();
	});
	$('#employee-add-exe').on('click',function(){
		if(!loadingPage().open()){
			openWarningMessage("Sorry, Other proses still running, please wait...");
			return;
		}
		$("#employee-add-exe").attr("disabled","true");
		$("#employee-add-diss").attr("disabled","true");
		j('#setAjax').setAjax({
			url : base_url+"Ghostemployee/addNewEmployee.aspx",
			methode : "post",
			content : "ID="+idGhost+"&"+"IDF=ghostAddEmployee&nip="+$("#employee-nip").val()+"&name="+$("#employee-name").val()+"&mentorid="+$("#employee-register").val(),
			bool : true,
			sucOk : function(c){
				loadingPage().close();
				$("#employee-add-exe").removeAttr("disabled");
				$("#employee-add-diss").removeAttr("disabled");
				if(c[0] == '3'){
					window.location = base_url+"Gateinout.aspx";
				}else if(c[0] == '1'){
					$('#employee-add-error').html("");
					$('#employee-add-succ').html(" - "+c.substr(1,c.length-1));
					setTimeout(function(){
						$('#employee-add-diss').trigger('click');
					},1000);
					refreshShowListEmployee();
				}else{
					$('#employee-add-succ').html("");
					$('#employee-add-error').html(" - "+c.substr(1,c.length-1));
				}
			},
			sucEr : function(b, c){
				if(c == 404 || c == 500)
					loadingPage().close();
				console.log('session add new employee');
			}
		});
	});
	refreshShowListEmployee();
	$("#search-name-employee").keyup(function(event){
		tempQueryName = $(this).val();
		refreshShowListEmployee();
		/*
		if(event.keyCode == 13){
			tempQueryName = $(this).val();
			refreshShowListEmployee();
		}
		*/
	});
}
var tempQueryName = null;
function refreshShowListEmployee(){
	/*
	if(!loadingPage().open()){
		openWarningMessage("Sorry, Other proses still running, please wait...");
		return;
	}
	*/
	//pageLoadActive = true;
	if(tempQueryName == null){
		tempQueryName = "";
		$('#search-name-employee').val("");
	}else{
		$('#search-name-employee').val(tempQueryName);
	}
	j('#setAjax').setAjax({
		url : base_url+"Ghostemployee/showListEmployee.aspx",
			methode : "post",
			content : "ID="+idGhost+"&"+"IDF=ghostShowEmployee&name="+tempQueryName,
			bool : true,
			sucOk : function(c){
				//loadingPage().close();
				if(c[0] == '3'){
					window.location = base_url+"Gateinout.aspx";
				}else if(c[0] == '1'){
					a = JSON.parse(c.substr(1,c.length-1));
					stringTableEmployee = "";
					for(i = 1; i <= a.count; i++){
						stringTableEmployee += getRowListEmployee(a.data[i]);
					}
					$('#table-list-employee').html(stringTableEmployee);
					$('.detail-employee').tooltip();
					$('button').tooltip();
				}else{
					
				}
			},
			sucEr : function(b, c){
				if(c == 404 || c == 500)
					loadingPage().close();
				console.log('session get list employee');
			}
	});
}
function getRowListEmployee(a){
	return "<tr>"+
			"<td style='text-align : center;'>"+a.nip+"</td>"+
			"<td style='text-align : center;'>"+a.photo+"</td>"+
			"<td style='text-align : center;'>"+a.name+"</td>"+
			a.dateregister+
			"<td style='text-align : center;'>"+a.statue+"</td>"+
			"</tr>";
}
function detailEmployee(a){
	//alert(a);
	if(!loadingPage().open()){
		openWarningMessage("Sorry, Other proses still running, please wait...");
		return;
	}
	warningMessage3().open(function(y){
		j('#setAjax').setAjax({
			url : base_url+"Ghostemployee/getDetailEmployee.aspx",
			methode : "post",
			content : "ID="+idGhost+"&"+"IDF=ghostDetailEmployee&nip="+a+"&nip="+a,
			bool : true,
			sucOk : function(c){
				loadingPage().close();
				console.log(c);
				if(c[0] == '3'){
					window.location = base_url+"Gateinout.aspx";
				}else if(c[0] == '1'){
					y(c.substr(1,c.length-1),function(){
										
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
				}else{
					
				}
			},
			sucEr : function(b, c){
				if(c == 404 || c == 500)
					loadingPage().close();
				console.log('session get list employee');
			}
		});
	});
}
function activateThisEmployee(a){
	//alert(a);
	if(!loadingPage().open()){
		openWarningMessage("Sorry, Other proses still running, please wait...");
		return;
	}
	j('#setAjax').setAjax({
		url : base_url+"Ghostemployee/setActivateOrDeactivateEmployee.aspx",
		methode : "post",
		content : "ID="+idGhost+"&"+"IDF=ghostActivateOrDeactivateEmployee&nip="+a+"&statue=1",
		bool : true,
		sucOk : function(c){
			loadingPage().close();
			console.log(c);
			if(c[0] == '3'){
				window.location = base_url+"Gateinout.aspx";
			}else if(c[0] == '1'){
				refreshShowListEmployee();
			}else{
				
			}
		},
		sucEr : function(b, c){
			if(c == 404 || c == 500)
				loadingPage().close();
			console.log('session get list employee');
		}
	});
}
function deactivateThisEmployee(a){
	//alert(a);
	if(!loadingPage().open()){
		openWarningMessage("Sorry, Other proses still running, please wait...");
		return;
	}
	j('#setAjax').setAjax({
		url : base_url+"Ghostemployee/setActivateOrDeactivateEmployee.aspx",
			methode : "post",
			content : "ID="+idGhost+"&"+"IDF=ghostActivateOrDeactivateEmployee&nip="+a+"&statue=2",
			bool : true,
			sucOk : function(c){
				loadingPage().close();
				console.log(c);
				if(c[0] == '3'){
					window.location = base_url+"Gateinout.aspx";
				}else if(c[0] == '1'){
					refreshShowListEmployee();
				}else{
					
				}
			},
			sucEr : function(b, c){
				if(c == 404 || c == 500)
					loadingPage().close();
				console.log('session get list employee');
			}
	});
}
function removeThisEmployee(a){
	warningMessage2().open("Are you sure, you want to remove this employee ? recommended is deactivate because it will destroy all data there connected with this account.",function(){
		if(!loadingPage().open()){
			warningMessage2().agree();
			openWarningMessage("Sorry, Other proses still running, please wait...");
			return;
		}
		j('#setAjax').setAjax({
			url : base_url+"Ghostemployee/removeEmployee.aspx",
				methode : "post",
				content : "ID="+idGhost+"&"+"IDF=ghostRemoveEmployee&nip="+a,
				bool : true,
				sucOk : function(c){
					loadingPage().close();
					console.log(c);
					if(c[0] == '3'){
						window.location = base_url+"Gateinout.aspx";
					}else if(c[0] == '1'){
						warningMessage2().agree();
						refreshShowListEmployee();
					}else{
						
					}
				},
				sucEr : function(b, c){
					if(c == 404 || c == 500)
						loadingPage().close();
					console.log('session remove employee');
				}
		});
	});
}