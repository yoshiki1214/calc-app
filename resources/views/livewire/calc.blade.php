<?php

use function Livewire\Volt\{state, mount};

state(['calcs', 'left_operand', 'right_operand', 'result']);

mount(function ($calcs, $left_operand, $right_operand) {
    $this->left_operand = $left_operand;
    $this->right_operand = $right_operand;
    switch ($calcs) {
        case 'addition':
            $this->calcs = '+';
            $this->result = $this->left_operand + $this->right_operand;
            break;
        case 'subtraction':
            $this->calcs = '-';
            $this->result = $this->left_operand - $this->right_operand;
            break;
        case 'multiplication':
            $this->calcs = '×';
            $this->result = $this->left_operand * $this->right_operand;
            break;
        case 'division':
            $this->calcs = '÷';
            $this->result = $this->left_operand / $this->right_operand;
            break;
        default:
            $this->calcs = '?';
            $this->result = '無効な演算子です';
            break;
    }
});

?>

<div>
    <h1>計算結果</h1>
    <p>{{ $left_operand }} {{ $calcs }} {{ $right_operand }} = {{ $result }}</p>
</div>
