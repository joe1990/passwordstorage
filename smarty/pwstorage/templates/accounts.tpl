{extends file="index.tpl"}
{block name=title}PASSWORD STORAGE - Accounts{/block}
{block name=body}
    <div class="title">
        <h2>Accounts</h2>
    </div>
    <div class="introtext">
        <a class="addIcon" href="index.php?action=addAccount">Add Account </a>
    </div>
    {include file="success.tpl"}
    <table>
    {foreach item=account from=$accounts}
        <tr>
            <td>
                <a class="detailIcon" href="index.php?action=showAccount&item={$account->getId()}"> </a>
                <a class="editIcon" href="index.php?action=editAccount&item={$account->getId()}"> </a>
                <a class="deleteIcon" onclick="return confirm('Are you sure to delete this account?')" href="index.php?action=deleteAccount&item={$account->getId()}"> </a>
            </td>
            <td>
                <b>{$account->getTitle()}</b>
            </td>
            <td>
                {$account->getWebsite()}
            </td>
        </tr>        
    {/foreach}
    </table>
{/block}