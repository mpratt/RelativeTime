<?php
/**
 * Czech.php
 *
 * @author  Martin Procházka <juniwalk@outlook.cz>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace RelativeTime\Languages;

/**
 * Czech Translation
 */
class Czech extends LanguageAdapter
{
    protected $strings = array(
        'now' => 'právě teď',
        'ago' => 'před %s',
        'left' => 'zbývá %s',
        'seconds' => array(
            'plural' => '%d sekund',
            'singular' => '%d sekunda',
        ),
        'minutes' => array(
            'plural' => '%d minut',
            'singular' => '%d minuta',
        ),
        'hours' => array(
            'plural' => '%d hodin',
            'singular' => '%d hodina',
        ),
        'days' => array(
            'plural' => '%d dní',
            'singular' => '%d den',
        ),
        'months' => array(
            'plural' => '%d měsíců',
            'singular' => '%d měsíc',
        ),
        'years' => array(
            'plural' => '%d roků',
            'singular' => '%d rok',
        ),
    );
}
