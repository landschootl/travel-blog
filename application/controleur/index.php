<?php

/**
 * Class Index
 * The index controller
 */
class Index extends Controller
{
    /**
     * Construct this object by extending the basic Controller class
     */
    function __construct()
    {
        parent::__construct();
    }

    /**
     * Handles what happens when user moves to URL/index/index, which is the same like URL/index or in this
     * case even URL (without any controller/action) as this is the default controller-action when user gives no input.
     */
    function index()
    {
    // Des tests...
//        $m = new Media("toto","mp3",null);
//        $m->save();
//        $vsql=new VoyageSQL();
//        $voyage = $vsql->findById(1);
    	$voyageSQL=new VoyageSQL();
    	$this->view->lesVoyages = $voyageSQL->findWithCondition("en_ligne=1")->orderBy("id DESC")->limit(0,5)->execute();
    	
    	$this->view->render('trip/index');
    }

    function sujet()
    {
        $this->view->render('index/sujet');
    }

    function about()
    {
        $this->view->render('index/about');
    }

    function contact()
    {
        $this->view->render('index/contact');
    }
}
