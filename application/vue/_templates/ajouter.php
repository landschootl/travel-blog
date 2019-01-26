
<form action='ajouter.php' method='post'>
	<div class="creationTache">
		<fieldset>
			<legend>Ajouter un voyage</legend>
			
			<label for="titre">Titre</label> <input id="titre" type="text" placeholder="Intitule du voyage" value="" size="30"  name="titre"/> </br>
			
			<label for="description">Description</label> <textarea  id="description" type="text" placeholder="Description du voyage" value="" name="description" rows="15" cols="30"></textarea></textarea></br>
			
			<label> En ligne: </label>
			<input type="checkbox" name="en_ligne" />	</br>
			<div class="bouton">
				<input type="submit" value="Ajouter" />
			</div>
		</fieldset>
	</div>
	
</form>
		

