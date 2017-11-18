<?php

/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['random_module'] = '{title_legend},name,type,rm_indexer,rm_active_modules;';

/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['rm_indexer'] = array
(
	'label'				=> &$GLOBALS['TL_LANG']['tl_module']['rm_indexer'],
	'exclude'			=> true,
	'inputType'			=> 'select',
	'options'			=> array('indexer-yes', 'indexer-no'),
	'reference'			=> &$GLOBALS['TL_LANG']['tl_module'],
	'eval'				=> array('tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['rm_active_modules'] = array
(
	'label'				=> &$GLOBALS['TL_LANG']['tl_module']['rm_active_modules'],
	'exclude'			=> true,
	'inputType'			=> 'checkbox',
	'options_callback'	=> array('random_module_helper','getActiveModules'),
	'eval'				=> array('multiple'=>true,'tl_class'=>'clr')
);
