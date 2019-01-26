<?php
foreach($this->lesVoyages as $v) {
	echo $v->titre;
	echo $v->getUser()->user_name;
}
?>