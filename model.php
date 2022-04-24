<?php
require_once("connexion.php");
if (!isset($_SESSION)) {
    session_start();
  }
  
function getCurrentUser()
{
    if ($_SESSION)
    {
        try {
            $currentUserID = $_SESSION['currentUserID'];
            $data = connexion()->query("SELECT * FROM users WHERE userID=$currentUserID")->fetchAll();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
        return $data;
    }
    else
    {
        return NULL;
    }
}

function getAllCities()
{
    try {
        $data = connexion()->query('SELECT * FROM cities')->fetchAll();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
    return $data;
}