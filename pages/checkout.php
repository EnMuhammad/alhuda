<?php
?>

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <!--<h1 class="mb-2 bread">Wedding</h1>-->
                <!--    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Menu <i class="ion-ios-arrow-forward"></i></span></p>-->
            </div>
        </div>
    </div>
</section>

<!--Services-->
<section class="ftco-section bg-light">
    <div class="container-fluid">
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Our</span>
                <h2 class="mb-4">Promotions </h2>
            </div>
        </div>
        <form class="" method="post" action="index.php?action&place_order">
        <div class="row ">
            <div class="col-md-6 mb-5 mb-md-0 d-flex flex-column justify-content-stretch">
                <h2 class="h3 mb-3 text-black">Billing Details</h2>
                <div class="p-3 p-lg-5 border">

                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="c_fname" class="text-black">First Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" required id="c_fname" name="c_fname">
                        </div>
                        <div class="col-md-6">
                            <label for="c_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" required id="c_lname" name="c_lname">
                        </div>
                    </div>



                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="c_address" class="text-black">Address <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" required id="c_address" name="c_address" placeholder="Street address">
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="c_address_2" placeholder="Apartment, suite, unit etc. (optional)">
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="c_state_country" class="text-black">State / Country <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" required id="c_state_country" name="c_state_country">
                        </div>
                        <div class="col-md-6">
                            <label for="c_postal_zip" class="text-black">Posta / Zip <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" required id="c_postal_zip" name="c_postal_zip">
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="c_order_notes" class="text-black">Order Notes</label>
                        <textarea name="c_order_notes" id="c_order_notes" cols="30" rows="5" class="form-control" placeholder="Write your notes here..."></textarea>
                    </div>

                </div>
            </div>
            <div class="col-md-6  mb-5 mb-md-0 mb-5 d-flex flex-column justify-content-stretch">


                <h2 class="h3 mb-3 text-black">Your Order</h2>
                <div class="p-3 p-lg-5 border">
                    <table class="table site-block-order-table mb-5">
                        <thead>
                        <th>Product</th>
                        <th>Total</th>
                        </thead>
                        <tbody>

                        <?php

                        use DB_CONNECT\Connection;

                        if(!empty($_SESSION['cart'])) {

                            $db = DB_CONNECT\Connection::getInstance();
                            $price = 0;
                            foreach ($_SESSION['cart'] as $item) {

                                $data = $db->prepare("SELECT * FROM `items` WHERE `id`=?");
                                $data->execute(array($item));
                                $all = $data->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($all as $i => $info) {
                                    echo ' <tr>';
                                    echo '  <td>' . $info['name'] . '</td>
                            <td>' . $info['price'] . '$</td>
                            </tr>
                            ';
                                    $price += $info['price'];
                                }
                                echo '
                        
                               
                               ';
                            }

                            ?>


                            <tr>
                                <td class="text-black font-weight-bold"><strong>Cart Subtotal</strong></td>
                                <td class="text-black"><?= $price ?>$</td>
                            </tr>
                            <tr>
                                <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                                <td class="text-black font-weight-bold"><strong><?= $price ?>$</strong></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>

                    <div class="border p-3 mb-3">
                        <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsebank" role="button" aria-expanded="false" aria-controls="collapsebank">Pay Online </a></h3>

                        <div class="collapse" id="collapsebank">
                            <div class="py-2">
                                <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                            </div>
                        </div>
                    </div>

                    <div class="border p-3 mb-3">
                        <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsecheque" role="button" aria-expanded="false" aria-controls="collapsecheque">Cash on Delivery</a></h3>

                        <div class="collapse" id="collapsecheque">
                            <div class="py-2">
                                <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                            </div>
                        </div>
                    </div>


                    <!--<div class="border p-3 mb-5">
                      <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsepaypal" role="button" aria-expanded="false" aria-controls="collapsepaypal"> o  </a></h3>

                      <div class="collapse" id="collapsepaypal">
                        <div class="py-2">
                          <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                        </div>
                      </div>
                    </div>-->
                    <?php
                    if(!empty($_SESSION['cart'])) {
                        ?>
                        <div class="form-group">
                            <button id="checkoutbutton" type="submit" class="btn btn-primary btn-lg py-3 btn-block">
                                Place Order
                            </button>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <!--</div>-->
                <!-- </div>-->

            </div>
        </div>
        </form>
    </div>
</section>
