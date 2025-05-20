  <hr>
  <footer class="footer">
    <p>© CVO-Volt Leuven <?= date('Y') ?></p>
  </footer>

  </div> <!-- /container -->
  </body>

  <!-- JQUERY AND BOOTSTRAP w/ POPPPER -->
  <script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <!-- END JQUERY AND BOOTSTRAP w/ POPPPER -->

  <!-- dataTables -->
  <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript">
    $(function() {
      $(".dataTable").DataTable({
        "pageLength": 25,
        "responsive": true,
        select: true,
        paging: true,
        dom: 'Bfrtip',
        buttons: [
          'copy', 'csv', 'excel', 'pdf', 'print'
        ]
      });
    });
  </script>

  </html>