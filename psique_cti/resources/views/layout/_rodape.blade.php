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

  {{-- -----------------------------POP-UP------------------------------- --}}
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

  {{-- ----------------------------------TRIAGEM----------------------------------------- --}}
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
  </script>

  <!-- Javascript -->
  <script src="{{ asset('js/app.js') }}"></script>
  
  <!-- Javascript bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  
  <!-- Compiled and minified JavaScript -->
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> --}}

</body>
</html>