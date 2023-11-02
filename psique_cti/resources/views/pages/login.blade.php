<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Login</title>

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
</head>

<body>
  <header>
    <a href="{{route('home_admin')}}"><img src="{{ asset('img/logo_completa_sf.png') }}" alt="psiquê"></a>

    <div class="nav">
      @if((Auth::check())) {{-- Vê se está logado --}}
        @if(Auth::user()->nivel_de_acesso==-1) {{-- Pega dados da sessão --}}
          <a href="{{route('home_admin')}}">Profissionais</a>
    
          <span>|</span>

          <a href="{{route('listarAlunos.mostrar')}}">Alunos</a>

        @elseif(Auth::user()->nivel_de_acesso==1) {{-- Pega dados da sessão --}}
          <a href="{{route('home')}}" id="home">Home</a>

          <span>|</span>
    
          <a href="{{route('mural.mostrar')}}" id="n-mural">Mural</a>
    
          <span>|</span>
    
          <a href="{{route('contato.mostrar')}}" id="n-contato">Contato</a>

        @elseif(Auth::user()->nivel_de_acesso==-2) {{-- Pega dados da sessão --}}
          <a href="{}"><i class="fa-solid fa-house"></i></a>

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

    <div  class="icones-padrao">
      @if (Auth::guest())
        <a href="{{route('login.mostrar')}}" class="icones-padrao"><i class="fa-solid fa-user"></i></a>
      @elseif(Auth::check())
        <a href="{{ route('logout') }}" class="icones-padrao"><i class="fa-solid fa-right-to-bracket"></i></a>
      @endif

      @if((Auth::check()))
        @if(Auth::user()->nivel_de_acesso==-1)  
        <a href="{{ asset('PDFs/Help do Sistema - Admin.pdf') }}" class="icones-padrao" target="_blanck"><i class="fa-solid fa-circle-info"></i></a>

        @elseif(Auth::user()->nivel_de_acesso==1)  
        <a href="{{ asset('PDFs/Help do Sistema - Alunos.pdf') }}" class="icones-padrao" target="_blanck"><i class="fa-solid fa-circle-info"></i></a>

        @elseif(Auth::user()->nivel_de_acesso==2)  
          <a href="{{ asset('PDFs/Help do Sistema - Profissional.pdf') }}" class="icones-padrao" target="_blanck"><i class="fa-solid fa-circle-info"></i></a>
        @endif 

      @else
        <a href="{{ asset('PDFs/Help do Sistema - sem nível de acesso.pdf') }}" class="icones-padrao" target="_blanck"><i class="fa-solid fa-circle-info"></i></a>
      @endif
      
      <button onclick id="toggle"><i class="fa-solid fa-circle-half-stroke"></i></button>
    </div>

  </header>

  <div class="container_login"> 
    <div class="box_img1 secao-ocultar">
      <img src="{{ asset('img/login-img.png') }}">    
    </div>
      
    <div class="login_caixas">
      <div class="caixa_login_1">
        <div class="caixa_login_2">
          <div class="conteudo_login">
            <h2 class="logintext">Login</h2>
            <div class="linha-branca"></div>
            <p>Bem-vind<img src="{{ asset('img/icone_sf.png')}}" class="nicolau_login"></p>
            <a href="{{URL::to('googleLogin')}}"><img src="{{asset('img/google.png')}}" width="80%"></a>
          </div>
        </div>
      </div>
    </div>

  </div>

  {{-- rodapé --}}
  <footer>
    <div class="img-footer">
      <img src="{{ asset('img/icone_sf.png') }}" alt="nicolau" width="80px">
    </div>

    <div class="navegacao">
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

    <div class="copyright">
      © 2023 Colégio Técnico Industrial "Prof. Isaac Portal Róldan"
    </div>
  </footer>

  <script src="{{ asset('js/script.js') }}"></script>
  
  <!-- Javascript bootstrap -->
  <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

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
</body>
</html>