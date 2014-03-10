<style>

    #log-screen{
        width: 16em;
        display: block;
        margin: 1.5em auto 0;
        font-size: 1.16em;
    }
    #log-screen fieldset{
        border: 1px solid #728bca;
        padding: 1em 1em 0 1em;
        background: #fff;
        margin-bottom: 0;
        margin-top: 1em;
    }
    input[type=text], input[type=password], textarea, select, input[type=submit]{
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
<script>
    function StartAjax()
    {
        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        return xmlhttp;
    }
    function ajaxLogIn(user, pass)
    {
        var xmlhttp = StartAjax();
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
               result = JSON.parse(xmlhttp.responseText);
                if(result.result==1)
                {
                    window.location = "/admin/overview/";
                }
                else
                {
                    alert("Incorrect credidentials");
                }
                //document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","/modules/SK_Administrator/api/login.php?pseudo="+user+"&pass="+pass,true);
        xmlhttp.send();
    }
</script>
<a href="/">Retour au site</a>

<div id="log-screen">
    <h1><img src="/modules/SK_Administrator/skycms_logo.jpg"></h1>
    <fieldset>
        <label for="user">User :</label><br>
        <input type="text" size="20" name="user" id="user" maxlength="32">
        <p>
            <label for="password">Password :</label><br>
            <input type="text" size="20" name="password" id="password" maxlength="255">
        </p>
        <p>
            <input type="submit" value="Se connecter" class="login" onclick="ajaxLogIn(document.getElementById('user').value,document.getElementById('password').value)">
        </p>
    </fieldset>

</div>
