<?php 
	echo $this->leVoyage->titre . '<BR />';
	echo $this->leVoyage->description;
?>

<form method="POST" action="<?php echo URL?>step/add/<?php echo $this->leVoyage->getId(); ?>" enctype="multipart/form-data">
	<div class="form-group">
		 <label for="intitule">Titre :</label>
		 <div class="controls">
		     <input type="text" class="form-control" name="title" placeholder="Ex : Ville">
		 </div>
	</div>
	<div class="form-group">
		<label for="desc">Description :</label>
		<div class="controls">
			<textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-2">
			 <label for="date">Date Début :</label><br>
			<div class="controls">
				<input type="text" class="form-control input-small" id="date1" name="dateD" placeholder="jj/mm/aaaa"></input>
			</div>
		</div>
		<div class="col-xs-2">
			<label for="date">Date Fin :</label><br>
			<div class="controls">
				<input type="text" class="form-control input-small" id="date2" name="dateF" placeholder="jj/mm/aaaa"></input>
			</div>
		 </div><br><br>
	</div><br>
	<h4>Ajout d'images</h4>
	<div class='file_upload' id='f1'><input name='file[]' type='file'/></div>
	<div id='file_tools'>
		<img src="<?php echo URL; ?>public/images/file_add.png" id='add_file' title='Add new input'/>
		<img src="<?php echo URL; ?>public/images/file_del.png" id='del_file' title='Delete'/>
	</div>
	<br>
		<input type="hidden" name="nbEtape" value="1">
		<button type="submit" id="submit" name="submit" class="btn btn-primary">Confirmer !</button>
</form>
	
	
<script type='text/javascript'>
$(document).ready(function(){
    var counter = 2;
    var limit = 5;
    $('#del_file').hide();
    
    $('img#add_file').click(function(){
    if(counter<limit){
        $('#file_tools').before('<div class="file_upload" id="f'+counter+'"><input name="file[]" type="file"></div>');
        $('#del_file').fadeIn(0);
        counter++;
    }	
    
    });
    $('img#del_file').click(function(){
        if(counter==3){
            $('#del_file').hide();
        }   
        counter--;
        $('#f'+counter).remove();
    });
});
</script>