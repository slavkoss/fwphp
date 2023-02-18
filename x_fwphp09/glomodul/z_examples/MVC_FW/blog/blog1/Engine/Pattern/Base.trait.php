<?php
/**
 * @author           Pierre-Henry Soria <phy@hizup.uk>
 * @copyright        (c) 2015-2017, Pierre-Henry Soria. All Rights Reserved.
 * @license          Lesser General Public License <http://www.gnu.org/copyleft/lesser.html>
 * @link             http://hizup.uk
 */

/**
 * final keyword prevents child classes from overriding a method by prefixing the definition with final. 
 * If the class itself is being defined final then it cannot be extended. 
 * Private methods cannot be final as they are never overridden by other classes
*/
namespace TestProject\Engine\Pattern;

trait Base
{
    final protected function __construct() {}
    final protected function __clone() {}
}
