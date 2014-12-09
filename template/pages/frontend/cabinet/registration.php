<script src='https://www.google.com/recaptcha/api.js'></script>
<h1 class="pageHeader typicalBlock">Регистрация аккаунта</h1>
<div class="marginTop typicalBlock">
    <h2>Основные данные аккаунта</h2>
    <hr class="silver">
    <form class="registrationForm" method="post">
		<div class="input">
			<input type="text" name="login" id="login" placeholder="v_pupkin">
			<label for="login">
				Логин, который будет использоваться для входа на сайт
				<small>Логин может состоять из символов латинского алфавита, цифр, и знака подчёркивания и быть длиной не менее 6 символов!</small>
			</label>
		</div>
		<div class="input">
			<input type="password" name="password" id="password">
			<label for="password">
				Пароль для входа на сайт
			</label>
		</div>
		<div class="input">
			<input type="text" name="email" id="email" placeholder="v_pupkin@hotmail.com">
			<label for="email">
				Ваш адрес электронной почты
				<small>Необходим для активации аккаунта</small>
			</label>
		</div>
		<br><br>
		<h2>Контактные данные аккаунта</h2>
		<hr class="silver">
		<small>Эти данные не являются обязательными для заполнения, при желании поля можно оставить пустыми</small>
		<div class="input">
			<input type="text" name="name" id="name">
			<label for="name">
				Ваше имя
			</label>
		</div>
		<div class="input">
			<input type="text" name="surname" id="surname">
			<label for="surname">
				Ваша фамилия
			</label>
		</div>
		<div class="input">
			<input type="text" name="phone" id="phone" placeholder="0941234567">
			<label for="phone">
				Ваш номер телефона
				<small>Этот номер телефона не будет опубликован в профиле</small>
			</label>
		</div>
		<br>
		<div class="g-recaptcha" data-sitekey="6Lfeqv4SAAAAAG3GdtBoD_00CbeM7f1DKNv9UvME"></div>
		<br>
		<center>
			<button type="button">РЕГИСТРАЦИЯ</button><br><br>
			<small>нажав эту кнопку, вы принимаете <b>правила сайта</b></small>
		</center>
    </form>
	<script>
		document.querySelector('.registrationForm > center > small > b').onclick = function() {
			Modal.open({
				ajaxContent: '/?ajax=true&action=help&page=terms',
				width: '600px'
			});
		}

		document.querySelector(".registrationForm button").addEventListener('click', function(e){
			e.preventDefault();
			if(grecaptcha.getResponse() != ''){
				e.target.parentNode.parentNode.submit();
			}else{
				alert('Вы робот, а роботам не место в нашем уютном мире. Если вы не робот - докажите это, заполнив капчу')
			}
		}, false);
	</script>
</div>