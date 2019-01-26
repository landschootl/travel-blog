<div>
    <h1>Inscription</h1>
    <!-- register form -->
    <form method="post" action="<?php echo URL; ?>login/register_action"
          name="registerform">
        <!-- the user name input field uses a HTML5 pattern check -->
        <div>
            <label for="user_name">Nom login : </label>

            <div>
                <input type="text" class="form-control" id="user_name" name="user_name"
                       placeholder="Nom de login (only letters and numbers, 2 to 64 characters)"
                       pattern="[a-zA-Z0-9]{2,64}" required>
            </div>
        </div>

        <div>
            <label for="login_input_email">Adresse Mail : </label>

            <div>
                <input type="email" class="form-control" id="user_email" name="user_email"
                       placeholder="Adresse mail" required>
            </div>
        </div>

        <div>
            <label for="login_input_password_new">Mot de passe : </label>

            <div>
                <input type="password" id="login_input_password_new" name="user_password_new"
                       pattern=".{6,}" required autocomplete="off">
                Mot de passe (min. 6 characters!)
            </div>
        </div>

        <div>
            <label for="login_input_password_repeat">Vérif. Mot de passe : </label>

            <div>
                <input type="password" id="login_input_password_repeat" name="user_password_repeat"
                       pattern=".{6,}" required autocomplete="off"/>
            </div>
        </div>


        <div>
            <div>
                <button type="submit" name="register" value="register">
                    Valide
                </button>
            </div>
        </div>

    </form>
</div>
