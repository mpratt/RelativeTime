<?php
/**
 * French.php
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
 * French Translation
 */
class French extends LanguageAdapter
{
    protected $strings = array(
        'now' => 'maintenant',
        'ago' => 'depuis %s',
        'left' => '%s restant',
        'seconds' => array(
            'plural' => '%d secondes',
            'singular' => '%d seconde',
        ),
        'minutes' => array(
            'plural' => '%d minutes',
            'singular' => '%d minute',
        ),
        'hours' => array(
            'plural' => '%d heures',
            'singular' => '%d heure',
        ),
        'days' => array(
            'plural' => '%d jours',
            'singular' => '%d jour',
        ),
        'months' => array(
            'plural' => '%d mois',
            'singular' => '%d mois',
        ),
        'years' => array(
            'plural' => '%d années',
            'singular' => '%d année',
        ),
    );
}

?>
