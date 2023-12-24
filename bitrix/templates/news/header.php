<!DOCTYPE html>
<html>

<head>
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <title><? $APPLICATION->ShowTitle() ?></title>
    <? $APPLICATION->ShowHead() ?>

</head>
<body>
<div id="panel"><? $APPLICATION->ShowPanel(); ?></div>
<div id="header">
    <?$APPLICATION->IncludeComponent("bitrix:main.include", ".default", array(
        "AREA_FILE_SHOW" => "sect",
        "AREA_FILE_SUFFIX" => "headerinc",
        "AREA_FILE_RECURSIVE" => "Y",
        "EDIT_TEMPLATE" => "sect_headerinc.php"
    ),
        false
    );?>
</div>
<?
$APPLICATION->AddChainItem("Форум &quot;Отзывы&quot;", "/ru/forum/list.php?FID=3");
?>