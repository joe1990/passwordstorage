<!--
Template for the "Edit Account" form.

Author: Joel Holzer <joe_ehcb@hotmail.com>
Version: 1.0
-->
{extends file="index.tpl"}
{block name=title}PASSWORD STORAGE - Edit Account{/block}
{block name=body}
    <div class="title">
        <h2>Edit Account</h2>
    </div>
    {if isset($account)}
        <div id="accountform">
            <form method="post">
                {include file="partials/errors.tpl"}
                <dl>
                    <dt>
                        Title
                    </dt>
                    <dd>
                        <input type="text" name="title" size="40" maxlength="50" value="{$account->getTitle()}"/>
                    </dd>
                    <dt>
                       Website
                    </dt>
                    <dd>
                        <input type="text" name="website" size="40" maxlength="100" value="{$account->getWebsite()}"/>
                    </dd>
                    <dt>
                       Username
                    </dt>
                    <dd>
                        <input type="text" name="username" size="40" maxlength="50" value="{$account->getUsername()}"/>
                    </dd>
                    <dt>
                       Password
                    </dt>
                    <dd>
                        <input type="text" name="password" size="40" maxlength="40" value="{$account->getPassword()}"/>
                    </dd>
                </dl>
                <a class="linkbutton" href="index.php?view=accounts">cancel</a>
                <input type="submit" class="button" name="updateAccount" value="save"/>
                <input type="hidden" name="id" value="{$account->getId()}">
            </form>
        </div>   
    {/if}
{/block}