<?php 

function getLocalizableColumn($obj, string $column): string
{
	$lang = app()->getLocale();
	$textTrans = $column.'_'.$lang;
	return $obj->$textTrans;
}