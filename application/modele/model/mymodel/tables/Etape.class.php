<?php

class Etape extends Table {
    public $intitule;
    public $description;
    public $debut;
    public $fin;
    //public $ordre;
    public $id_voyage;
    protected $voyage;
    
    public function __construct($intitule="",$description="",$debut="",$fin="",$id_voyage="", $id=false) {
        parent::__construct();
        $this->intitule = $intitule;
        $this->description = $description;
        $this->debut = $debut;
        $this->fin = $fin;
        $this->id_voyage = $id_voyage;
        $this->voyage = false;
        $this->id = $id;
    }
    
    
    public function getVoyage() {
            
        if($this->voyage==false || $this->voyage->id!=$this->id_voyage) {
            $sql = new VoyageSQL();
            $this->voyage = $sql->findById($this->id_voyage);
        }
        return $this->voyage;
    }

    public function getMedias() {
        if($this->id==false) return array();
        $sqlMedias = new MediaSQL();        
        return $sqlMedias->findById_etape($this->id)->execute();
    }


}