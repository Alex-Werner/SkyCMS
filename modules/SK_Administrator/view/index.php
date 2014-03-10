<style>
    body{
        margin: 0px;
        height: 100%;
    }
    li{
        line-height: 20px;
        display: list-item;
        text-align: match-parent;
        list-style: none;
    }
    #header {
        background: #676e78;
        color: #FFF;
        border-bottom: 4px solid #8f99a6;
        width: 100%;
        display: table;
    }
    .pull-right{
        float: right;
        margin-right: 0;
    }
    #navbar{
        background: #c7d6e7;
        color: #FFF;
        border-bottom: 1px solid #8f99a6;
        width: 100%;
        display: table;
    }
    #nav li{
        float: left;
        line-height: 10px;

    }
    #nav>li>a
    {
        float: none;
        text-decoration: none;
    }
    #nav>li>a {
        padding: 15px 10px;
        padding-right: 20px;
        display: block;
    }
    #nav>li>a:hover {
        color: #4ca4ad;
    }
    #nav{
        position: relative;
        left: 0;
        display: block;
        float: left;
        margin: 0 10px 0 0;

    }
    #content-wrapper {
        display: block;
        border: 1px solid #ccc;
        border-top: 0;
        float: left;
        width: 99.1%;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
        margin-bottom: 5px;
        padding: 5px;
    }
    #content{
        border: 1px solid #ccc;
        padding: 0 8px;
        background-color: #f4f4f4;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        border-radius: 10px;
    }

    /* TABLE */
    table{
        border-spacing: 2px;
        border-color: gray;

        font-size: 1em;
        border-collapse: collapse;
        margin: 0 0 1em 0;
        width: 100%;
    }
    table .first{
        border-width: 1px 0 1px 0;
        border-style: solid;
        border-color: #dfdfdf;
        background: #eef1ec;
        padding: .4em 1em .4em .5em;
        vertical-align: top;
        text-align: left;
        font-weight: bold;
    }
    table tbody>tr:hover{
        background: #cacaca;
    }
    button{
        background: #fcfcfc;
        color: #000;
        border-width: 1px;
        border-style: solid;
        border-color: #dfdfdf;
        box-shadow: 1px 1px 2px #f3f3f3 inset;
        padding: 3px;
        vertical-align: top;
        width: 100%;
    }
</style>
<?php
if(isset($_SESSION['administrateur']) && $_SESSION['administrateur']=='42')
{

}
else
{
    if($_GET['a']!=='login' && $_GET['a'] !== 'deconnect')
        header('Location: /admin/login/');
}
?>
<div id="header">
    <a href="/admin/overview/">
        <img src="/modules/SK_Administrator/skycms_logo.png">
    </a>
    <ul class="pull-right">
        <a href="/admin/deconnect/">Deconnexion</a>
        |
        <a href="/">Retour au site</a>
    </ul>
</div>
<div id="navbar">
    <ul id="nav">
        <li><a href="/admin/overview/">Overview</a></li>
        <li><a href="/admin/site/">Site</a></li>
        <li><a href="/admin/menu/">Menu</a></li>
        <li><a href="/admin/pages/">Pages</a></li>
        <li><a href="/admin/modules/">Modules</a></li>
        <li><a href="/admin/users/">Users</a></li>
    </ul>
</div>
<div id="content-wrapper">
    <div id="content">
        {{CONTENT}}
    </div>
</div>
<div id="footer"></div>