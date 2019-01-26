<?php

/**
 * Class Comment (commentaire)
 *
 */
class Comment extends Controller
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
        $this->view->render('comment/index');
    }

    function add($id_voyage)
    {
        //VERIFICATION<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
        Auth::handleLogin(); //Vérifie si l'utilisateur est bien loggé
        if(!isset($_POST['contenu']))
            return;
        if(!isset($_POST['evaluation']))
            return;
            if(!is_int($_POST['evaluation']))
                return;
            if($_POST['evaluation'] < 0 || $_POST['evaluation'] > 5)
                return;
        if(!is_int($id_voyage))
            return;
            else
                if($id_voyage <= 0)
                    return;
        $voyage_sql = new VoyageSQL();
        $voyage_tmp = $voyage_sql->findById($id_voyage)->execute();
        if(!$voyage_tmp->getEnligne() == 1) //Il faut que le voyage à commenter soit en ligne
            return;
        //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

        $user = Session::get('user_id');
        $c=new Commentaire($user, $id_voyage, $_POST['contenu'], date('m/d/Y h:i:s a', time()), $_POST['evaluation']);
        $c->save();
    }

    function delete($id)
    {
        if(!is_int($id))
            return null;
        if($id <= 0)
            return null;
        $commentaire_sql = new CommentaireSQL();
        $com_tmp = $commentaire_sql->findById($id);
        Auth::handleLogin();
        if(Session::get('user_id') != $com_tmp->getUser())
            return null;

        $com_tmp->delete();
        header("Location:".$_SERVER['HOST']); //est-ce que ça recharge la page courante ??
    }

    function showAll() //je doute qu'on ait besoin d'afficher tous les commentaires du site, mais on sait jamais..
    {
        $commentaire_sql = new CommentaireSQL();
        $this->view->lesCommentaires = $commentaire_sql->findAll()->execute();

        $this->view->render('comment/showAll');
    }

    function showAllByVoyage($idVoyage) //je doute qu'on ait besoin d'afficher tous les commentaires du site, mais on sait jamais..
    {
        if(!is_int($idVoyage))
            return null;
        if($idVoyage <= 0)
            return null;
        $commentaire_sql = new CommentaireSQL();
        $this->view->lesCommentaires = $commentaire_sql->findWithCondition("id_voyage = :idVoyage",array("idVoyage"=>$idVoyage))->execute();

        $this->view->render('trip/');
    }

}