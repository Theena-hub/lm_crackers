<!DOCTYPE html>
<html lang="en">
<?php 
    include('head.php');
?>

<body>
    <!-- navigation start -->
    <?php include('nav.php') ?>
    <!-- navigation end -->
    <!-- contactSecOne - Start -->
    <div class="container-fluid contactSecOne">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-5 tc contBg" style="margin: auto">
                    <div class="">
                        <p class="bigText black fw-700">Let's</p>
                        <p class="bigText fw-700 primaryColor">Connect</p>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">
                    <div>
                        <p class="titleFive blackFirst fw-600">Please do not hesitate to contact us, kindly leave a
                            message and we will get back to you shortly.</p>
                        <form class="form-group">
                            <div class="d-flex" style="padding: 8px 0">
                                <input class="placeHold form-control fw-600 description mr-6" name="name" type="text" placeholder="NAME"  required />
                                <input class="placeHold form-control fw-600 description ml-6" name="company" type="text" placeholder="COMPANY" required />
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
                            <button class="btn d-flex">Send</button>
                        </form>
                        <!-- {messageSent && <p class="titleFive fw-600 primaryColor">Your Message sent successfully!</p>} -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid contactSecTwo">
        <div class="container">
            <div class="" style="height: 100%">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7873.983962100508!2d77.75827990028166!3d9.333975954363758!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b06c81f8868f1f5%3A0xaf1424243f778144!2sVembakottai%2C%20Tamil%20Nadu%20626131!5e0!3m2!1sen!2sin!4v1705151389872!5m2!1sen!2sin" width="100%" height="100%"  allowfullscreen="" loading="lazy" frameBorder="0" scrolling="no" marginHeight="0" marginWidth="0"></iframe>
            </div>
        </div>
    </div>
    <div class="container-fluid contactSecThree">
        <div class=" container">
            <div class="row innerRow rowGap d-flex justify-content-around" style="overflow-x: hidden">
                <div class="col-lg-4 col-md-4">
                    <h4 class="titleFour primaryColor fw-600">Registered Office</h4>
                    <div class="d-flex align-items-start mt-2">
                        <img src="assets/img/locationTwo.svg" alt='esteem' />
                        <p class="description lightBlackFive fw-400"><?= $site_address ?></p>
                    </div>
                </div>
                <!-- <div class="col-lg-5 col-md-5">
                    <h4 class="titleFour primaryColor fw-600">Logistics & Distribution Centre</h4>
                    <div class="d-flex align-items-start mt-2">
                        <img src="assets/img/locationTwo.svg" alt='esteem' />
                        <p class="description lightBlackFive fw-400">Esteem Microelectronics Pte. Ltd.,<br />C/O DNKH
                            Logistics Pte. Ltd.,<br />27 Penjuru Lane, Phase 2,<br />#02-02,Singapore 609195.</p>
                    </div>
                </div> -->
                <div class="col-lg-3 col-md-3">
                    <h4 class="titleFour primaryColor fw-600">Contact Us</h4>
                    <div class="d-flex align-items-start mb-2">
                        <img src="assets/img/mobileIcon.svg" alt='esteem' />
                        <p class="description lightBlackFive fw-400"><?= $site_mobile_number ?></p>
                    </div>
                    <div class="d-flex align-items-start mb-2">
                        <img src="assets/img/emailIcon.svg" alt='esteem' />
                        <p class="description lightBlackFive fw-400"><?= $site_email ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contactSecOne - End -->
    <!-- footer - start -->
    <?php include("footer.php") ?>
    <!-- footer - end -->
</body>

</html>