<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>
<div class="container-fluid container-xxl">

    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title">Создание новости</h4>
                <p class="text-muted m-b-30 font-14">
                    Форма создания новости методов "post"
                </p>
                <div class="row">
                    <div class="col-12">
                        <div class="p-20">
                            <form class="form-horizontal d-flex flex-column gap-3" role="form" method="POST"
                                  enctype="multipart/form-data">

                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Заголовок новости</label>
                                    <div class="col-10">
                                        <input type="text" class="form-control" placeholder="Введите название заголовка"
                                               name="name" value="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Подробное описание</label>
                                    <div class="col-10">
                                        <textarea class="form-control" name="detail_text"
                                                  placeholder="Введите описание"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Изображение</label>
                                    <div class="col-10">
                                        <input type="file" class="form-control" placeholder="Изображение"
                                               name="image" value="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Дата публикации</label>
                                    <div class="col-10">
                                        <input type="date" class="form-control" name="active_from" value=" ">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Раздел</label>
                                    <div class="col-10">

                                        <select name="select" class="form-control">
                                            <option value="">Не указывать раздел</option>
                                            <?php
                                            foreach ($arResult['SECT'] as $arSect) :?>
                                                <option value="<?= $arSect["ID"] ?>"><?= $arSect["NAME"] ?></option>
                                            <?php endforeach; ?>
                                        </select>
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
    <?php
    if ($arResult["MESSAGE"]) {
        echo $arResult["MESSAGE"];
    }
    ?>
    <div class="row">

    </div>
</div>
<?php
?>

