<?php include ROOT . '/views/layouts/header.php'; ?>


<div class="container">
    <div class="row">

        <div class="account">
            <div class="container">
                <h1>Оформление заказа</h1>


                <?php if ($result): ?>

                    <p>Заказ оформлен. Мы Вам перезвоним.</p>

                <?php else: ?>

                    <p>Выбрано товаров: <?php echo $totalQuantity; ?>, на сумму: <?php echo $totalPrice; ?>, руб.</p><br/>

                    <div class="account-pass">
                        <?php if (isset($errors) && is_array($errors)): ?>
                            <ul>
                                <?php foreach ($errors as $error): ?>
                                    <li> - <?php echo $error; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                        <p>Для оформления заказа заполните форму. Наш менеджер свяжется с Вами.</p>

                        <div class="col-md-8 account-top">
                            <form action="#" method="post">
                                <span>Ваше имя</span>
                                <input type="text" name="userName" placeholder="Имя" value="<?php echo $userName; ?>"/>

                                <span>Номер телефона</span>
                                <input type="text" name="userPhone" placeholder="Номер телефона" value="<?php echo $userPhone; ?>"/>

                                <span>Комментарий к заказу</span>
                                <input type="text" name="userComment" placeholder="Сообщение" value="<?php echo $userComment; ?>"/>

                                <br/>
                                <br/>
                                <input type="submit" name="submit" class="btn btn-default" value="Оформить" />
                            </form>
                        </div>
                    </div>

                <?php endif; ?>

            </div>

        </div>
    </div>
</div>


<?php include ROOT . '/views/layouts/footer.php'; ?>