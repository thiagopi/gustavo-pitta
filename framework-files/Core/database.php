<?php

$db_conn = null;

use Log\Log;

define("DEBUG_DATABASE", getConfig("debug_database", false) ); 

/*
    Set Database variables
*/
function setDatabase( $db_alias ){

    global $db_conn;

    //find database alias configuration
    $db_configs = getConfig("databases");
    for( $d=0; $d < count( $db_configs ); $d++ ){
        $dbc = $db_configs[$d];
        if( $dbc["alias"] ==  $db_alias ){

            try {    

                $db_conn = new PDO('mysql:host='.$dbc["host"].';dbname='.$dbc["db"].';port='.$dbc["port"], $dbc["user"], $dbc["passwd"]);

                if( DEBUG_DATABASE ){
                    //do not run this on production environments
                    if( ENVIRONMENT != "PRODUCTION" )
                        $db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    Log::debug("Database $db_alias connected sussesfully"); 
                }

            } catch( PDOException $e ) {
                Log::error("Database error: ". $e->getMessage() ); 
            }

            return true;
        }
    }

    $db_conn = null;
    return false;
}

/*
    mysql PDO Conexion
*/
function PDOExecute($sql){

    global $db_conn;

    try {
    
        $stmt = $db_conn->prepare($sql);
    
        try {
            $db_conn->beginTransaction(); 
            $stmt->execute(); 
            $db_conn->commit();
            return true;
        } catch(PDOExecption $e) {

            $db_conn->rollback();
            return false;
        }

    } catch( PDOExecption $e ) {

        return false;
    }

    return true;
}

function PDOReturnID($sql){

    global $db_conn;

    try { 
    
        $stmt = $db_conn->prepare($sql); 
    
        try {
            $db_conn->beginTransaction(); 
            $stmt->execute(); 
            $id = $db_conn->lastInsertId();
            $db_conn->commit();
            return $id;

        } catch(PDOExecption $e) {

            $db_conn->rollback();
            return false;
        }
    } catch( PDOExecption $e ) {
        return false;
    }
    return $id;
}

function PDOSelect($sql){

    global $db_conn;

    if( $db_conn != null ){

        try { 
              
            $stmt = $db_conn->prepare($sql); 
            $stmt->execute();
            if( $stmt->rowCount() > 0 ){

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)){
                    $retorno[] = array_map("utf8_encode", $row);
                }
                return $retorno;
            }
            return false;

        } catch( PDOExecption $e ) {

            // print "Error!: " . $e->getMessage() . "</br>";
            return false;
        }
        return $retorno;

    }  else {
        Log::error("Database connection object is null. Query -> ". $sql ); 
    }
}

