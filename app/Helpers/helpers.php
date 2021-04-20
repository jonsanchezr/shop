<?php

/**
 * @param mixed $value
 *
 * @return string
 */
function formatMoney($value)
{
	return number_format($value, 2, ',', '.');
}

