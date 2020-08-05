<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-lg-12">
                        <?php if (empty($list)): ?>
                            <p>Список пуст</p>
                        <?php else: ?>
                            <table class="table">
                                <tr>
                                    <th>ID</th>								
                                    <th>ФИО</th>
                                    <th>Логин</th>
                                    <th>Emailов</th>
                                </tr>
                                <?php foreach ($list as $val): ?>
                                    <tr>
                                        <td><?php echo $val['id']; ?></td>									
                                        <td><?php echo htmlspecialchars($val['fio'], ENT_QUOTES); ?></td>
                                        <td><?php echo htmlspecialchars($val['login'], ENT_QUOTES); ?></td>
					                    <td><?php echo htmlspecialchars($val['emails'], ENT_QUOTES); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                            <?php echo $pagination; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>