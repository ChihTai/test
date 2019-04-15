<style>
body{
  font-family:consolas;
}
td{
  border:1px solid gray;
  text-align:center;
  padding:10px;
}
.holiday{
  background:pink;
}
</style>
<table>
<tr>
  <td>星期一</td>
  <td>星期二</td>
  <td>星期三</td>
  <td>星期四</td>
  <td>星期五</td>
  <td>星期六</td>
  <td>星期日</td>
</tr>
<?php
//紀念日陣列
$memo=[
  '2019-04-04'=>'兒童節',
  '2019-04-17'=>'生日',
  '2019-04-22'=>'小考'

];
$today=date("Y-m-d");
$thisMonthFirstDay=date("Y-m-1");  //取得當月第一天字串
//$thisMonthFirstDay="2019-09-01";
//echo $thisMonthFirstDay;
if(date("w",strtotime($thisMonthFirstDay))==0){
  $theFirstDayWeek=6; //取得第一天在第一周的星期
}else{
  $theFirstDayWeek=date("w",strtotime($thisMonthFirstDay))-1; //取得第一天在第一周的星期
}

$monthDays=date("t",strtotime($thisMonthFirstDay));  //取得當月的天數


echo "<br>";
for($i=1;$i<=$monthDays;$i++){
  $date[]=date("Y-m-".sprintf("%02d",$i));
}

$index=0;  //初始化索引值
for($i=0;$i<6;$i++){
  $holiday=""; //設定假日的class
  echo "<tr>";

  for($j=0;$j<7;$j++){
    if($j>4){
      $holiday="class='holiday'";
    }
    $num=($i*7+$j); //計算格子數

    if($i==0 && $j<$theFirstDayWeek){
      
      echo "<td $holiday></td>";
    }else if($num>($theFirstDayWeek+$monthDays-1)){  //判斷格子是否在當月的天數內

      echo "<td $holiday></td>";
    }else{

      //根據畫到的天數來取出日期字串
      
      if(!empty($memo[$date[$index]])){

        echo "<td $holiday>".$date[$index]."<br>".$memo[$date[$index]]."</td>";

      }else{

        echo "<td $holiday>".$date[$index]."</td>";
      } 
      
      //echo "<td>".date("Y-m-d",strtotime("+$index days" . $thisMonthFirstDay))."</td>";
      //echo "<td>".date("Y-m-d",strtotime($thisMonthFirstDay)+$index*24*60*60)."</td>";
      $index++;

    }
  }
  echo "</tr>";

}

?>
</table>
