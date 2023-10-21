@extends('layout.site')

@section('titulo', 'MOOD')
    
@section('conteudo')

<!-- $datagora = date("d/m/Y"); -->

<div class="container-mural">
    <div class="container text-center">
        <div class="row justify-content-md-center">

            <h1 class="pergunta"><b>Como você está se sentindo hoje?</b></h1>  

            <form action="{{ route('cademocao') }}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="ra" value="{{ $ra }}">

                <div class="caixa-emojis selecionar">

                    <input type="radio" id="felicidade" name="mood" value="felicidade">
                    <label for="felicidade">
                        <div class="card amarelinho" style="width: 18rem;">
                            <img src="{{ asset('img/happy.png') }}" class="card-img-top" alt="Felicidade">
                            <div class="card-body amarelinho">
                                <p class="card-text"><b>Felicidade</b></p>
                            </div>
                        </div>
                    </label>

                    <input type="radio" id="tristeza" name="mood" value="tristeza">
                    <label for="tristeza">
                        <div class="card amarelinho" style="width: 18rem;">
                            <img src="{{ asset('img/sad.png') }}" class="card-img-top" alt="Tristeza">
                            <div class="card-body amarelinho">
                                <p class="card-text"><b>Tristeza</b></p>
                            </div>
                        </div>
                    </label>

                    <input type="radio" id="raiva" name="mood" value="raiva">
                    <label for="raiva">
                        <div class="card amarelinho" style="width: 18rem;">
                            <img src="{{ asset('img/anger.png') }}" class="card-img-top" alt="Raiva">
                            <div class="card-body amarelinho">
                                <p class="card-text"><b>Raiva</b></p>
                            </div>
                        </div>
                    </label>

                    <input type="radio" id="confusao" name="mood" value="confusao">
                    <label for="confusao">
                        <div class="card amarelinho" style="width: 18rem;">
                            <img src="{{ asset('img/confused.png') }}" class="card-img-top" alt="Confusão">
                            <div class="card-body amarelinho">
                                <p class="card-text"><b>Confusão</b></p>
                            </div>
                        </div>
                    </label>

                    <input type="radio" id="medo" name="mood" value="medo">
                    <label for="medo">
                        <div class="card amarelinho" style="width: 18rem;">
                            <img src="{{ asset('img/fear.png') }}" class="card-img-top" alt="Medo">
                            <div class="card-body amarelinho">
                                <p class="card-text"><b>Medo</b></p>
                            </div>
                        </div>
                    </label>

                    <input type="radio" id="estresse" name="mood" value="estresse">
                    <label for="estresse">
                        <div class="card amarelinho" style="width: 18rem;">
                            <img src="{{ asset('img/stress.png') }}" class="card-img-top" alt="Estresse">
                            <div class="card-body amarelinho">
                                <p class="card-text"><b>Estresse</b></p>
                            </div>
                        </div>
                    </label>

                    <input type="radio" id="apaixonado" name="mood" value="apaixonado">
                    <label for="apaixonado">
                        <div class="card amarelinho" style="width: 18rem;">
                            <img src="{{ asset('img/inlove.png') }}" class="card-img-top" alt="Apaixonado">
                            <div class="card-body amarelinho">
                                <p class="card-text"><b>Apaixonade</b></p>
                            </div>
                        </div>
                    </label>

                    <input type="radio" id="animacao" name="mood" value="animacao">
                    <label for="animacao">
                        <div class="card amarelinho" style="width: 18rem;">
                            <img src="{{ asset('img/animation.png') }}" class="card-img-top" alt="Animação">
                            <div class="card-body amarelinho">
                                <p class="card-text"><b>Animação</b></p>
                            </div>
                        </div>
                    </label>
                </div>

                <button type="submit" class="btn btn-primary btn-lg reg">Registrar</button>            
            </form>    
        </div>
    </div>
</div>
@endsection