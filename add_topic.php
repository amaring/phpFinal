<?php

include('templates/header.php');

if (isset($_POST['topic'])) {
    // get data that sent from form
    $topic = htmlspecialchars($_POST['topic']);
    $detail = htmlspecialchars($_POST['detail']);
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $datetime = date("d/m/y h:i:s"); //create date time

    $sql = $mysqli->prepare("INSERT INTO forum_question (topic, detail, name, email, datetime) VALUES (?,?,?,?,?)");
    $sql->bind_param ('sssss',
        $topic,
        $detail,
        $name,
        $email,
        $datetime
    );
    $sql->execute();
    $sql->close();
    echo "<p class='success'>Thread created successfully</p>";
    echo "<p class='success'><a href=forum.php>View threads</a></p>";
} else {
    echo "<p class='error'>There was an error</p>";
}

include_once('templates/footer.php');
?>