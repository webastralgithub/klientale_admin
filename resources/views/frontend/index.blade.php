@extends('frontend.layouts.app')

@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up">We offer easy solutions to <span>connect businesses with clients.</span></h1>
                <h2 data-aos="fade-up" data-aos-delay="400">We develop industry specific solutions.</h2>
                <div data-aos="fade-up" data-aos-delay="600">
                    <div class="text-center text-lg-start">
                        <a href="#portfolio"
                            class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                            <span>Get your industry specific platform demo</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                <img src="{{asset('frontend/img/hero-img.png')}}" class="img-fluid" alt="">
            </div>
        </div>
    </div>

</section><!-- End Hero -->

<main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">

        <div class="container" data-aos="fade-up">
            <div class="row gx-0">

                <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="content">
                        <h3>- What is in the Platform </h3>
                        <h2>Know more about our Platform</h2>
                        <p>
                            Our Platform is better than Sales Force and had features of Calendly, Sales Force,
                            Infusionsoft, Hootsuite, etc. at one touch of button. Our Platform will help you in managing
                            your Leads, Sales, Schedules, Meeting, Employees and Marketing platforms & Strategies,
                            through:
                        </p>

                        <ul>
                            <li>Mass Emailing & Texting</li>
                            <li>Referrals Exchange Platform</li>
                            <li>Help in building Back links with your partners, associates or companies.</li>
                        </ul>


                    </div>
                </div>

                <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{asset('frontend/img/about.jpg')}}" class="img-fluid" alt="">
                </div>

            </div>
        </div>

    </section><!-- End About Section -->

    <section class="info-img">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-md-12">
                    <img src="{{asset('frontend/img/features-6.png')}}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>


    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <!-- <h2>Demos</h2> -->
                <p>Industry specific platform demo</p>
            </header>


            <div class="row gy-4 mt-3 portfolio-container">

                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                        <img src="{{asset('frontend/img/portfolio/p2.jpg')}}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Insurance Platform</h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            <div class="portfolio-links">
                                <button type="button" onclick="openForm('insurance')" id="myBtn" class=""><i
                                        class="bi bi-plus"></i> Get your industry specific platform demo</button>
                            </div>
                        </div>
                    </div>

                    <div class="box-feature">
                        <h3>Insurance Platform</h3>
                        <ul>
                            <li>Your dashboard helps in managing or scheduling your tasks, Meetings, Marketing, etc.
                            </li>
                            <li>To-Do list will show you everyday (automatically pop out) tasks.</li>
                            <li>Leads will be managed according to categories.</li>
                        </ul>
                        <a onclick="openForm('insurance')" class="btn-buy"><i class="bi bi-plus"></i> Get your industry
                            specific platform demo</a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                    <div class="portfolio-wrap">
                        <img src="{{asset('frontend/img/portfolio/p3.jpg')}}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Mortgage Platform</h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            <div class="portfolio-links">
                                <button onclick="openForm('mortgage')" type="button" class=""><i class="bi bi-plus"></i>
                                    Get your industry specific platform demo</button>
                            </div>
                        </div>
                    </div>

                    <div class="box-feature">
                        <h3>Mortgage Platform</h3>
                        <ul>
                            <li>Your dashboard helps in managing or scheduling your tasks, Meetings, Marketing, etc.
                            </li>
                            <li>To-Do list will show you everyday (automatically pop out) tasks.</li>
                            <li>Leads will be managed according to categories.</li>
                        </ul>
                        <a onclick="openForm('mortgage')" class="btn-buy"><i class="bi bi-plus"></i> Get your industry
                            specific platform demo</a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                        <img src="{{asset('frontend/img/portfolio/p1.jpg')}}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Real Estate Platform</h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            <div class="portfolio-links">
                                <button type="button" onclick="openForm('realstate')" class=""><i
                                        class="bi bi-plus"></i> Get your industry specific platform demo</button>
                            </div>
                        </div>
                    </div>

                    <div class="box-feature">
                        <h3>Real Estate Platform</h3>
                        <ul>
                            <li>Include 3 Features from First 2 Platform</li>
                            <li>Owners: This will help in giving access to your different employees or agents on
                                restrictive basis.</li>
                            <li>Exclusive Listing: This will help in managing your listings or Social Media posts for
                                Marketing purposes.</li>
                        </ul>
                        <a onclick="openForm('realstate')" class="btn-buy"><i class="bi bi-plus"></i> Get your industry
                            specific platform demo</a>
                    </div>
                </div>

            </div>

        </div>

    </section><!-- End Portfolio Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">

        <header class="section-header">
            <h2>Features</h2>
            <p>Some Common Features from all three Platform</p>
        </header>

        <div class="container" data-aos="fade-up">
            <!-- Feature Tabs -->
            <div class="row feture-tabs" data-aos="fade-up">
                <div class="col-lg-6 spacpart">
                    <h3>Manage contact</h3>
                    <p>Contacts is your all database collected from YOUR different resources/inputs such as Phone
                        Contacts, Website, Social Medias, Manual Input, Referrals, etc.</p>

                </div>

                <div class="col-lg-6">
                    <img src="{{asset('frontend/img/features-2.jpg')}}" class="img-fluid" alt="">
                </div>
            </div><!-- End Feature Tabs -->

            <div class="row feture-tabs feture-tabs-scn" data-aos="fade-up">
                <div class="col-lg-6">
                    <img src="{{asset('frontend/img/features-3.png')}}" class="img-fluid" alt="">
                </div>

                <div class="col-lg-6 spacpart2">
                    <h3>Leads & Vendors</h3>
                    <p>Leads will be managed according to categories.<br><br>
                        Vendors will be your suppliers or companies, which you dealing on frequent basis.</p>

                </div>
            </div><!-- End Feature Tabs -->

            <!-- Feature Tabs -->
            <div class="row feture-tabs" data-aos="fade-up">
                <div class="col-lg-6 spacpart">
                    <h3>Categories & Owners</h3>
                    <p>Your own Business categories. You can add or delete Categories also.<br><br>
                        This will help in giving access to your different employees or agents on restrictive basis.
                    </p>

                </div>

                <div class="col-lg-6">
                    <img src="{{asset('frontend/img/features-4.png')}}" class="img-fluid" alt="">
                </div>
            </div><!-- End Feature Tabs -->

        </div>

    </section><!-- End Features Section -->



</main><!-- End #main -->

@endsection