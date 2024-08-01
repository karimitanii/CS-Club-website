<?php 
session_start();
require_once("../common/dbconfig.php");
require_once("../models/userModel.php");



function isMissingArgsLogin(){
    if (!isset($_POST["tfun"]))
        return 1;
    if (!isset($_POST["tfpass"]))
        return 1;
    
}

function isMissingArgsSignUp($isNotEmpty=false){
    if (!isset($_POST["tfun"]) || ($_POST["tfun"]=="" && $isNotEmpty))
        return 1;
    if (!isset($_POST["tfpass"]) || ($_POST["tfpass"]=="" && $isNotEmpty))
        return 1;
    if (!isset($_POST["tffn"]) || ($_POST["tffn"]=="" && $isNotEmpty))
        return 1;
    if (!isset($_POST["tfln"]) || ($_POST["tfln"]=="" && $isNotEmpty) )
        return 1;
}
 if (isset($_POST["action"])){
    switch ($_POST["action"]){
        case "LOGIN":
            if (!isMissingArgsLogin()){
                $un=$_POST["tfun"];
                $pass=$_POST["tfpass"];
                if ($name=Login($un,$pass)){
                    $_SESSION["name"]=$name;
                    header("location:../../fe/pages/listUsers.php");
                }else{
                    header("location:../../index.php?errorCode=1&errorDesc=Wrong Username or Password!");
                }    
            }else{
                header("location:../../index.php?errorCode=2&errorDesc=Missing Args!");
            }
        break;
        case "SIGNUP":
            if (!isMissingArgsSignUp(true)){
                $user=new stdClass();
                $user->username=$_POST["tfun"];
                $user->firstname=$_POST["tffn"];
                $user->lastname=$_POST["tfln"];
                $user->password=$_POST["tfpass"];
                $user->email=$_POST["tfemail"];
                $user->sex=$_POST["sex"];
                $user->language=$_POST["language"];
            
                if (Signup($user,$db)){
                    $_SESSION["name"]=$user->firstname." ".$user->lastname;
                    header("location:../../fe/pages/listUsers.php");
                }else{
                    header("location:../../fe/pages/signup.php?errorCode=3&errorDesc=Username already exists!");
                }    
            }else{
                header("location:../../fe/pages/signup.php?errorCode=2&errorDesc=Missing Args!");
            }
        break;
    }
 }else{
    header("location:../../index.php?errorCode=2&errorDesc=Server Error!");
 }
?>