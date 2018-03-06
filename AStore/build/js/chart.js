    // google.load("visualization", "1", {packages:["corechart"]});
    // google.setOnLoadCallback(drawChart);
    // function drawChart() {
    //     // สร้างตัวแปร array เก็บค่า ข้อมูล
    //     var dataArray1=[
    //       ['ปี', 'ยอดขาย', 'ค่าใช้จ่าย'],
    //       ['2004',  1000,      400],
    //       ['2005',  1170,      460],
    //       ['2006',  660,       1120],
    //       ['2007',  1030,      540]            
    //     ];
             
    //     // แปลงข้อมูลจาก array สำหรับใช้ในการสร้าง กราฟ
    //     var data = google.visualization.arrayToDataTable(dataArray1);
     
    //     // ตั้งค่าต่างๆ ของกราฟ
    //     var options = { 
    //         title: "หัวข้อกราฟ",
    //         hAxis: {title: 'ข้อความแนวนอน', titleTextStyle: {color: 'red'}},
    //         vAxis: {title: 'ข้อความแนวตั้ง', titleTextStyle: {color: 'blue'}}
    //     };
     
    //     // สร้างกราฟแนวตั้ง แสดงใน div id = chart_div
    //     var chart = new google.visualization.ColumnChart(document.getElementById('chart_div1'));
    //     chart.draw(data, options); // สร้างกราฟ
         
    // }

google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawChart2);
function drawChart2() {
  var data = google.visualization.arrayToDataTable([<?=$text?>]);

  var options = {
    title: 'กราฟสรุปยอดขายประจำปี',
    hAxis: {title: 'เดือน',  titleTextStyle: {color: '#333'}},
    vAxis: {minValue: 0},
    height: 600
  };

  var chart = new google.visualization.AreaChart(document.getElementById('chart_div1'));
  chart.draw(data, options);
}

$(window).resize(function(){
 // drawChart1();
  drawChart2();
});

// Reminder: you need to put https://www.google.com/jsapi in the head of your document or as an external resource on codepen //