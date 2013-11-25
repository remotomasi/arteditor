<?php
/**
 * utente.php
 *
 * utente file
 * 
 * @version    0.1 2013-09-12
 * @package    Arteditor
 * @copyright  Copyright (c) 2013 Remo Tomasi
 * @license    GNU General Public License
 * @since      Since Release 1.0
 */
/**
 * Utente class
 *
 * @package  arteditor
 */
class Utente
{
  /**
   * ID
   * @var int
   */
  protected $id_utente;
  
  /**
   * First name
   * @var string
   */
  protected $nome;
  
  /**
   * Last Name
   * @var String
   */
  protected $cognome;
  
  /**
   * Email
   * @var string
   */
  protected $email;
  
  /**
   * Username
   * @var string
   */
  protected $username;
  
  /**
   * Password
   * @var string
   */
  protected $password;
  
  
  /**
   * Access level
   * @var string
   */
  protected $level;

  /**
   * Initialize the User with nome, cognome, email
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
   * Return ID
   * @return int
   */
  public function getId() {
  return $this->id_utente;
  }
  
  /**
   * Return Nome
   * @return string
   */
  public function getNome() {
  return $this->nome;
  }
  
  /**
   * Return Cognome
   * @return string
   */
  public function getCognome() {
  return $this->cognome;
  }
  
  /**
   * Return Email
   * @return string
   */
  public function getEmail() {
  return $this->email;
  }
    
  /**
   * Return User Name
   * @return string
   */
  public function getUsername() {
  return $this->username;
  }
  
  /**
   * Return Access
   * @return string
   */
  public function getLevel() {
  return $this->level;
  }
  
  /**
   * Creates a full name by concatenating first and last names
   * @return string
   */
  public function name() {
   $name = $this->nome . ' ' . $this->cognome;
   return $name;
  }
  
  protected function _verifyInput() {
  $error = false; 
  if (!trim($this->nome)) {
    $error = true;
  } 
  if (!trim($this->cognome)) {
    $error = true;
  }
  if (!trim($this->username)) {
     $error = true;
  } elseif (strlen(trim($this->username)) < 6) {
     $error = true;
  } elseif (self::getUtenteIdByUser(trim($this->username))) {
    $error = true;
  } 
  
  $password1 = trim($_POST['password1']);
  if ($password1) {
    if ($password1 != trim($_POST['password2'])) {
      $error = true;
    } elseif (strlen($password1) < 6) {
        $error = true;
    }
  }

  if ($error) {
    return false;
  } else {
    return true;
  }
  }

  public function addRecord() {
  
    // Verify the fields
    if ($this->_verifyInput()) {
      // prepare for the encrypted password
        $password = trim($_POST['password1']);
      
      // Get the Database connection
      $connection = Database::getConnection();
      
      // Prepare the data 
      $query = "INSERT INTO utente(nome, cognome, email, username, password) 
      VALUES ('" . Database::prep($this->nome) . "',
       '" . Database::prep($this->cognome) . "',
       '" . Database::prep($this->email) . "',
       '" . Database::prep($this->username) . "',
       '" . Database::prep($this->password) . "')";
      // Run the MySQL statement 
      if ($connection->query($query)) { // this inserts the row
        // update with the user name and password now that you know the id
        $query = "UPDATE utente 
        SET username = '" . Database::prep($this->username) . "', 
        password = '" . hash_hmac('sha512',
          $password . '!hi#HUde9' . mysql_insert_id(), 
          SITE_KEY) ."',
        level = '" . Database::prep($this->level) . "'";
        if ($connection->query($query)) { // this updates the row
          $return = array('', 'Utente Record successfully added.', '');   
          // add success message
          return $return;
        } else {
          // send fail message 
            $return = array('', 'Username/password not added to contact.', '');
            return $return;
        }

      } else {
      // send fail message and return to contactmaint
      $return = array('contactmaint', 'No Contact Record Added. Unable to create record.', '0');	// da rivedere
      return $return;
      }
    } else {
      // send fail message and return to contactmaint
      $return = array('contactmaint', 'No Contact Record Added. Missing required information		
       or problem with user name or password.', '0');												// da rivedere
      return $return;
    }
  
  }
  
  public static function getUtenti() {
    // clear the results
    $items = '';
    // Get the connection  
    $connection = Database::getConnection();
    // Set up query
    $query = 'SELECT `id_utente`,`nome`,`cognome`,`level`, `email`, `username`) 
      FROM `utente` ORDER BY nome, cognome';
    // Run the query
    $result_obj = '';
    $result_obj = $connection->query($query);
    // Loop through the results, 
    // passing them to a new version of this class, 
    // and making a regular array of the objects
    try {  
      while($result = $result_obj->fetch_object('Utente')) {
        $items[]= $result;
      }
      // pass back the results
      return($items);
    }
    
    catch(Exception $e) {
      return false;
    }  
  }
  
