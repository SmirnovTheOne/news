<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Детальная новости");
?>

<?php
$APPLICATION->IncludeComponent(
    "news:news.list",
    "detail-news",
    array(
        "NEWS_ID" => $_GET['id'],
    )
);
//?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?><?php
