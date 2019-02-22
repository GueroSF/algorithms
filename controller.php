<?php
/**
 * Created by PhpStorm.
 * Date: 22.02.19
 */

/**
 * Todo: composer and psr-7
 */
require_once 'IDataInput.php';
require_once 'BubbleSort.php';

$dataInput = new class implements IDataInput {

    public function getMax(): int
    {
        return $_POST['max'] ?? mt_getrandmax();
    }

    public function getMin(): int
    {
        return $_POST['min'] ?? 0;
    }

    public function getAmountItemArray(): int
    {
        return $_POST['amount'] ?? 5;
    }

    public function isValid(): bool
    {
        return $this->getMax() >= $this->getMin();
    }
};

if (!$dataInput->isValid()) {
    http_response_code(400);
    header('HTTP/1.1 400 Max < Min');
    exit;
}

$bubble = new BubbleSort($dataInput);

header('Content-type: application/json');

$array = $bubble->getFirstArray();
sort($array);

echo json_encode(
    [
        'first'    => $bubble->getFirstArray(),
        'my sort'  => $bubble->sort(),
        'sort php' => $array,
    ]
);