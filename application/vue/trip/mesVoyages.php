<div>
<h3>Mes voyages</h3>
</div>

<form action='<?php echo URL; ?>trip/add' method='post' enctype="multipart/form-data">
	<div class="creationTache">
		<fieldset>
			<h2>Ajouter un voyage</h2>
			<label for="titre">Titre:</label> <input id="titre" type="text" placeholder="Intitule du voyage" value="" size="30"  name="titre"/> 
			<label for="description">Description:</label> <textarea  id="description" type="text" placeholder="Description du voyage" value="" name="description" rows="15" cols="30"></textarea></br>
			<input name="userfile" type="file" />
			<label> En ligne: </label>
			<input type="checkbox" name="en_ligne" />	</br>
			<div class="bouton">
				<input type="submit" value="Ajouter" />
			</div>
		</fieldset>
	</div>
</form>


<?php foreach($this->lesVoyages as $v) {?>
		<?php echo $v->titre;?>
		<?php echo $v->getUser()->user_name;?>
		<?php echo $v->getMedia()->affiche();?>
		<br />
<?php 	}?>