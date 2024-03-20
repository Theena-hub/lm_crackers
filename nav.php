<!-- header - start -->
<div class="container-fluid header">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 m-auto w-35">
                <div class="icon d-flex justify-content-end">
                    <img src="assets/img/location.svg" alt='image' />
                    <div class="mx-3">
                        <p style="margin: 0px"><?= $site_address ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 m-auto">
                <div class="icon d-flex justify-content-end">
                    <img src="assets\img\mail.svg" alt='image' />
                    <div class="mx-3">
                        <a href='mailto:<?= $site_email ?>'>
                            <p style="margin: 0px"><?= $site_email ?></p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 m-auto">
                <div class="icon d-flex justify-content-end">
                    <img src="assets/img/phone.svg" alt='image' />
                    <div class="mx-3">
                        <a href='tel:+91<?= $site_mobile_number ?>'>
                            <p style="margin: 0px">+91 <?= $site_mobile_number ?></p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- header - end -->
<div class="rolldiv">
    <p class="rollbar">🙏🏻HAPPY WELCOME to LM Crackers. 80% Discount is going on hurry up.... 🙏🏻</p>
</div>
<!-- navbar - start -->

<div class="container-fluid logobar" style="box-shadow: 0 4px 2px -2px rgba(0,0,0,.2)">
    <div class="container logobar">
        <nav class="navbar navbar-expand-lg" style="padding:0 10px">
            <div class="col m-auto" style="height:70px;">
                <!--<img style="max-width:210px;"  src="assets/img/logo/logo.png" alt="logo" />-->
            </div>

            <button id="tog-btn" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" onclick="togShow()">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent" style="padding:0 15px">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item active">
                        <a class="nav-link fw-600" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-600" href="about.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-600" href="estimate.php">Estimate</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-600" href="payment.php">Payment Information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-600" href="contact.php">Contact Us</a>
                    </li>
                </ul>
                <a href="estimate.php"><input class="btn btn-outline-success my-2 my-sm-0 fw-600" type="button" value="ENQUIRY NOW" /></a>
            </div>
        </nav>
    </div>
</div>
<!-- navbar - end -->
<script type="text/javascript">
    function togShow() {
        document.getElementById("navbarSupportedContent").classList.add("show");
        document.getElementById('tog-btn').setAttribute("onclick", "togHide()")
    }
    function togHide() {
        document.getElementById('navbarSupportedContent').classList.remove("show");
        document.getElementById('tog-btn').setAttribute("onclick", "togShow()")
    }
</script>