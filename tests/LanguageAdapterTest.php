<?php
/**
 * TestLanguageAdapter.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use PHPUnit\Framework\TestCase;

class LanguageAdapterTest extends TestCase
{
    public function testKeySet()
    {
        $english = new \RelativeTime\Languages\English();
        $english['ago'] = 'time ago';

        $this->assertEquals($english['ago'], 'time ago');
    }

    public function testKeyExists()
    {
        $english = new \RelativeTime\Languages\English();
        $this->assertTrue(isset($english['ago']));
        $this->assertFalse(isset($english['some_random_key']));
    }

    public function testUnsetKey()
    {
        $english = new \RelativeTime\Languages\English();
        $this->assertTrue(isset($english['ago']));
        unset($english['ago']);

        $this->assertFalse(isset($english['ago']));
    }

    public function testGetKeys()
    {
        $english = new \RelativeTime\Languages\English();
        $keys = $english->keys();

        $defaultKeys = array(
            'now',
            'ago',
            'left',
            'seconds',
            'minutes',
            'hours',
            'days',
            'months',
            'years',
        );

        $this->assertEquals($keys, $defaultKeys);
    }

    public function testInvalidIndex()
    {
        $this->expectException('InvalidArgumentException');

        $english = new \RelativeTime\Languages\English();
        $english['unknown_key'];
    }
}
