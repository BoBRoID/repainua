<div class="menu">
    <ul>
        <div class="leftSide">
            <li<?=$link['1'] == 'home' ? ' class="active"' : ''?>><a href="/">Главная</a></li>
            <li<?=$link['1'] == 'list' ? ' class="active"' : ''?>><a href="/list">Список баз</a></li>
            <li<?=$link['1'] == 'map' ? ' class="active"' : ''?>><a href="/map">Карта баз</a></li>
            <li<?=$link['1'] == 'contacts' ? ' class="active"' : ''?>><a href="/contacts">Контакты</a></li>
            <li><a href="#">Ещё <i class="entypo-dot-3">&nbsp;</i></a>
				<ul>
					<li><a href="/about">О сайте</a></li>
				</ul>
			</li>
        </div>
        <div class="rigthSide">
            <li id="account"><a href="#">Войти</a></li>
        </div>
    </ul>
</div>
<div class="pageContainer">