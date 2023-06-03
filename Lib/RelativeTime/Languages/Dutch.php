<?php
/**
 * Dutch.php
 *
 * @author  Ruben Vincenten <rubenvincenten@gmail.com>
 * @link    https://github.com/Langmans
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace RelativeTime\Languages;

/**
 * Dutch Translation
 */
class Dutch extends LanguageAdapter
{
    protected $strings = array(
        'now' => 'zojuist',
        'ago' => '%s geleden',
        'left' => 'nog %s',
        'seconds' => array(
            'plural' => '%d seconden',
            'singular' => '%d seconde',
        ),
        'minutes' => array(
            'plural' => '%d minuten',
            'singular' => '%d minuut',
        ),
        'hours' => array(
            'plural' => '%d uur',
            'singular' => '%d uur',
        ),
        'days' => array(
            'plural' => '%d dagen',
            'singular' => '%d dag',
        ),
        'weeks' => array(
            'plural' => '%d weken',
            'singular' => '%d week',
        ),
        'months' => array(
            'plural' => '%d maanden',
            'singular' => '%d maand',
        ),
        'years' => array(
            'plural' => '%d jaren',
            'singular' => '%d jaar',
        ),
    );
}
