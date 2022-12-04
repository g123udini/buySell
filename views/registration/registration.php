<?php
use yii\widgets\ActiveForm;
?>
<section class="sign-up">
    <h1 class="visually-hidden">Регистрация</h1>
    <?php $form = ActiveForm::begin(['id' => 'registration-form', 'options' => ['class' => 'sign-up__form form']]) ?>
        <div class="sign-up__title">
            <h2>Регистрация</h2>
            <a class="sign-up__link" href="<?= Yii::$app->urlManager->createUrl(['login']) ?>">Вход</a>
        </div>
        <div class="sign-up__avatar-container js-preview-container">
            <div class="sign-up__avatar js-preview"></div>
            <div class="sign-up__field-avatar">
                <?= $form->field($model, 'avatar')->fileInput(['class' => 'visually-hidden js-file-field']) ?>
            </div>
        </div>
        <div class="form__field sign-up__field">
            <?= $form->field($model, 'login')->textInput(['class' => 'js-field']) ?>
        </div>
        <div class="form__field sign-up__field">
            <?= $form->field($model, 'email')->textInput(['class' => 'js-field']) ?>
        </div>
        <div class="form__field sign-up__field">
            <?= $form->field($model, 'password')->input('password', ['class' => 'js-field']) ?>
        </div>
        <div class="form__field sign-up__field">
            <?= $form->field($model, 'passwordRepeat')->input('password', ['class' => 'js-field']) ?>
        </div>
        <button class="sign-up__button btn btn--medium js-button" type="submit" disabled="">Создать аккаунт</button>
        <a class="btn btn--small btn--flex btn--white" href="#">
            Войти через
            <span class="icon icon--vk"></span>
        </a>
    <?php ActiveForm::end() ?>
</section>
