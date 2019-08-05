<?php
namespace App\Page;

use Gt\WebEngine\Logic\Page;
use NumberFormatter;

class IndexPage extends Page {
	function go() {
		$data = [];

		for($i = 0; $i < 150; $i++) {
			$data []= [
				"optionValue" => $i,
				"optionText" => $this->getTextNumber($i),
			];
		}

		$select = $this->document->querySelector("[name=testselect]");
		$select->bindList($data);
		$select->value = 1;

		$select->value = rand(0,150);

		$ms = microtime(true) - $this->server->getRequestTime();
		$this->document->bind("time", number_format($ms, 3));
	}

	function getTextNumber(int $num):string {
		$formatter = new NumberFormatter(
			"en-GB",
			NumberFormatter::SPELLOUT
		);
		return $formatter->format($num);
	}
}