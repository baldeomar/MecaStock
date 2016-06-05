<?php
    session_start();
    if(isset($_SESSION['login']) && isset($_SESSION['password']) && isset($_SESSION['role'])
        && !empty($_SESSION['login']) && !empty($_SESSION['password']) && !empty($_SESSION['role'])){
        header('Location: home.php');
        exit();
    }
?>
<html>
    <head>
		<title>Login</title>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" href="css/main.css">
	</head>
	<body>
		<div class="container">
            <div class="Absolute-Center is-Responsive">
                <div id="logo-container"></div>
                <div class="col-sm-12 col-md-10 col-md-offset-1">
                                    <h1>Identification</h1>
                                    <?php
                                        if(isset($_GET['error'])){
                                            echo "<div class='has-error'>";
                                            echo "Erreur d'authentification! Veuillez réessayer";
                                            echo "</div>";
                                        }else if(isset($_GET['session_timeout'])){
                                            echo "<div class='has-error'>";
                                            echo "Votre session a expir&eacute;, Veuillez vous reconnecter";
                                            echo "</div>";
                                        }
                                    ?>

                    <form method="post" action="home.php">
                        <div class="form-group input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>
                            <input class="form-control" type="text" name="login" value="" placeholder="LOGIN" autocomplete="off"/>
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-lock"></i>
                            </span>
                            <input class="form-control" type="password" name="password" value="" placeholder="PASSWORD" autocomplete="off"/>
                        </div>
                        <div class="form-group">
                            <button type="SUBMIT" class="btn btn-def btn-block">Login</button>
                        </div>
                    </form>
                </div>
            </div>
		</div>
	</body>
</html>