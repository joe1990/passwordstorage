<div id="error">
{if isset($loginFaults)}
    {foreach $loginFaults as $fault}
        {if isset($fault.message)}
           {$fault.message} <br/>
        {else}
            Unknown failure
        {/if} 
    {/foreach}
{/if} 
</div>