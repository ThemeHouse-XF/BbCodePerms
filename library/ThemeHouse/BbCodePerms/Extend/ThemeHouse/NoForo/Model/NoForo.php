<?php

class ThemeHouse_BbCodePerms_Extend_ThemeHouse_NoForo_Model_NoForo
    extends XFCP_ThemeHouse_BbCodePerms_Extend_ThemeHouse_NoForo_Model_NoForo
{
    /**
     * @see ThemeHouse_NoForo_Model_NoForo::rebuildForum()
     */
    public function rebuildForum()
    {
        $this->_rebuildPermissionsForAddOn('ThemeHouse_BbCodePerms');
        parent::rebuildForum();
    } /* END ThemeHouse_BbCodePerms_Extend_ThemeHouse_NoForo_Model_NoForo::rebuildForum */
}