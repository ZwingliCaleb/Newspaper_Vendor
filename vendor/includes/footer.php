<footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Caleb Zwingli &copy;2021</div>
                           
                        </div>
                    </div>
                </footer>
            </div>
        </div>
       
        <script src="../styles/js/bootstrap.bundle.min.js"></script>
        <!--
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
-->
        <script src="../styles/js/scripts.js"></script>
        <script src="../styles/js/valid.js"></script>
          <!--
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
      -->
      <script src="../styles/js/jquery.min.js"></script>
      <!--
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
-->

<script>


// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()

</script>
    <script>
    $(".alert").delay(1000).slideUp(700, function() {
    $(this).alert('close');
});
</script>
        <script src="../styles/js/chart.min.js"></script>
        <script src="../styles/assets/demo/chart-area-demo.js"></script>
        <script src="../assets/demo/chart-bar-demo.js"></script>
        <script src="../styles/js/datatables.js"></script>
        <script src="../styles/js/script.js"></script>
        <script src="../styles/js/myjs.js"></script>
        <!--
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
-->
        <script src="../styles/js/datatables-simple-demo.js"></script>
    </body>
</html>
