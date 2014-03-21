<?php
namespace VirusTotal\Exceptions;

/**
 * Rate limit exception
 * Thrown when too many requests were made
 * in a short period of time
 */
class RateLimitException extends \InvalidArgumentException
{

}
