<?php
// Démarrer la session
session_start();

// Détruire toutes les données de la session
session_destroy();

// Supprimer les cookies
setcookie("email", "", time() - 3600);
setcookie("token", "", time() - 3600);

// Rediriger vers la page de connexion (ou toute autre page de votre choix)
header("Location: index.html");
exit();
?>
