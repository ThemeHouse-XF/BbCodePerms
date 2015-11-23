<?php

class ThemeHouse_BbCodePerms_Listener_TemplateCreate extends ThemeHouse_Listener_TemplateCreate
{
    /**
     * @see ThemeHouse_Listener_TemplateCreate::run()
     */
	public function run() {
		switch ($this->_templateName)
		{
			case 'thread_view':
				$this->_threadView();
				break;
		}
		return parent::run();
	} /* END ThemeHouse_BbCodePerms_Listener_TemplateCreate::run */

	/**
	 * @see ThemeHouse_Listener_TemplateCreate::templateCreate()
	 */
	public static function templateCreate(&$templateName, array &$params, XenForo_Template_Abstract $template)
	{
		$templateCreate = new ThemeHouse_BbCodePerms_Listener_TemplateCreate($templateName, $params, $template);
		list($templateName, $params) = $templateCreate->run();
	} /* END ThemeHouse_BbCodePerms_Listener_TemplateCreate::templateCreate */

	protected function _threadView()
	{
		$this->_template->addRequiredExternal('js', 'js/themehouse/bbcodeperms/blocked_bbcode_tooltip.js');
		$this->_template->addRequiredExternal('css', 'th_bbcodeperms');
	} /* END ThemeHouse_BbCodePerms_Listener_TemplateCreate::_threadView */
}