<?php

if (isset($_GET['valider'])){
    $sql = '
    INSERT INTO membre (nom, prenom, mail, telephone, date_naissance) VALUES (
        \''. $_GET['nom']           .'\', 
        \''. $_GET['prenom']        .'\', 
        \''. $_GET['mail']          .'\', 
        \''. $_GET['telephone']     .'\', 
        \''. $_GET['dateNaissance'] .'\')
    ';
    $mysqli = new mysqli("localhost", "root", "root", "formation");
}

?>
<h2>Ajouter un membre</h2>
<form>
    <label for="nom">Nom :</label><input id="nom" name="nom" type="text" /><br />
    <label for="prenom">Prénom :</label><input id="prenom" name="prenom" type="text" /><br />
    <label for="mail">Mail :</label><input id="mail" name="mail" type="email" /><br />
    <label for="telephone">Téléphone :</label><input id="telephone" name="telephone" type="tel" /><br />
    <label for="dateNaissance">Date de naissance :</label><input id="dateNaissance" name="dateNaissance" type="date" /><br />
    <button name="valider">Ajouter</button>
</form>