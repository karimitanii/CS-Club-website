<?php

/**
 * adds a user to array users
 * @param $user is a dictionary with user attributes
 * returns bool
 */
function Signup($user, $db)
{
    //insert query
    $query = "INSERT INTO `tbl_users` (`USERNAME`,`FIRST_NAME`,`LAST_NAME`,`PASSWORD`) VALUES ('$user->username','$user->firstname','$user->lastname','$user->password')";
    $stmt = $db->query($query);
    if ($stmt->rowCount() > 0)
        return 1;
    else
        return 0;
}

function GetUsers()
{
    global $db;
    $users = array();
    $query = "SELECT ID,USERNAME,FIRST_NAME,LAST_NAME,IS_ACTIVE FROM tbl_users";
    $stmt = $db->query($query);
    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $user = new stdClass();
            $user->id = $row["ID"];
            $user->username = $row["USERNAME"];
            $user->name = $row["FIRST_NAME"] . " " . $row["LAST_NAME"];
            $user->isActive = $row["IS_ACTIVE"];
            $users[] = $user;
        }
        return $users;
    } else {
        return 0;
    }
}

function DeleteUser($id)
{
    global $db;

    $query = "Delete FROM tbl_users where ID=$id";
    $stmt = $db->query($query);
    if ($stmt->rowCount() > 0) {
        return 1;
    } else {
        return 0;
    }
}

function ActivateUser($id, $isActive)
{
    global $db;
    $users = array();
    $query = "UPDATE tbl_users SET IS_ACTIVE=$isActive where ID=$id";
    $stmt = $db->query($query);
    if ($stmt->rowCount() > 0) {
        return 1;
    } else {
        return 0;
    }
}

function Login($un, $pass)
{
    global $db;
    $query = "SELECT ID,FIRST_NAME,LAST_NAME FROM tbl_users WHERE USERNAME='$un' AND PASSWORD='$pass' AND IS_ACTIVE=1";
    $stmt = $db->query($query);
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $name = $row["FIRST_NAME"] . " " . $row["LAST_NAME"];
        return $name;
    } else {
        return 0;
    }
}
