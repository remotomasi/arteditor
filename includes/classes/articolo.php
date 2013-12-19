<?php
/**
 * articolo.php
 *
 * Contact class file
 *
 * @version    0.1 2013-09-12
 * @package    Arteditor
 * @copyright  Copyright (c) 2013 Remo Tomasi
 * @license    GNU General Public License
 * @since      Since Release 1.0
 */
/**
 * Articolo class
 *
 * @package    Arteditor
 */

require_once 'database.php';

class Articolo
{
  /**
   * Titolo
   * @var string
   */
  protected $Titolo;
  
  /**
   * Contenuto
   * @var String
   */
  protected $Contenuto;
  
  /**
   * Data pubblicazione
   * @var date
   */
  protected $data_pubblicazione;

  /**
   * ID Articolo
   * @var int
   */
  protected $id_articolo;
  
  /**
   * Initialize the Articolo with titolo, contenuto, data di pubblicazione
   * @param array
   */
  public function __construct($input = false) {
    if (is_array($input)) {
      foreach ($input as $key => $val) {
        // Note the $key instead of key. 
        // This will give the value in $key instead of 'key' itself
        $this->$key = $val;
      }
    }
  }

  /**
   * Return Titolo
   * @return string
   */
  public function getTitolo() {
    return $this->Titolo;
  }
  
  /**
   * Return Contenuto
   * @return string
   */
  public function getContenuto() {
    return $this->Contenuto;
  }
  
  /**
   * Return Data pubblicazione
   * @return string
   */
  public function getDataPubblicazione() {
    return $this->data_pubblicazione;
  }

  public function getIDArticolo() {
  	return $this->id_articolo;
  }
    
  /**
   * Ottiene la lista degli articoli
   * @return Ambigous <string, Articolo>|boolean
   */
  static public function getArticoli() {
  	// clear the results
  	$items = '';
  	// Get the connection
  	$connection = Database::getConnection();
  	// Set up the query
  	//$query = 'SELECT * FROM `articolo` order by data_pubblicazione desc';
  	$query = "CALL sp_articoli()";
  	
  	// Run the query
  	$result_obj = '';
  	$result_obj = $connection->query($query);
  	
	/*  	
	 *	if (!$result_obj) {
		die('Something went wrong: ' . $result_obj);
	}
	*/
	
	if (!$result_obj) {
		echo "CALL failed: (" . $connection->errno . ") " . $connection->error;
	}else{

	  	// Loop through getting associative arrays,
	  	// passing them to a new version of this class,
	  	// and making a regular array of the objects
	  	
	  	try {
	  		$connection->next_result();
	  		while($result = $result_obj->fetch_array(MYSQLI_ASSOC)) {
	  			$items[]= new Articolo($result);
	  		}
	  		// pass back the results
	  		//$connection->close();
	  		return($items);
	  	}
	  
	  	catch(Exception $e) {
	  		return false;
	  	}

	}
  
  }
  
  /**
   * Ottiene la lista degli articoli
   * @return Ambigous <string, Articolo>|boolean
   */
  static public function getArticoliPerPagina($primo, $perPage) {
  	// clear the results
  	$items = '';
  	// Get the connection
  	$connection = Database::getConnection();
  	// Set up the query
  	//$query = 'SELECT * FROM `articolo` order by data_pubblicazione desc';
  	$query = "CALL sp_pageArticoli('$primo', '$perPage')";
  	 
  	// Run the query
  	$result_obj = '';
  	$result_obj = $connection->query($query);
  	 
  	/*
  	 *	if (!$result_obj) {
  	die('Something went wrong: ' . $result_obj);
  	}
  	*/
  
  	if (!$result_obj) {
  		echo "CALL failed: (" . $connection->errno . ") " . $connection->error;
  	}else{
  
  		// Loop through getting associative arrays,
  		// passing them to a new version of this class,
  		// and making a regular array of the objects
  
  		try {
  			$connection->next_result();
  			while($result = $result_obj->fetch_array(MYSQLI_ASSOC)) {
  				$items[]= new Articolo($result);
  			}
  			// pass back the results
  			//$connection->close();
  			return($items);
  		}
  		 
  		catch(Exception $e) {
  			return false;
  		}
  
  	}
  
  }
  
  /**
   * Ottiene il numero degli articoli
   * @return Ambigous <string, Articolo>|boolean
   */
  static public function getCountArticoli() {
  	// clear the results
    $items = '';
  	// Get the connection
  	$connection = Database::getConnection();
  	// Set up the query
  	//$query = "INSERT INTO articolo (titolo, contenuto, data_pubblicazione, id_utente) VALUES "
  	//		. "('$titolo', '$contenuto', NOW(), $id_utente)";
  	$query = "CALL sp_countArticoli()";
  	  	  	
  	// Run the query
  	$result = '';
  	$result_obj = $connection->query($query);
  	
	if (!$result_obj) {
		echo "CALL failed: (" . $connection->errno . ") " . $connection->error;
	}else{

	  	// Loop through getting associative arrays,
	  	// passing them to a new version of this class,
	  	// and making a regular array of the objects
	  	
	    try {
       		$connection->next_result();
	        while($result = $result_obj->fetch_array(MYSQLI_ASSOC)) {
		        $items[] = $result;
	            //$result_obj->free();
	        }
	        // pass back the results
	        return($items);
	        //return ($result_obj);
		} catch(Exception $e) {
     		return 0;
     	}
	}
  
  }
  
