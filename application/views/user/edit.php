<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="card-body">
		<div role="alert" id="msgAlert"></div>
                <div class="row">
                    <div class="col-sm-4">
                        <form action="/user/edit" method="post" >
                            <div class="form-group">
                                <label>Имя</label>
                                <input class="form-control" type="text" name="fio" required value="<?php echo htmlspecialchars($data['fio'], ENT_QUOTES); ?>">
                            </div>
                            <div class="form-group">
                                <label>Логин</label>
                                <input class="form-control" type="text" name="login" required value="<?php echo htmlspecialchars($data['login'], ENT_QUOTES); ?>">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="text" name="email" disabled value="<?php echo htmlspecialchars($data['email'], ENT_QUOTES); ?>">
                            </div>

                            <div class="form-group">
                                <label>Пароль</label>
                                <input class="form-control" type="password" name="pass">
                            </div>
                            <div class="form-group">
                                <label>Подтверждение пароля</label>
                                <input class="form-control" type="password" name="pass2">
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">Сохранить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>