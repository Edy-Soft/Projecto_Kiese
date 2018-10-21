<?php

	require_once 'banco.php';

	if(isset($_POST['marca_modelo'])){

		$marca_modelo = sanitizeString($_POST['marca_modelo']);

		$resulta = queryMysql("SELECT marca_modelos, CONCAT(FORMAT(valor_seguro, 2), ' Kz') 
		 FROM bens WHERE marca_modelos = '$marca_modelo' GROUP BY marca_modelos"); 

		$rows = $resulta->num_rows;
  
  		for ($j = 0 ; $j < $rows ; ++$j)
  		{
    		$resulta->data_seek($j);
   			$row = $resulta->fetch_array(MYSQLI_NUM);

   	echo <<<_END

   		<fieldset class="cotation-fieldset">
        <br><p class="cotation-tittle-p">Resumo do Seguro</p>
      <span class="cotation-description-span">$row[0]</span><br><br>
          
          <div class="cotationPrice-div">
          <br><span class="cotationPrice-price-span">$row[1]</span> 
          <br><span class="cotationPrice-time-span">por ano</span>
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

_END;

 		}
	}
?>
       