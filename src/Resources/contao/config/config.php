<?php

/**
 * WBGym
 *
 * Copyright (C) 2008-2013 Webteam Weinberg-Gymnasium Kleinmachnow
 *
 * @package 	WGBym
 * @author 		Marvin Ritter <marvin.ritter@gmail.com>
 * @license 	http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

/*
* Hooks
*/
$GLOBALS['TL_HOOKS']['replaceInsertTags'][] = array('WBGym\WBInsertTags','countdown');
$GLOBALS['TL_HOOKS']['replaceInsertTags'][] = array('WBGym\WBInsertTags','secureEmail');
$GLOBALS['TL_HOOKS']['replaceInsertTags'][] = array('WBGym\WBInsertTags','linkTargetBlank');

/**
 * Content Elements
 */
$GLOBALS['TL_CTE']['media']['wb_powerpoint']	= 'WBGym\ContentPowerpoint';