<?php

use function Livewire\Volt\{state, computed};

state(['left-operand' , 'right-operand' , 'calcs']);

$calcs = [
    'addition' => '+',
    'subtraction' => '-',
    'multiplication' => '*',
    'division' => '/',
];

computed('calcs', fn () =>
    $calcs[$this->calcs] ?? '?'
);

computed('result', function () use ($calcs) {
    if (!isset($calcs[$this->calcs])) {
        return '?';
    }

    return match ($this->calcs) {
        'addition'       => $this->left-operand + $this->right-operand,
        'subtraction'    => $this->left-operand - $this->right-operand,
        'multiplication' => $this->left-operand * $this->right-operand,
        'division'       => $this->right-operand != 0 ? $this->left-operand / $this->right-operand : 'NaN',
    };
});

?>

<div>
    <h1>{{ $left-operand }} {{ $calcs }} {{ $right-operand }} = {{ $result }}</h1>
</div>
//計算式
// mount(function()switch ($calcs) {
//     case 'addition':
//         echo $result = 'value1' + 'value2';
//         break;
//     case 'subtraction':
//         echo $result = 'value1' - 'value2';
//         break;
//     case 'multiplication':
//         echo $result = 'value1' * 'value2';
//         break;
//     case 'division':
//         echo $result = 'value1' / 'value2';
//         break;

//     default:
//         echo '無効な演算子です';
//         break;
// })
?>


