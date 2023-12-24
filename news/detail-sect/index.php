<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Детальная раздела");
?>

<?php
$APPLICATION->IncludeComponent(
    "news:news.list",
    "detail-sect",
    array(
        "SECT_ID" => $_GET['id'],
    )
);
?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?><?php
