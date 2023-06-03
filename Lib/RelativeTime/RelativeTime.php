<?php
/**
* RelativeTime.php
*
* @author  Michael Pratt <pratt@hablarmierda.net>
* @link    http://www.michael-pratt.com/
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*
*/

namespace RelativeTime;

use \RelativeTime\Languages\English;
use \RelativeTime\Translation;
use \DateTime;
use \DateInterval;

/**
* The Main Class of the library
*/
class RelativeTime
{
    /** @const int Class constant with the current Version of this library */
    const VERSION = '1.5.13';

    /** @var array Array With configuration options **/
    protected $config = array();

    /** @var object instance of \Relativetime\Translation **/
    protected $translation;

    /**
* Construct
*
* @param array $config Associative array with configuration directives
*
*/
    public function __construct(array $config = array())
    {
        $this->config = array_merge(array(
            'language' => new English(),
            'separator' => ', ',
            'use_weeks' => false,
            'suffix' => true,
            'truncate' => 0,
        ), $config);

        $this->translation = new Translation($this->config);
    }

    /**
* Converts 2 dates to its relative time.
*
* @param string $fromTime
* @param string $toTime When null is given, uses the current date.
* @return string
*/
    public function convert($fromTime, $toTime = null)
    {
        $interval = $this->getInterval($fromTime, $toTime);
        $units = $this->calculateUnits($interval);

        return $this->translation->translate($units, $interval->invert);
    }

    /**
* Tells the time passed between the current date and the given date
*
* @param string $date
* @return string
*/
    public function timeAgo($date)
    {
        $interval = $this->getInterval(time(), $date);
        if ($interval->invert) {
            return $this->convert(time(), $date);
        }

        return $this->translation->translate();
    }

    /**
* Tells the time until the given date
*
* @param string $date
* @return string
*/
    public function timeLeft($date)
    {
        $interval = $this->getInterval($date, time());
        if ($interval->invert) {
            return $this->convert(time(), $date);
        }

        return $this->translation->translate();
    }

    /**
* Calculates the interval between the dates and returns
* an array with the valid time.
*
* @param string $fromTime
* @param string $toTime When null is given, uses the current date.
* @return DateInterval
*/
    protected function getInterval($fromTime, $toTime = null)
    {
        $fromTime = new DateTime($this->normalizeDate($fromTime));
        $toTime   = new DateTime($this->normalizeDate($toTime));

        return $fromTime->diff($toTime);
    }

    /**
* Normalizes a date for the DateTime class
*
* @param string $date
* @return string
*/
    protected function normalizeDate($date)
    {
        $date = str_replace(array('/', '|'), '-', $date);

        if (empty($date)) {
            return date('Y-m-d H:i:s');
        } else if (ctype_digit($date)) {
            return date('Y-m-d H:i:s', $date);
        }

        return $date;
    }

    /**
* Given a DateInterval, creates an array with the time
* units and truncates it when necesary.
*
* @param DateInterval $interval
* @return array
*/
    protected function calculateUnits(DateInterval $interval)
    {
        $units = array_filter(array(
            'years'   => (int) $interval->y,
            'months'  => (int) $interval->m,
            'weeks'   => 1, // We have to assign this here so we can preserve the order of the units.
            'days'    => (int) $interval->d,
            'hours'   => (int) $interval->h,
            'minutes' => (int) $interval->i,
            'seconds' => (int) $interval->s,
        ));

        if ($this->config['use_weeks'] && isset($units['days']) && $units['days'] > 6) {
            $units['weeks'] = floor($units['days'] / 7);
            $units['days'] = ($units['days'] - floor($units['weeks'] * 7));
            if ($units['days'] <= 0) {
                unset($units['days']);
            }
        } else {
            unset($units['weeks']);
        }

        if (empty($units)) {
            return array();
        } else if ((int) $this->config['truncate'] > 0) {
            return array_slice($units, 0, (int) $this->config['truncate']);
        }

        return $units;
    }
}
