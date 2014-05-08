<!--
Main-Template-File. All other template-files extend this file.
Include the login and menu partials.

Author: Joel Holzer <joe_ehcb@hotmail.com>
Version: 1.0
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>{block name=title}PASSWORD STORAGE{/block}</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <link href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800|Open+Sans+Condensed:300,700" rel="stylesheet" />
        <link href="templates/styles/default.css" rel="stylesheet" type="text/css" media="all" />
        <link href="templates/styles/fonts.css" rel="stylesheet" type="text/css" media="all" />
    </head>
    <body>
        <div id="header" class="container">
            <div id="logo">
                <h1><span class="icon icon-lock icon-size"></span> Password <span>Storage</span></h1>
            </div>
            <div id="login">
                {include file="partials/login.tpl"}
            </div>
        </div>
        <div id="wrapper" class="container">
            {include file="partials/menu.tpl" activeMenu=$activeMenu menuEntries=$menuEntries}
            <div id="page">
                {block name=body}{/block}
            </div>
        </div>
        <div id=copyright>
            Website © 2014 by Joel Holzer - All rights reserved 
        </div>
    </body>
</html>