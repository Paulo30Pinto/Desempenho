<!DOCTYPE html>
<?php 
   
    require_once "conexao/pdo_conexao.php";
    require_once "conexao/sqli_conexao.php";

    session_start();

    if (!isset($_SESSION['logado'])) {
      # code...
      header('Location: index.php');
    }
    else{
      $idProf = $_SESSION['id_professor'];
      $sqlDados = "SELECT * FROM professores WHERE id_professor  LIKE '$idProf'";
      $resultadoProf = mysqli_query($conexao, $sqlDados);
      $meusDados = mysqli_fetch_array($resultadoProf);

      
    }
?>

<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desempenho do Aluno</title>

    
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="biblioteca/cheatsheet.css">

    <link rel="stylesheet" href="css/index.css">
  <style>
    .nota-base input{
      min-width: 35px;
      border: none,
    }
  </style>
</head>
<body class="">
  <!--CABECALHO PC-->
    <header class="p-3 bg-info text-white desktop fixed-top">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-around justify-content-lg-between">
        <a href="#" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none logo">
          <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-ui-checks-grid" viewBox="0 0 16 16">
            <path d="M2 10h3a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1zm9-9h3a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-3a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zm0 9a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-3zm0-10a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h3a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2h-3zM2 9a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h3a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H2zm7 2a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-3a2 2 0 0 1-2-2v-3zM0 2a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm5.354.854a.5.5 0 1 0-.708-.708L3 3.793l-.646-.647a.5.5 0 1 0-.708.708l1 1a.5.5 0 0 0 .708 0l2-2z"/>
          </svg>
          <span class="text-dark">DESEMPENHO </span> ALUNO
        </a>


       

        <div class="text-end">
          <button type="button" class="btn btn-outline-light me-2">Cadastra</button>
          <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
  <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
</svg>
        </div>
      </div>
    </div>
  </header>

<!--MENU PHONE-->
<div class="mobile">
  <header class="py-3 border-bottom bg-info text-white fixed-top">
    <div class="container-fluid d-grid gap-3 align-items-center" style="grid-template-columns: 1fr 2fr;">
      <div class="dropdown">
        <a href="#" class="d-flex align-items-center col-lg-4 mb-2 mb-lg-0 link-light text-decoration-none dropdown-toggle logo" id="dropdownNavLink" data-bs-toggle="dropdown" aria-expanded="false">
          <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-ui-checks-grid" viewBox="0 0 16 16">
            <path d="M2 10h3a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1zm9-9h3a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-3a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zm0 9a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-3zm0-10a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h3a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2h-3zM2 9a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h3a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H2zm7 2a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-3a2 2 0 0 1-2-2v-3zM0 2a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm5.354.854a.5.5 0 1 0-.708-.708L3 3.793l-.646-.647a.5.5 0 1 0-.708.708l1 1a.5.5 0 0 0 .708 0l2-2z"/>
          </svg>
          <span class="text-dark">DESEMPENHO </span>ALUNO
        </a>
      </div>

      <div class="d-flex align-items-center">
        <div class="w-100 me-3">

        </div>

        <div class="flex-shrink-0" style="float: right;">

          <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg>

            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-globe" viewBox="0 0 16 16">
  <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4a9.267 9.267 0 0 1 .64-1.539 6.7 6.7 0 0 1 .597-.933A7.025 7.025 0 0 0 2.255 4H4.09zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5h2.49zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5H4.847zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5H4.51zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12c.138.386.295.744.468 1.068.552 1.035 1.218 1.65 1.887 1.855V12H5.145zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11a13.652 13.652 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5H3.82zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539 6.688 6.688 0 0 1-.597.933zM8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855.173-.324.33-.682.468-1.068H8.5zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5a6.959 6.959 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5h2.49zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4a7.966 7.966 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4h2.355z"/>
</svg>

          <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
            <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
            <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
          </svg>

          <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
  <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
