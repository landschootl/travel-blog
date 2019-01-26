<div>
    <h1>Changement de l'adresse mail</h1>

    <form action="<?php echo URL; ?>login/edituseremail_action" method="post">
        <div>
            <label for="user_email" >Nouvelle adresse : </label>
            <div>
                <input type="text" id="user_email" name="user_email" required />
            </div>
        </div>
        <div>
            <div>
                <button type="submit" name="submit_new_mail" value="Valide">
                    Valide 
                </button>
            </div>
        </div>
    </form>
</div>