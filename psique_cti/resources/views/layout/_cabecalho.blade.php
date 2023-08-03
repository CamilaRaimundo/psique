<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>@yield('titulo')</title>

  <!-- Import Google Icon Font -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  
  <!-- Import materialize.css -->
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> --}}

  <!-- Import bootstrap.css -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">  

  <!-- icones -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script src="https://kit.fontawesome.com/58fe79a519.js" crossorigin="anonymous"></script>

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="shortcut icon" href="{{ asset('img/icone_cf.png') }}">

</head>

<body>

  <header>
    <a href="/index"><img src="{{ asset('img/logo_completa_sf.png') }}" alt="psiquê"></a>

    <div class="nav">
      <a href="/index">Home</a>
      
      <span>|</span>

      <a href="/mural">Mural</a>

      <span>|</span>

      <a href="/contato">Contato</a>
      
    </div>

    <div>
      <a href="/cadastro" class="icones-padrao"><i class="fa-solid fa-user" ></i></a>
      <a href="#" class="icones-padrao"><i class="fa-solid fa-circle-half-stroke"></i></a>
    </div>

  </header>