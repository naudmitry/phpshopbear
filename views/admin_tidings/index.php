<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление новостями</li>
                </ol>
            </div>

            <a href="/admin/tidings/create" class="btn btn-default back"><i class="glyphicon glyphicon-plus"></i> Добавить новость</a>
            
            <h4>Список новостей</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID новости</th>
                    <th>Название</th>
                    <th>Дата публикации</th>
                    <th>Короткое описание</th>
                    <th>Полное описание</th>
                    <th>Автор</th>
                    <th>Тип</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($newsList as $news): ?>
                    <tr>
                        <td><?php echo $news['id']; ?></td>
                        <td><?php echo $news['title']; ?></td>
                        <td><?php echo substr($news['date'], 0, strpos($news['date'], ' ')); ?></td>
                        <td><?php echo $news['short_content']; ?></td> 
                        <td><?php echo $news['content']; ?></td>
                        <td><?php echo $news['author_name']; ?></td>
                        <td><?php echo $news['type']; ?></td>

                        <td><a href="/admin/tidings/update/<?php echo $news['id']; ?>" title="Редактировать"><i class="glyphicon glyphicon-pencil"></i></a></td>
                        <td><a href="/admin/tidings/delete/<?php echo $news['id']; ?>" title="Удалить"><i class="glyphicon glyphicon-minus"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>