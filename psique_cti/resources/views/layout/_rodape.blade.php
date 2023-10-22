  <footer>
    <div class="img-footer">
      <img src="{{ asset('img/icone_sf.png') }}" alt="nicolau" width="80px">
    </div>

    <div class="navegacao">
      @if((Auth::check()))
        @if(Auth::user()->nivel_de_acesso==-1)  
          <a href="{{route('home_admin')}}">Profissionais</a>
    
          <span>|</span>
    
          <a href="{{route('listarAlunos.mostrar')}}">Alunos</a>
    
        @elseif(Auth::user()->nivel_de_acesso==1)  
          <a href="{{route('home')}}" id="home">Home</a>
    
          <span>|</span>
    
          <a href="{{route('mural.mostrar')}}" id="n-mural">Mural</a>
    
          <span>|</span>
    
          <a href="{{route('contato.mostrar')}}" id="n-contato">Contato</a>
    
        @elseif(Auth::user()->nivel_de_acesso==2)  
          <a href="{{route('home_psico')}}"><i class="fa-solid fa-house"></i></a>
    
          <span>|</span>
    
          <a href="{{route('mural.mostrar')}}"><i class="fa-solid fa-calendar-days"></i></a>
    
          <span>|</span>
    
          <a href="/estatisticas"><i class="fa-solid fa-chart-pie"></i></a>
    
          <span>|</span>
    
          <a href="/encontros"><i class="fa-solid fa-pencil"></i></a>
    
        @endif 
    
      @else
        <a href="{{route('home')}}" id="home">Home</a>
    
        <span>|</span>
    
        <a href="{{route('mural.mostrar')}}" id="n-mural">Mural</a>
    
        <span>|</span>
    
        <a href="{{route('login.mostrar')}}" id="n-contato">Contato</a>
      @endif
    </div>

    <div class="copyright">
      © 2023 Colégio Técnico Industrial "Prof. Isaac Portal Róldan"
    </div>
  </footer>

  
  {{-- ----------------------------------Isabelli----------------------------------------- --}}
  <script>
    //triagem
    function requerido() {
      var opmed = document.getElementById("inputGroupSelect02");
      var campoMedicamento = document.getElementById("medicamento");
      var idMedic = document.getElementById("idMedic");
  
      if (opmed.value === "1-sim") {
        idMedic.style.display = "block";
        campoMedicamento.setAttribute("required", "required");
      } else {
        idMedic.style.display = "none";
        campoMedicamento.removeAttribute("required");
      }
    }

    function verificarEnvio(event) {
      var opacomp = document.getElementById("inputGroupSelect01");
      var opmed = document.getElementById("inputGroupSelect02");

      if (opacomp.value === "3-escolha" || opmed.value === "3-escolha") {
        event.preventDefault(); // Impede o envio do formulário
        alert("Selecione uma opção válida sobre o acompanhamento psicológico e o uso de medicamentos antes de enviar o formulário.");
      }
    }

    adicionar e editar artigo!!!!
    document.addEventListener("DOMContentLoaded", function() {
      const form = document.querySelector("form");

      form.addEventListener("submit", function(event) {
        event.preventDefault();

        const formData = new FormData(form);

        // Check if the author field contains only letters
        const authorField = formData.get("autor_publicacao");
        const containsOnlyLetters = /^[A-Za-z\s]+$/.test(authorField);

        if (!containsOnlyLetters) {
          // If it contains non-letter characters, show the alert and prevent form submission
          alert("O campo do autor deve conter apenas letras.");
        } 
        
        else{
          // If it contains only letters, proceed with form submission
          fetch(form.getAttribute("action"), {
            method: "POST",
            body: formData,
            headers: {
              'X-CSRF-TOKEN': '{{ csrf_token() }}', // Include CSRF token
            },
          })
          .then(response => response.json())
          .then(data => {
            // Rest of your code for handling success and errors
          })
          .catch(error => {
            console.error("Error:", error);
          });
        }
      });
    });
  </script>

  {{-- ---------------------------------------LUIZA---------------------------------- --}}
  

  <!-- Javascript -->
  <script src="{{ asset('js/app.js') }}"></script>
  
  <!-- Javascript bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  
  <!-- Compiled and minified JavaScript -->
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> --}}

</body>
</html>
