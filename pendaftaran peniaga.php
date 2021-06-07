<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>pendaftaran peniaga</title>


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

<title>PENDAFTARAN PENIAGA</title>
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  	<a class="navbar-brand" href="mainPage.php">O.F.I.C </a>
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    	<span class="navbar-toggler-icon"></span>
  	</button>
   </nav>

   <h1>PENDAFTARAN</h1>
<br>

<form method="post" name="register" onsubmit="return formValidation">

  SELLER ID:<br />
  <input type="text" name="sellerId"><br>
  NAMA PENIAGA:<br />
  <input type="text" name="namaPeniaga"><br>
  NAMA SYARIKAT:<br />
  <input type="text" name="namaSyarikat"><br>
  EMAIL SYARIKAT:<br />
  <input type="text" name="emailSyarikat"><br>
  NO TELEFON:<br />
  <input type="text" name="noTelefon"><br>
  ALAMAT SYARIKAT:<br />
  <input type="text" name="alamatSyarikat"><br>
  KATA LALUAN:<br />
  <input type="password" name="kataLaluan" required=""><br>
  <br>
  <br>
  <input type="submit" name="register" value="Register">
  <br>
  <br>
</form>

<?php
  include 'connection.php';

  if (isset($_POST['register'])){
      $sellerId = $_POST['sellerId'];
      $namaPeniaga = $_POST['namaPeniaga'];
      $namaSyarikat = $_POST['namaSyarikat'];
      $emailSyarikat = $_POST['emailSyarikat'];
      $noTelefon = $_POST['noTelefon'];
      $alamatSyarikat = $_POST['alamatSyarikat'];
      $kataLaluan = $_POST['kataLaluan'];

  if(!$conn)
    die("connection failed : ".mysqli_connect_error());


    if(isset($sellerId)){
    $sql = "INSERT INTO peniaga (sellerId , namaPeniaga , namaSyarikat , emailSyarikat , noTelefon , alamatSyarikat , kataLaluan)
            VALUES ('$sellerId' , '$namaPeniaga' , '$namaSyarikat' , '$emailSyarikat' , '$noTelefon' , '$alamatSyarikat' , '$kataLaluan')";

    if(mysqli_query($conn,$sql))
      echo"data inserted succesfully";
    else
      die("data not inserted :". mysqli_error($conn));

    mysqli_close($conn);
    }
  }


?>

</body>
</html>
