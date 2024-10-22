
<!-- icon list-->
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('smtp/PHPMailerAutoload.php');

function smtp_mailer($to, $subject, $message) {
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Username = "jadhavaryan467@gmail.com";
    $mail->Password = "oozzyqfwnpufjuqi";
    $mail->SetFrom("jadhavaryan467@gmail.com");
    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->AddAddress($to);
    $mail->SMTPOptions = array('ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => false
    ));
    if (!$mail->Send()) {
        return $mail->ErrorInfo;
    } else {
        return 'Sent';
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mailid = $_POST['email'];
    $subject = $_POST['subject'];
    $message = "New mail enquiry from: " . $mailid . " " . $_POST['message'];
    $to = 'aryanjadhav686@gmail.com';
    $result = smtp_mailer($to, $subject, $message);

    if ($result === 'Sent') {
      echo "
      <div class='alert alert-success alert-dismissible fade show' role='alert' style='position: fixed; bottom: 20px; right: 20px; z-index: 1050;'>
          <strong>Success!</strong> Your mail has been sent successfully.
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>
      ";
  }
  
   else {
        echo "<script>alert('Mail sending failed: " . $result . "');</script>";
    }
}
?>




<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <!-- Site Title-->
    <title>Contacts</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato:400,700,400italic%7CPoppins:300,400,500,700">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-D4kFh4Zc5rrh5GrShNUb2Tdu3zIQPR5EauqhwqSR5uXonPvA3xED+UQU8HcBg/8h" crossorigin="anonymous">

    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
  </head>
  <body>
   
      <!-- Page preloader-->
     
      <!-- Page Header-->
      <header class="page-header" style="padding-bottom: 24px">
        <!-- RD Navbar-->
        <div class="rd-navbar-wrap">
          <nav class="rd-navbar rd-navbar-default-with-top-panel" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fullwidth" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fullwidth" data-lg-device-layout="rd-navbar-fullwidth" data-md-stick-up-offset="90px" data-lg-stick-up-offset="150px" data-stick-up="true" data-sm-stick-up="true" data-md-stick-up="true" data-lg-stick-up="true">
            <div class="rd-navbar-top-panel rd-navbar-collapse">
              <div class="rd-navbar-top-panel-inner">
                <div class="left-side">
                  <div class="group"><span class="text-italic">Follow Us:</span>
                    <ul class="list-inline">
                      <li><a class="icon icon-sm icon-secondary-5 fa fa-instagram" href="#"></a></li>
                      <li><a class="icon icon-sm icon-secondary-5 fa fa-facebook" href="#"></a></li>
                      <li><a class="icon icon-sm icon-secondary-5 fa fa-twitter" href="#"></a></li>
                    </ul>
                  </div>
                </div>
                <div class="center-side">
                  <!-- RD Navbar Brand-->
                  <div class="rd-navbar-brand fullwidth-brand"><a class="brand-name" href="index.html"><img src="logo/logo.png" alt="" width="314" height="40"/></a></div>
                </div>
                <div class="right-side">
                  <!-- Contact Info-->
                  <div class="contact-info">
                    <div class="unit unit-middle unit-horizontal unit-spacing-xs">
                      <div class="unit__left"><span class="fa-solid fa-envelope"></span></div>
                      <div class="unit__body"><a class="text-middle" href="tel:#">info@queensiti.com</a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="rd-navbar-inner">
              <!-- RD Navbar Panel-->
              <div class="rd-navbar-panel">
                <!-- RD Navbar Toggle-->
                <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                <!-- RD Navbar collapse toggle-->
                <button class="rd-navbar-collapse-toggle" data-rd-navbar-toggle=".rd-navbar-collapse"><span></span></button>
                <!-- RD Navbar Brand-->
                <div class="rd-navbar-brand mobile-brand"><a class="brand-name" href="index.html"><img src="images/logo-default-314x48.png" alt="" width="314" height="48"/></a></div>
              </div>
              <div class="rd-navbar-aside-right">
                <div class="rd-navbar-nav-wrap">
                  <div class="rd-navbar-nav-scroll-holder">
                    <ul class="rd-navbar-nav">
                      <li class="active"><a href="index.html">Home</a>
                      </li>
                      <li><a href="about-us.html">About Us</a>
                      </li>
                      <li><a href="contacts.php">Contacts</a>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>
      <main>
        <!-- Breadcrumbs & Page title-->
        <section class="section-md text-center bg-image breadcrumbs-01">
          <div class="shell shell-fluid">
            <div class="range range-xs-center">
              <div class="cell-xs-12 cell-xl-11">
                <h2 class="text-white">Contacts</h2>
                <ul class="breadcrumbs-custom">
                  <li><a href="index.html">Home</a></li>
                  <li class="active">Contacts</li>
                </ul>
              </div>
            </div>
          </div>
        </section>

        <section class="section section-md bg-white text-center">
          <div class="shell">
            <div class="range range-50 range-md-center">
              <div class="cell-sm-8">
                <div class="contact-box">
                  <h3>Get in Touch</h3>
                  <p>We are available 24/7 by fax, e-mail or by phone. You can also use our quick contact form to ask a question about our services. We would be pleased to answer your questions.</p>
                  <form class="rd-mailform" method="post">
                    <div class="range range-sm-bottom spacing-20">
                      <div class="cell-sm-6">
                        <div class="form-wrap">
                          <input class="form-input" id="name" type="text" name="name" data-constraints="@Required">
                          <label class="form-label" for="name">Your name</label>
                        </div>
                      </div>
                      <div class="cell-sm-6">
                        <div class="form-wrap">
                          <input class="form-input" id="phone" type="number" name="phone" data-constraints="@Numeric">
                          <label class="form-label" for="phone">Phone</label>
                        </div>
                      </div>
                      <div class="cell-xs-12">
                        <div class="form-wrap">
                          <textarea class="form-input" id="message" name="message" data-constraints="@Required"></textarea>
                          <label class="form-label" for="message">Your Message</label>
                        </div>
                      </div>
                      <div class="cell-xs-12">
                        <div class="form-wrap">
                          <textarea class="form-input" id="subject" name="subject" data-constraints="@Required"></textarea>
                          <label class="form-label" for="subject">Your Subject</label>
                        </div>
                      </div>
                      <div class="cell-sm-6">
                        <div class="form-wrap">
                          <input class="form-input" id="email" type="email" name="email" data-constraints="@Email @Required">
                          <label class="form-label" for="email">E-mail</label>
                        </div>
                      </div>
                      <div class="cell-sm-6">
                        <button class="button button-primary button-square button-block" type="submit"><span>send message</span></button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>




              <div class="cell-sm-4">
                <aside class="contact-box-aside text-left">
                  <div class="range range-50">
                    <div class="cell-xs-6 cell-sm-12">
                      <p class="aside-title"> get Social</p>
                      <hr class="divider divider-left divider-custom">
                      <ul class="list-inline">
                        <li><a class="icon icon-sm icon-gray-3 fa fa-instagram" href="#"></a></li>
                        <li><a class="icon icon-sm icon-gray-3 fa fa-facebook" href="#"></a></li>
                        <li><a class="icon icon-sm icon-gray-3 fa fa-twitter" href="#"></a></li>
                        <li><a class="icon icon-sm icon-gray-3 fa fa-youtube" href="#"></a></li>
                      </ul>
                    </div>
                    <div class="cell-xs-6 cell-sm-12">
                      <p class="aside-title"> Phone</p>
                      <hr class="divider divider-left divider-custom">
                      <div class="unit unit-middle unit-horizontal unit-spacing-xs unit-xs-top">
                        <div class="unit__left"><span class="text-middle icon icon-sm mdi mdi-phone icon-primary"></span></div>
                        <div class="unit__body"><a class="text-middle link link-gray-dark" href="tel:#"></a></div>
                      </div>
                    </div>
                    <div class="cell-xs-6 cell-sm-12">
                      <p class="aside-title"> Address</p>
                      <hr class="divider divider-left divider-custom">
                      <div class="unit unit-middle unit-horizontal unit-spacing-xs unit-xs-top">
                        <div class="unit__left"><span class="text-middle icon icon-sm mdi mdi-map-marker icon-primary"></span></div>
                        <div class="unit__body"><a class="text-middle link link-gray-dark" href="contacts.php">dUBAI , UAE</a></div>
                      </div>
                    </div>
                    <div class="cell-xs-6 cell-sm-12">
                      <p class="aside-title"> opening hours</p>
                      <hr class="divider divider-left divider-custom">
                      <div class="unit unit-middle unit-horizontal unit-spacing-xs unit-xs-top">
                        <div class="unit__left"><span class="text-middle icon icon-sm mdi mdi-clock icon-primary"></span></div>
                        <div class="unit__body text-gray-darker">
                          <p>We work every day 9:00 AM –5:00 PM</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </aside>
              </div>
            </div>
          </div>
        </section>
        <!-- Page Footer-->
        <footer class="page-footer text-left text-sm-left">
          <div class="shell-wide">
            
            <div class="page-footer-minimal">
              <div class="shell-wide">
                <div class="range range-50">
                  <div class="cell-sm-6 cell-md-3 cell-lg-4 wow fadeInUp" data-wow-delay=".1s">
                    <div class="page-footer-minimal-inner">
                      <h4>Opening Hours</h4>
                      <ul class="list-unstyled">
                        <li>
                          <div class="group-xs"> 
                            <div>
                              <dl class="list-desc">
                                <dt>Opens at: </dt>
                                <dd class="text-gray-darker"><span>9:00 AM</span></dd>
                              </dl>
                            </div>
                            <div>
                              <dl class="list-desc">
                                <dt>Closes at: </dt>
                                <dd class="text-gray-darker"><span>5:00 PM</span></dd>
                              </dl>
                            </div>
                          </div>
                        </li>
                        <li>
                          <p class="rights"><span>&copy;&nbsp;</span><span>2024</span><span>&nbsp;</span><span class="copyright-year"></span>Queens International Trading. All Rights Reserved</p>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="cell-sm-6 cell-md-5 cell-lg-4 wow fadeInUp" data-wow-delay=".2s">
                    <div class="page-footer-minimal-inner">
                      <h4>Address</h4>
                      <ul class="list-unstyled">
                        <li>
                          <dl class="list-desc">
                            <dt><span class="icon icon-sm mdi mdi-map-marker"></span></dt>
                            <dd><a class="link link-gray-darker" href="#">Dubai , UAE</a></dd>
                          </dl>
                        </li>
                        <li>
                          <dl class="list-desc">
                            <dt><span class="icon icon-sm mdi mdi-phone"></span></dt>
                            <dd class="text-gray-darker">Call Us: <a class="link link-gray-darker" href="tel:#"></a>
                            </dd>
                          </dl>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="cell-sm-8 cell-md-4 wow fadeInUp" data-wow-delay=".3s">
                    <div class="page-footer-minimal-inner-subscribe">
                      <h4>Write your query</h4>
                      <!-- RD Mailform-->
                      <form class="rd-mailform rd-mailform-inline form-center" data-form-output="form-output-global" data-form-type="subscribe" method="post" action="bat/rd-mailform.php">
                        <div class="form-wrap">
                          <input class="form-input" id="subscribe-email" type="email" name="email" data-constraints="@Email @Required">
                          <label class="form-label" for="subscribe-email">Enter your e-mail</label>
                        </div>
                        <div class="form-wrap">
                          <input class="form-input" id="subscribe-email" type="email" name="email" data-constraints="@Email @Required">
                          <label class="form-label" for="subscribe-email">Your query</label>
                        </div>
                        <button class="button button-primary-2 button-effect-ujarak button-square" type="submit"><span>Send</span></button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </footer>
      </main>
    </div>
    <!-- PANEL-->
    <!-- END PANEL-->
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- PhotoSwipe Gallery-->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="pswp__bg"></div>
      <div class="pswp__scroll-wrap">
        <div class="pswp__container">
          <div class="pswp__item"></div>
          <div class="pswp__item"></div>
          <div class="pswp__item"></div>
        </div>
        <div class="pswp__ui pswp__ui--hidden">
          <div class="pswp__top-bar">
            <div class="pswp__counter"></div>
            <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
            <button class="pswp__button pswp__button--share" title="Share"></button>
            <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
            <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
            <div class="pswp__preloader">
              <div class="pswp__preloader__icn">
                <div class="pswp__preloader__cut">
                  <div class="pswp__preloader__donut"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
            <div class="pswp__share-tooltip"></div>
          </div>
          <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
          <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
          <div class="pswp__caption">
            <div class="pswp__caption__cent"></div>
          </div>
        </div>
      </div>
    </div>
    <!-- Javascript-->
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-dU8U3D8XHDgG5AAp4hQ1r7gydX6RZShCwtAuB8UwEvU6CMejs/m3hmK0q6twhTHx" crossorigin="anonymous"></script>

  </body>
</html>