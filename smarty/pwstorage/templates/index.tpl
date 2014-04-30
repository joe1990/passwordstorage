<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>{block name=title}PASSWORD STORAGE{/block}</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800|Open+Sans+Condensed:300,700" rel="stylesheet" />
        <link href="../../smarty/pwstorage/templates/styles/default.css" rel="stylesheet" type="text/css" media="all" />
        <link href="../../smarty/pwstorage/templates/styles/fonts.css" rel="stylesheet" type="text/css" media="all" />
    </head>
    <body>
        <div id="header" class="container">
            <div id="logo">
                <h1><span class="icon icon-lock icon-size"></span> Password <span>Storage</span></h1>
            </div>
            <div id="login">
                {include file="login.tpl"}
            </div>
        </div>
        <div id="wrapper" class="container">
            {include file="menu.tpl" activeMenu=$activeMenu menuEntries=$menuEntries}
            <div id="page">
                {block name=body}{/block}
            </div>
        </div>
    </body>
</html>