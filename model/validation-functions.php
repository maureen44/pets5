<?php
/**
 * Validate color
 *
 * @param String color
 * @return boolean
 */

function validColor($color) {
    global $f3;
    return in_array($color, $f3->get('colors'));
}

/**
 * validate a string
 * @param $animal string
 * @return boolean
 */
function validAnimal($animal) {
    return (!empty(trim($animal)) && ctype_alpha($animal));

}

