<?php
/**
 *
 * Copyright Extended. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2021, dmzx, https://www.dmzx-web.net
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace dmzx\copyrightextended\migrations;

use phpbb\db\migration\container_aware_migration;

class copyrightextended_v102 extends container_aware_migration
{
	public static function depends_on()
	{
		return [
			'\dmzx\copyrightextended\migrations\copyrightextended_v101'
		];
	}

	public function update_data()
	{
		return [
			['config.update', ['dmzx_copyrightextended_version', '1.0.2']],
		];
	}
}