</svg>

          <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg>
        </div>
      </div>
    </div>
  </header>
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-info text-center degrad tel" style="width: 180px; min-height: 100%; position: fixed; z-index: 999; padding-top: 5em !important;" id="tel">
    <a href="#" class="align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <img class="bi me-2 pic" width="40" height="32" src="img/IMG_E0697.jpg"><use xlink:href="#bootstrap"/></img>
      <br>
      <span class="fs-4 d-block"><?=$meusDados['nome']?></span>
    </a>
    <hr>
    <div id="rolar">
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="app.php" class="nav-link text-white" aria-current="page">
        <i class="bi bi-book-fill"></i>
         <br> InÍcio
        </a>
      </li>
   
      <li>
        <a href="aulasgravadas.php" class="nav-link text-white">
        <i class="bi bi-book"></i>
               <br>  
              Controlar aulas
        </a>
      </li>
    
      <li>
        <a href="infomacao.php" class="nav-link text-white">
          <i class="bi bi-help"></i>
               <br> Informática
        </a>
      </li>
      
    </ul>
    </div>
    <hr>
    <div class="dropdown">
      <a href="index.php" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
      <i class="bi bi-door-open"></i>
        <strong>Sair</strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
        <li><a class="dropdown-item" href="#">Sair</a></li>
       
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#">Sair</a></li>
      </ul>
    </div>
  </div>
</div>

<div id="corpo" class="container">
  <!--MENU LATERAL-->
<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-info desktop degrad" style="width: 280px; min-height: 100vh; padding-top: 5em !important;">
    <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <img class="bi me-2 pic" width="40" height="32" src="img/IMG_E0697.jpg"><use xlink:href="#bootstrap"/></img>

      <span class="fs-4"><?=$meusDados['nome']?></span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="app.php" class="nav-link text-white" aria-current="page">
        <i class="bi bi-house "></i>
          Inicio
        </a>
      </li>
     
      <li>
        <a href="aulasgravadas.php" class="nav-link text-white">
            <i class="bi bi-book"></i>
            Controlar aulas

        </a>
      </li>
      <li>
        <a href="infomacao.php" class="nav-link text-white">
          <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-cpu me-2" viewBox="0 0 16 16">
                  <path d="M5 0a.5.5 0 0 1 .5.5V2h1V.5a.5.5 0 0 1 1 0V2h1V.5a.5.5 0 0 1 1 0V2h1V.5a.5.5 0 0 1 1 0V2A2.5 2.5 0 0 1 14 4.5h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14a2.5 2.5 0 0 1-2.5 2.5v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14A2.5 2.5 0 0 1 2 11.5H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2A2.5 2.5 0 0 1 4.5 2V.5A.5.5 0 0 1 5 0zm-.5 3A1.5 1.5 0 0 0 3 4.5v7A1.5 1.5 0 0 0 4.5 13h7a1.5 1.5 0 0 0 1.5-1.5v-7A1.5 1.5 0 0 0 11.5 3h-7zM5 6.5A1.5 1.5 0 0 1 6.5 5h3A1.5 1.5 0 0 1 11 6.5v3A1.5 1.5 0 0 1 9.5 11h-3A1.5 1.5 0 0 1 5 9.5v-3zM6.5 6a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"/>
                </svg>
                Informação
        </a>
      </li>
      
    </ul>
    <hr>
    <div class="dropdown">
      <a href="index.php" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-cart4 me-2" viewBox="0 0 16 16">
  <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
</svg>
        <strong>Sair</strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
        <li><a class="dropdown-item" href="#">Sair</a></li>

        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#">Sair</a></li>
      </ul>
    </div>
  </div>




  <!--CORPO-->

    <main class="pg-aula py-5 text-center container my-2" id="pg-aula">
    <ul class="nav nav-pills mb-3 py-5 my-2" id="pills-tab" role="tablist">
  <li class="nav-item " role="presentation">
    <button class="btn btn-info nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Lista De alunos</button>
  </li>
  <li class="nav-item d-none" role="presentation">
    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Plano de aula</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="btn btn-info nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Mini Pauta</button>
  </li>
  <li class="nav-item d-none" role="presentation">
    <button class="nav-link" id="pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#pills-disabled" type="button" role="tab" aria-controls="pills-disabled" aria-selected="false" disabled>Disabled</button>
  </li>
