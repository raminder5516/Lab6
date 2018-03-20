<?php
require_once 'database.php';
require_once 'Complaint.php';
if(isset($_POST['add'])){
    //get form values and assign to local varaibles
    $username = $_POST['username'];
    $complaint_title = $_POST['complaint_title'];
    $description = $_POST['description'];
    $complaint_date = $_POST['complaint_date'];
    $c = new Complaint();
    $db = Database::getDb();
    $count = $c->addComplaint($db,$username, $complaint_title, $description, $complaint_date);
    header("Location: listComplaints.php");
}
?>

<h1>Add Complaint</h1>
<form action="addComplaints.php"  method="post">
    Username:<input type="text" name="username" /><br />
    Complaint Title:<input type="text" name="complaint_title" /><br />
    Description:<input type="text" name="description" /><br />
    Complaint Date:<input type="text" name="complaint_date" /><br />
    <input type="submit" name="add" value="Add Complaint">
</form>