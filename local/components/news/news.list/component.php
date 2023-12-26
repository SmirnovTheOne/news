<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
CJSCore::Init(array("jquery"));
CModule::IncludeModule("iblock");
/* к нам приходит массив данных из ArParams */

$IBLOCK_ID = $arParams["IB"]; // ID ифноблока
//Параметры
if (CSite::InDir('/news/index.php')) {
    $arSortSect = array("SORT" => 'asc');
    $arSelectSect = array("IBLOCK_ID" => $IBLOCK_ID /* ID инфоблока */);
    $arFilterSect = array("ID", "NAME");

    // Формируем список разделов по фильтру
    $dbResSect = CIBlockSection::GetList($arSortSect, $arSelectSect, true, $arFilterSect);
    // Получаем разделы и собираем их в массив
    while ($sectRes = $dbResSect->GetNext()) {
        $arSections[] = $sectRes;
    }

    // Формируем массив элементов по фильтру
    $arResult = [];
    $arSort = array("SORT" => "ASC");
    $arSelect = array(
        "ID",
        "IBLOCK_SECTION_ID",
        "NAME",
        "DATE_CREATE",
        "ACTIVE_FROM",
        "DATE_ACTIVE_FROM",
        "PREVIEW_TEXT",
        "PREVIEW_PICTURE",
        "DETAIL_TEXT",
    );
    $arPaginator = array("nPageSize" => 50);
    $arFilter = array("IBLOCK_ID" => $IBLOCK_ID, "ACTIVE" => "Y");
    $res = CIBlockElement::GetList($arSort, $arFilter, false, $arPaginator,);

    while ($el = $res->Fetch()) {
        $arElem["ITEMS"][] = $el; //формально все элементы
    }


    // Находим все разделы элемента и собираем их в массив
    foreach ($arElem["ITEMS"] as $key => $arItem) {
        $ElementId = $arItem['ID'];
        $db_groups = CIBlockElement::GetElementGroups($ElementId, true);
        $res = [];
        while ($ar_group = $db_groups->Fetch()) {
            $res[] = $ar_group["ID"];
        }
        $arItem["SECTION"] = $res;

        $arSection[] = $arItem;
    }
    $arElem["ITEMS"] = $arSection;

    // Собираем  массив в котором есть разделы и вложенные элементов
    foreach ($arSections as $arSection) {
        foreach ($arElem["ITEMS"] as $key => $arItem) {
            foreach ($arItem['SECTION'] as $key => $val) {
                if ($val == $arSection['ID']) {
                    $arSection['ELEMENTS_SECT'][] = $arItem;
                }
            }
        }
        $arElementGroups[] = $arSection;
    }
    $arResult = $arElementGroups;

    // Добавялем в массив разделов и элементов, элементы без привязки к разделу
    foreach ($arElem["ITEMS"] as $key => $arItem) {
        if ($arItem['IBLOCK_SECTION_ID'] == NULL) {
            $arResult['ELEMENT'][] = $arItem;
        }
    }

}

// детальная страница новости
$NEWS_ID = $arParams["NEWS_ID"];
if (isset($NEWS_ID)) {
    $sect = CIBlockElement::GetElementGroups($NEWS_ID, true); // Возвращаю раздел, которому принадлежит элемент.
    $arNewsSect = $sect->GetNext();

    $res = CIBlockElement::GetByID($NEWS_ID); // массив элемента.
    $arNEWS = $res->GetNext();

    $arNewsInfo[] = array(
        "ID" => $arNEWS["ID"],
        "NAME" => $arNEWS["NAME"],
        "ID_SECT" => $arNewsSect["ID"],
        "NAME_SECT" => $arNewsSect["NAME"],
        "DETAIL_TEXT" => $arNEWS["DETAIL_TEXT"],
        "PREVIEW_PICTURE" => $arNEWS["PREVIEW_PICTURE"],
        "ACTIVE_FROM" => $arNEWS["ACTIVE_FROM"],
    );

    $arResult['NEWS_INFO'] = $arNewsInfo;

    if ($_GET['type'] == 'delNews') {
        CIBlockElement::Delete($_GET['id']);
        LocalRedirect('/news/');
    }

    //здесь код для редактирования секции
    $arSortSect = array("SORT" => 'asc');
    $arSelectSect = array("IBLOCK_ID" => $IBLOCK_ID /* ID инфоблока */);
    $arFilterSect = array("ID", "NAME");

    // Формируем список разделов по фильтру
    $dbResSect = CIBlockSection::GetList($arSortSect, $arSelectSect, true, $arFilterSect);
    // Получаем разделы и собираем их в массив
    while ($sectRes = $dbResSect->GetNext()) {
        $arSections[] = $sectRes;
    }
    $arResult["NEWS_SECT"] = $arSections;

    if ($_POST) {
        $el = new CIBlockElement;

        $arLoadProduct = array(
            "MODIFIED_BY" => $USER->GetID(), // элемент изменен текущим пользователем
            "IBLOCK_SECTION" => $_POST['name_sect'], // элемент лежит в корне раздела
            "NAME" => $_POST['name'],
            "ACTIVE_FROM" => date('d.m.Y', strtotime($_POST['date'])),
            "DETAIL_TEXT" => $_POST['detail_text'],
            "PREVIEW_PICTURE" => $_FILES['image'],
        );
//        echo '<pre>';
//        print_r($_POST);
//        echo '</pre>';
//        echo '<pre>';
//        print_r($arLoadProducty);
//        echo '</pre>';

        $PRODUCT_ID = $arParams["NEWS_ID"];  // изменяем элемент с кодом
        $res = $el->Update($PRODUCT_ID, $arLoadProduct);
        $redirect = '/news/detail-news/?id=' . $arParams["NEWS_ID"];
        LocalRedirect($redirect);
    }
}

