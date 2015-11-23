<?php

class ThemeHouse_BbCodePerms_Listener_LoadClassModel extends ThemeHouse_Listener_LoadClass
{
    /**
     * @see ThemeHouse_Listener_LoadClass::_getExtends()
     */
    protected function _getExtends()
    {
        return array(
            'XenForo_Model_Post' => 'ThemeHouse_BbCodePerms_Extend_XenForo_Model_Post', /* END 'XenForo_Model_Post' */
            'ThemeHouse_NoForo_Model_NoForo' => 'ThemeHouse_BbCodePerms_Extend_ThemeHouse_NoForo_Model_NoForo', /* END 'ThemeHouse_NoForo_Model_NoForo' */
        );
    } /* END ThemeHouse_CaptchaPhrases_Listener_LoadClassModel::_getExtends */

    /**
     * @see ThemeHouse_Listener_LoadClass::loadClassModel()
     */
    public static function loadClassModel($class, array &$extend)
    {
        $loadClassModel = new ThemeHouse_BbCodePerms_Listener_LoadClassModel($class, $extend);
        $extend = $loadClassModel->run();
    } /* END ThemeHouse_CaptchaPhrases_Listener_LoadClassModel::loadClassModel */
}