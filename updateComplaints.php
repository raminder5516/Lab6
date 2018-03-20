<?php
require_once 'database.php';
require_once 'Complaint.php';
$db= Database::getDb();
$mycomp = new Complaint();
if(isset($_POST['update'])) {
    $complaintId = $_POST['id'];
    $c = $mycomp->getComplaintById($db, $complaintId);
}
if(isset($_POST['upt'])){
    $complaintId = $_POST['complaintId'];
    $username = $_POST['username'];
    $complaint_title = $_POST['title'];
    $description = $_POST['description'];
    $complaint_date = $_POST['complaint_date'];
    $count = $mycomp->updateComplaint($db, $complaintId,$username, $complaint_title, $description, $complaint_date);
    if($count){
        header("Location: listComplaints.php");
    }else {
        echo "problem updating";
    }
}

?>
<h1>Update Complaint</h1>
<form action="updateComplaints.php"  method="post">
    <input type="hidden" value="<?= $c->complaintId; ?>" name="complaintId">
    Username:<input type="text" name="username"  value="<?= $c->username; ?>"/><br />
    Complaint title:<input type="text" name="title" value="<?= $c->complaint_title; ?>" /><br />
    Description:<input type="text" name="description" value="<?= $c->description; ?>" /><br />
    Complaint Date:<input type="text" name="complaint_date" value="<?= $c->complaint_date; ?>"/><br />
    <input type="submit" name="upt" value="Update Complaint">
</form>