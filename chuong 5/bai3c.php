<?php
  $x = 0;
  $y = 0;

  // Vòng lặp: "Trong khi x vẫn nhỏ hơn hoặc bằng y thì cứ tiếp tục chọn lại số"
  while ($x <= $y) {
      $x = rand(1, 100);
      $y = rand(1, 100);
  }

  echo "Đã tìm được bộ số thỏa điều kiện x > y: <br>";
  echo "Số x: $x <br>";
  echo "Số y: $y <br>";
  echo "Hiệu x - y = " . ($x - $y);
?>