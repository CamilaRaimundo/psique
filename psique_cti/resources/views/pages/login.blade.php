@extends('layout.site')

@section('titulo', 'Login')
    
@section('conteudo')
    <div class="container_login"> 
        <div class="login_img">
            <img src="{{ asset('img/login-img.png') }}" alt="">    
        </div>
        
        <div class="caixa_login_1">
            <div class="caixa_login_2">
                <h2>Login</h2>
                <div class="linha"></div>
                <p>Bem-vind<img src="{{ asset('img/icone_sf.png') }}"></p>
            </div>
        </div>
    </div>
@endsection
