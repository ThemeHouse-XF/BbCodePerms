<?php

class ThemeHouse_BbCodePerms_Extend_XenForo_BbCode_Formatter_Base
    extends XFCP_ThemeHouse_BbCodePerms_Extend_XenForo_BbCode_Formatter_Base
{
	/**
	* @see XenForo_BbCode_Formatter_Base::getTags()
	*/
	public function getTags()
	{
		$tags = parent::getTags();

		$tags['blockedimg'] = array(
			'hasOption' => false,
			'replace' => array(
			    '<a class="blocked" data-description="#blockedImageTooltip">',
			    '</a>',
		    ),
		);
		$tags['blockedurl'] = array(
			'hasOption' => false,
			'replace' => array(
			    '<a class="blocked" data-description="#blockedUrlTooltip">',
		        '</a>',
			),
		);
		$tags['blockedemail'] = array(
			'hasOption' => false,
			'replace' => array(
			    '<a class="blocked" data-description="#blockedEmailTooltip">',
			    '</a>',
		    ),
		);
		$tags['blockedmedia'] = array(
		        'hasOption' => false,
		        'replace' => array(
		                '<a class="blocked" data-description="#blockedMediaTooltip">',
		                '</a>',
		        ),
		);

		return $tags;
	} /* END ThemeHouse_BbCodePerms_Extend_XenForo_BbCode_Formatter_Base::getTags */
}