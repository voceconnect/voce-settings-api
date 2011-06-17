<?php

function vs_santize_checkbox($value, $setting, $args) {
	return !is_null($value);
}

function vs_santize_text($value, $setting, $args) {
	return trim(strip_tags($value));
}