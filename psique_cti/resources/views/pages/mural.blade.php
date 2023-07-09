@extends('layout.site')

@section('titulo', 'Mural')
    
@section('conteudo')

  <div class="container-mural">

    {{-- if (não há publicações) --}}
    {{-- <div class="sem_publi">
        <h3>Desculpa, ainda não há publicações, eventos ou avisos :&#041;</h3>
        <p>Volte em breve para conferir!</p>
    </div> --}}

    {{-- else (quando houver publicações) --}}

    {{-- if(há eventos) --> exibir --}}
    <div class="titulo-mural">
      <h1>Eventos</h1>  
    </div>  
    <div class="text-center">
      <img src="{{ asset('img/eventos-img.png') }}" width="30%" class="rounded" alt="...">
    </div>

    <div class="container text-center">
      <div class="row">
        <div class="col">
          {{-- card --}}
          <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="{{ asset('img/smile.jpg') }}" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                </div>
              </div>
            </div>
          </div>
        </div> <!--col-->
        <div class="col">
          {{-- card --}}
          <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="{{ asset('img/smile.jpg') }}" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                </div>
              </div>
            </div>
          </div>
        </div> <!--col-->
        <div class="col">
          {{-- card --}}
          <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="{{ asset('img/smile.jpg') }}" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                </div> {{-- card-body --}} 
              </div> {{-- col-md-8 --}}
            </div> <!--row g-0-->
          </div> {{-- card --}}
        </div> <!--col-->
      </div> <!--row-->
    </div> {{-- container --}}

    {{-- if(há artigos) --> exibir --}}
    <div class="titulo-mural">
      <h1>Artigos</h1>  
    </div>  
    <div class="text-center">
      <img src="{{ asset('img/artigos-img.png') }}" width="30%" class="rounded" alt="...">
    </div>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Título do artigo</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non feugiat urna. Integer vulputate ultricies risus et venenatis. Pellentesque consequat iaculis congue. Phasellus in ornare leo. Proin erat metus, iaculis in ligula nec, imperdiet scelerisque massa. Nullam nec lorem rutrum, blandit odio eu, facilisis ligula. In aliquet maximus porta. Morbi a volutpat sapien. Donec at tempor purus. Ut nec enim sem. Sed dictum felis metus, sit amet commodo lorem fermentum non. In eleifend lacinia orci a interdum. Praesent vitae odio sit amet erat venenatis pulvinar.</p>          
        <p class="card-text">Donec lorem ex, aliquet eu posuere quis, semper sit amet nunc. Maecenas vehicula dui non sapien pellentesque cursus. Aliquam erat volutpat. Morbi vel tellus ac lacus tempor posuere. Proin facilisis ac est vel tempus. Donec congue congue gravida. Fusce volutpat eros lacus, et pretium dolor aliquam sed. Donec euismod tellus id turpis fermentum, in lacinia orci sodales. Vivamus tincidunt rhoncus laoreet.</p>
        <p class="card-text">Fusce auctor lectus sit amet dignissim posuere. Phasellus eros tortor, faucibus sit amet massa et, pretium lacinia ex. Mauris accumsan, velit vel pellentesque sagittis, metus nibh venenatis urna, at fringilla leo neque at lectus. Etiam quis lobortis purus. Pellentesque blandit eros at mauris venenatis, semper ullamcorper eros mattis. Sed aliquet molestie viverra. Morbi diam nisi, tempus quis magna ac, fringilla elementum odio. Suspendisse vitae arcu eget lectus maximus rutrum. Pellentesque condimentum massa a elit tempor lobortis.</p>
        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
      </div>
      <img src="{{ asset('img/fundo4.jpg') }}"  class="card-img-bottom" alt="...">
    </div>

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Título do artigo</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non feugiat urna. Integer vulputate ultricies risus et venenatis. Pellentesque consequat iaculis congue. Phasellus in ornare leo. Proin erat metus, iaculis in ligula nec, imperdiet scelerisque massa. Nullam nec lorem rutrum, blandit odio eu, facilisis ligula. In aliquet maximus porta. Morbi a volutpat sapien. Donec at tempor purus. Ut nec enim sem. Sed dictum felis metus, sit amet commodo lorem fermentum non. In eleifend lacinia orci a interdum. Praesent vitae odio sit amet erat venenatis pulvinar.</p>          
        <p class="card-text">Donec lorem ex, aliquet eu posuere quis, semper sit amet nunc. Maecenas vehicula dui non sapien pellentesque cursus. Aliquam erat volutpat. Morbi vel tellus ac lacus tempor posuere. Proin facilisis ac est vel tempus. Donec congue congue gravida. Fusce volutpat eros lacus, et pretium dolor aliquam sed. Donec euismod tellus id turpis fermentum, in lacinia orci sodales. Vivamus tincidunt rhoncus laoreet.</p>
        <p class="card-text">Fusce auctor lectus sit amet dignissim posuere. Phasellus eros tortor, faucibus sit amet massa et, pretium lacinia ex. Mauris accumsan, velit vel pellentesque sagittis, metus nibh venenatis urna, at fringilla leo neque at lectus. Etiam quis lobortis purus. Pellentesque blandit eros at mauris venenatis, semper ullamcorper eros mattis. Sed aliquet molestie viverra. Morbi diam nisi, tempus quis magna ac, fringilla elementum odio. Suspendisse vitae arcu eget lectus maximus rutrum. Pellentesque condimentum massa a elit tempor lobortis.</p>
        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
      </div>
      {{-- <img src="{{ asset('img/fundo4.jpg') }}" class="card-img-bottom" alt="..."> --}}
    </div>
    
  </div> {{-- container-mural --}} 
  

@endsection