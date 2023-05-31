<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>@yield('titulo')</title>

  <!-- Import Google Icon Font -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Import materialize.css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

  <!-- Import bootstrap.css -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">  

  <!-- icones -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script src="https://kit.fontawesome.com/58fe79a519.js" crossorigin="anonymous"></script>

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  {{-- <img src="{{!! asset('css/app.css') }}" alt=""> --}}

</head>

<body>
    {{-- <nav>
        <div class="nav-wrapper #f50057 pink accent-3">
          <a href="#" class="brand-logo"><img src="pasta_imagens_nseiondefica/logo_completa_sf.png" alt="psiquê"></a>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="#">Home</a></li>
            <li><a href="#">Mural</a></li>
            <li><a href="#">Agenda</a></li>
          </ul>
        </div>
      </nav>     --}}

  <header>
    <a href="index.html"><img src="{{ asset('img/logo_completa_sf.png') }}" alt="psiquê"></a>

    <div class="nav">
      <a href="{{ asset('index') }}">Home</a>
      
      <a href="{{ asset('mural') }}">Mural</a>
      {{-- <a href="paginas/mural.html">Mural</a> --}}
    </div>

    <a href="#" class="conta"><i class="fa-solid fa-user"></i></a>
    
  </header>