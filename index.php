<!DOCTYPE html>
<html lang="en">

<?php include('head.php')?>

<body>
    <!-- navigation start -->
    <?php include("nav.php") ?>
    <!-- navigation end -->
    <!-- hero Section - start -->
    <div class="container-fluid home px-0" >
        <div class="owl-carousel owl-theme homeBanner-owl-carousel">
            <?php
                $query = "SELECT * FROM `tbl_banner` where status='1' order by id asc";
                $result = mysqli_query($conn, $query);                
                while ($row = mysqli_fetch_array($result)) {
                    $bimg = 'admin/dashboard/uploads/'. $row['image'];

                ?>

                    <div class="item d-flex justify-content-center flex-column" style="background-image:url(<?= $bimg ?>);background-size: cover;background-repeat: no-repeat;background-position: center;"></div>
            <?php
                }
            ?>   
        </div>
    </div>    
    <!-- hero Section - end -->
    <!-- about us section - start -->
    <div class="container-fluid about aniadd1">
        <div class="container overlay d-flex justify-content-center align-items-center">
            <div class="row rowGap">
                <div class="col-lg-4">
                    <div class="card card1">
                        <h1 class="titleFour text-center fw-600 blackTwo">Best Price</h1>
                        <p class="description text-center fw-400 blackThree">Experience premium enjoyment without breaking the bank! Our unbeatable prices bring you top-notch quality at a cost that fits your budget perfectly.</p>
                    </div>
                </div> 
                <div class="col-lg-4">
                    <div class="card card2">
                        <h1 class="titleFour text-center fw-600 blackTwo">On Time Delivery</h1>
                        <p class="description text-center fw-400 blackThree">we understand the importance of time. That's why our commitment to on-time delivery sets us apart in the industry! 🕒</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card3">
                        <h1 class="titleFour text-center fw-600 blackTwo">Best Quality</h1>
                        <p class="description text-center fw-400 blackThree"> the best quality of products for a company involves showcasing key attributes that set the products apart from competitors.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- <img class="dotMarkLeft" src="assets/img/dotMarkLeft.svg" alt="image" /> -->
        <!-- <img class="dotMarkRight" src="assets/img/dotMarkRight.svg" alt="image" /> -->
        <div class="container two">
            <div class="row rowGap">
                <div class="col-lg-5 ami-1" style="margin: auto">
                    <img src="assets\img\home\AboutUs.svg" alt="about">
                </div>
                <div class="col-lg-7 ami-2" style="margin: auto">
                    <div>
                        <h1 class="titleTwo primaryColor fw-600"><span>Welcome to LM Crackers</span></h1><br />
                        <ul>
                            <li class="markPoint description mb-1 black">We take pride in providing the best range of crackers and fireworks for all of your special events at LM Crackers. Our extensive selection of high-quality products is certain to brighten your celebrations and fill them with joy and excitement, whether it is for Diwali, the New Year, weddings, birthdays, or any other occasion.</li><br />
                            <li class="markPoint description mb-1 black">At our store, we recognize that fireworks are not just about bursts of color and light, they are the embodiment of joy, the spark that turns ordinary moments into extraordinary memories. We take pride in handpicking a diverse array of fireworks, each one a testament to the artistry and thrill that defines a celebration. </li><br />
                            <a class="btn" href='about.php'>Read More</a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about us sectio - end -->
    <!-- why choose us - start -->
    <div class="container whyChooseUs aniadd2">
        <div class="choose2">
            <!-- <img class="electron top topLeft" src="assets/img/electronLight.svg" alt="esteem" /> -->
            <h1 class="titleOne primaryColor fw-600 text-center">Why Choose Us ?</h1>
            <p class="choosetext text-center">Discover the finest selection of fireworks in Sivakasi at our store, your ultimate destination for igniting joy and celebration. Revolutionizing the way you shop for crackers, our online platform has simplified the process, making it a breeze to order your favorite pyrotechnics from the comfort of your home.</p>
            <!-- <img class="electron top topRight" src="assets/img/electronLight.svg" alt="esteem" /> -->
            <div class="row rowGap mt-5">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card sideLine">
                        <img class="chooseUs one" src="assets\img\home\icon-04.png" alt='image' />
                        <div class="">
                            <h1 class="titleFive text-center fw-700 blackColor">Quality Products</h1>
                            <p class="description text-center fw-400 blackThree">We are dedicated to providing products that set new standards in excellence.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card sideLine">
                        <img class="chooseUs two" src="assets\img\home\icon-02.png" alt='image' />
                        <div class="">
                            <h1 class="titleFive text-center fw-700 blackColor">Affordable Price</h1>
                            <p class="description text-center fw-400 blackThree"> Your satisfaction is our priority, and we're committed to offering premium products at affordable prices.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card">
                        <img class="chooseUs three" src="assets\img\home\icon-03.png" alt='image' />
                        <div class="">
                            <h1 class="titleFive text-center fw-700 blackColor">Wide Variety</h1>
                            <p class="description text-center fw-400 blackThree mb-0"></p>Enhance Your Lifestyle with Our Diverse Range of Premium Offerings!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card">
                        <img class="chooseUs four" src="assets\img\home\icon-01.png" alt='image' />
                        <div class="">
                            <h1 class="titleFive text-center fw-700 blackColor">Bulk Orders</h1>
                            <p class="description text-center fw-400 blackThree">Unlock amazing savings and exclusive benefits when you choose to make a bulk purchase with us!</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <img class="electron bottom bottomLeft" src="assets/img/electronLight.svg" alt="esteem" />
            <img class="electron bottom bottomRight" src="assets/img/electronLight.svg" alt="esteem" /> -->
        </div>
    </div>
    <!-- why choose us - end -->
    <!-- industries - start -->
    <div class="container industries">
        <h1 class="titleOne fw-600 text-center primaryColor">Our Products</h1>
        <div class="row rowGap mt-5">
            <div class="col-lg-4 col-md-6 col-sm-6 mt-3 mb-3 text-center prd">
                <div>
                    <img class='img-fluid' src="assets\img\home\img-01.png" alt='image' />
                    <a href="estimate.php"><h1 class="titleFour fw-600 black">GROUND CHAKKARS</h1></a>
                    <p style="padding: 0 15%">Ignite the joy with our high-quality spinners that promise to turn your celebrations into an unforgettable spectacle!</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 mt-3 mb-3 text-center prd">
                <div>
                    <img class='img-fluid' src="assets\img\home\img-03.png" alt='image' />
                    <a href="estimate.php"><h1 class="titleFour fw-600 black">SOUND CRACKERS</h1></a>
                    <p style="padding: 0 15%">Elevate your festivities with our Sound Crackers, the ultimate catalyst for sparking joy and vibrancy in your celebrations!</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 mt-3 mb-3 text-center prd">
                <div>
                    <img class='img-fluid' src="assets\img\home\img-06.png" alt='image' />
                    <a href="estimate.php"><h1 class="titleFour fw-600 black">SPARKLERS</h1></a>
                    <p style="padding: 0 15%">Transform your celebrations into magical moments with the radiant glow of our dazzling sparklers!</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 mt-3 mb-3 text-center prd">
                <div>
                    <img class='img-fluid' src="assets\img\home\img-04.png" alt='image' />
                    <a href="estimate.php"><h1 class="titleFour fw-600 black">ROCKETS</h1></a>
                    <p style="padding: 0 15%">Set the Sky Ablaze with Our Breathtaking Aerial Spectacles! Elevate Every Occasion to Extraordinary Heights!</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 mt-3 mb-3 text-center prd ">
                <div>
                    <img class='img-fluid' src="assets\img\home\img-02.png" alt='image' />
                    <a href="estimate.php"><h1 class="titleFour fw-600 black">FLOWER POTS</h1></a>
                    <p style="padding: 0 15%">Experience a kaleidoscope of mesmerizing fireworks, infusing each extraordinary moment!</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 mt-3 mb-3 text-center prd">
                <div>
                    <img class='img-fluid' src="assets\img\home\img-05.png" alt='image' />
                    <a href="estimate.php"><h1 class="titleFour fw-600 black">GARLANDS</h1></a>
                    <p style="padding: 0 15%">Experience the enchantment of the night sky with GARLANDS firecrackers, meticulously crafted to paint the darkness!</p>
                </div>
            </div>
        </div>
    </div>
    <!-- industries - end -->
    <!-- experience - start -->
    <div class="container-fluid experience">
        <div class="container">
            <div class="row rowGap">
                <div class="col-lg-4">
                    <div>
                        <h1 class="titleThree fw-600 underLine primaryColorTwo">More than 5 Years of Experience</h1>
                        <p class="description fw-400 blackTwo">At LM Crackers, ensuring the utmost safety and quality in our products is non-negotiable. We understand the gravity of our responsibility, and we leave no room for compromise.</p>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row rowGap">
                        <div class="col-lg-6">
                            <div class="card">
                                <img class="experienceIcon" src="assets\img\home\icon-06.png" alt='image' />
                                <h1 class="number d-flex">                            
                                    <span id='counter'>256</span>+
                                </h1>
                                <h1 class="content">Products</h1>
                            </div>
                        </div>                       
                        <div class="col-lg-6">
                            <div class="card">
                                <img class="experienceIcon" src="assets\img\home\icon-08.png" alt='image' />
                                <h1 class="number d-flex">                          
                                    <span id='counter'>1000</span>+
                                </h1>
                                <h1 class="content">Happy Customers</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <div class="row rowGap">
                <div class="col-lg-4">
                    <div class="card">
                        <img class="experienceIcon" src="assets\img\home\icon-07.png" alt='image' />
                        <h1 class="number d-flex">
                            <span id='counter'>40</span>+
                        </h1>
                        <h1 class="content">District Served</h1>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <img class="experienceIcon" src="assets\img\home\icon-05.png" alt='image' />
                        <h1 class="number d-flex">                                    
                            <span id='counter'>2500</span>+
                        </h1>
                        <h1 class="content">Products Delivered</h1>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <img class="experienceIcon" src="assets\img\home\icon-09.png" alt='image' />
                        <h1 class="number">2017</h1>
                        <h1 class="content">Since</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- experience - end -->
    <!-- brand section - start  -->
    <!-- <div class="container-fluid brand">
        <div class="container mt-5 mb-5">
            <img class="electron bg" src="assets/img/electron.svg" alt='image' />
            <div class="row rowGap">
                <div class="col-lg-4" style="margin: auto">
                    <div>
                        <h1 class="titleOne fw-600 primaryColor">Focused Brands</h1>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div>
                        <div class="owl-carousel owl-theme brands-owl-carousel">
                            <div class="item"><img class="brandImg" src="assets/img/brandOne.jpg" alt='image' /></div>
                            <div class="item"><img class="brandImg" src="assets/img/brandTwo.jpg" alt='image' /></div>
                            <div class="item"><img class="brandImg" src="assets/img/brandThree.jpg" alt='image' /></div>
                            <div class="item"><img class="brandImg" src="assets/img/brandFour.jpg" alt='image' /></div>
                            <div class="item"><img class="brandImg" src="assets/img/brandFive.jpg" alt='image' /></div>
                            <div class="item"><img class="brandImg" src="assets/img/brandSix.jpg" alt='image' /></div>
                            <div class="item"><img class="brandImg" src="assets/img/brandSeven.jpg" alt='image' /></div>
                            <div class="item"><img class="brandImg" src="assets/img/brandEight.jpg" alt='image' /></div>
                            <div class="item"><img class="brandImg" src="assets/img/brandNine.jpg" alt='image' /></div>
                            <div class="item"><img class="brandImg" src="assets/img/brandTen.jpg" alt='image' /></div>
                            <div class="item"><img class="brandImg" src="assets/img/brandEleven.jpg" alt='image' />
                            </div>
                            <div class="item"><img class="brandImg" src="assets/img/brand12.jpg" alt='image' /></div>
                            <div class="item"><img class="brandImg" src="assets/img/brand13.png" alt='image' /></div>
                            <div class="item"><img class="brandImg" src="assets/img/brand14.png" alt='image' /></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- brand section - end -->
    <!-- achievements - start -->
    <div class="container-fluid achievements">
        <div class="lineBg"></div>
        <div class="container">
            <div class="row rowGap">
                <div class="col-lg-5 ctd1" style="margin: auto">
                    <img src="assets\img\home\AboutUs.svg" alt="about">
                </div>
                <div class="col-lg-7 ctd2">
                    <div class="card">
                        <center><p class="titleFive blackFirst fw-600">CONTACT US</p></center>
                        <form class="form-group">
                            <div class="d-flex" style="padding: 8px 0">
                                <input class="placeHold form-control fw-600 description mr-6" name="name" type="text"
                                    placeholder="NAME"  required />
                                <input class="placeHold form-control fw-600 description ml-6" name="company" type="text"
                                    placeholder="COMPANY" required />
                            </div>
                            <div class="d-flex" style="padding: 8px 0">
                                <input class="placeHold form-control fw-600 description mr-6" name="phone" type="number"
                                    placeholder="PHONE" required  />
                                <input class="placeHold form-control fw-600 description ml-6" name="email" type="email"
                                    placeholder="EMAIL" required />
                            </div>
                            <div style="padding: 8px 0">
                                <textarea class="placeHold form-control fw-600 description" name="message" rows="4"
                                    cols="50" placeholder="Message Here..." required value="message"
                                    ></textarea>
                            </div>
                            <center><button class="btn d-flex">Send</button></center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- achievements - end -->
    
    <!-- weWork - start -->
    <div class="container-fluid weWork">
        <div class="container">
            <div class="row rowGap">
                <div class="col-lg-4" style="margin: auto">
                    <div>
                        <h1 class="titleOne primaryColor fw-600">Our Brands</h1>
                        <h1 class="titleOne blackThree fw-600">We Work With</h1>
                        <!-- <p class="description lightBlack fw-400">Lorem ipsum dolor sit amet consectetur.
                            Vitae morbi justo neque consequat vitae suspendisse.</p> -->
                    </div>
                </div>
                <div class="col-lg-8">
                    <div>
                        <div class="owl-carousel owl-theme clients-owl-carousel">
                            <div class="item">
                                <div class="d-flex justify-content-between align-items-center my-5">
                                    <img src="assets\img\brand\brandOne.png" alt='image' />
                                    <img src="assets\img\brand\brandTwo.png" alt='image' />
                                    <img src="assets\img\brand\brandThree.png" alt='image' />
                                </div>
                                <div class="d-flex justify-content-between align-items-center my-5">
                                    <img src="assets\img\brand\brandFour.png" alt='image' />
                                    <img src="assets\img\brand\brandFive.png" alt='image' />
                                    <img src="assets\img\brand\brandSix.png" alt='image' />
                                </div>
                            </div>
                            <div class="item">
                                <div class="d-flex justify-content-between align-items-center my-5">
                                    <img src="assets\img\brand\brandSeven.png" alt='image' />
                                    <img src="assets\img\brand\brandEight.png" alt='image' />
                                    <img src="assets\img\brand\brandOne.png" alt='image' />
                                </div>
                                <div class="d-flex justify-content-between align-items-center my-5">
                                    <img src="assets\img\brand\brandTwo.png" alt='image' />
                                    <img src="assets\img\brand\brandThree.png" alt='image' />
                                    <img src="assets\img\brand\brandFour.png" alt='image' />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- weWork - end  -->
    <!-- footer - start -->
    <?php include('footer.php') ?>
    <!-- footer - end  -->
    <!-- whatsapp icon start -->
    <?php include('whatsapp.php') ?>
    <!-- whatsapp icon end  -->
    <!-- script - start -->
    <?php include("script.php")?>
    <!-- script - end -->
    <script>
        $(".clients-owl-carousel").owlCarousel({
            loop: true,
            dots: false,
            autoplay: true,
            items: 1,
            nav: false,
            autoplayHoverPause: true,
            animateOut: 'slideOutUp',
            animateIn: 'slideInUp'
        });
        $(".brands-owl-carousel").owlCarousel({
            loop: true,
            dots: false,
            autoplay: true,
            lazyLoad: true,
            cssEase: "linear",
            nav: false,
            autoplaySpeed: 1500
        });
        $('.homeBanner-owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            autoplay: true,
            nav: false,
            dots:true,
            autoplaySpeed: 1500,
            items: 1
        });

        // $(window).on('scroll', () => {
        //     let page = window.scrollY;
        //     let pheight =  ($(window).height())/2;

        //     let offset1 = $(".aniadd1").offset().top;
        //     let height1 = ($(".aniadd1").height())/2;
        //     ((page+pheight) > offset1 &&  (page < (offset1+height1)))?$(".aniadd1").addClass("animate"):$(".aniadd1").removeClass("animate");
            
        //     let offset2 = $(".aniadd2").offset().top;
        //     let height2 = ($(".aniadd2").height())/2;
        //     ((page+pheight) > offset2 &&  (page < (offset2+height2)))?$(".aniadd2").addClass("animate"):$(".aniadd2").removeClass("animate");
        // });
    </script>
</body>
</html>