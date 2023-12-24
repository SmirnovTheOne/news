<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <!--    <meta http-equiv="Content-Type" content="text/html; charset=--><? // echo LANG_CHARSET; ?><!--">-->
    <meta charset="UTF-8">
    <? $APPLICATION->ShowMeta("keywords"); ?>
    <? $APPLICATION->ShowMeta("description"); ?>
    <title><? $APPLICATION->ShowTitle() ?></title>
    <? $APPLICATION->ShowHead() ?>
</head>
<body BGCOLOR="#FFFFFF" TEXT="#000000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<? $APPLICATION->ShowPanel(); ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" height="100">
    <tr valign="top">
        <td background="/bitrix/templates/test/images/pix_s.jpg" width="20%" align="right">
            <table width="10" border="0" cellspacing="0" cellpadding="0" height="100%">
                <tr>
                    <td background="/bitrix/templates/test/images/fon_ten_tc.jpg"></td>
                </tr>
            </table>
        </td>
        <td width="1024" background="/bitrix/templates/test/images/pix_s.jpg">
            <table width="1024" border="0" cellspacing="0" cellpadding="0" height="100">
                <tr valign="top">
                    <td width="25" background="/bitrix/templates/test/images/pix_ts.jpg"></td>
                    <td background="/bitrix/templates/test/images/fon2.jpg" align="center" width="350"><img
                                src="/bitrix/templates/test/images/log_top.gif" width="316" height="92"></td>
                    <td background="/bitrix/templates/test/images/fon2.jpg">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="text">
                            <tr>
                                <td align="right">
                                    <!-- #Begin_Auth -->
                                    <!--                                    <img src="/bitrix/templates/test/images/punkt_top.gif" width="4" height="4">-->
                                    <!--                                    <b><a href="/auth.php?register=yes" class="text"><font size="1"-->
                                    <!--                                                                                           color="#6E6E6E">Регистрация</font></a></b>-->
                                    <!--                                    <img src="/bitrix/templates/test/images/punkt_top.gif" width="4" height="4">-->
                                    <!--                                    <b><a href="/auth" class="text"><font size="1" color="#6E6E6E">Вход</font></a></b>-->
                                    <? $APPLICATION->IncludeComponent("bitrix:system.auth.form", "auth", array(
                                            "REGISTER_URL" => "/auth/",
                                            "FORGOT_PASSWORD_URL" => "",
                                            "PROFILE_URL" => "/personal/profile/",
                                            "SHOW_ERRORS" => "Y"
                                        )
                                    ); ?>
                                    <!-- #End_Auth -->

                                </td>
                                <td align="right" width="10"></td>
                            </tr>

                            <tr>
                                <td align="right"><!-- #Begin_Include --><!-- #End_Include --></td>
                            </tr>

                        </table>


                    </td>
                </tr>
            </table>
        </td>
        <td background="/bitrix/templates/test/images/pix_s.jpg" width="20%">
            <table width="10" border="0" cellspacing="0" cellpadding="0" height="100%">
                <tr>
                    <td background="/bitrix/templates/test/images/fon_ten_tc_l.jpg"></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" height="100">
    <tr valign="top">
        <td background="/bitrix/templates/test/images/pix_c.jpg" width="20%" align="right">
            <table width="10" border="0" cellspacing="0" cellpadding="0" height="100%">
                <tr>
                    <td background="/bitrix/templates/test/images/fon_ten_c.jpg"></td>
                </tr>
            </table>
        </td>
        <td width="1024" background="/bitrix/templates/test/images/pix_c.jpg">
            <table width="1024" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td valign="top" background="/bitrix/templates/test/images/fot_tabl_w.gif" width="250">

                        <!-- #Begin_Left_Menu -->
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:menu",
                            "template1",
                            array(
                                "ROOT_MENU_TYPE" => "left",
                                "MAX_LEVEL" => "1",
                                "CHILD_MENU_TYPE" => "top",
                                "USE_EXT" => "Y",
                                "DELAY" => "N",
                                "ALLOW_MULTI_SELECT" => "Y",
                                "MENU_CACHE_TYPE" => "N",
                                "MENU_CACHE_TIME" => "3600",
                                "MENU_CACHE_USE_GROUPS" => "N",
                                "MENU_CACHE_GET_VARS" => array(),
                                "COMPONENT_TEMPLATE" => "template1"
                            ),
                            false
                        ); ?>
                        <!-- #End_Left_Menu -->
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" height="2">
                            <tr>
                                <td>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td width="774" background="/bitrix/templates/test/images/fon_glav.jpg" valign="top" align="right">

                        <table border="0" cellspacing="0" cellpadding="0" width="100%">
                            <tr>

                                <td height="20" width="150"></td>

                                <td height="20"></td>
                                <td height="20" width="10"></td>
                            </tr>
                            <tr>

                                <td height="20" width="150" background="/bitrix/templates/test/images/fon_pix_g.jpg">
                                    <img src="/bitrix/templates/test/images/fon_pix_g.jpg" width="150" height="1"></td>

                                <td height="20" background="/bitrix/templates/test/images/pix_c_menu.jpg" align="right">

                                    <!-- #Begin_part_menu -->
                                    <? $APPLICATION->IncludeComponent(
                                        "bitrix:menu",
                                        "template3",
                                        array(
                                            "ROOT_MENU_TYPE" => "part",
                                            "MAX_LEVEL" => "1",
                                            "CHILD_MENU_TYPE" => "top",
                                            "USE_EXT" => "Y",
                                            "DELAY" => "N",
                                            "ALLOW_MULTI_SELECT" => "Y",
                                            "MENU_CACHE_TYPE" => "N",
                                            "MENU_CACHE_TIME" => "3600",
                                            "MENU_CACHE_USE_GROUPS" => "Y",
                                            "MENU_CACHE_GET_VARS" => array(),
                                            "COMPONENT_TEMPLATE" => "template3"
                                        ),
                                        false
                                    ); ?>
                                    <!-- #End_part_menu -->
                                </td>

                                <td height="20" background="/bitrix/templates/test/images/pix_c_menu.jpg" width="10"
                                    align="right"></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
        <td background="/bitrix/templates/test/images/pix_c.jpg" width="20%">
            <table width="10" border="0" cellspacing="0" cellpadding="0" height="100%">
                <tr>
                    <td background="/bitrix/templates/test/images/fon_ten_c_l.jpg"></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" height="10">
    <tr background="/bitrix/templates/test/images/pix_c.jpg" valign="top">
        <td background="/bitrix/templates/test/images/pix_ts.jpg" width="20%" align="right">
            <table width="10" border="0" cellspacing="0" cellpadding="0" height="100%">
                <tr>
                    <td background="/bitrix/templates/test/images/fon_ten_ts.jpg"></td>
                </tr>
            </table>
        </td>
        <td width="1024" background="/bitrix/templates/test/images/pix_s.jpg"><img
                    src="/bitrix/templates/test/images/pix.gif" width="1024" height="10"></td>
        <td background="/bitrix/templates/test/images/pix_ts.jpg" width="20%">
            <table width="10" border="0" cellspacing="0" cellpadding="0" height="100%">
                <tr>
                    <td background="/bitrix/templates/test/images/fon_ten_ts_l.jpg"></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" height="10">
    <tr valign="top">
        <td width="20%" align="right">
            <table width="10" border="0" cellspacing="0" cellpadding="0" height="100%">
                <tr>
                    <td background="/bitrix/templates/test/images/fon_ten_w.jpg"></td>
                </tr>
            </table>
        </td>
        <td width="1024">
            <table width="1024" border="0" cellspacing="0" cellpadding="0">

                <tr valign="top">


                    <!-- #Begin_left_Column -->
                    <td width="250" background="/bitrix/templates/test/images/fon_l_stolba.jpg" class="br"
                        align="center">

                        <table width="99%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td height="25" background="/bitrix/templates/test/images/fot_tabl_centr.jpg"
                                    width="25"><img src="/bitrix/templates/test/images/ukazatel_red.gif" width="25"
                                                    height="25"></td>
                                <td width="1" height="25" valign="top"
                                    background="/bitrix/templates/test/images/fot_tabl_c.gif"><img
                                            src="/bitrix/templates/test/images/fot_tabl_w.gif" width="2" height="2">
                                </td>
                                <td height="25" background="/bitrix/templates/test/images/fot_tabl_centr.jpg"><img
                                            src="/bitrix/templates/test/images/pix.gif" width="10" height="10"><b><a
                                                href="#" class="text"><font size="2"
                                                                            color="#666666">Блоги</font></a></b></td>
                            </tr>
                            <tr>
                                <td height="1" background="/bitrix/templates/test/images/fot_tabl_c.gif"><img
                                            src="/bitrix/templates/test/images/fot_tabl_w.gif" width="2" height="2">
                                </td>
                                <td width="1" height="1"><img src="/bitrix/templates/test/images/fot_tabl_w.gif"
                                                              width="2" height="2"></td>
                                <td height="1" background="/bitrix/templates/test/images/fot_tabl_c.gif"><img
                                            src="/bitrix/templates/test/images/fot_tabl_w.gif" width="2" height="2">
                                </td>
                            </tr>
                        </table>

                        <!-- #Begin_blog -->
                        <table width="99%" border="0" cellspacing="3" cellpadding="5">
                            <tr>
                                <td class="br" bgcolor="#DEDEE2" bordercolor="#bfbfbf"><img src="info_bloki/001.jpg"
                                                                                            width="78" height="61"
                                                                                            align="left"><font size="2">Споры
                                        о том, на что ловить и чем лучше прикармливать, наверное, никогда
                                        не закончатся. <br>
                                        <a href="#"><img src="/bitrix/templates/test/images/ukaz_inf.jpg" width="20"
                                                         height="20" align="right" border="0"></a>
                                    </font></td>
                            </tr>
                        </table>
                        <table width="99%" border="0" cellspacing="3" cellpadding="5">
                            <tr>
                                <td class="br" bgcolor="#DEDEE2" bordercolor="#bfbfbf"><img src="info_bloki/002.jpg"
                                                                                            width="78" height="61"
                                                                                            align="left"><font size="2">Споры
                                        о том, на что ловить и чем лучше прикармливать, наверное, никогда
                                        не закончатся. <br>
                                        <a href="#"><img src="/bitrix/templates/test/images/ukaz_inf.jpg" width="20"
                                                         height="20" align="right" border="0"></a>
                                    </font></td>
                            </tr>
                        </table>
                        <table width="99%" border="0" cellspacing="3" cellpadding="5">
                            <tr>

                                <td class="br" bgcolor="#DEDEE2" bordercolor="#bfbfbf"><img src="info_bloki/003.jpg"
                                                                                            width="78" height="61"
                                                                                            align="left"><font size="2">Споры
                                        о том, на что ловить и чем лучше прикармливать, наверное, никогда не закончатся.
                                        <br>
                                        <a href="#"><img src="/bitrix/templates/test/images/ukaz_inf.jpg" width="20"
                                                         height="20" align="right" border="0"></a>
                                    </font></td>
                            </tr>
                        </table>

                        <!--                        --><? // $APPLICATION->IncludeComponent("bitrix:blog.new_posts", "", array(
                        //                                "SEO_USER" => "Y",
                        //                                "MESSAGE_COUNT" => "6",
                        //                                "MESSAGE_LENGTH" => "100",
                        //                                "PREVIEW_WIDTH" => "100",
                        //                                "PREVIEW_HEIGHT" => "100",
                        //                                "DATE_TIME_FORMAT" => "d.m.Y H:i:s",
                        //                                "PATH_TO_BLOG" => "blog_blog.php?page=blog&blog=#blog#",
                        //                                "PATH_TO_POST" => "blog_post.php?page=post&blog=#blog&post_id=#post_id#",
                        //                                "PATH_TO_USER" => "blog_user.php?page=user&user_id=#user_id#",
                        //                                "PATH_TO_GROUP_BLOG_POST" => "",
                        //                                "PATH_TO_SMILE" => "/bitrix/images/blog/smile/",
                        //                                "BLOG_VAR" => "blog",
                        //                                "POST_VAR" => "post_id",
                        //                                "USER_VAR" => "user_id",
                        //                                "PAGE_VAR" => "page",
                        //                                "CACHE_TYPE" => "A",
                        //                                "CACHE_TIME" => "86400",
                        //                                "GROUP_ID" => "",
                        //                                "BLOG_URL" => ""
                        //                            )
                        //                        ); ?>
                        <!--                        --><? // $APPLICATION->IncludeComponent("bitrix:statistic.table", "", array(
                        //                                "CACHE_TYPE" => "A",
                        //                                "CACHE_TIME" => 20,
                        //                                "CACHE_FOR_ADMIN" => "N"
                        //                            )
                        //                        ); ?>
                        <!-- #End_blog -->


                    </td><!-- #End_left_Column -->


                    <td class="br" background="/bitrix/templates/test/images/fot_centr_tabl.jpg">

                        <table width="100%" border="0" cellspacing="0" cellpadding="5" height="100%" class="text">
                            <tr>
                                <td valign="top">

                                    <!-- #Begin_nav -->
                                    <!--                                    <b><a href="#" class="text"><font color="#666666" size="2">Статьи</font></a><font-->
                                    <!--                                                size="2">-->
                                    <!--                                            / <a href="#" class="text"><font color="#333333">Советы</font></a>-->
                                    <!--                                            / <a href="#" class="text"><font color="#FF0000">О-->
                                    <!--                                                    прикорме</font></a></font></b>-->
                                    <? $APPLICATION->IncludeComponent("bitrix:breadcrumb", "template1", array(
                                        "START_FROM" => "0",    // Номер пункта, начиная с которого будет построена навигационная цепочка
                                        "PATH" => "",    // Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
                                        "SITE_ID" => "s1",    // Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
                                        "COMPONENT_TEMPLATE" => ".default"
                                    ),
                                        false
                                    ); ?>
                                    <!-- #End_nav -->
                                    <table width="100%" border="0" cellspacing="10" cellpadding="0">
                                        <tr>
                                            <td>
