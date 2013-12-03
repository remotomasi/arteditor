enableSubmit = function() {
	if (document.getElementById("titolo").value.trim() != "" && document.getElementById("contenuto").value.trim() != "")
		document.getElementById("save").disabled = false;
	else 
		document.getElementById("save").disabled = true;
}