<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header"><center>Регистрация</center></div>
        <div class="card-body">
	        <div role="alert" id="msgAlert"></div>
            <form action="/user/registration" method="post">
                <div class="form-group">
                    <label>ФИО</label>
                    <input class="form-control" type="text" name="fio" required>
                </div>                        
                <div class="form-group">
                    <label>E-mail</label>
                    <input class="form-control" type="text" name="email" required>
                </div>                        
                <div class="form-group">
                    <label>Логин</label>
                    <input class="form-control" type="text" name="login" required>
                </div>
                <div class="form-group">
                    <label>Пароль</label>
                    <input class="form-control" type="password" name="pass" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Зарегистрироваться!</button>
            </form>
        </div>
    </div>
</div>