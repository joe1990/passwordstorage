{extends file="index.tpl"}
{block name=title}PASSWORD STORAGE - Profile{/block}
{block name=body}
    <div class="title">
        <h2>Edit Profile</h2>
    </div>
    <div id="form_register">
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
                <input type="password" name="password" size="40" maxlength="40"/>
            </dd>
            <dt>
               Re-enter Password
            </dt>
            <dd>
                <input type="password" name="password-again" size="40" maxlength="40"/>
            </dd>
        </dl>
        <a href="#" class="button">Save</a>
    </div>
{/block}