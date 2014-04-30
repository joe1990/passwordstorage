{extends file="index.tpl"}
{block name=title}PASSWORD STORAGE - Register{/block}
{block name=body}
    <div class="title">
        <h2>Register</h2>
    </div>
    <div id="registerform">
        <form method="post">
            {include file="errors.tpl"}
            <dl>
                <dt>
                    Username
                </dt>
                <dd>
                     <input type="text" name="username" size="40" maxlength="50"/> mind. 5 Zeichen
                </dd>
                <dt>
                   Password
                </dt>
                <dd>
                    <input type="password" name="password" size="40" maxlength="40"/> mind. 5 Zeichen
                </dd>
                <dt>
                   Re-enter Password
                </dt>
                <dd>
                    <input type="password" name="passwordagain" size="40" maxlength="40"/> mind. 5 Zeichen
                </dd>
            </dl>
            <input type="submit" class="button" name="register" value="register"/>
        </form>
    </div>
{/block}