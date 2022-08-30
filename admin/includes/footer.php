<!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By
         <a href="#"> BenueKonnect </a>
      </p>
    </div>
    <P style="background-color: gray;"> <a href="https://html.design/">Designed by MarcConnect </a></P>
  </footer>
  <!-- footer section -->

  <!-- jQery -->
  <script src="../js/jquery-3.4.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="../js/bootstrap.js"></script>
  <!-- custom js -->
  <script src="../js/custom.js"></script>
   <script src="../js/customform.js"></script>
    <script src="../nav.js"></script>
     <script src="../js/DataTables/datatables.min.js"></script>
        <script>
            $(function($) {
                $('#example').DataTable();

                $('#example2').DataTable( {
                    "scrollY":        "300px",
                    "scrollCollapse": true,
                    "paging":         false
                } );

                $('#example3').DataTable();
            });
        </script>


</body>

</html>