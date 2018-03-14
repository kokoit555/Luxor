        <?php

            $select = "SELECT YEAR(op.Date_order) as year,MONTH(op.Date_order) as month ,SUM(opd.Price) as totalprice ,COUNT(opd.id_orderDetail) as item FROM order_product op
                        INNER JOIN orderproductdetail opd ON opd.id_order = op.id_order
                        INNER JOIN product p ON p.id_product = opd.id_product
                        WHERE p.id_store = '".$_SESSION['id_store_user_name']."'
                        GROUP BY YEAR(op.Date_order) , MONTH(op.Date_order)";

            //AND (MONTH(op.Date_order) BETWEEN '1' and '9')

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
                            <h2 class="text-center">ยอดขายของร้านค้า <?=$_SESSION['Store_user_name']?></h2>
                            <div class="clearfix"></div>
                            <form method="POST" style="margin-top:1em">
                                <div class="form-group col-md-4 col-xs-12">
                                    <label class="col-md-5 col-sm-3 col-xs-12" style="margin-top:0.5em">เลือกปีที่ต้องการ</label>
                                    <div class="col-md-7 col-sm-8 col-xs-12">
                                        <select class="form-control" name="selectyear">
                                        <?php 
                                            $selectyear = "SELECT YEAR(op.Date_order) as year FROM order_product op
                                                            INNER JOIN orderproductdetail opd ON opd.id_order = op.id_order
                                                            INNER JOIN product p ON p.id_product = opd.id_product
                                                            WHERE p.id_store = '".$_SESSION['id_store_user_name']."'
                                                            GROUP BY YEAR(op.Date_order)";
                                            $queryselectyear = mysqli_query($connect,$selectyear);
                                            while($yearinput = mysqli_fetch_array($queryselectyear)){
                                                    
                                                echo "<option value=''>".$yearinput['year']."</option>";
                                            }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-xs-12">
                                    <label class="col-md-3 col-sm-3 col-xs-12" style="margin-top:0.5em">เลือกปีที่ต้องการ</label>
                                    <div class="col-md-4 col-sm-4 col-xs-6">
                                        <select class="form-control" id="selectmonth" name="selectmonth">
                                            <option value="1">ม.ค.</option>
                                            <option value="2">ก.พ.</option>
                                            <option value="3">มี.ค.</option>
                                            <option value="4">เม.ย.</option>
                                            <option value="5">พ.ค.</option>
                                            <option value="6">มิ.ย.</option>
                                            <option value="7">ก.ค.</option>
                                            <option value="8">สิ.ค.</option>
                                            <option value="9">ก.ย.</option>
                                            <option value="10">ต.ค.</option>
                                            <option value="11">พ.ย.</option>
                                            <option value="12">ธ.ค.</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-6">
                                        <select class="form-control" name="beforemonth" id="beforemonth">
                                            <option value="1" selected>ม.ค.</option>
                                            <option value="2">ก.พ.</option>
                                            <option value="3">มี.ค.</option>
                                            <option value="4">เม.ย.</option>
                                            <option value="5">พ.ค.</option>
                                            <option value="6">มิ.ย.</option>
                                            <option value="7">ก.ค.</option>
                                            <option value="8">สิ.ค.</option>
                                            <option value="9">ก.ย.</option>
                                            <option value="10">ต.ค.</option>
                                            <option value="11">พ.ย.</option>
                                            <option value="12">ธ.ค.</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-2 col-xs-12">
                                    <button class="btn btn-block btn-info">ยืนยัน</button>
                                </div>
                            </form>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div id="chart_div1" class="img-responsive"></div>
                                </div> <!--col-md-12 col-sm-12 col-xs-12-->
                            </div>
                        </div>
                    </div>
                </div><!--col-md-12 col-sm-12 col-xs-12-->
            </div> <!--row-->
        </div>


            

            <script type="text/javascript" src="https://www.google.com/jsapi"></script>
            <script type="text/javascript">
        
                google.load('visualization', '1.0', {'packages':['corechart']});
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
                    drawChart2();
                });
                
            </script>



            <script type="text/javascript">

                $(function(){
                    $('#beforemonth').prop("disabled",true);

                    $('#selectmonth').on('change', function(){
                        var value = $(this).val();
                        $('select option').prop("disabled" , false);
                        $('#beforemonth').prop("disabled",false);
                        $('#beforemonth option').each(function(){
                            $(this).prop("selected" , false);
                            if($(this).val() < value){
                                $(this).prop("disabled" , true);
                            }
                            else if($(this).val() == value){
                                $(this).prop("selected" , true);
                            }
                        });
                    });
                    
                });
                 
            </script>
