<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/tidings">Управление новостями</a></li>
                    <li class="active">Редактировать новость</li>
                </ol>
            </div>


            <h4>Добавить новость</h4>

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
                    <form action="" method="post" enctype="multipart/form-data">
                        <p>Название</p>
                        <input type="text" name="title" placeholder="" value="">

                        <p>Дата</p>
                        <input type="text" name="date" placeholder="" value="">

                        <p>Короткое описание</p>
                        <input type="text" name="short_content" placeholder="" value="">

                        <p>Полное описание</p>
                        <textarea name="content"></textarea>

                        <p>Автор</p>
                        <input type="text" name="author_name" placeholder="" value="">

                        <p>Изображение</p>
                        <input type="file" name="image" placeholder="" value="">

                        <p>Тип</p>
                        <input type="text" name="type" placeholder="" value="">

                        <br/><br/>

                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">

                        <br/><br/>

                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>