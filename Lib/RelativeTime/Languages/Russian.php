<?php
/**
 * Russian.php
 *
 * @author  Vladimír Barinov <veselcraft@yandex.ru>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace RelativeTime\Languages;

/**
 * Russian Translation
 */
class Russian extends LanguageAdapter
{
    protected $strings = array(
        'now' => 'только что',
        'ago' => '%s назад',
        'left' => 'осталось %s',
        'seconds' => array(
            'plural' => '%d секунд',
            'singular' => '%d секунда',
        ),
        'minutes' => array(
            'plural' => '%d минут',
            'singular' => '%d минута',
        ),
        'hours' => array(
            'plural' => '%d часов',
            'singular' => '%d час',
        ),
        'days' => array(
            'plural' => '%d дней',
            'singular' => '%d день',
        ),
        'weeks' => array(
            'plural' => '%d Недели',
            'singular' => '%d Неделю',
        ),
        'months' => array(
            'plural' => '%d месяцев',
            'singular' => '%d месяц',
        ),
        'years' => array(
            'plural' => '%d лет',
            'singular' => '%d год',
        ),
    );
}
