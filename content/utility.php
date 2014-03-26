<?php

/**
 * Ottiene la stringa del mese di una data
 * @param integer $intMonth
 */
function monthName($data) {
	switch (substr ( $data , 5, 2 )) {
		case "01":
			return "Gennaio";
			break;
		case "02":
			return "Febbraio";
			break;
		case "03":
			return "Marzo";
			break;
		case "04":
			return "Aprile";
			break;
		case "05":
			return "Maggio";
			break;
		case "06":
			return "Giugno";
			break;
		case "07":
			return "Luglio";
			break;
		case "08":
			return "Agosto";
			break;
		case "09":
			return "Settembre";
			break;
		case "10":
			return "Ottobre";
			break;
		case "11":
			return "Novembre";
			break;
		case "12":
			return "Dicembre";
			break;
	}
}

function year($data) {
	return substr ( $data , 0, 4 );
}

?>