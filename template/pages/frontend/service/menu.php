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
        padding: 20px 25px;
        text-decoration: none;
        font-family: "roboto";
        font-size: 10px;
        text-transform: uppercase;
        color: rgb(129, 212, 250);
    }

    .menu ul li a:hover, .menu .active a{
        border-bottom: 3px solid rgb(255, 255, 0);
        color: rgb(255, 255, 255);
    }

    .pageContainer{
        width: 960px;
        padding-top: 15px;
        margin: 0 auto;
    }
</style>
<div class="menu">
    <ul>
        <li<?=$link['1'] == 'home' ? ' class="active"' : ''?>><a href="/">Главная</a></li>
        <li<?=$link['1'] == 'list' ? ' class="active"' : ''?>><a href="/list">Список баз</a></li>
        <li<?=$link['1'] == 'map' ? ' class="active"' : ''?>><a href="/map">Карта баз</a></li>
        <li<?=$link['1'] == 'contacts' ? ' class="active"' : ''?>><a href="/contacts">Контакты</a></li>
        <li><a href="#">Ещё <i class="entypo-dot-3" style="vertical-align: center">&nbsp;</i></a></li>
    </ul>
</div>
<div class="pageContainer">