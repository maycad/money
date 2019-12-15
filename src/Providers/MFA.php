<?php
namespace MayCad\Money\Providers;

/**
 * 
 */
class MFA extends Provider
{
	const BASE_URI = 'https://apis.maycad.net/mfa/v1/public/';

	private $_key, $_secret;

	function __construct(array $data)
	{
		$this->hydrate($data);
	}

	public function setKey(string $key)
	{
		$this->_key = $key;

		return $this;
	}

	public function getKey()
	{
		return $this->_key;
	}

	public function setSecret(string $secret)
	{
		$this->_secret = $secret;

		return $this;
	}

	public function getSecret()
	{
		return $this->_secret;
	}

	public function hydrate(array $data)
	{
		foreach ($data as $key => $value) {
			
			$method = 'set' . ucfirst($key);

			if (method_exists($this, $method)) {
				$this->$method($value);
			}

		}
	}

	public function deposit(array $params)
	{
		# code...
	}

	public function transfer(array $params)
	{
		# code...
	}

	public function withdrawal(array $params)
	{
		# code...
	}

	public function balance(array $params)
	{
		# code...
	}

	public function register(array $params)
	{
		# code...
	}

	public function transactions(array $params)
	{
		# code...
	}

	public function contact(array $params)
	{
		# code...
	}

	public function newsletter(array $params)
	{
		# code...
	}
}