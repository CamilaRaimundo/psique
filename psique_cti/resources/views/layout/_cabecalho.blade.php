<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" content="#003b63">
  <title>@yield('titulo')</title>
  

  <!-- Import Google Icon Font -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  
  <!-- Import bootstrap.css -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">  

  <!-- icones -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script src="https://kit.fontawesome.com/58fe79a519.js" crossorigin="anonymous"></script>

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="shortcut icon" href="{{ asset('img/icone_cf.png') }}">

  {{-- Login do Google - JS --}}
  <script src="https://accounts.google.com/gsi/client" async></script>
  <script>
    function handleCredentialResponse(response) {}
    window.onload = function () {
      google.accounts.id.initialize({
        client_id: "221599725357-dan13di9kqn4esjv37raoqr6etuvbkl3.apps.googleusercontent.com",
        callback: handleCredentialResponse
      });
      google.accounts.id.renderButton(
        document.getElementById("buttonDiv"),
        { 
          theme: "outline", 
          size: "large", 
          class:"g_id_signin",
          type: "standard",
          shape: "pill",
          text: "signin",
          logo_alignment:"left"
        } // customization attributes
      );
      google.accounts.id.prompt(); // also display the One Tap dialog
    }
  </script>

  {{-- importação JQuery --}}
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
  <header>

    <a href="{{route('home')}}"><img src="{{ asset('img/logo_completa_sf.png') }}" alt="psiquê"></a>

    <div class="nav">
      @if((Auth::check()))
        @if(Auth::user()->nivel_de_acesso==-1)  
          <a href="{{route('home_admin')}}">Profissionais</a>
    
          <span>|</span>

          <a href="{{route('listarAlunos.mostrar')}}">Alunos</a>

        @elseif(Auth::user()->nivel_de_acesso==1)  
          <a href="{{route('home')}}" id="home">Home</a>

          <span>|</span>
    
          <a href="{{route('mural.mostrar')}}" id="n-mural">Mural</a>
    
          <span>|</span>
    
          <a href="{{route('contato.mostrar')}}" id="n-contato">Contato</a>

        @elseif(Auth::user()->nivel_de_acesso==2)  
          <a href="{{route('home_psico')}}"><i class="fa-solid fa-house"></i></a>

          <span>|</span>

          <a href="{{route('mural.mostrar')}}"><i class="fa-solid fa-calendar-days"></i></a>

          <span>|</span>

          <a href="/estatisticas"><i class="fa-solid fa-chart-pie"></i></a>

          <span>|</span>

          <a href="/encontros"><i class="fa-solid fa-pencil"></i></a>

        @endif 

      @else
        <a href="{{route('home')}}" id="home">Home</a>

        <span>|</span>
  
        <a href="{{route('mural.mostrar')}}" id="n-mural">Mural</a>
  
        <span>|</span>
  
        <a href="{{route('login.mostrar')}}" id="n-contato">Contato</a>
      @endif
    </div>

    {{-- <div>
      <a href="{{route('login.mostrar')}}" class="icones-padrao"><i class="fa-solid fa-user" ></i></a>
      <a href="#" class="icones-padrao"><i class="fa-solid fa-circle-half-stroke"></i></a>
    </div> --}}

    <div  class="icones-padrao">
      @if (Auth::guest())
        <a href="{{route('login.mostrar')}}" class="icones-padrao"><i class="fa-solid fa-user"></i></a>
      @elseif(Auth::check())
        <a href="{{ route('logout') }}" class="icones-padrao"><i class="fa-solid fa-right-to-bracket"></i></a>
      @endif
      <a href="https://fontawesome.com/icons/circle-info?f=classic&s=solid" class="icones-padrao" target="_blanck"><i class="fa-solid fa-circle-info"></i></a>
      <button onclick id="toggle"><i class="fa-solid fa-circle-half-stroke"></i></button>
    </div>

      {{-- TESTANDO POP-UP --> caso a pessoa faça o login pela primeira vez no dia - deve exibir o pop-up --}}
      {{-- <button class="teste"><i class="fa-solid fa-hippo"></i></button> --}}

      {{-- <div class="popup-wrapper">
        <div class="popup">
          <div class="popup-content">
            <h2>Registro de Emoções</h2>
            <p>Como você se sente hoje? Não há registros hoje, registre já, clicando no botão abaixo!</p>
            <button class="btn-confirma"><a href="/emocoes">Redirecionar!</a></button>
          </div>
        </div>
      </div> --}}
    
    

    {{-- -----------------------------POP-UP------------------------------- --}}
    <script>
      const teste  = document.querySelectorAll('.teste ')
      const popup = document.querySelector('.popup-wrapper ')
      // for (i = 0; i < button.length; i++) {
  
      teste.addEventListener('click', () => {
        popup.style.display = 'block'
      }) 

      popup.addEventListener('click', event => {
        const classNameOfClickedElement = event.target.classList
        const classNames = ['popup-close', 'popup-wrapper']
        const shouldClosePopup = classNames.some(className => className === classNameOfClickedElement) 
        
        if(shouldClosePopup){
          popup.style.display = 'none'
        }
      })
    </script>

    {{-- DARK MODE --}}
    <script>
      const toggle = document.getElementById("toggle");
      const refresh = document.getElementById("refresh");
      const theme = window.localStorage.getItem("theme");

      /* verifica se o tema armazenado no localStorage é escuro
      se sim aplica o tema escuro ao body */
      if (theme === "dark") document.body.classList.add("dark");

      // event listener para quando o botão de alterar o tema for clicado
      toggle.addEventListener("click", () => {
        document.body.classList.toggle("dark");
        if (theme === "dark") {
          window.localStorage.setItem("theme", "light");
        } else window.localStorage.setItem("theme", "dark");
      });
 
      refresh.addEventListener("click", () => {
        window.location.reload();
      });

      localStorage.setItem('theme', 'dark'); 
      //acessado o tema da maquina do usuário
      localStorage.getItem('theme'); 
    </script> 
  </header>
