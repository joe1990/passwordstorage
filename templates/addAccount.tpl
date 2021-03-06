<!--
Template for the "Add Account" form.

Author: Joel Holzer <joe_ehcb@hotmail.com>
Version: 1.0
-->
{extends file="index.tpl"}
{block name=title}PASSWORD STORAGE - Add Account{/block}
{block name=body}
    <div class="title">
        <h2>Add Account</h2>
    </div>
    <div id="accountform">
        <form method="post">
            {include file="partials/errors.tpl"}
            <dl>
                <dt>
                    Title
                </dt>
                <dd>
                    {if isset($account)}
                        <input type="text" name="title" class="accountfield" maxlength="50" value="{$account->getTitle()}"/>
                    {else}
                        <input type="text" name="title" class="accountfield" maxlength="50"/>
                    {/if}
                </dd>
                <dt>
                   Website
                </dt>
                <dd>
                    {if isset($account)}
                        <input type="text" name="website" class="accountfield" maxlength="100" value="{$account->getWebsite()}"/>
                    {else}
                        <input type="text" name="website" class="accountfield" maxlength="100" />
                    {/if}
                    
                </dd>
                <dt>
                   Username
                </dt>
                <dd>
                    {if isset($account)}
                        <input type="text" name="username" class="accountfield" maxlength="50" value="{$account->getUsername()}"/>
                    {else}
                        <input type="text" name="username" class="accountfield" maxlength="50" />
                    {/if}        
                </dd>
                <dt>
                   Password
                </dt>
                <dd>
                    {if isset($account)}
                        <input type="text" name="password" class="accountfield" maxlength="40" value="{$account->getPassword()}"/>
                    {else}
                        <input type="text" name="password" class="accountfield" maxlength="40" />
                    {/if}
                </dd>
            </dl>
            <a class="linkbutton" href="index.php?view=accounts">cancel</a>
            <input type="submit" class="button" name="addAccount" value="Add"/>
        </form>
    </div>
{/block}