<form action="content/insertArticolo.php" method="post">
	<fieldset>
		<legend><i>Inserimento post</i></legend>
			
			<ul>
				<li><label for="Titolo">Titolo</label><br />
				<input id="titolo" name="titolo" type="text" /></li>
				<li><label for="Contenuto">Contenuto</label><br />
				<textarea id="contenuto" name="contenuto" rows="10" cols="100">
				</textarea></li>
			</ul>
						
			<input type="submit" name="save" value="Save" />
	</fieldset>
</form>