<?php

if (isset($_POST['search'])){
	$response = "<ul><li>Nenhum registo encontrado</li></ul>";

	require_once 'banco.php';
	$q = $conn->real_escape_string($_POST['q']);

	$sql = $conn->query("SELECT marca_modelo FROM marca_modelo WHERE marca_modelo LIKE '%$q%' GROUP BY marca_modelo");

	if($sql->num_rows > 0) {

		$response = "<ul>";
		while ($data = $sql->fetch_array()) 
			$response .= "<li>".$data['marca_modelo']."</li>";

			$response .= "</ul>";
	}
	exit ($response);
}

?>