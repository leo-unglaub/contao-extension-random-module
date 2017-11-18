<?php

/**
 * Class random_module
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
