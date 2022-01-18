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
    public function testAgo()
    {
        $english = new \RelativeTime\Languages\English();
        $this->assertEquals($english->ago(), '%s ago');
    }

    public function testnow()
    {
        $english = new \RelativeTime\Languages\English();
        $this->assertEquals($english->now(), 'just now');
    }

    public function testLeft()
    {
        $english = new \RelativeTime\Languages\English();
        $this->assertEquals($english->left(), '%s left');
    }

    public function testInvalidIndex()
    {
        $this->expectException('InvalidArgumentException');
        $english = new \RelativeTime\Languages\English();
        $english->singular('decades');
    }
}
