<?php

class Commentaire extends Table {
    public $id_personne;
    public $id_voyage;
    public $contenu;
    public $date_post;
    public $evaluation;
    protected $user;
    protected $voyage;
    
    public function __construct($id_personne="",$id_voyage="",$contenu="",$date_post="",$evaluation="",$id=false) {
        parent::__construct();
        $this->id_personne = $id_personne;
        $this->id_voyage = $id_voyage;
        $this->contenu = $contenu;
        $this->date_post = $date_post;
        $this->evaluation = $evaluation;
        $this->voyage = false;
        $this->user = false;
        $this->id = $id;
    }

    public function getVoyage() {
        if($this->voyage==false || $this->voyage->id!=$this->id_voyage) {
            $sql = new VoyageSQL();
            $this->voyage = $sql->findById($this->id_voyage);
        }
        return $this->voyage;
    }
 
    public function getUser() {
        if($this->user==false || $this->user->id!=$this->id_personne) {
            $sql = new UsersSQL();
            $this->user = $sql->findById($this->id_personne);
        }
        return $this->user;
    }

}