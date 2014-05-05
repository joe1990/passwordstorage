<!--
Template for the "Account" List.

Author: Joel Holzer <joe_ehcb@hotmail.com>
Version: 1.0
-->
{extends file="index.tpl"}
{block name=title}PASSWORD STORAGE - Accounts{/block}
{block name=body}
    <div class="title">
        <h2>Accounts</h2>
    </div>
    <div class="introtext">
        <a class="addIcon" href="index.php?view=addAccount">Add Account </a>
    </div>
    {include file="partials/success.tpl"}
    <table>
    {foreach item=account name=accounts from=$accounts}
        <tr>
            <td>
                <a class="detailIcon" href="index.php?view=showAccount&item={$account->getId()}"> </a>
                <a class="editIcon" href="index.php?view=editAccount&item={$account->getId()}"> </a>
                <a class="deleteIcon" onclick="return confirm('Are you sure to delete this account?')" href="index.php?view=deleteAccount&item={$account->getId()}"> </a>
            </td>
            <td>
                <b>{$account->getTitle()}</b>
            </td>
            <td>
                {$account->getWebsite()}
            </td>
        </tr>        
    {/foreach}
    {if {$smarty.foreach.accounts.total} == 0}
        You have no accounts. An account can be add by the "Add Account"-Link.
    {/if}
    </table>
{/block}