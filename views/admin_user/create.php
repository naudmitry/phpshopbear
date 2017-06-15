<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/users">Управление пользователями</a></li>
                    <li class="active">Добавить пользователя</li>
                </ol>
            </div>


            <h4>Добавить нового пользователя</h4>

            <br/>

            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post">

                        <p>Имя</p>
                        <input type="text" name="name" placeholder="" value="">

                        <p>Email</p>
                        <input type="text" name="email" placeholder="" value="">

                        <p>Пароль</p>
                        <input type="password" name="password" placeholder="" value="">

                        <p>Адрес</p>
                        <input type="text" name="address" placeholder="" value="">

                        <p>Роль</p>
                        <input type="text" name="role" placeholder="" value="">

                        <br><br>

                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
            </div>


        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>