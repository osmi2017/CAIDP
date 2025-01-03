function crf(){
	jQuery.ajaxSetup({
      	headers: {
        	'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      	}
  });
}
//$("input[name=contact], .contactNumber").inputmask({"mask": "99 99 99 99 99"});
function ErrorNotify(t){
	$(".errorBox").addClass("alert alert-danger").empty().append(t);
}
function ErrorSIgnin(t){
	$("#loginError").addClass("alert alert-danger").empty().append(t);
}
function SucessSIgnin(t){
	$("#loginError").addClass("alert alert-sucess").empty().append(t);
}

$("#searchInput").keyup(function(){
	if($(this).val().length>2){
		$(document).find(".datalist").attr('id', $(this).attr('list'));
		// ==========================
		var searchInput = $(this).val();
		$.get('find-organisme', {searchInput : searchInput}, function(data){
			$(document).find("#organismeId").empty().html(data);
			$(document).find("#organismeId").fSelect('reload');
		});
	}
});

// $(document).scroll(function(){
// 	if($(document).scrollTop()>=150)
// 	{
// 		$(".main-search-inner").addClass("fixed");
// 	}else
// 	{
// 		$(".main-search-inner").removeClass("fixed");
// 	}
// })

$(document).find('#searchInput').keydown(function(e){
	if(e.keyCode==13){
		$("#rechercher").trigger('click');
	}
});

$(document).on('click', ".pagination a", function(){
	if($(document).find("span#organisme_id")){
		var organisme_id = $(document).find("#organisme_id").attr("alt");
		var link = "../ajax-search";
	}else{
		var organisme_id = null;
		var link = "ajax-search";
	}
	var page = $(this).attr('href').split("page=")[1];
	$.get(link, {page : page, organisme_id : organisme_id}, function(data){
		$("#displayInfo").empty().html(data);
		$('html, body').animate({
            scrollTop: $("#docAllTotal").offset().top
        }, 500);

	});
		return false;
});

$(document).on('keyup', '#inputSearchOrganisme', function(){
	var organisme = $(this).val();
	$.get('../organisme-search', {organisme : organisme}, function(data){
	console.log(data);
		$("#organismeSearchBox").empty().html(data);
	});	
});

$("#rechercher").click(function(){
	var libelle = $("input[name=libelle]").val(),
		organisme = $("select[name=organisme]").val();
		// alert(libelle+" "+organisme);
		if(!libelle || !organisme ){
			showErrorAlert("Veuillez faire une recherche");
			hideErrorAlert();
		}else{
			$.get('resultat-recherche', {libelle : libelle, organisme : organisme}, function(data){
			//console.log(data)
				//alert(data);
				$(".main-search-inner").addClass("fixed");
				$(document).find("#searchContent").empty().html(data);
				displayResult();
			});
		}
	return false;
});
$("#closeResult").click(function(){
	$(".main-search-inner").removeClass("fixed");
	hideResult();
});

function displayResult(){
	$("#searchResult").show(350);
	$("body, html").css('overflow', 'hidden');
}
function hideResult(){
	$("body, html").css('overflow', 'auto');
	$("#searchResult").hide(350);
}
function hideErrorAlert(){
	setTimeout(function(){
		$("#rechercherEmpty").slideUp();
	}, 3000);
}

function showErrorAlert(t){
	$("#rechercherEmpty")
	.css({
		'background' : 'red',
		'padding' : '10px',
		'border-radius' : '15px',
		'color' : 'white',
		'font-weight' : 'bold'
	})
	.empty().text(t).slideDown();
}

$("#closeLoginModal").click(function(){
	$("#loginBox").fadeOut(300);
	$("body, html").css('overflow', 'auto');
	return false;
});

$(".loginBoxOpen").click(function(){
	$("#loginBox").fadeIn(500);
	
	return false;
});
$("#tab1Box").click(function(){
	// var width = $("#sign-in-dialog").attr("alt");
	$("#sign-in-dialog").css("max-width", "500px");
	$("#tab2Box").parent().removeClass('active');
	$(this).parent().addClass('active');
	$("#tab1").show(300);
	$("#tab2").hide();
	return false;
});

$("#tab2Box").click(function(){
	// var width = $("#sign-in-dialog").css("max-width");
	$("#sign-in-dialog").css("max-width", '80%');
	$("#tab1Box").parent().removeClass('active');
	$(this).parent().addClass('active');
	$("#tab2").show(300);
	$("#tab1").hide();
	const input = document.querySelector(".phone");
 	const utilsScriptPath = "{{ asset('js/intelinput/utils.js') }}";

	window.intlTelInput(input, {
		geoIpLookup: function(callback) {
			fetch("https://ipapi.co/json")
			     .then(function(res) { return res.json(); })
			     .then(function(data) { callback(data.country_code); })
			     .catch(function() { callback("us"); });
			 },
		preferredCountries: ['ci'],
		
		utilsScript: utilsScriptPath
	});
	return false;
});
$("#loginBtn").click(function(){
	
	crf();
	$("p.form-row").find('input').removeClass('error');
	$("p.form-row").find('span.error').empty();
	var f = $(".login").serialize();
	$.post('connexion', f, function(data){
		if(typeof data=='object'){
			$.each( data, function( key, value ) {
			  $(document).find("input[name="+key+"]").parent().parent().find("span.error").empty().append(value);
			  $(document).find("input[name="+key+"]").parent().find('input').addClass('error').focus();
			});
		}else{
			if(typeof data == 'string'){
				var m = JSON.parse(data);
				if(m.error==true){
					ErrorNotify(m.message);	
				}else{
					window.location.href = m.message;
				}
			}
		}
	});
	return false;
});

function togglePasswordVisibility() {
	const passwordInput = document.getElementById('password');
	const icon = document.querySelector('.toggle-icon');
  
	if (passwordInput.type === 'password') {
	  passwordInput.type = 'text';
	  icon.innerHTML = '&#128064;'; // Show eye-slash icon
	} else {
	  passwordInput.type = 'password';
	  icon.innerHTML = '&#128065;'; // Show eye icon
	}
  }
  


$(document).on('click','#QBheadeUp', function(){
	$(this)
	.attr('id', 'QBheadereduce')
	.attr('title', 'Réduire la fenêtre');
	$(this).find('i').addClass('fa-chevron-down');
	$(this).find('i').removeClass('fa-chevron-up');
	QBheadereduce(1);
});

$(document).on('click','#QBheadereduce', function(){
	$(this)
	.attr('id', 'QBheadeUp')
	.attr('title', 'Réduire la fenêtre');
	$(this).find('i').addClass('fa-chevron-up');
	$(this).find('i').removeClass('fa-chevron-down');
	QBheadereduce();
});

function QBheadereduce(action=null){
	if(action==null){
		$("#questionBox").animate({
			'bottom' : '-290px',
		}, 700);
		
	}else{
		$("#questionBox").animate({
			'bottom' : '-5px',
		}, 700);
		
	}
}

$("#type_id").change(function(){
	let type_id = $(this).val();
	if(type_id=="2"){
		$("#nameBox").addClass("hide");
		$("#denomminationBox").removeClass("hide");
		$("#denomination").attr("required", "required");
		$("#titreBox").removeClass("hide");
		$("#representantData").empty().html($("#representantName").html());
		$("#nomPrenomBox").empty();
		// $("#qualiiteBox").removeClass("hide");
		$("#titreBox").attr("required", "required");
		$("#qualite").val("3");
		$("#qualite").removeAttr("required");
		// ==================== mandantBox ==========
		$("#mandantBox").addClass('hide');
		$("#mandantBox").find('input').removeAttr("required");
		// ===============================================
	}else if(type_id=="4"){
		// ==================== mandantBox ==========
		$("#mandantBox").removeClass('hide');
		$("#mandantBox").find('input').attr("required", "required");
		$("#mandantBox").find('input[name=emailMandant]').removeAttr("required");
		$("#mandantBox").find('input[name=sexeMandataire]').removeAttr("required");
		// ===============================================
		$("#denomminationBox").addClass("hide");
		$("#titreBox").addClass("hide");
		$("#denomination").val("");
		$("#titreBox").val("");
		$("#denomination").removeAttr("required");
		// $("#qualiiteBox").addClass("hide");
		$("#qualite").val("3");
		$("#qualite").removeAttr("required");
	}else{
		// $("#qualiiteBox").addClass("hide");
		$("#nameBox").removeClass("hide");
		$("#representantData").empty();
		$("#nomPrenomBox").empty().html($("#nomPrenomBoxData").html());
		$("#denomminationBox").addClass("hide");
		$("#titreBox").addClass("hide");
		$("#denomination").val("");
		$("#titreBox").val("");
		$("#qualite").val("");
		$("#denomination").removeAttr("required");
		$("#denomination1").removeAttr("required");
		$("#qualite").attr("required", "required");
		// ==================== mandantBox ==========
		$("#mandantBox").addClass('hide');
		$("#mandantBox").find('input').removeAttr("required");
		// ===============================================
	}
});

$("#sendReq").click(function(){
	var ik =$(".iti__selected-flag").attr('title')
	//alert(ik);
	//return false;
	x = formRequired($("#sendReqForm"));
	
	if(x==0){
		var sendReqForm = new FormData($("#sendReqForm")[0]);
		for (var pair of sendReqForm.entries()) {
			console.log(pair[0]+ ', ' + pair[1]); 
		}
		crf();
		$.ajax({
	        url: '/inscription',
	        type: 'POST',
	        data: sendReqForm,
	        success: function (data) {
				try{
				console.log(JSON.parse(data));
				if(typeof data =='string'){
					var m = JSON.parse(data);
					
					if(m.error==true){
						
						ErrorSIgnin(m.message);	
					}else if(m.error==false){
						
						ErrorSIgnin(m.message)
						window.location.href = m.message;				
					}
					else{
						
						$.each(data, function(key, value){
	      					ErrorSIgnin(value);
	      				});
					}				
				}
				else if(typeof  data == 'object'){
					console.log('herrrrrrrrrrrr444444444444444')
					$.each(data, function(key, value){
	      				ErrorSIgnin(value);
	      			});
	      		}
			}
			catch (e) {
				console.log('herrrrrrrrrrrr555555555555555')
				ErrorSIgnin(data);
			}
	      	},
	        cache: false,
	        contentType: false,
	        processData: false
		});
	}
	return false;
});

function formRequired(el) {
   
    var i = 0;
    $("#loginError").removeClass('alert alert-danger').empty();

    el.find("input[required]:not(.remplacement), select[required]:not(.hide), textarea[required]:not(.hide), input[required]:not(.denomination1)").each(function() {
        if ($(this).val() === "") {
			console.log('iiiiiiiiiiiiiii')
			console.log($(this).attr('class'))
            var p = $(this).parent().parent();
            var l = p.find("label").text();
            ErrorSIgnin('The field "' + l.trim() + '" is mandatory');
            i++;
        }
    });
    return i;
}


function dd(x){
	// console.log(x);
}
function SuccessNotify(t){
	$.notify(t, "success");
}
$("input[name=emailMandant]").removeAttr("required");

$("#docPub").click(function(){
	$(this).addClass('active');
	$("#lisRespo").removeClass('active');
	$("#displayInfo").removeClass('hide');
	$("#displayrespo").addClass('hide');
	return false;
});

$("#lisRespo").click(function(){
	$("#docPub").removeClass('active');
	$(this).addClass('active');
	$("#displayInfo").addClass('hide');
	$("#displayrespo").removeClass('hide');
	return false;
});


$("input[name=mandant]").click(function(){
	
	checkMandant($(this));
});
function checkMandant(x){
	if(x.val()=="oui"){
			$("#mandantBox").removeClass('hide');
		
		$("#mandantBox").find('input[name=emailMandant]').removeAttr("required");
		$("#mandantBox").find('input[name=sexeMandataire]').removeAttr("required");
		typ =$("#type_id").val();
		if (typ == 1){
			$("#denomBox").find('input[id=denomination1]').addClass("personne");
			$("#mandantBox").find('input[name=emailMandant]').removeAttr("required");
		}
		else{
			console.log("no type")
		}
        
		
	}else{
		console.log("iciiiiiiiiiiiiii")
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




// function ErrorNotify(t){
// 	// $.notify(t, "error");
// }
