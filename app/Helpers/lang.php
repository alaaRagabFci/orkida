<?php 

function getLocalizableColumn($column)
{
	$lang = app()->getLocale();

	$textTrans = $column.'_'.$lang;
    dd($textTrans);
	return $textTrans;
}