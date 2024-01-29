<?php

$itemId = filter_var($_POST['id'], FILTER_VALIDATE_INT, [
    'options' => [
        'min_range' => 1,
    ],
]);

if ($itemId === false) {
    echo '查找商品時發生錯誤，<a href="/">回首頁</a>';
    exit();
}


function render() {
    // TODO:
}

render();
