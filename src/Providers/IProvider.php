<?php
namespace MayCad\Money\Providers;

/**
 * 
 */
interface IProvider
{
	function deposit(array $params);

	function transfer(array $params);

	function withdrawal(array $params);
}