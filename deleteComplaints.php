<?php
require_once 'database.php';
require_once 'Complaint.php';
$id = $_POST['id'];
$db = Database::getDb();
$c =  new Complaint();
$count = $c->deleteComplaint($db, $id);
if($count){
    header("Location: listComplaints.php");
}else {
    echo "problem deleting";
}
