<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("1С-Битрикс: Управление сайтом");

global $USER;
$USER->Authorize(1);
?>
    Главная . <a href="/bitrix/admin/">Перейти в Панель Управления</a>.- Тестовый проект. Главная страница.


<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>