<div>
         <h1>Changement de niveau pour le compte</h1>

        <h2>Niveau actuel du compte: <?php echo Session::get('user_account_type'); ?></h2>
        <!-- basic implementation for two account type: type 1 and type 2 -->
        <?php if (Session::get('user_account_type') == 1) { ?>
            <form action="<?php echo URL; ?>login/changeaccounttype_action" method="post">
                <label></label>
                <input type="submit" name="user_account_upgrade" value="Niveau plus autorisé"/>
            </form>
        <?php } elseif (Session::get('user_account_type') == 2) { ?>
            <form action="<?php echo URL; ?>login/changeaccounttype_action" method="post">
                <label></label>
                <input type="submit" name="user_account_downgrade" value="Niveau moins autorisé"/>
            </form>
        <?php } ?>
</div>