<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>
<div class="container-fluid container-xxl">
    <div class="row">
        <div class="col-12">

            <div class="card-box">
                <h4 class="m-t-0 header-title">Создание раздела</h4>
                <p class="text-muted m-b-30 font-14">
                    Форма создания раздела методом "post"
                </p>
                <div class="row">
                    <div class="col-12">
                        <div class="p-20">
                            <form class="form-horizontal" role="form" method="POST">

                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Заголовок раздела</label>
                                    <div class="col-10">
                                        <input type="text" class="form-control" placeholder="Введите название заголовка"
                                               name="name" value="">
                                    </div>
                                </div>

                                <div class="col-12 d-flex justify-content-between gap-3 mt-3">
                                    <div class="d-flex">
                                        <a class="btn btn-primary text-decoration-none" href="/news/">Главная</a>
                                    </div>
                                    <div class="d-flex gap-3">
                                        <button type="submit" class="btn btn-primary text-decoration-none">
                                            Добавить
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <?php
        if ($arResult["MESSAGE"]) {
            echo $arResult["MESSAGE"];
        }
        ?>
    </div>
</div>
<?php
?>

