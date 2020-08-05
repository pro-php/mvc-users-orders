<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="card-body">
            <div class="row">
                    <div class="col-sm-12 col-lg-12">
                        <?php if (empty($orders1)): ?>
                            <p>Список пуст</p>
                        <?php else: ?>
                            <table class="table">
                                <tr>
                                    <th>ID</th>								
                                    <th>ФИО</th>
                                    <th>Логин</th>
                                    <th>Заказов</th>
                                </tr>
                                <?php foreach ($orders1 as $val): ?>
                                    <tr>
                                        <td><?php echo $val['id']; ?></td>									
                                        <td><?php echo htmlspecialchars($val['fio'], ENT_QUOTES); ?></td>
                                        <td><?php echo htmlspecialchars($val['login'], ENT_QUOTES); ?></td>
					                    <td><?php echo htmlspecialchars($val['total_orders'], ENT_QUOTES); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-lg-12">
                        <?php if (empty($orders2)): ?>
                            <p>Список пуст</p>
                        <?php else: ?>
                            <table class="table">
                                <tr>
                                    <th>ID</th>								
                                    <th>ФИО</th>
                                    <th>Логин</th>
                                    <th>Заказов</th>
                                </tr>
                                <?php foreach ($orders2 as $val): ?>
                                    <tr>
                                        <td><?php echo $val['id']; ?></td>									
                                        <td><?php echo htmlspecialchars($val['fio'], ENT_QUOTES); ?></td>
                                        <td><?php echo htmlspecialchars($val['login'], ENT_QUOTES); ?></td>
					                    <td>0</td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        <?php endif; ?>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>