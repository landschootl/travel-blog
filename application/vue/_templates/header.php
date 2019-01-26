<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Marathon</title>
	<link href="<?php echo URL; ?>public/css/css.css" rel="stylesheet">
	<link href="<?php echo URL; ?>public/css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo URL; ?>public/css/application-polaroid.css" media="screen" rel="stylesheet"/>
	<link href="<?php echo URL; ?>public/css/foundicons-polaroid.css" media="screen" rel="stylesheet"/>
	<link href="<?php echo URL; ?>public/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo URL; ?>public/css/jumbotron.css" rel="stylesheet">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script src="<?php echo URL; ?>public/js/custom.modernizr-polaroid.js"></script>
	<script src="<?php echo URL; ?>public/js/bootstrap.js"></script>
    <script src="<?php echo URL; ?>public/js/bootstrap.min.js"></script>
    <script src="<?php echo URL; ?>public/js/js/npm.js"></script>
    <script src="<?php echo URL; ?>public/js/nav.js"></script>
    
</head>
<header class="banniere">
<img src="<?php echo URL; ?>public/images/banniere.png" id="banniere" alt=""/>
</header>
<body> 
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
		
		
        <div id="navbar" class="navbar-collapse collapse">
		 <form class="navbar-form navbar-left" role="form">
		 	<div class="form-group">
              <input type="text" placeholder="Recherche" class="form-control">
            </div>
			<button type="submit" class="btn btn-success">Recherche</button>
		 </form>

          <?php if(Session::get('user_logged_in')){ ?>
          <form class="navbar-form navbar-right" role="form">
		 	<ul class='nav navbar-nav'>
		 	<li><h4>Bonjour <?php echo $_SESSION['user_name']?></h4></li>
            <li><a href='<?php echo URL; ?>trip/mesVoyages'>Mes voyages</a></li>
            <li><a href='<?php echo URL; ?>login/showprofile'>Paramètres</a></li>
            <li><a href='<?php echo URL; ?>login/logout'>Déconnexion</a></li>
			</ul>
		  </form>
		 <?php } else{ ?>
		<div class="navbar-form navbar-right" role="form">
		 <form action="<?php echo URL; ?>login/login" method="post">

        <div>
            <label for="user_name">Nom login : </label>

            <div>
                <input type="text" id="user_name" name="user_name"
                       placeholder="Nom de login">
            </div>
        </div>
        <div>
            <label for="user_password">Mot de passe : </label>

            <div>
                <input type="password" id="user_password" name="user_password">
            </div>
        </div>
        <div>
            <div>
                <div>
                    <label for="user_rememberme">
                        <input type="checkbox" id="user_rememberme" name="user_rememberme"> Rester connecté (2
                        semaines)
                    </label>
                </div>
            </div>
        </div>

        <div>
            <div>
                <button type="submit" name="login">
                    Valide
                </button>
            </div>
        </div>
    </form>
			<a href="<?php echo URL; ?>login/register" class='btn btn-success'>Inscription</a>
		 <?php } ?>
		 
        </div><!--/.navbar-collapse -->
      </div>
      </div>
    </nav>



 
</body>
</html>