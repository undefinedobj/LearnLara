<?php
    require_once '../vendor/autoload.php';

    /**
     * 要求:
     * 将 $array 数组拼装成 $insert 数组格式
     *
     */
\Symfony\Component\VarDumper\VarDumper::dump(123);
\Symfony\Component\VarDumper\VarDumper::setHandler(123);

    $array = [
        "low_price" => [
            0 => "1",
            1 => "2",
            2 => "3",
            3 => null
        ],
        "high_price" => [
            0 => "11",
            1 => "22",
            2 => "33",
            3 => null,
        ],
        "integral_num" => [
            0 => "111",
            1 => "222",
            2 => "333",
            3 => null
        ]
    ];

    $insert = [
        [
            'low_price'     => 1,
            'high_price'    => 11,
            'integral_num'  => 111
        ],
        [
            'low_price'     => 2,
            'high_price'    => 22,
            'integral_num'  => 222
        ],
        [
            'low_price'     => 3,
            'high_price'    => 33,
            'integral_num'  => 333
        ],
    ];

  $collection = collect($array);

  dd($collection);

  $column = $collection->keys()->values()->all();
  $count = $collection->count();
  $collection->map(function ($item, $key) use($column) {
      $new = [];
      foreach ($column as $k => $v) {
          $new[$v] = $item;
      }
      dd($new);
  });