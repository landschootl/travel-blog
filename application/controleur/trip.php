<?php

/**
 * Class Trip (voyage)
 */
class Trip extends Controller
{
    /**
     * Construct this object by extending the basic Controller class
     */
    function __construct()
    {
        parent::__construct();
    }

    /**
     * This method controls what happens when you move to /help/index in your app.
     */
    function index()
    {
        $this->view->render('trip/index');
    }
    
    function mesVoyages()
    {
    	$voyage_sql = new VoyageSQL();
    	$lesVoyages = $voyage_sql->findWithCondition("id_auteur = :idAuteur",array("idAuteur"=>Session::get('user_id')))->execute();
    	
    	foreach($lesVoyages as $voy) {
    		if($voy->getEnLigne() == 0)
    			unset($voy);
    	}
    	
    	$this->view->lesVoyages = $lesVoyages;
    	$this->view->render('trip/mesVoyages');
    }
    
    function add()
    {
    	Auth::handleLogin();
    	if(empty($_POST['titre']) OR empty ($_POST['description'])){ //OR empty ($_POST['userfile'])
    		echo '<script type="text/javascript">window.alert("Tous les champs ne sont pas remplis");</script>';
    		return;
    	}
    	if(empty($_POST['en_ligne']))
    		$en_ligne=0;
    	else
    		$en_ligne=1;
    	if(!ctype_alpha($_POST['titre'])){
    		echo '<script type="text/javascript">window.alert("Le titre doit contenir que des lettres");</script>';
    		return;
    	}
    	/*$extensions = array('.png', '.gif', '.jpg', '.jpeg');
		$extension = strrchr($_FILES['userfile']['name'], '.'); 
		//Début des vérifications de sécurité...
		if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
		{
		     $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
		}

		if ((isset($_FILES['userfile']['tmp_name']))) {
			$chemin_destination = 'public/images/';
			move_uploaded_file($_FILES['userfile']['tmp_name'], $chemin_destination.$_FILES['userfile']['name']);
			$url = $chemin_destination . $_FILES['userfile']['name'];
			$m=new Media($url, $extension, 1);
			echo $m->affiche();
			$m->save();
		}*/
    	
    	$v=new Voyage($_POST['titre'], $_POST['description'], $en_ligne, null, Session::get('user_id'));
    	$v->save();
    	
    	$this->view->leVoyage = $v;
    	$this->view->render('trip/ajouterEtape');
    }
    
    function delete($id)
    {
    	Auth::handleLogin();
    	$voyageSQL=new VoyageSQL();
    	$voyage = $voyageSQL->findById($id);
    	
    	$voyage->delete();
    	header("Location:".$_SERVER['HTTP_REFERER']);
    }

    function showAll(){
    	$voyageSQL=new VoyageSQL();
		$lesVoyages = $voyageSQL->findAll()->execute();

		foreach($lesVoyages as $voy) {
			if($voy->getEnLigne() == 0)
				unset($voy);
		}

		$this->view->lesVoyages = $lesVoyages;
    	$this->view->render('trip/afficherAll');
    }
    
	function showById($id){
    	$voyage_sql = new VoyageSQL();
    	$leVoyage = $voyage_sql->findById($id)->execute();

		//VERIFICATIONS_<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
		if($leVoyage->getEnLigne() != 1) {	//Si le voyage n'est pas en ligne
			Auth::handleLogin();            //Est-ce que ça quitte la fonction si l'utilisateur n'est pas loggé ?
			if(Session::get('user_id') != $leVoyage->getUser()) //On vérifie l'utilisateur est bien le propriétaire du voyage
				return;
		}
		//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

		$this->view->leVoyage = $leVoyage;
    	$this->view->render('trip/afficherUnVoyage');
    }
    

	function showStepsByTrip($idVoyage) {
		//VERIFICATIONS_<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
		if(!isset($idVoyage))
			return;
		if($idVoyage<=0)
			return;
		$voyage_sql = new VoyageSQL();
		$voyage_tmp = $voyage_sql->findById($idVoyage)->execute();
		if($voyage_tmp->getEnLigne() != 1) { 	//Si le voyage n'est pas en ligne
			Auth::handleLogin();            //Est-ce que ça quitte la fonction si l'utilisateur n'est pas loggé ?
			if (Session::get('user_id') != $voyage_tmp->getUser()) //On vérifie l'utilisateur est bien le propriétaire du voyage
				return;
		}
		//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
		
		$etape_sql = new EtapeSQL();
		$this->view->etapes_du_voyages = $etape_sql->findWithCondition("id_voyage = :idVoyage",array("idVoyage"=>$idVoyage))->execute();
		$this->view->render('trip/afficherUnVoyage'); /**A mon avis changer la destination en 'trip/showEtapesVoyage'*/
	}
		
	function showLatest($nb=5) { //Ici on ne fait pas de vérifs, on affiche juste les $nb derniers voyages mis en ligne
		$voyage_sql = new VoyageSQL();
		$this->view->lesVoyages = $voyage_sql->findWithCondition("en_ligne=1")->orderBy("id DESC")->limit(0,$nb)->execute();
		$this->view->render('trip/index');
	}
	

	function search($search) {
		$voyage_sql = new VoyageSQL();
		$condition = "en_ligne=1 AND titre=:search";
		$this->view->lesVoyages = $voyage_sql->findWithCondition($condition,array("search"=>$search))->execute(); //on affiche tous les voyages qui sont en ligne
	
		$this->view->render('trip/afficherAll'); //Je pense qu'on peut utiliser le show all, le système d'affichage est le même..
	}
	
	
    
}
