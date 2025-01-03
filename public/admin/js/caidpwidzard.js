$(document).ready(function(){
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#preview').removeClass('hide');
      $('#preview').attr('src', e.target.result);
    }   
    reader.readAsDataURL(input.files[0]);
  }
}
	
	$("input[name=contact], .contactNumber").inputmask({"mask": "99 99 99 99 99"});  //static mask
	// if($(document).find(".note-editor .fullscreen")){
	// }
  	// $(selector).inputmask({"mask": "(999) 999-9999"}); //specifying options
  	// $(selector).inputmask("9-a{1,3}9{1,3}"); //mask with dynamic syntax


	function returnType(type, delimit="/"){
		var d = type.split(delimit);
			return d[1];
	}

	dataAType = ['jpeg', 'jpg', 'png', 'pdf'];
	function readURLDecisionFile(input) {
	  if (input.files && input.files[0]) {
		  	$(input.files).each(function (e,v) {
		  		if(jQuery.inArray(returnType(v.type), dataAType) == -1){
		      		$('.previewText').removeClass('hide');
		      		$('.previewText').append('<div class="alert alert-danger">le fichier  <b>'+v.name+'</b> doit être du type : JPEG, JPG, PNG, PDF </div> ');
		      		return false;
		  		}else if(v.size>2000000){
		  			$('.previewTextError').removeClass('hide');
		      		$('.previewTextError').append('<div class="alert alert-danger">le fichier <b>'+v.name+'</b> doit avoir une taille maximale de 2M  </div>');
		      		return false;
		  		}else{
		  			var reader = new FileReader();
		      		$('.previewText').removeClass('hide');
		            reader.readAsDataURL(this);
		            reader.onload = function (e) {
		            	$('.previewTextError').empty();
		      			var d = "<iframe src='"+e.target.result+"' width='100%' height='100%'></iframe>";
		                $(".previewText").append("<div class='pull-left text-center'><iframe src='"+e.target.result+"' width='300' height='200'></iframe><br><input type='text' class='fileRename' name='nomFichier[]' placeholder='Nommer le fichier'><br><a class='ZoomerIframe' href='#'><i class='fa-2x fa fa-search-plus'></i></a></div>");
		            }	
		  		}
	            
	        });
	  	}
	}
	$(document).on('keydown', '.fileRename', function(e){
		if(e.keyCode===13){
			return false;
		}
	});
	$(document).on('click', '.previewTextBtn', function(){
		var src = $(document).find("#decisionPrev").attr("src");
		openOverLay("<iframe src='"+src+"' width='100%' height='100%'></iframe>");
		return false;
	});
	

	$("#documents").change(function() {
		$(".previewText").empty();
	  readURLDecisionFile(this);
	});






  	function confirmSuppression(id){
		Swal.fire({
		  	title: 'Confirmer',
			text: "Voulez-vous vraiment supprimer ?",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Supprimer',
			cancelButtontext: 'Annuler',
			customClass: {
			  popup: 'animated tada'
			}
			}).then((result) => {
			if (result.value) {
			    Supprimer(id);
			}
		});
	}

	// Evènement de suppression
	$(".supp").click(function(){
		$(this).each(function(){
			var idSup = $(this).parent().attr('alt');
			confirmSuppression(idSup);
		})

		return false;
	})

	// Fonction de suppression
	function Supprimer(id){
		$(".supp").each(function(){
			var idSup = $(this).parent().attr('alt');
			if(idSup==id){
				$(this).parent().submit();
			}
		})
	}

