<?php
namespace MayCad\Money;

use MayCad\Money\Providers\MFA;
use MayCad\Money\Providers\Provider;

/**
 * 
 */
class Money
{
	private $_provider;
	private $_params = array();

	public function __construct(array $params = array(), string $provider = 'MFA')
	{
		$this->setParams($params);
		$this->setProvider($provider);

		$this->with($params, $provider);
	}

	public function setParams(array $params)
	{
		$this->_params = $params;

		return $this;
	}

	public function getParams()
	{
		return $this->_params;
	}

	public function setProvider(string $provider)
	{
		$this->_provider = $provider;

		return $this;
	}

	public function getProvider()
	{
		return $this->_provider;
	}

	public function with(array $params, string $provider)
	{
		$method = 'with' . ucfirst($provider);

		if (method_exists($this, $method)) {
			return $this->$method($params);
		}

		throw new Exception("Error Processing Request", 1);
	}

	public function withMFA(array $params)
	{
		return new MFA($params);
	}

	public function send(string $to, string $msg)
	{
		$this->with($this->getParams(), $this->getProvider())->send($to, $msg);
	}
}