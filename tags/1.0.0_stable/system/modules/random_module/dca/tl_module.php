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
?>