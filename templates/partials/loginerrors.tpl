<!--
Partial to display login errors
Go throug an array of errors and display from every errors the message (if exists).

Author: Joel Holzer <joe_ehcb@hotmail.com>
Version: 1.0
-->
{if isset($loginFaults)}
    <div id="error">
        {foreach $loginFaults as $fault}
            {if isset($fault.message)}
               {$fault.message} <br/>
            {else}
                Unknown failure
            {/if} 
        {/foreach}
    </div>
{/if} 