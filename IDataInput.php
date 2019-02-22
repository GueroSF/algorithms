<?php
/**
 * Created by PhpStorm.
 * Date: 22.02.19
 */

interface IDataInput
{
    public function getMax(): int;
    public function getMin(): int;
    public function getAmountItemArray(): int;
}