</ul>
<div class="tab-content " id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
  <form action="conexao/pdo_cadastro.php" method="post"  enctype='multipart/form-data' >
    <div class="row">
      <div class="col">
                      <label for="firstName" class="form-label">Disciplina</label>

                        <?php
                              $professor_id = $idProf;
                    
                           $sqldisciplinas = "SELECT disciplinas.id_disciplina, disciplinas.nome AS disciplina_nome, turmas.nome AS turma_nome, classes.nome AS classe_nome, cursos.nome AS curso_nome FROM professores JOIN professor_disciplina ON professores.id_professor = professor_disciplina.professor_id JOIN disciplinas ON professor_disciplina.disciplina_id = disciplinas.id_disciplina JOIN cursos ON disciplinas.curso_id = cursos.id_curso  JOIN turma_disciplina ON disciplinas.id_disciplina = turma_disciplina.disciplina_id JOIN turmas ON turma_disciplina.turma_id = turmas.id_turma JOIN classes ON turmas.classe_id = classes.id_classe WHERE professores.id_professor = ?";
 
                           $stmt01 = $conexao->prepare($sqldisciplinas);
                           $stmt01->bind_param("i", $professor_id);
                           $stmt01->execute();
                           $result01 = $stmt01->get_result(); 
                           
                     //     $resultado = mysqli_query($conexao, $sqldisciplinas);
                          // $result = $conexao->query($sqldisciplinas);

                        ?>

