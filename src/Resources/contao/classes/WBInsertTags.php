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

use Contao\PageModel;

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

  public function secureEmail($mail)
  {
    $arrSplit = explode('::',$mail);
    if($arrSplit[0] === 'email_secure') {

      $strEncr = '';
      foreach(str_split($arrSplit[1]) as $char) {
        $strEncr .= chr(ord($char)-5);
      }

      return '<a href="#" 
        class="crypt-mail" 
        data-encr="'. $strEncr .'" 
        onclick="decryptMails();return false;"
        >E-Mail-Adresse anzeigen</a>';
    }
    return false;
  }

  public function linkTargetBlank($link)
  {
	  $arrSplit = explode('::', $link);
	  if($arrSplit[0] == 'link_blank') {
		$objNextPage = PageModel::findByIdOrAlias($arrSplit[1]);

		return '<a href="'.$objNextPage->getFrontendUrl().'" target="_blank" title="'. $objNextPage->title .'">'.$objNextPage->title.'</a>';
	  }
  }
}