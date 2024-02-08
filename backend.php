<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "calendrier_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Gestion de l'ajout d'événement
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST["date"];
    $evenement = $_POST["evenement"];

    $sql = "INSERT INTO events (date, evenement) VALUES ('$date', '$evenement')";

    if ($conn->query($sql) === TRUE) {
        echo "Événement ajouté avec succès.";
    } else {
        echo "Erreur lors de l'ajout de l'événement: " . $conn->error;
    }
}

// Gestion de la récupération des événements
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $result = $conn->query("SELECT * FROM events");

    if ($result->num_rows > 0) {
        $events = array();
        while ($row = $result->fetch_assoc()) {
            $events[] = $row;
        }
        echo json_encode($events);
    } else {
        echo "Pas d'événements.";
    }
}

$conn->close();
?>
