<?php
    require 'database.php';
    $id = 0;
     
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( !empty($_POST)) {
       
        $id = $_POST['id'];
         
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM customers  WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
        header("Location: index.php");
         
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MT4 Networks</title>

    <!-- Bootstrap Core CSS -->
    <link   href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
      body {
         padding-top: 150px;
         overflow-x: hidden;
      }
      img {
        display: block;
        max-width:80px;
        max-height:80px;
        width: auto;
        height: auto;
      }
    </style>
</head>

  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <ul class="nav navbar-nav">
                    <li>
                       <a class="brand" href="#"><img src="img/logo-mt4networks3.png" /></a>
                    </li>
                    <li style="margin-top:30px;">
                       <a href="#">Gerenciamento das Informações do Cliente</a>
                    </li>
                </ul>
            </div>
    </nav>

    <!-- Page Content -->
   <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Deletar Registro</h3>
                    </div>
                     
                    <form class="form-horizontal" action="delete.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $id;?>"/>
                      <p class="alert alert-error">Deseja realmente deletar o cadastro?</p>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-danger">Sim</button>
                          <a class="btn btn-default" href="index.php">Não</a>
                        </div>
                    </form>
                </div>   
    </div> <!-- /container -->
    <hr>
    <!-- Footer -->
    <footer>
       <div class="row">
         <div class="col-lg-12">
          <ul class="nav nav-pills nav-justified">
            <li></li>
            <li><a href="#"><i class="glyphicon glyphicon-copyright-mark"> MT4 Networks</i></a></li> 
            <li></li>
           </ul>
          </div>
        </div> 
    </footer>
    <!-- Footer -->

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
