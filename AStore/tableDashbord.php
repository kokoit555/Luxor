

        <?php
            $select = "SELECT YEAR(op.Date_order) as year,MONTH(op.Date_order) as month ,SUM(opd.Price) as totalprice ,COUNT(opd.id_orderDetail) as item FROM order_product op
                        INNER JOIN orderproductdetail opd ON opd.id_order = op.id_order
                        INNER JOIN product p ON p.id_product = opd.id_product
                        WHERE p.id_store = '15'
                        GROUP BY YEAR(op.Date_order) , MONTH(op.Date_order)";

            $querychart = mysqli_query($connect,$select);
            $text = "['เดือน', 'ยอดขาย']";
            $totalprice = 0;
            $totalitem = 0;
            $strMonthCut = Array("","Jan","Feb","Mar","Apr","May","June","July","Aug","Sep","Oct","Nov","Dec");
            
            while($data = mysqli_fetch_array($querychart)){
                $totalprice += $data['totalprice']; 
                $totalitem += $data['item'];

                $strMonthThai=$strMonthCut[$data['month']];

                $text .= ",['".$data['year']."-".$strMonthThai."',".$data['totalprice']."]";
            }

            //echo $text;

        ?>
        <!-- page content -->
            <div class="clearfix"></div>
        <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2 class="text-center">สรุปร้านค้า</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <h3>ยอดขายโดยรวม : <?=number_format($totalprice,0)?> บาท</h3>
                        <div class="clearfix"></div>
                        <h3>จำนวนสินค้าที่ขายได้ : <?=number_format($totalitem,0)?> ชิ้น</h3>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div><!--col-md-12 col-sm-12 col-xs-12-->
        </div> 
            <div class="row">
                <div class="col-sm-12">
                    <div id="chart_div1" class="img-responsive"></div>
                </div> <!--col-md-12 col-sm-12 col-xs-12-->
            </div><!--row-->
        
            <div class="clearfix"></div>
        <!-- /page content -->
            <hr>
        
    </div>




            <script type="text/javascript" src="https://www.google.com/jsapi"></script>
            <script type="text/javascript">

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

                var chart = new google.visualization.LineChart(document.getElementById('chart_div1'));
                chart.draw(data, options);
                }

                $(window).resize(function(){
                // drawChart1();
                drawChart2();
                });
            </script>
