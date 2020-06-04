<?php
function charsLimit(string $text, int $limit): string
{
	return str_limit($text , $limit , $end = '....');
}