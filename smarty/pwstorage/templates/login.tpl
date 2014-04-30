
    {if isset($loggedInUser)}
        <div id="logoutform">
            <div id="message">
                Logged in as {$loggedInUser->getUsername()}
                <br/>
                <a href="index.php?action=profile">Edit Profile</a>
            </div>
            <form method="post">
                <input type="submit" class="button" name="logout" value="logout"/>
            </form>
        </div>
    {else}
        <div id="loginform">
            <form method="post">
                {include file="loginerrors.tpl"}
                <dl>
                    <dt>
                        Username
                    </dt>
                    <dd>
                        <input type="text" name="username" size="30" maxlength="50"/>
                    </dd>
                    <dt>
                        Password
                    </dt>
                    <dd>
                        <input type="password" name="password" size="30" maxlength="40"/>
                    </dd>
                </dl>   
                <input type="submit" class="button" name="login" value="login"/>
            </form>
        </div>
    {/if} 
