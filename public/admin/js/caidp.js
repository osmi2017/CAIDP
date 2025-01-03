$(document).ready(function(){

	// Choose a type of "Demandeur"

	var btn = '<a class="btn btn-info pull-right " id="noCommunique" href="#">Ne pas communiquer le document</a>';
		// btn+'';
	// dd(btn);

	// $("#type_id").change(function(){
	// 	let type_id = $(this).val();
	// 	if(type_id=="2"){
	// 		$("#nameBox").addClass("hide");
	// 		$("#denomminationBox").removeClass("hide");
	// 		$("#qualite").val("3");
	// 	}else{
	// 		$("#nameBox").removeClass("hide");
	// 		$("#denomminationBox").addClass("hide");
	// 		$("#denomination").val("");
	// 		$("#qualite").val("");
	// 	}
	// });

	$(document).on("click", "#noCommunique", function(){
		NonCommunicationForm()

		$(".btn.btn-default.pull-right").trigger('click');
	})

	$(document).on("click", "#yesProroger", function(){
		prorogationForm();

		$(".btn.btn-default.pull-right").trigger('click');
	})

		// $("#libelle").change(function(){
		// 	$("#libelleInfo").val($(this).val());
		// });
		// $("#information").change(function(){
		// 	verifer();
		// });		
		// $("#libelleInfo").change(function(){
		// 	verifer();
		// });
		// $("#documents").change(function(){
		// 	verifer();
		// });
		
	
	function prorogationForm(){
		$("#delaisProro").removeClass('hide');
		$("#noCommuniqueDetails").addClass("hide");
		$("#decisonDetailsBox").addClass("hide");
		$("input[name=decison]").val("");
		$("input[name=motifNonCommunication]").val("");
		// ============
		$("input[name=dateProrogation]").attr("required", "required");
		$("input[name=motifProrogation]").attr("required", "required");
	}

	function NonCommunicationForm(){
		$("#noCommuniqueDetails").removeClass("hide");
		$("#decisonDetailsBox").removeClass("hide");
		$("#delaisProro").addClass('hide');
		$("input[name=decison]").val("");
		$("input[name=motifProrogation]").val("");
	}

	function DecisonForm(){
		$("#decisonDetailsBox").removeClass("hide");
		$("#noCommuniqueDetails").addClass("hide");
		$("#delaisProro").addClass('hide');
		$("input[name=motifProrogation]").val("");
	}

	

		

	function verifer(){
		i = $("#information").val();
		l = $("#libelleInfo").val();
		d = $("#documents")[0].files.length;
		dd(d);

		if(i!="" && l!=""){
			DecisonForm();
			afficherSuivant();
		}else if(d>=1){
			dd("Oui");
			DecisonForm();
			afficherSuivant();
		}else {
			$(".btn.btn-info.pull-right, .btn.btn-warning.pull-right").addClass('hide');
			afficherBtn();
		}
	}

	function dd(x){
		console.log(x)
	}
	$(document).on('click', '.next.saveDemandeur', function(){
		next();
		return false;
	});
	// BTNEnregistrerDemandeur();
	function BTNEnregistrerDemandeur(){
		$(".btn.btn-default.pull-right").hide();
		$(".btn.btn-default.pull-left").after("<a class='btn btn-success pull-right saveDemandeur next' href='#'>Enregister demandeur</a>");
	}
	function BTNEnregistrerDemande(){
		$(".btn.btn-default.pull-right").hide();
		$(".btn.btn-default.pull-left").after("<a class='btn btn-success pull-right saveDemande next' href=''>Enregister demande</a>");
	}
	

	function afficherSuivant(){
		$(".btn.btn-default.pull-right").show();
		$(".btn.btn-info.pull-right, .btn.btn-warning.pull-right").addClass('hide');
	}


	function afficherBtn(){
			$(".btn.btn-default.pull-right").hide();
			$(".btn.btn-default.pull-left").after(btn);
	}

	// $(".btn.btn-default.pull-right, .btn.btn-default.pull-left, a[href=#step-1], a[href=#step-2], a[href=#step-3], a[href=#step-4]").click(function(){

	// 	setTimeout(function(){
	// 	if($("a[href=#step-1]").hasClass("selected")){
	// 		BTNEnregistrerDemandeur();
	// 	}else if($("a[href=#step-2]").hasClass("selected")){
	// 		BTNEnregistrerDemande();
	// 	}else if($("a[href=#step-3]").hasClass("selected")){
	// 		verifer();
	// 	}else{
	// 		afficherSuivant();			
	// 	}

	// 	}, 500);

	// });

	// $("#dateDemande").focusout(function(){
	// 	var qualite = $("#qualite").val();
	// 	if(qualite==""){
	// 		displayError("Veuillez s'il vous plaît selectionner le type du demandeur dans la section précédente.");
	// 		$(".btn.btn-default.pull-left").trigger('click');
	// 		$("#qualite").parent().parent().parent().addClass('has-error');
	// 		$(this).focus().select();
	// 	}
	// 	var dateDemande = $(this).val();
	// 	if(dateDemande!=""){
	// 		$.get(
	// 			'check-delais', {dateSoumission : dateDemande, qualite_id : qualite},function(data){
	// 				// Si data = 3 {qualite est vide}
	// 				// Si data = 1 {Delais toujours valide}
	// 				// Si data = 0 {Delais toujours expiré}*
	// 				if(data==3){
	// 					displayError("Veuillez s'il vous plaît selectionner le type du demandeur dans la section précédente.");
	// 				}else if(data==0){

	// 					displayContentFoxBox();
	// 				}else if(data==1){
	// 					// displayContentFoxBox();
	// 					// alertError('La demande est toujours en cours !');
	// 					// demandeDelais();
	// 				}
	// 			}
	// 		)
	// 	}
	// });

	// function checkDedelaisProrogartion(){
	// 	var dateProrogation = $("input[name=dateProrogation]").val();
	// 	$.get(
	// 		'check-delais-prorogation', {dateProrogation : dateProrogation}, function(data){
	// 			// Si data = 3 {qualite est vide}
	// 			// Si data = 1 {Delais toujours valide}
	// 			// Si data = 0 {Delais toujours expiré}
	// 			if(data==3){
	// 				alertError("Veuillez choisir la date de prorogation.");
	// 			}else if(data==0){
	// 				hideContentFoxBox();
	// 			}else if(data==1){
	// 				hideContentFoxBox();
	// 				// demandeDelais();
	// 			}
	// 		}
	// 	)
	// }
	function displayError(text){
		$(".messageError").empty().html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> "+text+"</div>");
	}

	// $("input[name=dateProrogation], textarea[name=motifProrogation]").keyup(function(){
	// 	buttonDisabled();
	// });
	// $("input[name=dateProrogation], textarea[name=motifProrogation]").change(function(){
	// 	buttonDisabled();
	// });
	
	function buttonDisabled(){
		var x = $("input[name=dateProrogation]").val();
		var y = $("textarea[name=motifProrogation]").val();
		if(x!="" && y!=""){
			buttonDisplay();
		}else{
			$(".contentFoxBox #valider").attr("disabled", 'disabled');
		}
	}

	function buttonDisplay(){
		$(".contentFoxBox #valider").removeAttr("disabled", 'disabled');
	}

	$("input[name=proroger]").click(function(){
		var proroger = $(this).val();
		if(proroger=="yes"){
			buttonDisabled();
			$("#foxyBoxResponse").fadeIn();
		}else{
			buttonDisplay();
			$("#foxyBoxResponse").fadeOut();
		}
	});

	// $(".contentFoxBox #valider").click(function(){
	// 	var proroger = $("input[name=proroger]:checked").val();
	// 	if(proroger=="yes"){
	// 		checkDedelaisProrogartion();
	// 	}else{
	// 		hideContentFoxBox();
	// 		//next();
	// 	}
	// });

	function next(){
		$(".btn.btn-default.pull-right").trigger('click');
	}

	function displayContentFoxBox(){
		$(".orverlay").css({
			'display' : 'block'
		});
	}

	function hideContentFoxBox(){
		$(".orverlay").css({
			'display' : 'none'
		});
	}

	function alertError(message, titre="Oops"){
		Swal.fire({
		 	type: 'error',
		  	title: titre,
		  	text: message
		});
	}

	function alertProgationQuestion(){
		Swal.fire({
		  	title: 'Delais de progation ecoulé',
		  	text: "",
		  	type: 'warning',
		  	showCancelButton: true,
		  	confirmButtonColor: '#3085d6',
		  	cancelButtonColor: '#d33',
		  	confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
		  	if (result.value) {
		    	Swal.fire(
		      	'Deleted!',
		      	'Your file has been deleted.',
		      	'success'
		    	)
		  	}
		})
	}
	
});