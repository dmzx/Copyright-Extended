<?php
/**
 *
 * Copyright Extended. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2020, dmzx, https://www.dmzx-web.net
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace dmzx\copyrightextended\migrations;

use phpbb\db\migration\container_aware_migration;

class copyrightextended_install extends container_aware_migration
{
	public static function depends_on()
	{
		return [
			'\phpbb\db\migration\data\v330\v330'
		];
	}

	public function update_data()
	{
		$parser = $this->container->get('text_formatter.parser');

		$copyrightextended = $parser->parse('[b]© Copyright[/b]!');

		return [
			['config.add', ['dmzx_copyrightextended_version', '1.0.0']],
			['config_text.add', ['dmzx_copyrightextended', $copyrightextended]],

			['module.add', [
				'acp',
				'ACP_CAT_DOT_MODS',
				'ACP_COPYRIGHTEXTENDED_TITLE'
			]],
			['module.add', [
				'acp',
				'ACP_COPYRIGHTEXTENDED_TITLE',
				[
					'module_basename'	=> '\dmzx\copyrightextended\acp\main_module',
					'modes'				=> ['settings'],
				],
			]],
		];
	}
}
