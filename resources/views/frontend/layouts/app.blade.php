<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Klientale</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicons -->
    <link href="" rel="icon">
    <link href="" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('frontend/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Template Main CSS File -->
    <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">

</head>

<body>
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>

            <h2>Fill your Details</h2>
            <p>We will send you details shortly.</p>
            <div class="contact container">
                <div class="row justify-content-center mt-4">

                    <div class="col-lg-11">
                        <form action="insert.php" method="post" role="form" id="getDemoForm" class="php-email-form">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                                </div>
                                <input type="hidden" id="type" name="type">
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>
                    </div><!-- End Contact Form -->

                </div>

            </div>
        </div>

    </div>
    @include('frontend.layouts.header')

    <!-- ======= Hero Section ======= -->
    @yield('content')
    @if(Auth::check())
    @include('frontend.layouts.footer')
    @endif
    
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{asset('frontend/vendor/purecounter/purecounter_vanilla.js')}}"></script>
    <script src="{{asset('frontend/vendor/aos/aos.js')}}"></script>
    <script src="{{asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('frontend/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{asset('frontend/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('frontend/vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('frontend/vendor/php-email-form/validate.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{asset('frontend/js/main.js')}}"></script>




    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal
        function openForm(type) {
            document.getElementsByClassName('error-message')[0].style.display = 'none';
            document.getElementsByClassName('sent-message')[0].style.display = 'none';
            document.getElementById("getDemoForm").reset();
            document.getElementById("type").value = type;
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

    <script>
        function toggleBilling() {
            var checkbox = document.getElementById("bill-toggle");
            var monthlyDiv = document.querySelector(".plan-type");
            var monthlyPrice = document.querySelector(".plan-price");
            var toggle = document.querySelector(".bill-toggle");

            if (checkbox.checked) {
                monthlyDiv.innerText = "/annually";
                monthlyPrice.innerText = "1,500";
                toggle.style.backgroundColor = "#0d60ab"; // Change color to blue
            } else {
                monthlyDiv.innerText = "/month";
                monthlyPrice.innerText = "159";
                toggle.style.backgroundColor = "#d7d7d7"; // Change color to red
            }
        }


        function toggleBillingg() {
            var checkbox = document.getElementById("bill-togglee");
            var monthlyDiv = document.querySelector(".plan-typee");
            var monthlyPrice = document.querySelector(".plan-pricee");
            var togglee = document.querySelector(".bill-togglee");
            console.log("toggleBillingg", togglee);

            if (checkbox.checked) {
                monthlyDiv.innerText = "/annually";
                monthlyPrice.innerText = "2,600";
                togglee.style.backgroundColor = "#0d60ab"; // Change color to blue
            } else {
                monthlyDiv.innerText = "/month";
                monthlyPrice.innerText = "259";
                togglee.style.backgroundColor = "#d7d7d7"; // Change color to red
            }
        }

        function toggleBillinggg() {
            var checkbox = document.getElementById("bill-toggleee");
            var monthlyDiv = document.querySelector(".plan-typeee");
            var monthlyPrice = document.querySelector(".plan-priceee");
            var toggleee = document.querySelector(".bill-toggleee");

            if (checkbox.checked) {
                monthlyDiv.innerText = "/annually";
                monthlyPrice.innerText = "2,500";
                toggleee.style.backgroundColor = "#0d60ab"; // Change color to blue
            } else {
                monthlyDiv.innerText = "/month";
                monthlyPrice.innerText = "259";
                toggleee.style.backgroundColor = "#d7d7d7"; // Change color to red  
            }
        }
    </script>

    <script>
        /*inspiration 
    https://cz.pinterest.com/pin/830703093776458971/
    */

        const cards = document.querySelectorAll(".card");
        cards.forEach((item) => {
            item.addEventListener("mouseover", () => {
                cards.forEach((el) => el.classList.remove("active"));
                item.classList.add("active");
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var errorAlert = document.getElementById('error-alert');
            if (errorAlert) {
                setTimeout(function() {
                    errorAlert.style.display = 'none';
                }, 3000)
            }

            var successAlert = document.getElementById('success-alert');
            if (successAlert) {
                setTimeout(function() {
                    successAlert.style.display = 'none';
                }, 3000);
            }
        });
    </script>
</body>

</html>