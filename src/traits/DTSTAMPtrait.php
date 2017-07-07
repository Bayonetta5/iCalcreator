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
 * DTSTAMP property functions
 *
 * @author Kjell-Inge Gustafsson, kigkonsult <ical@kigkonsult.se>
 * @since 2.22.23 - 2017-02-02
 */
trait DTSTAMPtrait {
/**
 * @var array component property DTSTAMP value
 * @access protected
 */
  protected $dtstamp = null;
/**
 * Return formatted output for calendar component property dtstamp
 *
 * @return string
 */
  public function createDtstamp() {
    if( util::hasNodate( $this->dtstamp ))
      $this->dtstamp = util::makeDtstamp();
    return util::createElement( util::$DTSTAMP,
                                util::createParams( $this->dtstamp[util::$LCparams] ),
                                util::date2strdate( $this->dtstamp[util::$LCvalue], 7 ));
  }
/**
 * Set calendar component property dtstamp
 *
 * @param mixed $year
 * @param mixed $month
 * @param int   $day
 * @param int   $hour
 * @param int   $min
 * @param int   $sec
 * @param array $params
 * @return bool
 */
  public function setDtstamp( $year, $month=null, $day=null, $hour=null, $min=null, $sec=null, $params=null ) {
    $this->dtstamp = ( empty( $year )) ? util::makeDtstamp()
                                       : util::setDate2( $year, $month, $day, $hour, $min, $sec, $params );
    return true;
  }
}
