<!--
Template for the "Home" view

Author: Joel Holzer <joe_ehcb@hotmail.com>
Version: 1.0
-->
{extends file="index.tpl"}
{block name=title}PASSWORD STORAGE - Home{/block}
{block name=body}
    <div class="title">
        <h2>Welcome</h2>
    </div>
    <p>
        <b>What is password storage? </b> <br/>
        Today you need to remember many passwords. You need a password for the Windows network logon, your e-mail account, your website's FTP password, online passwords (like website member account), etc. etc. etc. The list is endless.
        Also, you should use different passwords for each account. Because if you use only one password everywhere and someone gets this password you have a problem...
        <br/><br/>
        PASSWORD STORAGE is a web plattform, which helps you to manage your passwords in a secure way.
        After a registration, you can add all your accounts and passwords. 
        Every account-password will encrypt with your registration-password. No one except the person who has the registration-password can read the encrypted account-passwords. 
        For this purpose, the user must log in with his username and password.
        <br/>
        Beside the managing of account-passwords, password storage also provide a password generator to randomly generate passwords with certain criteria.
        <br/><br/>
        
        <b>You want to register? </b> <br/>
        Click <a href="index.php?view=register">here</a>
    </p>
{/block}