<?php
/**
 * Copyright (c) 2012 Aleph Tav
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated 
 * documentation files (the "Software"), to deal in the Software without restriction, including without limitation 
 * the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, 
 * and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO 
 * THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE 
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, 
 * TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 *
 * @author Aleph Tav <4lephtav@gmail.com>
 * @link http://www.4leph.com
 * @copyright Copyright &copy; 2012 Aleph Tav
 * @license http://www.opensource.org/licenses/MIT
 */
 
namespace Aleph\Utils;

/**
 * Contains the set of static methods for facilitating the work with strings.
 *
 * @author Aleph Tav <4lephtav@gmail.com>
 * @version 1.0.3
 * @package aleph.utils
 */
class Strings
{
  /**
   * Shortens a large text.
   *
   * @param string $string - the large text.
   * @param integer $length - length of the shortened text.
   * @param boolean $word - shortens till nearest word right.
   * @param boolean $stripTags - checks whether HTML and PHP tags will be deleted or not.
   * @param string $allowableTags - tags, which must not be deleted.
   * @retun string - the shortened text
   * @access public
   * @static
   */
  public static function cut($string, $length, $word = true, $stripTags = false, $allowableTags = null)
  {
    if ($stripTags) $string = strip_tags($string, $allowableTags);
    if ($length < 4 || $string == '' || strlen($string) <= $length) return $string;
    $lastSpacePos = strpos($string, ' ', $length - 1);
    if ($word)
    {
      if ($lastSpacePos === false) $shortText = $string;
      else $shortText = substr($string, 0, $lastSpacePos) . '...';
    }
    else
    {
      if ($lastSpacePos > $length || $lastSpacePos === false) $shortText = trim(substr($string, 0, $length - 3)) . '...';
      else $shortText = substr($string, 0, $lastSpacePos) . '...';
    }
    return $shortText;
  }
}