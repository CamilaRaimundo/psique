  {{-- <footer class="page-footer">
      <div class="container">
        <div class="row">
          <div class="col l6 s12">
            <h5 class="white-text">Rodapé legal</h5>
            <a href="psique.cti@gmail.com"></a>
          </div>
          <div class="col l4 offset-l2 s12">
            <h5 class="white-text">Navegação</h5>
            <ul>
              <li><a class="grey-text text-lighten-3" href="#!">Home</a></li>
              <li><a class="grey-text text-lighten-3" href="#!">Mural</a></li>
              <li><a class="grey-text text-lighten-3" href="#!">Contato</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="footer-copyright">
        <div class="container">
        © 2023 Colégio Técnico Industrial "Prof. Isaac Portal Róldan"
        <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
        </div>
      </div>
  </footer> --}}


  <footer>
    <div class="img-footer">
      <img src="{{ asset('img/icone_sf.png') }}" alt="nicolau" width="80px">
    </div>

    <div class="navegacao">
      <a href="/index">Home</a>
      
      <span>|</span>

      <a href="/mural">Mural</a>

      <span>|</span>

      <a href="/contato">Contato</a>

      <span>|</span>

      <a href="/login">Login</a>
    </div>

    <div class="copyright">
      © 2023 Colégio Técnico Industrial "Prof. Isaac Portal Róldan"
    </div>
  </footer>

  {{-- <footer>
    <div class="grid text-center">

      <div class="g-col-6 g-col-md-4">
        <div class="a">
          <a href="/index">Home</a>
          
          <span>|</span>
    
          <a href="/mural">Mural</a>
    
          <span>|</span>
    
          <a href="/contato">Contato</a>
          
        </div>
      </div>

      <div class="g-col-6 g-col-md-4">
        <img src="{{ asset('img/logo_completa_sf.png') }}" alt="psiquê">
      </div>

      <div class="g-col-6 g-col-md-4">
        <p>© 2023 Colégio Técnico Industrial "Prof. Isaac Portal Róldan"</p>
      </div>
    </div>
  </footer> --}}


  {{-- Import JS --}}
  {{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('.parallax');
      var instances = M.Parallax.init(elems, options);
    });

    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('.fixed-action-btn');
      var instances = M.FloatingActionButton.init(elems, options);
    });

    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('.fixed-action-btn');
      var instances = M.FloatingActionButton.init(elems, {
        direction: 'left',
        hoverEnabled: false
      });
    });
  </script> --}}

  <script>
    const button = document.querySelector('button')
    const popup = document.querySelector('.popup-wrapper')
    // const closeButton = document.querySelector('.popup-close')

    button.addEventListener('click', () => {
      popup.style.display = 'block'
    })

  // closeButton.addEventListener('click', () => {
  //   popup.style.display = 'none'
  // })

    popup.addEventListener('click', event => {
      // com a constante criada com essa função pode-se encontar o nome da classe de um elemnto clicadio, exibindo uma lista de informações do elemento, uma espécie de array, com a adição do '[0]', encontramos a classe de nível 0 
      const classNameOfClickedElement = event.target.classList[0]
      const classNames = ['popup-close', 'popup-wrapper']
      const shouldClosePopup = classNames.some(className => className === classNameOfClickedElement) 
      
      if(shouldClosePopup){
        popup.style.display = 'none'
      }
    })
  </script>

  <!-- Meu Javascript -->
   <script src="{{ asset('js/app.js') }}"></script>
   <script>
    function validaOpcoes(event) {
        var opano = document.getElementById("ano");
        var opcurso = document.getElementById("curso");

        if (opano.value === "0" || opcurso.value === "0") {
            event.preventDefault(); // Impede o envio do formulário
            alert("Selecione uma opção válida para ano e curso.");
        }
    }

    function validaIdade(event) {
        const birthdateInput = document.getElementById("dataNasc");
        const birthdate = birthdateInput.value;
        const minAge = 13;
        const maxAge = 100;

        if (calculateAge(birthdate) < minAge) {
            event.preventDefault(); // Impede o envio do formulário
            alert("Você deve ter pelo menos 13 anos para enviar o formulário.");
        } else if (calculateAge(birthdate) > maxAge) {
            event.preventDefault(); // Impede o envio do formulário
            alert("Você deve ter menos de 100 anos para enviar o formulário.");
        }
    }

    function calculateAge(data_nascimento) {
        const today = new Date();
        const birthDate = new Date(data_nascimento);
        let age = today.getFullYear() - birthDate.getFullYear();
        const month = today.getMonth() - birthDate.getMonth();
        if (month < 0 || (month === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        return age;
    }

    document.getElementById("myForm").addEventListener("submit", function(event) {
        validaOpcoes(event);
        validaIdade(event);
    });
  </script>



  <!-- Javascript bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  
  <!-- Compiled and minified JavaScript -->
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> --}}

</body>
</html>