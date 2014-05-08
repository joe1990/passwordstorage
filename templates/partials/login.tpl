<!--
Partial for the login.
Is different if the user is logged out or logged int.

Author: Joel Holzer <joe_ehcb@hotmail.com>
Version: 1.0
-->
{if isset($loggedInUser)}
    <div id="logoutform">
        <div id="message">
            Logged in as {$loggedInUser->getUsername()}
            <br/>
            <a href="index.php?view=profile">Edit Profile</a>
        </div>
        <form method="post">
            <input type="submit" class="button" name="logout" value="logout"/>
        </form>
    </div>
{else}
    <div id="loginform">
        <form method="post">
            {include file="partials/loginerrors.tpl"}
            <dl>
                <dt>
                Username
                </dt>
                <dd>
                    <input class="loginfield" type="text" name="username" maxlength="50"/>
                </dd>
                <dt>
                Password
                </dt>
                <dd>
                    <input class="loginfield" type="password" name="password" maxlength="40"/>
                </dd>
            </dl>   
            <input type="submit" class="button" name="login" value="login"/>
        </form>
    </div>
{/if} 
