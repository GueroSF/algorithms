<?php

/**
* Сортировка пузырем
*/
class BubbleSort
{
    /**
     * @var int
     */
    private $amountItemArray;

    /**
     * @var int
     */
	private $min;

    /**
     * @var int
     */
	private $max;

    /**
     * @var array
     */
	private $array = [];

	function __construct(IDataInput $dataInput)
	{
		$this->max = $dataInput->getMax();
	    $this->min = $dataInput->getMin();
	    $this->amountItemArray = $dataInput->getAmountItemArray();

	    $this->generateArray();
	}

    /**
     * @param int $min
     */
    public function setMin(int $min): self
    {
        $this->min = $min;

        return $this;
    }

    /**
     * @param int $max
     */
    public function setMax(int $max): self
    {
        $this->max = $max;

        return $this;
    }

    public function getFirstArray(): array
    {
        return $this->array;
    }

	public function sort(): array
	{
		$array = $this->array;

		for ($generalCount = count($array); $generalCount > 0; $generalCount--) {
		    for ($index = 0; $index < $generalCount; $index++) {
                if (isset($array[$index + 1]) && $array[$index] > $array[$index + 1]) {
                    $temp = $array[$index + 1];
                    $array[$index + 1] = $array[$index];
                    $array[$index] = $temp;
                }
            }

        }

		return $array;
	}

    private function generateArray()
    {
        for ($i=0; $i < $this->amountItemArray; $i++) {
            $this->array[] = random_int($this->min, $this->max);
        }
    }
}