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


            <h4>Редактировать новость</h4>

            <br/>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="" method="post" enctype="multipart/form-data">

                        <p>Название</p>
                        <input type="text" name="title" placeholder="" value="<?php echo $news['title']; ?>">

                        <p>Дата</p>
                        <input type="text" name="date" placeholder="" value="<?php echo $news['date']; ?>">

                        <p>Короткое описание</p>
                        <input type="text" name="short_content" placeholder="" value="<?php echo $news['short_content']; ?>">

                        <p>Полное описание</p>
                        <textarea name="content"><?php echo $news['content']; ?></textarea>

                        <p>Автор</p>
                        <input type="text" name="author_name" placeholder="" value="<?php echo $news['author_name']; ?>">

                        <p>Изображение</p>
                        <img src="<?php echo News::getImage($news['id']); ?>" width="200" alt="" />
                        <input type="file" name="image" placeholder="" value="<?php echo $news['preview']; ?>">

                        <p>Тип</p>
                        <input type="text" name="type" placeholder="" value="<?php echo $news['type']; ?>">
                        
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