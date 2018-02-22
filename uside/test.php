<?php
    include("ACSEM/conn/connection.php");

    
?>

<?php
  if(!empty($_POST['checkbox'])){


    $a=$_POST['BookNo'];
    $b=$_POST['BookTitle'];

    $result = mysqli_query("INSERT INTO tblborrowedbooks (BookNo, BookTitle) VALUES ('$a', '$b')");
   

  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Library System</title>

<!-- Google fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>

<!-- font awesome -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<!-- bootstrap -->
<link rel="stylesheet" href="ACSEM/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="ACSEM/bootstrap/js/bootstrap.js" />

<!-- animate.css -->
<link rel="stylesheet" href="ACSEM/animate/animate.css" />
<link rel="stylesheet" href="ACSEM/animate/set.css" />

<!-- respond -->
<link rel="stylesheet" href="ACSEM/respond/respond.js">

<!-- wow -->
<link rel="stylesheet" href="ACSEM/wow/wow.min.css">

<!-- gallery -->
<link rel="stylesheet" href="ACSEM/gallery/blueimp-gallery.min.css">
<link rel="stylesheet" href="ACSEM/gallery/jquery.blueimp-gallery.min.js">

<!-- favicon -->
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">d

<!-- javascript -->
<link rel="stylesheet" href="assets/jquery.js" />
<link rel="stylesheet" href="assets/script.js" />


<link rel="stylesheet" href="css/book.css">
 <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed|Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 <script src="script.js"></script>

</head>

<body>
<div class="topbar animated fadeInLeftBig"></div>

<!-- Header Starts -->
<div class="navbar-wrapper">
      <div class="container">

        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="top-nav">
          <div class="container">
            <div class="navbar-header">
              <!-- Logo Starts -->
              <a class="navbar-brand" href="borrow.php"><img src="image/logo3.png" alt="logo"></a>
              <!-- #Logo Ends -->


              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

            </div>


            <!-- Nav Starts -->
            <div class="navbar-collapse  collapse">
              <ul class="nav navbar-nav navbar-right scroll">
                 <li ><a href="book_info.php">View Books</a></li>
                 <li class="active"><a href="borrow_book.php">Borrow Book</a></li>
                 <li ><a href="borrowed.php">Borrowed Books Information</a></li>
                 <li ><a href="book_returned.php">Return Books</a></li>
                 <li ><a href="login.php">Logout</a></li>
              </ul>
            </div>
            <!-- #Nav Ends -->

          </div>
        </div>

      </div>
    </div>
<!-- #Header Starts -->
    <br><br><br>
    <br><br>
     <h1>Books</h1>

     
     <div class="row">
       <div class="col-md-6">
         <table id="tablebarrow" class="table">
           <tr> 
             <th>Book No</th>
             <th>Book Name</th>
             <th>Action</th>
           </tr>

         </table>



       </div>
       <div class="col-md-6">
         <table id="tablelist" class="table">
           <tr> 
             <th>Book No</th>
             <th>Book Name</th>
             <th>Date Pub</th>
             <th>Action</th>
           </tr>

           <?php
                    $query = "SELECT * FROM tbl_departments";
                    $result = mysqli_query($link, $query);
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                      ?>

                        <td><?php echo $row['DepID'];?></td>
                        <td><?php echo $row['Depcode'];?></td>
                        <td><?php echo $row['Depdes'];?></td>
                        <td><button class="btn btn-primary" id="bot1" >Select</button></td>
                  
           
            <?php
            }

           ?>

         </table>

       </div>
     </div>
     <div class="row">
     <div class="form-group">
     <button class="btn btn-primary" id="save">Barrow</button>
     </div>
     </div>

    

</body>
</html>

<script>
                  $(document).ready(function(){
                    $(document).on("click", "#bot1", function() {
                      $(this).prop("disabled", true);
                      $(this).text("Added");
                    });
                   $("#tablelist").on('click','.btn',function(){
                         // get the current row
                        var currentRow=$(this).closest("tr"); 
                         
                        var col1=currentRow.find("td:eq(0)").html(); // get current row 1st table cell TD value
                        var col2=currentRow.find("td:eq(1)").html(); // get current row 2nd table cell TD value
                        var col3=currentRow.find("td:eq(2)").html(); // get current row 3rd table cell  TD value

                        var table = document.getElementById("tablebarrow");
                        var row = table.insertRow(-1);
                        var cell1 = row.insertCell(0);
                        var cell2 = row.insertCell(1);
                        var cell3 = row.insertCell(2);
                        

                        cell1.innerHTML = col1;
                        cell2.innerHTML = col2;
                        cell3.innerHTML = col3;
                        
                        cell4.innerHTML = '<button class="btn btn-primary"> Remove</button>';

                    });
                   
                  });

                  $('#save').click(function() {

                  var r = confirm("Are you sure you want to borrow this books?");
                  if (r == true) {

                    $("#tableborrw tr:gt(0)").each(function () {
                  
                    var this_row = $(this);
                    var bookid = $.trim(this_row.find('td:eq(0)').html());//td:eq(0) means first td of this row
                    var bookname = $.trim(this_row.find('td:eq(1)').html())
                    var bookpublish = $.trim(this_row.find('td:eq(2)').html())
                    
                    //alert( productId + " " +  product + " " + Quantity);

                    $.ajax({
                        type: 'POST',
                        url: 'save.php',
                        data: { BookID: bookid , BookName: bookname , BookPub: bookpublish  },
                        success: function(response) {
                            
                             $('#result').html(response);
                             refreshPage();

                        }
                    });



                   });


                  } else {
                      
                  }
                  });//end of button

                  function refreshPage(){
                           window.location.reload();
                  }
  
</script>

