<?php

class Users extends Table {
    public $user_name;
    public $user_password_hash;
    public $user_id_media_profil;
    public $user_email;
    public $user_active;
    public $user_account_type;
    public $user_rememberme_token;
    public $user_creation_timestamp;
    public $user_last_login_timestamp;
    public $user_failed_logins;
    public $user_last_failed_login;
    public $user_activation_hash;
    public $user_password_reset_hash;
    public $user_password_reset_timestamp;

   public function __construct() {
        parent::__construct();
    }

}