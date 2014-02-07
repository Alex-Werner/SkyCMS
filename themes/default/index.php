<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{PAGE_TITLE}}</title>
    <link rel="stylesheet" type="text/css" href="/themes/default/css/default.css" />
</head>
<body>
    <div class="wrapper">
        <div class="navbar fixed-top">
            <div class="container">
                {{CONTENT_MENU}}
                <ul class="nav navbar-nav navbar-avatar pull-right visible-desktop">
                    <a href="/admin/">Panneau d'administration</a>
                </ul>
            </div>
        </div>

        <div class="container" style="min-height: 500px; padding:50px ">
            <section id="page-header" class="page-header">
                Logo de société
            </section>
            <section id="content" class="content">
            {{CONTENT_PAGE}}
            </section>
        </div>
        <div class="footer" style="text-align: center">Server time: {{SERVER_TIME}}</div>
    </div>
</body>
</html>