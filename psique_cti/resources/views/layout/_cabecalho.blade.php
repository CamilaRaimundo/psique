<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" content="#003b63">
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

</head>

<body>
  <header>
    <a href="/index"><img src="{{ asset('img/logo_completa_sf.png') }}" alt="psiquê"></a>

    <div class="nav">
      {{-- if(usuários comuns) --}}
      <a href="/index" class="active">Home</a>
      {{-- else if(psicólogo) --}}
      {{-- <a href="/homepsico">Home</a> --}}
      {{-- else if(Admin) --}}
      {{-- <a href="/Admin">Home</a> --}}
      
      <span>|</span>

      <a href="{{route('evento.mostrar')}}">Mural</a>

      {{-- <a href="{{route('artigo.mostrar')}}">Mural</a> --}}

      <span>|</span>

      {{-- if(usuários comuns) --}}
      <a href="/contato">Contato</a>
      {{-- else if (psicólogo) --}}
      {{-- <a href="/estatistica">Estatísticas</a> --}}
    </div>

    {{-- <div>
      <a href="/login" class="icones-padrao"><i class="fa-solid fa-user" ></i></a>
      <a href="#" class="icones-padrao"><i class="fa-solid fa-circle-half-stroke"></i></a>
    </div> --}}

    <div  class="icones-padrao">
      <a href="/login" class="icones-padrao"><i class="fa-solid fa-user" ></i></a>
      <button onclick id="toggle"><i class="fa-solid fa-circle-half-stroke"></i></button>
    </div>
    

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
      
    </div> 

  </header>


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