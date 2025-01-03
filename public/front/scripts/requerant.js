$(document).ready(function(){

	function confirmSending(){
		Swal.fire({
		  title: 'Confirmation',
		  text: "Vous êtes sur le point de transmettre une saisine a la CAIDP, Confirmer ? ",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Oui, je confirme',
		  cancelButtonText: 'Non'
		}).then((result) => {
		  if (result.value) {
		    sendForm();
		  }
		})
	}

	function SuccessNotify(t){
		$.notify(t, "success");
	}

	function ErrorNotify(t){
		$.notify(t, "error");
	}

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

	
	function dd(x){
		console.log(x);
	}
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


	$(".btndetailsList").click(function(data){
		var parent = $(this).parent(),
			id = parent.attr("data-id"),
			notif = parent.attr("data-notif"),
			markLu= true,
			display = "yes";
		$.get('?', {id:id, markLu : markLu, display : display, notif : notif}, function(data){
			showdetails(data);
		});
		return false;
	});

	$(".markAsRead").click(function(data){
		var parent = $(this).parent().parent(),
			id = parent.attr("data-id");
			markLu= true;
			display = "no";
		$.get('?', {id:id, markLu : markLu, display : display}, function(data){
			SuccessNotify("Notification marquée comme lu");
		});
		return false;
	});

	$("#closeDetail").click(function(){
		closeDetail();
	});

	function showdetails(data){
		$("#listingNotifs").removeClass('col-lg-12').addClass('col-lg-4');
		$("#listOneNotifdetails").show();
		$("#listOneNotifdetails .content").empty().html(data).show();
		$('html, body').animate({
            scrollTop: $("#listingNotifsx").offset().top
        }, 500);

	}

	function closeDetail(){
		$("#listingNotifs").removeClass('col-lg-4').addClass('col-lg-12');
		$("#listOneNotifdetails").hide();
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

	$("#sendCAIDP").click(function(){
		confirmSending();
		return false;
	});

	function sendForm(){
		$("#formSaisine").submit();
	}


	$(document).on('click', ".imprimNotif", function(){
			var parent = $(this),
			id = parent.attr("data-id"),
			notif = parent.attr("data-notif");
			$.get('telechargerNotification', {id:id , notif : notif}, function(){

			});
		return false;
	});


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
		// $("#denomination").val("");
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
		// $("#denomination").val("");
		$("#titreBox").val("");
		$("#qualite").val("");
		$("#denomination").removeAttr("required");
		$("#qualite").attr("required", "required");
		// ==================== mandantBox ==========
		$("#mandantBox").addClass('hide');
		$("#mandantBox").find('input').removeAttr("required");
		// ===============================================
	}
});




});