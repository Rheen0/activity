<?php
include 'db.php';

$action = $_POST['action'] ?? '';

if ($action === 'create') {
    $stmt = $conn->prepare("INSERT INTO attendees (name, email, ticket_type) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $_POST['name'], $_POST['email'], $_POST['ticket_type']);
    $stmt->execute();
}

if ($action === 'update') {
    $stmt = $conn->prepare("UPDATE attendees SET name=?, email=?, ticket_type=? WHERE id=?");
    $stmt->bind_param("sssi", $_POST['name'], $_POST['email'], $_POST['ticket_type'], $_POST['id']);
    $stmt->execute();
}

if ($action === 'delete') {
    $stmt = $conn->prepare("DELETE FROM attendees WHERE id=?");
    $stmt->bind_param("i", $_POST['id']);
    $stmt->execute();
}

header("Location: attendees.php");
exit;
