<?php

class ThemeHouse_BbCodePerms_Listener_LoadClassBbCode extends ThemeHouse_Listener_LoadClass
{
    /**
     * @see ThemeHouse_Listener_LoadClass::_getExtends()
     */
    protected function _getExtends()
    {
        return array(
            'XenForo_BbCode_Formatter_Base' => 'ThemeHouse_BbCodePerms_Extend_XenForo_BbCode_Formatter_Base', /* END 'XenForo_BbCode_Formatter_Base' */
        );
    } /* END ThemeHouse_CaptchaPhrases_Listener_LoadClassBbCode::_getExtends */

    /**
     * @see ThemeHouse_Listener_LoadClass::loadClassBbCode()
     */
    public static function loadClassBbCode($class, array &$extend)
    {
        $loadClassBbCode = new ThemeHouse_BbCodePerms_Listener_LoadClassBbCode($class, $extend);
        $extend = $loadClassBbCode->run();
    } /* END ThemeHouse_CaptchaPhrases_Listener_LoadClassBbCode::loadClassBbCode */
}