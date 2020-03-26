<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="https://cozmo.github.io/jsQR/jsQR.js">

	</script>
</head>
<body>

<div class="visible-print text-center">
	<h1>Laravel 5.7 - QR Code Generator Example</h1>

    {!! QrCode::size(250)->generate('1010'); !!}

    <p>example by ItSolutionStuf.com.</p>

</div>

</body>
</html>
