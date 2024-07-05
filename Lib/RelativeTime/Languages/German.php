<?php
/**
 * German.php
 *
 * @author  Michael Pratt <pratt@hablarmierda.net>
 * @link    http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace RelativeTime\Languages;

/**
 * German Translation
 */
class German extends LanguageAdapter
{
    protected $strings = array(
        'now' => 'gerade eben',
        'ago' => 'vor %s',
        'left' => 'in %s',
        'seconds' => array(
            'plural' => '%d Sekunden',
            'singular' => '%d Sekunde',
        ),
        'minutes' => array(
            'plural' => '%d Minuten',
            'singular' => '%d Minute',
        ),
        'hours' => array(
            'plural' => '%d Stunden',
            'singular' => '%d Stunde',
        ),
        'days' => array(
            'plural' => '%d Tagen',
            'singular' => '%d Tag',
        ),
        'weeks' => array(
            'plural' => '%d Wochen',
            'singular' => '%d Woche',
        ),
        'months' => array(
            'plural' => '%d Monaten',
            'singular' => '%d Monat',
        ),
        'years' => array(
            'plural' => '%d Jahren',
            'singular' => '%d Jahr',
        ),
    );
}
