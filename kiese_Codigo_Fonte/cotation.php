<?php

	echo "<!DOCTYPE html>\n<html><head>";

	require_once 'banco.php';

	include 'navbar.php';

	echo "<link rel='stylesheet' href='navbar.css'/>
		 <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css'>
		 <link rel='stylesheet' href='cotation.css'/>
		 <link rel='stylesheet' href='doubt.css'/>
     <link rel='stylesheet' href='information.css'/>
     <link rel='stylesheet' href='footer.css'/>
		 </head><body>";

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

   	<div class="container">

   	  <div class="container_one">

   		<div class="cotation">
   		<form class="cotation-inform" action="register.php" method="post">
   			<br><p class="cotation-inform-tittle">Seguro de bens electrónico para:</p>
      <input type="hidden" name="marca_modelo" value="$row[0]">
 			<span class="cotation-inform-description">$row[0]</span><br><br> 
      <div class="cotationPrice">
    			<br><span class="cotationPrice-price">$row[1]</span> 
    			<br><span class="cotationPrice-time">por ano</span>
    	</div>
    		<br><button type="submit" class="cotation-inform-protecte">
    			    <i class="fa fa-lock"></i>
            	<span>PROTEJA AGORA O SEU BEM</span>
            </button><br><br>

            <p class="cover-kiese">Coberturas do Seguro Kiese</p><br>
            <ul class="list">
            	<li class="list-cover">
            		<i class="fa fa-user-secret""></i>
            		<span>Roubo</span>
            	</li>
            	<li class="list-cover">
            		<i class="fa fa-user-circle-o"></i>
            		<span>Furto</span>
            	</li>
            	<li class="list-cover">
            		<i class="fa fa-cog"></i>
            		<span>Quebra</span>
            	</li>
            	<li class="list-cover"">
            		<i class="fa fa-tint"></i>
            		<span>Líquido</span>
            	</li>
            </ul>
    	</form>
    	</div>

    	<div class="imageCotation">
    		<img src="images/image.jpg" class="image">
    	</div>
    	<div class="clear"></div>
    	
    </div>
_END;
    
        include  "doubt.php"; 
        include "information.php";

echo <<<_END
 </div>  
_END;

        include "footer.php";

 		}
	}
?>
        <script src="doubt.js"></script>
	</body>
</html>