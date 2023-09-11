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
                     <button class="btn-confirma">Confirmar</button>
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

      

      <!-- <div class="col-md-auto">
          {{-- card --}}
          <div class="card mb-3" style="max-width: 500px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                  {{-- if(section == profissional) --}}
                  <div class="icones_mural">
                    <a href=""><i class="fa-solid fa-delete-left"></i></a>
                    <a href=""><i class="fa-solid fa-pen-to-square"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
--> 
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
    {{-- @foreach($mural as $muu) --}}

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

   {{--- js- confirmar exclusao evento - isa --}}
   {{-- <script>
    $(document).ready(function () {
        $('.delete-event').click(function () {
            var eventIdToDelete = $(this).data('event-id');

            // Exibir o popup de confirmação ou qualquer outra ação necessária aqui
            // ...

            // Quando o botão "Confirmar" do popup é clicado
            $('.btn-confirma').click(function () {
                // Fazer uma solicitação AJAX para excluir o evento
                $.ajax({
                    type: "DELETE",
                    url: "/excluir-evento/" + eventIdToDelete, // Certifique-se de que a rota está correta
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function (data) {
                        if (data.success) {
                            // Remover o evento da página
                            $('[data-event-id="' + eventIdToDelete + '"]').closest('.col-md-auto').remove();
                        }
                        // Fechar o popup de confirmação ou faça o que for necessário
                        // ...
                    },
                    error: function () {
                        // Lidar com erros
                        // ...
                    }
                });
            });

            // Fechar o popup de confirmação ou qualquer outra ação necessária aqui
            // ...
        });

        // ... Outro código JavaScript ...
    }); --}}
{{-- </script> --}}



  
@endsection