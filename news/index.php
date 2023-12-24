<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Компонент (Новости)");
?>
    <!--    Пустая страница. <a href="/bitrix/admin/">Перейти в Панель Управления</a>.- Тестовый проект. Главная страница.-->
<?php
$APPLICATION->IncludeComponent(
    "news:news.list",
    "",
    array(
        "IB" => 1,
    )
);
?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?><?php
