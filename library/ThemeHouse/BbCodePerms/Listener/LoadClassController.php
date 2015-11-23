<?php

class ThemeHouse_BbCodePerms_Listener_LoadClassController extends ThemeHouse_Listener_LoadClass
{
    /**
     * @see ThemeHouse_Listener_LoadClass::_getExtends()
     */
    protected function _getExtends()
    {
        return array(
            'XenForo_ControllerPublic_Thread' => 'ThemeHouse_BbCodePerms_Extend_XenForo_ControllerPublic_Thread', /* END 'XenForo_ControllerPublic_Thread' */
        );
    } /* END ThemeHouse_CaptchaPhrases_Listener_LoadClassController::_getExtends */

    /**
     * @see ThemeHouse_Listener_LoadClass::loadClassController()
     */
    public static function loadClassController($class, array &$extend)
    {
        $loadClassController = new ThemeHouse_BbCodePerms_Listener_LoadClassController($class, $extend);
        $extend = $loadClassController->run();
    } /* END ThemeHouse_CaptchaPhrases_Listener_LoadClassController::loadClassController */
}