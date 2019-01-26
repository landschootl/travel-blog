<?php

class Voyage extends Table {
    public $titre;
    public $description;
    public $en_ligne;
    public $id_media_titre;
    public $id_auteur;
    protected $user;
    protected $media;
    
    public function __construct($titre="",$description="",$en_ligne="",$id_media_titre="",$id_auteur="",$id=false) {
        parent::__construct();
        $this->titre=$titre;
        $this->description=$description;
        $this->en_ligne=$en_ligne;
        $this->id_media_titre=$id_media_titre;
        $this->id_auteur=$id_auteur;
        $this->id = false;
        $this->media =  false;
        $this->user = false;
    }
    
    
    public function getMedia() {
        if($this->media==false || $this->media->id!=$this->id_media_titre) {
            $sql = new MediaSQL();
            $this->media = $sql->findById($this->id_media_titre);
        }
        return $this->media;
    }
    
	public function getUser() {
        if($this->user==false || $this->user->id!=$this->id_auteur) {
            $sql = new UsersSQL();
            $this->user = $sql->findById($this->id_auteur);
        }
        return $this->user;
    }

    public function getCommentaires() {
        if($this->id==false) return array();
        $sqlCommentaire = CommentaireSQL();        
        return $sqlCommentaire->findById_voyage($this->id)->execute();

    }
    
    public function getEtapes() {
        if($this->id==false) return array();
        $etapeSQL = new EtapeSQL();
        return $etapeSQL->findById_voyage($this->id)->execute();            
    }
    
    public function getEnLigne(){
    	return $this->en_ligne;
    }
}