<?php
     
    require 'database.php';
 
    if ( !empty($_POST)) {
        $nameError = null;
        $emailError = null;
        $mobileError = null;
         
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
         
        // Validação dos campos
        $valid = true;
        if (empty($name)) {
            $nameError = 'O campo nome está vazio.';
            $valid = false;
        }
         
        if (empty($email)) {
            $emailError = 'O campo e-mail está vazio.';
            $valid = false;
        } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            $emailError = 'E-mail inválido!';
            $valid = false;
        }
         
        if (empty($mobile)) {
            $mobileError = 'O campo telefone está vazio.';
            $valid = false;
        }
         
        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO customers (name,email,mobile) values(?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($name,$email,$mobile));
            Database::disconnect();
            header("Location: index.php");
        }
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
                        <h3>Cadastrar Novo Cliente</h3>
                    </div>
             
                    <form class="form-horizontal" action="create.php" method="post">
                      <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                        <label class="control-label">Nome</label>
                        <div class="controls">
                            <input name="name" type="text" value="<?php echo !empty($name)?$name:'';?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
                        <label class="control-label">E-mail</label>
                        <div class="controls">
                            <input name="email" type="text" value="<?php echo !empty($email)?$email:'';?>">
                            <?php if (!empty($emailError)): ?>
                                <span class="help-inline"><?php echo $emailError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($mobileError)?'error':'';?>">
                        <label class="control-label">Telefone</label>
                        <div class="controls">
                            <input name="mobile" type="text" value="<?php echo !empty($mobile)?$mobile:'';?>">
                            <?php if (!empty($mobileError)): ?>
                                <span class="help-inline"><?php echo $mobileError;?></span>
                            <?php endif;?>
                        </div>
                      </div></br>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Cadastrar</button>
                          <a class="btn btn-default" href="index.php">Voltar</a>
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
