<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Создать новость");
?>

<?php
$APPLICATION->IncludeComponent(
    "news:news.list",
    "add-sect",
    array(
        "IB" => 1,
    )
);
?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?><?php
