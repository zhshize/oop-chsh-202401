<?php

class AlwaysSortedArray {
    protected array $list;

    public function __construct() {
        $this->list = [];
    }

    public function put(int $n): void {
        foreach ($this->list as $index => $value) {
            if ($value > $n) {
                array_splice($this->list, $index, 0, $n);
                return;
            }
        }
        $this->list[] = $n;
    }

    public function get(int $index): int {
        return $this->list[$index];
    }

    public function all(): array {
        return $this->list;
    }
}

$a = new AlwaysSortedArray();
$values = [3291, 992, -38109, 33, 19493];

foreach ($values as $v) {
    $a->put($v);
}

print_r($a->all());
