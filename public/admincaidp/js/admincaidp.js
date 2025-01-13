$(document).ready(function(){
	$("input[name=contact], .contactNumber").inputmask({"mask": "99 99 99 99 99"});
	function dd(a){
		console.log(a);
	}
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
		                $(".previewText").append("<div class='pull-left text-center'><iframe src='"+e.target.result+"' width='300' height='200'></iframe><br><input type='text' class='fileRename' name='nomFichier[]' placeholder='Nommer le fichier' required><br></div>");
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
	

	$("#decisionFile").change(function() {
		$(".previewText").empty();
	  readURLDecisionFile(this);
	});

	$("#logo").change(function() {
	  readURL(this);
	});

	

	function crf(){
		jQuery.ajaxSetup({
          	headers: {
            	'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          	}
      });
	}

	function checkRequired(el){
		var i = 0;
		el.find("input[required], select[required], textarea[required]").each(function(){
			if($(this).val()==""){
				var p = $(this).parent().parent();
				var l = p.parent().parent().find("label").text();
				p.parent().find('span.invalid-feedback').empty().html(' Le champ	 	'+l+' est obligatoire ').addClass('error');
				p.addClass("has-error");
				i++;
				console.log(el)
				
			// return false;
			}
		});
		return i;
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

	function autoCompleteReq(variable, type){
		var d = [];
		if(type=="email"){
			d = { email : variable } 
		}else{
			d = { contact : variable } 
		}
		$.get('../../find-email', d, function(data){
			if(typeof data == 'string'){
				var m = JSON.parse(data);
			
				var rad= "#typeDem" + m.type;
				$("#wizard_horizontal-p-0").find("#contact").empty().val(m.contact);
				$("#wizard_horizontal-p-0").find("#nom").empty().val(m.nom);
				$("#wizard_horizontal-p-0").find("#prenom").empty().val(m.prenom);
				$("#wizard_horizontal-p-0").find("#contact2").empty().val(m.contact2);
				$("#wizard_horizontal-p-0").find("#qualite").empty().val(m.qualiteLib);
				$("#wizard_horizontal-p-0").find("#secteur").empty().val(m.secteur);
				$("#wizard_horizontal-p-0").find("#requerantId").empty().val(m.id);
				$("#wizard_horizontal-p-1").find("#reqIdQual").empty().val(m.id);
				$("#wizard_horizontal-p-0").find("#emailChecker").empty().val(m.email);
				$("#wizard_horizontal-p-0").find("#contactChecker").empty().val(m.contact);
				$("#wizard_horizontal-p-0").find(rad).prop("checked", true);
				$("#reqId").val(m.id);
				var f = $("#wizard_horizontal-p-0");

				if(m.savebycaidp){
					changeBtn(f);
				}else{
					f.find("div.actions .hide").removeClass('hide');
					// f.find("div.actionBar .saveBTN").addClass('hide');
					f.find("div.actions .send").addClass("hide");
					
				}

				$("#wizard_horizontal-t-0").parent().addClass('done');

			}else if(typeof  data == 'object'){
				$.each(data, function(key, value){
  					ErrorNotify(value);
  				});
  			}
		});
	}
	// Chooserespo("OK");
	function Chooserespo(question){
		Swal.fire({
		  	// title: ,
		  	html: "Lequel de ces responsables serait le responsable de l'information ? <br><br><br>"+question,
		  	showCancelButton: true,
		  	showConfirmButton: false,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Confirmer',
			cancelButtonText: 'Aucun',
			customClass: {
			  popup: 'animated tada'
			}
		})
	}

	function checkOrganisme(organisme, reqIdQual=null){
		$.get('../find-orga', { organisme : organisme, reqIdQual : reqIdQual } , function(data){
			if(typeof data == 'string'){
				
				var m = JSON.parse(data);
				$("#wizard_horizontal-p-1").find("#organisme").empty().val(m.organisme);
				$("#wizard_horizontal-p-1").find("#organisme_id").empty().val(m.id);
				$("#wizard_horizontal-p-1").find("#siege").val(m.siege);
				$("#wizard_horizontal-p-1").find("#email").val(m.email);
				$("#wizard_horizontal-p-1").find("#contact").val(m.contact);
				$("#wizard_horizontal-p-1").find("#qualite").val(m.qualiteLib);
				$("#wizard_horizontal-p-1").find("#secteur").val(m.secteur);
				$("#wizard_horizontal-p-1").find("#reqIdQual").val(m.reqIdQual);
				$("#orga_id").empty().val(m.id);
				$("preview").attr('src', m.logo);
				$("#wizard_horizontal-p-1").find("a.send").empty().html("<span></span> Mettre à jour");
				if(m.datalist!=null){
							$("#saisineLoad").empty().append(m.datalist);
						}
				if(m.logo!=null){
					// $("#logo").addClass('hide');
					$("#preview").attr('src', m.logo).removeClass('hide');
				}
				if(m.question==true){
					Chooserespo(m.content);
				}else if(m.respo==true){
					$("#wizard_horizontal-p-1").find("#nom").empty().val(m.respoNom);
					$("#wizard_horizontal-p-1").find("#prenom").empty().val(m.respoPrenom);
					// $("#wizard_horizontal-p-1").find("#autreQualite").empty().val(m.autreQualite);
					// $("#wizard_horizontal-p-1").find("#ri").prop('checked', true);
					$("#wizard_horizontal-p-1").find("#emailrespo").empty().val(m.respoEmail);
					$("#wizard_horizontal-p-1").find("#contactRespo").empty().val(m.respoContact);
					$("#wizard_horizontal-p-1").find("#autreQualite").empty().val(m.respoQualite);
					$("#wizard_horizontal-p-1").find("#responsable_id").empty().val(m.respoID);
					changeBtn($("#wizard_horizontal-p-1"));
					$("#wizard_horizontal-t-1").parent().addClass('done');
				}
				var f = $("#wizard_horizontal-p-0");
				changeBtn(f);
				$("#wizard_horizontal-t-0").parent().addClass('done');

			}else if(typeof  data == 'object'){
				$.each(data, function(key, value){
  					ErrorNotify(value);
  				});
  			}
		});
	}
	
	function changeBtn(f, no=null){
		f.find("div.actions .hide").removeClass('hide');
		// f.find("div.actionBar .saveBTN").addClass('hide');
		f.find("div.actions .send").empty().html('<i class="fa fa-edit"></i> Mettre à jour');
		if(no==1){
			f.find("div.actionBar .no").addClass('hide');
		}
	}
	function responsableCheck(id){
		$.get('../find-respoInfo', {id : id}, function(data){
			if(typeof data == 'string'){
				var m = JSON.parse(data);
				$("#wizard_horizontal-p-1").find("#nom").empty().val(m.nom);
				$("#wizard_horizontal-p-1").find("#prenom").empty().val(m.prenom);
				$("#wizard_horizontal-p-1").find("#autreQualite").empty().val(m.autreQualite);
				// $("#wizard_horizontal-p-1").find("#ri").prop('checked', true);
				$("#wizard_horizontal-p-1").find("#emailrespo").empty().val(m.email);
				$("#wizard_horizontal-p-1").find("#contactRespo").empty().val(m.contact);
				$("#wizard_horizontal-p-1").find("#autreQualite").empty().val(m.qualite);
				$("#wizard_horizontal-p-1").find("#responsable_id").empty().val(m.id);
				changeBtn($("#wizard_horizontal-p-1"));
				$("#wizard_horizontal-t-1").parent().addClass('done');
			}
		});
	}
	// ===============================================================================

	$(".next").click(function(){
		var li = $("#wizard_horizontal ul#wizardRow li.current");
		var pos = li.index();
		if($("#wizard_horizontal ul#wizardRow li.current").hasClass('last')){
			
		}else{
			if(pos==4 || pos==5){
				if(!$("#wizard_horizontal ul#wizardRow li").eq(5).hasClass('done')){
					$("#wizard_horizontal ul#wizardRow li").eq(4).addClass('done');
					$("#wizard_horizontal ul#wizardRow li").eq(5).addClass('done');
				}
			}
			$("#wizard_horizontal ul#wizardRow li").eq(pos+1).find("a").trigger('click');
		}

		return false;
	});

	$(".previous").click(function(){
		var li = $("#wizard_horizontal ul#wizardRow li.current");
		var pos = li.index();
		if($("#wizard_horizontal ul#wizardRow li.current").hasClass('last')){
			
		}else{
			$("#wizard_horizontal ul#wizardRow li").eq(pos-1).find("a").trigger('click');
		}

		return false;
	});

	

	$("#wizard_horizontal ul#wizardRow li a").each(function(){
		var $this = $(this);
		$this.click(function(){
			var content = $this.data('content');
			var pos = $this.parent().index();
			if(pos!=0){
				var prev = $this.parent().prev();
				if(prev.hasClass('done')){
					$("#wizard_horizontal ul#wizardRow li").addClass('disabled').removeClass('current');
					$this.parent().removeClass('disabled').addClass('current');
					$(".content section").addClass('hide').removeClass('current');
					$(".content "+"#"+content).addClass('current').removeClass('hide');	
				}
			}else{
				$("#wizard_horizontal ul#wizardRow li").addClass('disabled').removeClass('current');
				$this.parent().removeClass('disabled').addClass('current');
				$(".content section").addClass('hide').removeClass('current');
				$(".content "+"#"+content).addClass('current').removeClass('hide');		
			}
		});
	});

	$(".send").each(function(){
		$(this).click(function(){
			x = $(this);
			var fn = x.parent().parent(),
				id = x.attr('id');
				
			if(checkRequired(fn)==0){
				if(id=="sendDemandeur"){
					sendDemandeur(fn);
				}else if(id=="sendOrganisme"){
					sendOrganisme(fn);
				}
				else if(id=="sendInform"){
					sendDemande(fn);
				}
				else if(id=="sendSaisine"){
					sendSaisine(fn);
				}else if(id=="sendFacilitation"){
					sendFacilitation(fn);
				}
				else if(id=="sendContentieu"){
					sendContentieu(fn);
				}
				else if(id=="sendDecision"){
					sendDecision(fn,0);
				}
				else if(id=="sendDecisionSave"){
					sendDecision(fn,1);
				}
					
			}
			return false;
		});
	});
	function progressBarDisplay(perc=2, t=1000){
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
		f.find("a.send span").empty().html("<i class='fa fa-refresh fa-spin'></i>");
		f.find("a.send").attr("disabled", "");
	}

	function ableBtn(f){
		clearInterval(progressBar);
		$(".progress").css('display', 'none');
		$(".progress-bar").css('width', "0%");
		f.find("a.send span").empty().html("<i class='fa fa-save '></i>");
		f.find("a.sned").removeAttr("disabled");
	}
		function sendDemandeur(f){
			disableBtn(f);
			// var d = f.find("input, select, textarea, radio, checkbox").serialize();
			var d = new FormData(f[0]);
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
							$("a#wizard_horizontal-t-0").parent().addClass('done');
							$("#wizard_horizontal ul#wizardRow li").eq(1).find("a").trigger('click');
							if($("#reqIdQual").val()==""){
								$("#reqIdQual").val(m.reqId);
								$("#requerantId").val(m.reqId);
								$("#reqId").val(m.reqId);
							}
							f.find("a.send").empty().html("<span></span> Mettre à jour");
							SuccessNotify(m.message);
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

	function sendOrganisme(f){
		var d = new FormData(f[0]);
		crf();
		$.ajax({
	        url: '../organisme-save',
	        type: 'POST',
	        data: d,
	        success: function (data) {
	        	$(document).find('div.has-error').removeClass('has-error');
	            if(typeof data =='string'){
					var m = JSON.parse(data);
					if(m.error==true){
						ErrorNotify(m.message)	
					}else{
						$("a#wizard_horizontal-t-1").parent().addClass('done');
						$("#wizard_horizontal ul#wizardRow li").eq(2).find("a").trigger('click');
						if(m.datalist!=null){
							$("#saisineLoad").empty().append(m.datalist);
						}
						$("#orga_id").empty().val(m.organisme_id);
						SuccessNotify("L'organisme a été créé avec succès");
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

	function sendDemande(f){
		var d = new FormData(f[0]);
		for (var [key, value] of d.entries()) {
			console.log(key + ": " + value);
		}
		//alert(f[0])
		crf();
		$.ajax({
	        url: '../enregistrer-demande',
	        type: 'POST',
	        data: d,
	        success: function (data) {
	        	$(document).find('div.has-error').removeClass('has-error');
	            if(typeof data =='string'){
					var m = JSON.parse(data);
					if(m.error==true){
						ErrorNotify(m.message);	
					}else{
						$("a#wizard_horizontal-t-2").parent().addClass('done');
						$("#wizard_horizontal ul#wizardRow li").eq(3).find("a").trigger('click');
						$("#demande_id").empty().val(m.demId);
						SuccessNotify("La demande a été enregistrée avec succès");
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

	function sendSaisine(f){
		var d = new FormData(f[0]);
		d.append('resume', CKEDITOR.instances['resume'].getData());
		crf();
		$.ajax({
	        url: 'saveSaisine',
	        type: 'POST',
	        data: d,
	        success: function (data) {
	        	$(document).find('div.has-error').removeClass('has-error');
	            if(typeof data =='string'){
					var m = JSON.parse(data);
					if(m.error==true){
						ErrorNotify(m.message);	
					}else{
						$("a#wizard_horizontal-t-3").parent().addClass('done');
						$("#wizard_horizontal ul#wizardRow li").eq(4).find("a").trigger('click');
						$("input[name=saisine_id]").empty().val(m.saisine_id);
						SuccessNotify("La demande a été enregistrée avec succès");
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
	function sendFacilitation(f){
		var d = new FormData(f[0]);
		d.append('suite', CKEDITOR.instances['suite'].getData());
		crf();
		$.ajax({
	        url: 'saveFacilitation',
	        type: 'POST',
	        data: d,
	        success: function (data) {
	        	$(document).find('div.has-error').removeClass('has-error');
	            if(typeof data =='string'){
					var m = JSON.parse(data);
					if(m.error==true){
						ErrorNotify(m.message);	
					}else{
						$("a#wizard_horizontal-t-4").parent().addClass('done');
						// $("#wizard_horizontal ul#wizardRow li").eq(5).find("a").trigger('click');
						var dateSaisine = $("#dateSaisine").val();
							suite = $("#suite").val();
							$("#wizard_horizontal-p-4")
							.find("#facilitationList")
							.empty().html(m.content);
							$(".suiteForm")
								.slideUp()
								.find("input, textarea").val("");
								f.find(".send").addClass('hide');
								f.find(".addFacilitationBtn").removeClass('hide');
								f.find(".next").removeClass('hide');
						SuccessNotify(m.message);


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

	$(document).on("click",".addFacilitationBtn" ,function(){
		$(".suiteForm")
					.slideDown()
					.parent().parent().find(".send").removeClass('hide')
					.find(".next").addClass('hide');
		$(this).addClass('hide')
		return false;
	});


	function sendContentieu(f){
		var d = new FormData(f[0]);
		d.append('argument', CKEDITOR.instances['argument'].getData());
		crf();
		$.ajax({
	        url: 'saveContentieu',
	        type: 'POST',
	        data: d,
	        success: function (data) {
	        	$(document).find('div.has-error').removeClass('has-error');
	            if(typeof data =='string'){
					var m = JSON.parse(data);
					if(m.error==true){
						ErrorNotify(m.message);	
					}else{
						$("a#wizard_horizontal-t-5").parent().addClass('done');
						// $("#wizard_horizontal ul#wizardRow li").eq(5).find("a").trigger('click');
						var dateSaisine = $("#dateSaisine").val();
							suite = $("#suite").val();
							$("#wizard_horizontal-p-5")
							.find("table.contentieuTable ")
							.empty().html(m.content);
							$(".argumentForm")
								.slideUp()
								.find("input, textarea").val("");
								f.find(".send").addClass('hide');
								//f.find(".addArgumentBtn").removeClass('hide');
								f.find(".next").removeClass('hide');
						SuccessNotify(m.message);


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


	function sendDecision(f,save){
		// if(save==0){
		// 	if(!confirm("Voulez-vous vraiment finaliser le traitement de cette saisine ?")){
		// 		return false;
		// 	}
		// }
		var d = new FormData(f[0]);
		d.append('decision', CKEDITOR.instances['decision'].getData());
		d.append('saved', save);
		crf();
		$.ajax({
	        url: 'saveDecision',
	        type: 'POST',
	        data: d,
	        success: function (data) {
	        	$(document).find('div.has-error').removeClass('has-error');
	            if(typeof data =='string'){
					var m = JSON.parse(data);
					if(m.error==true){
						ErrorNotify(m.message);	
					}else{
						if(save==0){
							$("a#wizard_horizontal-t-6").parent().addClass('done');
							Swal.fire({
							  	title: 'Félicitations',
								text: m.message,
								type: 'success',
								showCancelButton: false,
								confirmButtonColor: '#3085d6',
								cancelButtonColor: '#d33',
								confirmButtonText: 'OK',
								cancelButtontext: 'Annuler',
								customClass: {
								  popup: 'animated tada'
								}
								}).then((result) => {
								if (result.value) {
								    window.location.href="accueil"
								}
							});
						}else{
							$("#decision_id").val(m.decision_id);
							$("#decisionDataTable").removeClass('hide').empty().html(m.content);
							$("#wizard_horizontal-p-6 form").addClass('hide');
							$(".previewText").empty();
							SuccessNotify(m.message);
						}
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

	

	$(".addArgumentBtn").click(function(){
		$(".argumentForm")
					.slideDown()
					.parent().parent().find(".send").removeClass('hide')
					.find(".next").addClass('hide');
		$(this).addClass('hide')
		return false;
	});


	
	
	$("#passeFacilitation").click(function(){
		$("a#wizard_horizontal-t-4").parent().addClass('done');
		$("#wizard_horizontal ul#wizardRow li").eq(5).find("a").trigger('click');
		return false;
	});
	$("#emailChecker").change(function(){
		var email = $(this).val();
		if(email!=""){
			autoCompleteReq(email, "email");
		}
		
	});
	$("#checkOrga").change(function(){
		var organisme = $(this).val();
		var reqIdQual = $("#reqIdQual").val();
		if(organisme!=""){
			checkOrganisme(organisme, reqIdQual);
		}
		
	});
	
	$("#contactChecker").change(function(){
		var contact = $(this).val();
		if(contact!==""){
			autoCompleteReq(contact, "contact");
		}
		
	});

	$(document).on('click','.clickRespo',function(){
		$(this).each(function(){
		if(confirm("Voulez-vous confirmer ?")){
			var id = $(this).val();
			responsableCheck(id);
			$(".swal2-actions .swal2-cancel").trigger('click');
		}
		});
	});
	// $("input[name=type_id]").click(function(){
	// 	let type_id = $(this).val();
	// 	if(type_id=="2"){
	// 		$("#nameBox").addClass("hide");
	// 		$("#denomminationBox").removeClass("hide");
	// 		$("#denomination").attr("required", "required");
	// 		$("#titreBox").removeClass("hide");
	// 		// $("#qualiiteBox").removeClass("hide");
	// 		// $("#titreBox").attr("required", "required");
	// 		$("#qualite").val("3");
	// 		$("#qualite").removeAttr("required");
	// 		// ==================== mandantBox ==========
	// 		$("#mandantBox").addClass('hide');
	// 		$("#mandantBox").find('input').removeAttr("required");
	// 		// ===============================================
	// 	}else if(type_id=="4"){
	// 		// ==================== mandantBox ==========
	// 		$("#mandantBox").removeClass('hide');
	// 		$("#mandantBox").find('input').attr("required", "required");
	// 		// ===============================================
	// 		$("#denomminationBox").addClass("hide");
	// 		$("#titreBox").addClass("hide");
	// 		$("#denomination").val("");
	// 		$("#titreBox").val("");
	// 		$("#denomination").removeAttr("required");
	// 		// $("#qualiiteBox").addClass("hide");
	// 		$("#qualite").val("3");
	// 		$("#qualite").removeAttr("required");
	// 	}else{
	// 		// $("#qualiiteBox").addClass("hide");
	// 		$("#nameBox").removeClass("hide");
	// 		$("#denomminationBox").addClass("hide");
	// 		$("#titreBox").addClass("hide");
	// 		$("#denomination").val("");
	// 		$("#titreBox").val("");
	// 		$("#qualite").val("");
	// 		$("#denomination").removeAttr("required");
	// 		$("#qualite").attr("required", "required");
	// 		// ==================== mandantBox ==========
	// 		$("#mandantBox").addClass('hide');
	// 		$("#mandantBox").find('input').removeAttr("required");
	// 		// ===============================================
	// 	}
	// });

	$(document).on('focus', ".renameFile", function(){
		var x = $(this);
		callCss(x);
		if(x.data('change')==0){
			x.empty();
		}
	});

	function callCss(x){
		x.css({
			'background' : '#fff',
			'border' : 'solid épx #eee',
			'padding' : '8px'
		});
	}

	function removeCss(x){
		x.css({
			'background' : 'none',
			'border' : 'none',
			'padding' : '0'
		});
	}

	function checkValue(x){
		
		var nomfichier  = x.text(),
			id          = x.attr('id'),
			type          = x.data('type'),
			defaultText = x.data('default');

		if($.trim(x.text())==""){
			x.text(defaultText);;
		}else{
			saveImageFile(id, nomfichier, type);
			x.data('change', 1);
		}
	}

	function saveImageFile(id, nomFichier, type){
		crf();
		$.post('saveImageFile', {id : id, nomFichier : nomFichier, type}, function(){
			// SuccessNotify('Le fichier à été renommé');
		});
	}

	

	$(document).on('focusout', ".renameFile", function(){
		var x = $(this);
			removeCss(x);
			checkValue(x)
	});

	$(document).on('keydown', '.renameFile', function(e){
		if(e.keyCode===13){
			removeCss($(this));
			checkValue($(this));
			return false;
		}
	});

$(document).on('click', '#fullSc', function(){
	// fullScreen();
	$("#BoxHidden").toggleClass('hide');
	$(document).find("#wizard_horizontal-p-6 .cke_button__maximize.cke_button_off").trigger('click');
});

$(document).on('click', '#fullScInv', function(){
	// fullScreen();
	$("#BoxHidden").toggleClass('hide');
	$(document).find("#wizard_horizontal-p-6 .cke_button__maximize.cke_button_on").trigger('click');
});

$(document).on('click', '.editBtn', function(){
	showForm($(this));
});	

$(document).on('click', '.showData', function(){
	showData($(this));
});	

$(document).on("click", ".editFacilitation", function(){
	var id = $(this).attr('id'),
		parent = $(this).parent().parent(),
		Bigparent = $(this).parent().parent().parent().parent().parent().parent();
		// dd(Bigparent);
		var dateFacilitation = parent.find('td.td_dateFacilitation').text();
		Bigparent.find("#dateFacilitation").val(dateFacilitation);

		var actionFacilitation = parent.find('td.td_actionFacilitation').text();
		Bigparent.find("#actionFacilitation").val(actionFacilitation);

		var suite = parent.find('td.td_suite').data('suite');
		Bigparent.find("#suite").val(suite);
		Bigparent.find("#ficilitationHiddenBox").empty().append("<input name='facilitation_id' type='hidden' value='"+id+"'>");
	$(".addFacilitationBtn").trigger('click');
	return false;
});
$(document).on("click", ".editContentieu", function(){
	var id = $(this).attr('id'),
		parent = $(this).parent().parent(),
		Bigparent = $(this).parent().parent().parent().parent().parent().parent();
		// dd(Bigparent);
		var dateFacilitation = parent.find('td.td_dateContentieux').text();
		Bigparent.find("#dateContentieux").val(dateFacilitation);

		var actionFacilitation = parent.find('td.td_actionContentieu').text();
		Bigparent.find("#actionContentieu").val(actionFacilitation);

		var suite = parent.find('td.td_argument').data('suite');
		Bigparent.find("#argument").val(suite);
		Bigparent.find("#contentieuHiddenBox").empty().append("<input name='contentieu_id' type='hidden' value='"+id+"'>");
	$(".addArgumentBtn").trigger('click');
	return false;
});

$(document).on("click", ".deleteFacilitation", function(){
	if(!confirm("Voulez-vous vraiment supprimer cette action ?")){
		return false;
	}
	var facilitation_id = $(this).attr('id');
	var c = $(this);
	$.get('supprimer-facilitation', { facilitation_id : facilitation_id }, function(data){
		var m = JSON.parse(data);
		if(m.error==false){
			c.parent().parent().remove();
			SuccessNotify(m.message);
		}else{
			ErrorNotify(m.message);
		}
	});
	return false
});

$("#closeOverLayBtn").click(function(){
	closeOverLay();
	return false;
});

$(".overlay").click(function(){
	closeOverLay();
	return false;
});

$(document).on('click', ".ZoomerIframe", function(){
	var c = $(this),
		src = c.parent().find('iframe').attr('src'),
		iframe = "<iframe src='"+src+"' width='100%' height='100%'></iframe>" ;
		openOverLay(iframe);
	return false;
});


function showForm(e){
	e.parent().parent().addClass('hide');
	e.parent().parent().parent().find("form").removeClass('hide');
	if(!e.parent().parent().parent().find(".actions a").hasClass('showData')){
		e.parent().parent().parent().find(".actions").append("<a class='pull-right btn btn-lg btn-danger showData' style='margin-right:10px'>Annuler</a>");
	}
}
function showData(e){
	e.parent().parent().addClass('hide');
	e.parent().parent().parent().find(".EditForm").removeClass('hide');
	e.remove();
}

function closeOverLay(){
	$(".overlay").hide();
	$("body").css('overlay-y', 'auto');
}

function openOverLay(c){
	$(".overlay").show();
	$(".overlay .overlayContent").empty().html(c);
	$("body").css('overlay-y', 'hidden');
}

$(".preview").click(function(){
	var x = $(this);
	var preview = CKEDITOR.instances['decision'].getData();
	openOverLay(preview);
	return false;
});

function ory(){
	alert("Merci");
}

$(".supContentieu").each(function(){
	$(this).click(function(){
		var id = $(this).attr('id'),
			c = $(this);

		if(!confirm("Voulez-vous vraiment supprimer l'action ?")){
			return false;
		}
		$.get('supprimer-contentieu', {id:id}, function(data){
			var m = JSON.parse(data);
			if(m.error!=true){
				c.parent().parent().remove();
				SuccessNotify("Action supprimée");
			}else{
				ErrorNotify("Une erreur est apparue lors de la suppression");
			}
		});
		return false;
	})
});

$(".archived").each(function(){
	$(this).click(function(){
		var c = $(this),
			id = c.attr('id');
		$.get('archived', {id:id}, function(data){
			var m = JSON.parse(data);
			if(c.data('archive')==1){
				c.data('archive', null);
				c.text('A  archiver')
			}else{
				c.data('archive', 1);
				c.text('A ne pas archiver')
			}
			SuccessNotify(m.message);
		});
		return false;
	})
});

$(document).on("click", ".trashFile", function(){
	// $(this).click(function(){	
		var c = $(this),
			id = c.attr('id'),
			saisine_id = c.attr("data-saisineID");
			supprimerFichier(c, id, saisine_id, 'contentPreloadData');
		return false;
	// });
	// return false;
});

$(document).on("click", ".trashFichier", function(){
	// $(this).click(function(){	
		alert();
		var c = $(this),
			id = c.attr('id'),
			saisine_id = c.attr("data-saisineID");
			supprimerFichier(c, id, saisine_id, 'contentTableData');
		return false;
	// });

	// return false;
});


function supprimerFichier(c, id, saisine_id, loadData){
	if(!confirm("Voulez-vous vous vraiment supprimer ce fichier ?")){
		return false;
	}
	$.get('trashFile', {id:id, saisine_id : saisine_id, loadData : loadData}, function(data){
		var m = JSON.parse(data);
		c.parent().remove();
		SuccessNotify(m.message);
		// if(loadData == "contentPreloadData"){
			$("#decisionDataTable").empty().html(m.content);
			$("#preloadIframe").empty().html(m.content2);
		// }
		// 	$("#decisionDataTable").empty().html(m.content);
		
		return true;
	});
	return false;
}


$(document).on("click", ".endBtn", function(){
	if(!confirm("Voulez-vous vraiment finaliser le traitement de cette saisine ?")){
		return false;
	}
	var decision_id = $("#decision_id").val();
	$.get('finaliser-saisine', {decision_id : decision_id}, function(data){
		var m = JSON.parse(data);
		if(m.error==false){
			Swal.fire({
			  	title: 'Félicitations',
				text: m.message,
				type: 'success',
				showCancelButton: false,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'OK',
				cancelButtontext: 'Annuler',
				customClass: {
				  popup: 'animated tada'
				}
				}).then((result) => {
				if (result.value) {
				    window.location.href="accueil"
				}
			});
		}else{
			ErrorNotify(m.message);
		}

	});
	return false;
});


// $("#finaliseSaisine").click(function(){
// 	if(!confirm("Voulez-vous vraiment finaliser cette saisine ?")){
// 		return false;
// 	}
// 	var decision_id = $(this).data('id');
// 	$.get('finaliseSaisine', {decision_id : decision_id}, function(data){
// 		var m = JSON.parse(data);
// 		if(m.error!=true){

// 		}
// 	});
// })
$("input[name=type_id]").change(function(){
	let type_id = $(this).val();
	if(type_id=="2"){
		$("#nameBox").addClass("hide");
		$("#denominationBox").removeClass("hide");
		// $("#denomination").attr("required", "required");
		$("#titreBox").removeClass("hide");
		// $("#qualiiteBox").removeClass("hide");
		$("#representantData").empty().html($("#representantName").html());
		$("#nomPrenomBox").empty();
		$("#titreBox").attr("required", "required");
		$("#qualite").val("3");
		$("#qualite").removeAttr("required");
		// ==================== mandantBox ==========
		// $("#mandantBox").addClass('hide');
		// $("#mandantBox").find('input').removeAttr("required");
		// ===============================================
	}else if(type_id=="4"){
		// ==================== mandantBox ==========
		// alert();
		// $("#mandantBox").removeClass('hide');
		// $("#mandantBox").find('input').attr("required", "required");
		// $("#mandantBox").find('input[name=emailMandant]').removeAttr("required");
		// $("#mandantBox").find('input[name=sexeMandataire]').removeAttr("required");
		// ===============================================
		// $("#denomminationBox").addClass("hide");
		// $("#titreBox").addClass("hide");
		// $("#denomination").val("");
		// $("#titreBox").val("");
		// $("#denomination").removeAttr("required");
		// $("#qualiiteBox").addClass("hide");
		// $("#qualite").val("3");
		// $("#qualite").removeAttr("required");
	}else{
		// $("#qualiiteBox").addClass("hide");
		$("#nameBox").removeClass("hide");
		$("#denominationBox").addClass("hide");
		$("#titreBox").addClass("hide");
		$("#denomination").val("");
		$("#titreBox").val("");
		$("#qualite").val("");
		$("#denomination").removeAttr("required");
		$("#qualite").attr("required", "required");
		// ==================== mandantBox ==========
		// $("#mandantBox").addClass('hide');
		// $("#mandantBox").find('input').removeAttr("required");
		// $("#representantData").empty();
		// $("#nomPrenomBox").empty().html($("#nomPrenomBoxData").html());
		// ===============================================
	}
});

checkMandant($("#mandant"));
$("#mandant").click(function(){
	checkMandant($(this));
});
function checkMandant(x){
	if(x.prop('checked')==true){
			$("#mandantBox").removeClass('hide');
			$("#denomBox").removeClass('hide');
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

$("input[name=type_mandant]").click(function(){
	if($(this).val()=="pers_moral"){
		$("#denomBox").removeClass("hide");
		$("#nomMandatairelabel").text("Représentant");
	}else{
		$("#denomBox").addClass("hide");
		$("#nomMandatairelabel").text("Nom et prénom");
	}
});

// Ajouter un nouveau groupe de champs
$("#add-file").on("click", function() {
	
	const newFileGroup = `
		<div class="file-group">
			<input type="file" class="file-input" name="documents[]" multiple>
			<input type="text" class="file-name" name="document_names[]" placeholder="Nom du document">
			<button type="button" class="remove-file">Supprimer</button>
		</div>
	`;
	$("#file-container").append(newFileGroup);
});



// Supprimer un groupe de champs
$(document).on("click", ".remove-file", function() {
	$(this).closest(".file-group").remove();
});

$("#add-file1").on("click", function() {
	
	const newFileGroup = `
		<div class="file-group1">
			<input type="file" class="file-input1" name="documents1[]" multiple>
			<input type="text" class="file-name1" name="document_names1[]" placeholder="Nom du document">
			<button type="button" class="remove-file1">Supprimer</button>
		</div>
	`;
	$("#file-container1").append(newFileGroup);
});
$(document).on("click", ".remove-file1", function() {
	$(this).closest(".file-group1").remove();
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
});

$('.remove-file1').on('click', function() {
	
	var filename = $(this).closest('.document-item').data('filename');
	
	if (confirm('Are you sure you want to delete this file?')) {
		crf();
		$.ajax({
			url: '/documents/' + filename, // Adjust the URL as needed
			type: 'DELETE',
			data: {
				_token: '{{ csrf_token() }}' // Include CSRF token for security
			},
			success: function(response) {
				alert('File deleted successfully.');
				// Optionally remove the file item from the DOM
				$(this).closest('.document-item').remove();
			},
			error: function(xhr) {
				console.log(xhr.responseText)
				alert('Error deleting file: ' + xhr.responseText);
			}
		});
	}
});
});