@extends('frontend.layouts.app')

@section('content')

<main id="main">


    <!-- ======= Features Section ======= -->
    <section id="" class="features pricing-plan-sec">

        <header class="section-header">
            <h2>Pricing</h2>
            <p class="parah-cum-p">Klientale Pricing and Plans</p>

            <p class="parah-btm">Reach your goals faster with the CRM</p>
        </header>

        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-md-12">

                    <div class="pricing-table">
                        <div class="plan starter">
                            <div class="price-table-top">
                                <h2 class="name">Pro</h2>
                            </div>

                            <div class="price-table-btm-cnt">
                                <div class="price">$<span class="plan-price">159</span> <sub class="plan-type">/
                                        month</sub></div>

                                <div class="bill-type">
                                    <div class="monthly">Billed monthly</div>
                                    <div class="bill-toggle">
                                        <input type="checkbox" id="bill-toggle" onchange="toggleBilling()">
                                        <label for="bill-toggle"></label>
                                    </div>
                                    <div class="annually">Billed anually</div>
                                </div>

                                <ul class="features">
                                    <h6>Core features:</h6>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                                            <path
                                                d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486z" />
                                        </svg>
                                        Email marketing
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                                            <path
                                                d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486z" />
                                        </svg>
                                        Marketing, sales & workflow automation
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                                            <path
                                                d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486z" />
                                        </svg>
                                        Lead capture & automated follow-up
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                                            <path
                                                d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486z" />
                                        </svg>
                                        Lead & client management (CRM)
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                                            <path
                                                d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486z" />
                                        </svg>
                                        Marketing, sales & workflow automation
                                    </li>
                                </ul>
                                <button class="choose-btn" type="button">
                                    Choose Plan
                                </button>
                            </div>
                        </div>

                        <!-- <div class="plan pro">
                            <div class="price-table-top">
                                <h2 class="name">Max</h2>
                            </div>

                            <div class="price-table-btm-cnt">
                                <div class="price">$<span class="plan-pricee">2,600</span> <sub class="plan-typee">/
                                        annually</sub></div>
                                <div class="bill-type">
                                    <div class="monthly">Billed monthly</div>
                                    <div class="bill-toggle bill-togglee">
                                        <input type="checkbox" id="bill-togglee" checked onchange="toggleBillingg()">
                                        <label for="bill-togglee"></label>
                                    </div>
                                    <div class="annually">Billed annually</div>
                                </div>

                                <ul class="features">
                                    <h6>Everything in Pro, plus:</h6>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                                            <path
                                                d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486z" />
                                        </svg>
                                        Advanced lead optimization
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                                            <path
                                                d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486z" />
                                        </svg>
                                        Enhanced landing pages & sales tools
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                                            <path
                                                d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486z" />
                                        </svg>
                                        Ecommerce tools
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                                            <path
                                                d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486z" />
                                        </svg>
                                        Advanced reporting
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                                            <path
                                                d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486z" />
                                        </svg>
                                        Enhanced landing pages & sales tools
                                    </li>
                                </ul>
                                <button class="choose-btn active" type="button">
                                    Choose Plan
                                </button>
                            </div>
                        </div> -->

                        <div class="plan enterprise">
                            <div class="price-table-top">
                                <h2 class="name">Ultimate</h2>
                            </div>

                            <div class="price-table-btm-cnt">
                                <div class="price">$<span class="plan-priceee">259</span> <sub class="plan-typeee">/
                                        month</sub></div>

                                <div class="bill-type">
                                    <div class="monthly">Billed monthly</div>
                                    <div class="bill-toggle bill-toggleee">
                                        <input type="checkbox" id="bill-toggleee" onchange="toggleBillinggg()">
                                        <label for="bill-toggleee"></label>
                                    </div>
                                    <div class="annually">Billed anually</div>
                                </div>

                                <ul class="features">
                                    <h6>Core features, plus:</h6>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                                            <path
                                                d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486z" />
                                        </svg>
                                        Premium CRM & sales management
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                                            <path
                                                d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486z" />
                                        </svg>
                                        Advanced marketing & sales tools
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                                            <path
                                                d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486z" />
                                        </svg>
                                        Custom user access controls
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                                            <path
                                                d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486z" />
                                        </svg>
                                        Affiliate management & collaboration
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                                            <path
                                                d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486z" />
                                        </svg>
                                        Advanced reporting
                                    </li>
                                </ul>
                                <button class="choose-btn" type="button">
                                    Choose Plan
                                </button>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div class="row">
                <div class="pricing-table-pnts">
                    <table class="table" style="text-align:center;padding-left:200px; padding-right:200px;">
                        <thead>
                            <tr class="active">
                                <th class="td-width-wide">CRM</th>
                                <th style="background: #67b733;">
                                    <center>
                                        <h3>Pro</h3>
                                    </center>
                                </th>
                                <!-- <th style="background: #FD8755;">
                                    <center>
                                        <h3>Max</h3>
                                    </center>
                                </th> -->
                                <th style="background: #0c579a;">
                                    <center>
                                        <h3>Ultimate</h3>
                                    </center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="tble-td-left">
                                    Contact management
                                    <span>
                                        House all your client activity, data, and communications in one easily
                                        accessible place
                                    </span>
                                </td>
                                <td>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                    </svg>
                                </td>
                                <!-- <td class="border-botheside">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                    </svg>
                                </td> -->
                                <td>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                    </svg>
                                </td>
                            </tr>

                            <tr>
                                <td class="tble-td-left">
                                    Contact management
                                    <span>
                                        House all your client activity, data, and communications in one easily
                                        accessible place
                                    </span>
                                </td>
                                <td>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                    </svg>
                                </td>
                                <!-- <td class="border-botheside">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                    </svg>
                                </td> -->
                                <td>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                    </svg>
                                </td>
                            </tr>

                            <tr>
                                <td class="tble-td-left">
                                    Contact segmentation (tags)
                                    <span>
                                        Use tags to prioritize your hottest leads and close more deals
                                    </span>
                                </td>
                                <td>

                                </td>
                                <!-- <td class="border-botheside">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                    </svg>
                                </td> -->
                                <td>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                    </svg>
                                </td>
                            </tr>

                            <tr>
                                <td class="tble-td-left">
                                    Contact lists, filters, and saved searches
                                    <span>
                                        Create custom lists within your contacts, filter your contacts easily, and send
                                        the right messages to the right contacts.
                                    </span>
                                </td>
                                <td>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                    </svg>
                                </td>
                                <!-- <td class="border-botheside">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                    </svg>
                                </td> -->
                                <td>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                    </svg>
                                </td>
                            </tr>

                            <tr>
                                <td class="tble-td-left">
                                    Custom fields
                                    <span>
                                        Store business-specific information on the contact or company record
                                    </span>
                                </td>
                                <td>
                                    <span class="td-value">100</span>
                                </td>
                                <!-- <td class="border-botheside">
                                    <span class="td-value">150</span>
                                </td> -->
                                <td>
                                    <span class="td-value">Unlimited</span>
                                </td>
                            </tr>

                            <tr>
                                <td class="tble-td-left">
                                    Lead source tracking
                                    <span>
                                        Easily segment leads based on where they came from so you know the sources of
                                        your most valuable clients
                                    </span>
                                </td>
                                <td>

                                </td>
                                <!-- <td class="border-botheside">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                    </svg>
                                </td> -->
                                <td>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                    </svg>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section><!-- End Features Section -->

    <section class="info-img">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-md-12">
                    <img src="{{asset('frontend/img/features-6.png')}}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->

@endsection
@section('scripts')


@endsection