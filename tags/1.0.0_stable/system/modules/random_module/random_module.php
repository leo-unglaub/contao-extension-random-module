<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2010 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  LU-Hosting 2010
 * @author     Leo Unglaub <leo@leo-unglaub.net>
 * @package    random_module
 * @license    LGPL
 * @filesource
 */


/**
 * Class random_module
 *
 * @copyright  LU-Hosting 2010
 * @author     Leo Unglaub <leo@leo-unglaub.net>
 * @package    random_module
 */
class random_module extends Module
{
	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_random_module';

	/**
	 * Display a wildcard in the back end
	 * @return string
	 */
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### RANDOM MODULE ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}

		return parent::generate();
	}


	/**
	 * Generate module
	 */
	protected function compile()
	{
		$arrModules = deserialize($this->rm_active_modules);

		// prevent to load the the random module in a loop
		do
		{
			$intLoadModule = $arrModules[array_rand($arrModules)];
		}
		while ($intLoadModule == $this->id);


		// if the user want the indexer out ...
		if ($this->rm_indexer == 'indexer-yes')
		{
			$this->Template->strRandomModule = '<!-- indexer::stop -->' . $this->getFrontendModule($intLoadModule) . '<!-- indexer::continue -->';
		}
		else
		{
			$this->Template->strRandomModule = $this->getFrontendModule($arrModules[array_rand($arrModules)]);
		}
	}
}
?>