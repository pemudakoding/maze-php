<?php


function maze($height, $length = 15, $position = 1)
{


  // If height 
  if ($height == 0) {
    return "";
  }

  /**
   *  Check the maze is a wall or a way ( even or odd) 
   * if is a height is a even make a maze way if not make a wall
   * 
   */
  if (($height % 2) == 0) {
    /**
     * if the the height is even just print a side wall
     */
    echo "<br>@";
    echo mazeWall($length + 9, $position, false, true);
  } else {
    echo "<br>";

    /**
     * If the height is a odd check the position 
     * if the before position is 1 just change the position to 2 and repeat
     */

    if ($position === '1') $position = '2';
    else $position = '1';

    /**
     * make a loop based on length
     * for make a waze width
     */
    for ($odd = 0; $odd < $length; $odd++) {

      /**
       * make a sign for hidden a wall
       * Check the position right now if the position is even remove the
       * last wall (get a last wall from 2 in behind from length) if not just remove the first wall.
       * 
       */
      if (($position % 2) === 0) $isHidden = $odd === $length - 2 ? true : false;
      else $isHidden = $odd === 1 ? true : false;

      /**
       * Show the mazeWall
       */
      echo mazeWall($length, $position, $isHidden);
    }
  }

  /**
   * Run again the maze function for make a recursive
   */
  return maze($height - 1, $length, ($position === '1' ? '2' : '1'));
}

function mazeWall($size, $position, $isHidden, $justLast = false)
{

  /**
   * check the maze wall just need a last wall or not if not
   */
  if (!$justLast) {

    /**
     * Check the size is 1 or not ? if true
     */
    if ($size == 1) {

      /**
       * Check the position is a even or odd
       */
      if (($position % 2) === 0) {

        /**
         * Print a wall and a door
         */
        return !$isHidden ? "@" : '&nbsp;&nbsp&nbsp&nbsp';
      } else {
        return !$isHidden ? "@" : '&nbsp;&nbsp&nbsp&nbsp';
      }
    }
  } else {

    /**
     * Just print a wall and just a last wall
     */
    echo "&nbsp;&nbsp;";
    if ($size === 1) {
      return "@";
    }
  }


  return mazeWall($size - 1, $position, $isHidden, $justLast);
}

echo maze(15);
