<!--   ..../trip/afficherUnVoyage/id -->

<?php foreach($this->lesVoyages as $v) {?>
		<?php echo $v->titre;?>
		<?php echo $v->getUser()->user_name;?>
		<?php echo $v->getMedia()->affiche();?>
		<br />
<?php 	}?>
