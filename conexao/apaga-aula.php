<?php
	session_start();
	include_once "pdo_conexao.php";
	include_once "sqli_conexao.php";

	if (isset($_GET['apagar'])) {
		// code...
		$id = mysqli_escape_string($conexao, $_GET['apagar']);

		//echo $id;
		$delete = "DELETE FROM tb_aula WHERE id_aula = '$id'";

		if (mysqli_query($conexao, $delete)) {
			// code...
			echo "ELiminado";
		}else{
			echo "Falha ao apagar";
		}


	}

	if (isset($_GET['id_aula'])) {
    $id_aula = mysqli_escape_string($conexao, $_GET['id_aula']);
  /*  $sql = "SELECT * 
            FROM tb_aula 
            JOIN classes ON tb_aula.id_classe = classes.id_classe 
            WHERE tb_aula.id_aula = '$id_aula'"; */

     $sql = "SELECT * FROM tb_aula JOIN classes ON tb_aula.id_classe = classes.id_classe WHERE id_aula = '$id_aula' GROUP BY id_aula";
                    
    $result = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($result) > 0) {
        $dados = mysqli_fetch_assoc($result);
      //  header('Content-Type: application/json');
        echo json_encode($dados);
       
    } else {
        echo json_encode([]);
    }
    exit();
}


?>