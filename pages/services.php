<?php

//use DB_CONNECT\Connection;

if(isset($_SESSION['username_session'])){
    $admin = true;
}else{
    $admin = false;
}
$db = DB_CONNECT\Connection::getInstance();
$data = $db->prepare("SELECT * FROM `items` ORDER BY `id` DESC");
$data->execute();
$all_items = $data->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="cartBasket" style="position: fixed;bottom: 35px;left: 45px;z-index: 100;">
    <a href="?checkout" class="btn btn-danger btn-lg">
    <i class="fa fa-shopping-cart"></i> Checkout
        (<?=count($_SESSION['cart']) ?>)
    </a>
</div>

<section class="ftco-section">
    <div class="container-fluid px-4">
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Specialties</span>
                <h2 class="mb-4">Our Menu</h2>
            </div>
        </div>
        <?php
        if($admin) {
            ?>
            <div class="row">
                <div class="col-md-12 col-lg-12 menu-wrap">
                    <h3>Add Food</h3>
                    <form action="index.php?action&addItem" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" name="price" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Type</label>
                            <select  name="item_type" class="form-control">
                                <option value="breakfast">Breakfast</option>
                                <option value="lunch">Lunch</option>
                                <option value="dinner">Dinner</option>
                                <option value="desserts">Desserts</option>
                                <option value="wine_card">Wine Card</option>
                                <option value="drinks">Drinks</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>About</label>
                            <textarea name="about" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Photo Upload</label>
                            <input name="photo" type="file" class="form-control-file">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Add Food</button>
                        </div>
                    </form>
                </div>
            </div>
            <?php
        }
        ?>
        <div class="row">
            <div class="col-md-6 col-lg-4 menu-wrap">
                <div class="heading-menu text-center ftco-animate">
                    <h3>Breakfast</h3>
                </div>
                <?php
                foreach ($all_items as $t=>$br){
                    if($br['item_type'] == 'breakfast') {
                        ?>
                        <div class="menus d-flex ftco-animate">
                            <div class="menu-img img" style="background-image: url(images/breakfast-1.jpg);"></div>
                            <div class="text">
                                <div class="d-flex">
                                    <div class="one-half">
                                        <h3><?=$br['name'] ?></h3>
                                    </div>
                                    <div class="one-forth">
                                        <span class="price"><?=$br['price'] ?>$</span>
                                    </div>
                                </div>
                                <p><?=$br['about'] ?></p>
                                <P><a href="javascript:;" onclick="a(<?=$br['id'] ?>,this)" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order now </a></P>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>


            </div>

            <div class="col-md-6 col-lg-4 menu-wrap">
                <div class="heading-menu text-center ftco-animate">
                    <h3>Lunch</h3>
                </div>
                <?php
                foreach ($all_items as $t=>$br){
                    if($br['item_type'] == 'lunch') {
                        ?>
                        <div class="menus d-flex ftco-animate">
                            <div class="menu-img img" style="background-image: url(images/breakfast-1.jpg);"></div>
                            <div class="text">
                                <div class="d-flex">
                                    <div class="one-half">
                                        <h3><?=$br['name'] ?></h3>
                                    </div>
                                    <div class="one-forth">
                                        <span class="price"><?=$br['price'] ?>$</span>
                                    </div>
                                </div>
                                <p><?=$br['about'] ?></p>
                                <P><a href="javascript:;" onclick="a(<?=$br['id'] ?>,this)" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order now </a></P>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>

            <div class="col-md-6 col-lg-4 menu-wrap">
                <div class="heading-menu text-center ftco-animate">
                    <h3>Dinner</h3>
                </div>
                <?php
                foreach ($all_items as $t=>$br){
                    if($br['item_type'] == 'dinner') {
                        ?>
                        <div class="menus d-flex ftco-animate">
                            <div class="menu-img img" style="background-image: url(images/breakfast-1.jpg);"></div>
                            <div class="text">
                                <div class="d-flex">
                                    <div class="one-half">
                                        <h3><?=$br['name'] ?></h3>
                                    </div>
                                    <div class="one-forth">
                                        <span class="price"><?=$br['price'] ?>$</span>
                                    </div>
                                </div>
                                <p><?=$br['about'] ?></p>
                                <P><a href="javascript:;" onclick="a(<?=$br['id'] ?>,this)" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order now </a></P>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>


            <div class="col-md-6 col-lg-4 menu-wrap">
                <div class="heading-menu text-center ftco-animate">
                    <h3>Desserts</h3>
                </div>
                <?php
                foreach ($all_items as $t=>$br){
                    if($br['item_type'] == 'desserts') {
                        ?>
                        <div class="menus d-flex ftco-animate">
                            <div class="menu-img img" style="background-image: url(images/breakfast-1.jpg);"></div>
                            <div class="text">
                                <div class="d-flex">
                                    <div class="one-half">
                                        <h3><?=$br['name'] ?></h3>
                                    </div>
                                    <div class="one-forth">
                                        <span class="price"><?=$br['price'] ?>$</span>
                                    </div>
                                </div>
                                <p><?=$br['about'] ?></p>
                                <P><a href="javascript:;" onclick="a(<?=$br['id'] ?>,this)" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order now </a></P>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>

            <div class="col-md-6 col-lg-4 menu-wrap">
                <div class="heading-menu text-center ftco-animate">
                    <h3>Wine Card</h3>
                </div>
                <?php
                foreach ($all_items as $t=>$br){
                    if($br['item_type'] == 'wine_card') {
                        ?>
                        <div class="menus d-flex ftco-animate">
                            <div class="menu-img img" style="background-image: url(images/breakfast-1.jpg);"></div>
                            <div class="text">
                                <div class="d-flex">
                                    <div class="one-half">
                                        <h3><?=$br['name'] ?></h3>
                                    </div>
                                    <div class="one-forth">
                                        <span class="price"><?=$br['price'] ?>$</span>
                                    </div>
                                </div>
                                <p><?=$br['about'] ?></p>
                                <P><a href="javascript:;" onclick="a(<?=$br['id'] ?>,this)" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order now </a></P>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>

            <div class="col-md-6 col-lg-4 menu-wrap">
                <div class="heading-menu text-center ftco-animate">
                    <h3>Drinks</h3>
                </div>
                <?php
                foreach ($all_items as $t=>$br){
                    if($br['item_type'] == 'drinks') {
                        ?>
                        <div class="menus d-flex ftco-animate">
                            <div class="menu-img img" style="background-image: url(images/breakfast-1.jpg);"></div>
                            <div class="text">
                                <div class="d-flex">
                                    <div class="one-half">
                                        <h3><?=$br['name'] ?></h3>
                                    </div>
                                    <div class="one-forth">
                                        <span class="price"><?=$br['price'] ?>$</span>
                                    </div>
                                </div>
                                <p><?=$br['about'] ?></p>
                                <p><a href="javascript:;" onclick="a(<?=$br['id'] ?>,this)" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order now </a></p>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container-fluid px-0">
        <div class="row d-flex no-gutters">
            <div class="col-md-6 ftco-animate makereservation p-4 p-md-5 pt-5 pt-md-0">
                <div class="heading-section ftco-animate mb-5">
                    <span class="subheading">Contact us</span>
                    <h2 class="mb-4">Send a Message</h2>
                </div>

                <form action="#">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Your Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Your Email">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Subject">
                    </div>
                    <div class="form-group">
                        <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Send" class="btn btn-primary py-3 px-5">
                    </div>
                </form>
            </div>
            <div class="col-md-6 d-flex align-items-stretch pb-5 pb-md-0">
                <div id="map"></div>
            </div>
        </div>
    </div>
</section>



<section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container-fluid px-0">
        <div class="row no-gutters">
            <div class="col-md">
                <a href="#" class="instagram img d-flex align-items-center justify-content-center" style="background-image: url(images/insta-1.jpg);">
                    <span class="ion-logo-instagram"></span>
                </a>
            </div>
            <div class="col-md">
                <a href="#" class="instagram img d-flex align-items-center justify-content-center" style="background-image: url(images/insta-2.jpg);">
                    <span class="ion-logo-instagram"></span>
                </a>
            </div>
            <div class="col-md">
                <a href="#" class="instagram img d-flex align-items-center justify-content-center" style="background-image: url(images/insta-3.jpg);">
                    <span class="ion-logo-instagram"></span>
                </a>
            </div>
            <div class="col-md">
                <a href="#" class="instagram img d-flex align-items-center justify-content-center" style="background-image: url(images/insta-4.jpg);">
                    <span class="ion-logo-instagram"></span>
                </a>
            </div>
            <div class="col-md">
                <a href="#" class="instagram img d-flex align-items-center justify-content-center" style="background-image: url(images/insta-5.jpg);">
                    <span class="ion-logo-instagram"></span>
                </a>
            </div>
        </div>
    </div>
</section>