  public function editRecord() {
    // Verify the fields
    if ($this->_verifyInput()) {
      
      // Get the Database connection
      $connection = Database::getConnection();

      // Update with a password changed
      if (trim($_POST['password1'])) {
        // prepare the encrypted password
        $hash_password = hash_hmac('sha512', 
          trim($_POST['password1']) . '!hi#HUde9' . $this->id_utente, 
          SITE_KEY);
        // Set up the prepared statement
        $query = 'UPDATE `utente` SET nome=?, cognome=?, 
          level=?, email=?, username=?, password=?, level=? 
          WHERE id_utente=?';
        $statement = $connection->prepare($query);
        // bind the parameters
        $statement->bind_param('ssssssssi',$this->nome, $this->cognome, 
          $this->level, $this->email, $this->username, $hash_password, $this->level, 
          $this->id_utente);  
      } else {
        // update without a password changed
        // Set up the prepared statement
        $query = 'UPDATE `utente` SET nome=?, cognome=?,
          level=?, email=?, username=?,  
          WHERE id_utente=?';
        $statement = $connection->prepare($query);
        // bind the parameters
        $statement->bind_param('sssssssi',$this->nome, $this->cognome, 
          $this->level, $this->email, $this->nome, $this->id_utente);
      }
      
      if ($statement) {
        $statement->execute();
        $statement->close();
        // add success message
        $return = array('', 'Utente Record successfully updated.');
        return $return;
      } else {
        $return = array('contactmaint', 'Utente Record not updated. Unable to change record.', '');	// da rivedere
        return $return;
      }

    } else {
      // send fail message and return to categorymaint
      $return = array('contactmaint', 'Utente Record not updated. Missing required information 	
        or problem with user name or password.', (int) $this->id_utente);										// da rivedere
      return $return;
    }
    
  }
  
  public static function getUtente($id) {
    // Get the database connection
    $connection = Database::getConnection();
    // Set up the query
    $query = 'SELECT `id_utente`,`nome`,`cognome`,`level`, `email`, `username`
      FROM `utente` WHERE id_utente="'. (int) $id.'"';
    // Run the MySQL command   
    $result_obj = '';    
      try {
        $result_obj = $connection->query($query);
        if (!$result_obj) {
          throw new Exception($connection->error);
        } else {
          $item = $result_obj->fetch_object('Utente');
          if (!$item) {
            throw new Exception($connection->error);
          } else {
            // pass back the results
            return($item);
          }
        }
      }
      catch(Exception $e) {
        echo $e->getMessage();
      }
  } 

  public static function getUtenteIdByUser($username) {   
    // Get the database connection
    $connection = Database::getConnection();  
    // set up the query
    $id = '';
    $query = 'SELECT id_utente FROM `utente` 
      WHERE username="'. Database::prep($username) .'" 
      LIMIT 1';
    
    $result_obj = '';  
    // Run the MySQL command
    $result_obj = $connection->query($query); 
      while($result = $result_obj->fetch_array(MYSQLI_ASSOC)) {
        $id = $result['id_utente'];
      }
    // if user name not found, return false
    if (!$id) {
      return false;
    } else {
      return $id;
    }
  }
  
  
  public static function deleteRecord($id) {
      // Get the Database connection
      $connection = Database::getConnection();     
      // Set up query
      $query = 'DELETE FROM `utente` WHERE id_utente="'. (int) $id.'"';
      // Run the query
      if ($result = $connection->query($query)) {   
        $return = array('', 'Utente Record successfully deleted.', '');
        return $return;
      } else {
        $return = array('contactdelete', 'Unable to delete Contact.', (int) $id);	// da rivedere
        return $return;
      }
  }
  
  public function getLevel_DropDown() {
    // set up first option for selection if none selected
    $option_selected = '';
    if (!$this->level) {
      $option_selected = ' selected="selected"';
    }
    
    // Get the categories
    $items = array('Registered', 'Admin');

    $html  = array();
    
    $html[] = '<label for="level">Choose Level</label><br />';
    $html[] = '<select name="level" id_utente="level">';
    
    foreach ($items as $i=>$item) { 
      // If the selected parameter equals the current category id then flag as selected
      if ($this->level == $item) {
        $option_selected = ' selected="selected"';
      }
      // set up the option line
      $html[]  =  '<option value="' . $item . '"' . $option_selected . '>' . $item . '</option>';
      // clear out the selected option flag
      $option_selected = '';
    }
    
    $html[] = '</select>';
    return implode("\n", $html);      
      
  }

  public static function logIn($item) {
    if (!$item['username'] || !$item['password']) {
      return array('login','Sorry, invalid UserName and/or Password.');
    }
    // Get the database connection
    $connection = Database::getConnection(); 
     
    // get the id for the user
    $id = self::getUtenteIdByUser($item['username']);
 
    if (!$id) { // if user name not found, return with error message
      return array('login','Sorry, invalid UserName and/or Password.','');
    } 
    
    $hash_password = hash_hmac('sha512', $item['password'] . '!hi#HUde9' . (int) $id, SITE_KEY);
  
    // Set up the query
    $query = 'SELECT id_utente, nome, cognome, username, level 
      FROM `utente` 
      WHERE username="'. $item['username'] .'" 
      AND password = "' . $hash_password . '" 
      LIMIT 1';
    // Run the MySQL command   
    $result_obj = '';  
    $result_obj = $connection->query($query);  
    try { 
      while ($result = $result_obj->fetch_array(MYSQLI_ASSOC)) {
        // pass back the results
        $_SESSION['id_utente'] = $result['id_utente'];
        $_SESSION['nome'] = $result['nome'];
        $_SESSION['cognome'] = $result['cognome'];
        $_SESSION['username'] = $result['username'];
        $_SESSION['level'] = $result['level'];
        return array('',"Welcome, {$_SESSION['nome']}", '');
       }
       return array('login','Sorry, invalid UserName and/or Password.','');
    }
    catch(Exception $e)
      {
        return false;
      }    
  }

  public static function logout() {  
    unset($_SESSION['id_utente']);
    unset($_SESSION['nome']);
    unset($_SESSION['cognome']);
    unset($_SESSION['username']);
    unset($_SESSION['level']);  
  }    
  
  public static function isLoggedIn() {  
    if (isset($_SESSION['id_utente'])) {
      return true;
    } else {
      return false;
    }
  }  

  public static function accessLevel() {  
    if (isset($_SESSION['level'])) {
      return $_SESSION['level'];
    } else {
      return false;
    }
  }
  
}
