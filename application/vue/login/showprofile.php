<div>
    <h1>Votre profil</h1>

    <div>
        Votre nom d'utilisateur: <?php echo Session::get('user_name'); ?>
        <a href='<?php echo URL; ?>login/editusername'>changer</a>
        </div>
    <div>
        Votre adresse mail: <?php echo Session::get('user_email'); ?>
        <a href='<?php echo URL; ?>login/edituseremail'>changer</a>
        </div>
    <div>
        Votre compte a pour niveau : <?php echo Session::get('user_account_type'); ?>
        <a href='<?php echo URL; ?>login/changeaccounttype'>changer</a>
        </div>
</div>

<div>

<a href='<?php echo URL; ?>login/changepassword'>Changer votre mot de passe</a>


</div>
