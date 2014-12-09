<script src="https://www.google.com/recaptcha/api.js"></script>
<link rel="stylesheet" href="/template/styles/tooltip/opentip.css">
<h1 class="pageHeader typicalBlock">Регистрация аккаунта</h1>
<div class="marginTop typicalBlock" id="step1">
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
				<small>Должен быть длиной не менее 6 символов</small>
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
			<button type="button" id="registrationButton">РЕГИСТРАЦИЯ</button><br><br>
			<small>нажав эту кнопку, вы принимаете <b style="cursor: pointer;">правила сайта</b></small>
		</center>
    </form>
</div>
<div class="marginTop typicalBlock" id="step2" style="display: none;">
	Благодарим вас за регистрацию! В течении, максимум, пяти минут на ваш электронный почтовый ящик придёт письмо с ссылкой активации вашего аккаунта. Пожалуйста, перейдите по ссылке, для того, чтобы завершить регистрацию на сайте.
</div>
<script type="text/javascript" src="/template/js/tooltip/opentip-native.min.js"></script>
<script type="text/javascript" src="/template/js/ajax/jxs.js"></script>
<script>
	document.querySelector('.registrationForm > center > small > b').onclick = function() {
		Modal.open({
			ajaxContent: '/?ajax=true&action=help&page=terms',
			width: '600px'
		});
	};

	document.querySelector(".registrationForm #login").addEventListener('change', function(e){
		e.target.value = e.target.value.replace(/(\s+)|([^a-zA-Z0-9_]+)/gm, '');
		jx.load('/home?ajax=true&action=haveAUser&login=' + e.target.value, function(data){
			console.log(data);
			if(data == "true"){
				var g = new Opentip("#login", "Пользователь с таким логином уже зарегистрирован!", "", {'target': '#login', style: 'repaStyle'});
				e.target.setAttribute('class', 'bad');
				e.target.addEventListener('keyup', function(e){
					e.target.removeAttribute('class');
				}, false);
			}
		}, 'text', 'post');
	}, false);


	document.querySelector(".registrationForm button").addEventListener('click', function(e){
		e.preventDefault();
		var a = true;
		var b = document.querySelector(".registrationForm #login");
		var c = document.querySelector(".registrationForm #password");
		var d = document.querySelector(".registrationForm #email");
		var f = document.querySelector(".registrationForm #phone");
		var g;

		if(grecaptcha.getResponse() == ''){
			g = new Opentip("#registrationButton", "Вы не заполнили капчу!", "", {'target': '#registrationButton', style: 'repaStyle'});
			a = false;
		}

		if(f.value != '' && (f.value.length != 10 || f.value.replace(/\D+/gm, '').length != 10)){
			g = new Opentip("#phone", "Номер телефона должен состоять из 10 цифр, без кода страны. <br> Пример: 0941234567", "", {'target': '#phone', style: 'repaStyle'});
			f.setAttribute('class', 'bad');
			f.addEventListener('keyup', function(e){
				e.target.removeAttribute('class');
			}, false);
			a = false;
		}

		if(d.value.replace(/\s+/gm, '') == ''){
			g = new Opentip("#email", "Адрес электронной почты не может быть пустым!", "", {'target': '#email', style: 'repaStyle'});
			d.setAttribute('class', 'bad');
			d.addEventListener('keyup', function(e){
				e.target.removeAttribute('class');
			}, false);
			a = false;
		}

		if(c.value.replace(/\s+/gm, '') == ''){
			g = new Opentip("#password", "Пароль не может быть пустым!", "", {'target': '#password', style: 'repaStyle'});
			c.setAttribute('class', 'bad');
			c.addEventListener('keyup', function(e){
				e.target.removeAttribute('class');
			}, false);
			a = false;
		}else if(c.value.length < 6){
			g = new Opentip("#password", "Пароль должен быть длиной не менее 6 символов!", "", {'target': '#password', style: 'repaStyle'});
			c.setAttribute('class', 'bad');
			c.addEventListener('keyup', function(e){
				e.target.removeAttribute('class');
			}, false);
			a = false;
		}

		if(b.getAttribute('class') == 'bad'){
			a = false;
		}else if(b.value.replace(/\s+/gm, '') == ''){
			g = new Opentip("#login", "Логин не может быть пустым!", "", {'target': '#login', style: 'repaStyle'});
			b.setAttribute('class', 'bad');
			b.addEventListener('keyup', function(e){
				e.target.removeAttribute('class');
			}, false);
			a = false;
		}else if(b.value.replace(/(\s+)|([^a-zA-Z0-9_]+)/gm, '').length < 6){
			b.value = b.value.replace(/(\s+)|([^a-zA-Z0-9_]+)/gm, '');
			g = new Opentip("#login", "Логин не может быть короче шести символов, и может состоять только из символов латинского алфавита, цифр и знака подчёркивания!", "", {'target': '#login', style: 'repaStyle'});
			b.setAttribute('class', 'bad');
			b.addEventListener('keyup', function(e){
				e.target.removeAttribute('class');
			}, false);
			a = false;
		}

		if(a){
			e.target.disabled = true;
			var formData = document.forms['0'].elements;
			jx.load('/home?ajax=true&action=register&login=' + formData.login.value + '&password=' + formData.password.value + '&email=' + formData.email.value + '&name=' + formData.name.value + '&surname=' + formData.surname.value + '&phone=' + formData.phone.value + '&g-recaptcha-response=' + formData['6'].value, function(data){
				switch(data){
					case "success":
						document.querySelector("#step1").style.display = 'none';
						document.querySelector("#step2").style.display = 'block';
						break;
				}
				console.log(data);
			}, 'text', 'post');
		}
	}, false);
</script>