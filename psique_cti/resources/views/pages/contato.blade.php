@extends('layout.site')

@section('titulo', 'Contato')
    
@section('conteudo')
  <div class="container-contato">
    <div class="caixa_contato_1">
      <div class="caixa_contato_2">
        <h2>Contato</h2>
                {{-- variável --}}
        <p><b>De:</b> hellokitty123@gmail.com</p>
                {{-- variável --}}
        <p><b>Para:</b> psicoporamor@hotmail.com</p>
        <div class="linha-branca"></div>
        
        <div class="caixa_contato_3">
          <form action="#">
            <div class="input-group mb-3">
              <span class="input-group-text" id="inputGroup-sizing-default">Assunto:</span>
              <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>

            <div class="form-floating">
              <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 200px"></textarea>
              <label for="floatingTextarea2">Conteúdo</label>
            </div> 

            <button type="submit" class="btn btn-outline-secondary">Enviar</button>
          </form>
        </div> <!-- caixa_contato_3 -->
      </div> <!-- caixa_contato_2 -->
    </div> <!-- caixa_contato_1 -->
  </div> <!--container-contato-->
@endsection