<?php
$conexao = mysqli_connect('localhost','root','','controle_bd');
mysqli_set_charset($conexao, "utf8");
session_start();
//CLEAR

function clear($input){
  global $conexao;

  $var = mysqli_escape_string($conexao, $input);
  $var = htmlspecialchars($var);
  return $var;
}

if(isset($_POST['cadProfe'])){

   /* $img = $_FILES["fotoProf"];
    move_uploaded_file($img["tmp_name"], "../img/prof/".$img['name']); 
    $picNova = $img['name']; */

    $imgFeita = $_POST["foto_prof"];
   // echo "Cadastro com Sucesso " .$imgFeita;
    move_uploaded_file($imgFeita["tmp_name"], "../img/prof/".$imgFeita["name"]);
    $novoNome = $imgFeita["name"]; 
    echo "Cadastro com Sucesso " . $novoNome;

/*
   $nomeProf = $_POST['nomeProf'];
   $num_BIprof = $_POST['num_BIProfe'];
   $telefoneProfe = $_POST['telefoneProfe'];
   $emailProf = $_POST['emailProf'];
   $senhaProf = $_POST['senhaProf'];
 
   $moradaprof = $_POST['moradaprof'];
   $sexoProf = $_POST['sexoProf'];


  $sql = "INSERT INTO tb_professor (nome_prof, email, telefone, senha, foto_prof, num_BI, morada, sexo)
  VALUES ( '$nomeProf', '$emailProf', '$telefoneProfe', '$senhaProf', '$novoNome', '$num_BIprof', '$moradaprof', '$sexoProf')";
*/
/*
    if(mysqli_query($conexao, $sql)){
      //	$_SESSION['mensagem'] = "Cadastrado com sucesso";
    //  header('Location: servico.php?sucesso');
     	echo "Cadastro com Sucesso" .$img;
    }
   
    else{
      //	$_SESSION['mensagem'] = "Erro de cadastro";
     // header('Location: servico.php?Error');
      		echo "erro de cadastro" .$img;
    }
    */
  }