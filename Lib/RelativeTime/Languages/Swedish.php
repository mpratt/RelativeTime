<?php
/**
 * Swedish.php
 *
 * @author  ROllerozxa <temporaryemail4meh@gmail.com>
 * @link    https://github.com/rollerozxa
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace RelativeTime\Languages;

/**
 * Swedish Translation
 */
class Swedish extends LanguageAdapter
{
    protected $strings = array(
        'now' => 'just nu',
        'ago' => '%s sedan',
        'left' => '%s kvar',
        'seconds' => array(
            'plural' => '%d sekunder',
            'singular' => '%d sekund',
        ),
        'minutes' => array(
            'plural' => '%d minuter',
            'singular' => '%d minut',
        ),
        'hours' => array(
            'plural' => '%d timmar',
            'singular' => '%d timme',
        ),
        'days' => array(
            'plural' => '%d dagar',
            'singular' => '%d dag',
        ),
        'months' => array(
            'plural' => '%d månader',
            'singular' => '%d månad',
        ),
        'years' => array(
            'plural' => '%d år',
            'singular' => '%d år',
        ),
    );
}
