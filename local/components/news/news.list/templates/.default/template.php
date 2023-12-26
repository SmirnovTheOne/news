<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
//echo '<pre width="100%">';
//print_r($arResult);
//echo '</pre>';
?>
<div class="container-fluid container-xxl">
    <div class="row py-3">
        <div class="col-12 d-flex justify-content-center">
            <table class="table table-bordered border-info">
                <thead>
                <tr class="border-top-0">
                    <th scope="row " class="text-uppercase border-0">Название раздела</th>
                    <th scope="row" class="text-uppercase border-0">Заголовок статьи</th>
                    <th scope="row" class="text-uppercase border-0">Дата публикации</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($arResult as $key => $arSect) {
                    echo '<tr class="border border-1 border-info">';
                    if ($key !== 'ELEMENT') {

                        echo '<td class=""><a class="text-decoration-none" href="/news/detail-sect/?id=' . $arSect['ID'] . '">' . $arSect['NAME'] . '</a></td>';

                        foreach ($arSect['ELEMENTS_SECT'] as $keyEl => $arELSect) {
                            if ($keyEl > 0) {
                                echo '<td class=""><a class="text-decoration-none" href="/news/detail-sect/?id=' . $arSect['ID'] . '">' . $arSect['NAME'] . '</a></td>';
                            }
                            echo '<td class=""><a class="text-decoration-none" href="/news/detail-news/?id=' . $arELSect['ID'] . '">' . $arELSect['NAME'] . '</a></td>';
                            if ($arELSect['ACTIVE_FROM'] == NULL) {
                                echo '<td class="text-decoration-none">' . $arELSect['DATE_CREATE'] . '</td>';
                            } else {
                                echo '<td class="text-decoration-none">' . $arELSect['ACTIVE_FROM'] . '</td>';
                            };
                            echo '</tr>';
                        }
                    } else {
                        foreach ($arSect as $arEL) {
                            echo '<td class=""></td>';
                            echo '<td class=""><a class="text-decoration-none" href="/news/detail-news/?id=' . $arEL['ID'] . '">' . $arEL['NAME'] . '</a></td>';
                            if ($arEL['ACTIVE_FROM'] == '01.01.1970') {
                                echo '<td class="text-decoration-none">' . $arEL['DATE_CREATE'] . '</td>';
                            } else {
                                echo '<td class="text-decoration-none">' . $arEL['ACTIVE_FROM'] . '</td>';
                            }
                            echo '</tr>';
                        }
                    }

                    echo '</tr>';

                }
                ?>
                </tbody>
            </table>
        </div>
        <div class="col-12 d-flex justify-content-start gap-3">
            <?php
            echo '<a class="btn btn-primary text-decoration-none" href="/news/add-sect/">Добавить раздел</a>';
            echo '<a class="btn btn-primary text-decoration-none" href="/news/add-news/">Добавить новость</a>';
            ?>
        </div>
    </div>
</div>
<?php

?>
