<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    /* Pour l'affichage sur les écrans de petite taille */
    @media only screen and (max-width: 600px) {
      .form-container {
        width: 90%;
        margin: 0 auto;
        padding: 10px;
        border-radius: 10px;
        background-color: #f2f2f2;
      }
      .form-row {
        width: 100%;
        margin-bottom: 10px;
      }
      .form-label {
        display: block;
        width: 100%;
        text-align: left;
        font-weight: bold;
        margin-bottom: 5px;
      }
      .form-input {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
        border: 2px solid #ccc;
        border-radius: 4px;
      }
      .form-button {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }
      .form-button:hover {
        background-color: #45a049;
      }
    }

    /* Pour l'affichage sur les écrans de taille moyenne */
    @media only screen and (min-width: 601px) and (max-width: 768px) {
      .form-container {
        width: 60%;
        margin: 0 auto;
        padding: 10px;
        border-radius: 10px;
        background-color: #f2f2f2;
      }
      .form-row {
        width: 100%;
        margin-bottom: 10px;
      }
      .form-label {
        display: block;
        width: 100%;
        text-align: left;
        font-weight: bold;
        margin-bottom: 5px;
      }
      .form-input {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
        border: 2px solid #ccc;
        border-radius: 4px;
      }
      .form-button {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }
      .form-button:hover {
        background-color: #45a049;
      }
    }

    /* Pour l'affichage sur les écrans de grande taille */
    @media
    only screen and (min-width: 769px) {
  .form-container {
    width: 40%;
    margin: 0 auto;
    padding: 10px;
    border-radius: 10px;
    background-color: #f2f2f2;
  }
  .form-row {
    width: 100%;
    margin-bottom: 10px;
  }
  .form-label {
    display: block;
    width: 100%;
    text-align: left;
    font-weight: bold;
    margin-bottom: 5px;
  }
  .form-input {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
  }
  .form-button {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
  .form-button:hover {
    background-color: #45a049;
  }
}
  </style>
</head>
<body>

<div class="form-container">
  <form action="/action_page.php">
    <div class="form-row">
      <label class="form-label" for="email">Email :</label>
      <input type="text" class="form-input" id="email" name="email" required>
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
  </form>
</div>

</body>
</html>
