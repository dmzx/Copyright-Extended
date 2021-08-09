<?php
/**
 *
 * Copyright Extended. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2020, dmzx, https://www.dmzx-web.net
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace dmzx\copyrightextended\event;

use phpbb\config\db_text;
use phpbb\template\template;
use phpbb\textformatter\s9e\renderer;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class listener implements EventSubscriberInterface
{
	/** @var db_text */
	protected $config_text;

	/** @var renderer */
	protected $renderer;

	/** @var template */
	protected $template;

	/**
	 * Constructor.
	 *
	 * @param db_text		$config_text		Config text object
	 * @param renderer		$renderer			Textformatter renderer object
	 * @param template		$template			Template object
	 */
	public function __construct(
		db_text $config_text,
		renderer $renderer,
		template $template
	)
	{
		$this->config_text		= $config_text;
		$this->renderer			= $renderer;
		$this->template			= $template;
	}

	/**
	 * {@inheritDoc}
	 */
	public static function getSubscribedEvents(): array
	{
		return [
			'core.page_footer' => 'page_footer',
		];
	}

	public function page_footer():void
	{
		$copyrighttext = $this->config_text->get('dmzx_copyrightextended');
		$copyright = $this->renderer->render(htmlspecialchars_decode($copyrighttext, ENT_COMPAT));

		$this->template->assign_vars([
			'COPYRIGHT_EXTENDED' => ($copyright !== '') ? $copyright : '',
		]);
	}
}
