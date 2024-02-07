<?php
require_once('./connection.php');

// Check if the invitation_id parameter is present in the URL
if(isset($_GET['id'])) {
    $status = 'dennied';
    $UPDATE = $LIGACAO->prepare('UPDATE `invites` SET `status`=? WHERE id_invite=?');
    $UPDATE->bindParam(1, $status);
    $UPDATE->bindParam(2, $_GET['id']);

    $UPDATE -> execute();
    
    header("Location: ../myboards.php");
}