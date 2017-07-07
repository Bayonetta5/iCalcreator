<?php
/**
 * iCalcreator, a PHP rfc2445/rfc5545 solution.
 *
 * copyright 2007-2017 Kjell-Inge Gustafsson, kigkonsult, All rights reserved
 * link      http://kigkonsult.se/iCalcreator/index.php
 * package   iCalcreator
 * version   2.23.20
 * license   By obtaining and/or copying the Software, iCalcreator,
 *           you (the licensee) agree that you have read, understood,
 *           and will comply with the following terms and conditions.
 *           a. The above copyright, link, package and version notices,
 *              this licence notice and
 *              the [rfc5545] PRODID as implemented and invoked in the software
 *              shall be included in all copies or substantial portions of the Software.
 *           b. The Software, iCalcreator, is for
 *              individual evaluation use and evaluation result use only;
 *              non assignable, non-transferable, non-distributable,
 *              non-commercial and non-public rights, use and result use.
 *           c. Creative Commons
 *              Attribution-NonCommercial-NoDerivatives 4.0 International License
 *              (http://creativecommons.org/licenses/by-nc-nd/4.0/)
 *           In case of conflict, a and b supercede c.
 *
 * This file is a part of iCalcreator.
 */
namespace kigkonsult\iCalcreator\traits;
use kigkonsult\iCalcreator\util\util;
/**
 * CATEGORIES property functions
 *
 * @author Kjell-Inge Gustafsson, kigkonsult <ical@kigkonsult.se>
 * @since 2.22.23 - 2017-02-02
 */
trait CATEGORIEStrait {
/**
 * @var array component property CATEGORIES value
 * @access protected
 */
  protected $categories = null;
/**
 * Return formatted output for calendar component property categories
 *
 * @return string
 */
  public function createCategories() {
    if( empty( $this->categories ))
      return null;
    $output = null;
    $lang   = $this->getConfig( util::$LANGUAGE );
    foreach( $this->categories as $cx => $category ) {
      if( empty( $category[util::$LCvalue] )) {
        if ( $this->getConfig( util::$ALLOWEMPTY ))
          $output .= util::createElement( util::$CATEGORIES );
        continue;
      }
      if( is_array( $category[util::$LCvalue] )) {
        foreach( $category[util::$LCvalue] as $cix => $cValue )
          $category[util::$LCvalue][$cix] = util::strrep( $cValue );
        $content  = implode( util::$COMMA, $category[util::$LCvalue] );
      }
      else
        $content  = util::strrep( $category[util::$LCvalue] );
      $output    .= util::createElement( util::$CATEGORIES,
                                         util::createParams( $category[util::$LCparams],
                                                             [util::$LANGUAGE],
                                                             $lang ),
                                         $content );
    }
    return $output;
  }
/**
 * Set calendar component property categories
 *
 * @param mixed   $value
 * @param array   $params
 * @param integer $index
 * @return bool
 */
  public function setCategories( $value, $params=null, $index=null ) {
    if( empty( $value )) {
      if( $this->getConfig( util::$ALLOWEMPTY ))
        $value = util::$EMPTYPROPERTY;
      else
        return false;
    }
    util::setMval( $this->categories,
                    $value,
                    $params,
                    false,
                    $index );
    return true;
  }
}
