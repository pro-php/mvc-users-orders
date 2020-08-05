<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header"><center>Авторизация</center></div>
        <div class="card-body">
	        <div role="alert" id="msgAlert"></div>
            <form action="/user/login" method="post">
                <div class="form-group margin-bottom-sm">
                    <input class="form-control" type="text" name="login" placeholder="Логин" required>
                </div>
                <div class="input-group margin-bottom-sm">
                    <input class="form-control" type="password" name="password" placeholder="Пароль" required>
		             <span class="input-group-addon"><i class="fa fa-envelope-o fa-lock"></i></span>
                </div>
                <br>
                <button type="submit" class="btn btn-primary btn-block">Вход</button>
            </form>
        </div>
    </div>
</div>