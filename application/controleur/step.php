<?php

/**
 * Class Step (√©tape)
 *
 */
class Step extends Controller
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
        $this->view->render('step/index');
    }

    /*function add($id_voyage)
    {
        Auth::handleLogin(); //V√©rifie si l'utilisateur est bien logg√©
        if(!isset($_POST['intitule']))
            return;
        if(!isset($_POST['debut']))
            return;
        if(!isset($_POST['fin']))
            return;
        if(!is_int($id_voyage))
            return;
        else
            if($id_voyage <= 0)
                return;
        $voy_sql = new VoyageSQL();                             //On v√©rifie si le voyage est bien un voyage de l'utilisateur
        $user = Session::get('user_id');
        $lesVoyages = $voy_sql->findWithCondition("id_auteur = :idAuteur", array("idAuteur"=>$user));
        $bool = false;
        foreach($lesVoyages as $voy) {
            if ($voy->$id == $id_voyage) {
                $bool = true;
                break;
            }
        }
        if($bool == false)
            return;

        $s=new Etape($_POST['intitule'], $_POST['titre'], $_POST['description'], $_POST['debut'], $_POST['fin'], $id_Voyage);
        $s->save();
    }*/

    
    function add($idVoyage){
    	$this->view->nextStep = false;
    	if ( isset($_POST['submit']) ) {
    		//$this->view->nbStep=0;
    		$this->view->error = "";
    		if(!empty($_POST['title']) && !empty($_POST['desc']) && !empty($_POST['dateD'])&& !empty($_POST['dateF']) && !empty($_POST['nbEtape'])){
    			list( $jourD, $moisD, $anneeD) = sscanf( $_POST['dateD'], "%d/%d/%d" );
    			$dateD = $anneeD .'-'. $moisD .'-'. $jourD;
    			list( $jourF, $moisF, $anneeF) = sscanf( $_POST['dateF'], "%d/%d/%d" );
    			$dateF = $anneeF .'-'. $moisF .'-'. $jourF;
    			//echo $_POST['title']." ". $_POST['desc']." " .$dateD. " ".$dateF. " ".$idVoyage;
    			$e=new Etape($_POST['title'], $_POST['desc'], $dateD, $dateF, $idVoyage);
    			//print_r($e);
    			$e->save();
    			$id=$e->getId();
    			$this->view->nextStep = true;
    
    			/*if(isset($_FILES) && !empty($_FILES)){
    				$len = count($_FILES['file']);
    				$uploads_dir = "public/images/medias/";
    				for($i = 0; $i < $len; $i++) {
    					$extensions = array('.png', '.gif', '.jpg', '.jpeg');
    					$extension = strrchr($_FILES['userfile']['name'], '.');
    					//DÈbut des vÈrifications de sÈcuritÈ...
    					if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
    					{
    						$erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
    					}
    					
    					if ((isset($_FILES['file']['tmp_name']))) {
    						$chemin_destination = 'public/images/';
    						move_uploaded_file($_FILES['userfile']['tmp_name'], $chemin_destination.$_FILES['userfile']['name']);
    						$url = $chemin_destination . $_FILES['userfile']['name'];
    						$m=new Media($url, $extension, 1);
    						echo $m->affiche();
    						$m->save();
    					}
    				}
    			}
    		}else{
    			$this->view->error = "L'un des champs est vide";
    		}
    		
    		 $this->view->idVoyage=$idVoyage;
    		$this->view->render('trip/ajouterEtape');*/
    		}
    		header("location:".$_SERVER['HTTP_REFERER']);
    	}
    }
    
    
    
    
    function delete($id)
    {
        $etape_sql = new EtapeSQL();
        $s = $etape_sql->findById($id);
        $s->delete();
        header("Location:".$_SERVER['HTTP_REFERER']);
    }

    function showAll()
    {
        $etape_sql = new EtapeSQL();
        $this->view->lesEtapes = $etape_sql->findAll()->execute();

        $this->view->render('step/showAll');
    }

    function showById($id)
    {
        $etape_sql = new EtapeSQL();
        $this->view->lesEtapes = $etape_sql->findById($id)->execute();;

        $this->view->render('step/ShowStep');
    }

}