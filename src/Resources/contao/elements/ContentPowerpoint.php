<?php

/**
 * WBGym
 *
 * Copyright (C) 2021 Webteam Weinberg-Gymnasium Kleinmachnow
 *
 * @package     WGBym
 * @author      Johannes Cram <johannes@jonesmedia.de>
 * @license     http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

/**
 * Namespace
 */
namespace WBGym;

use Contao\FilesModel;
use Contao\StringUtil;
use Contao\System;

class ContentPowerpoint extends \ContentElement {

  /**
   * Template
   * @var string
   */
  protected $strTemplate = 'ce_wb_powerpoint';

  /**
   * Show the iframe code in the backend
   *
   * @return string
   */
  public function generate()
  {
    if (!$this->wb_ppSource)
    {
      return '';
    }

    $request = System::getContainer()->get('request_stack')->getCurrentRequest();

    if ($request && System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request))
    {
      $return = '<p>Source: "' . $this->wb_ppSource . '"</p>';

      if ($this->headline)
      {
        $return = '<' . $this->hl . '>' . $this->headline . '</' . $this->hl . '>' . $return;
      }

      return $return;
    }

    return parent::generate();
  }

  /**
   * Generate content element
   */
  protected function compile()
  {
    $size = StringUtil::deserialize($this->wb_ppSize);

    if (!\is_array($size) || empty($size[0]) || empty($size[1]))
    {
      $this->Template->size = ' width="640" height="360"';
      $this->Template->width = 640;
      $this->Template->height = 360;
    }
    else
    {
      $this->Template->size = ' width="' . $size[0] . '" height="' . $size[1] . '"';
      $this->Template->width = $size[0];
      $this->Template->height = $size[1];
    }

    if ($this->splashImage)
    {
      $objFile = FilesModel::findByUuid($this->singleSRC);

      if ($objFile !== null && is_file(TL_ROOT . '/' . $objFile->path))
      {
        $this->singleSRC = $objFile->path;

        $objSplash = new \stdClass();
        $this->addImageToTemplate($objSplash, $this->arrData, null, null, $objFile);
        $this->Template->splashImage = $objSplash;
      }
    }

    $this->Template->source = $this->wb_ppSource;
  }
}