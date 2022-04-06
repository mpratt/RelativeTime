<?php
/**
 * Language.php
 *
 * @author  Michael Pratt <pratt@hablarmierda.net>
 * @link    http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace RelativeTime\Languages;

use \InvalidArgumentException;

/**
 * Abstract class for language definitions.
 * It basically gives the option to use an object
 * as as an array.
 */
abstract class LanguageAdapter
{

    /** @var array Array with strings */
    protected $strings = array();

    public function set($key, $value)
    {
        if (!isset($this->strings[$key])) {
            throw new InvalidArgumentException($key . ' is not defined');
        }

        return $this->strings[$key] = $value;
    }

    public function now()
    {
        return $this->strings['now'];
    }

    public function ago()
    {
        return $this->strings['ago'];
    }

    public function left()
    {
        return $this->strings['left'];
    }

    public function singular($unit)
    {
        if (!isset($this->strings[$unit])) {
            throw new InvalidArgumentException($unit . ' is not defined');
        }

        return $this->strings[$unit]['singular'];
    }

    public function plural($unit)
    {
        if (!isset($this->strings[$unit])) {
            throw new InvalidArgumentException($unit . ' is not defined');
        }

        return $this->strings[$unit]['plural'];
    }

}
