<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
echo '<pre>';
$arResult['SECT'];
echo '</pre>';
?>
<div class="container-fluid container-xxl">
    <div class="row">
        <div class="col-12 d-flex justify-content-center flex-column">
            <div class="col-12 py-2">
                <div class="text-large px-2 fw-bold">НАЗВАНИЕ РАЗДЕЛА</div>
            </div>
            <form class="form-horizontal" role="form" method="POST" id="form">
                <div class="form-group row">
                    <label class="col-2 col-form-label">Заголовок раздела</label>
                    <?php
                    foreach ($arResult['SECT'] as $section) :?>
                        <div class="col-10">
                            <input type="text" class="form-control" placeholder="Введите название заголовка"
                                   name="name" value="<?= $section["NAME"] ?>" disabled readonly>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="col-12 d-flex justify-content-between gap-3 mt-3">
                    <div class="d-flex">
                        <a class="btn btn-primary text-decoration-none" href="/news/">Главная</a>
                    </div>
                    <div class="d-flex gap-3">
                        <button type="submit" class="btn btn-primary text-decoration-none" id="btn-save">
                            Сохранить
                        </button>
                        <a class="btn btn-primary text-decoration-none" id="btn-edit">
                            Редактировать
                        </a>
                        <a class="btn btn-primary text-decoration-none"
                           href="/news/detail-sect/?type=delSect&id=<?= $section['ID'] ?>">Удалить</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
//echo '<pre>';
//print_r($_POST);
//echo '</pre>';
?>

