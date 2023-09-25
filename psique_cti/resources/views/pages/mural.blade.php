@extends('layout.site')

@section('titulo', 'Mural')
    
@section('conteudo')



@if(isset($evento1))
{{-- if (não há publicações) --}}

  <div class="pagina_vazia">
    <h3>Não há nenhuma publicação :&#040;</h3>
      <p>Volte em breve para conferir!</p>
      <img src="{{ asset('img/pipa-img.png') }}" width="35%" alt="">
  </div>
     
@else
  {{-- else (quando houver publicações) --}}
  <div class="container-mural">

    <div class="titulo-mural">
      {{-- if(section == profissional)--}}
      <h1>Eventos <a href="/adicionaevento" class="icones-padrao"><i class="fa-regular fa-calendar-plus"></i></a></h1> 
      {{-- else --}}
      {{-- <h1>Eventos</h1>   --}}
    </div>  

    <div class="text-center">
      <img src="{{ asset('img/eventos-img.png') }}" width="30%" class="rounded">
    </div>

    <div class="container text-center">
 

      @foreach($eventos as $evento)

     
      <div class="col-md-auto">
        {{-- card --}}
        <div class="card mb-3" style="max-width: 500px;">
          <div class="col-md-4">
                <img src=base href="{{asset('$evento->imagem')}}"  width="100" class="img-fluid rounded-start">
          </div>
          <div class="col-md-8">
            <div class="card-body">
           
               <p class="card-text"> {{ $evento->titulo}}</p>
              <p class="card-text"> {{ $evento->descricao}}</p>  
              
              <p class="card-text"> {{ $evento->local_evento}}</p>
              <p class="card-text"> {{ $evento->dataehora_evento}}</p>
              <p class="card-text"> {{ $evento->responsavel_evento}}</p>
              <p class="card-text"> {{ $evento->limite_pessoas_evento}}</p>
              <p class="card-text"> {{ $evento->link_evento}}</p>
              <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
             
             {{-- if(section == profissional) --}}
             <div class="icones_mural">

               <button class="delete"><i class="fa-solid fa-delete-left"></i></button>

               <div class="popup-wrapper">
                 <div class="popup">
                   <div class="popup-content">
                     <h2>Confirmação</h2>
                     <p>Você tem certeza que deseja excluir permanentemente este evento?</p>
                     <button class="popup-close">Cancelar</button>  
  <button class="btn-confirma" onclick="console.log('Botão Confirmar clicado'); excluirEvento({{ $evento->id }})">Confirmar</button>



                   </div>
                 </div>
               </div>

               <a href="/editarevento"><i class="fa-solid fa-pen-to-square"></i></a>
             </div>
           </div>
         </div>
     
      </div>
    </div>
  </div>
  
  @endforeach

    
    {{-- if(há artigos) --> exibir --}}
    <div class="titulo-mural">
      {{-- if(section == profissional)--}}
      <h1>Artigos <a href="/adicionartigo" class="icones-padrao"><i class="fa-solid fa-newspaper"></i></a></h1>  
      {{-- else --}}
      {{-- <h1>Artigos</h1>   --}}
    </div> 

    <div class="text-center">
      <img src="{{ asset('img/artigos-img.png') }}" width="30%" class="rounded" alt="">
    </div>
    <img src="{{ asset('img/fundo4.jpg') }}"  class="card-img-bottom" alt="...">
    @foreach($artigos as  $publi)


    <div class="card">
      <div class="card-body">
        {{-- if(section == profissional) --}}
        <div class="icones_mural">
          <a href="/editartigo"><i class="fa-solid fa-pen-to-square"></i></a>
          <button class="delete"><i class="fa-solid fa-delete-left"></i></button>

          <div class="popup-wrapper">
            <div class="popup">
              {{-- <div class="popup-close">x</div> --}}
              <div class="popup-content">
                <h2>Confirmação</h2>
                <p>Você tem certeza que deseja excluir permanentemente este evento?</p>
                <button class="popup-close">Cancelar</button>  
                <button class="btn-confirma">Confirmar</button>
              </div>
            </div>
          </div>

         
        </div>

         <p class="card-text"> {{ $publi->titulo}}</p>
        <p class="card-text"> {{ $publi->descricao}}</p> 
      
          <p class="card-text"> {{ $publi->autor}}</p>
          <p class="card-text"> {{ $publi->link}}</p>
        
        {{-- criar uma condição para que se o artigo vier de outro site, o link será referênciado aqui --}}
        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
      </div>
     
    </div>
   </div> {{--- container mural --}}

   <script>
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
    </script>
    
@endforeach
@endif
@endsection