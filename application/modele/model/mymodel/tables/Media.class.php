<?php

class Media extends Table {
    public $url;
    public $format;
    public $id_etape;
    protected $etape;

    public function __construct($url="",$format="",$id_etape="",$id=false) {
    	parent::__construct();
    	$this->url=$url;
        $this->format=  $format;
        $this->id_etape = $id_etape;
        $this->etape = false;
        $this->id = false;
    }    
    
    public function getEtape() {
            
        if($this->id_etape==false)
            return false;
        if($this->etape==false || $this->etape->id!=$this->id_etape) {
            $sql = new EtapeSQL();
            $this->etape = $sql->findById($this->id_etape);
        }
        return $this->etape;
    }

    public function affiche() {
    	//if($format=".jpg")
    		return "<img src='$this->url' border='0' align='center' width=200 height=100%></img>";
    }
    
    public function getUrl(){
    	return $this->url;
    }

}