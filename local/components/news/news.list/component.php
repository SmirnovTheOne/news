<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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
        "PREVIEW_TEXT",
        "DETAIL_PICTURE",
        "DETAIL_TEXT",
        "DATE_CREATE",
    );
    $arPaginator = array("nPageSize" => 50);
    $arFilter = array("IBLOCK_ID" => $IBLOCK_ID, "ACTIVE" => "Y");
    $res = CIBlockElement::GetList($arSort, $arFilter, false, $arPaginator,);

    while ($el = $res->Fetch()) {
        $arElem["ITEMS"][] = $el; //формально все элементы
    }

//    echo '<pre>';
//    print_r($arElem["ITEMS"]);
//    echo '</pre>';

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
                    $arSection['ELEMENTS'][] = $arItem;
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
        "DETAIL_PICTURE" => $arNEWS["DETAIL_PICTURE"],
        "DATE_CREATE" => $arNEWS["DATE_CREATE"],
    );

    $arResult['NEWS_INFO'] = $arNewsInfo;

    if ($_GET['type'] == 'delNews') {
        echo $_GET['type'];
        echo 'вы запустили удаление!';
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
        $PROP = array();
        $PROP[12] = "Белый";  // свойству с кодом 12 присваиваем значение "Белый"
        $PROP[3] = 38;        // свойству с кодом 3 присваиваем значение 38
        $arLoadProductArray = array(
            "MODIFIED_BY" => $USER->GetID(), // элемент изменен текущим пользователем
            "IBLOCK_SECTION" => $_POST['name_sect'],          // элемент лежит в корне раздела
            "PROPERTY_VALUES" => $PROP,
            "NAME" => $_POST['name'],
            "DETAIL_TEXT" => $_POST['detail_text'],
            "DETAIL_PICTURE" => CFile::MakeFileArray($_SERVER["DOCUMENT_ROOT"] . "/image.gif")
        );
        $PRODUCT_ID = $arParams["NEWS_ID"];  // изменяем элемент с кодом
        $res = $el->Update($PRODUCT_ID, $arLoadProductArray);
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

    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    if ($_POST) {
        $el = new CIBlockElement;

        $arLoadProductArray = array(
            "DATE_CREATE" => date("d.m.Y"),
            "MODIFIED_BY" => $USER->GetID(), // id добавляющего пользователя
            "IBLOCK_SECTION_ID" => $_POST["select"], // id разделов
            "IBLOCK_ID" => $arParams["IB"], // id инфоблока
            "NAME" => strip_tags($_REQUEST["name"]), // заголовок
            "ACTIVE_FROM" => $_POST["date"], //
            "ACTIVE" => "Y", // активен
            "PREVIEW_PICTURE" => $_FILES["image"],
            "DETAIL_TEXT" => strip_tags($_REQUEST["detail_text"]),
        );

        echo '<pre>';
        print_r($arLoadProductArray);
        echo '</pre>';

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

//    echo '<pre>';
//    print_r($_POST);
//    echo '</pre>';

    if ($_POST) {
        $bs = new CIBlockSection;

        $arFields = array(
            "ACTIVE" => "Y",
            "IBLOCK_ID" => $arParams["IB"],
            "NAME" => $_POST["name"],
        );

//        echo '<pre>';
//        print_r($arFields);
//        echo '</pre>';


        $section = $bs->Add($arFields);
        if ($section) {
            $arResult["MESSAGE"] = "Раздел успешно создан!";
        }

    }
}

$this->includeComponentTemplate();
?>