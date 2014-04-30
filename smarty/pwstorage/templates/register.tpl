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
                    {if isset($user)}
                        <input type="text" name="username" size="40" maxlength="50" value="{$user->getUsername()}"/> <span class="fieldnote">mind. 5 Zeichen</span>
                    {else}
                        <input type="text" name="username" size="40" maxlength="50" /> <span class="fieldnote">mind. 5 Zeichen</span>
                    {/if}
                </dd>
                <dt>
                   Password
                </dt>
                <dd>
                    <input type="password" name="password" size="40" maxlength="40"/> <span class="fieldnote">mind. 5 Zeichen</span>
                </dd>
                <dt>
                   Re-enter Password
                </dt>
                <dd>
                    <input type="password" name="passwordagain" size="40" maxlength="40"/> <span class="fieldnote">mind. 5 Zeichen</span>
                </dd>
            </dl>
            <input type="submit" class="button" name="register" value="register"/>
        </form>
    </div>
{/block}