<?php
                          if ($result01->num_rows > 0) {
                            $counter = 1;
                          echo  "<select class='form-select' aria-label='Default select example' name='discnone' id='discnone'>";
                          echo  "<option selected>Escolha uma disciplina</option>";
                            while($row = $result01->fetch_assoc()) {
                              echo "<option value=". htmlspecialchars($row['id_disciplina']) .">
                                  ". htmlspecialchars($row['disciplina_nome']) ."
                              </option>";
                               
                                $counter++;
                            }
                          echo "</select>";
                        } else {
                            echo "<tr><td colspan='5'>Nenhuma disciplina encontrada</td></tr>";
                        }
                        
                          ?>

                    

                       
      </div>
      <div class="col">
      <label for="firstName" class="form-label">Data Aula</label>
                        <input type="datetime-local" class="form-control" id="firstName" placeholder="Data Aula" value="" required="">
                      
      </div>
    </div>
  <div class="bd-example">

                        
                      <table class="table table-striped">
                        <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Nome Aluno</th>
                          <th scope="col">Ponto</th>
                          <th scope="col">Presença</th>
                        </tr>
                        </thead>
                        <?php 
                          $professor_id = $idProf; // exemplo estático, substitua conforme necessário
                           // echo $professor_id;
                            
                          // SQL para buscar alunos de uma determinada turma associada ao professor
                          $sql = "SELECT alunos.id_aluno, alunos.nome AS aluno_nome
                          FROM alunos
                          JOIN aluno_turma ON alunos.id_aluno = aluno_turma.aluno_id
                          JOIN turmas ON aluno_turma.turma_id = turmas.id_turma 
                          JOIN turma_disciplina ON turmas.id_turma = turma_disciplina.turma_id
                          JOIN disciplinas ON turma_disciplina.disciplina_id = disciplinas.id_disciplina
                          JOIN professor_disciplina ON disciplinas.id_disciplina = professor_disciplina.disciplina_id
                          WHERE professor_disciplina.professor_id = ? GROUP BY aluno_turma.aluno_id";

                          $stmt = $conexao->prepare($sql);
                          $stmt->bind_param("i", $professor_id);
                          $stmt->execute();
                          $result = $stmt->get_result();

                        ?>
                        <tbody>
                        
                        
                        
                        <?php
            if ($result->num_rows > 0) {
                $counter = 1;
                while($row = $result->fetch_assoc()) {
                    echo "<input type='hidden' id='id-aluno".$counter."' name='id-aluno".$counter."' value='".htmlspecialchars($row['id_aluno'])."'>";
                    echo "<tr>";
                    echo "<th scope='row'>" . $counter . "</th>";
                    echo "<td>" . htmlspecialchars($row['aluno_nome']) . "</td>";
                    echo "<td><input type='text' class='form-control form-control-sm' id='avaliacao_$counter' name='avaliacao".$counter."' aria-describedby='avaliacao' style='max-width: 100px'></td>";
                    echo "<td><div class='mb-3 form-check'><input type='checkbox' class='form-check-input' name='presenca".$counter."' id='presenca_$counter'><label class='form-check-label' for='presenca_$counter'>Presença ".$counter." </label></div></td>";
                    echo "</tr>";
                    
                    $counter++;
                    
                }
            } else {
                echo "<tr><td colspan='4'>Nenhum aluno encontrado</td></tr>";
            }
          /*  $stmt->close();
            $conexao->close();  */
            ?>
                      
                       
                        </tbody>
                      </table>
                      <input type="hidden" name="id_proffessor" id="id_proffessor" value="<?=$professor_id?>">
                      <button type="submit" class="btn btn-outline-info " id="salvar-presenca" name='salvar-presenca' >Salvar dados</button>
                     
                    </div>
                    </form>
  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
  <div class="row py-3">
                      <div class="col-6">
                        <label for="firstName" class="form-label">Disciplina</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected="">Escolha uma disciplina</option>
                            <option value="1">Matematica</option>
                            <option value="2">Fisica</option>
                            <option value="3">Quimica</option>
                        </select>
                      </div>
                      
                      <div class="col-6">
                        <label for="firstName" class="form-label">Data Aula</label>
                        <input type="datetime-local" class="form-control" id="firstName" placeholder="Data Aula" value="" required="">
                      
                      </div>
                    </div>
                    <form action="../conexao/pdo_cadastro.php" method="post" enctype="multipart/form-data" class="needs-validation" novalidate="">
                        <div class="row g-3">
                            <div class="col-sm-6">
                              <label for="firstName" class="form-label">Tema da Aula </label>
                              <input type="text" class="form-control" id="TemaAula" name="TemaAula" placeholder="Tema da Aula" value="" required="">
                              <div class="invalid-feedback">
                                não insiriu o seu nome.
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <label for="firstName" class="form-label">Sub-tema da Aula </label>
                              <input type="text" class="form-control" id="SubTemaAula" name="SubTemaAula" placeholder="Sub-tema da aula" value="" required="">
                              <div class="invalid-feedback">
                                não insiriu o seu nome.
                              </div>
                            </div>

                            <div class="col-sm-12">
                              <label for="lastName" class="form-label">motivação</label>

                              <textarea class="form-control" id="MotivaAula" name="MotivaAula" cols="30" rows="5" style="width: 100%;" placeholder="Motivação"></textarea>
                            </div>

                            <div class="col-sm-12">
                              <label for="lastName" class="form-label">materia</label>

                              <textarea class="form-control" id="MateraAula" name="MateraAula" cols="30" rows="10" style="width: 100%;" placeholder="materia"></textarea>
                            </div>

                            <div class="col-sm-6">
                              <label for="username" class="form-label">objectivo geral</label>
                              <input type="text" class="form-control" id="objectGeAula" name="objectGeAula" placeholder="Objetivo Geral" required="">
                              <div class="invalid-feedback">
                                não insiriu a senha.
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <label for="username" class="form-label">objetivo especifico</label>
                              <input type="text" class="form-control" id="objectEspAula" name="objectEspAula" placeholder="Objetivo Especifco" required="">
                              <div class="invalid-feedback">
                                não insiriu a senha.
                              </div>
                            </div>

                            <div class="col-sm-6 d-none">
                              <label for="username" class="form-label">Turma</label>
                              <input type="text" class="form-control" id="turmadapAula" name="turmadapAula" placeholder="Turma" required="">
                              <div class="invalid-feedback">
                                não insiriu a senha.
                              </div>
                            </div>

                            <div class="col-sm-6 d-none">
                              <label for="address2" class="form-label">data da aula </label>
                              <input type="date" class="form-control" id="dataAula" name="dataAula" placeholder="Data" required="">
                            </div>

                            <div class="col-sm-6">
                                <h4 class="mb-3">Turno da aula</h4>
                              <div class="my-3 d-flex justify-content-around aling-items-center">
                                <div class="form-check">
                                  <input id="turnoManhaAuluna" name="turnoAuluno" type="radio" class="form-check-input" value="Manha" checked="" required="">
                                  <label class="form-check-label" for="credit">Manha</label>
                                </div>
                                <div class="form-check">
                                  <input id="turnoTardAuluna" name="turnoAuluno" type="radio" class="form-check-input" value="Tarde" checked="" required="">
                                  <label class="form-check-label" for="debit">Tarde</label>
                                </div>
                                <div class="form-check">
                                  <input id="turnoNoitAuluna" name="turnoAuluno" type="radio" class="form-check-input" value="Noite" checked="" required="">
                                  <label class="form-check-label" for="paypal">Noite</label>
                                </div>
                              </div>
                            </div>


                      </div>

                      <hr class="my-4">
                      
                      <button class="w-100 btn btn-info btn-lg" type="submit" name="guardAula" id="guardAula" href="index.html">Guardar</button>
                  </form>
  </div>
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
  <div class="card-body table-responsive">
                    <h5 class="card-title">Mini Pauta Aluno</h5>
                    <div class="row py-3">

                     <!--<div class="card-footer text-muted text-center" id="detroturma">
                    <a href="#detroturma" class="btn btn-azul" 
                          style="position: fixed;bottom: 50px; right: 50px;">Guardar</a>
                    </div>-->

                      <div class="card-footer text-muted text-center">
                        <a href="#detroturma" class="btn btn-azul">Guardar a Mini pauta</a>
                      </div>
                      <div class="col-6">
                        <label for="firstName" class="form-label">Disciplina</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected="">Escolha uma disciplina</option>
                            <option value="1">Matematica</option>
                            <option value="2">Fisica</option>
                            <option value="3">Quimica</option>
                        </select>
                      </div>
                      
                      <div class="col-6">
                          <button class="btn btn-info text-white">Adicionar Notas</button>
                      </div>
                    </div>
                    <!-- Small tables -->
                    <table class="table table-sm table-hover table-bordered">
                     <thead class="" style="">
                            <tr class="text-center">
                              <th rowspan="2" scope="col" style="min-width: 150px;" class="text-center py-4">Nome</th>
                              <th colspan="6" scope="col" class="primeiro">Iº Trimestre</th>
                              <th colspan="6" scope="col" class="segundo">IIº Trimestre</th>
                              <th colspan="6" scope="col" class="terceiro">IIIº Trimestre</th>
                              <th rowspan="2" scope="col" class="final">MFD</th>
                            </tr>
                            <tr class="text-center">

                              <td class="nota primeiro">MAC</td>
                              <td class="nota primeiro">NPP</td>
                              <td class="nota primeiro">NPT</td>
                              <td class="nota tab primeiro">MT</td>
                              <td class="nota primeiro">PRE</td>
                              <td class="nota primeiro">PON</td>

                              <td class="nota">MAC</td>
                              <td class="nota">NPP</td>
                              <td class="nota">NPT</td>
                              <td class="nota tab">MT</td>
                              <td class="nota">PRE</td>
                              <td class="nota">PON</td>

                              <td class="nota">MAC</td>
                              <td class="nota">NPP</td>
                              <td class="nota">NPT</td>
                              <td class="nota tab">MT</td>
                              <td class="nota">PRE</td>
                              <td class="nota">PON</td>



                          </tr>
                      </thead>
                 
                     
                      <tbody class="nota-base" >
                      <?php

