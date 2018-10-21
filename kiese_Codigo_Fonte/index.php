<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<link rel="stylesheet" href="kiese_style.css">
	<link rel="stylesheet" href="navbar.css">
	<link rel="stylesheet" href="doubt.css">
	<link rel="stylesheet" href="information.css">
	<link rel="stylesheet" href="footer.css">
	<script src="kiese_script.js"></script>
	<title>Kiese Seguros</title>
</head>
<body>

<div class="container">

<!--************************************************************************************************************************************************ -->
	<?php include "navbar.php"; ?>

<!--************************************************************************************************************************************************ -->

<div class="container_one">

<div class="slideShow">

<div class="mySlides fade">
  <img src="images\img1.jpg" class="mySlidesImage">
  <div class="mySlidesImage-description">
  <label class="mySlidesImage-description-text">Evite dores de cabeça. </label>
</div>
</div>

<div class="mySlides fade">
  <img src="images\img2.jpg" class="mySlidesImage">
  <div class="mySlidesImage-description">
  <label class="mySlidesImage-description-text">Evite dores de cabeça. </label>
</div>
</div>

<div class="mySlides fade">
  <img src="images\img3.jpg" class="mySlidesImage">
  <div class="mySlidesImage-description">
  <label class="mySlidesImage-description-text">Evite dores de cabeça. </label>
</div>
</div>

<div class="mySlides fade">
  <img src="images\img4.jpg" class="mySlidesImage">
  <div class="mySlidesImage-description">
  <label class="mySlidesImage-description-text">Evite dores de cabeça. </label>
</div>
</div>
</div>

<div style="text-align:center">
  <span class="mySlidesImage-dot"></span> 
  <span class="mySlidesImage-dot"></span> 
  <span class="mySlidesImage-dot"></span> 
  <span class="mySlidesImage-dot"></span> 
</div>

</div>

<!--************************************************************************************************************************************************ -->

<div class="container_two">

	<div class="kiese_cotacao">
	<div class="kiese">
		<p id="kiese_titulo">Fazemos seguro de <br> um jeito inovador</p>
		<p id="kiese_definicao">A Kiese é uma empresa de venda de seguro <br> pela internet de bens electrónicos.
		<br> Em caso de sinistro, recolhemos o seu bem <br> em sua casa ou em seu local de trabalho. </p>
	</div>

	<div class="cotacao">
		<form class="form_cotacao" method="post" action="cotation.php">
			<p>Faça simulação <br> do seu bem </p>
			<input type="text" id="marca_modelo" name="marca_modelo" placeholder="Digite a marca ou modelo"> 
			<button id="cotacao_btn">Simulação</button>
			<div id="response"></div>
		</form>
	</div>
	</div>
</div>

<!--************************************************************************************************************************************************ -->
	
	<?php include "doubt.php"; ?>

<!--************************************************************************************************************************************************ -->

	<?php include "information.php"; ?>

</div> <!--end container-->
<!--************************************************************************************************************************************************ -->

	<?php include "footer.php"; ?>

<!--************************************************************************************************************************************************ -->
	
	<script src="kiese_script.js"></script>
	<script src="doubt.js"></script>

</body>
</html>