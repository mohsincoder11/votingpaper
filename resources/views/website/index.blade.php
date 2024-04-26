

@extends('website.layout')
@section('content')
    <div class="banner-area slider-11">
        <div class="banner-shape">
            <img src="{{asset('public/website/assets/images/banner/1.png')}}" alt="Shape">

            <!-- <img class="animate__animated animate__fadeInUpBig" src="{{asset('public/website/assets/images/banner/banner-main.png')}}"
                alt="Banner"> -->
        </div>
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container" style="margin-bottom:150px;">
                    <div class="banner-content">
                        <h1 class="animate__animated animate__fadeInUp" style="font-size:47px;">Online Voting Software
                            System Application Platform</h1>
                        <h1 class="animate__animated animate__fadeInUp" style="font-size:20px;">Election | Survey |
                            Resolution Voting | AGM Meeting Voting</h1>
                        <p class="animate__animated animate__fadeInDown" style="font-size:16px;">We offer online voting
                            and election solutions for all kinds of Associations, Union, Club, Society, Council,
                            Political Party, School, HOA, AGM, Company Board Meeting, Corporate Resolution Voting, IRP &
                            CoC Meetings.</p>
                        <a class="common-btn" href="{{route('sign-in')}}">
                            Sign In
                            <i class="icofont-long-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="banner-area slider-12">
        <div class="banner-shape">
            <img src="{{asset('public/website/assets/images/banner/2.png')}}" alt="Shape">

            <!-- <img class="animate__animated animate__fadeInUpBig" src="{{asset('public/website/assets/images/banner/banner-main.png')}}"
                alt="Banner"> -->
        </div>
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="banner-content">
                        <h1 class="animate__animated animate__fadeInUp">Country And People Are Our Top Priority</h1>
                        <p class="animate__animated animate__fadeInDown">We invest in campaigns to enact reforms and
                            elect candidates so that the right leaders have the right incentives to solve our country's
                            greatest problems</p>
                        <a class="common-btn" href="#">
                            About Our Strategy
                            <i class="icofont-long-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="about-area two pt-100 pb-70" id="about">
        <div class="about-shape">
            <img src="{{asset('public/website/assets/images/about-shape1.png')}}" alt="Shape">
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-content">
                        <div class="section-title two" style="margin-bottom:0px;">
                            <span class="sub-title">About The Voting Paper</span>
                            <h2 style="font-size:32px;">India's 2nd Largest <span>E-Voting Organization</span></h2>
                            <p style="text-align: justify;">Online Voting System solution providers for elections of
                                HOA, Societies, Associations, Clubs, Educaional Institutions, Political Parties, and
                                Government Agencies. Completely secure with two step verification by OTP by SMS / Email.
                            </p>
                            <p style="text-align: justify;">Members can vote from mobile phones in just one click. No
                                Password, forgot password, reset password hassel. Voting enabled by EUVL (Enctypted
                                Unique Voting Link) which is highly secure. Anyone can vote from anywhere. Most
                                convenient, Economical and cost saving. Extremely useful in pandemic conditions where
                                mass gathering can be avoided.
                            </p>
                            <p style="text-align: justify;">To achieve excellence in providing secure and efficient
                                application and to create value for our clients.
                            </p>

                        </div>

                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="about-img">
                        <img src="{{asset('public/website/assets/images/about-1.png')}}" alt="About">

                    </div>
                </div>
            </div>

        </div>
    </div>
    <section class="team-area two ptb-50">
        <div class="container">
            <div class="section-title two">
                <!-- <span class="sub-title">Our Ideology</span> -->
                <h2 style="font-size: 42px;">Our Features</h2>

            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-4">
                    <div class="team-item">
                        <div class="top">
                            <img src="{{asset('public/website/assets/images/lock.png')}}" alt="Team" style="height:60px; width:60px;">

                        </div>
                        <div class="bottom">
                            <h3>Ultimate Secure Ballot</h3>
                            <span style="text-align: justify;">The multi layer secure features such as OTP, Unique Link
                                offers a high protection. The special key and password protection ensures ultimate
                                encryption to organization login for election configuration.</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="team-item">
                        <div class="top">
                            <img src="{{asset('public/website/assets/images/link.png')}}" alt="Team" style="height:60px; width:60px;">

                        </div>
                        <div class="bottom">
                            <h3>Unique link</h3>
                            <span style="text-align: justify;">An hash tagged unique link will be sent to all the voters
                                via Email/Phone to vote. This link will be valid only during the polling time and this
                                cannot be reused or duplicated by any means.</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="team-item">
                        <div class="top">
                            <img src="{{asset('public/website/assets/images/mobile-secure.png')}}" alt="Team" style="height:60px; width:60px;">

                        </div>
                        <div class="bottom">
                            <h3>Mobile secure</h3>
                            <span style="text-align: justify;">OTP will dynamically be generated and sent to the
                                elector's Mobile/Email at the time of voting. This ensures high secure ballot and
                                prevents any unauthorized attempt even if the email login was compromised.</span>
                        </div>
                    </div>
                </div>



            </div>
            <div class="row">

                <div class="col-sm-6 col-lg-4">
                    <div class="team-item">
                        <div class="top">
                            <img src="{{asset('public/website/assets/images/vote.png')}}" alt="Team" style="height:60px; width:60px;">

                        </div>
                        <div class="bottom">
                            <h3>Anonymous Voting</h3>
                            <span style="text-align: justify;">The voting data is stored using SHA2-512-bit encryption
                                and it is secure and protected. This cannot be retrieved and matched with any elector
                                and the secrecy of voting privilege is 100% protected.</span>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <div class="team-item">
                        <div class="top">
                            <img src="{{asset('public/website/assets/images/watch.png')}}" alt="Team" style="height:60px; width:60px;">

                        </div>
                        <div class="bottom">
                            <h3>Quick and Easy Steps</h3>
                            <span style="text-align: justify;">Organizations can easily conduct an election in 8 easy
                                steps. Set Options | Upload Member Data | Define Positions | Define Candidates |
                                Activate and Publish Election | View Results.</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="team-item">
                        <div class="top">
                            <img src="{{asset('public/website/assets/images/economical.png')}}" alt="Team" style="height:60px; width:60px;">

                        </div>
                        <div class="bottom">
                            <h3>Economical</h3>
                            <span style="text-align: justify;">Conducting an election is easy at unbelievable low cost,
                                this saves money for the Organization. It’s really inexpensive</span>
                        </div>
                    </div>
                </div>




            </div>
            <div class="row">

                <div class="col-sm-6 col-lg-4">
                    <div class="team-item">
                        <div class="top">
                            <img src="{{asset('public/website/assets/images/weight.png')}}" alt="Team" style="height:60px; width:60px;">

                        </div>
                        <div class="bottom">
                            <h3>Weighted Vote</h3>
                            <span style="text-align: justify;">Weighted voting is an system in which not all voters have
                                the same amount of influence over the outcome of an election. Instead votes of different
                                voters are given different weight.</span>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <div class="team-item">
                        <div class="top">
                            <img src="{{asset('public/website/assets/images/glass.png')}}" alt="Team" style="height:60px; width:60px;">

                        </div>
                        <div class="bottom">
                            <h3>Transparent Voting</h3>
                            <span style="text-align: justify;">This option enables transparent voting and reveals who
                                voted for who. When generating you will have the option of generating a detailed report
                                indicating the choice voted by each member. This option is legal and mandatory in
                                certain states and Goverment elections. However the transparent voting notification will
                                be displayed in all the ballot sheets so that the member is aware that this election is
                                tranparent election.</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="team-item">
                        <div class="top">
                            <img src="{{asset('public/website/assets/images/arrow.png')}}" alt="Team" style="height:60px; width:60px;">

                        </div>
                        <div class="bottom">
                            <h3>Random Candidates</h3>
                            <span style="text-align: justify;">This option enables random sequencing of candidates
                                appearing on the ballot sheet. The positions will appear on the order in which it is
                                entered during setup. The candidates will be randomly distributed such that every
                                candidate gets a fair chance of advantage over the listing for each position.</span>
                        </div>
                    </div>
                </div>




            </div>

        </div>
    </section>
    <!-- <section class="mission-area pb-70" id="demo" style="background-color: #F00041; padding-top:50px;">

        <div class="container">
            <div class="section-title">

                <h2 style="font-size: 42px; color: black;">Free Demo</h2>
               
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-2"></div>
                <div class="col-sm-6 col-lg-4">
                    <div class="mission-item">
                        <img src="{{asset('public/website/assets/images/banner/e-vote.png')}}" alt="Mission">
                        <div class="bottom">
                            <h3>
                                <a href="">Ballot Preview as Voting Member</a>
                            </h3>
                            <p>As a voting member you will get the polling link via email or mobile and cast your demo
                                vote. The prebuilt ballot will appear with demo positions and caidiates for which you
                                can vote and see results instantly. <br><br></p>
                            <a class="common-btn" href="">
                                Try Now
                                <i class="icofont-long-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="mission-item">
                        <img src="{{asset('public/website/assets/images/banner/e-vote-1.png')}}" alt="Mission">
                        <div class="bottom">
                            <h3>
                                <a href="">Free Full Function Admin Demo as Host</a>
                            </h3>
                            <p>Host a complete voting event for free as organization administrator. You can signup and
                                conduct an online election in simple steps. In this free demo, election admin can
                                conduct e-voting with all features enabled.</p>
                            <a class="common-btn" href="">
                                Try Now
                                <i class="icofont-long-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2"></div>
            </div>
        </div>
    </section> -->
   

    <div class="subscribe-area pt-100 pb-70">
        <div class="container">
            <div class="row align-items-center">
                
                <div class="col-lg-2"></div>
                <div class="col-lg-4">
                    <div class="subscribe-content">
                        <h2 style="font-size: 47px; margin-left:74px;">Call For Demo </h2>
                    </div>
                </div>
              
                <div class="col-lg-6">
                    <div class="subscribe-item">
                        <form class="newsletter-form" data-toggle="validator">
                            <!-- <input type="email" class="form-control" placeholder="Enter Your Email" name="EMAIL"
                                required autocomplete="off"> -->
                            <div class="subscribe-content">
                                <h2 style="font-size: 47px;">  +91 90123 45678</h2>
                            </div>
                            <!-- <button class="btn common-btn" type="submit">
                                +91 9012345678
                                <i class="icofont-long-arrow-right"></i>
                            </button> -->
                            <div id="validator-newsletter" class="form-result"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="ideology-area two pb-20" style="padding-top:50px;">
        <div class="container">
            <div class="section-title two">

                <h2 style="font-size:42px;">Our Services Industry</h2>
                <p>It works great for Charities, Non Profitable Organizations, Condo Owners, Credit Unions, Companies,
                    Associations, Home Owner Associations, Unions, Student Groups, Fraternities,High Schools, Colleges,
                    Universities, Unions, Municipalities, State Government, Political Groups</p>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="ideology-item">
                        <img src="{{asset('public/website/assets/images/service/club.png')}}" alt="Ideology">
                        <div class="bottom">
                            <h3>Clubs</h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="ideology-item">
                        <img src="{{asset('public/website/assets/images/service/ngo.png')}}" alt="Ideology">
                        <div class="bottom">
                            <h3>NGO</h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 offset-sm-3 offset-lg-0 col-lg-3">
                    <div class="ideology-item">
                        <img src="{{asset('public/website/assets/images/service/hoa.png')}}" alt="Ideology">
                        <div class="bottom">
                            <h3>Homeowners Association</h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 offset-sm-3 offset-lg-0 col-lg-3">
                    <div class="ideology-item">
                        <img src="{{asset('public/website/assets/images/service/union.png')}}" alt="Ideology">
                        <div class="bottom">
                            <h3>Associations & Unions</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="ideology-item">
                        <img src="{{asset('public/website/assets/images/service/camber.png')}}" alt="Ideology">
                        <div class="bottom">
                            <h3>Chambers and Societies</h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="ideology-item">
                        <img src="{{asset('public/website/assets/images/service/trust.png')}}" alt="Ideology">
                        <div class="bottom">
                            <h3 style="font-size:18px;">Trust & Educational Institutions</h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 offset-sm-3 offset-lg-0 col-lg-3">
                    <div class="ideology-item">
                        <img src="{{asset('public/website/assets/images/service/employee.png')}}" alt="Ideology">
                        <div class="bottom">
                            <h3>Employee Associations</h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 offset-sm-3 offset-lg-0 col-lg-3">
                    <div class="ideology-item">
                        <img src="{{asset('public/website/assets/images/service/corporate.png')}}" alt="Ideology">
                        <div class="bottom">
                            <h3>Corporate and Industry</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <div class="user-form-area" id="price">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="form-item">
                        <form>
                            <h2>Price Table</h2>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Center No. of Voting Members">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    
                                    <div class="form-group">
                                        <select id="cars" name="carlist" form="carform">
                                           
                                            <option value="saab">USD</option>
                                            <option value="opel">INR</option>
                                           
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-lg-12">
                                    <button type="submit" class="btn common-btn" style="background-color: white;">
                                        <span style="color:black;">Calculate</span>
                                        <span></span>
                                    </button>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                    
                </div>
            </div>
        </div>
        
    </div> -->
   
    <section class="team-area pb-100" id="client" style="margin-top:5%;">
        <div class="container">
            <div class="section-title two">

                <h2 style="font-size:42px;">Happy Clients</h2>

            </div>
            <div class="team-slider owl-theme owl-carousel">
                <div class="team-item">
                    <div class="top">
                        <img src="{{asset('public/website/assets/images/client-1.png')}}" alt="Team">


                    </div>

                </div>
                <div class="team-item">
                    <div class="top">
                        <img src="{{asset('public/website/assets/images/client-1.png')}}" alt="Team">

                    </div>

                </div>
                <div class="team-item">
                    <div class="top">
                        <img src="{{asset('public/website/assets/images/client-1.png')}}" alt="Team">

                    </div>

                </div>
                <div class="team-item">
                    <div class="top">
                        <img src="{{asset('public/website/assets/images/client-1.png')}}" alt="Team">

                    </div>

                </div>
            </div>
        </div>
    </section>


    <div class="donate-area two" style="padding-top:0px; padding-bottom:50px;">
        <div class="container">
            <div class="section-title two">
                <!-- <span class="sub-title">Join Us</span> -->
                <h2 style="font-size:42px;">Types of Elections</h2>

            </div>
            <div class="donate-wrap">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="donate-right">

                            <h3>Waterfall Elections</h3>
                            <p>In a waterfall election, you are electing multiple positions, say president, vice
                                president, secretary, and treasurer. The key difference from regular elections is that
                                people can run for more than one position. <br><br></p>
                            <a class="common-btn two" href="#">
                                Read More
                                <!-- <i class="icofont-download"></i> -->
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="donate-right">

                            <h3>E - Voting Manifesto 2023</h3>
                            <p>Imagine an online system where it is possible to vote using a computer, tablet, mobile
                                phone or a multimedia totem without the need for voters to physically access the polling
                                station, yet offering the same or better guarantees compared to a public election. </p>
                            <a class="common-btn two" href="#">
                                Read More
                                <!-- <i class="icofont-download"></i> -->
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top:2%;">
                    <div class="col-lg-6">
                        <div class="donate-right">

                            <h3>Waterfall Elections</h3>
                            <p>In a waterfall election, you are electing multiple positions, say president, vice
                                president, secretary, and treasurer. The key difference from regular elections is that
                                people can run for more than one position. <br><br></p>
                            <a class="common-btn two" href="#">
                                Read More
                                <!-- <i class="icofont-download"></i> -->
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="donate-right">

                            <h3>E - Voting Manifesto 2023</h3>
                            <p>Imagine an online system where it is possible to vote using a computer, tablet, mobile
                                phone or a multimedia totem without the need for voters to physically access the polling
                                station, yet offering the same or better guarantees compared to a public election. </p>
                            <a class="common-btn two" href="#">
                                Read More
                                <!-- <i class="icofont-download"></i> -->
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="election-area ptb-100">
        <div class="election-shape">
            <img src="{{asset('public/website/assets/images/about-shape1.png')}}" alt="Shape">
            <img src="{{asset('public/website/assets/images/about-shape1.png')}}" alt="Shape">
        </div>
        <div class="container">
            <h2>It's E - Voting day. Go Vote For Reverse Book Building!</h2>
        </div>
    </div> -->


    <section class="events-area two" id="work" style="padding-bottom: 31px; padding-top:60px;">
        <div class="container">
            <div class="section-title two">
                <!-- <span class="sub-title">Campaign</span> -->
                <h2 style="font-size:42px;"> How it Work</h2>
                <p>Secure voting helps to organize your election in fast and easy way. You can have your election up and
                    running in 5 minutes. Less work more turnout.</p>

            </div>
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="events-inner">
                        <ul class="align-items-center main-wrap">
                            <li>
                                <a href="">
                                    <img src="{{asset('public/website/assets/images/work/choose-plan.png')}}" alt="Events">
                                </a>
                            </li>
                            <li>
                                <ul class="align-items-center link-wrap">
                                    <li>
                                        <span>1</span>
                                    </li>
                                    <li>
                                        <h3>
                                             CHOOSE PLAN
                                        </h3>
                                    </li>
                                </ul>
                                <p>You can choose from plans and set election options to build and run election. Take a
                                    test drive here for your election.</p>
                            </li>
                        </ul>
                    </div>
                    <div class="events-inner">
                        <ul class="align-items-center main-wrap">
                            <li>
                                <a href="">
                                    <img src="{{asset('public/website/assets/images/work/upload-member.png')}}" alt="Events">
                                </a>
                            </li>
                            <li>
                                <ul class="align-items-center link-wrap">
                                    <li>
                                        <span>2</span>
                                    </li>
                                    <li>
                                        <h3>
                                           UPLOAD MEMBERS
                                        </h3>
                                    </li>
                                </ul>
                                <p>You can enter member/voter data manually or upload an excel sheet in xlsx, .xls or
                                    .csv format. Check prerequisite here.</p>
                            </li>
                        </ul>
                    </div>
                    <div class="events-inner">
                        <ul class="align-items-center main-wrap">
                            <li>
                                <a href="">
                                    <img src="{{asset('public/website/assets/images/work/define-position.png')}}" alt="Events">
                                </a>
                            </li>
                            <li>
                                <ul class="align-items-center link-wrap">
                                    <li>
                                        <span>3</span>
                                    </li>
                                    <li>
                                        <h3>
                                            DEFINE POSITIONS
                                        </h3>
                                    </li>
                                </ul>
                                <p>You can define positions and number of posts for the election.</p>
                            </li>
                        </ul>
                    </div>
                    <div class="events-inner">
                        <ul class="align-items-center main-wrap">
                            <li>
                                <a href="">
                                    <img src="{{asset('public/website/assets/images/work/add-candidate.png')}}" alt="Events">
                                </a>
                            </li>
                            <li>
                                <ul class="align-items-center link-wrap">
                                    <li>
                                        <span>4</span>
                                    </li>
                                    <li>
                                        <h3>
                                           ADD CANDIDATES
                                        </h3>
                                    </li>
                                </ul>
                                <p>You can define the candidates with name, symbol and photo for the corresponding
                                    post(s) and create the ballot.</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="events-inner">
                        <ul class="align-items-center main-wrap">
                            <li>
                                <a href="">
                                    <img src="{{asset('public/website/assets/images/work/make-payment.png')}}" alt="Events">
                                </a>
                            </li>
                            <li>
                                <ul class="align-items-center link-wrap">
                                    <li>
                                        <span>5</span>
                                    </li>
                                    <li>
                                        <h3>
                                         MAKE PAYMENT
                                        </h3>
                                    </li>
                                </ul>
                                <p>Payment for the election is done based on the number of members in member data. We
                                    offer promo codes for discount.</p>
                            </li>
                        </ul>
                    </div>
                    <div class="events-inner">
                        <ul class="align-items-center main-wrap">
                            <li>
                                <a href="">
                                    <img src="{{asset('public/website/assets/images/work/activate.png')}}" alt="Events">
                                </a>
                            </li>
                            <li>
                                <ul class="align-items-center link-wrap">
                                    <li>
                                        <span>6</span>
                                    </li>
                                    <li>
                                        <h3>
                                            ACTIVATE & PUBLISH
                                        </h3>
                                    </li>
                                </ul>
                                <p>You can set date, time and activate then send voting link to all the voters</p>
                            </li>
                        </ul>
                    </div>
                    <div class="events-inner">
                        <ul class="align-items-center main-wrap">
                            <li>
                                <a href="">
                                    <img src="{{asset('public/website/assets/images/work/voting-progress.png')}}" alt="Events">
                                </a>
                            </li>
                            <li>
                                <ul class="align-items-center link-wrap">
                                    <li>
                                        <span>7</span>
                                    </li>
                                    <li>
                                        <h3>
                                           VOTING PROGRESS
                                        </h3>
                                    </li>
                                </ul>
                                <p>Monitor the details of voted verses not voted members also resend unique voting link
                                    to any member.</p>
                            </li>
                        </ul>
                    </div>
                    <div class="events-inner">
                        <ul class="align-items-center main-wrap">
                            <li>
                                <a href="">
                                    <img src="{{asset('public/website/assets/images/work/result.png')}}" alt="Events">
                                </a>
                            </li>
                            <li>
                                <ul class="align-items-center link-wrap">
                                    <li>
                                        <span>8</span>
                                    </li>
                                    <li>
                                        <h3>
                                           GET RESULT
                                        </h3>
                                    </li>
                                </ul>
                                <p>Get your election results for resolutions and transparent voting enabled elections
                                    you can download detailed records by excel sheet.</p>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- <div class="help-page-area two" id="contact">
        <div class="container">
       
               
                <h2 style="font-size:42px; text-align: center;"> Contact us</h2>
              

          
            <div class="help-content">
                <form>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label> Name:</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Email Address:</label>
                                <input type="email" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="number" class="form-control">
                            </div>
                        </div>
                       
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Subject</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Message</label>
                                <textarea id="your-message" rows="4" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn common-btn">
                            Send Now
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div> -->
    <div class="event-details-area" id="price" style="background-color: #F00041; margin-bottom:4%;">
        <h2 style="text-align: center; color: white; padding-top:4%; font-size:42px;">Price Table</h2>
        <div class="container">
            <div class="row" style="padding-top:2%;">
                <div class="col-lg-4">
                    <div class="common-details-content" style="background-color:#005BB5;">
                        <h2 class=" font-color-1" style="text-align: center; font-size:22px;">SILVER PLAN</h2>
                        <p class=" font-color-1">Encrypted Unique Link by Email</p>
                        <p class=" font-color-1">On-campus Voting</p>
                        <p class=" font-color-1">Voting link request by voter</p>
                        <p class=" font-color-1">Voting Link Reminder </p>
                        <p class=" font-color-1">Random Candidates </p>
                        <p class=" font-color-1">Restricted IP Voting</p>
                        <p class=" font-color-1">Free Upto 25 Members</p>
                        <div class="flex-1">
                            <a class="right common-btn flex-1" href="{{route('sign-up')}}">Sign Up</a>
                        </div>
                    </div>



                </div>
                <div class="col-lg-4">
                    <div class="common-details-content" style="background-color:black;">
                        <h2 class=" font-color-1" style="text-align: center; font-size:22px;">GOLD PLAN</h2>
                        <p class=" font-color-1">Encrypted Unique Link by Email/Mobile </p>
                        <p class=" font-color-1">On-Campus Voting</p>
                        <p class=" font-color-1">Voting link request by voter</p>
                        <p class=" font-color-1">Multiple voting link reminder </p>
                        <p class=" font-color-1">Unique ballot link by Mobile </p>
                        <p class=" font-color-1">Random Listing of Candidates</p>
                        <p class=" font-color-1">Full Support Election Setup</p>

                        <p class=" font-color-1">Restricted IP Voting </p>
                        <p class=" font-color-1">Change Voted Choice </p>
                        <p class=" font-color-1">Free Upto 10 Members </p>
                        <div class="flex-1">
                            <a class="right common-btn flex-1" href="{{route('sign-up')}}">Sign Up</a>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4" style="background-color:blue;">
                    <div class="common-details-content">
                        <h2 class=" font-color-1" style="text-align: center; font-size:22px;">PLATINUM PLAN
                        </h2>
                        <p class=" font-color-1">Encrypted Unique Link by Email/Mobile</p>
                        <p class=" font-color-1">OTP Verification by Email/Mobile</p>
                        <p class=" font-color-1">On-Campus Voting</p>
                        <p class=" font-color-1">Voting link request by voter </p>
                        <p class=" font-color-1">Full Support Election Setup </p>
                        <p class=" font-color-1">Random Candidates</p>
                        <p class=" font-color-1">Who Voted Whom Report </p>

                        <p class=" font-color-1">Change Voted Choice </p>
                        <p class=" font-color-1">Restricted IP Voting </p>
                        <p class=" font-color-1">Basic Ack. by Text </p>

                        <p class=" font-color-1">Voted Ballot Ack. by Email </p>
                        <p class=" font-color-1">Walk-in Voting </p>
                        <p class=" font-color-1">Free Upto 5 Members</p>
                        <div class="flex-1">
                            <a class="right common-btn flex-1" href="{{route('sign-up')}}">Sign Up</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <footer class="footer-area two" style="padding-top:40px; background-color: #005BB5 !important;" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-1"></div>
                <div class="col-sm-6 col-lg-3">
                    <div class="footer-item">
                        <div class="footer-contact">
                            <h3>Address</h3>

                            <ul>
                                <li>
                                    <i class="icofont-location-pin"></i>
                                    <a href="#">{{env('ADDRESS')}}</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-1"></div>
                <div class="col-sm-6 col-lg-3">
                    <div class="footer-item">
                        <div class="footer-contact">
                            <h3>Contact us</h3>

                            <ul>

                                <li>
                                    <i class="icofont-ui-call"></i>

                                    <a href="tel:{{env('MOBILE')}}">{{env('MOBILE')}}</a>
                                </li>
                                <li>
                                    <i class="icofont-paper-plane"></i>
                                    <a href="#{{env('EMAIL')}}"><span class="__cf_email__"
                                            data-cfemail="deb6bbb2b2b19eaeb7b2a7f0bdb1b3">{{env('EMAIL')}}&#160;</span></a>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-1"></div>
                <div class="col-sm-6 col-lg-3">
                    <div class="footer-item">
                        <div class="footer-events">
                            <h3>Social Links</h3>
                            <div class="footer-item">
                                <div class="footer-logo"
                                    style="padding-right:179px; padding-left:0px; padding-top: 0px;">
                                    <!-- <a class="logo" href="{{route('home')}}">
                                        <img src="{{asset('public/website/assets/images/logo.png')}}" alt="Logo">
                                    </a> -->

                                    <ul>
                                        <li>
                                            <a href="{{env('FACEBOOK')}}" target="_blank">
                                                <!-- <i class="icofont-facebook"></i> -->
                                                <img src="{{asset('public/website/assets/images/7.png')}}" alt="" style="height:25px;">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{env('INSTAGRAM')}}" target="_blank">
                                                <!-- <i class="icofont-twitter"></i> -->
                                                <img src="{{asset('public/website/assets/images/4.png')}}" alt="" style="height:25px;">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{env('LINKEDIN')}}" target="_blank">
                                                <!-- <i class="icofont-twitter"></i> -->
                                                <img src="{{asset('public/website/assets/images/6.png')}}" alt="" style="height:22px;">
                                            </a>
                                        </li>
                                        <!-- <li>
                                            <a href="#" target="_blank">
                                                <i class="icofont-linkedin"></i>
                                            </a>
                                        </li> -->
                                        <!-- <li>
                                            <a href="#" target="_blank">
                                                <i class="icofont-youtube-play"></i>
                                            </a>
                                        </li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area two" style="margin-top:0px;">
            <div class="container">
                <p>Copyright
                    {{-- <script data-cfasync="false"
                        src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> --}}
                    {{date('Y')}} Voting Paper. All Right Reserved 
                </p>
            </div>
        </div>
    </footer>

  @stop