<?php

/**
 * WBGym
 *
 * Copyright (C) 2008-2021 Webteam Weinberg-Gymnasium Kleinmachnow
 *
 * @package 	WGBym
 * @author 		Johannes Cram <craj.me@gmail.com>
 * @license 	http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

/**
 * Table tl_content
 */

$GLOBALS['TL_DCA']['tl_content']['palettes']['wb_powerpoint'] = '{type_legend},type,headline;{powerpoint_legend},wb_ppSource,wb_ppSize;{splash_legend},splashImage;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';

$GLOBALS['TL_DCA']['tl_content']['fields']['wb_ppSource'] = array
(
  'exclude'				=> true,
  'inputType'			=> 'text',
  'eval'					=> array('tl_class' => 'w50','mandatory'=>true,'rgpx'=>'url'),
  'sql'					  => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['wb_ppSize'] = array
(
  'exclude'       => true,
  'inputType'     => 'text',
  'eval'          => array('multiple'=>true, 'mandatory'=> true,'size'=>2, 'rgxp'=>'natural', 'nospace'=>true, 'tl_class'=>'clr w50'),
  'sql'           => "varchar(64) NOT NULL default ''"
);