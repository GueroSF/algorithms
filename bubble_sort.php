<?php

/**
* Сортировка пузырем
*/
class BubbleSort
{
	public $iCountArray;
	public $min;
	public $max;

	function __construct($iCountArray)
	{
		return $this->iCountArray = $iCountArray;
	}

	private function getArrayNumber()
	{
		$arr = [];
		for ($i=0; $i < $this->iCountArray; $i++) { 
			$arr[] = mt_rand($this->min??0,$this->max??mt_getrandmax());
		}
		return $arr;
	}

	public function test()
	{
		return $this->getArrayNumber();
	}

	public function sort($array = false)
	{
		$aArrayNumber = $array?: $this->getArrayNumber();
		var_dump(111,$aArrayNumber);
		$iCount = count($aArrayNumber);
		for ($f=0; $f < $iCount; $f++) {
			$i=0;
			for (; $i < $iCount; $i++) {
				if ($i+2 > $iCount) continue;
				if ($aArrayNumber[$i]>$aArrayNumber[$i+1]){
					$sTemp = $aArrayNumber[$i+1];
					$aArrayNumber[$i+1] = $aArrayNumber[$i];
					$aArrayNumber[$i] = $sTemp;
				}
			}
			$iCount--;
		}


		return $aArrayNumber;
	}
}