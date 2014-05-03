<!--
Template for the detail view of a specific account.

Author: Joel Holzer <joe_ehcb@hotmail.com>
Version: 1.0
-->
{extends file="index.tpl"}
{block name=title}PASSWORD STORAGE - Account Detail{/block}
{block name=body}
    <div class="title">
        <h2>Account Detail</h2>
    </div>
    {if isset($account)}
        <dl>
            <dt>
                <b>Title:</b>
            </dt>
            <dd>
                {$account->getTitle()}
            </dd>
            <dt>
                <b>Website:</b>
            </dt>
            <dd>
                <a href="{$account->getWebsite()}" target="_blank">{$account->getWebsite()}</a>
            </dd>
            <dt>
                <b>Username:</b>
            </dt>
            <dd>
                {$account->getUsername()}
            </dd>
            <dt>
                <b>Password:</b>
            </dt>
            <dd>
                {$account->getPassword()}
            </dd>
        </dl>
        <div class="backlink"><a href="index.php?view=accounts">< back</a></div>       
    {/if}
{/block}