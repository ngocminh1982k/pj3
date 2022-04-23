<?php
$i=0;
$max=2101;
$date='2019-1-1';
for($j=1;$j<13;$j++){
for($i=1;$i<$max;$i++){
	$gio=rand(1, 8.2);
	echo(" insert into chamCong(ngayLam,maNV,soGio) values ('2019-1-$j',$i,$gio);<br>");
	
}
}
?>