// ==================================================================================================

	function crf(){
		jQuery.ajaxSetup({
          	headers: {
            	'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          	}
      });
	}

	$("#hideContentFoxBox").click(function(){
		hideContentFoxBox();
	});

	function SweetSuccess(message, titre="Félicitations"){
		Swal.fire({
		 	type: 'success',
		  	title: titre,
		  	text: message
		});
	}

	$(".precedent").each(function(){
		$(this).click(function(){
			$("ul.steps_5 li").eq($(this).attr('rel')).trigger('click');
		})
	});

	$(".suivant").each(function(){
		$("#messageError").slideUp();
		$(this).click(function(){
			$("ul.steps_5 li").eq($(this).attr('rel')).trigger('click');
		});
	});

	function confirmeAction(){
		Swal.fire({
		  	title: 'Confirmer',
			text: "You won't be able to revert this!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!',
			customClass: {
			  popup: 'animated tada'
			}
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

	// confirmeAction()

checkMandant($("#mandant"));
$("#mandant").click(function(){
	checkMandant($(this));
});
function checkMandant(x){
	if(x.prop('checked')==true){
			$("#mandantBox").removeClass('hide');
		$("#mandantBox").find('input').attr("required", "required");
		$("#mandantBox").find('input[name=emailMandant]').removeAttr("required");
		$("#mandantBox").find('input[name=sexeMandataire]').removeAttr("required");
	}else{
		$("#mandantBox").addClass('hide');
		$("#mandantBox").find('input').removeAttr("required");
		$("#representantData").empty();
		$("#nomPrenomBox").empty().html($("#nomPrenomBoxData").html());
		$("#mandantBox input").val();
	}
}

	$("#type_id").change(function(){
		let type_id = $(this).val();
		if(type_id=="2"){
			$("#nameBox").addClass("hide");
			$("#denomminationBox").removeClass("hide");
			// $("#denomination").attr("required", "required");
			$("#titreBox").removeClass("hide");
			// $("#qualiiteBox").removeClass("hide");
			$("#representantData").empty().html($("#representantName").html());
			$("#nomPrenomBox").empty();
			$("#titreBox").attr("required", "required");
			$("#qualite").val("3");
			$("#qualite").removeAttr("required");
			// ==================== mandantBox ==========
			/*$("#mandantBox").addClass('hide');
			$("#mandantBox").find('input').removeAttr("required");*/
			// ===============================================
		}else if(type_id=="4"){
			// ==================== mandantBox ==========
			/*$("#mandantBox").removeClass('hide');
			$("#mandantBox").find('input').attr("required", "required");
			$("#mandantBox").find('input[name=emailMandant]').removeAttr("required");
			$("#mandantBox").find('input[name=sexeMandataire]').removeAttr("required");*/
			// ===============================================
			$("#denomminationBox").addClass("hide");
			$("#titreBox").addClass("hide");
			$("#denomination").val("");
			$("#titreBox").val("");
			$("#denomination").removeAttr("required");
			// $("#qualiiteBox").addClass("hide");
			// $("#qualite").val("3");
			$("#qualite").removeAttr("required");
		}else{
			// $("#qualiiteBox").addClass("hide");
			$("#nameBox").removeClass("hide");
			$("#denomminationBox").addClass("hide");
			$("#titreBox").addClass("hide");
			$("#denomination").val("");
			$("#titreBox").val("");
			$("#qualite").val("");
			$("#denomination").removeAttr("required");
			$("#qualite").attr("required", "required");
			// ==================== mandantBox ==========
			/*$("#mandantBox").addClass('hide');
			$("#mandantBox").find('input').removeAttr("required");
			$("#representantData").empty();
			$("#nomPrenomBox").empty().html($("#nomPrenomBoxData").html());*/
			// ===============================================
		}
	});

	$("ul.steps_5 li").each(function(){
		$(this).click(function(){
			if(!$(this).find("a").hasClass("selected")){
				var pos = $(this).index();
				if(pos!=0){
					var prev = $(this).prev().find("a");
					if(prev.hasClass('done')){
						$("ul.steps_5 li a").removeClass("selected");
						$(this).find("a").addClass("selected")
						var b = $(this).find("a").attr('href').substr(1);
						$(".step").hide(); 
						$("#"+b).fadeIn();	
					}
				}else{
					$("ul.steps_5 li a").removeClass("selected");
					$(this).find("a").addClass("selected")
					var b = $(this).find("a").attr('href').substr(1);
					$(".step").hide(); 
					$("#"+b).fadeIn();	
				}
				
			}		
		});
	});

	$(".saveBTN").each(function(){
		$(this).click(function(){
			var f = $(this).parent().parent().parent(),
				x = formRequired(f);
				if(x==0){
					var fn = $(this).attr("id");
					if(fn=="sendDemandeur"){
						sendDemandeur(f);
					}else if(fn=="sendDemande"){
						sendDemande(f);
					}else if(fn=="sendInform"){
						sendInform(f);
					}else if(fn=="sendDecision"){
						sendDecision(f);
					} else if(fn=="sendProrogation"){
						checkDedelaisProrogartion(f);
					} 
				}
			return false;
		});
	});


	$("form input, form textarea").keyup(function(){
		$(this).each(function(){
			$(this).parent().find("span.invalid-feedback").slideUp();
			suppAttribError($(this));
		})
	});
	$("form select").change(function(){
		$(this).each(function(){
			suppAttribError($(this));
		})
	});

	// progressBar();
	var progressBar = "";

	function progressBarDisplay(perc=5, t=1000){
		var percent = 0;
			progressBar = setInterval(function(){
			percent = percent + perc;
			$(".progress-bar").css('width', percent+"%");
			$(".progress-bar").empty().append(percent+"%");
			if(percent==100){
				clearInterval(progressBar);
			$(".progress-bar").addClass('progress-bar-success');
			}
		}, t);
	}

	function disableBtn(f, t=0){
		if(t==1){
			progressBarDisplay(1, 2000);
		}else{
			progressBarDisplay();
		}
		$(".progress").css('display', 'block');
		f.find("a.saveBTN span").empty().html("<i class='fa fa-refresh fa-spin'></i>");
		f.find("a.saveBTN").attr("disabled", "");
	}

	function ableBtn(f){
		clearInterval(progressBar);
		$(".progress").css('display', 'none');
		$(".progress-bar").css('width', "0%");
		f.find("a.saveBTN span").empty();
		f.find("a.saveBTN").removeAttr("disabled");
	}

	
	
		

	function suppAttribError(attrib){
		if($(attrib).parent().parent().hasClass("has-error")){
			$(attrib).parent().find("span").slideUp();
			$(attrib).parent().parent().removeClass("has-error");
		}
	}

	function formRequired(el){
		var i = 0;
		el.find("input[required], select[required], textarea[required]").each(function(){
			if($(this).val()==""){
				var p = $(this).parent().parent();
				var l = p.find("label").text();
				$(this).parent().find('span').slideDown();
				$(this).parent().find('span.invalid-feedback').empty().html(' le champs 	'+l+' est obligatoire ');
				p.addClass("has-error");
				i++;
				dd(l);
			// return false;
			}
		});
		return i;
	}

	function sendDemandeur(f){
		disableBtn(f);
		// var d = f.find("input, select, textarea, radio, checkbox").serialize();
		var d = new FormData(f.parent()[0]);
		crf();
		$.ajax({
	        url: '../../enregistrer-requerant',
	        type: 'POST',
	        data: d,
	        processData: false,
    		contentType: false,
	        success: function (data) {
				ableBtn(f);
				if(typeof data =='string'){
					var m = JSON.parse(data);
					if(m.error==true){
						ErrorNotify(m.message);	
					}else{
						$("a[href=#step-1]").addClass('done');
						$("ul.steps_5 li").eq(1).trigger('click');
						changeBtn(f, 1);
						if($("#reqIdQual").val()==""){
							$("#reqIdQual").val(m.reqId);
							$("#requerantId").val(m.reqId);
						}
						
						f.find("a.saveBTN").empty().html("<span></span> Mettre à jour");
						SuccessNotify(m.message);	
						var nom = $("input[name=nom]").val(),
							prenom = $("input[name=prenom]").val(),
							sexe = $("input[name=sexe]").val();
						changeRequerantDecisonData(nom+" "+prenom, sexe);
					}				
				}
				else if(typeof  data == 'object'){
					$.each(data, function(key, value){
	      				ErrorNotify(value);
	      			});
	      		}
	      	}
		});
	}

	function sendDemande(f){
		disableBtn(f);
		var fn = f.find("form").serialize(),
			// d = d+"&scane="+$("input[name=scane]")[0].files,
			// idReq = $("#reqIdQual").val(),
			d = new FormData(f.parent()[0]);
		crf();
		$.ajax({
	        url: '../../enregistrer-demande',
	        type: 'POST',
	        data: d,
	        success: function (data) {
	        	ableBtn(f);
	            if(typeof data =='string'){
					var m = JSON.parse(data);
					if(m.error==true){
					ErrorNotify(m.message);	
					}else{
						$("a[href=#step-2]").addClass('done');
						$("ul.steps_5 li").eq(2).trigger('click');
						// checkProroDelais($("#dateDemande").val(), $("#reqIdQual").val());
						SuccessNotify(m.message);	
						$("#libdemanDoc").val($("textarea[name=libelle]").val());
						f.find("a.saveBTN").empty().html("<span></span> Mettre à jour");
						$("#demId input[name=demande_idHidden]").val(m.demId);
						$("#demId_Decision input[name=demande_idHidden]").val(m.demId);
						$("#demande_ID input[name=dem_idHide]").val(m.demId);
						changeBtn(f);
					}
				}
				else if(typeof  data == 'object'){
					$.each(data, function(key, value){
      					ErrorNotify(value);
      				});
      			}
	        },
	        cache: false,
	        contentType: false,
	        processData: false
	    });
	}

	$(".No_Next").click(function(){
		$("a[href=#step-4]").addClass('done');
		$("ul.steps_5 li").eq($(this).attr('rel')).trigger('click');
	});
	$(".nextStep").click(function(){
		$("a[href=#step-3]").addClass('done');
		$("ul.steps_5 li").eq($(this).attr('rel')).trigger('click');
	});
	

	function sendInform(f){
		// if(!confirm("Etes-vous sûr de la visibilité ?")){
		// 	return false;
		// }
		disableBtn(f);
		var fn = f.find("form").serialize(),
			d = new FormData(f.parent()[0]);
		crf();
		$.ajax({
	        url: '../../enregistrer-documents',
	        type: 'POST',
	        data: d,
	        success: function (data) {
	        	ableBtn(f);
	            if(typeof data =='string'){
					var m = JSON.parse(data);
					if(m.error==true){
					ErrorNotify(m.message);	
					}else{
						$("a[href=#step-4]").addClass('done');
						$("ul.steps_5 li").eq(4).trigger('click');
						$("input[name=information_id]").val(m.Inform_id);
						SuccessNotify(m.message);
						changeBtn(f, 1);
					}
				}else if(typeof  data == 'object'){
					$.each(data, function(key, value){
	      				ErrorNotify(value);
	      			});
	      		}
	        },
	        cache: false,
	        contentType: false,
	        processData: false
	    });
	}

	function sendDecision(f){
		disableBtn(f, 1);

		var  
			d = new FormData(f.parent()[0]);
			// d = f.find("input, select, radio, checkbox").serialize(),
			// d = d+formData,
			// demande_id = $("input[name=demande_idHidden]").val(),
			// d = d+"&demande_id="+demande_id,
			// // d = +"&"+d+"&"+formData,
			// d = d+"&decison="+encodeURIComponent(CKEDITOR.instances['decison'].getData());
		crf();
		$.ajax({
	        url: '../../enregistrer-decison',
	        type: 'POST',
	        data: d,
	        processData: false,
    		contentType: false,
	        success: function (data) {
				ableBtn(f);
				if(typeof data =='string'){
					$("a[href=#step-5]").addClass('done');
					var m = JSON.parse(data);
					if(m.error==true){
						ErrorNotify(m.message);	
					}else{
						changeBtn(f);
						$("#decision_id").val(m.decision_id);
						SweetSuccess(m.message);
						setTimeout(function(){
							window.location.href="/home";
						},4000);

						// SuccessNotify(m.message);	
					}
					
				}
				else if(typeof  data == 'object'){
					$.each(data, function(key, value){
	      				ErrorNotify(value);
	      			});
	      		}
      		}
		});
	}

	// alert(navigator.onLine);

	// dd($("#demId input[name=demande_idHidden]").val());

	function changeBtn(f, no=null){
		f.find("div.actionBar .hide").removeClass('hide');
		// f.find("div.actionBar .saveBTN").addClass('hide');
		f.find("div.actionBar .nextStep").addClass('hide');
		if(no==1){
			f.find("div.actionBar .no").addClass('hide');
		}

	}

	function changeBtnDefault(f, no=null){
		f.find("div.actionBar .hideClass").addClass('hide');
		// f.find("div.actionBar .saveBTN ").removeClass('hide');
		

	}

	

	function dd(data){
		console.log(data);
	}

	// function checkProroDelais(dateDemande, reqId){
	// 	if(dateDemande!=""){
	// 		$.get(
	// 			'../../check-delais', {dateSoumission : dateDemande, reqId : reqId},function(data){
	// 				var m = JSON.parse(data);
	// 				if(m.error==true){
	// 					displayError("Une donnée est manquante.");
	// 				}else{
	// 					var startDateYear = m.dateDebut.split('-'),
	// 						endDateYear = m.dateFin.split('-');
	// 						dd(startDateYear);
	// 					$(".newDate").datepicker({
	// 						startDate : new Date(startDateYear[0], startDateYear[1] - 1, startDateYear[2]),
	// 						endDate : new Date(endDateYear[0], endDateYear[1] - 1, endDateYear[2]),
	// 						format : 'yyyy-mm-dd'
	// 					});
	// 				}
	// 			}
	// 		)
	// 	}
	// }

	function displayContentFoxBox(){
		$(".overlay").css({
			'display' : 'block',
		});
		$("body").css('overflow', 'hidden');
		$("html").css('overflow', 'hidden');
	}

	function hideContentFoxBox(){
		$("body").css('overflow', 'scroll');
		$("html").css('overflow', 'scroll');
		$(".overlay").fadeOut();
	}

	
	function checkDedelaisProrogartion(f){
		disableBtn(f);
		var dateProrogation = $("input[name=dateProrogation]").val();
		var motifProrogation = $("input[name=motifProrogation]").val();
		var demande_id = $("input[name=demande_idHidden]").val();
		$.get(
			'../../check-delais-prorogation', {demande_id : demande_id, dateProrogation : dateProrogation, motifProrogation : motifProrogation}, function(data){
				ableBtn(f);
				if(typeof  data == 'object'){
					$.each(data, function(key, value){
	      				ErrorNotify(value, ".contentFoxBoxError");
	      			});
	      		}else if(typeof data =='string'){
					var m = JSON.parse(data);
					if(m.error==true){
						ErrorNotify(m.message);	
					}else{
						$("a[href=#step-3]").addClass('done');
						$("ul.steps_5 li").eq(3).trigger('click');
						changeBtn(f);
						SuccessNotify(m.message);
						if(m.Proro==true){
							SuccessNotify(m.messageProro);
						}else{
							// ErrorNotify(m.messageProro);
							$("#horsdelais").empty().html("<div class='alert alert-warning-2'><i class='fa fa-warning'></i> "+m.messageProro+"</div>")
						}
					}
				}
			}
		)
	}

	$("#emailReqField").keyup(function(){
		// removeReadOnly("#step-1");
	})
	$("#emailReqField").change(function(){
		var email = $(this).val();
		if(email!=""){
			$.get('../../find-email', {email:email}, function(data){
				if( data!="" && typeof data == "string"){
					var d = JSON.parse(data);
					$("input[name=type_id]").val(d.type);
					$("input[name=nom]").val(d.nom);
					$("input[name=prenom]").val(d.prenom);
					$("input[name=contact]").val(d.contact);
					$("input[name=qualite_id]").val(d.qualite);
					$("input[name=adressePostale]").val(d.adressePostale);
					$("input[name=ville]").val(d.ville);
					$("input[name=titre]").val(d.titre);
					$("#reqIdQual").val(d.id);
					$("#requerantId").val(d.id);
					$("#step-1").find("a.saveBTN").empty().html("<span></span> Mettre à jour");
					$("#step-1").find("a.suivant").removeClass('hide');
					$("a[href=#step-1]").addClass('done');
					changeRequerantDecisonData(d.nom+" "+d.prenom, "F");
					if(d.type==4){
						// Mamanda Space
					}
					// addReadOnly("#step-1");		
				}else{
					// removeReadOnlyNotValue("#step-1");	
					// $("#step-1").find("a.saveBTN").empty().html("<span></span> Enregistrer demandeur");
					if($("#requerantId").val()==""){
						$("#step-1").find("a.saveBTN").empty().html("<span></span> Enregistrer demandeur");
					}
				}
			});
		}else{
			if($("#requerantId").val()==""){
				$("#step-1").find("a.saveBTN").empty().html("<span></span> Enregistrer demandeur");
			}
			// removeReadOnly("#step-1");	
		}
	});

	function addReadOnly(parentClass){
		$("a[href="+parentClass+"]").addClass('done');
		changeBtn($(parentClass));
		$(parentClass).find("input[type=text], select").attr("readonly", "readonly");
		if(parentClass=="#step-1"){
			// $(parentClass).find("select[name=type_id]").removeAttr("readonly");
			// $(parentClass).find("#mandantBox select, #mandantBox input ").removeAttr("readonly");
		}
	}
	function removeReadOnly(parentClass){
		$("a[href="+parentClass+"]").removeClass('done');
		changeBtnDefault($(parentClass));
		$(parentClass).find("input[type=text]").val("");
		$(parentClass).find("input[type=text], select").removeAttr("readonly");
	}

	function removeReadOnlyNotValue(parentClass){
		$("a[href="+parentClass+"]").removeClass('done');
		changeBtnDefault($(parentClass));
		// $(parentClass).find("input[type=text]").val("");
		$(parentClass).find("input[type=text], select").removeAttr("readonly");
	}

	
	

	function displayError(text, pos=null){
		if(pos==null){
			pos = ".messageError";
		}
		$(pos).empty().html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> "+text+"</div>");
	}

	function SuccessNotify(t){
		$.notify(t, "success");
	}

	function ErrorNotify(t){
		$.notify(t, "error");
	}

	$("#generer").click(function(){
		$.get(
			'../../generer-passe', function(data){
				$("input[name=password]").empty().val(data);
			}
		)

		return false;
	})

$(document).on('click', '#fullSc', function(){
	// fullScreen();
	$("#BoxHidden").toggleClass('hide');
	$(document).find("a.cke_button__maximize.cke_button_off").trigger('click');
});

$(document).on('click', '#fullScInv', function(){
	// fullScreen();
	$("#BoxHidden").toggleClass('hide');
	$(document).find("a.cke_button__maximize.cke_button_on").trigger('click');
});

function fullScreen(){
	// $("#BoxHidden").toggleClass('hide');
	// $(document).find("a.cke_button__maximize.cke_button_off").trigger('click');
}
var text = null;
$(document).on('keyup', "textarea[name=decison] .note-editable", function(){
	dd($(this).val());
});

$(document).on('click', '.preview', function(){
	var text  =  CKEDITOR.instances['decison'].getData();
	// var text  = $(document).find("textarea[name=decison]").val();
	dd(text);
	previewBox(text);
	return false;
});

$(document).on('click', '#CloseFoxContent', function(){
	hideContentFoxBox();
});

// previewBox($("textarea[name=decison]").val());
function previewBox(data){
	displayContentFoxBox();
	$(".overlay .contentFoxBox .body").html(data);
}


$(".editerForm").click(function(){
	var parent = $(this).parent().parent();
	parent.addClass('hide');
	parent.parent().find(".actionBar a.saveBTN").before().empty().html("<a class='cancel'>Annuler</a>")
	parent.parent().find(".actionBar a.saveBTN").empty().html("<span> Mettre à jour</span>");
	parent.parent().find(".step4Box, .actionBar .saveBTN").removeClass('hide');
	parent.parent().find(".actionBar .precedent, .actionBar .suivant").addClass('hide');
	parent.parent().find(".actionBar .cancel").removeClass('hide');
	return false;
});

$(".cancel").click(function(){
	var parent = $(this).parent().parent().parent();
	parent.find(".step4Box").addClass('hide');
	parent.find(".stepResume").removeClass('hide');
	$(this).parent().find(".precedent").addClass('hide');

	return false;
});

$(document).on('click', '#decisonDisplay', function(){
	var text = $(this).html();
	previewBox(text);
});		

$(document).on('click', 'input[name=brouillon]', function(){
	Brouilllon($(this));
});	

// Brouilllon("input[name=brouillon]");


// function Brouilllon(b){
// 	var c = $(b).val();
// 	if(c!=2){
// 		if(!$("#transmissionBox").hasClass('hide')){
// 			$("#transmissionBox").addClass('hide');
// 		}
// 			$("#transmissionBox input[type=checkbox]").removeAttr('checked');
// 	}else{
// 		openSignature();
// 		$("#transmissionBox").removeClass('hide');
// 		$("#transmissionBox input[type=checkbox]").prop('checked', true);
// 	}
// }


$(".zoomScane").each(function(){
	$(this).click(function(){
		var c = $(this).parent().parent().find(".zoomScaneBox").attr("src");
		displayContentFoxBox();
		$(".overlay .contentFoxBox").css({
			width : '80%',
			top : '350px'
		});
		var w = $(".overlay .contentFoxBox").width(),
			h = $(document).height(),
			h = h-50;
		$(".overlay .contentFoxBox .body").html("<iframe width='"+w+"' height='"+h+"' src='"+c+"'></iframe>");
		return false;
	});
	
});

delaisChecked("#delaisChecked");

function delaisChecked(c){
	// dd($(this));
	var parent = $(c).parent().parent().parent();
	if($(c).prop('checked')){
		parent.find(".nextStep").addClass('hide');
		parent.find(".saveBTN").removeClass('hide');
		$("input[name=motifProrogation]").parent().parent().removeClass('hide');
	}else{
		parent.find(".nextStep").removeClass('hide');
		parent.find(".saveBTN").addClass('hide');
		$("input[name=motifProrogation]").parent().parent().addClass('hide');
	}
}

$("#delaisChecked").click(function(){
	delaisChecked($(this));
});

$("#copielibdemanDoc").click(function(){
	if($(this).prop('checked')){
		$("#libelleInfo").val($("#libdemanDoc").val());
	}else{
		$("#libelleInfo").val("");
	}
});

function changeRequerantDecisonData(nom, sexe){
	if(sexe=="M"){
		var titre = "Monsieur";
	}else{
		var titre = "Madame";
	}
	var t = $("textarea[name=decison]").text();

	t = t.replace("[%%nomReq%%]", nom);
	t = t.replace("[%%titre%%]", titre);
	CKEDITOR.instances['decison'].setData(t);
}

$("#valideDecison").click(function(){
	$("#tranfertQuestion").slideDown();

	return false;
});

$("#cancelValide").click(function(){
	$("#tranfertQuestion").slideUp('hide');
	return false;

});

$("#envoyerDecison").click(function(){
	$("#ouiTransf").trigger('click');
	$(".lineSend").slideUp();
	$("#tranfertQuestion").slideDown();
});

$("#sendValidation").click(function(){
	$(this).addClass('disabled');
	$(this).html("<i class='fa fa-refresh fa-spin'></i>");
	var decison_id = $("input[name=decison_id]").val(),
		transferer = $("input[name=transferer]:checked").val(),
		transmiValid = [];
	    $('input[name="transmiValid[]"]:checked').each(function() {
	    	transmiValid.push($(this).val());

	    });
		crf();
		$.post(
			'../../valider-decision', 
			{decison_id : decison_id, transferer : transferer, transmiValid : transmiValid}, 
			function(data){
				$("#sendValidation").removeClass('disabled');
				$("#sendValidation").empty().html("<span></span> OK");
				// =====================================
				if(typeof data =='string'){
					var m = JSON.parse(data);
					if(m.error==true){
						ErrorNotify(m.message);	
					}else{
						SweetSuccess(m.message);
						setTimeout(function(){
							window.location.href="/home";
						}, 5000);
					}
					
				}
				// =====================================
				
			});
	return false;
});
transmiValid($("input[name=transferer]"));

$("input[name=transferer]").click(function(){
	transmiValid($(this));
});

function transmiValid(b){
	var c = $(b).val();
	if(c==0){
		$("#transmiValid").slideUp('hide');
		$("#transmiValid input[type=checkbox]").removeAttr('checked');
	}else{
		$("#transmiValid").slideDown('hide');
		$("#transmiValid input[type=checkbox]").prop('checked', true);
	}
}

$(document).on("click","#statisf", function(){
	var validation = $(this).data('validation');
		if(validation=="sign"){
			openSignature();
		}else if(validation=="imprim"){
			openSignature();
		}
});


function setDecisonSignature(signature){

	// var t = $("textarea[name=decison]").text(),
	// 	signature = '<img src='+signature+'>',
	// 	
	// 	sp = t.split('<div style="text-align:right"><img src="data:image/png;');
	// 	alert(sp.length);
	// 	if(sp.length==0 || sp.length==1){
	// 		t = t.replace("[%%signature%%]", signature);
	// 	}else{
	// 		var src = sp[1].split("</div>"),
	// 			src1 = src[0],
	// 			m = t.replace(src1, " ");
	// 			t = m.replace('<img src="data:image/png;', signature);		
	// 	}
	var t = $("textarea[name=decison]").text(),
		signature = '<div class="sig"><img src='+signature+' class="signatureCasse"><div>',
		
		sp = t.split('<div class="sig"><img src=');
			alert(sp.length);
		if(sp.length==0 || sp.length==1){
			t = t.replace('<div style="float:right" class="putSign"></div>', signature);
		}else{
			var src = sp[1].split("</div>"),
				src1 = src[0],
				m = t.replace(src1, " ");
				t = m.replace('<div class="sig"><img src=', signature);		
		}
		CKEDITOR.instances['decison'].setData(t);

}


function openSignature(){
	$(document).find("#overLaySign").show();
	$(document).scrollTop(0);
	$("body").css('overflow', 'hidden');
	$("html").css('overflow', 'hidden');
	
	// alert();
}

function previewDecison(signature){
	var t = $("textarea[name=decison]").text(),
	signature = '<div class="sig"><img src='+signature+' class="signatureCasse"><div>',
	
	sp = t.split('<div class="sig"><img src=');
	if(sp.length==0 || sp.length==1){
		t = t.replace('<div style="float:right" class="putSign"></div>', signature);
	}else{
		var src = sp[1].split("</div>"),
			src1 = src[0],
			m = t.replace(src1, " ");
			t = m.replace('<div class="sig"><img src=', signature);		
	}
	previewBox(t);
}
// $.extend($.sign.options, {color: '#0000ff'});

$("#decisonSignPrev").click(function(){
	previewDecison(sig.signature('toDataURL'));
});


$("#closeSign").click(function(){
	closeSignature();
});

function closeSignature(){
	$(document).find("#overLaySign").hide();
	$("body").css('overflow', 'scroll');
	$("html").css('overflow', 'scroll');
		
}

function changeSignatureBox(){
	if($("#sign").signature('isEmpty')){
		$("#signBox").find('.remove').addClass('disabled');
	}else{
		$("#signBox").find('.remove').removeClass('disabled');
	}
}

// function transmissionBoxFunction(){
// 	var transmissionBox = $("#transmissionBox").html();
// 	$(".modeTransmissionBox").empty().append(transmissionBox);
// 	$(".modeTransmission").show();
// }

// function closeSignatureModetrans(){
// 	$(".modeTransmission").hide();	
// 	// window.reload;
// }

$(document).on('click', '#validTransmission', function(){
	$("#transmissionBox").removeClass('hide');
	closeSignatureModetrans();
	return false;
});

$('#svg').click(function() {
	var sig = $('#sign').signature();
	setDecisonSignature(sig.signature('toDataURL'));
	closeSignature();
	$("#transmissionBox").removeClass('hide');
});
var sig = $('#sign').signature({ 
    change: function(event, ui) { 
        changeSignatureBox();
    },
    color : 'blue',
    notAvailable : 'Désolé, ce navigateur ne supporte pas le système de signature'
});

$('#clear').click(function() {
sig.signature('clear');
});

// =====================================
$("#fromValidation tr.editable").click(function(){
	var c = $(this).find("input[name=validation]");
	c.prop('checked', true);
	$("#fromValidation tr").removeClass('bg-info');
	$(this).addClass('bg-info');
	if(c.val()=="image"){
		$("#fromValidation tr.uploadFile").removeClass('hide');
	}else{
		$("#fromValidation tr.uploadFile").addClass('hide');
	}
	dd(c.val());
});

$("#changeScane").click(function(){
	$(".inputDiv").removeClass("hide");
	$(".imagePrev").addClass("hide");

	return false;
});

$("#scaneImg").change(function() {
  readURL(this);
});

function decisionFormDisplay(c){
	if($(c).prop('checked')){
		$(".decisonHeaderBtn").show();
		$("input[name=isDecision]").prop('checked', true);
		$("#notificationFile").attr('required', 'required');
	}else{
		$("input[name=isDecision]").prop('checked', false);
		$(".decisonHeaderBtn").hide();
		$("#notificationFile").removeAttr('required');
	}
}

decisionFormDisplay("#decisionFormDisplay");

$("#decisionFormDisplay").click(function(){
	decisionFormDisplay($(this));
});


$("#printDecision").click(function(){
	var imprimer = CKEDITOR.instances['decison'].getData();
	crf();
	$.post('../../imprimer', {imprimer : imprimer}, function(data){
		if(data=="OK"){
			$("#sendPrintBtn").slideDown();
		}
	});
	return false;
});

function functionClick(){
	$("#sendPrintBtn")[0].click();
}

$(document).on('change', "#information", function(){
	reqLibDoc();
});

$(document).on('change', "#documents", function(){
	reqLibDoc();
});

reqLibDoc();

function reqLibDoc(){
	var lib = $("#information").val(),
		doc = $("#documents").val();
	if($.trim(lib).length!=0 || doc!=""){
		$("#transmissionBox #courrier, #transmissionBox #numerique, #transmissionBox #physique, #transmissionBox #physique, #transmissionBox #faxe").attr('disabled', false).parent().removeClass('gray');
		$("#transmissionBox #site, #transmissionBox #surplace").attr('disabled', true).prop('checked', false).parent().addClass('gray');
		$("#public").attr('disabled', false).removeClass('gray');
		$("label[for=public]").removeClass('gray');
	}else{
		$("#transmissionBox #courrier, #transmissionBox #numerique, #transmissionBox #physique, #transmissionBox #physique, #transmissionBox #faxe").prop('checked', false).attr('disabled', true).parent().addClass('gray');
		$("#transmissionBox #site, #transmissionBox #surplace").attr('disabled', false).parent().removeClass('gray');
		$("#public").attr('disabled', true).addClass('gray');
		$("label[for=public]").addClass('gray');
	}
}

// $("#transmissionBox #courrier").


// $(document).keydown(function(e){
// 	if(e.ctrlKey===true){
// 		if(e.keyCode==85){
// 			// dd('Inpossible de regarde le code');
// 			return false;
// 		}
// 	}
// 	if(e.keyCode===123){
// 		return false;
// 	}
// });

// function noAction(e){
// 	if(e==true){
// 		return false;
// 	}
// }

// $(document).contextmenu(function(){
// 	return false;
// })
// window.open();



// function printContent(){
// 	var restorepage = $('body').html();
// 	var printcontent = restorepage;
// 	var enteredtext = CKEDITOR.instances['decison'].getData();
// 	$('body').empty().html(printcontent);
// 	window.print();
// 	$('body').html(restorepage);
// 	// CKEDITOR.instances['decison'].setData(enteredtext);
// }

// previewBox("dddd");


$(document).on('click', '.ZoomerIframe', function(){
	var i = $(this).parent().find("iframe");
	displayOverlay(i);
	return false;
});

$(".overLay").click(function(){
		closeOverlay();
	});
	$(".grownup").click(function(e){
		var src= $(this).parent().find("iframe").attr("src"),
			iframe = '<iframe src="'+src+'"  class="iframeHight"></iframe>';
		
		displayOverlay(iframe);
		// dd(e);
		return false;
	});

function displayOverlay(data){
		$("body").css('overflow', 'hidden');
		$(document).find('.overLay .contentOverLay').empty().html(data);
		$(document).find('.overLay').show();
	}

	function closeOverlay(){
		$("body").css('overflow', 'auto');
		$(document).find('.overLay').hide();
		// $(document).find('.overLay').empty().html(data);
	}



	$("#motif").change(function(){
		var motif = $(this).val();
		if(motif!="0"){
			$.get('check-saisine/',{motif : motif}, function(data){
				CKEDITOR.instances['description'].setData(data)	
			});
		}else{
			CKEDITOR.instances['description'].setData("");	
		}

	});



});