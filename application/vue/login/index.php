<div>
    <h1>Login</h1>

    <form action="<?php echo URL; ?>login/login" method="post">

        <div>
            <label for="user_name">Nom login : </label>

            <div>
                <input type="text" id="user_name" name="user_name"
                       placeholder="Nom de login">
            </div>
        </div>
        <div>
            <label for="user_password">Mot de passe : </label>

            <div>
                <input type="password" id="user_password" name="user_password">
            </div>
        </div>
        <div>
            <div>
                <div>
                    <label for="user_rememberme">
                        <input type="checkbox" id="user_rememberme" name="user_rememberme"> Rester connecté (2
                        semaines)
                    </label>
                </div>
            </div>
        </div>

        <div>
            <div>
                <button type="submit" name="login">
                    Valide
                </button>
            </div>
        </div>
    </form>
</div>

