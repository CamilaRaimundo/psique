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
                    

                    <a href="{{route('eventos_edit.mostrar')}}"><i class="fa-solid fa-pen-to-square"></i></a>
                  </div>
                  @endif
                  @endif
                 
                </div>
              </div>
            </div>
          @endforeach
         
          
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
              <!-- POP-UP -->

              <button class="delete" > <i class="fa-solid fa-delete-left"></i></button>
             
                
        
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
              <img src="{{$publi->imagem}}  class="card-img-bottom">
            @endif
          
          </div>
        @endforeach

        <div class="popup-wrapper">
                      <div class="popup">
                        <div class="popup-content">
                          <h2>Confirmação</h2>
                          <p>Você tem certeza que deseja excluir permanentemente este evento?</p>
                          <button class="popup-close">Cancelar</button> 
                          @if(isset($evento)) 
                          <a href="{{route('eventos.excluir', ['id' => $evento->id])}}"  title="{{$evento->id}}" >
                          <button class="btn-confirma">  Confirmar </button>
                          </a>
                          @elseif(isset($publi))
                          <a href="{{route('artigos.excluir', ['id' => $publi->id])}}"  title="{{$publi->id}}" >
                          <button class="btn-confirma">  Confirmar </button>
                          </a>
                          @endif
                         </div>
                      </div>
                    </div> 
       

      
      <!-- {{-- @endif --}} -->
    </div> {{--- container mural --}}
  @endif

  {{-- -----------------------------POP-UP------------------------------- --}}
  <script>
  document.addEventListener("DOMContentLoaded", function() {
    // Seu código JavaScript aqui
    const button  = document.querySelectorAll('.delete ')
    const popup = document.querySelector('.popup-wrapper ')
    
    for (i = 0; i < button.length; i++) {
        button[i].addEventListener('click', () => {
            popup.style.display = 'block'
        }) 
    
        popup.addEventListener('click', event => {
            const classNameOfClickedElement = event.target.classList[0]
            const classNames = ['popup-close', 'popup-wrapper']
            const shouldClosePopup = classNames.some(className => className === classNameOfClickedElement) 
            
            if (shouldClosePopup) {
                popup.style.display = 'none'
            }
        })
    }
});

  </script>
    
  <!-- <script>
    function excluirEvento(eventoId) {
      // Fazer uma solicitação DELETE para a rota do controlador para excluir o evento
      fetch(`/excluir-evento/${eventoId}`, {
        method: 'DELETE', // Use o método DELETE para excluir o evento
        headers: {
          'Content-Type': 'application/json',
        },
      })
        .then(response => {
          if (response.ok) {
            // O evento foi excluído com sucesso, você pode atualizar a página ou fazer outras ações necessárias
            window.location.reload(); // Atualizar a página
          } else {
            // Lidar com erros, exibir mensagens de erro, etc.
            console.error('Erro ao excluir o evento');
          }
        })
        .catch(error => {
          console.error('Erro ao excluir o evento:', error);
        });
    }
  </script>   -->
@endsection