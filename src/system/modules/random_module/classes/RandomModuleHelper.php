<?php

/**
 * Class random_module_helper
 */
class random_module_helper extends Backend
{
	/**
	 * Return all created modules as array
	 *
	 * @param	void
	 * @return	array
	 */
	public function getActiveModules ()
	{
		// get the currecnt database instance
		$objDb = Database::getInstance ();


		// get all modules
		// TODO: maybe only get published modules
		$objModules = $objDb->prepare ('SELECT id,name FROM tl_module')
							->execute ();


		// prepare the query data
		while ($objModules->next ())
		{
			$arrReturn[$objModules->id] = $objModules->name;
		}


		// sort the result
		asort ($arrReturn);
		return $arrReturn;
	}
}
