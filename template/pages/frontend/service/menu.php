<style>
    @import url(http://weloveiconfonts.com/api/?family=entypo);

    [class*="entypo-"]:before {
        font-family: 'entypo', sans-serif;
    }

    .menu{
        width: 100%;
        position: relative;
        background: rgb(3, 155, 229);
        height: 57px;
        box-shadow: 0 0 10px rgb(0,0,0);
    }

    .menu ul{
        width: 1000px;
        margin: 0 auto;
    }

    .menu ul li{
        margin-top: 15px;
        list-style: none;
        float: left;
        vertical-align: middle;
    }

    .menu ul li a{
        text-decoration: none;
        font-family: "roboto";
        font-size: 10px;
        color: rgb(129, 212, 250);
    }

    .menu ul li > a{
        padding: 20px 25px;
        text-transform: uppercase;
    }

    .menu ul div.leftSide{
        float: left;
    }

    .menu ul div.rigthSide{
        float: right;
    }

    .menu ul li a:hover, .menu .active a{
        color: rgb(255, 255, 255);
    }

    .menu ul li > a:hover, .menu .active > a{
        border-bottom: 3px solid rgb(255, 255, 0);
    }



    .pageContainer{
        width: 960px;
        padding-top: 15px;
        margin: 0 auto;
    }

    .loginForm{
        width: 200px;
        height: 240px;
        margin-top: 22px;
        margin-left: -117px;
        background: rgb(3, 155, 229);
        position: absolute;
        box-shadow: 5px 5px 5px -3px rgb(0,0,0);
        z-index: 0;
        display: none;
    }

    .loginForm hr{
        width: 80%;
        margin: 5px auto;
        border: 0;
        height: 2px;
        background: rgb(41, 182, 246);
    }

    .form{
        width: 80%;
        margin: 0 auto;
        font-size: 12px;
        font-family: "roboto";
    }

    .loginForm .form{
        margin-top: 20px;
        padding-top: 20px;
    }

    .loginForm .form input{
        width: 100%;
        display: block;
        margin-top: 15px;
        margin-bottom: 5px;
        background: 0;
        border: 0;
        font-family: roboto;
        font-size: 12px;
        line-height: 16px;
        border-bottom: 2px solid rgb(41, 182, 246);
        color: rgb(255, 255, 255);
    }

    .loginForm .form button{
        width: 100%;
        margin: 10px 0;
        border: 2px solid rgb(41, 182, 246);
        padding: 5px;
        color: rgb(129, 212, 250);
        background: none;
    }

    .loginForm .form button:hover{
        background: rgba(255, 255, 255, 0.1);
        border: 2px solid rgba(255, 255, 255, 0.7);
        color: rgba(255, 255, 255, 0.7);
    }
</style>
<div class="menu">
    <ul>
        <div class="leftSide">
            <li<?=$link['1'] == 'home' ? ' class="active"' : ''?>><a href="/">Главная</a></li>
            <li<?=$link['1'] == 'list' ? ' class="active"' : ''?>><a href="/list">Список баз</a></li>
            <li<?=$link['1'] == 'map' ? ' class="active"' : ''?>><a href="/map">Карта баз</a></li>
            <li<?=$link['1'] == 'contacts' ? ' class="active"' : ''?>><a href="/contacts">Контакты</a></li>
            <li><a href="#">Ещё <i class="entypo-dot-3" style="vertical-align: center">&nbsp;</i></a></li>
        </div>
        <div class="rigthSide">
            <li><a href="#">Войти</a>
                <div class="loginForm">
                    <hr>
                    <div class="form">
                        <input type="text" name="login" class="typicalInput" id="loginForm_inputLogin" placeholder="ЛОГИН">
                        <input type="password" name="password" class="typicalInput" id="loginForm_inputPassword" placeholder="ПАРОЛЬ">
                        <button class="typicalButton">Войти</button>
                    </div>
                    <hr>
                    <a href="/registration" style="width: 80%; margin: 0 auto; display: block">Регистрация</a>
                    <a href="/rescue" style="width: 80%; margin: 0 auto; display: block">Забыли пароль?</a>
                </div>
            </li>
        </div>
    </ul>
</div>
<div class="pageContainer">