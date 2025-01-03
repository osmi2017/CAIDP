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

$(document).on('click', '.close', function(){
	$(this).parent().slideUp();
});

$("input[name=password]").keydown(function(e){
	if(e.keyCode==32){
		return false;
	}
});

$(".contactInput").inputmask({"mask": "99 99 99 99 99"}); 
// $(document).on('keyup change', '.contactInput', function(){
// 	$(this).each(function(){
// 		dd($(this).val().trim().length);
// 		if($(this).val().trim().length<8){
// 			addAttribError($(this));
// 		}
// 	})
// })

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

function dd(data){
	console.log(data);
}

$(document).on('keyup change', 'input, textarea, select', function(){
	$(this).each(function(){
		$(this).parent().find("span.invalid-feedback").slideUp();
		suppAttribError($(this));
		var parent = $(document).find($(this)).parent().parent().parent(),
			x = formRequired(parent),
			fn = 1;
		if($(this).attr("type")=="email"){
			if( !isEmail($(this).val())){
		  		addAttribError($(this));
		  		var fn = 0;
		  	}else{
		  		suppAttribError($(this));
		  		var fn = 1;
		  	}
		}
		console.log("fn"+fn);
		console.log("x"+x);
		if(x==0 && fn==1){
			console.log("1");
			$(parent.find("a.send").removeClass("disabled"));
		}else{
			console.log("2");
			$(parent.find("a.send").addClass("disabled"));
		}
	})
})
$("form select").change(function(){
	$(this).each(function(){
		suppAttribError($(this));
	})
});


$(".suivant").click(function(){
	var parent = $(this).parent().parent().parent(),
		idParent = parent.attr('id');
		rel 	= $(this).attr('rel'); 
		$("#step-"+rel).removeClass('hide');
		parent.addClass('hide');
});
$(".precedent").click(function(){
	var parent 	= $(this).parent().parent().parent(),
		idParent= parent.attr('id'),
		rel 	= $(this).attr('rel'); 
		$("#step-"+rel).removeClass('hide');
		parent.addClass('hide');
});

	

function suppAttribError(attrib){
	if($(attrib).parent().parent().hasClass("has-error")){
		$(attrib).parent().find("span").slideUp();
		$(attrib).parent().parent().removeClass("has-error");
	}
}
function addAttribError(attrib){
	$(attrib).parent().parent().addClass("has-error")
		$(attrib).parent().find("span").slideDown();
		$(attrib).parent().parent().addClass("has-error");
	
}

function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}

var c = formRequired($("div#step-1"));
var v = emailValide($("div#step-1"));
if(c==0 && v==0 ){
	$("div#step-1").find('a.disabled').removeClass("disabled");
}
// =============================
var c = formRequired($("div#step-2"));
var v = emailValide($("div#step-2"));
if(c==0 && v==0 ){
	$("div#step-2").find('a.disabled').removeClass("disabled");
}
// =============================

// =============================

var c = formRequired($("div#step-3"));
var v = emailValide($("div#step-3"));
if(c==0 && v==0 ){
	$("div#step-3").find('a.disabled').removeClass("disabled");
}
// =============================


function formRequired(el){
	var i = 0;
	el.find("input[required], select[required], textarea[required]").each(function(){
		if($(this).val()==""){
			i++;
		}
	});
	return i;
}

function emailValide(el){
	var i = 0;	
	el.find("input[type=email], .fieldJs").each(function(){
		if(!isEmail($(this).val())){
				i++;	
		}
	});
	return i;
}



$("#qualite").change(function(){
	var x = $(this).parent().parent();
	if($(this).val()=="autre"){
			if(x.find('div').hasClass('autoFiledQualite')){
				$(".autoFiledQualite").remove();
			};

			findQualiterespo($(this).parent());
	}else{
		if(x.find('div').hasClass('autoFiledQualite')){
				$(".autoFiledQualite").remove();
		};
	}
});


// $("input[name=ri]").click(function(){
// 	if($(this).prop('checked')==true){
// 		$("input[name=rh]").prop('checked', false);
// 	}
// });
// $("input[name=rh]").click(function(){
// 	if($(this).prop('checked')==true){
// 		$("input[name=ri]").prop('checked', false);
// 	}
// });


