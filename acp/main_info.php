<?php
/**
 *
 * Copyright Extended. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2020, dmzx, https://www.dmzx-web.net
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace dmzx\copyrightextended\acp;

/**
 * Copyright Extended ACP module info.
 */
class main_info
{
	public function module()
	{
		return [
			'filename'	=> '\dmzx\copyrightextended\acp\main_module',
			'title'		=> 'ACP_COPYRIGHTEXTENDED_TITLE',
			'modes'		=> [
				'settings'	=> [
					'title'	=> 'ACP_COPYRIGHTEXTENDED',
					'auth'	=> 'ext_dmzx/copyrightextended && acl_a_board',
					'cat'	=> ['ACP_COPYRIGHTEXTENDED_TITLE']
				],
			],
		];
	}
}
