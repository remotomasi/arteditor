<form action="../index.php" method="get">
	<fieldset>
		<legend><i>Inserimento post</i></legend>
			
			<ul>
				<li><label for="Titolo">Titolo</label><br />
				<input id="titolo" name="titolo" type="text" /></li>
				
				<li><label for="Contenuto">Contenuto</label><br />
				<textarea id="contenuto" name="contenuto" rows="10" cols="100">
				</textarea></li>
			
			</ul>
						
			<input name="insertPostForm" type="submit" value="Insert" />
	</fieldset>
</form>