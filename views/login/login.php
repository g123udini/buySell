<section class="login">
    <h1 class="visually-hidden">Логин</h1>
        <?php $form = \yii\widgets\ActiveForm::begin(['id' => 'loginForm', 'options' => ['class' => 'login__form form']]) ?>
        <div class="login__title">
            <a class="login__link" href="sign-up.html">Регистрация</a>
            <h2>Вход</h2>
        </div>
        <div class="form__field login__field">
            <input type="email" name="user-email" id="user-email" class="js-field" required="">
            <label for="user-email">Эл. почта</label>
            <span>Обязательное поле</span>
        </div>
        <div class="form__field login__field">
            <input type="password" name="user-password" id="user-password" class="js-field" required="">
            <label for="user-password">Пароль</label>
            <span>Обязательное поле</span>
        </div>
        <button class="login__button btn btn--medium js-button" type="submit" disabled="">Войти</button>
        <a class="btn btn--small btn--flex btn--white" href="#">
            Войти через
            <span class="icon icon--vk"></span>
        </a>
        <?php \yii\widgets\ActiveForm::end(); ?>
</section>