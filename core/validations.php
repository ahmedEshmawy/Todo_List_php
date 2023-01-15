<?php
//is required
function requiredVal($input)
{
    if (empty($input)) {
        return false;
    }
    return true;
}


// min lenght
function minVal($input, $length)
{
    if (strlen($input) < $length) {
        return false;
    }
    return true;
}

// max length 
function maxVal($input, $length)
{
    if (strlen($input) > $length) {
        return false;
    }
    return true;
}
