<?php
/**
 * PortugueseBR.php
 *
 * @author  Fábio Pinho <fabiopinhorj@gmail.com>
 * @link    http://www.fabiopinho.com.br/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace RelativeTime\Languages;

/**
 * Portuguese BR Translation
 */
class PortugueseBR extends LanguageAdapter
{
    protected $strings = array(
        'now' => 'agora',
        'ago' => '%s atrás',
        'left' => '%s restante(s)',
        'seconds' => array(
            'plural' => '%d segundos',
            'singular' => '%d segundo',
        ),
        'minutes' => array(
            'plural' => '%d minutos',
            'singular' => '%d minuto',
        ),
        'hours' => array(
            'plural' => '%d horas',
            'singular' => '%d hora',
        ),
        'days' => array(
            'plural' => '%d dias',
            'singular' => '%d dia',
        ),
        'months' => array(
            'plural' => '%d meses',
            'singular' => '%d mês',
        ),
        'years' => array(
            'plural' => '%d anos',
            'singular' => '%d ano',
        ),
    );
}

?>
