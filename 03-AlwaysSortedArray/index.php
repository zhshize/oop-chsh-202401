<?php

use LDAP\Result;

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

class ReversedAlwaysSortedArray extends AlwaysSortedArray {
    public function reversedGet(int $index): int {
        return $this->list[count($this->list) - $index - 1];
    }

    public function reversedAll(): array {
        return array_reverse($this->list);
    }

    public function put(int $n): void
    {
        echo "$n was put in the list<br>";
        parent::put($n);
    }
}

$a = new ReversedAlwaysSortedArray();
$values = [3291, 992, -38109, 33, 19493];

foreach ($values as $v) {
    $a->put($v);
}

print_r($a->all());

// print_r($a->reversedAll());
//echo $a->reversedGet(0);
