<?php
function Recurs($value): int
{
  if($value%10 == 1) return 1;
  $ost=$value%10;
  $numDiv=floor($value/10);
  return $ost+Recurs($numDiv);
}

echo Recurs(179);
?>