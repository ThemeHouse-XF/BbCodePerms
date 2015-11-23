<?php

class ThemeHouse_BbCodePerms_Extend_XenForo_Model_Post
    extends XFCP_ThemeHouse_BbCodePerms_Extend_XenForo_Model_Post
{
	/**
	 * @see XenForo_Model_Post::preparePostJoinOptions()
	 */
	public function preparePostJoinOptions(array $fetchOptions)
	{
		$postJoinOptions = parent::preparePostJoinOptions($fetchOptions);
		$selectFields = $postJoinOptions['selectFields'];
		$joinTables = $postJoinOptions['joinTables'];

		$db = $this->_getDb();

		if (!empty($fetchOptions['permissionContentId'])) {
			if (!empty($fetchOptions['join']) &&
			    $fetchOptions['join'] & self::FETCH_USER) {
				$selectFields .= ',
			    	permission.cache_value AS node_permission_cache';
				$joinTables .= '
    				LEFT JOIN xf_permission_cache_content AS permission
    				ON (permission.permission_combination_id = user.permission_combination_id
    				AND permission.content_type = \'node\'
    				AND permission.content_id = ' . $db->quote($fetchOptions['permissionContentId']) . ')';
			}
		}

		return array(
			'selectFields' => $selectFields,
			'joinTables' => $joinTables
		);
	} /* END ThemeHouse_BbCodePerms_Extend_XenForo_Model_Post::preparePostJoinOptions */

	/**
	 * @see XenForo_Model_Post::preparePost()
	 */
	public function preparePost(array $post, array $thread, array $forum, array $nodePermissions = null, array $viewingUser = null)
	{
		if (isset($post['node_permission_cache']) && isset($post['message'])) {
			$authorNodePermissions = unserialize($post['node_permission_cache']);

			$this->removeDisallowedBbCodeUrlsFromPost($post['message'], $authorNodePermissions);
			$this->removeDisallowedBbCodeEmailsFromPost($post['message'], $authorNodePermissions);
			$this->removeDisallowedBbCodeMediaFromPost($post['message'], $authorNodePermissions);
			$this->removeDisallowedBbCodeImagesFromPost($post['message'], $authorNodePermissions);
		}

		return parent::preparePost($post, $thread, $forum, $nodePermissions, $viewingUser);
	} /* END ThemeHouse_BbCodePerms_Extend_XenForo_Model_Post::preparePost */

	/**
	 * Removes [URL] BB Code from the message if the author has not been given
	 * explicit permission to use it.
	 *
	 * @param string $message
	 * @param array $nodePermissions Author permissions
	 */
	protected function removeDisallowedBbCodeUrlsFromPost(&$message, array $nodePermissions)
	{
	    if (!XenForo_Permission::hasContentPermission($nodePermissions, 'useBbCodeUrl')) {
	        $patterns = array(
                '/\[url=["\']?(.*?)["\']?\](.*?)((https?:\/\/|ftp:\/\/|www\.)?(.*?))\[\/url\]/is',
                '/\[url\](.*?)\[\/url\]/is',
	        );
	        $message = preg_replace_callback(
                $patterns,
                create_function(
                    '$matches',
                    '
					    if (isset($matches[4]) && $matches[4]) return "[blockedurl]".str_repeat("*", strlen($matches[3]))."[/blockedurl]";
						if (isset($matches[3]) && $matches[3]) return "[blockedurl]".$matches[3]."[/blockedurl]";
						if (isset($matches[1])) return "[blockedurl]".str_repeat("*", strlen($matches[1]))."[/blockedurl]";
                    '
                ),
                $message
	        );
	    }
	} /* END ThemeHouse_BbCodePerms_Extend_XenForo_Model_Post::removeDisallowedBbCodeUrlsFromPost */

	/**
	 * Removes [EMAIL] BB Code from the message if the author has not been
	 * given explicit permission to use it.
	 *
	 * @param string $message
	 * @param array $nodePermissions Author permissions
	 */
	protected function removeDisallowedBbCodeEmailsFromPost(&$message, array $nodePermissions)
	{
	    if (!XenForo_Permission::hasContentPermission($nodePermissions, 'useBbCodeEmail')) {
	        $patterns = array(
                '/\[email=["\']?(.*?)["\']?\](.*?(@(?:.*))?)\[\/email\]/is',
                '/\[email\](.*?)\[\/email\]/is',
	        );
	        $message = preg_replace_callback(
                $patterns,
                create_function(
                    '$matches',
                    '
						if (isset($matches[3]) && $matches[3]) return "[blockedemail]".str_repeat("*", strlen($matches[2]))."[/blockedemail]";
						if (isset($matches[2]) && $matches[2]) return "[blockedemail]".$matches[2]."[/blockedemail]";
						if (isset($matches[1])) return "[blockedemail]".str_repeat("*", strlen($matches[1]))."[/blockedemail]";
					'
                ),
                $message
	        );
	    }
	} /* END ThemeHouse_BbCodePerms_Extend_XenForo_Model_Post::removeDisallowedBbCodeEmailsFromPost */

	/**
	 * Removes [MEDIA] BB Code from the message if the author has not been
	 * given explicit permission to use it.
	 *
	 * @param string $message
	 * @param array $nodePermissions Author permissions
	 */
	protected function removeDisallowedBbCodeMediaFromPost(&$message, array $nodePermissions)
	{
	    if (!XenForo_Permission::hasContentPermission($nodePermissions, 'useBbCodeMedia')) {
	        $pattern = '/\[media=["\']?(.*?)["\']?\](.*?(@(?:.*))?)\[\/media\]/is';
	        $message = preg_replace_callback(
                $pattern,
                create_function(
                    '$matches',
                    '
					    if (isset($matches[1])) return "[blockedmedia]".str_repeat("*", strlen($matches[1]))."[/blockedmedia]";
				    '
                ),
                $message
	        );
	    }
	} /* END ThemeHouse_BbCodePerms_Extend_XenForo_Model_Post::removeDisallowedBbCodeMediaFromPost */


	/**
	 * Removes [IMG] BB Code from the message if the author has not been given
	 * explicit permission to use it.
	 *
	 * @param string $message
	 * @param array $nodePermissions Author permissions
	 */
	protected function removeDisallowedBbCodeImagesFromPost(&$message, array $nodePermissions)
	{
	    if (!XenForo_Permission::hasContentPermission($nodePermissions, 'useBbCodeImg')) {
	        $pattern = '/\[img\](.*?)\[\/img\]/is';
	        $message = preg_replace_callback(
	                $pattern,
	                create_function(
	                        '$matches',
	                        '
					    if (isset($matches[1])) return "[blockedimg]".str_repeat("*", strlen($matches[1]))."[/blockedimg]";
				    '
	                ),
	                $message
	        );
	    }
	} /* END ThemeHouse_BbCodePerms_Extend_XenForo_Model_Post::removeDisallowedBbCodeImagesFromPost */

}