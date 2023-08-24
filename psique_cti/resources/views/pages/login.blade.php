@extends('layout.site')

@section('titulo', 'Login')
    
@section('conteudo')
    <div class="container_login centralizado"> 

        <div class="box_img1 secao-ocultar">
            <img src="{{ asset('img/login-img.png') }}" alt="">    
        </div>
        
        <div class="login_caixas">
            <div class="caixa_login_1">
                <div class="caixa_login_2">
                    <div class="conteudo_login">
                        <h2>Login</h2>
                        <div class="linha-branca"></div>
                        <p>Bem-vind<img src="{{ asset('img/icone_sf.png') }}"></p>
                        <div id="buttonDiv"></div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection
