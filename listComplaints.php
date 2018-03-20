<?php
require_once 'database.php';
require_once 'Complaint.php';
$c = new Complaint();
$complaints = $c->getAllComplaints(Database::getDb());
?>
<h1>List of complaints</h1>
<ul>
    <?php foreach ($complaints as $c){
        echo "<li>" . $c->username .
            " <form action='deleteComplaints.php' method='post'>
            <input type='hidden' name='id' value='$c->complaintId' />
            <input type='submit' name='delete' value='Delete'>
            </form> 
            <form action='updateComplaints.php' method='post'>
            <input type='hidden' name='id' value='$c->complaintId' />
            <input type='submit' name='update' value='Update'>
            </form>
            </li>";
    } ?>
</ul>

<a href="addComplaints.php">Add student</a>