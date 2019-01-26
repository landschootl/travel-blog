<?php
/**
 * Class Format (media)
 */

class Format extends Controller
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
        $this->view->render('media/index');
    }

    function add($id_etape)
    {
        Auth::handleLogin(); //Vérifie si l'utilisateur est bien loggé
        if(!isset($_POST['url']))
            return;
        if(!isset($_POST['format']))
            return;
        if(!($_POST['format'] == "jpg" || $_POST['format'] == "png" || $_POST['format'] =="mp3" || $_POST['format'] == "mp4"))
            return;
        if(!is_int($id_etape))
            return;
        else
            if($id_etape <= 0)
                return;

         /**Penser à faire des vérifications sur l'id_etape reçu (mais c'est long)**/

        $m=new Media($_POST['url'], $_POST['format'], $id_etape);
        $m->save();
    }

    function delete($id)
    {
        $media_sql = new MediaSQL();
        $m = $media_sql->findById($id);
        $m->delete();
        header("Location:".$_SERVER['HTTP_REFERER']);
    }

    function showAll()
    {
        $media_sql = new MediaSQL();
        $this->view->lesMedias = $media_sql->findAll()->execute();

        $this->view->render('format/showAll');
    }

    function showById($id)
    {
        $media_sql = new MediaSQL();
        $this->view->lesMedias = $media_sql->findById($id)->execute();

        $this->view->render('format/showFormat');
    }

}