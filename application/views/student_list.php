<!DOCTYPE html>
<html>
<head>
  <title>Student General Info</title>

<?php include('include_file.php'); ?>

<style type="text/css"></style>
  <script>
    $(document).ready(function() {

      var table = $('#dataTables').dataTable({
       "scrollY": "500px",
       "scrollX": true,
       "bScrollCollapse": true,
       "paging": true,
       "iDisplayLength" : 10
     });

    $('.clickCol').on('click', function(){
      var id = $(this).text();
      window.location.href = "/yogurt/student/get_detail/" + id ;
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
      </table>
    </div>

  <?php include('footer.php') ?>
  </div>
</body>
</html>
