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
                {$account->getWebsite()}
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
        <div class="backlink"><a href="index.php?action=accounts">< back</a></div>       
    {/if}
{/block}