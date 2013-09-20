<?php
/**
 * Utente class
 *
 * @package    Arteditor
 */
class Utente
{
	/**
	 * Cognome
	 * @var string
	 */
	protected $Cognome;

	/**
	 * Nome
	 * @var String
	 */
	protected $Nome;

	/**
	 * Username
	 * @var string
	 */
	protected $username;

	/**
	 * Initialize the Utente with cognome, nome, username
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
	 * Return Cognopme
	 * @return string
	 */
	public function getCognome() {
		return $this->Cognome;
	}

	/**
	 * Return Nome
	 * @return string
	 */
	public function getNome() {
		return $this->Nome;
	}

	/**
	 * Return Username
	 * @return string
	 */
	public function getUsername() {
		return $this->username;
	}
	
}