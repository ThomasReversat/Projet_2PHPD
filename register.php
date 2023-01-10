<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Internet Movies DataBase & co</title>
    <link rel="shortcut icon" type="image/ico" href="img/icone.ico">
    <link rel="stylesheet" href="css/register.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>

<div class="form-container">
  <form action="/action_page.php">
    <fieldset>

      <div class="form-row">
        <label class="form-label" for="name">Nom :</label>
        <input type="text" class="form-input" id="name" name="name" required>
      </div>

      <div class="form-row">
        <label class="form-label" for="email">Prenom :</label>
        <input type="text" class="form-input" id="first-name" name="first-name" required>
      </div>

      <div class="form-row">
        <label class="form-label" for="email">Telephone :</label>
        <input type="number" class="form-input" id="phone" name="phone" required>
      </div>
      
      <div class="form-row">
        <label class="form-label" for="email">Email :</label>
        <input type="email" class="form-input" id="email" name="email" required>
      </div>

      <div class="form-row">
        <label class="form-label" for="pwd">Mot de passe :</label>
        <input type="password" class="form-input" id="pwd" name="pwd" required>
      </div>

      <div class="form-row">
        <label class="form-label" for="pwd2">Confirmer le mot de passe :</label>
        <input type="password" class="form-input" id="pwd2" name="pwd2" required>
      </div>

      <div class="form-row">
        <button type="submit" class="form-button">S'inscrire</button>
      </div>
      
    </fieldset>
  </form>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</html>
