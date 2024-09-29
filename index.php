<?php
  session_start();
  //require_once "conexao/pdo_conexao.php";
  require_once "conexao/sqli_conexao.php";


  if (isset($_POST['entrarProf'])) {
    $erros = array();
    $email = $_POST['loginemail'];
    $senha = $_POST['loginsenha'];

    $traz_dados = "SELECT nome FROM professores WHERE nome LIKE '$email'";
    $resultado = mysqli_query($conexao, $traz_dados);
    // Verificar as credenciais do usuário em seu sistema de autenticação
    if (mysqli_num_rows($resultado) > 0) {
        // Se as credenciais forem válidas, inicie uma sessão e redirecione para a página de perfil
        $traz_dados1 = "SELECT * FROM professores WHERE nome LIKE '$email' AND senha  LIKE '$senha'";
        $resultado1 = mysqli_query($conexao, $traz_dados1);
        if(mysqli_num_rows($resultado1) == 1){
            $dados = mysqli_fetch_array($resultado1);
            $_SESSION['logado'] = true;
            $_SESSION['id_professor'] = $dados['id_professor'];

            header('Location: app.php?sucesso');
        }else{
          //
            $erros[] = "<li>Usuario e senha não conferem</li>";
            header('Location: index.php?Invalido');
        }
        //$dados = mysqli_fetch_array($resultado);


        exit();
    } else {
        // Se as credenciais forem inválidas, exiba uma mensagem de erro
      //  echo "Usuário ou senha inválidos.";

        $erros[] = "<li> Usuário inexistente </li>";
        header('Location: index.php?Sem Registro');
    }
  }

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Signin Template · Bootstrap v5.1</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">



    <!-- Bootstrap core CSS -->
<link href="biblioteca/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

    </style>


    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
    <link rel="stylesheet" href="css/form-validation.css">
  </head>
  <body class="text-center" style="">
     <!-- LOGIN PROFESSSOR -->

    <!-- <main class="form-signin" id="form-signin">
  <form>
    <img class="mb-4" src="../img/a7.png" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">faça login</h1>

     <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email ou número</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">insira a senha</label>
    </div>

    <div class="checkbox mb-3">
      <label hidden>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <a class="w-100 btn btn-lg btn-primary" href="app.php">logar</a>
    <p class="mt-5 mb-3 text-muted"><a href="#novocadastro" id="chamaCad">cadastra-se</a></p>
  </form> -->


<main class="form-signin" id="form-signin">
  <form  action='<?php echo $_SERVER['PHP_SELF']; ?>' enctype='multipart/form-data' method='post'>
    <img class="mb-4" src="img/a7.png" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">faça login</h1>

    <div class="form-floating">
      <input type="text" class="form-control" name='loginemail' id="loginemail" placeholder="name@example.com">
      <label for="floatingInput">Email ou número</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="loginsenha" name='loginsenha' placeholder="Password">
      <label for="floatingPassword">insira a senha</label>
    </div>

    <div class="checkbox mb-3">
      <label hidden>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class='w-100 btn btn-lg btn-primary' type='submit' name='entrarProf' id='entrarProf'>ENTRAR</button>
    <a class="w-100 btn btn-lg btn-primary d-none" href="app.php">logar</a>
    <p class="mt-5 mb-3 text-muted"><a href="#novocadastro" id="chamaCad">cadastra-se</a></p>
  </form>
</main>
 <!-- CADASTRO DO PROFESSOR -->
  <main class="container d-none text-white" id="novocadastro" style="padding-top: 0em !important;">
    <a href="#" id="voltalogin" class="text-start float-start">login</a>
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="img/a22.png" alt="" width="72" height="57">
      <h2>informações gerais</h2>
      <p class="lead">faça o cadastro de acordo com a escola onde trabalha</p>
    </div>

    <div class="container">


