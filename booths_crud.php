<?php
include 'db.php';

$action = $_POST['action'];

if ($action === 'create') {
    $img = time() . '_' . $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "assets/img/booths/$img");

    $stmt = $conn->prepare(
        "INSERT INTO booths (name, location, description, image)
     VALUES (?, ?, ?, ?)"
    );
    $stmt->bind_param("ssss", $_POST['name'], $_POST['location'], $_POST['description'], $img);
    $stmt->execute();
}

if ($action === 'update') {
    $img = $_POST['old_image'];

    if (!empty($_FILES['image']['name'])) {
        $img = time() . '_' . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "assets/img/booths/$img");
    }

    $stmt = $conn->prepare(
        "UPDATE booths SET name=?, location=?, description=?, image=? WHERE id=?"
    );
    $stmt->bind_param(
        "ssssi",
        $_POST['name'],
        $_POST['location'],
        $_POST['description'],
        $img,
        $_POST['id']
    );
    $stmt->execute();
}

if ($action === 'delete') {
    $stmt = $conn->prepare("DELETE FROM booths WHERE id=?");
    $stmt->bind_param("i", $_POST['id']);
    $stmt->execute();
}

header("Location: booths.php");
exit;
