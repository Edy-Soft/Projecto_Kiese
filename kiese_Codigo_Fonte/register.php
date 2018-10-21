
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css'>
	<link rel="stylesheet" href="register.css">
	<link rel="stylesheet" href="navbar.css">
	<link rel="stylesheet" href="information.css">
	<link rel="stylesheet" href="footer.css">
	<title>Registo de Cliente</title>
</head>
<body>
	<?php require_once "banco.php"; ?>
	<?php include "navbar.php"; ?>

	<div class="container-one-div">

	<div class="register-div">
	<form class="register-form" action="#">
		<!-- progressbar -->
		<ul class="register-progressbar-ul">
			<li class="register-progressbar-li active">Dados Pessoais</li>
			<li class="register-progressbar-li">Endereço</li>
			<li class="register-progressbar-li">Dados do Bem</li>
			<li class="register-progressbar-li">Pagamento</li>
		</ul>
		<!-- fieldsets -->
		<fieldset class="register-fieldset">
			<div class="register-name-div register-align-div">
				<label class="register-label">Nome</label>
				<input class="register-input" type="text" name="name"/>
				<span class="register-error">Campo obrigatório</span>
			</div>
			<div class="register-bi-div register-align-div">
				<label class="register-label">Nº de BI</label>
				<input class="register-input" type="text" name="bi" />
				<span class="register-error">Campo obrigatório</span>
			</div>
			
			<div class="register-phone-div register-align-div">
				<label class="register-label">Telefone</label>
				<input class="register-input" type="text" name="phone" pattern="0-9" />
				<span class="register-error">Campo obrigatório</span>
			</div>
			<div class="register-birth-div register-align-div">
				<label class="register-label">Data de Nascimento</label>
				<input class="register-input" type="date" name="birth"/>
				<span class="register-error">Campo obrigatório</span>
			</div>
			<div class="register-email-div register-align-div">
				<label class="register-label">E-mail</label>
				<input class="register-input" type="text" name="email"/>
				<span class="register-error">Campo obrigatório</span>
			</div>
			<input type="button" name="next" class="next-button action-button" value="Continuar" />
		</fieldset>
		
		<fieldset class="register-fieldset">
			<div class="register-provncia-div register-align-div">
				<label class="register-label">Província</label>
				<?php
					require_once "banco.php";
					$result = $conn->query("SELECT * FROM provincia");
					$rows = $result->num_rows();
				?>
				<select class="register-select" id="" size="1" name="provinvia">
        			<option value="">Selecione a sua Província</option>
        			<?php
        				if($rows > 0){
        					while ($data = $rows->fetch_array()) { 
        						echo '<option value="'.$data['id_provincia1'].'">'.$data['nome'].'</option>';
        					}
        				}else {
        					echo '<option value="">Província não disponivel</option>';
        				}
        			?>
    			</select>
				<span class="register-error">Campo obrigatório</span>
			</div>
			<div class="register-municipio-div register-align-div">
				<label class="register-label">Município</label>
				<select class="register-select" id="stateSel" size="1" name="municipio">
        			<option value="" selected="selected">Seleccione o seu Município</option>
    			</select>
				<span class="register-error">Campo obrigatório</span>
			</div>
			<div class="register-referencia-div register-align-div">
				<label class="register-label">Ponto de Referência</label>
				<input class="register-input" type="text" name="referencia"/>
			</div>
			<div class="register-bairro-div register-align-div">
				<label class="register-label">Bairro</label>
				<input class="register-input" type="text" name="bairro"/>
				<span class="register-error">Campo obrigatório</span>
			</div>
			<div class="register-rua-div register-align-div">
				<label class="register-label">Rua</label>
				<input class="register-input" type="text" name="rua"/>
				<span class="register-error">Campo obrigatório</span>
			</div>
			<div class="register-ncasa-div register-align-div">
				<label class="register-label">Nº da Casa</label>
				<input class="register-input" type="text" name="ncasa"/>
				<span class="register-error">Campo obrigatório</span>
			</div>
			<input type="button" name="previous" class="previous-button action-button" value="Anterior" />
			<input type="button" name="next" class="next-button action-button" value="Continuar" />
		</fieldset>

		<fieldset class="register-fieldset">
			<div class="register-marcamodelo-div register-align-div">
				<label class="register-label">Marca / Modelo</label>
				<input class="register-input" type="text" name="marca_modelo"/>
				<span class="register-error">Campo obrigatório</span>
			</div>
			<div class="register-imei-div register-align-div">
				<label class="register-label">IMEI</label>
				<input class="register-input" type="text" name="imei"/>
				<span class="register-error">Campo obrigatório</span>
			</div>
			<div class="register-preco-div register-align-div">
				<label class="register-label">Preço</label>
				<input class="register-input" type="text" name="preco"/>
				<span class="register-error">Campo obrigatório</span>
			</div>
			<div class="register-factura-div register-align-div">
				<label class="register-label">Carregar Factura</label>
				<input class="register-input" type="text" name="factura"/>
				<span class="register-error">Campo obrigatório</span>
			</div>
			<div class="register-imagem-div register-align-div">
				<label class="register-label">Carregar Imagens</label>
				<input class="register-input" type="text" name="imagem"/>
				<span class="register-error">Campo obrigatório</span>
			</div>
			<input type="button" name="previous" class="previous-button action-button" value="Anterior" />
			<input type="button" name="next" class="next-button action-button" value="Continuar" />
		</fieldset>

		<fieldset class="register-fieldset">

			<span class="choose-payment-span">Escolha a opção de pagamento</span>

			<button class="button-submit" name="reference">
				<i class="icon-button fa fa-money"></i> 
				PAGAMENTO POR REFERÊNCIA MULTICAIXA
				<i class="fa fa-arrow-right"></i>
			</button> 
			<button class="button-submit" name="transfer">
				<i class="icon-button fa fa-university"></i>
				PAGAMENTO POR TRANFERÊNCIA BANCÁRIA
				<i class="fa fa-arrow-right"></i>
			</button> 
			<button class="button-submit" name="deposit">
				<i class="icon-button fa fa-usd"></i>
				PAGAMENTO POR DEPÓSITO BANCÁRIO
				<i class="fa fa-arrow-right"></i>
			</button><br> 

			<input type="button" name="previous" class="previous-button action-button-alter" value="Alterar Dados" />
			
		</fieldset>
	</form>
	</div>

	<?php
		require_once "banco.php";

		if(isset($_POST['marca_modelo'])){

			$marca_modelo = sanitizeString($_POST['marca_modelo']);

			$resulta = queryMysql("SELECT marca_modelo, CONCAT(FORMAT(valor_seguro, 2), ' Kz') 
			 FROM marca_modelo WHERE marca_modelo = '$marca_modelo' GROUP BY marca_modelo"); 

			$rows = $resulta->num_rows;
  
  			for ($j = 0 ; $j < $rows ; ++$j)
  			{
    			$resulta->data_seek($j);
   				$row = $resulta->fetch_array(MYSQLI_NUM); 

	echo <<<_END

	<div class="cotation-div">
		<fieldset class="cotation-fieldset">
   			<br><p class="cotation-tittle-p">Seguro Kiese para:</p>
 			<span class="cotation-description-span">$row[0]</span><br><br>
      		
      		<div class="cotation-price-div">
    			<br><span class="cotation-price-span">$row[1]</span> 
    			<br><span class="cotation-time-span">por ano</span>
    			<br><br><span class="cotation-time-span">Vivência do Seguro: 12 meses</span>
    		</div>
    		
            <p class="cover-kiese-p">Coberturas do Seguro Kiese</p><br>
            <ul class="cover-kiese-ul">
            	<li class="cover-kiese-li">
            		<i class="cover-kiese-icon fa fa-user-secret""></i>
            		<span>Roubo</span>
            	</li>
            	<li class="cover-kiese-li">
            		<i class="cover-kiese-icon fa fa-user-circle-o"></i>
            		<span>Furto</span>
            	</li>
            	<li class="cover-kiese-li">
            		<i class="cover-kiese-icon fa fa-cog"></i>
            		<span>Quebra</span>
            	</li>
            	<li class="cover-kiese-li">
            		<i class="cover-kiese-icon fa fa-tint"></i>
            		<span>Líquido</span>
            	</li>
            </ul>
    	</fieldset>
	</div>
_END;
			} //end for
		} // end if
?>

	<div class="clear"></div>

</div> <!-- end container one -->

<?php include "information.php"; ?>

<?php include "footer.php"; ?>

		<!-- jQuery --> 
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<!-- jQuery easing plugin --> 
		<script src="jquery.easing.min.js" type="text/javascript"></script> 
		<!-- Progressbar code -->
		<script src="register.js"></script>
		<!-- Province and cities code -->
		<script src="province_cities.js"></script>

	</body>
</html>