<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet"> 
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

	<!--[if IE]> 
	<script type="text/javascript" src="js/excanvas.js"></script> 
	<![endif]-->
	<script type="text/javascript" src="{{ asset('plugins/jquery.signature.package-1.2.0') }}/js/jquery.ui.touch-punch.min.js"></script>
	<link type="text/css" href="{{ asset('plugins/jquery.signature.package-1.2.0') }}/css/jquery.signature.css" rel="stylesheet"> 
<script type="text/javascript" src="{{ asset('plugins/jquery.signature.package-1.2.0') }}/js/jquery.signature.js"></script>
<script type="text/javascript">
	$(function() {
		$("#sign").signature();
	});
</script>
<style type="text/css">
	#sign{ width: 400px; height: 200px; border: solid 1px red;}
</style>
</head>
<body>


<div id="sign"></div>

</body>
</html>