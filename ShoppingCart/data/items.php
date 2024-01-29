<?php

function getAllItems(): array {
    return [
        ['id' => 1001, 'name' => '⭐︎暴逗貓棒', 'price' => 315],
        ['id' => 1002, 'name' => '主人我還要～逗貓棒', 'price' => 400],
        ['id' => 1003, 'name' => '神隱少貓跳台', 'price' => 7990],
        ['id' => 1004, 'name' => '前途黯淡無光牛皮紙袋', 'price' => 20],
        ['id' => 1005, 'name' => '摧毀貓咪自信的雷射筆', 'price' => 550],
        ['id' => 1006, 'name' => '米奇不妙屋', 'price' => 13999],
        ['id' => 2001, 'name' => '高蛋白健美貓糧', 'price' => 750],
        ['id' => 2002, 'name' => '阿罵養的貓都愛吃的貓糧', 'price' => 1990],
        ['id' => 2003, 'name' => '人也可以吃的貓糧', 'price' => 3990],
        ['id' => 2004, 'name' => '連罐子都可以吃的貓罐罐', 'price' => 990],
        ['id' => 2005, 'name' => '驚喜罐', 'price' => 450],
        ['id' => 2006, 'name' => '貓草自栽套組', 'price' => 230],
        ['id' => 3001, 'name' => '為貓咪編寫的 PHP 教學繪本', 'price' => 250],
        ['id' => 3002, 'name' => '轉吧轉吧彩虹貓', 'price' => 1840],
        ['id' => 3003, 'name' => '兇殘貓咪也傷不了你厚實手套', 'price' => 880],
        ['id' => 3004, 'name' => '貓語(第一冊，適用國民小學三年級)附光碟與教師手冊', 'price' => 125],
        ['id' => 3005, 'name' => 'NYANKOGELION 豪華版光碟', 'price' => 1750],
        ['id' => 3006, 'name' => '外出籠', 'price' => 1500],
    ];
}

function getItemById(int $id): ?array {
    $allItems = getAllItems();
    foreach ($allItems as $item) {
        if ($item['id'] === $id) {
            return $item;
        }
    }

    return null;
}
