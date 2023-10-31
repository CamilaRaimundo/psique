@extends('layout.site')

@section('titulo', 'Home')
    
@section('conteudo')

    {{-- if(sem notificações) --}}
    {{-- <div class="pagina_vazia">
        <h3>Não há nenhuma notificação :&#040;</h3>
        <p>Volte em breve para conferir!</p>
        <img src="{{ asset('img/pipa-img.png') }}" width="35%" alt="">
    </div> --}}

    {{-- else(com notificações) --}}

    <div class="container-home_pro">
        <div class="box_notificacao">
            <h1>Notificações</h1>
            <div class="notificacao">
                <i class="fa-solid fa-bell"></i>
                <p class="secao-ocultar">Nome do indivíduo</p>
                <div>
                    <a href="/detalhesaluno" class="icones-padrao"><i class="fa-sharp fa-solid fa-eye"></i></a>
                    <a href="#" class="icones-padrao"><i class="fa-sharp fa-solid fa-circle-check"></i></a>
                </div>
            </div>
            <div class="notificacao">
                <i class="fa-solid fa-bell"></i>
                <p class="secao-ocultar">Nome do indivíduo</p>
                <div>
                    <a href="/detalhesaluno" class="icones-padrao"><i class="fa-sharp fa-solid fa-eye"></i></a>
                    <a href="#" class="icones-padrao"><i class="fa-sharp fa-solid fa-circle-check"></i></a>
                </div>
            </div>
            <div class="notificacao">
                <i class="fa-solid fa-bell"></i>
                <p class="secao-ocultar">Nome do indivíduo</p>
                <div>
                    <a href="/detalhesaluno" class="icones-padrao"><i class="fa-sharp fa-solid fa-eye"></i></a>
                    <a href="#" class="icones-padrao"><i class="fa-sharp fa-solid fa-circle-check"></i></a>
                </div>
            </div>
        </div>

        <div class="box_exibe_notificacao">
            <iframe width="100%" src="/detalhesaluno"></iframe>        
        </div>
    </div> {{-- container padrão --}}
@endsection