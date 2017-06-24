<?
include("class.php");

$method = "crm.deal.list";
$params = array(
	"order" => array("STAGE_ID" => "ASC"),
	//"filter" => array(">PROBABILITY" => 50),
	"select" => array("ID", "TITLE", "STAGE_ID", "PROBABILITY", "OPPORTUNITY", "CURRENCY_ID")
);

$webhook = new CWebHook($method, $params);

echo "<pre>";
print_r($webhook->result);
echo "</pre>";
?>