// детальная страница раздела
$SECT_ID = $arParams["SECT_ID"];
if (isset($SECT_ID)) {
    $res = CIBlockSection::GetByID($arParams["SECT_ID"]);
    while ($ar_res = $res->GetNext()) {
        $arSection[] = $ar_res;
    }
    $arResult['SECT'] = $arSection;

    //здесь код для редактирования секции
    if ($_POST) {
        $bs = new CIBlockSection;

        $arFields = array(
            "ACTIVE" => "Y",
            "IBLOCK_ID" => $arParams["IB"],
            "NAME" => $_POST["name"],
        );

        $editSect = $bs->Update($arParams["SECT_ID"], $arFields);
        $redirect = '/news/detail-sect/?id=' . $arParams["SECT_ID"];
        LocalRedirect($redirect);
    }

    if ($_GET['type'] == 'delSect') {
        echo $_GET['type'];
        echo 'вы запустили удаление!';
        CIBlockSection::Delete($_GET['id']);
        LocalRedirect('/news/');
    }
}

// страница добавления новости
if (CSite::InDir('/news/add-news/')) {

    $arSortSect = array("SORT" => 'asc');
    $arSelectSect = array("IBLOCK_ID" => $IBLOCK_ID /* ID инфоблока */);
    $arFilterSect = array("ID", "NAME");

    // Формируем список разделов по фильтру
    $dbResSect = CIBlockSection::GetList($arSortSect, $arSelectSect, true, $arFilterSect);
    // Получаем разделы и собираем их в массив
    while ($sectRes = $dbResSect->GetNext()) {
        $arSections[] = $sectRes;
    }
    $arResult["SECT"] = $arSections;

    if ($_POST) {
        $el = new CIBlockElement;

        $arLoadProductArray = array(
            "MODIFIED_BY" => $USER->GetID(), // id добавляющего пользователя
            "IBLOCK_SECTION_ID" => $_POST["select"], // id разделов
            "IBLOCK_ID" => $arParams["IB"], // id инфоблока
            "NAME" => strip_tags($_REQUEST["name"]), // заголовок
            "ACTIVE_FROM" => date('d.m.Y', strtotime($_POST['active_from'])), // дата публикации
            "ACTIVE" => "Y", // активен
            "PREVIEW_PICTURE" => $_FILES["image"],
            "DETAIL_TEXT" => strip_tags($_REQUEST["detail_text"]),
        );
//        echo '<pre>';
//        print_r($_POST);
//        echo '</pre>';
//        echo '<pre>';
//        print_r($arLoadProductArray);
//        echo '</pre>';

        $ELEM = $el->Add($arLoadProductArray);
        if ($ELEM) {
            $arResult["MESSAGE"] = "Новость успешно создана!";
        }

    }
}

// страница добавления раздела
if (CSite::InDir('/news/add-sect/')) {

    $arSortSect = array("SORT" => 'asc');
    $arSelectSect = array("IBLOCK_ID" => $IBLOCK_ID /* ID инфоблока */);
    $arFilterSect = array("ID", "NAME");

    // Формируем список разделов по фильтру
    $dbResSect = CIBlockSection::GetList($arSortSect, $arSelectSect, true, $arFilterSect);
    // Получаем разделы и собираем их в массив
    while ($sectRes = $dbResSect->GetNext()) {
        $arSections[] = $sectRes;
    }
    $arResult = $arSections;


    if ($_POST) {
        $bs = new CIBlockSection;

        $arFields = array(
            "ACTIVE" => "Y",
            "IBLOCK_ID" => $arParams["IB"],
            "NAME" => $_POST["name"],
        );

        $section = $bs->Add($arFields);
        if ($section) {
            $arResult["MESSAGE"] = "Раздел успешно создан!";
        }

    }
}

$this->includeComponentTemplate();
?>