<form action="conexao/pdo_cadastro.php" method="post" enctype="multipart/form-data" class="needs-validation"  novalidate>
  <div class="row g-3">
    <div class="col-sm-6">
      <label for="firstName" class="form-label">insira o nome completo</label>
      <input type="text" class="form-control" id="nomeProf" name="nomeProf" placeholder="nome" value="" required>
      <div class="invalid-feedback">
        não insiriu o nome do professor.
      </div>
    </div>

    <div class="col-sm-6">
      <label for="state" class="form-label">número do BI</label>
      <input type="text" class="form-control" id="num_BIProfe" name="num_BIProfe" placeholder="nome da escola">
      <div class="invalid-feedback">
        não insira o número do BI.
      </div>
    </div>


    <div class="col-sm-6">
      <label for="state" class="form-label">Morada</label>
      <input type="text" class="form-control" id="moradaprof" name="moradaprof" placeholder="nome da escola">
      <div class="invalid-feedback">
      não insira a morada.
      </div>
    </div>

    <div class="col-sm-6">
      <label for="address2" class="form-label"> nível academico </label>
      <input type="text" class="form-control" id="nivelprof" name="nivelprof" placeholder="nome da escola">
      <div class="invalid-feedback">
      não insira o nível académico.
      </div>
    </div>

    <div class="col-sm-6">
      <label for="lastName" class="form-label">Telefone</label>
      <input type="text" class="form-control" id="telefoneProfe" name="telefoneProfe" placeholder="contato" value="" required>
      <div class="invalid-feedback">
        não insiriu o contato.
      </div>
    </div>

    <div class="col-sm-6">
      <label for="email" class="form-label">email</label>
      <div class="input-group has-validation">
        <span class="input-group-text">@</span>
        <input type="email" class="form-control" id="emailProf" name="emailProf" placeholder="email" required>
      <div class="invalid-feedback">
        não insiriu o email.
        </div>
      </div>
    </div>

    <div class="col-sm-6">
      <label for="username" class="form-label">insira a senha</span></label>
      <input type="text" class="form-control" id="senhaProf" name="senhaProf" placeholder="senha"required>
      <div class="invalid-feedback">
        não insiriu a senha.
      </div>
    </div>

    <div class="col-sm-6">
      <label for="address" class="form-label">senha de confirmação</label>
      <input type="text" class="form-control" id="confSenhaProf" name="confSenhaProf" placeholder="senha confirmção" required>
      <div class="invalid-feedback">
        não confirmou a senha.
      </div>
    </div>

    <div class="col-sm-6">
      <label for="zip" class="form-label">foto de perfil<span class="text-muted">(Optional)</span></label>
      <input type="file" class="form-control" id="fotoProf"  name="fotoProf" value="" placeholder="foto" required>
      <div class="invalid-feedback">
      não meteu a foto do perfil.
      </div>
    </div>
    <div class="col-sm-6">
        <h4 class="mb-3">Sexo</h4>
      <div class="my-3 d-flex justify-content-around aling-items-center">
        <div class="form-check">
          <input id="sexoMascProf" name="sexoProf" type="radio" class="form-check-input" value="Masculino" checked required>
          <label class="form-check-label" for="credit">Masculino</label>
        </div>
        <div class="form-check">
          <input id="sexoFemProf" name="sexoProf" type="radio" class="form-check-input" value="Feminino" required>
          <label class="form-check-label" for="debit">Feminino</label>
        </div>
        <div class="form-check">
          <input id="sexoOutrocProf" name="sexoProf" type="radio" class="form-check-input" value="Outros"  required>
          <label class="form-check-label" for="paypal">Outros</label>
        </div>
      </div>
    </div>


  </div>

  <hr class="my-4">

  <button class="w-100 btn btn-primary btn-lg" type="submit" name="ProfCad" id="ProfCad">cadastra-se</button>
</form>
</div>

  </main>




  </body>
  <script src="biblioteca/jquery-3.5.1.min.js"></script>
  <script src="biblioteca/bootstrap.bundle.min.js"></script>
  <script src="js/form-validation.js"></script>

  <script>
    $("#chamaCad").click(()=>{
       // alert("Ola")
       $("#form-signin").addClass("d-none")
       $("#novocadastro").removeClass("d-none")
    })
    $("#voltalogin").click(()=>{
       // alert("Ola")
       $("#form-signin").removeClass("d-none")
       $("#novocadastro").addClass("d-none")
    })
  </script>

</html>