  /**
   *
   * @return Ambigous <string, Articolo>|boolean
   */
  static public function getArticoloByID($id_articolo) {
  	// clear the results
  	$item = '';
  	// Get the connection
  	$connection = Database::getConnection();
  	// Set up the query
  	//$query = 'SELECT * FROM `articolo` WHERE id_articolo=' . $id_articolo;
  	$query = "CALL arteditor.sp_articolo($id_articolo)";
  	
  	// Run the query
  	$result_obj = '';
  	$result_obj = $connection->query($query);

	if (!$result_obj) {
		echo "CALL failed: (" . $connection->errno . ") " . $connection->error;
	}else{

	  	// Loop through getting associative arrays,
	  	// passing them to a new version of this class,
	  	// and making a regular array of the objects
	  	
	  	try {
  			$connection->next_result();
			$result = $result_obj->fetch_array(MYSQLI_ASSOC);
			$item = new Articolo($result);
	  	
	  		// pass back the results
	  		return($item);
	  	}
	  
	  	catch(Exception $e) {
	  		return false;
	  	}
	}
  
  }

  /**
   * 
   * @param string $titolo
   * @param string $contenuto
   * @param integer $id_utente
   */
  static public function insertArticolo($titolo, $contenuto, $id_utente) {
  	// clear the results
  	$items = '';
  	// Get the connection
  	$connection = Database::getConnection();
  	// Set up the query
  	//$query = "INSERT INTO articolo (titolo, contenuto, data_pubblicazione, id_utente) VALUES "
  	//		. "('$titolo', '$contenuto', NOW(), $id_utente)";
  	$query = "CALL sp_insertArticolo('$titolo','$contenuto','$id_utente')";
  	
  	//echo $query;
  	  	
  	// Run the query
  	$result = '';
  	$result_obj = $connection->query($query);
  	
	if (!$result_obj) {
		echo "CALL failed: (" . $connection->errno . ") " . $connection->error;
	}else{

	  	// Loop through getting associative arrays,
	  	// passing them to a new version of this class,
	  	// and making a regular array of the objects
	  	
	  	try {
	  		if (mysqli_more_results($connection)) {
  				$connection->next_result();
	  		}
			$result = $connection->query($query);
			return $result;
	  	}catch (Exception $e) {
			return false;		
		}
	}
  }

  /**
   *
   * @param string $titolo
   * @param string $contenuto
   * @param integer $id_utente
   */
  static public function modificaArticolo($id_articolo, $titolo, $contenuto) {
  	// Get the connection
  	$connection = Database::getConnection();
  	// Set up the query
  	//$query = "UPDATE articolo SET Titolo=" . "'$titolo'" . ", Contenuto=" . "'$contenuto'" . "WHERE " . 'id_articolo=' . "'$id_articolo'";
  	$query = "CALL sp_updateArticolo('$titolo','$contenuto','$id_articolo')";	 
	//echo $query;

  	// Run the query
	$result = '';
  	$result_obj = $connection->query($query);
  	
	if (!$result_obj) {
		echo "CALL failed: (" . $connection->errno . ") " . $connection->error;
	}else{

	  	// Loop through getting associative arrays,
	  	// passing them to a new version of this class,
	  	// and making a regular array of the objects
	  	
	  	try {
	  		$connection->next_result();
			$result = $connection->query($query);
			return $result;
  		}catch (Exception $e) {
    		echo 'Eccezione catturata: ',  $e->getMessage(), "\n";
			return false;	
  		}	
	}
  }  
  
  /*
   *
   * @param string $titolo
   * @param string $contenuto
   * @param integer $id_utente
   */
  static public function deleteArticoloByID($id_articolo) {
	// Get the connection
	$connection = Database::getConnection();
	// Set up the query
	$query = "CALL sp_deleteArticolo('$id_articolo')";

	// Run the query
	$result = '';
  	$result_obj = $connection->query($query);
  	
	if (!$result_obj) {
		echo "CALL failed: (" . $connection->errno . ") " . $connection->error;
	}else{

	  	// Loop through getting associative arrays,
	  	// passing them to a new version of this class,
	  	// and making a regular array of the objects
	  	
	  	try {
	  		if (mysqli_more_results($connection)) {
	  			$connection->next_result();
	  		}
	  		$result = $connection->query($query);
	  		return $result;
		} catch (Exception $e) {
    		echo 'Eccezione catturata: ',  $e->getMessage(), "\n";
			return false;
		}
	}
  }
  			
  /**
   * 
   * @param integer $idArticolo
   * @return Ambigous <string, Articolo>|boolean
   */
  static public function getAutoreArticoloByIDArticolo($idArticolo) {
  	// clear the results
    $items = '';
    // Get the connection
    $connection = Database::getConnection();
    // Set up the query
          
    //$query = "SELECT * FROM `utente` inner join articolo on utente.id_utente = articolo.id_utente where articolo.id_articolo = '$idArticolo'";
  	$query = "CALL sp_autoreArticoloByIDArticolo('$idArticolo')";
  	  
  	// Run the query
  	$result_obj = '';
  	$result_obj = $connection->query($query);
  		  
  	if (!$result_obj) {
		echo "CALL failed: (" . $connection->errno . ") " . $connection->error;
	}else{  		  

    // Loop through getting associative arrays,
    // passing them to a new version of this class,
    // and making a regular array of the objects
          
    try {
       	$connection->next_result();
        while($result = $result_obj->fetch_array(MYSQLI_ASSOC)) {
	        $items[]= $result;
            //$result_obj->free();
        }
        // pass back the results
        return($items);
        //return ($result_obj);
      	}
  
     catch(Exception $e) {
     	return false;
     }
	}
  }
}