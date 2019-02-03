<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('status_permohonan'))
{
	function status_permohonan($status)
	{
		if($status == 1){
			return "Dalam Proses";
		}else if($status == 2){
			return "Diterima";
		}else if($status == 3){
			return "Ditolak";
		}
	}
}

if ( ! function_exists('access'))
{
	function access($array)
	{
		$data = false;
		foreach ($array as $key => $value) {
			if($value == $_SESSION['role']){
				$data = true;
			}
		}
		return $data;
	}
}