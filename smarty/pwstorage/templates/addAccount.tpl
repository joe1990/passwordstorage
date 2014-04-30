{extends file="index.tpl"}
{block name=title}PASSWORD STORAGE - Add Account{/block}
{block name=body}
    <div class="title">
        <h2>Add Account</h2>
    </div>
    <div id="accountform">
        <form method="post">
            {include file="errors.tpl"}
            <dl>
                <dt>
                    Title
                </dt>
                <dd>
                    {if isset($account)}
                        <input type="text" name="title" size="40" maxlength="50" value="{$account->getTitle()}"/>
                    {else}
                        <input type="text" name="title" size="40" maxlength="50"/>
                    {/if}
                </dd>
                <dt>
                   Website
                </dt>
                <dd>
                    {if isset($account)}
                        <input type="text" name="website" size="40" maxlength="100" value="{$account->getWebsite()}"/>
                    {else}
                        <input type="text" name="website" size="40" maxlength="100" />
                    {/if}
                    
                </dd>
                <dt>
                   Username
                </dt>
                <dd>
                    {if isset($account)}
                        <input type="text" name="username" size="40" maxlength="50" value="{$account->getUsername()}"/>
                    {else}
                        <input type="text" name="username" size="40" maxlength="50" />
                    {/if}        
                </dd>
                <dt>
                   Password
                </dt>
                <dd>
                    {if isset($account)}
                        <input type="text" name="password" size="40" maxlength="40" value="{$account->getPassword()}"/>
                    {else}
                        <input type="text" name="password" size="40" maxlength="40" />
                    {/if}
                </dd>
            </dl>
            <a class="linkbutton" href="index.php?action=accounts">cancel</a>
            <input type="submit" class="button" name="addAccount" value="Add"/>
        </form>
    </div>
{/block}