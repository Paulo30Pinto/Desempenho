<?php
include_once "pdo_conexao.php";
include_once "sqli_conexao.php";

  // Verifique se o formulário foi enviado
//if ($_SERVER['REQUEST_METHOD'] === 'POST')
if (isset($_POST['salvar-presenca'])) {
  // Inicie uma transação
  $pdo->beginTransaction();
  
  try {
      // Número de alunos (ajuste conforme necessário)
      $num_alunos = 10; // Suponha que existam 10 alunos, ajuste conforme necessário
      
      for ($i = 1; $i <= $num_alunos; $i++) {
          // Verifique se a avaliação foi definida
          if (isset($_POST["avaliacao$i"])) {
              $avaliacao = $_POST["avaliacao$i"];
              $presenca = isset($_POST["presenca$i"]) ? 0.125 : 0;
           //  $presenca = $_POST["presenca$i"];
              $aluno_id = $_POST["id-aluno$i"];
              $discnone = $_POST["discnone"];
              $id_proffessor = $_POST['id_proffessor'];
              $n_presenca = isset($_POST["presenca$i"]) ? 1 : 0;

           
              
              // Prepare a consulta SQL para inserir os dados
            $stmt = $pdo->prepare("INSERT INTO tb_presenca (presenca, ponto_avalia, ponto_presenca, id_disciplina, id_professor, id_aluno) VALUES (:n_presenca, :avaliacao, :presenca, :discnone, :id_proffessor, :aluno_id )");
              $stmt->bindParam(':avaliacao', $avaliacao);
              $stmt->bindParam(':presenca', $presenca); 
              $stmt->bindParam(':n_presenca', $n_presenca); 
              $stmt->bindParam(':discnone', $discnone); 
              $stmt->bindParam(':id_proffessor', $id_proffessor); 
              $stmt->bindParam(':aluno_id', $aluno_id); 
              
              // Execute a consulta
              $stmt->execute();
              
            //  echo $n_presenca;
               ?> <br> <?php ;
              
          }
      }
      
      // Confirme a transação
      $pdo->commit();
      
      // Redirecione ou exiba uma mensagem de sucesso
     // echo "Dados salvos com sucesso!";
     // header('Location: ../turma.php?sucesso');
  /*    echo "<script>alert('Dados salvos com sucesso!')
           window.location = '../turma.php?sucesso'</script>"; 
           */
      
  } catch (Exception $e) {
      // Desfaça a transação em caso de erro
      $pdo->rollBack();
      echo "Falha ao salvar os dados: " . $e->getMessage();
  }
}

//Conexão aula cadastro
if (isset($_POST['cadProfe'])) {

  $fotoProf = $_FILES["fotoProf"];

  move_uploaded_file($fotoProf["tmp_name"], "../../img/professores/".$fotoProf["name"]);
  $novoNome = $fotoProf["name"];

  $nomeProf = $_POST['nomeProf'];
  $emailProf = $_POST['emailProf'];
  $senhaProf = $_POST['senhaProf'];

 
 $sql = "INSERT INTO professores (nome, email, senha, foto_prof) VALUES ('$nomeProf', '$emailProf', '$senhaProf', '$novoNome')";


    if(mysqli_query($conexao, $sql)){
      //	$_SESSION['mensagem'] = "Cadastrado com sucesso";
    //  header('Location: servico.php?sucesso');
    /* 	  echo "<script>alert('Cadastrado com sucesso')
              window.location = '../aulasgravadas.php?sucesso'
        </script>"; */
        echo "certo";
    }
   
    else{
      //	$_SESSION['mensagem'] = "Erro de cadastro";
     // header('Location: servico.php?Error');
      /*	  echo "<script>alert('Erro ao cadastrar')
          window.location = '../aulasgravadas.php?erro'
              </script>"; */
              echo "Erro;";
    }


}

//Conexão aula Editando
if (isset($_POST['EditaAula'])) {
    $idEdita= $_POST['idEdita'];
  $TemaAula = $_POST['TemaAula'];
  $SubTemaAula = $_POST['SubTemaAula'];
  $MotivaAula = $_POST['MotivaAula'];
  $MateraAula = $_POST['MateraAula'];
  $objectGeAula = $_POST['objectGeAula'];
  $tarefaaula = $_POST['tarefaaula'];
  $objectEspAula = $_POST['objectEspAula'];
  $dataAula = $_POST['dataAula'];
  $turnoAuluno = $_POST['turnoAuluno'];
  $turmadapAula = $_POST['turmadapAula'];
  $discnone = $_POST['discnone'];
  $classenome = $_POST['classenome'];
  $id_professor= $_POST['id_professor'];
  
 // echo $dataAula;
 
 $sql = "UPDATE tb_aula SET tema_aula = '$TemaAula', subtema_aula = '$SubTemaAula', motivacao = '$MotivaAula', materia = '$MateraAula', id_professor = $id_professor, objetivo_geral = '$objectGeAula', tarefa = '$tarefaaula', objetivo_especifico = '$objectEspAula', data_aula = '$dataAula', turno = '$turnoAuluno', id_classe = $classenome, id_disciplina = $discnone WHERE id_aula = $idEdita";


    if(mysqli_query($conexao, $sql)){
      //  $_SESSION['mensagem'] = "Cadastrado com sucesso";
    //  header('Location: servico.php?sucesso');
      /*  echo "<script>alert('Cadastrado com sucesso')
              window.location = '../aulasgravadas.php?sucesso'
        </script>"; */
       // echo "certo";
    }
   
    else{
      //  $_SESSION['mensagem'] = "Erro de cadastro";
     // header('Location: servico.php?Error');
        /*  echo "<script>alert('Erro ao cadastrar')
          window.location = '../aulasgravadas.php?erro'
              </script>"; 
            // echo "Erro;";
            */
    }


}


  

?>