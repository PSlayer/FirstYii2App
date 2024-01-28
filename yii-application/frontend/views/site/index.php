<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>

<?php

if (Yii::$app->user->isGuest) {

?>
<div class="site-index">
    <div class="p-5 mb-4 bg-transparent rounded-3">
        <div class="container-fluid py-5 text-center">
            <h1 class="display-4">Please LOGIN!</h1>
            <p class="fs-5 fw-light">If you wanna use this system, you need to logIn in this site </p>
            <p><a class="btn btn-lg btn-success" href="/site/login">Log In</a></p>
        </div>
    </div>

    <div class="body-content">

    </div>
</div>
<?php
}
else{
    ?>
    <div class="site-index">
        <div class="p-5 mb-4 bg-transparent rounded-3">
            <div class="container-fluid py-5 text-center">
                <h1 class="display-4">You are logined now!</h1>
                <p class="fs-5 fw-light">You can use this system, may be you wanna check STORES? </p>
                <p><a class="btn btn-lg btn-success" href="/store">Stores</a></p>
            </div>
        </div>

        <div class="body-content">

        </div>
    </div>

<?php

}
?>