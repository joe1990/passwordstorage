<!--
Template for the view which is displayed if an exception occured.

Author: Joel Holzer <joe_ehcb@hotmail.com>
Version: 1.0
-->
{extends file="index.tpl"}
{block name=title}PASSWORD STORAGE - Error{/block}
{block name=body}
    <div id="exception">
    {$errorType} - Please contact the site administrator (joe_ehcb@hotmail.com).
    </div>
{/block}