<?php
class Complaint{
    public function getAllComplaints($db){
        $sql = "SELECT * FROM ComplaintSection";
        $pdostm = $db->prepare($sql);
        //specify fetch method
        $pdostm->setFetchMode(PDO::FETCH_ASSOC);
        $pdostm->execute();
        //fetch all result
        $results = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $results;
    }

    public function addComplaint($db, $username, $complaint_title, $description, $complaint_date){
        $sql = "INSERT INTO ComplaintSection (username, complaint_title, description, complaint_date)
            VALUES (:username, :complaint_title, :description, :complaint_date)";
        $pdostm = $db->prepare($sql);
        $pdostm->bindValue(':username', $username, PDO::PARAM_STR);
        $pdostm->bindValue(':complaint_title', $complaint_title, PDO::PARAM_STR);
        $pdostm->bindValue(':description', $description, PDO::PARAM_STR);
        $pdostm->bindValue(':complaint_date', $complaint_date, PDO::PARAM_STR);
        $count  = $pdostm->execute();
        return $count;
    }

    public function updateComplaint($db, $complaintId,$username, $complaint_title, $description, $complaint_date){
        $sql = "UPDATE  ComplaintSection
                SET username = :username,
                complaint_title = :complaint_title, 
                description = :description,
                complaint_date = :complaint_date
                WHERE complaintId = :complaintId";
        $pdostm = $db->prepare($sql);
        $pdostm->bindValue(':complaintId', $complaintId, PDO::PARAM_INT);
        $pdostm->bindValue(':username', $username, PDO::PARAM_STR);
        $pdostm->bindValue(':complaint_title', $complaint_title, PDO::PARAM_STR);
        $pdostm->bindValue(':description', $description, PDO::PARAM_STR);
        $pdostm->bindValue(':complaint_date', $complaint_date, PDO::PARAM_STR);
        $count  = $pdostm->execute();
        return $count;
    }


    public function getComplaintById($db, $complaintId){
        $query = "SELECT * FROM ComplaintSection WHERE complaintId= :complaintId";
        $pdostm = $db->prepare($query);
        $pdostm->bindValue(':complaintId', $complaintId, PDO::PARAM_INT);
        $pdostm->execute();
        $c = $pdostm->fetch(PDO::FETCH_OBJ);
        return $c;
    }

    public function deleteComplaint($db, $complaintId){
        $query = "DELETE FROM ComplaintSection WHERE complaintId = :complaintId";
        $pdostm = $db->prepare($query);
        $pdostm->bindValue(':complaintId', $complaintId, PDO::PARAM_INT);
        $count = $pdostm->execute();
        return $count;
    }
}