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
                    {{-- <p>A Psiquê surgiu com uma preocupação geral à respeito da saúde mental no âmbito escolar. Acreditamos que a escola é um ambiente em que passamos muito tempo, e por isso, deve ser agradável e acolhedora. A presença de uma psicóloga se torna indispensável para garantir que isso ocorra da melhor forma possível, atenuando a pressão e a ansiedade cotidianas.</p> 
                    <p>Para isso, o nosso site procura proporcionar uma interação dinâmica entre os alunos e o (a) Psicólogo (a), através de uma Triagem, para que este profissional conheça o cenário em que esses jovens e adolescentes estão inseridos e possa ajudá-los durante esses encontros pontuais. Além disso, também trabalhamos com uma análise diária de sentimentos que pode ser preenchida, de preferência ao final do dia, complementando a Triagem que foi preenchida após o cadastro! Por fim, facilitamos a acessibilidade com esse profissional através do E-mail, na página 'Contatos', e do botão 'Alerta' para notificar encontros de maior urgência.</p>     --}}
                    {{-- <p>Desse modo, esperamos que a experiência seja  ------------------</p> --}}
                    <p>A Psiquê surgiu com uma preocupação geral a respeito da saúde mental no âmbito escolar. Acreditamos que a escola é um ambiente em que passamos muito tempo, e por isso, deve ser agradável e acolhedor. A presença de uma psicóloga se torna indispensável para garantir que isso ocorra, atenuando a pressão e a ansiedade cotidianas.</p>
                    <p>Para isso, o nosso site procura proporcionar uma interação dinâmica entre os alunos e o (a) Psicólogo (a), através de uma Triagem, para que este profissional conheça o cenário em que esses jovens e adolescentes estão inseridos e possa ajudá-los durante esses encontros pontuais. Além disso, também trabalhamos com uma análise diária de sentimentos que pode ser preenchida, de preferência ao final do dia, complementando a Triagem realizada após o cadastro! Por fim, facilitamos a acessibilidade com o profissional através do E-mail, na página 'Contatos', e do botão 'Alerta' para notificar encontros de maior urgência. </p>
                    <p>Desse modo, esperamos que a experiência ocorra da melhor forma possível.</p>
                    <p>Sinta-se em casa!</p>
                </div>
            </section>    

            <section class="module parallax parallax-2">
                <h1>Equipe</h1>
            </section>

            <section class="module content">
                <div class="container-parallax">
                    <h2>Sobre nós</h2>
                    {{-- <p>Bem-vindo(a) a Psiquê!</p>
                    <p>Somos uma equipe formada por sete alunos, concluintes do ensino médio e do curso de Informática, do Colégio Técnico Industrial "Prof. Isaac Portal Roldán" - UNESP. Esperamos que o nosso site possa auxiliar alunos e profissionais da área de psicologia, e a saúde mental estudantil como um todo.</p>
                    <p>Desejamos que você se sinta confortável e se beneficie dos recursos disponíveis na nossa plataforma. Por isso, nos esforçamos para criar uma experiência agradável e intuitiva, facilitando a busca por informações e o compartilhamento de conteúdo. Estamos sempre abertos a sugestões e feedbacks, pois acreditamos que a melhoria contínua é essencial para oferecer a melhor experiência possível.</p>    
                    <p>Atenciosamente, Equipe Psiquê 💙💛</p>     --}}
                    <p>Bem-vindo(a) a Psiquê!</p>
                    <p>Somos uma equipe formada por sete alunos, concluintes do ensino médio e do curso de Informática, do Colégio Técnico Industrial "Prof. Isaac Portal Roldán" - UNESP. Esperamos que o nosso site possa auxiliar alunos e profissionais da área de psicologia, e a saúde mental estudantil como um todo.</p>
                    <p>Desejamos que você se sinta confortável e se beneficie dos recursos disponíveis na nossa plataforma. Por isso, nos esforçamos para criar uma experiência agradável e intuitiva, facilitando a busca por informações e o compartilhamento de conteúdo. Estamos sempre abertos a sugestões e feedbacks, pois acreditamos que a melhoria contínua é essencial para oferecer a melhor experiência possível.</p>
                    <p>Atenciosamente, Equipe Psiquê 💙💛</p>
                </div>
            </section>
            
        </main>
    </div>

    
    {{-- <div class="fixed-action-btn">
        <a class="btn-floating btn-large yellow">
            <img src="{{ asset('img/icone.png') }}" width="50px" alt="">
        </a>
        <ul>
            <li><a class="btn-floating red"><i class="fa-regular fa-face-sad-cry"></i></a></li>
            <li><a class="btn-floating #fbc02d yellow darken-2"><i class="fa-regular fa-face-meh"></i></a></li>
            <li><a class="btn-floating blue"><i class="fa-regular fa-face-smile"></i></a></li>            
            <li><a class="btn-floating green"><i class="fa-regular fa-face-laugh-wink"></i></a></li>
        </ul>
    </div> --}}
          

@endsection