<?php
namespace MayCad\Money\Providers;

use GuzzleHttp\Client;
/**
 * 
 */
class MFA extends Provider
{
	const BASE_URI = 'https://apis.maycad.net/mfa/v1/public/';

	private $_key, $_secret;

	private $_client;

	function __construct(array $data)
	{
		$this->hydrate($data);

		$this->_client = new Client([
            'base_uri' => self::BASE_URI,
            'headers' => [
            	'App-Key' => $this->getKey(),
            	'App-Secret' => $this->getSecret(),
            	'App-Locale' => 'fr',
            	'Phone-Locale' => 'fr'
            ],
        ]);
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
		$req = $this->_client->post('operations/deposit', [
            'form_params' => $params,
        ]);

        return json_decode($req->getBody());
	}

	public function transfer(array $params)
	{
		$req = $this->_client->post('operations/transfer', [
            'form_params' => $params,
        ]);

        return json_decode($req->getBody());
	}

	public function withdrawal(array $params)
	{
		$req = $this->_client->post('operations/withdrawal', [
            'form_params' => $params,
        ]);

        return json_decode($req->getBody());
	}

	public function balance(array $params)
	{
		$req = $this->_client->post('operations/balance', [
            'form_params' => $params,
        ]);

        return json_decode($req->getBody());
	}

	public function register(array $params)
	{
		$req = $this->_client->post('users/register', [
            'form_params' => $params,
        ]);

        return json_decode($req->getBody());
	}

	public function transactions(array $params)
	{
		$req = $this->_client->post('transactions/charge', [
            'form_params' => $params,
        ]);

        return json_decode($req->getBody());
	}

	public function contact(array $params)
	{
		$req = $this->_client->post('contacts/store', [
            'form_params' => $params,
        ]);

        return json_decode($req->getBody());
	}

	public function newsletter(array $params)
	{
		$req = $this->_client->post('newsletters/store', [
            'form_params' => $params,
        ]);

        return json_decode($req->getBody());
	}
}