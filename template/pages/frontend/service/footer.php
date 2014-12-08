			<script type="text/javascript" src="/template/js/modal/jsmodal-1.0d.min.js"></script>
			<link rel="stylesheet" href="/template/styles/modal/jsmodal-light.css">
			<script>
				document.querySelector('#account').onclick = function() {
					Modal.open({
						content: '<div class="loginForm"><h2>Войти</h2><small>Ещё нет аккаунта? <a href="/registration">Регистрация</a></small>' +
							'<div class="inputs"><input type="text" id="login" placeholder="логин"><input type="password" id="password" placeholder="пароль"></div>' +
							'<button>ВОЙТИ</button>' +
							'</div>',
						width: '300px',
						height: '270px'
					});
				}
			</script>
        </div>
    </body>
</html>