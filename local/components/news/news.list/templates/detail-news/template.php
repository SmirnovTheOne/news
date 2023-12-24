<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>

<div class="container-fluid container-xxl">
    <div class="row">
        <div class="col-12 d-flex">
            <form class="form-horizontal w-100" role="form" method="POST" id="form-detail-sect">
                <?php
                foreach ($arResult['NEWS_INFO'] as $news) :?>
                    <div class="form-group row">
                        <div class="col-3 d-flex flex-column">
                            <div class="text-large text-uppercase px-2 fw-bold py-2">Заголовок</div>
                            <input type="text" class="form-control" placeholder="Введите название заголовка"
                                   name="name" value="<?= $news['NAME'] ?>" id="input">
                        </div>
                        <div class="col-3">
                            <div class="text-large text-uppercase px-2 fw-bold py-2">Описание</div>
                            <textarea class="form-control" name="detail_text"
                                      placeholder="Введите описание"><?= $news["DETAIL_TEXT"] ?></textarea>
                        </div>
                        <div class="col-2">
                            <div class="text-large text-uppercase px-2 fw-bold py-2">Изображение</div>
                            <input type="text" class="form-control" placeholder="Введите название заголовка"
                                   name="detail_picture" value="<?= $news["DETAIL_PICTURE"] ?>" id="input">
                        </div>
                        <div class="col-2">
                            <div class="text-large text-uppercase px-2 fw-bold py-2">Дата публикации</div>
                            <input type="text" class="form-control" placeholder="Введите название заголовка"
                                   name="date_create" value="<?= $news["DATE_CREATE"] ?>" id="input">
                        </div>
                        <div class="col-2">
                            <div class="text-large text-uppercase px-2 fw-bold py-2">Категория</div>
                            <select name="name_sect" class="form-control">
                                <option value="<?= $news["ID_SECT"] ?>"><?= ($news["ID_SECT"] == null) ? "Не указывать раздел" : $news["NAME_SECT"] ?></option>
                                <?php
                                foreach ($arResult["NEWS_SECT"] as $arSect) :?>
                                    <?php if ($news["ID_SECT"] !== $arSect["ID"]) : ?>
                                        <option value="<?= $arSect["ID"] ?>"><?= $arSect["NAME"] ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <option value="">Не указывать раздел</option>
                            </select>
                        </div>
                    </div>
                <?php endforeach; ?>
                <div class="col-12 d-flex justify-content-between gap-3 mt-3">
                    <div class="d-flex">
                        <a class="btn btn-primary text-decoration-none" href="/news/">Главная</a>
                    </div>
                    <div class="d-flex gap-3">
                        <button type="submit" class="btn btn-primary text-decoration-none">
                            Сохранить
                        </button>
                        <button class="btn btn-primary text-decoration-none" id="btn-edit">
                            Редактировать
                        </button>
                        <a class="btn btn-primary text-decoration-none"
                           href="/news/detail-news/?type=delNews&id=<?= $news['ID'] ?>">Удалить</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



