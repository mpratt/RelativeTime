<?php
/**
 * SimplifiedChinese.php
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
 * Chinese (Simplified) Translation
*/
class SimplifiedChinese extends LanguageAdapter
{
    protected $strings = array(
        'now' => '刚刚',
        'ago' => '%s 前',
        'left' => '剩下 %s',
        'seconds' => array(
            'plural' => '%d 秒',
            'singular' => '%d 秒',
        ),
        'minutes' => array(
            'plural' => '%d 分钟',
            'singular' => '%d 分钟',
        ),
        'hours' => array(
            'plural' => '%d 小时',
            'singular' => '%d 小时',
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