function findQualiterespo(f){
	$.get('../../find-qualite-respo', function(data){
		f.after(data);
		
	});
}

$(document).on('click', ".emailPro",function(){
	var parent = $("#emailBoxPro"),
			 i = parent.find("input").length,
			 n = parseInt(i)+2;
			 checkInputLength(parent);
		input = '<div class="form-group"><div class="input-group"><input type="text" name="email[]" required class="form-control fieldJsEmail"  placeholder="Email de l\'organisme '+n+'" ><div class="input-group-addon " title="Ajouter un nouveau champ"><a href="#" class="remove"><i class="fa fa-times"></i></a></div></div></div>';
		parent.append(input);
	return false;
});

$(document).on('click', ".contactPro",function(){
	var parent = $("#contactBoxPro"),
			 i = parent.find("input").length,
			 n = parseInt(i)+2;
			 checkInputLength(parent);
		input = '<div class="form-group"><div class="input-group"><input type="text" name="contact[]" class="form-control fieldJs contactInput"  placeholder="Contact  de l\'organisme '+n+'" ><div class="input-group-addon " title="Ajouter un nouveau champ"><a href="#" class="remove"><i class="fa fa-times"></i></a></div></div></div>';
		parent.append(input);
	$(".contactInput").inputmask({"mask": "99 99 99 99 99"}); 
	return false;
});
// ======================================================================================
$(document).on('click', ".emailRespo",function(){
	var parent = $("#emailBoxRespo"),
			 i = parent.find("input").length,
			 n = parseInt(i)+2;
			 checkInputLength(parent);
		input = '<div class="form-group"><div class="input-group"><input type="text" name="emailPerso[]" required class="form-control fieldJsEmail"  placeholder="Email personnel '+n+'" ><div class="input-group-addon " title="Ajouter un nouveau champ"><a href="#" class="remove"><i class="fa fa-times"></i></a></div></div></div>';
		parent.append(input);
	return false;
});

$(document).on('click', ".contactRespo",function(){
	var parent = $("#contactBoxRespo"),
			 i = parent.find("input").length,
			 n = parseInt(i)+2;
			 checkInputLength(parent);
		input = '<div class="form-group"><div class="input-group"><input type="text" name="contactRespo[]" class="form-control fieldJs contactInput"  placeholder="Contact personnel '+n+'" ><div class="input-group-addon " title="Ajouter un nouveau champ"><a href="#" class="remove"><i class="fa fa-times"></i></a></div></div></div>';
		parent.append(input);
	$(".contactInput").inputmask({"mask": "99 99 99 99 99"}); 
	return false;
});

function checkInputLength(f){
	libelle = f.attr('id');
	if(libelle=="emailBoxRespo" || libelle == "emailBoxPro" ){
		libelle = 'Email ';
	}else if(libelle=="contactBoxPro" || libelle=="contactBoxRespo"){
		libelle = 'Contact ';
	}
	var i = f.find("input").length;
	for(var y=0; y<=i; y++){
		var c = parseInt(y)+2;
		f.find("input").eq(y).attr("placeholder", libelle+ c);
	}
}

$(document).on('click', '.remove', function(){
	$(this).each(function(){
		var parent = $(this).parent().parent().parent(),
			bigparent = parent.parent();
			parent.remove();
		var i = bigparent.find("input").length,
			n = parseInt(i)+2;
			checkInputLength(bigparent);
		return false;
	})
});

