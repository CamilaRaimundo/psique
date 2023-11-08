@extends('layout.site')

@section('titulo', 'Mural')
    
@section('conteudo')

{{-- FAZER CONDIÇÃO PARA SUMIR APENAS SE NÃO FOR A PSICÓLOGA --}}
  @if(!isset($eventos) && !isset($artigos)) {{-- if (não há publicações) --}}
    <div class="pagina_vazia">
      <h3>Não há nenhuma publicação :&#040;</h3>
      <p>Volte em breve para conferir!</p>
      <img src="{{ asset('img/pipa-img.png') }}" width="35%" alt="">
    </div>
    
      
  @elseif(isset($eventos) || isset($artigos)) {{-- else (quando houver publicações) --}}



    <div class="container-mural">

      {{-- @if(isset($evento))  --}}
        {{-- EVENTOS --}}
        <div class="titulo-mural">
          {{-- if(section == profissional)--}}
          <h1>Eventos @if(Auth::check())
            @if( Auth::user()->nivel_de_acesso==2) <a href="{{route('eventos_add.mostrar')}}" class="icones-padrao"><i class="fa-regular fa-calendar-plus"></i></a></h1> 
            @endif
        @endif
          {{-- else --}}
          {{-- <h1>Eventos</h1>   --}}
        </div>  

        <div class="text-center"> {{-- imagem ilustrativa --}}
          <img src="{{ asset('img/eventos-img.png') }}" width="30%" class="rounded">
        </div>

        <div class="container text-center">
          @foreach($eventos as $evento)
            <div class="container-fluid">

              {{-- card --}}
              <div class="card mb-3" style="max-width: 500px;">
                
                @if(isset($evento->imagem))
                  <div class="col-md-4">
                    <img src=base href="{{asset('$evento->imagem')}}"  width="100" class="img-fluid rounded-start">
                  </div>
                @endif
                
                <div class="col-md-auto">
                  <div class="card-body">
                    <h4 class="card-text"> {{ $evento->titulo}}</h4>
                    <p class="card-text"> {{ $evento->descricao}}</p>  
                    <p class="card-text">Local: {{ $evento->local_evento}}</p>
                    <p class="card-text">Data: {{ $evento->dataehora_evento}}</p>
                    <p class="card-text">Responsável: {{ $evento->responsavel_evento}}</p>
                    <p class="card-text">Limite de pessoas: {{ $evento->limite_pessoas_evento}}</p>
                    <p class="card-text"><small class="text-body-secondary"><a href="{{ $evento->link_evento}}" target="_blank">{{ $evento->link_evento}}</a></small></p>
                  </div> {{-- ema --}} 
                
                 <!-- if(section == profissional)  -->

              
                 
        @if(Auth::check())
                   @if( Auth::user()->nivel_de_acesso==2)
                  <div class="icones_mural">
                  <button class="delete"><i class="fa-solid fa-delete-left"></i></button>
                    
                    <!-- POP-UP -->
                  <div class="popup-wrapper">
                    <div class="popup">
                      <div class="popup-content">
                        <h2>Confirmação</h2>
                        <p>Você tem certeza que deseja excluir permanentemente este evento?</p>
                        <button class="popup-close">Cancelar</button>   
                        <a href="{{ route('eventos.excluir', ['id' => $evento->id]) }}" title="{{ $evento->id }}">
                        <button class="btn-confirma" onclick="confirmAndRedirect('{{ route('eventos.excluir', ['id' => $evento->id]) }}')">  Confirmar </button>
                        </a>

                       </div>
                    </div>
                  </div> 
                  
                      <!-- <a href="{{ route('eventos.excluir', ['id' => $evento->id]) }}" title="{{ $evento->id }}">
                        <button class="delete" onclick="confirmAndRedirect('{{ route('eventos.excluir', ['id' => $evento->id]) }}')">
                            <i class="fa-solid fa-delete-left"></i>
                    </a> -->
                    

                      {{-- <a href="{{route('eventos.excluir', ['id' => $evento->id])}}"  title="{{ $evento->id }}">
                        <i class="fa-solid fa-delete-left" ></i>
                    </button> --}}
                  
                      
                    <a href="{{route('eventos_edit.mostrar')}}"><i class="fa-solid fa-pen-to-square"></i></a>
                  </div>
                        
                  @endif
                  @endif
                 
                </div>
              </div>
            </div>
           
          @endforeach

         
   
           
        </div>
          
        </div>
       


      <!-- {{-- @endif --}} -->

      {{-- @if(isset($artigos)) --}}
        {{-- ARTIGOS --}}
        <div class="titulo-mural"> 
          {{-- if(section == profissional)--}}
          <h1>Artigos @if(Auth::check())
            @if( Auth::user()->nivel_de_acesso==2) <a href="{{route('artigos_add.mostrar')}}" class="icones-padrao"><i class="fa-solid fa-newspaper"></i></a></h1>
            @endif
            @endif  
          {{-- else --}}
          {{-- <h1>Artigos</h1>   --}}
        </div> 

        <div class="text-center"> {{-- imagem ilustrativa --}}
          <img src="{{ asset('img/artigos-img.png') }}" width="30%" class="rounded" alt="">
        </div>

        @foreach($artigos as $publi)

          {{-- <img src="{{ asset('img/fundo4.jpg') }}"  class="card-img-bottom" alt="..."> --}}
          <div class="card artigo">
            <div class="card-body">
              {{-- if(section == profissional) --}}

              @if(Auth::check())
            @if( Auth::user()->nivel_de_acesso==2)
            <div class="icones_mural">
            <button class="delete"><i class="fa-solid fa-delete-left"></i></button>
                    
                    <!-- POP-UP -->
                  <div class="popup-wrapper">
                    <div class="popup">
                      <div class="popup-content">
                        <h2>Confirmação</h2>
                        <p>Você tem certeza que deseja excluir permanentemente este artigo?</p>
                        <button class="popup-close">Cancelar</button>   
                        <a href="{{ route('artigos.excluir', ['id' => $publi->id]) }}" title="{{ $publi->id }}">
                        <button class="btn-confirma" onclick="confirmAndRedirect('{{ route('artigos.excluir', ['id' => $publi->id]) }}')">  Confirmar </button>
                        </a>

                       </div>
                    </div>
                  </div> 
              <!-- <a href="{{ route('artigos.excluir', ['id' => $publi->id]) }}" title="{{ $publi->id }}">
                <button class="delete" onclick="confirmAndRedirect('{{ route('artigos.excluir', ['id' => $publi->id]) }}')">
                    <i class="fa-solid fa-delete-left"></i> 
                </button>
            </a> -->
           

              <!-- {{-- <a href="{{route('artigos.excluir', ['id' => $publi->id])}}"  title="{{ $publi->id }}">
                <button class="delete" ><i class="fa-solid fa-delete-left" ></i></button>
                </a>
     --}} -->
     <script>
      function confirmAndRedirect(url) {
          if (confirm ) {
              window.location.href = url;
          }
        
      }
      </script>
      


                <a href="{{route('artigos_edit.mostrar')}}"><i class="fa-solid fa-pen-to-square"></i></a>
                
          
            </div>
              @endif
              @endif

              <h5 class="card-title">{{$publi->titulo}}</h5> 
              <p class="card-text">{{$publi->descricao}}</p>
              <p class="card-text">{{$publi->autor}}</p>   
              <p class="card-text"><small class="text-body-secondary"><a href="{{$publi->link}}" target="_blank">{{ $publi->link}}</a></small></p>       
            </div>
            @if(isset($publi->imagem))
              <img src="{{$publi->imagem}}"  class="card-img-bottom">
            @endif
          
          </div>

          
         
        @endforeach

    
      

        <script>
  document.addEventListener("DOMContentLoaded", function() {
    const buttons = document.querySelectorAll('.delete');
    
    buttons.forEach(button => {
      button.addEventListener('click', () => {
        const popup = button.nextElementSibling; // Obtém a pop-up associada ao botão
        popup.style.display = 'block';
      });
    });
    
    const popups = document.querySelectorAll('.popup-wrapper');
    
    popups.forEach(popup => {
      popup.addEventListener('click', event => {
        const classNameOfClickedElement = event.target.classList[0];
        const classNames = ['popup-close', 'popup-wrapper'];
        const shouldClosePopup = classNames.some(className => className === classNameOfClickedElement);
        
        if (shouldClosePopup) {
          popup.style.display = 'none';
        }
      });
    });
  });
</script>
      <!-- {{-- @endif --}} -->
    </div> {{--- container mural --}}
    
  @endif

  <!-- {{-- -----------------------------POP-UP------------------------------- --}} -->
 

 
@endsection