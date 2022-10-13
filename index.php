<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Multiple Data Insert</title>
  </head>
  <body>
      <div class="container">
          <!-- start for multiple insert  -->
          <form method="post" id="all_field">
          <table class="table table-bordered" id="table-field">
              <tr>
                  <th>Fname</th>
                  <th>City</th>
                  <th>Age</th>
                  <th>Add or Remove</th>
              </tr>
             
              <tr>
                  <td>
                      <input type="text" name="fname[]" id="fname" class="form-control">
                  </td>
                  <td>
                      <input type="text" name="city[]" id="city" class="form-control">
                  </td>
                  <td>
                      <input type="text" name="age[]" id="age" class="form-control">
                  </td>
                  <td>
                      <input type="submit" name="add" class="form-control btn btn-primary" id="add" value="Add"> 
                  </td>
              </tr>
          </table>
          <input type="submit" id="save" name="save" class="btn btn-success" onclick="save()">
        </form>
        <!-- end for multiple insert  -->
        <!-- start for show data  -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id: </th>
                    <th>Name: </th>
                    <th>City: </th>
                    <th>Age: </th>
                </tr>
            </thead>
            <tbody id="show_value">

            </tbody>
        </table>
        <!-- end for show data  -->
      </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <!-- start jquery and ajax  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- end jquery and ajax  -->
    <!-- start multiple value insert  -->
    <script>
        $(document).ready(function() {
            var html = '<tr><td><input type="text" name="fname[]" id="fname" class="form-control"></td><td><input type="text" name="city[]" id="city" class="form-control"></td><td><input type="text" name="age[]" id="age" class="form-control"></td><td><input type="submit" name="remove" class="form-control btn btn-danger" id="remove" value="Remove"></td></tr>';
            var max = 5;
            var x = 1;
            $("#add").click(function(e) {
                e.preventDefault();
                if(x <= max) {
                    $("#table-field").append(html);
                    x++;
                }
            });
            $("#table-field").on('click','#remove',function(){
                $(this).closest('tr').remove();
                x--;
            });
            // start for save multiple data 
            $("#save").click(function(e){
                e.preventDefault();
                $.ajax({
                    url: "multiple.php",
                    method: "POST",
                    data: $("#all_field").serialize(),
                    success: function(data) {
                        save();
                    }
                });
            });
            // end for save multiple data 
        });
        // start for show data 
        function save() {
            $.ajax({
                url: "read.php",
                method: "POST",
                success: function(data) {
                    $("#show_value").html(data);
                }
            });
        }

        // end for show data 
        </script>
    <!-- end multiple value insert  -->
    
  </body>
</html>