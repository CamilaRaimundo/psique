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

  <!-- Meu Javascript -->
  <script src="{{ asset('js/script.js') }}"></script>


  <script>
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
  </script>

   

  <!-- Javascript bootstrap -->
  <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  
  <!-- Compiled and minified JavaScript -->
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> --}}

</body>
</html>