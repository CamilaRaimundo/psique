
  <footer class="page-footer">
      <div class="container">
        <div class="row">
          <div class="col l6 s12">
            <h5 class="white-text">Rodapé legal</h5>
            <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
          </div>
          <div class="col l4 offset-l2 s12">
            <h5 class="white-text">Navegação</h5>
            <ul>
              <li><a class="grey-text text-lighten-3" href="#!">Home</a></li>
              <li><a class="grey-text text-lighten-3" href="#!">Mural</a></li>
              <li><a class="grey-text text-lighten-3" href="#!">Agenda</a></li>
              {{-- <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li> --}}
            </ul>
          </div>
        </div>
      </div>
      <div class="footer-copyright">
        <div class="container">
        © 2014 Copyright Text
        <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
        </div>
      </div>
  </footer>

  <script>
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
  </script>
  
  <!-- Javascript bootstrap -->
  <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</body>
</html>