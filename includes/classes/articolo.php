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

  public function getIDArticolo () {
  	return $this->id_articolo;
  }
    
  /**
   * 
   * @return Ambigous <string, Articolo>|boolean
   */
  static public function getArticoli() {
  	// clear the results
  	$items = '';
  	// Get the connection
  	$connection = Database::getConnection();
  	// Set up the query
  	$query = 'SELECT * FROM `articolo` order by data_pubblicazione desc';
  
  	// Run the query
  	$result_obj = '';
  	$result_obj = $connection->query($query);
  	// Loop through getting associative arrays,
  	// passing them to a new version of this class,
  	// and making a regular array of the objects
  	try {
  		while($result = $result_obj->fetch_array(MYSQLI_ASSOC)) {
  			$items[]= new Articolo($result);
  		}
  		// pass back the results
  		return($items);
  	}
  
  	catch(Exception $e) {
  		return false;
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
  	$query = "INSERT INTO articolo (titolo, contenuto, data_pubblicazione, id_utente) VALUES "
  			. "('$titolo', '$contenuto', NOW(), $id_utente)";
  	
  	echo $query;
  	  	
  	$result = '';
  	// Run the query
	if ($result = $connection->query($query)) {
		echo "Unable to add row";
	} else {
		echo "Row successful added <br />";
	}
  
  }
  
  /**
   * 
   * @param integer $idArticolo
   * @return Ambigous <string, Articolo>|boolean
   */
  static public function getAutoreArticolo($idArticolo) {
  	// clear the results
  	$items = '';
  	// Get the connection
  	$connection = Database::getConnection();
  	// Set up the query
  	$query = "SELECT * FROM `utente` inner join articolo on utente.id_utente = articolo.id_utente where articolo.id_articolo = '$idArticolo'";
  
  	// Run the query
  	$result_obj = '';
  	$result_obj = $connection->query($query);
  	// Loop through getting associative arrays,
  	// passing them to a new version of this class,
  	// and making a regular array of the objects
  	try {
  		while($result = $result_obj->fetch_array(MYSQLI_ASSOC)) {
  			$items[]= $result;
  		}
  		// pass back the results
  		return($items);
  	}
  
  	catch(Exception $e) {
  		return false;
  	}
  
  }
  
}