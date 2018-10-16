<?php

/**
 * WBGym
 * 
 * Copyright (C) 2016 Webteam Weinberg-Gymnasium Kleinmachnow
 * 
 * @package     WGBym
 * @author		Johannes Cram <craj.me@gmail.com>
 * @license     http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

/**
 * Namespace
 */
namespace WBGym;

class WBInsertTags extends \System {
	
	public function countdown($tag) {
		$arrSplit = explode('::',$tag);
		if($arrSplit[0] == 'cntdwn_days') {
			if(strtotime($arrSplit[1]) !== false) {
				
				if(strtotime($arrSplit[1]) > $time) {
					$now = new \DateTime(date('Y-m-d H:i'));
					$end = new \DateTime($arrSplit[1]);
					$diff = $end->diff($now);
					
					if($diff->format("%a") == 0) {
						if($diff->format("%h") == 0) {
							return $diff->format("%i") . ' Minuten';
						}
						return $diff->format("%h") . ' Stunden';
					}
					return $end->diff($now)->format("%a") . ' Tage';
				}
				
				return '0 Tage';
			}
			return '[Wrong Format]';
		}
		return false;
	}
	
	
}
?>