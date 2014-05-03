<!--
Partial to display errors.
Go throug an array of errors and display from every errors the field and the message (if exists) of the error.

Author: Joel Holzer <joe_ehcb@hotmail.com>
Version: 1.0
-->
<div id="error">
{if isset($faults)}
    {foreach $faults as $fault}
        {if isset($fault.field)}
            <b>{$fault.field}: </b>
        {/if}
        {if isset($fault.message)}
           {$fault.message} <br/>
        {else}
            Unknown failure
        {/if} 
    {/foreach}
{/if} 
</div>