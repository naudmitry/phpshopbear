<?php include ROOT.'/views/layouts/header.php'; ?>

<section>
    <div class="account">
        <div class="container">

            <h1>Кабинет пользователя</h1>
            
            <h3>Привет, <?php echo $user['name'];?>!</h3>
            <br>
            <ul>
                <li><a href="/cabinet/edit">Редактировать данные</a></li>
                <li><a href="/cart">Список покупок</a></li>
                <?php if (AdminBase::getPanelUrl()): ?>
                    <li><a href="/admin">Панель администратора</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</section>

<?php include ROOT.'/views/layouts/footer.php'; ?>