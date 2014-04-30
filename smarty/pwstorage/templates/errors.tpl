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