<?php
/**
 * TraditionalChinese.php
 *
 * @author  Eric Zhang <ericxiang456@gmail.com>
 * @link    https://ericafterericplus.wordpress.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace RelativeTime\Languages;

/**
 * Chinese (Traditional) Translation
*/
class TraditionalChinese extends LanguageAdapter
{
    protected $strings = array(
        'now' => '剛剛',
        'ago' => '%s 前',
        'left' => '剩下 %s',
        'seconds' => array(
            'plural' => '%d 秒',
            'singular' => '%d 秒',
        ),
        'minutes' => array(
            'plural' => '%d 分鐘',
            'singular' => '%d 分鐘',
        ),
        'hours' => array(
            'plural' => '%d 小時',
            'singular' => '%d 小時',
        ),
        'days' => array(
            'plural' => '%d 天',
            'singular' => '%d 天',
        ),
        'weeks' => array(
            'plural' => '%d 周',
            'singular' => '%d 周',
        ),
        'months' => array(
            'plural' => '%d 月',
            'singular' => '%d 月',
        ),
        'years' => array(
            'plural' => '%d 年',
            'singular' => '%d 年',
        ),
    );
}
