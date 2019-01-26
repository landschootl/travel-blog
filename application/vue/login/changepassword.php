<div>

        <h1>Changement du mot de passe</h1>

        <!-- new password form box -->
        <form method="post" action="<?php echo URL; ?>login/setnewpassword"
              name="new_password_form">
            <input type='hidden' name='user_name' value='<?php echo $this->user_name; ?>'/>

            <div>
                <label for="reset_input_password_new">Mot de passe : </label>

                <div>
                    <input type="password" id="reset_input_password_new" name="user_password_new"
                           pattern=".{6,}" required autocomplete="off">
                    Mot de passe (min. 6 characters!)
                </div>
            </div>

            <div>
                <label for="reset_input_password_repeat">Vérif. Mot de passe : </label>

                <div>
                    <input type="password" id="reset_input_password_repeat"
                           name="user_password_repeat" pattern=".{6,}" required autocomplete="off"/>
                </div>
            </div>


            <div>
                <div>
                    <button type="submit" name="submit_new_password"
                            value="Valide le nouveau mot de passe">
                        Valide
                    </button>
                </div>
            </div>
        </form>

 </div>