$(".save").click(function(){
	hideError();
	disableBtn();
	crf();
	var f = $("form"),
		d = new FormData(f[0]);
		$.ajax({
	        url: '../../organisme-save',
	        type: 'POST',
	        data: d,
	        success: function (data) {
	        	ableBtn();
	        	$(document).find('div.has-error').removeClass('has-error');
	            if(typeof data =='string'){
					var m = JSON.parse(data);
					if(m.error==true){
					var section = m.section,
						champ   = m.champ,
						attrib 	= $("input[name='"+champ+"'], select[name='"+champ+"']");
						if(champ=="contact[]"){
							var parent = attrib.parent().parent().parent().parent(),
									i  = m.nbre;
							attrib.eq(i).parent().parent().addClass('has-error');
							attrib.eq(i).focus();
						}else if(champ=="contactRespo[]"){
							var parent = attrib.parent().parent().parent().parent(),
									i  = m.nbre;
							attrib.eq(i).parent().parent().addClass('has-error');
							attrib.eq(i).focus();
						}else if(champ=='email[]'){
							var parent= attrib.parent().parent().parent().parent(),
									i = m.nbre;
							attrib.eq(i).parent().parent().addClass('has-error');
							attrib.eq(i).focus();
						}else{
							var parent = attrib.parent().parent().parent();
							attrib.parent().addClass('has-error');
							attrib.focus();
							dd(champ);
						}
							var id = parent.attr('id');
							if(section!=3){
								if(id=="step-1"){
									$("#step-1").removeClass('hide');
									$("#step-3").addClass('hide');
								}else if(id=="step-2"){
									$("#step-2").removeClass('hide');
									$("#step-3").addClass('hide');
								}
							}
							
						
					displayError(m.message);	
					}else{
						// $(".mainContent").empty().append("<div class='text-center alert alert-success'><h1>"+m.message+"</h1></div>");
						successMessagePop(m.message);
					}
				}
				else if(typeof  data == 'object'){
					$.each(data, function(key, value){
      					displayError(value);
      				});
      			}
	        },
	        cache: false,
	        contentType: false,
	        processData: false
	    });
	return false;
});

function disableBtn(){
	$("a.save span").empty().html("<i class='fa fa-cog fa-spin'></i>");
	$("a.save").attr("disabled", "");
}

function ableBtn(){
	$("a.save span").empty();
	$("a.save").removeAttr("disabled");
}
function displayError(text, pos=null){
	if(pos==null){
		pos = ".messageError";
	}
	$(pos).empty().html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> "+text+"</div>");
}
function hideError(text, pos=null){
	if(pos==null){
		pos = ".messageError";
	}
	$(pos).empty();
}



$(document).on('keyup change ', '.fieldJsEmail', function(){
	$(this).each(function(){
		var parent = $(this).parent().parent().parent().parent();
		var x = $(this).val();
		if(x=="" || isEmail(x)===true){
			suppAttribError($(this));
			$(document).find(parent).find("a.send").removeClass("disabled");
		}else{
			addAttribError($(this));
			$(document).find(parent).find("a.send").addClass("disabled");
			// $(parent.find("a.send").addClass("disabled"));
		}
	});
})



$("#generer").click(function(){
	// $(this).addClass('disabled');
	$.get(
		'../../generer-passe', function(data){
			// $(this).removeClass('disabled');
			$("input[name=password]").empty().val(data);
			var c = formRequired($("div#step-3"));
			var v = emailValide($("div#step-3"));
			if(c==0 && v==0 ){
				$("div#step-3").find('a.disabled').removeClass("disabled");
			}
		}
	);


	return false;
});

$(document).on("blur", "input[name='emailrespo[]'], input[name='emailPerso[]']", function(){
	var emailrespo = $(this).val();
	$("#listEmail").append("<option>"+emailrespo+"</option>");
});


function successMessagePop(message){
	Swal.fire({
	  title: 'Felicitations',
	  text: message,
	  type: 'success',
	  showCancelButton: false,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Ok, me connecter'
	}).then((result) => {
	  if (result.value) {
	    window.location.href="../../login";
	  }
	})
}

$("#eyeCheck").click(function(){
	if($("input[name='password']").attr('type')=='password'){
		$("input[name='password']").attr('type', 'text');
		$(this).find('i').removeClass('fa-eye');
		$(this).find('i').addClass('fa-eye-slash');
	}else{
		$("input[name='password']").attr('type', 'password');
		$(this).find('i').removeClass('fa-eye-slash');
		$(this).find('i').addClass('fa-eye');
	}
	return false;
});


});