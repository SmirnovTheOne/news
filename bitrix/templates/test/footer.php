</table>
</td>
</tr>
</table>
</td>

<!-- #Begin_right_Column -->
<!--<td width="280" background="/bitrix/templates/test/images/fon_l_stolba.jpg" align="center" class="br">-->
<!---->
<!--    <table width="99%" border="0" cellspacing="0" cellpadding="0">-->
<!--        <tr>-->
<!--            <td height="25" background="/bitrix/templates/test/images/fot_tabl_centr.jpg" width="25"><img-->
<!--                        src="/bitrix/templates/test/images/ukazatel_red.gif" width="25" height="25"></td>-->
<!--            <td width="1" height="25" valign="top" background="/bitrix/templates/test/images/fot_tabl_c.gif"><img-->
<!--                        src="/bitrix/templates/test/images/fot_tabl_w.gif" width="2" height="2"></td>-->
<!--            <td height="25" background="/bitrix/templates/test/images/fot_tabl_centr.jpg"><img-->
<!--                        src="/bitrix/templates/test/images/pix.gif" width="10" height="10"><b><a href="#"-->
<!--                                                                                                 class="text"><font-->
<!--                                size="2" color="#666666">Галерея</font></a></b></td>-->
<!---->
<!---->
<!--            <td width="1" height="25" valign="top" background="/bitrix/templates/test/images/fot_tabl_c.gif"><img-->
<!--                        src="/bitrix/templates/test/images/fot_tabl_w.gif" width="2" height="2"></td>-->
<!--        </tr>-->
<!---->
<!--    </table>-->
<!---->
<!--</td>-->
<? $APPLICATION->IncludeComponent("bitrix:main.include", "template1", array(
    "AREA_FILE_SHOW" => "sect",    // Показывать включаемую область
    "AREA_FILE_SUFFIX" => "inc",    // Суффикс имени файла включаемой области
    "AREA_FILE_RECURSIVE" => "Y",    // Рекурсивное подключение включаемых областей разделов
    "EDIT_TEMPLATE" => "standard.php",    // Шаблон области по умолчанию
),
    false
); ?>
<!-- #End_right_Column -->

</tr>
</table>
</td>
<td width="20%">
    <table width="10" border="0" cellspacing="0" cellpadding="0" height="100%">
        <tr>
            <td background="/bitrix/templates/test/images/fon_ten_w_l.jpg"></td>
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
        <td width="1024" background="/bitrix/templates/test/images/pix_s.jpg">
            <!-- #Begin_down_Menu -->
            <? $APPLICATION->IncludeComponent(
                "bitrix:menu",
                "template2",
                array(
                    "ROOT_MENU_TYPE" => "down",
                    "MAX_LEVEL" => "1",
                    "CHILD_MENU_TYPE" => "top",
                    "USE_EXT" => "Y",
                    "DELAY" => "N",
                    "ALLOW_MULTI_SELECT" => "Y",
                    "MENU_CACHE_TYPE" => "N",
                    "MENU_CACHE_TIME" => "3600",
                    "MENU_CACHE_USE_GROUPS" => "Y",
                    "MENU_CACHE_GET_VARS" => array(),
                    "COMPONENT_TEMPLATE" => "template2"
                ),
                false
            ); ?>
            <!-- #End_down_Menu -->
        </td>
        <td background="/bitrix/templates/test/images/pix_ts.jpg" width="20%">
            <table width="10" border="0" cellspacing="0" cellpadding="0" height="100%">
                <tr>
                    <td background="/bitrix/templates/test/images/fon_ten_ts_l.jpg"></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
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
                    <td background="/bitrix/templates/test/images/fon1.jpg" align="center">
                        <img src="/bitrix/templates/test/images/copy_boot.gif" width="232" height="91" align="left"
                             usemap="#Map" border="0"></td>


                    <td background="/images/test/fon1.jpg" align="center"><!-- #Begin_banner -->

                    </td>


                    <td background="/bitrix/templates/test/images/fon1.jpg" align="center"><img
                                src="/bitrix/templates/test/images/log_boot.gif" width="232" height="91" align="right">

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
<map name="Map">
    <area shape="rect" coords="44,71,128,84" href="mailto:kvaboss@mail.ru">
</map>
</body>
</html>