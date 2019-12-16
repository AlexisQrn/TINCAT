<?php
// Etape 1 : config database
$DB_HOST = "localhost";
$DB_NAME = "tincat";
$DB_USER = "root";
$DB_PASSWORD = "root";

// Etape 2 : Connexion to database
try {
    $db = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
var_dump($_POST);
// Avant d'insérer en base de données faire les vérifications suivantes
    // Vérifier si le pseudo ou le mot de passe est vide
if(empty($_password2) . empty($_password) . empty($pseudo)){
echo "Vous avez oubliez de remplir un champ";
}

    // Ajouter un input confirm password et vérifier si les deux sont égaux

if( "$_password2" !== "$_password"){
    echo "le mot de passe ne correspond pas";
}

    // Ajouter un champ email (c'est bon, dans register.php)

// Etape 3 : prepare request
$req = $db->prepare("INSERT INTO users (pseudo, password) VALUES(:pseudo, :password)");
$req->bindParam(":pseudo", $_POST["pseudo"]);
$req->bindParam(":password", $_POST["password"]);
$req->bindParam(":password", $_POST["email"]);
$req->execute();