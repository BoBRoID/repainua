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