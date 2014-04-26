{extends file="index.tpl"}
{block name=title}PASSWORD STORAGE - Register{/block}
{block name=body}
    <div class="title">
        <h2>Register</h2>
    </div>
    <div id="form_register">
        <dl>
            <dt>
                Username
            </dt>
            <dd>
                 <input type="text" name="username" size="40" maxlength="50"/>
            </dd>
            <dt>
               Password
            </dt>
            <dd>
                <input type="password" name="password" size="40" maxlength="40"/>
            </dd>
            <dt>
               Re-enter Password
            </dt>
            <dd>
                <input type="password" name="password-again" size="40" maxlength="40"/>
            </dd>
        </dl>
        <a href="#" class="button">Register</a>
    </div>
{/block}