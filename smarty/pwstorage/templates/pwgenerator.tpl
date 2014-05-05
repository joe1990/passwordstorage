<!--
Template for the "Password Generator" view.

Author: Joel Holzer <joe_ehcb@hotmail.com>
Version: 1.0
-->
{extends file="index.tpl"}
{block name=title}PASSWORD STORAGE - PW-Generator{/block}
{block name=body}
    <div class="title">
        <h2>Password-Generator</h2>
    </div>
    <div id="pwgeneratorform">
        <form method="post">
            {include file="partials/errors.tpl"}
            {if isset($generatedPassword)}
                Generated Password:  {$generatedPassword}
            {/if}
            <dl>
                <dt>
                    Länge
                </dt>
                <dd>
                    <input type="text" name="length" size="20" maxlength="2" value="{$password->getLength()}"/>
                </dd>
                <dt>
                   Buchstaben
                </dt>
                <dd>
                    {if $password->hasCharacters()}
                        <input type="checkbox" name="hasCharacters" checked="checked">
                    {else}
                        <input type="checkbox" name="hasCharacters">
                    {/if}
                </dd>
                <dt>
                   Zahlen
                </dt>
                <dd>
                    {if $password->hasDigits()}
                        <input type="checkbox" name="hasDigits" checked="checked">
                    {else}
                        <input type="checkbox" name="hasDigits">
                    {/if}
                </dd>
                <dt>
                   Sonderzeichen
                </dt>
                <dd>
                    {if $password->hasSpecialCharacters()}
                        <input type="checkbox" name="hasSpecialCharacters" checked="checked">
                    {else}
                        <input type="checkbox" name="hasSpecialCharacters">
                    {/if}
                </dd>
            </dl>
            <input type="submit" class="button" name="generatePassword" value="generate"/>
        </form>
    </div>
{/block}