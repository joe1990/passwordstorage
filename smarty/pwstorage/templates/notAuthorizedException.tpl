<!--
Template for the view which is displayed if an authorized exception occured (user not authorized to see a ressource or do an action)

Author: Joel Holzer <joe_ehcb@hotmail.com>
Version: 1.0
-->
{extends file="index.tpl"}
{block name=title}PASSWORD STORAGE - Not Authorized{/block}
{block name=body}
    <div id="exception">
    You are not authorized to see this ressource or done this action.
    </div>
{/block}