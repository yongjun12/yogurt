<!DOCTYPE html>
<html>
<head>
  <title>Student General Info</title>

<?php include('include_file.php'); ?>

<style type="text/css"></style>
  <script>
    $(document).ready(function() {

      $('#dataTables').dataTable({
       "scrollY": "500px",
       "scrollX": true,
       "bScrollCollapse": true,
       "paging": true,
       "iDisplayLength" : 10
     });

      var table = $('#dataTables').DataTable();
      // Apply the search
      table.columns().eq( 0 ).each( function ( colIdx ) {
        $( 'input', table.column( colIdx ).footer() ).on( 'keyup change', function () {
            table
                .column( colIdx )
                .search( this.value )
                .draw();
        } );
      });
      // $('#dataTables tfoot th').each(function() {
      //   var idx = $(this).index()
      //   var title = $('#dataTables thead th').eq( idx ).text();
      //   $(this).html('<input type="text" placeholder="' + title + '"/>');
      //   })

    $('.clickCol').on('click', function(){
      var id = $(this).text();
      var url = "<? echo site_url('/student/get_detail') ?>/" + id;
      window.open(url);
    });
  });

  </script>
</head>
<body>
  <div class="container ">

    <?php include('nav.php'); ?>

    <h2 class="page-header">Student General Info</h2>
    <div class="table-responsive">
      <table id="dataTables" class="table table-hover">
        <thead>
          <tr>
            <?php
              foreach( $field as $item ) {
                echo "<th>" . $item . "</th>";
              }
            ?>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($record as $key => $value) {
            echo "<tr>" ;
            foreach ($value as $key2 => $item) {
              //  click on VNumber to direct to student detail page
              if($key2 == "VNumber") {
                echo '<td class="clickCol btn-link">' . $item . "</td>" ;
              } else {
                echo "<td>" . $item . "</td>" ;
              }
            }
            echo "</tr>" ;
          }     
          ?>

        </tbody>
        <tfoot>
          <tr>
            <?php 
            foreach ($field as $value) {
              echo '<th><input type="text" placeholder="' . $value . '"/></th>';
            }
            ?>  
          </tr>
      </tfoot>
      </table>
    </div>

  <?php include('footer.php') ?>
  </div>
</body>
</html>
