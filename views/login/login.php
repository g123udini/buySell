<?php use yii\widgets\ActiveForm; ?>
<section class="login">
    <h1 class="visually-hidden">Логин</h1>
        <?php $form = ActiveForm::begin(['id' => 'loginForm', 'options' => ['class' => 'login__form form']]) ?>
        <div class="login__title">
            <a class="login__link" href="<?= Yii::$app->urlManager->createUrl(['registration']) ?>">Регистрация</a>
            <h2>Вход</h2>
        </div>
        <div class="form__field login__field">
            <?= $form->field($model, 'email')->input('email', ['class' => 'js-field']) ?>
        </div>
        <div class="form__field login__field">
            <?= $form->field($model, 'password')->input('password', ['class' => 'js-field']) ?>
        </div>
        <button class="login__button btn btn--medium js-button" type="submit" disabled="">Войти</button>
        <a class="btn btn--small btn--flex btn--white" href="#">
            Войти через
            <span class="icon icon--vk"></span>
        </a>
        <?php ActiveForm::end(); ?>
</section>