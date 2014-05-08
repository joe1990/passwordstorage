<!--
Partial for the menu.

Author: Joel Holzer <joe_ehcb@hotmail.com>
Version: 1.0
-->
<div id="menu" class="container">
    <ul>
        {foreach $menuEntries as $menuEntry}
            {if $activeMenu eq $menuEntry}
                <li class="current_page_item"><a href="index.php?view={$menuEntry}" accesskey="1" title="">{$menuEntry}</a></li>
            {else}
                <li ><a href="index.php?view={$menuEntry}" accesskey="1" title="">{$menuEntry}</a></li>
            {/if}
        {/foreach}
    </ul>
</div>