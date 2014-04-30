{extends file="index.tpl"}
{block name=title}PASSWORD STORAGE - Profile{/block}
{block name=body}
    <div class="title">
        <h2>Edit Profile</h2>
    </div>
    <div id="registerform">
        <form method="post">
            {include file="errors.tpl"}
            {include file="success.tpl"}
            <dl>
                <dt>
                    Username
                </dt>
                <dd>
                     <input type="text" name="username" size="40" maxlength="50" value="{$user->getUsername()}" disabled/>
                </dd>
                <dt>
                   New Password
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
            <input type="submit" class="button" name="saveProfile" value="save"/>
        </form>
    </div>
{/block}