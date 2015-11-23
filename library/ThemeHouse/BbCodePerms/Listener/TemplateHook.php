<?php

class ThemeHouse_BbCodePerms_Listener_TemplateHook extends ThemeHouse_Listener_TemplateHook
{
    /**
     * @see ThemeHouse_Listener_TemplateHook::run()
     */
	public function run() {
		switch ($this->_hookName)
		{
			case 'thread_view_pagenav_before':
				$this->_threadViewPagenavBefore();
				break;
		}
		return parent::run();
	} /* END ThemeHouse_BbCodePerms_Listener_TemplateHook::run */

	/**
	 * @see ThemeHouse_Listener_TemplateHook::templateHook()
	 */
	public static function templateHook($hookName, &$contents, array $hookParams, XenForo_Template_Abstract $template)
	{
		$templateHook = new ThemeHouse_BbCodePerms_Listener_TemplateHook($hookName, $contents, $hookParams, $template);
		$contents = $templateHook->run();
	} /* END ThemeHouse_BbCodePerms_Listener_TemplateHook::templateHook */

	/**
	 * @see ThemeHouse_Listener_TemplateHook::_threadViewPagenavBefore()
	 */
	protected function _threadViewPagenavBefore()
	{
		$this->_append('
		    <blockquote id="blockedImageTooltip">
		    ' . new XenForo_Phrase('th_image_has_been_removed_bbcodeperms') . '
		    <span class="arrow"></blockquote>
		');
		$this->_append('
		    <blockquote id="blockedUrlTooltip">
		    ' . new XenForo_Phrase('th_url_has_been_removed_bbcodeperms') . '
		    <span class="arrow"></blockquote>
		');
		$this->_append('
		    <blockquote id="blockedEmailTooltip">
		    ' . new XenForo_Phrase('th_email_has_been_removed_bbcodeperms') . '
		    <span class="arrow"></blockquote>
		');
		$this->_append('
		    <blockquote id="blockedMediaTooltip">
		    ' . new XenForo_Phrase('th_media_has_been_removed_bbcodeperms') . '
		    <span class="arrow"></blockquote>
		');
	} /* END ThemeHouse_BbCodePerms_Listener_TemplateHook::threadViewPagenavBefore */
}