$professor_id1 = $idProf; // exemplo estático, substitua conforme necessário
// echo $professor_id;
 
// SQL para buscar alunos de uma determinada turma associada ao professor
$sqlAluno = "SELECT alunos.id_aluno, alunos.nome AS aluno_nome
FROM alunos
JOIN aluno_turma ON alunos.id_aluno = aluno_turma.aluno_id
JOIN turmas ON aluno_turma.turma_id = turmas.id_turma 
JOIN turma_disciplina ON turmas.id_turma = turma_disciplina.turma_id
JOIN disciplinas ON turma_disciplina.disciplina_id = disciplinas.id_disciplina
JOIN professor_disciplina ON disciplinas.id_disciplina = professor_disciplina.disciplina_id
WHERE professor_disciplina.professor_id = ? GROUP BY aluno_turma.aluno_id";

$stmt1 = $conexao->prepare($sqlAluno);
$stmt1->bind_param("i", $professor_id1);
$stmt1->execute();
$result1 = $stmt1->get_result();

//print_r($result1);

          if ($result1->num_rows > 0) {
            $counter1 = 1;
            while($row1 = $result1->fetch_assoc()) {
                  ?>
                            <tr>
                              <td class="displina"><b><?=$counter1++;?></b> <?php echo $row1['aluno_nome']; ?> </td>
                              <td class="primeiro">
                                <input type="text" class="form-control " readOnly id="mac1" name="mac1" placeholder="0" required="" >
                              </td>
                              <td class="primeiro">
                              <input type="text" class="form-control" id="mac1" name="mac1" placeholder="0" required="" readOnly>
                              </td>
                              <td class="primeiro">
                              <input type="text" class="form-control" id="mac1" name="mac1" placeholder="0" required="" disabled>
                              </td>
                              <td class="tab primeiro">Media</td>
                              <td class="primeiro">
                              <input type="text" class="form-control" id="mac1" name="mac1" placeholder="0" required="" disabled>
                              </td>
                              <td class="primeiro">
                              <input type="text" class="form-control" id="mac1" name="mac1" placeholder="0" required="" disabled>
                              </td>
                              <td>
                              <input type="text" class="form-control" id="mac1" name="mac1" placeholder="0" required="" disabled>
                              </td>
                              <td>
                              <input type="text" class="form-control" id="mac1" name="mac1" placeholder="0" required="" disabled>
                              </td>
                              <td>
                              <input type="text" class="form-control" id="mac1" name="mac1" placeholder="0" required="" disabled>
                              </td>
                              <td class="tab">Media</td>
                              <td>
                              <input type="text" class="form-control" id="mac1" name="mac1" placeholder="0" required="" disabled>
                              </td>
                              <td>
                              <input type="text" class="form-control" id="mac1" name="mac1" placeholder="0" required="" disabled>
                              </td>

                              <td>
                                <input type="text" class="form-control" id="mac1" name="mac1" placeholder="0" required="" disabled>
                              </td>
                              <td>
                                <input type="text" class="form-control" id="mac1" name="mac1" placeholder="0" required="" disabled>
                              </td>
                              <td>
                                <input type="text" class="form-control" id="mac1" name="mac1" placeholder="0" required="" disabled>
                              </td>
                              <td class="tab">Media</td>
                              <td>
                                <input type="text" class="form-control" id="mac1" name="mac1" placeholder="0" required="" disabled>
                              </td>
                              <td>
                                <input type="text" class="form-control" id="mac1" name="mac1" placeholder="0" required="" disabled>
                              </td>

                              <td>Final</td>
                          </tr>
              <?php            
                }
              }
                ?>
                          <tr>
                            <td class="displina"><b>2</b> Adalgisa</td>
                            <td class="primeiro"></td>
                            <td class="primeiro"></td>
                            <td class="primeiro"></td>
                            <td class="tab primeiro">Media</td>
                            <td class="primeiro"></td>
                            <td class="primeiro"></td>


                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="tab">Media</td>
                            <td></td>
                            <td></td>

                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="tab">Media</td>
                            <td></td>
                            <td></td>

                            <td>Final</td>
                           </tr>
                           <tr>
                            <td class="displina"><b>3</b> Celestino Fragoso</td>
                            <td class="primeiro"></td>
                            <td class="primeiro"></td>
                            <td class="primeiro"></td>
                            <td class="tab primeiro">Media</td>
                            <td class="primeiro"></td>
                            <td class="primeiro"></td>


                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="tab">Media</td>
                            <td></td>
                            <td></td>

                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="tab">Media</td>
                            <td></td>
                            <td></td>

                            <td>Final</td>

                           </tr>
                      </tbody>
                    </table>
                    <!-- End small tables -->

                  </div>
  </div>
  <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab" tabindex="0">...</div>
</div>  
    </main>
  <!--Aula-->

</div>

<!--Rodape PC-->
  <footer class="py-1 bg-info text-white desktop fixed-bottom">
    <div class="container">
  
    </div>
  </footer>

<!--Rodape Phone-->
<footer class="blog-footer mobile bg-info text-white fixed-bottom">
  <div class="container py-2">
    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
      <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
    </svg>

    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
      <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
    </svg>

    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
      <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
    </svg>

    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
      <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"/>
    </svg>
  </div>
</footer>
</body>

<script src="biblioteca/jquery-3.5.1.min.js"></script>
<script src="biblioteca/bootstrap.min.js"></script>
<script src="biblioteca/cheatsheet.js"></script>
<script src="js/index.js"></script>

<script>

</script>

</html>
