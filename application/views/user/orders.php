<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="card-body">
		<div role="alert" id="msgAlert"></div>
                <div class="row">
                    <div class="col-sm-4">
                        <form action="/user/orders" method="post" >
                            <div class="form-group">
                                <label>Цена заказа</label>
                                <input class="form-control" type="number" step="10" min="10" max="1000" name="price" required value="100">
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">Добавить заказ</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>