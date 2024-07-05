<?php
/**
 * TestTranslation.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use PHPUnit\Framework\TestCase;

class TranslationTest extends TestCase
{
    public function testSeparator()
    {
        $units = array(
            'hours' => 6,
            'minutes' => 20,
            'seconds' => 07,
        );

        $translation = new \RelativeTime\Translation();
        $result = $translation->translate($units, 0);

        $this->assertCount(count($units), explode(',', $result));
        $this->assertCount(1, explode('-', $result));

        $translation = new \RelativeTime\Translation(array('separator' => '-'));
        $result = $translation->translate($units, 0);

        $this->assertCount(count($units), explode('-', $result));
        $this->assertCount(1, explode(',', $result));
    }

    public function testPluralSingular()
    {
        $units = array(
            'hours' => 1,
        );

        $translation = new \relativetime\translation(array('suffix' => false));
        $result = strtolower($translation->translate($units, 0));

        $this->assertequals($result, '1 hour');

        $units = array(
            'hours' => 100,
        );

        $translation = new \relativetime\translation(array('suffix' => false));
        $result = strtolower($translation->translate($units, 0));

        $this->assertequals($result, '100 hours');

        $units = array(
            'hours' => 0,
        );

        $translation = new \relativetime\translation(array('suffix' => false));
        $result = strtolower($translation->translate($units, 0));

        $this->assertequals($result, '0 hours');
    }

    public function testLanguageLoader()
    {
        $units = array(
            'hours' => 1,
            'days'  => 5,
        );

        $translation = new \relativetime\translation(array('suffix' => false, 'language' => 'InvalidLanguage'));
        $result = $translation->translate($units, 0);

        $this->assertEquals($result, '1 hour, 5 days');

        $translation = new \relativetime\translation(array('suffix' => false, 'language' => 'Spanish'));
        $result = $translation->translate($units, 0);

        $this->assertEquals($result, '1 hora, 5 dias');

        $translation = new \relativetime\translation(array('suffix' => false, 'language' => '\RelativeTime\Languages\Spanish'));
        $result = $translation->translate($units, 0);

        $this->assertEquals($result, '1 hora, 5 dias');

        $translation = new \relativetime\translation(array('suffix' => false, 'language' => 'German'));
        $result = $translation->translate($units, 0);

        $this->assertEquals($result, '1 Stunde, 5 Tagen');

        $translation = new \relativetime\translation(array('suffix' => true, 'language' => 'German'));
        $result = $translation->translate($units, 0);

        $this->assertEquals($result, 'in 1 Stunde, 5 Tagen');

        $translation = new \relativetime\translation(array('suffix' => false, 'language' => '\RelativeTime\Languages\German'));
        $result = $translation->translate($units, 0);

        $this->assertEquals($result, '1 Stunde, 5 Tagen');


        $translation = new \relativetime\translation(array('suffix' => false, 'language' => '\RelativeTime\Languages\PortugueseBR'));
        $result = $translation->translate($units, 0);

        $this->assertEquals($result, '1 hora, 5 dias');

        $translation = new \relativetime\translation(array('suffix' => false, 'language' => new \RelativeTime\Languages\German()));
        $result = $translation->translate($units, 0);

        $this->assertEquals($result, '1 Stunde, 5 Tagen');

        $translation = new \relativetime\translation(array('suffix' => true, 'language' => new \RelativeTime\Languages\German()));
        $result = $translation->translate($units, 0);

        $this->assertEquals($result, 'in 1 Stunde, 5 Tagen');
    }
}
