<?php
/**
 * TestRelativeTime.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use RelativeTime\Languages\LanguageAdapter;

class RelativeTimeTest extends TestCase
{
    public static function dateDefaultConversionProvider()
    {
        return array(
            array('2010-09-05', '2010-03-30', '5 months, 6 days ago'),
            array('2012-03-05', '2013/02/05', '11 months left'),
            array('2010-09-05', '2010/10/05', '1 month left'),
            array(
                '2014-09-05',
                '2010-09-07',
                '3 years, 11 months, 28 days ago',
            ),
            array('2010-09-05', '2010-03-30', '5 months, 6 days ago'),
            array('2013-06', '2013-8', '2 months left'),
            array('2014-10', '2014-05', '5 months ago'),
            array('2018-10', '2013-10', '5 years ago'),
            array('2013-05-05', '2013-09-22', '4 months, 17 days left'),
            array('2010-09-30', '2010-03-28', '6 months, 2 days ago'),
            array('2013-09-20', '2013/09/22', '2 days left'),
            array('2010-02-05', '2010/02/04', '1 day ago'),
            array(1379455200, 1382047200, '1 month left'),
            array(null, null, 'just now'),
        );
    }

    #[DataProvider('dateDefaultConversionProvider')]
    public function testDefaultDateConversion($fromTime, $toTime, $expected)
    {
        $rt = new \RelativeTime\RelativeTime();
        $result = $rt->convert($fromTime, $toTime);
        $this->assertEquals($expected, $result);
    }

    public static function dateConversionProvider()
    {
        return array(
            array(
                new \RelativeTime\Languages\English(),
                array(
                    array('2010-09-05', '2010-03-30', '5 months, 6 days ago'),
                    array('2012-03-05', '2013/02/05', '11 months left'),
                    array('2010-09-05', '2010/10/05', '1 month left'),
                    array(
                        '2014-09-05',
                        '2010-09-07',
                        '3 years, 11 months, 28 days ago',
                    ),
                    array('2010-09-05', '2010-03-30', '5 months, 6 days ago'),
                    array('2013-06', '2013-8', '2 months left'),
                    array('2014-10', '2014-05', '5 months ago'),
                    array('2018-10', '2013-10', '5 years ago'),
                    array('2013-05-05', '2013-09-22', '4 months, 17 days left'),
                    array('2010-09-30', '2010-03-28', '6 months, 2 days ago'),
                    array('2013-09-20', '2013/09/22', '2 days left'),
                    array('2010-02-05', '2010/02/04', '1 day ago'),
                    array(1379455200, 1382047200, '1 month left'),
                    array(null, null, 'just now'),
                ),
            ),
            array(
                new \RelativeTime\Languages\German(),
                array(
                    array('2010-09-05', '2010-03-30', 'vor 5 Monaten, 6 Tagen'),
                    array('2012-03-05', '2013/02/05', 'in 11 Monaten'),
                    array('2010-09-05', '2010/10/05', 'in 1 Monat'),
                    array(
                        '2014-09-05',
                        '2010-09-07',
                        'vor 3 Jahren, 11 Monaten, 28 Tagen',
                    ),
                    array('2010-09-05', '2010-03-30', 'vor 5 Monaten, 6 Tagen'),
                    array('2013-06', '2013-8', 'in 2 Monaten'),
                    array('2014-10', '2014-05', 'vor 5 Monaten'),
                    array('2018-10', '2013-10', 'vor 5 Jahren'),
                    array('2013-05-05', '2013-09-22', 'in 4 Monaten, 17 Tagen'),
                    array('2010-09-30', '2010-03-28', 'vor 6 Monaten, 2 Tagen'),
                    array('2013-09-20', '2013/09/22', 'in 2 Tagen'),
                    array('2010-02-05', '2010/02/04', 'vor 1 Tag'),
                    array(1379455200, 1382047200, 'in 1 Monat'),
                    array(null, null, 'gerade eben'),
                ),
            ),
        );
    }

    #[DataProvider('dateConversionProvider')]
    public function testDateConversion(LanguageAdapter $languageAdapter, array $dataSet)
    {
        $rt = new \RelativeTime\RelativeTime(array('language' => $languageAdapter));
        foreach ($dataSet as $data) {
            list($fromTime, $toTime, $expected) = $data;
            $result = $rt->convert($fromTime, $toTime);
            $this->assertEquals($expected, $result);
        }
    }

    public static function defaultWeekConversionProvider()
    {
        return array(
            array('2010-09-01', '2010-09-08', '1 week left'),
            array('2010-09-01', '2010-09-15', '2 weeks left'),
            array('2010-09-01', '2010-09-16', '2 weeks, 1 day left'),
            array('2018-09-01', '2010-09-16', '7 years, 11 months, 2 weeks, 1 day ago',),
            array('2010-09-01', '2010-09-29', '4 weeks left'),
            array('2010-09-01', '2010-09-30', '4 weeks, 1 day left'),
        );
    }
    #[DataProvider('defaultWeekConversionProvider')]
    public function testDefaultWeekConversion($fromTime, $toTime, $expected)
    {
        $rt = new \RelativeTime\RelativeTime(['use_weeks' => true]);
        $result = $rt->convert($fromTime, $toTime);
        $this->assertEquals($expected, $result);
    }

    public static function weekConversionProvider()
    {
        return array(
            array(
                new \RelativeTime\Languages\English(),
                array(
                    array('2010-09-01', '2010-09-08', '1 week left'),
                    array('2010-09-01', '2010-09-15', '2 weeks left'),
                    array('2010-09-01', '2010-09-16', '2 weeks, 1 day left'),
                    array('2018-09-01', '2010-09-16', '7 years, 11 months, 2 weeks, 1 day ago'),
                    array('2010-09-01', '2010-09-29', '4 weeks left'),
                    array('2010-09-01', '2010-09-30', '4 weeks, 1 day left'),
                ),
            ),
            array(
                new \RelativeTime\Languages\German(),
                array(
                    array('2010-09-01', '2010-09-08', 'in 1 Woche'),
                    array('2010-09-01', '2010-09-15', 'in 2 Wochen'),
                    array('2010-09-01', '2010-09-16', 'in 2 Wochen, 1 Tag'),
                    array('2018-09-01', '2010-09-16', 'vor 7 Jahren, 11 Monaten, 2 Wochen, 1 Tag'),
                    array('2010-09-01', '2010-09-29', 'in 4 Wochen'),
                    array('2010-09-01', '2010-09-30', 'in 4 Wochen, 1 Tag'),
                ),
            ),
        );
    }

    #[DataProvider('weekConversionProvider')]
    public function testWeekConversion(LanguageAdapter $languageAdapter, array $dataSet)
    {
        $rt = new \RelativeTime\RelativeTime(['language' => $languageAdapter, 'use_weeks' => true]);
        foreach ($dataSet as $data) {
            list($fromTime, $toTime, $expected) = $data;
            $result = $rt->convert($fromTime, $toTime);
            $this->assertEquals($expected, $result);
        }
    }

    public static function DefaultTimeConversionProvider()
    {
        return array(
            array('10:05:00', '10:06:00', '1 minute left'),
            array('17:00:01', '6:05:30', '10 hours, 54 minutes, 31 seconds ago'),
            array('17:00:01', '17:00:30', '29 seconds left'),
            array('17:00:01', '17:00:00', '1 second ago'),
            array('17:00', '12:00', '5 hours ago'),
            array('17:00', '12:43', '4 hours, 17 minutes ago'),
            array('17:05', '17:08', '3 minutes left'),
        );
    }

    #[DataProvider('DefaultTimeConversionProvider')]
    public function testDefaultTimeConversion($fromTime, $toTime, $expected)
    {
        $rt = new \RelativeTime\RelativeTime();
        $result = $rt->convert($fromTime, $toTime);
        $this->assertEquals($expected, $result);
    }

    public static function timeConversionProvider()
    {
        return array(
            array(
                new \RelativeTime\Languages\English(),
                array(
                    array('10:05:00', '10:06:00', '1 minute left'),
                    array('17:00:01', '6:05:30', '10 hours, 54 minutes, 31 seconds ago'),
                    array('17:00:01', '17:00:30', '29 seconds left'),
                    array('17:00:01', '17:00:00', '1 second ago'),
                    array('17:00', '12:00', '5 hours ago'),
                    array('17:00', '12:43', '4 hours, 17 minutes ago'),
                    array('17:05', '17:08', '3 minutes left'),
                ),
            ),
            array(
                new \RelativeTime\Languages\German(),
                array(
                    array('10:05:00', '10:06:00', 'in 1 Minute'),
                    array('17:00:01', '6:05:30', 'vor 10 Stunden, 54 Minuten, 31 Sekunden'),
                    array('17:00:01', '17:00:30', 'in 29 Sekunden'),
                    array('17:00:01', '17:00:00', 'vor 1 Sekunde'),
                    array('17:00', '12:00', 'vor 5 Stunden'),
                    array('17:00', '12:43', 'vor 4 Stunden, 17 Minuten'),
                    array('17:05', '17:08', 'in 3 Minuten'),
                ),
            ),
        );
    }

    #[DataProvider('timeConversionProvider')]
    public function testTimeConversion(LanguageAdapter $languageAdapter, array $dataSet)
    {
        $rt = new \RelativeTime\RelativeTime(['language' => $languageAdapter]);
        foreach ($dataSet as $data) {
            list($fromTime, $toTime, $expected) = $data;
            $result = $rt->convert($fromTime, $toTime);
            $this->assertEquals($expected, $result);
        }
    }


    public static function defaultDateTimeConversionProvider()
    {
        return array(
            array('2013-09-25 07:35:02', '2010-08-25 16:22:59', '3 years, 30 days, 15 hours, 12 minutes, 3 seconds ago'),
            array('2013-08-25 16:35:02', '2010-08-25 16:22:59', '3 years, 12 minutes, 3 seconds ago'),
        );
    }

    #[DataProvider('defaultDateTimeConversionProvider')]
    public function testDefaultDateTimeConversion($fromTime, $toTime, $expected)
    {
        $rt = new \RelativeTime\RelativeTime();
        $result = $rt->convert($fromTime, $toTime);
        $this->assertEquals($expected, $result);
    }

    public static function dateTimeConversionProvider()
    {
        return array(
            array(
                new \RelativeTime\Languages\English(),
                array(
                    array('2013-09-25 07:35:02', '2010-08-25 16:22:59', '3 years, 30 days, 15 hours, 12 minutes, 3 seconds ago'),
                    array('2013-08-25 16:35:02', '2010-08-25 16:22:59', '3 years, 12 minutes, 3 seconds ago'),
                ),
            ),
            array(
                new \RelativeTime\Languages\German(),
                array(
                    array('2013-09-25 07:35:02', '2010-08-25 16:22:59', 'vor 3 Jahren, 30 Tagen, 15 Stunden, 12 Minuten, 3 Sekunden'),
                    array('2013-08-25 16:35:02', '2010-08-25 16:22:59', 'vor 3 Jahren, 12 Minuten, 3 Sekunden'),
                ),
            ),
        );
    }
    #[DataProvider('dateTimeConversionProvider')]
    public function testDateTimeConversion(LanguageAdapter $languageAdapter, array $dataSet)
    {
        $rt = new \RelativeTime\RelativeTime(['language' => $languageAdapter]);
        foreach ($dataSet as $data) {
            list($fromTime, $toTime, $expected) = $data;
            $result = $rt->convert($fromTime, $toTime);
            $this->assertEquals($expected, $result);
        }
    }

    public function testDefaultInvalidDate()
    {
        $this->expectException('Exception');

        $rt = new \RelativeTime\RelativeTime();
        $result = $rt->convert('10 05 00', '10 06 00');
        $this->assertEquals($result, '1 minute left');
    }

    public static function provideLanguagesForInvalidDate() {
        return array(
            array(
                new \RelativeTime\Languages\English(),
                '1 minute left',
            ),
            array(
                new \RelativeTime\Languages\German(),
                'in 1 Minute',
            ),
        );
    }

    #[DataProvider('provideLanguagesForInvalidDate')]
    public function testInvalidDate(LanguageAdapter $languageAdapter, $expected)
    {
        $this->expectException('Exception');

        $rt = new \RelativeTime\RelativeTime(array('language' => $languageAdapter));
        $result = $rt->convert('10 05 00', '10 06 00');
        $this->assertEquals($result, $expected);
    }

    public static function provideLanguagesForTimeAgo() {
        return array(
            array(
                array(
                    'language'  => '\RelativeTime\Languages\English',
                    'separator' => ', ',
                    'suffix'    => true,
                    'truncate'  => 0,
                    'use_weeks' => false,
                ),
                '2 days ago',
                'just now',
            ),
            array(
                array(
                    'language'  => '\RelativeTime\Languages\German',
                    'separator' => ', ',
                    'suffix'    => true,
                    'truncate'  => 0,
                    'use_weeks' => false,
                ),
                'vor 2 Tagen',
                'gerade eben',
            ),
        );
    }

    #[DataProvider('provideLanguagesForTimeAgo')]
    public function testConfigTimeAgo(array $config, $expected1, $expected2)
    {
        $rt = new \RelativeTime\RelativeTime($config);
        $time = strtotime('-2 days');
        $result = $rt->timeAgo($time);
        $this->assertEquals($result, $expected1);

        $time = strtotime('+2 days');
        $result = $rt->timeAgo($time);
        $this->assertEquals($result, $expected2);
    }

    public static function provideLanguagesForTimeLeft() {
        return array(
            array(
                array(
                    'language'  => '\RelativeTime\Languages\English',
                    'separator' => ', ',
                    'suffix'    => true,
                    'truncate'  => 0,
                    'use_weeks' => false,
                ),
                '2 days left',
                'just now',
            ),
            array(
                array(
                    'language'  => '\RelativeTime\Languages\German',
                    'separator' => ', ',
                    'suffix'    => true,
                    'truncate'  => 0,
                    'use_weeks' => false,
                ),
                'in 2 Tagen',
                'gerade eben',
            ),
        );
    }
    #[DataProvider('provideLanguagesForTimeLeft')]
    public function testConfigTimeLeft(array $config, $expected1, $expected2)
    {
        $rt = new \RelativeTime\RelativeTime($config);
        $time = strtotime('+2 days');
        $result = $rt->timeLeft($time);
        $this->assertEquals($result, $expected1);

        $time = strtotime('-2 days');
        $result = $rt->timeLeft($time);
        $this->assertEquals($result, $expected2);
    }

    public function testDefaultTimeAgo()
    {
        $rt = new \RelativeTime\RelativeTime();
        $time = strtotime('-2 days');
        $result = $rt->timeAgo($time);
        $this->assertEquals($result, '2 days ago');

        $time = strtotime('+2 days');
        $result = $rt->timeAgo($time);
        $this->assertEquals($result, 'just now');
    }

    public function testDefaultTimeLeft()
    {
        $rt = new \RelativeTime\RelativeTime();
        $time = strtotime('+2 days');
        $result = $rt->timeLeft($time);
        $this->assertEquals($result, '2 days left');

        $time = strtotime('-2 days');
        $result = $rt->timeLeft($time);
        $this->assertEquals($result, 'just now');
    }

    public function testDefaultNow()
    {
        $rt = new \RelativeTime\RelativeTime();
        $time = time();
        $result = $rt->convert($time, $time);
        $this->assertEquals($result, 'just now');
    }

    public static function provideLanguagesForNow() {
        return array(
            array(
                new \RelativeTime\Languages\English(),
                'just now',
            ),
            array(
                new \RelativeTime\Languages\German(),
                'gerade eben',
            ),
        );
    }

    #[DataProvider('provideLanguagesForNow')]
    public function testNow(LanguageAdapter $language, $expected)
    {
        $rt = new \RelativeTime\RelativeTime(['language' => $language ]);
        $time = time();
        $result = $rt->convert($time, $time);
        $this->assertEquals($expected, $result);
    }

    public static function defaultTruncateProvider()
    {
        return array(
            array(null, '2 years, 6 months, 30 days, 15 hours, 12 minutes, 3 seconds ago'),
            array(10, '2 years, 6 months, 30 days, 15 hours, 12 minutes, 3 seconds ago'),
            array(5, '2 years, 6 months, 30 days, 15 hours, 12 minutes ago'),
            array(4, '2 years, 6 months, 30 days, 15 hours ago'),
            array(3, '2 years, 6 months, 30 days ago'),
            array(2, '2 years, 6 months ago'),
            array(1, '2 years ago'),
            array(0, '2 years, 6 months, 30 days, 15 hours, 12 minutes, 3 seconds ago'),
            array(-1, '2 years, 6 months, 30 days, 15 hours, 12 minutes, 3 seconds ago'),
        );
    }
    #[DataProvider('defaultTruncateProvider')]
    public function testDefaultTruncate($truncate, $expected)
    {
        $rt = new \RelativeTime\RelativeTime(is_null($truncate) ? array() : ['truncate' => $truncate]);
        $result = $rt->convert('2013-03-25 07:35:02', '2010-08-25 16:22:59');
        $this->assertEquals($expected, $result);
    }

    public static function truncateProvider()
    {
        return array(
            array(
                new \RelativeTime\Languages\English(),
                array(
                    array(null, '2 years, 6 months, 30 days, 15 hours, 12 minutes, 3 seconds ago'),
                    array(10, '2 years, 6 months, 30 days, 15 hours, 12 minutes, 3 seconds ago'),
                    array(5, '2 years, 6 months, 30 days, 15 hours, 12 minutes ago'),
                    array(4, '2 years, 6 months, 30 days, 15 hours ago'),
                    array(3, '2 years, 6 months, 30 days ago'),
                    array(2, '2 years, 6 months ago'),
                    array(1, '2 years ago'),
                    array(0, '2 years, 6 months, 30 days, 15 hours, 12 minutes, 3 seconds ago'),
                    array(-1, '2 years, 6 months, 30 days, 15 hours, 12 minutes, 3 seconds ago'),
                )
            ),
            array(
                new \RelativeTime\Languages\German(),
                array(
                    array(null, '2 years, 6 months, 30 days, 15 hours, 12 minutes, 3 seconds ago'),
                    array(10, 'vor 2 Jahren, 6 Monaten, 30 Tagen, 15 Stunden, 12 Minuten, 3 Sekunden'),
                    array(5, 'vor 2 Jahren, 6 Monaten, 30 Tagen, 15 Stunden, 12 Minuten'),
                    array(4, 'vor 2 Jahren, 6 Monaten, 30 Tagen, 15 Stunden'),
                    array(3, 'vor 2 Jahren, 6 Monaten, 30 Tagen'),
                    array(2, 'vor 2 Jahren, 6 Monaten'),
                    array(1, 'vor 2 Jahren'),
                    array(0, 'vor 2 Jahren, 6 Monaten, 30 Tagen, 15 Stunden, 12 Minuten, 3 Sekunden'),
                    array(-1, 'vor 2 Jahren, 6 Monaten, 30 Tagen, 15 Stunden, 12 Minuten, 3 Sekunden'),
                )
            ),
        );
    }

    #[DataProvider('truncateProvider')]
    public function testTruncate(LanguageAdapter $languageAdapter, array $dataSets)
    {
        foreach ($dataSets as $dataSet) {
            list($truncate, $expected) = $dataSet;
            $config = array(
                'truncate' => $truncate,
                'language' => $languageAdapter
            );
            $rt = new \RelativeTime\RelativeTime();
            if (!is_null($truncate)) {
                $rt = new \RelativeTime\RelativeTime($config);
            }
            $result = $rt->convert('2013-03-25 07:35:02', '2010-08-25 16:22:59');
            $this->assertEquals($expected, $result);
        }
    }
}
