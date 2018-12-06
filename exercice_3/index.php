<?php
$verifInput = '/^[a-zA-Z0-9_-]{3,16}$/';
if(isset($_POST['submit'])){
  if (!empty($_POST['login']) && !empty($_POST['password'])){
    if (preg_match($verifInput, $_POST['login']) && preg_match($verifInput, $_POST['password'])){
      $cookie = $_POST['login'];
      setcookie('login', $cookie, time() + 3600, '/', null, false, true);
      $cookie = $_POST['password'];
      setcookie('password', $cookie, time() + 3600, '/', null, false, true);
      $goodMessage = 'Login et mot de passe enregistrés';
    }else{
      $message = 'Login et/ou mot de passe ne respectant pas les règles (chiffres, LeTTres, _ et -)';
    }
  }else{
    $message = 'Login et/ou mot de passe manquant';
  }
}
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Exercice 3 PHP Partie 8</title>
  </head>
  <body>
    <div class="jumbotron">
    <p><a href="http://monProjet" class="btn btn-danger">Accueil</a></p>
    <form method="post">
      <p><label>Login :</label>
      <input type="text" name="login" class="form-control" minlength="3" maxlength="16"/> </p>
      <p><label>Mot de passe :</label>
      <input type="password" name="password" class="form-control" minlength="6"/> </p>
      <p><input type="submit" name="submit" value="Sauvegarde" class="btn btn-primary"/></p>
      <p><a href="http://php8/exercice_4/" class="btn btn-primary">Exercice 4</a></p>
      <?php
        if (!empty($message)) {
          ?>
          <p class="alert alert-danger"><?= $message ?></p>
        <?php
        }
        if (!empty($goodMessage)) {
          ?>
          <p class="alert alert-success"><?= $goodMessage ?></p>
        <?php
        }
       ?>
    </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
