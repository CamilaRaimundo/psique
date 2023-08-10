@extends('layout.site')

@section('titulo', 'Contato')
    
@section('conteudo')
  <div class="container-contato">
    {{-- <div class="img-box-contato">
    <img src="{{ asset('img/contato-img.png') }}" width="40%" alt="">
  </div> --}}
    <div class="caixa_contato_1">
      <div class="caixa_contato_2">
        <h2>Contato</h2>
                {{-- variável --}}
        <p><b>De:</b> hellokitty123@gmail.com</p>
                {{-- variável --}}
        <p><b>Para:</b> psicoporamor@hotmail.com</p>
        <div class="linha-branca"></div>
        
        <div class="caixa_contato_3">
          <form method="POST" action="{{ route('contato.enviar') }}">
          @csrf

          <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Email:</span>
            <input type="text" name="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
          </div>

            <div class="input-group mb-3">
              <span class="input-group-text" id="inputGroup-sizing-default">Assunto:</span>
              <input type="text" name="subject" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
            </div>

            <div class="form-floating">
              <textarea name="content" class="form-control" placeholder="Leave a comment here" style="height: 200px" required></textarea>
              <label for="content">Conteúdo</label>
            </div> 

            <button type="submit" class="btn btn-outline-secondary">Enviar</button>
          </form>
        </div> <!-- caixa_contato_3 -->
      </div> <!-- caixa_contato_2 -->
    </div> <!-- caixa_contato_1 -->
  </div> <!--container-contato-->
@endsection