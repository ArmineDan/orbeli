<?php 

$servername = "localhost";
$user = "root";
$password = "";
$db_name = "orbeli_db";

$con = mysqli_connect($servername,$user,$password,$db_name);

if(!$con){
    die("Sxal".mysqli_connect_error());
}else{
    //echo "Hajox mutq";
}

$sql = "SELECT * FROM contact_us";

$ardyunq = mysqli_query($con,$sql);

while ($tox = mysqli_fetch_assoc($ardyunq)) {
    echo '
    <section class="wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12 center-col margin-eight-bottom sm-margin-40px-bottom xs-margin-30px-bottom text-center last-paragraph-no-margin" id="contacts_us_ns">
                    <h5 class="alt-font font-weight-700 text-extra-dark-gray text-uppercase" id="contacts_h5_narek">Contact US</h5>
                </div>  
            </div>
            <div class="row">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12 text-center sm-margin-eight-bottom xs-margin-30px-bottom wow fadeInUp last-paragraph-no-margin" style="visibility: visible; animation-name: fadeInUp;" id="d1_ns_ns_ns">
                        <div class="display-inline-block margin-20px-bottom">
                            <div class="bg-extra-dark-gray icon-round-medium"><i class="icon-map-pin icon-medium text-white"></i></div>
                        </div>
                        <div class="text-extra-dark-gray text-uppercase text-small font-weight-600 alt-font margin-5px-bottom">Visit Our Office</div>
                        <p class="center-col">'.$tox['address_icon_text'].'</p>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 text-center sm-margin-eight-bottom xs-margin-30px-bottom wow fadeInUp last-paragraph-no-margin" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <div class="display-inline-block margin-20px-bottom">
                            <div class="bg-extra-dark-gray icon-round-medium"><i class="icon-mobile icon-medium text-white"></i></div>
                        </div>
                        <div class="text-extra-dark-gray text-uppercase text-small font-weight-600 alt-font margin-5px-bottom">Phone</div>
                        <p class="center-col">'.$tox['phone_icon_text'].'</p>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 text-center xs-margin-30px-bottom wow fadeInUp last-paragraph-no-margin" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                        <div class="display-inline-block margin-20px-bottom">
                            <div class="bg-extra-dark-gray icon-round-medium"><i class="icon-envelope icon-medium text-white"></i></div>
                        </div>
                        <div class="text-extra-dark-gray text-uppercase text-small font-weight-600 alt-font margin-5px-bottom">E-mail Us</div>
                        <p class="center-col">'.$tox['mail_icon_text'].'</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="wow fadeIn no-padding bg-extra-dark-gray" style="visibility: visible; animation-name: fadeIn;">
        <div class="container-fluid">
            <div class="row equalize sm-equalize-auto">
                    <div class="col-md-6 wow fadeIn animated" style="visibility: visible; animation-name: fadeIn; height: 644px;">
                            <div class="padding-eleven-all text-center xs-no-padding-lr">
                                <h5 class="margin-55px-bottom text-white alt-font font-weight-700 text-uppercase xs-margin-ten-bottom">'.$tox['big_text_title'].'</h5>
                                <p style="font-size: 24px;text-align: justify;line-height: 33px">'.$tox['big_text'].'</p>
                            </div>
                        </div>
                <div class="col-md-6 cover-background sm-height-450px xs-height-350px wow fadeIn">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d48759.263813443424!2d44.50406587910157!3d40.19896320000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1541765255607" width="100%" height="640" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>';
}

?>