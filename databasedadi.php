<?php
//for test git
function runSelect($query)
{
    $db = new PDO('mysql:dbname=ghobadi_mydb;host=localhost', 'ghobadi_myam', 'myam1371', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    try {
        $stmt = $db->query($query);
        return $stmt;                //->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $ex) {
        echo 'error in reading Data!.';
        return false;
    } catch (Exception $ex) {
        echo 'error in reading Data!.';
        return false;
    }
}

function runInsert($query)
{

	$db = new PDO('mysql:dbname=ghobadi_mydb;host=localhost', 'ghobadi_myam', 'myam1371',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	  $stmt = $db->query($query);
	return $db;
	
}
function runDelete($query)
{$db = new PDO('mysql:dbname=ghobadi_mydb;host=localhost', 'ghobadi_myam', 'myam1371');
	  $stmt = $db->query($query);
	return $stmt;
}


function runupdate($query)
{
    $db = new PDO('mysql:dbname=ghobadi_mydb;host=localhost', 'ghobadi_myam', 'myam1371',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    try {
        $stmt = $db->query($query);
        return $stmt;                //->fetchAll(PDO::FETCH_ASSOC);

    } catch(PDOException $ex) {
        echo 'error in reading Data!.';
    }
}?>

