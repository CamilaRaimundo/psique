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

  {{-- Login do Google --}}
  {{-- <script src="https://accounts.google.com/gsi/client" async></script>
  <script>
    function handleCredentialResponse(response) {
      if (response.credential) {
        window.location.href = '/dashboard'; // Redireciona para a página de dashboard após o login
        const userName = response.credential.displayName;
        document.getElementById('welcomeMessage').innerText = `Bem-vindo, ${userName}!`;
      } else {
        console.log('Usuário não fez login.');
      }
    }
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
        }  // customization attributes
      );
      google.accounts.id.prompt(); // also display the One Tap dialog
    }
  </script> --}}

</head>

<body>

    <header>
        <a href="{{route('home')}}"><img src="{{ asset('img/logo_completa_sf.png') }}" alt="psiquê"></a>

        <div class="nav">
        <a href="{{route('home')}}">Home</a>
        
        <span>|</span>

        <a href="{{route('mural.mostrar')}}">Mural</a>

        <span>|</span>

        <a href="{{route('contato.mostrar')}}">Contato</a>
        
        </div>

        <div>
        <a href="{{route('cadastro.mostrar')}}" class="icones-padrao"><i class="fa-solid fa-user" ></i></a>
        <a href="#" class="icones-padrao"><i class="fa-solid fa-circle-half-stroke"></i></a>
        </div>

    {{-- Pagina Login --}}
    </header>

    <div class="container_login"> 
        <div class="login_img">
            <img src="{{ asset('img/login-img.png') }}" alt="">    
        </div>
        
        <div class="login_caixas">
          <div class="caixa_login_1">
              <div class="caixa_login_2">
                  <div class="conteudo_login">
                      <h2>Login</h2>
                      <div class="linha-branca"></div>
                      <p>Bem-vind<img src="{{ asset('img/icone_sf.png') }}"></p>
                      <center>
                        {{-- <div id="buttonDiv"></div> --}}
                        <a href="{{URL::to('googleLogin')}}">
                          <img src="{{URL::asset('img/google.png')}}" height="45px">
                        </a>
                      </center>

                  </div>
              </div>
          </div>
      </div>

    </div>

    {{-- rodape --}}
    <footer>
        <div class="img-footer">
          <img src="{{ asset('img/icone_sf.png') }}" alt="nicolau" width="80px">
        </div>
    
        <div class="navegacao">
          <a href="{{route('home')}}">Home</a>
          
          <span>|</span>
    
          <a href="{{route('mural.mostrar')}}">Mural</a>
    
          <span>|</span>
    
          <a href="{{route('contato.mostrar')}}">Contato</a>
    
          <span>|</span>
    
          <a href="{{route('login.mostrar')}}">Login</a>
        </div>
    
        <div class="copyright">
          © 2023 Colégio Técnico Industrial "Prof. Isaac Portal Róldan"
        </div>
      </footer>

      <script src="{{ asset('js/script.js') }}"></script>
  
  <!-- Javascript bootstrap -->
  <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
