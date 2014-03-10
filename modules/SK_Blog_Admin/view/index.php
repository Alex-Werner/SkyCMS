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
        height: 32px;
        background-color: #333;
        width: 100%;
        display: table;
        color: #fff;
    }
    #navbar{
        width: 160px;
        height: 100%;
        position: absolute;
        top: 50px;
        bottom: 0;
        z-index: -1;
        background-color: #222;
    }
    #content-wrapper{
        height: 100%;
        position: absolute;
        top: 50px;
        left:160px;
        right: 0;
        bottom: 0;
        z-index: -1;
        padding: 10px;
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
    <ul class="pull-right">
        <a href="/admin/deconnect/">Deconnexion</a>
        |
        <a href="/">Retour au site</a>
    </ul>
</div>
<div id="navbar">
    <ul id="nav">
        <li><a href="/blog_admin/overview/">Overview</a></li>
        <li><a href="/blog_admin/posts/">Posts</a></li>
        <li><a href="/blog_admin/post-new/">Add new</a></li>
        <li><a href="/blog_admin/categories/">Categories</a></li>
        <li><a href="/blog_admin/comments/">Comments</a></li>
    </ul>
</div>
<div id="content-wrapper">
    <div id="content">
        {{CONTENT}}
    </div>
</div>
<div id="footer"></div>