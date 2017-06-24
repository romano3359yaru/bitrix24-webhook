<?
/**
 * Класс для описания обработки интеграции с Битрикс24 через webhook	
*/

class CWebHook
{
	private $webhook = "https://b24-n593547d544ed3.bitrix24.ru/rest/1/****************/";
	protected $result;
	//private $method = "crm.deal.list";

	public function __construct($method, $params)
	{
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_SSL_VERIFYPEER => 0,
			CURLOPT_POST => 1,
			CURLOPT_HEADER => 0,
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => $this->webhook . $method,
			CURLOPT_POSTFIELDS => http_build_query($params)
		));

		$result = curl_exec($curl);
		curl_close($curl);

		$result = json_decode($result, true);

		$this->result = $result;
	}

	public function __get($params)
	{
		switch ($params)
        {
            case 'result':
                return $this->result;
        }
	}
}
?>