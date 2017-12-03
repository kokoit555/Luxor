<?php

    $idproduct = mysqli_escape_string($connect,$_GET['idproduct']);

    $selectdetailproduct = "SELECT * FROM `Product` p 
    INNER JOIN  `Story`s on p.`id_story` = s.`id_story`
    INNER JOIN `TypeProduct` t on p.`id_type` = t.`id_typeProduct` 
    INNER JOIN `IMGProductDetail` imgd on imgd.`id_product` = p.`id_product` 
    INNER JOIN `IMGProduct` imgp on imgp.`id_imgProduct` = imgd.`id_imgProduct` 
    WHERE p.`id_product` = '$idproduct' AND imgd.NumberIMGProduct = '2'";

    $queryproduct = mysqli_query($connect,$selectdetailproduct);

    if($queryproduct){
        $row = mysqli_fetch_array($queryproduct);
        ?>
                <div class="card">
                    <h3><a href="Listproduct.php" style="text-decoration:none">สินค้าทั้งหมด</a> > 
                    <a href="Detailproduct.php?idproduct=<?php echo $row['id_product'];?>"><?php echo $row['NameProduct']; ?></a></h3> 
                    <div class="wrapper row">
                        <div class="preview col-md-6">
                            <div class="preview-pic tab-content">
                                <div class="tab-pane active" id="pic-1">
                                    <img src="<?php echo $row['url_img']."".$row['Name_img'];?>" />
                                </div>
                                <div class="tab-pane" id="pic-2">
                                    <img src="<?php echo $row['url_img']."".$row['Name_img'];?>" />
                                </div>
                                <div class="tab-pane" id="pic-3">
                                    <img src="<?php echo $row['url_img']."".$row['Name_img'];?>" />
                                </div>
                                <div class="tab-pane" id="pic-4">
                                    <img src="<?php echo $row['url_img']."".$row['Name_img'];?>" />
                                </div>
                                <div class="tab-pane" id="pic-5">
                                    <img src="<?php echo $row['url_img']."".$row['Name_img'];?>" />
                                </div>
                            </div>
                            <ul class="preview-thumbnail nav nav-tabs">
                                <li class="active">
                                    <a data-target="#pic-1" data-toggle="tab">
                                        <img src="<?php echo $row['url_img']."".$row['Name_img'];?>" />
                                    </a>
                                </li>
                                <li>
                                    <a data-target="#pic-2" data-toggle="tab">
                                        <img src="<?php echo $row['url_img']."".$row['Name_img'];?>" />
                                    </a>
                                </li>
                                <li>
                                    <a data-target="#pic-3" data-toggle="tab">
                                        <img src="<?php echo $row['url_img']."".$row['Name_img'];?>" />
                                    </a>
                                </li>
                                <li>
                                    <a data-target="#pic-4" data-toggle="tab">
                                        <img src="<?php echo $row['url_img']."".$row['Name_img'];?>" />
                                    </a>
                                </li>
                                <li>
                                    <a data-target="#pic-5" data-toggle="tab">
                                        <img src="<?php echo $row['url_img']."".$row['Name_img'];?>" />
                                    </a>
                                </li>
                            </ul>

                        </div>
                        <div class="details col-md-6">
                            <h3 class="product-title"><?php echo $row['NameProduct']." A0".$row['id_product']; ?></h3>
                            <div class="rating">
                                <div class="stars">
                                    <!-- <span class="fa fa-star checked"></span> -->
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                                <span class="review-no">0 ความคิดเห็น</span>
                            </div>

                            <div class="qtyproduct">
                                <h6 class="title-attr">
                                    จำนวน
                                </h6>
                                <div>
                                <form method="POST">
                                    <div class="btn-minus">
                                        <i class="fa fa-minus"></i>
                                    </div>
                                        <input name="qtyproduct" value="1" class="valueqty"/>
                                    <div class="btn-plus">
                                        <i class="fa fa-plus"></i>
                                    </div>
                                
                                </div>
                                <script type="text/javascript" src="js/qtyproduct.js"></script>
                            </div>

                            <h4 class="price">ราคา : <span> <?php echo $row['PriceProduct'];?> บาท</span></h4>
                            <div class="action">
                                
                                    <input class="add-to-cart btn btn-default" name="addproducttocart" type="submit" value="Add to Cart"><!-- add to cart</button> -->
                                    <button class="like btn btn-default" type="button">
                                    <span class="fa fa-heart"></span>
                                    </button>
                                </form>
                                <?php include "Codephp/CodeFront/addcart.php"; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 product-info">
                    <ul id="myTab" class="nav nav-tabs nav_tabs">

                        <li class="active">
                            <a href="#service-one" data-toggle="tab">Story DESCRIPTION</a>
                        </li>
                        <li>
                            <a href="#service-two" data-toggle="tab">PRODUCT INFO</a>
                        </li>
                        <li>
                            <a href="#service-three" data-toggle="tab">REVIEWS</a>
                        </li>

                    </ul>
                    <div id="myTabContent" class="tab-content magindetail">
                        <div class="tab-pane fade in active" id="service-one">

                            <section class="container product-info">
                                <?php echo $row['textStory']; ?>
                            <!-- <h3>“ภูคราม” ผ้าฝ้ายปักลวดลายธรรมชาติ</h3>
                            <p> เป็นผลิตประเภทสิ่งทอ งานหัตถกรรมทำมือ และส่วนใหญ่เป็นผลิตภัณฑ์จากธรรมชาติ โดยการใช้ครามธรรมชาติ และใช้ฝ้ายทอมือเป็นหลัก 
                                โดยได้ทำงานกับกลุ่มชาวบ้าน ตำบลโคกภู จังหวัดสกลนคร กลุ่มเล็กๆ ที่ใช้เวลาว่างมาทอผ้า การทอผ้าใช้อารมณ์ทอแบบสบายๆ ไม่เครียด 
                                ถ้าหากเครียดจะไม่ทำ ดังนั้นผ้าของกลุ่มผู้ครามจะเป็นผ้าที่ถักทอขึ้นด้วยความสุข</p>
                            <h3>แรงบันดาลใจ (Inspiration)</h3>
                                <p>เริ่มจากประสบการณ์การทำงานที่ผ่านมาล้วนทำงานในส่วนของชุมชนมีการกระตุ้นและพัฒนาชุมชนอื่นๆ 
                                    ทำให้อยากกลับมาทำที่ชุมชนของบ้านเกิดตนเอง ซึ่งมีการพัฒนาน้อย ประจวบเหมาะกับป้ากลุ่มเล็กในชุมชนมีการกลับมาทอผ้า 
                                    โดยไม่มีใครมาสนับสนุน ไม่มีตลาด จึงได้เริ่มเข้าไปหาตลาดให้ ขายให้ และทำให้เรามีรายได้อีกส่วนนึงด้วย 
                                    หลังจากนั้นได้มาศึกษาการทำผ้าฝ้ายย้อมคราม ทำให้เห็นขั้นตอนทั้งหมดในการที่มีขั้นตอนการทำที่ยากและมีหลายขั้นตอน 
                                    ต้นทุนต่างๆไม่สัมพันธ์กับราคาจึงอยากเป็นส่วนในการช่วยเหลือ รวมทั้งหากกลุ่มนี้เริ่มต้นได้ดี
                                     ก็อยากขยายไปสู่ชุมชนอื่นๆมีภาวะเช่นเดียวกัน</p>
                            <h3>สู่การเปลี่ยนแปลง (Social Impact)</h3>
                                <li>สร้างอาชีพและเพิ่มรายได้ภายในครอบครัวแก่คนในชุมชน</li>
                                <li>เป็นการรื้อฟื้นและอนุรักษ์วิถีดั่งเดิม เช่น การทอผ้า เลี้ยงคราม ปลูกฝ้าย ปลูกคราม เป็นต้น</li>
                                <li>ลดการเดินทางขายแรงงานในเมืองหลวง</li>
                                <li>พัฒนาคุณภาพชีวิตของคนในชุมชน</li>
                                <li>เกิดการรวมกลุ่มของคนในชุมชน มีการแลกเปลี่ยน นำไปสู่แนวทางพัฒนาคุณภาพชีวิตด้วยตัวเอง</li>
                                <li>ชาวบ้านได้มีโอกาสในการใช้ความคิดสร้างสรรค์ระหว่างการทำงาน</li>
                                <li>สร้างอาชีพให้แก่กลุ่มคนรุ่นใหม่</li> -->
                            </section>
                        </div>
                        <div class="tab-pane fade" id="service-two">
                            <section class="container">
                                <?php echo $row['textProductDetail']; ?>
                            <!-- <h3>สู่การเปลี่ยนแปลง (Social Impact)</h3>
                                <li>สร้างอาชีพและเพิ่มรายได้ภายในครอบครัวแก่คนในชุมชน</li>
                                <li>เป็นการรื้อฟื้นและอนุรักษ์วิถีดั่งเดิม เช่น การทอผ้า เลี้ยงคราม ปลูกฝ้าย ปลูกคราม เป็นต้น</li>
                                <li>ลดการเดินทางขายแรงงานในเมืองหลวง</li>
                                <li>พัฒนาคุณภาพชีวิตของคนในชุมชน</li>
                                <li>เกิดการรวมกลุ่มของคนในชุมชน มีการแลกเปลี่ยน นำไปสู่แนวทางพัฒนาคุณภาพชีวิตด้วยตัวเอง</li>
                                <li>ชาวบ้านได้มีโอกาสในการใช้ความคิดสร้างสรรค์ระหว่างการทำงาน</li>
                                <li>สร้างอาชีพให้แก่กลุ่มคนรุ่นใหม่</li> -->
                            </section>
                        </div>
                        <div class="tab-pane fade" id="service-three">
                        </div>
                    </div>
                    <hr>
                </div>
        <?php
    }
    else{
        echo '<script>alert("ไม่สามารถเรียกสินค้าได้");</script>';
    }
    mysqli_close($connect);
?>