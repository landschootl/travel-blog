<div>
    <h1>Changement du nom d'utilisateur</h1>

    <form action="<?php echo URL; ?>login/editusername_action"  method="post">
        <div>
            <label for="user_name">Nouveau nom d'utilisateur : </label>
            <div>
                <input type="text" class="form-control" id="user_email" name="user_name" required />
            </div>
        </div>
        <div>
            <div>
                <button type="submit" name="submit_new_username" value="Valide">
                    Valide
                </button>
            </div>
        </div>
    </form>
</div>
