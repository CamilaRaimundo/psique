@extends('layout.site')

@section('titulo', 'Home')
    
@section('conteudo')
    
    <div class="wrapper">
        <main>
            <section class="module parallax parallax-1">
                <h1>Bem-vindo!</h1>
            </section>

            <section class="module content">
                <div class="container-parallax">
                    <h2>Sobre o projeto</h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore aliquid maxime ex sit, eum dolorem harum neque repellendus iste minima recusandae quos doloremque, numquam sunt? Mollitia saepe corporis architecto est.
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore aliquid maxime ex sit, eum dolorem harum neque repellendus iste minima recusandae quos doloremque, numquam sunt? Mollitia saepe corporis architecto est.
                    </p>
                </div>
            </section>    

            <section class="module parallax parallax-2">
                <h1>Equipe</h1>
            </section>

            <section class="module content">
                <div class="container-parallax">
                    <h2>Sobre nós</h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore aliquid maxime ex sit, eum dolorem harum neque repellendus iste minima recusandae quos doloremque, numquam sunt? Mollitia saepe corporis architecto est.
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore aliquid maxime ex sit, eum dolorem harum neque repellendus iste minima recusandae quos doloremque, numquam sunt? Mollitia saepe corporis architecto est.
                    </p>
                </div>
            </section>
            
        </main>
    </div>

    
    <div class="fixed-action-btn">
        <a class="btn-floating btn-large yellow">
            {{-- <i class="large material-icons">mode_edit</i> --}}
            <img src="{{ asset('img/icone.png') }}" width="50px" alt="">
        </a>
        <ul>
            <li><a class="btn-floating red"><i class="fa-regular fa-face-sad-cry"></i></a></li>
            {{-- <li><a class="btn-floating red"><i class="fa-regular fa-face-sad-cry"></i></a></li> --}}
            <li><a class="btn-floating #fbc02d yellow darken-2"><i class="fa-regular fa-face-meh"></i></a></li>
            {{-- <li><a class="btn-floating #fbc02d yellow darken-2"><i class="fa-regular fa-face-meh"></i></a></li> --}}
            <li><a class="btn-floating blue"><i class="fa-regular fa-face-smile"></i></a></li>            
            <li><a class="btn-floating green"><i class="fa-regular fa-face-laugh-wink"></i></a></li>
        </ul>
  </div>
          

@endsection