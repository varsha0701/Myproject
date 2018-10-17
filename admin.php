<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Panel</title>
  <meta charset="utf-8">

  <style>
  

  table {

    border-collapse: collapse;
    width: 50%;
    color: #d96459;
    font-family: monospace;
    font-size: 20px;
    text-align: left;
  }

  th
  {
    background-color: #d96459;
    color: white;
  }

  tr:nth-child(even) {background-color: #f2f2f2;}
</style>

</head>
<body>



<div class="container">
    <br><h4 class="text-center text-primary">WEBDEVELOPER QUIZ ADMIN PANEL</h4><br> 

    <div class="m-auto d-block">

<a href="admin_login.php" class="btn btn-primary ">LOGOUT</a></div><br>


<div class="row">


              <table id="basicTable" class="table table-striped table-bordered responsive myDatatable">
              
                  <tr>
                    <th>Uid</th>
                    <th>UserName</th>
                    <th>TotalQuestion</th>
                    <th>AnswerCorrect</th>
                    
                  </tr> 
                  <?php

                  
                      $con = mysqli_connect('localhost','root');

                      mysqli_select_db($con,'quizdbase');

                      $sql = "SELECT uid, username,totalques,answerscorrect from user";


                      $result = $con-> query($sql);


                      if($result-> num_rows >0){
                        while($row = $result-> fetch_assoc()) {

                          echo "<tr><td>".$row["uid"]."</td><td>".$row["username"]."</td><td>".$row["totalques"]."</td><td>".$row["answerscorrect"]."</td></tr>";
                        }
                        echo "</table>";

                      }

                      else
                      {
                        echo "0 result";
                      }

                      $con-> close();


                   ?>
              
                
              
              </table>

            </div>

       
</div>

    
</body>
</html>
