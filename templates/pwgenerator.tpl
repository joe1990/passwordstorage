<!--
Template for the "Password Generator" view.

Author: Joel Holzer <joe_ehcb@hotmail.com>
Version: 1.0
-->
{extends file="index.tpl"}
{block name=title}PASSWORD STORAGE - Password-Generator{/block}
{block name=body}
    <div class="title">
        <h2>Password-Generator</h2>
    </div>
    <div id="pwgeneratorform">
        <form method="post">
            {include file="partials/errors.tpl"}
            {if isset($generatedPasswords)}
            <div id="success">
                <b>Generated Passwords:</b>  <br/>
                {foreach $generatedPasswords as $generatedPassword}
                    {$generatedPassword} <br/>
                {/foreach}
            </div>
            {/if}
            <dl>
                <dt>
                    Length
                </dt>
                <dd>
                    <input type="text" name="length" class="pwgeneratorfield" maxlength="2" value="{$password->getLength()}"/>
                </dd>
                <dt>
                   Characters
                </dt>
                <dd>
                    {if $password->hasCharacters()}
                        <input type="checkbox" name="hasCharacters" checked="checked">
                    {else}
                        <input type="checkbox" name="hasCharacters">
                    {/if}
                </dd>
                <dt>
                   Digits
                </dt>
                <dd>
                    {if $password->hasDigits()}
                        <input type="checkbox" name="hasDigits" checked="checked">
                    {else}
                        <input type="checkbox" name="hasDigits">
                    {/if}
                </dd>
                <dt>
                   Special Characters
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