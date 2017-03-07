<?php
/**
 * IntiliSense - php errors for cool kids
 * @author Filipe Dobreira <http://github.com/filp>
 */

namespace IntiliSense\Exception;

use ErrorException as BaseErrorException;

/**
 * Wraps ErrorException; mostly used for typing (at least now)
 * to easily cleanup the stack trace of redundant info.
 */
class ErrorException extends BaseErrorException
{
}
