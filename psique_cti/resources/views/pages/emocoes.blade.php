@extends('layout.site')

@section('titulo', 'MOOD')
    
@section('conteudo')

<div class="container-mural">
    <div class="container text-center">
        <div class="row justify-content-md-center">

            <div class="titulo-mural">
                <h1>Como você se sente hoje? 🤔</h1>  
            </div>  
            
            <div class="caixa-emojis">
                <div class="col-md-auto">
                    <div class="emoji">
                        <a href="#">Medo</a>
                    </div>
                </div>
                <div class="col-md-auto">
                    <div class="emoji">
                        <a href="#">Nojo</a>
                    </div>
                </div>
                <div class="col-md-auto">
                    <div class="emoji">
                        <a href="#">Raiva</a>
                    </div>
                </div>
                <div class="col-md-auto">
                    <div class="emoji">
                        <a href="#">Felicidade</a>
                    </div>
                </div>
                <div class="col-md-auto">
                    <div class="emoji">
                        <a href="#">Tristeza</a>
                    </div>
                </div>
                <div class="col-md-auto">
                    <div class="emoji">
                        <a href="#">Surpresa</a>
                    </div>
                </div>
            </div>
            {{-- medo, nojo, raiva, surpresa, felicidade e tristeza --}}
        </div>

        <button>Registrar</button>

    </div>
</div>
@endsection