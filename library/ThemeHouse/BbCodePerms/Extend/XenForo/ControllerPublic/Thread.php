<?php

class ThemeHouse_BbCodePerms_Extend_XenForo_ControllerPublic_Thread
    extends XFCP_ThemeHouse_BbCodePerms_Extend_XenForo_ControllerPublic_Thread
{
	/**
	 * @see XenForo_ControllerPublic_Thread::_getPostFetchOptions
	 */
	protected function _getPostFetchOptions(array $thread, array $forum)
	{
		$postFetchOptions = parent::_getPostFetchOptions($thread, $forum);

		if (isset($thread['node_id'])) {
			$postFetchOptions['permissionContentId'] = $thread['node_id'];
		} else if (isset($forum['node_id'])) {
			$postFetchOptions['permissionContentId'] = $forum['node_id'];
		}

		return $postFetchOptions;
	} /* END ThemeHouse_BbCodePerms_Extend_XenForo_ControllerPublic_Thread::_getPostFetchOptions */
}