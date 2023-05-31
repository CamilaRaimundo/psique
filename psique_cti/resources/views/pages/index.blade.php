@extends('layout.site')

@section('titulo', 'Home')
    
@section('conteudo')
    
    {{-- <div class="parallax-container">
        <div class="parallax"><img src="{{ asset('img/aaa.jpg') }}"></div>
    </div>
    <div class="row">
        <div class="col s12 m5">
            <div class="card-panel teal">
                <span class="white-text">Aqui vai ficarão os textinhos explicativos do site 
                I am convenient because I require little markup to use effectively. I am similar to what is called a panel in other frameworks.
                </span>
            </div>
        </div>
    </div> --}}

    <div class="parallax-container">
        <div class="parallax"><img src="{{ asset('img/aaa.jpg') }}"></div>
    </div>
    <div class="section white">
        <div class="row container">
            <h2 class="header">Parallax</h2>
            <p class="grey-text text-darken-3 lighten-3">Parallax is an effect where the background content or image in this case, is moved at a different speed than the foreground content while scrolling.</p>
        </div>
    </div>
    <div class="parallax-container">
        <div class="parallax"><img src="{{ asset('img/aaa.jpg') }}"></div>
    </div>

    
    <div class="fixed-action-btn">
        <a class="btn-floating btn-large yellow">
            {{-- <i class="large material-icons">mode_edit</i> --}}
            <img src="{{ asset('img/icone.png') }}" width="50px" alt="">
        </a>
        <ul>
            <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a></li>
            <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
            <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
            <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
        </ul>
  </div>
          

@endsection