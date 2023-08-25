
<?= $this->extend('user/layouts/master') ?>

<?= $this->section('content') ?>

 <div class="th-hero-wrapper hero-slider-7 th-carousel" data-slide-show="1" data-md-slide-show="1" data-fade="true" data-dots="true" data-xl-dots="true" data-ml-dots="true" data-lg-dots="true">
      <div class="th-hero-slide">
        <div class="th-hero-bg" data-bg-src="<?=base_url('user/assets/img/hero/hero_bg_1_1.jpg')?>"><img src="<?=base_url('user/assets/img/hero/hero_overlay_1.png')?>" alt="Hero Image"></div>
        <div class="container">
          <div class="hero-style7"><span class="hero-subtitle" data-ani="slideinleft" data-ani-delay="0.1s">WELCOME TO TAXIAR</span>
            <h1 class="hero-title" data-ani="slideinleft" data-ani-delay="0.3s">The Best Way To Get Around Town.</h1>
            <p class="hero-text" data-ani="slideinleft" data-ani-delay="0.4s">Online taxi service is a convenient and affordable way to travel within a city or to nearby destinations. You can book a cab online through various platforms.</p>
            <div class="btn-group" data-ani="slideinleft" data-ani-delay="0.5s"><a href="about.html" class="th-btn style3">Discover More <i class="fa-regular fa-arrow-right"></i></a></div>
          </div>
        </div>
      </div>
      <div class="th-hero-slide">
        <div class="th-hero-bg" data-bg-src="<?=base_url('user/assets/img/hero/hero_bg_1_2.jpg')?>"><img src="<?=base_url('user/assets/img/hero/hero_overlay_1.png')?>" alt="Hero Image"></div>
        <div class="container">
          <div class="hero-style7"><span class="hero-subtitle" data-ani="slideinleft" data-ani-delay="0.1s">Taxi Driver for Hire</span>
            <h1 class="hero-title" data-ani="slideinleft" data-ani-delay="0.3s">Need a Ride? Call us anytime!</h1>
            <p class="hero-text" data-ani="slideinleft" data-ani-delay="0.4s">Online taxi service is a convenient and affordable way to travel within a city or to nearby destinations. You can book a cab online through various platforms.</p>
            <div class="btn-group" data-ani="slideinleft" data-ani-delay="0.5s"><a href="about.html" class="th-btn style3">Discover More <i class="fa-regular fa-arrow-right"></i></a></div>
          </div>
        </div>
      </div>
      <div class="th-hero-slide">
        <div class="th-hero-bg" data-bg-src="<?=base_url('user/assets/img/hero/hero_bg_1_3.jpg')?>"><img src="<?=base_url('user/assets/img/hero/hero_overlay_1.png')?>" alt="Hero Image"></div>
        <div class="container">
          <div class="hero-style7"><span class="hero-subtitle" data-ani="slideinleft" data-ani-delay="0.1s">24/7 Online Taxi Booking Service</span>
            <h1 class="hero-title" data-ani="slideinleft" data-ani-delay="0.3s">A different kind of taxi company</h1>
            <p class="hero-text" data-ani="slideinleft" data-ani-delay="0.4s">Online taxi service is a convenient and affordable way to travel within a city or to nearby destinations. You can book a cab online.</p>
            <div class="btn-group" data-ani="slideinleft" data-ani-delay="0.5s"><a href="about.html" class="th-btn style3">Discover More <i class="fa-regular fa-arrow-right"></i></a></div>
          </div>
        </div>
      </div>
    </div>
    <div class="booking-section">
      <div class="container">
        <form action="https://themeholy.com/html/taxiar/demo/mail.php" method="POST" class="booking-form ajax-contact wow fadeInUp">
          <div class="input-wrap">
            <div class="row">
              <div class="form-group col-xl-3 col-lg-4 col-sm-6"><input type="text" class="form-control" name="name" id="name" placeholder="Your Name"><i class="fa-light fa-user"></i></div>
              <div class="form-group col-xl-3 col-lg-4 col-sm-6"><input type="number" class="form-control" name="phone" id="phone" placeholder="Phone Number"><i class="fa-light fa-phone-rotary"></i></div>
              <div class="form-group col-xl-3 col-lg-4 col-sm-6"><select name="passenger" id="passenger" class="form-select nice-select">
                  <option value="" disabled="disabled" selected="selected" hidden>passenger</option>
                  <option value="passenger1">passenger 1</option>
                  <option value="passenger2">passenger 2</option>
                  <option value="passenger3">passenger 3</option>
                  <option value="passenger4">passenger 4</option>
                </select></div>
              <div class="form-group col-xl-3 col-lg-4 col-sm-6"><input type="text" class="form-control" name="s-destination" id="s-destination" placeholder="Start Destination"><i class="fa-sharp fa-regular fa-location-dot"></i></div>
              <div class="form-group col-xl-3 col-lg-4 col-sm-6"><input type="text" class="form-control" name="e-destination" id="e-destination" placeholder="End Destination"><i class="fa-sharp fa-regular fa-location-dot"></i></div>
              <div class="form-group col-xl-3 col-lg-4 col-sm-6"><input type="text" class="date-pick form-control" name="date" id="date-pick" placeholder="Select Date"><i class="fa-light fa-calendar-days"></i></div>
              <div class="form-group col-xl-3 col-lg-4 col-sm-6"><input type="text" class="time-pick form-control" name="time" id="time-pick" placeholder="Select Time"><i class="fa-light fa-clock"></i></div>
              <div class="form-btn col-xl-3 col-lg-4 col-sm-6"><button class="th-btn">Book Taxi Now <i class="fa-regular fa-arrow-right"></i></button></div>
            </div>
            <p class="form-messages mb-0 mt-3"></p>
          </div>
        </form>
      </div>
    </div>
    <div class="space" id="about-sec">
      <div class="container">
        <div class="row">
          <div class="col-xl-6 mb-5 mb-xl-0">
            <div class="img-box7 wow fadeInLeft">
              <div class="img1"><img src="<?=base_url('user/assets/img/normal/about_1_1.jpg')?>" alt="About"></div>
              <div class="img2"><img src="<?=base_url('user/assets/img/normal/about_1_2.jpg')?>" alt="About"></div>
              <div class="journey-box">
                <h3 class="journey-title">Started Journey</h3><span class="journey-year">1986</span>
              </div>
            </div>
          </div>
          <div class="col-xl-6">
            <div class="ps-xxl-5 ms-xl-4 wow fadeInRight">
              <div class="title-area mb-20"><span class="sub-title">ABOUT OUR COMPANY</span>
                <h2 class="sec-title">Wherever You Need To Go We'll Take You There.</h2>
              </div>
              <p class="mb-30">Authoritatively simplify open-source resources via backend visualize business e-markets before parallel convergence optimize sticky and idea-sharing rather than unique solutions.</p>
              <div class="journey-wrap style2">
                <div class="journey-image"><img src="<?=base_url('user/assets/img/normal/map.jpg')?>" alt=""></div>
                <div class="checklist">
                  <ul>
                    <li>Easy & Emergency Solutions Anytime</li>
                    <li>Getting Affordable price upto 2 years</li>
                    <li>More Reliable & Experienced Teams</li>
                  </ul>
                </div>
              </div><a href="about.html" class="th-btn"><span class="btn-text">Discover More<i class="fa-regular fa-arrow-right ms-2"></i></span></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <section class="ser-area bg-smoke overflow-hidden space">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-8 col-xl-6">
            <div class="title-area text-center text-lg-start"><span class="sub-title">Our Services</span>
              <h2 class="sec-title">Best Taxi Services For You</h2>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="sec-btn">
              <div class="icon-box"><button data-slick-prev="#serviceSlide" class="slick-arrow default"><i class="far fa-arrow-left"></i></button><button data-slick-next="#serviceSlide" class="slick-arrow default"><i class="far fa-arrow-right"></i></button></div>
            </div>
          </div>
        </div>
        <div class="row slider-shadow th-carousel" id="serviceSlide" data-slide-show="3" data-lg-slide-show="3" data-md-slide-show="2" data-sm-slide-show="1" data-xs-slide-show="1">
          <div class="col-md-6 col-lg-4 col-xl-3">
            <div class="service-item wow fadeInUp" data-bg-src="<?=base_url('user/assets/img/service/service_shape_1.jpg')?>">
              <div class="service-item_img"><img src="<?=base_url('user/assets/img/service/service-6-1.jpg')?>" alt="service image"></div>
              <div class="service-item_content">
                <h3 class="service-item_title"><a href="service-details.html">Rapid City Transfer</a></h3>
                <p class="service-item_text">Rapid city transfer is a term used by some taxi or cab services to describe their service of bringing.</p><a href="service-details.html" class="line-btn">Learn More<i class="fa-regular fa-arrow-right ms-2"></i></a>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 col-xl-3">
            <div class="service-item wow fadeInUp" data-bg-src="<?=base_url('user/assets/img/service/service_shape_1.jpg')?>">
              <div class="service-item_img"><img src="<?=base_url('user/assets/img/service/service-6-2.jpg')?>" alt="service image"></div>
              <div class="service-item_content">
                <h3 class="service-item_title"><a href="service-details.html">Online Booking</a></h3>
                <p class="service-item_text">Online taxi service is a convenient and affordable way to travel within a city or to nearby destinations.</p><a href="service-details.html" class="line-btn">Learn More<i class="fa-regular fa-arrow-right ms-2"></i></a>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 col-xl-3">
            <div class="service-item wow fadeInUp" data-bg-src="<?=base_url('user/assets/img/service/service_shape_1.jpg')?>">
              <div class="service-item_img"><img src="<?=base_url('user/assets/img/service/service-6-3.jpg')?>" alt="service image"></div>
              <div class="service-item_content">
                <h3 class="service-item_title"><a href="service-details.html">Airport Transport</a></h3>
                <p class="service-item_text">It can include different types of vehicles, such as taxis, car hire, airport transfers, airport shuttles, airport buses, etc.</p><a href="service-details.html" class="line-btn">Learn More<i class="fa-regular fa-arrow-right ms-2"></i></a>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 col-xl-3">
            <div class="service-item wow fadeInUp" data-bg-src="<?=base_url('user/assets/img/service/service_shape_1.jpg')?>">
              <div class="service-item_img"><img src="<?=base_url('user/assets/img/service/service-6-4.jpg')?>" alt="service image"></div>
              <div class="service-item_content">
                <h3 class="service-item_title"><a href="service-details.html">Business Transport</a></h3>
                <p class="service-item_text">Business transport refers to the transportation services and methods used by businesses to move goods, equipment.</p><a href="service-details.html" class="line-btn">Learn More<i class="fa-regular fa-arrow-right ms-2"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="shape-mockup d-none d-xxl-block" data-top="0%" data-right="-0.5%"><img src="<?=base_url('user/assets/img/normal/service_shape_1.png')?>" alt="shapes"></div>
    </section>
    <section class="space">
      <div class="container">
        <div class="title-area text-center"><span class="sub-title">Team Members<span class="double-line"></span></span>
          <h2 class="sec-title">Our Expert Drivers</h2>
        </div>
        <div class="row slider-shadow th-carousel" data-slide-show="4" data-lg-slide-show="3" data-md-slide-show="2" data-sm-slide-show="2" data-arrows="true">
          <div class="col-md-6 col-lg-4">
            <div class="team-item wow fadeInUp">
              <div class="team-img"><img src="<?=base_url('user/assets/img/team/team_1_1.jpg')?>" alt="Team"></div>
              <div class="team-item_content">
                <h3 class="team-item_title"><a href="team-details.html">Sophia Isabella</a></h3><span class="team-item_desig">Expert Driver</span>
                <div class="th-social team-social"><a target="_blank" href="https://facebook.com/"><i class="fab fa-facebook-f"></i></a><a target="_blank" href="https://twitter.com/"><i class="fab fa-twitter"></i></a><a target="_blank" href="https://instagram.com/"><i class="fab fa-instagram"></i></a><a target="_blank" href="https://google.com/"><i class="fa-brands fa-linkedin-in"></i></a></div>
              </div>
              <div class="info-item">
                <h3 class="team-item_title"><a href="team-details.html">Sophia Isabella</a></h3><span class="team-item_desig">Expert Driver</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="team-item wow fadeInUp">
              <div class="team-img"><img src="<?=base_url('user/assets/img/team/team_1_2.jpg')?>" alt="Team"></div>
              <div class="team-item_content">
                <h3 class="team-item_title"><a href="team-details.html">Emma Margaret</a></h3><span class="team-item_desig">Senior Driver</span>
                <div class="th-social team-social"><a target="_blank" href="https://facebook.com/"><i class="fab fa-facebook-f"></i></a><a target="_blank" href="https://twitter.com/"><i class="fab fa-twitter"></i></a><a target="_blank" href="https://instagram.com/"><i class="fab fa-instagram"></i></a><a target="_blank" href="https://google.com/"><i class="fa-brands fa-linkedin-in"></i></a></div>
              </div>
              <div class="info-item">
                <h3 class="team-item_title"><a href="team-details.html">Emma Margaret</a></h3><span class="team-item_desig">Senior Driver</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="team-item wow fadeInUp">
              <div class="team-img"><img src="<?=base_url('user/assets/img/team/team_1_3.jpg')?>" alt="Team"></div>
              <div class="team-item_content">
                <h3 class="team-item_title"><a href="team-details.html">Jacob Michael</a></h3><span class="team-item_desig">Junior Driver</span>
                <div class="th-social team-social"><a target="_blank" href="https://facebook.com/"><i class="fab fa-facebook-f"></i></a><a target="_blank" href="https://twitter.com/"><i class="fab fa-twitter"></i></a><a target="_blank" href="https://instagram.com/"><i class="fab fa-instagram"></i></a><a target="_blank" href="https://google.com/"><i class="fa-brands fa-linkedin-in"></i></a></div>
              </div>
              <div class="info-item">
                <h3 class="team-item_title"><a href="team-details.html">Jacob Michael</a></h3><span class="team-item_desig">Junior Driver</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="team-item wow fadeInUp">
              <div class="team-img"><img src="<?=base_url('user/assets/img/team/team_1_4.jpg')?>" alt="Team"></div>
              <div class="team-item_content">
                <h3 class="team-item_title"><a href="team-details.html">Mason Robert</a></h3><span class="team-item_desig">Senior Driver</span>
                <div class="th-social team-social"><a target="_blank" href="https://facebook.com/"><i class="fab fa-facebook-f"></i></a><a target="_blank" href="https://twitter.com/"><i class="fab fa-twitter"></i></a><a target="_blank" href="https://instagram.com/"><i class="fab fa-instagram"></i></a><a target="_blank" href="https://google.com/"><i class="fa-brands fa-linkedin-in"></i></a></div>
              </div>
              <div class="info-item">
                <h3 class="team-item_title"><a href="team-details.html">Mason Robert</a></h3><span class="team-item_desig">Senior Driver</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="team-item wow fadeInUp">
              <div class="team-img"><img src="<?=base_url('user/assets/img/team/team_1_5.jpg')?>" alt="Team"></div>
              <div class="team-item_content">
                <h3 class="team-item_title"><a href="team-details.html">Danial Danhola</a></h3><span class="team-item_desig">Junior Driver</span>
                <div class="th-social team-social"><a target="_blank" href="https://facebook.com/"><i class="fab fa-facebook-f"></i></a><a target="_blank" href="https://twitter.com/"><i class="fab fa-twitter"></i></a><a target="_blank" href="https://instagram.com/"><i class="fab fa-instagram"></i></a><a target="_blank" href="https://google.com/"><i class="fa-brands fa-linkedin-in"></i></a></div>
              </div>
              <div class="info-item">
                <h3 class="team-item_title"><a href="team-details.html">Danial Danhola</a></h3><span class="team-item_desig">Junior Driver</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="bg-top-center space" data-bg-src="<?=base_url('user/assets/img/bg/taxi_bg_2.jpg')?>">
      <div class="container">
        <div class="title-area text-center"><span class="sub-title">Our Taxi<span class="double-line"></span></span>
          <h2 class="sec-title text-white text-capitalize">Choose Our Taxi Collection</h2>
        </div>
        <div class="nav tab-menu4 style2" id="tab-menu4" role="tablist"><button class="active" id="nav-one-tab" data-bs-toggle="tab" data-bs-target="#nav-one" type="button" role="tab" aria-controls="nav-one" aria-selected="true">Town Taxi</button><button class="" id="nav-two-tab" data-bs-toggle="tab" data-bs-target="#nav-two" type="button" role="tab" aria-controls="nav-two" aria-selected="false">Limousine Taxi</button><button class="" id="nav-three-tab" data-bs-toggle="tab" data-bs-target="#nav-three" type="button" role="tab" aria-controls="nav-three" aria-selected="false">Hybrid Taxi</button></div>
        <div class="tab-content">
          <div class="tab-pane fade show active" id="nav-one" role="tabpanel" aria-labelledby="nav-one-tab">
            <div class="row slider-shadow th-carousel" data-slide-show="3" data-lg-slide-show="2" data-md-slide-show="2" data-arrows="true">
              <div class="col-auto">
                <div class="taxi-item wow fadeInUp">
                  <div class="taxi-item_img"><img src="<?=base_url('user/assets/img/taxi/taxi_1_1.png')?>" alt="service image"></div>
                  <h3 class="taxi-item_title"><a href="taxi-details.html">BMW X6 2023</a></h3>
                  <p class="taxi-item_subtitle">$0.85/km</p>
                  <div class="taxi-item_feature"><span><img src="<?=base_url('user/assets/img/icon/taxi_f_2_1.svg')?>" alt="">Passengers</span><span class="taxi-item_info">4</span></div>
                  <div class="taxi-item_feature"><span><img src="<?=base_url('user/assets/img/icon/taxi_f_2_2.svg')?>" alt="">Luggage's:</span><span class="taxi-item_info">2</span></div>
                  <div class="taxi-item_feature"><span><img src="<?=base_url('user/assets/img/icon/taxi_f_2_3.svg')?>" alt="">Base Rate:</span><span class="taxi-item_info">$10.50</span></div>
                  <div class="taxi-item_feature"><span><img src="<?=base_url('user/assets/img/icon/taxi_f_2_4.svg')?>" alt="">Air Conditioner:</span><span class="taxi-item_info">yes</span></div><a href="taxi-details.html" class="th-btn fw-btn">book Now Taxi<i class="fa-regular fa-arrow-right ms-2"></i></a>
                </div>
              </div>
              <div class="col-auto">
                <div class="taxi-item wow fadeInDown">
                  <div class="taxi-item_img"><img src="<?=base_url('user/assets/img/taxi/taxi_1_2.png')?>" alt="service image"></div>
                  <h3 class="taxi-item_title"><a href="taxi-details.html">BMW M7 2024</a></h3>
                  <p class="taxi-item_subtitle">$0.75/km</p>
                  <div class="taxi-item_feature"><span><img src="<?=base_url('user/assets/img/icon/taxi_f_2_1.svg')?>" alt="">Passengers</span><span class="taxi-item_info">4</span></div>
                  <div class="taxi-item_feature"><span><img src="<?=base_url('user/assets/img/icon/taxi_f_2_2.svg')?>" alt="">Luggage's:</span><span class="taxi-item_info">2</span></div>
                  <div class="taxi-item_feature"><span><img src="<?=base_url('user/assets/img/icon/taxi_f_2_3.svg')?>" alt="">Base Rate:</span><span class="taxi-item_info">$10.50</span></div>
                  <div class="taxi-item_feature"><span><img src="<?=base_url('user/assets/img/icon/taxi_f_2_4.svg')?>" alt="">Air Conditioner:</span><span class="taxi-item_info">yes</span></div><a href="taxi-details.html" class="th-btn fw-btn">book Now Taxi<i class="fa-regular fa-arrow-right ms-2"></i></a>
                </div>
              </div>
              <div class="col-auto">
                <div class="taxi-item wow fadeInUp">
                  <div class="taxi-item_img"><img src="<?=base_url('user/assets/img/taxi/taxi_5_1.png')?>" alt="service image"></div>
                  <h3 class="taxi-item_title"><a href="taxi-details.html">BMW A5 2025</a></h3>
                  <p class="taxi-item_subtitle">$0.95/km</p>
                  <div class="taxi-item_feature"><span><img src="<?=base_url('user/assets/img/icon/taxi_f_2_1.svg')?>" alt="">Passengers</span><span class="taxi-item_info">4</span></div>
                  <div class="taxi-item_feature"><span><img src="<?=base_url('user/assets/img/icon/taxi_f_2_2.svg')?>" alt="">Luggage's:</span><span class="taxi-item_info">2</span></div>
                  <div class="taxi-item_feature"><span><img src="<?=base_url('user/assets/img/icon/taxi_f_2_3.svg')?>" alt="">Base Rate:</span><span class="taxi-item_info">$10.50</span></div>
                  <div class="taxi-item_feature"><span><img src="<?=base_url('user/assets/img/icon/taxi_f_2_4.svg')?>" alt="">Air Conditioner:</span><span class="taxi-item_info">yes</span></div><a href="taxi-details.html" class="th-btn fw-btn">book Now Taxi<i class="fa-regular fa-arrow-right ms-2"></i></a>
                </div>
              </div>
              <div class="col-auto">
                <div class="taxi-item wow fadeInDown">
                  <div class="taxi-item_img"><img src="<?=base_url('user/assets/img/taxi/taxi_1_3.png')?>" alt="service image"></div>
                  <h3 class="taxi-item_title"><a href="taxi-details.html">BMW A5 2026</a></h3>
                  <p class="taxi-item_subtitle">$0.65/km</p>
                  <div class="taxi-item_feature"><span><img src="<?=base_url('user/assets/img/icon/taxi_f_2_1.svg')?>" alt="">Passengers</span><span class="taxi-item_info">4</span></div>
                  <div class="taxi-item_feature"><span><img src="<?=base_url('user/assets/img/icon/taxi_f_2_2.svg')?>" alt="">Luggage's:</span><span class="taxi-item_info">2</span></div>
                  <div class="taxi-item_feature"><span><img src="<?=base_url('user/assets/img/icon/taxi_f_2_3.svg')?>" alt="">Base Rate:</span><span class="taxi-item_info">$10.50</span></div>
                  <div class="taxi-item_feature"><span><img src="<?=base_url('user/assets/img/icon/taxi_f_2_4.svg')?>" alt="">Air Conditioner:</span><span class="taxi-item_info">yes</span></div><a href="taxi-details.html" class="th-btn fw-btn">book Now Taxi<i class="fa-regular fa-arrow-right ms-2"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-two" role="tabpanel" aria-labelledby="nav-two-tab">
            <div class="row slider-shadow th-carousel" data-slide-show="3" data-lg-slide-show="2" data-md-slide-show="2" data-arrows="true">
              <div class="col-auto">
                <div class="taxi-item">
                  <div class="taxi-item_img"><img src="<?=base_url('user/assets/img/taxi/taxi_1_3.png')?>" alt="service image"></div>
                  <h3 class="taxi-item_title"><a href="taxi-details.html">BMW X6 2027</a></h3>
                  <p class="taxi-item_subtitle">$0.76/km</p>
                  <div class="taxi-item_feature"><span><img src="<?=base_url('user/assets/img/icon/taxi_f_2_1.svg')?>" alt="">Passengers</span><span class="taxi-item_info">4</span></div>
                  <div class="taxi-item_feature"><span><img src="<?=base_url('user/assets/img/icon/taxi_f_2_2.svg')?>" alt="">Luggage's:</span><span class="taxi-item_info">2</span></div>
                  <div class="taxi-item_feature"><span><img src="<?=base_url('user/assets/img/icon/taxi_f_2_3.svg')?>" alt="">Base Rate:</span><span class="taxi-item_info">$10.50</span></div>
                  <div class="taxi-item_feature"><span><img src="<?=base_url('user/assets/img/icon/taxi_f_2_4.svg')?>" alt="">Air Conditioner:</span><span class="taxi-item_info">yes</span></div><a href="taxi-details.html" class="th-btn fw-btn">book Now Taxi<i class="fa-regular fa-arrow-right ms-2"></i></a>
                </div>
              </div>
              <div class="col-auto">
                <div class="taxi-item">
                  <div class="taxi-item_img"><img src="<?=base_url('user/assets/img/taxi/taxi_1_4.png')?>" alt="service image"></div>
                  <h3 class="taxi-item_title"><a href="taxi-details.html">BMW M7 2028</a></h3>
                  <p class="taxi-item_subtitle">$0.78/km</p>
                  <div class="taxi-item_feature"><span><img src="<?=base_url('user/assets/img/icon/taxi_f_2_1.svg')?>" alt="">Passengers</span><span class="taxi-item_info">4</span></div>
                  <div class="taxi-item_feature"><span><img src="<?=base_url('user/assets/img/icon/taxi_f_2_2.svg')?>" alt="">Luggage's:</span><span class="taxi-item_info">2</span></div>
                  <div class="taxi-item_feature"><span><img src="<?=base_url('user/assets/img/icon/taxi_f_2_3.svg')?>" alt="">Base Rate:</span><span class="taxi-item_info">$10.50</span></div>
                  <div class="taxi-item_feature"><span><img src="<?=base_url('user/assets/img/icon/taxi_f_2_4.svg')?>" alt="">Air Conditioner:</span><span class="taxi-item_info">yes</span></div><a href="taxi-details.html" class="th-btn fw-btn">book Now Taxi<i class="fa-regular fa-arrow-right ms-2"></i></a>
                </div>
              </div>
              <div class="col-auto">
                <div class="taxi-item">
                  <div class="taxi-item_img"><img src="<?=base_url('user/assets/img/taxi/taxi_1_5.png')?>" alt="service image"></div>
                  <h3 class="taxi-item_title"><a href="taxi-details.html">BMW A5 2029</a></h3>
                  <p class="taxi-item_subtitle">$0.99/km</p>
                  <div class="taxi-item_feature"><span><img src="<?=base_url('user/assets/img/icon/taxi_f_2_1.svg')?>" alt="">Passengers</span><span class="taxi-item_info">4</span></div>
                  <div class="taxi-item_feature"><span><img src="<?=base_url('user/assets/img/icon/taxi_f_2_2.svg')?>" alt="">Luggage's:</span><span class="taxi-item_info">2</span></div>
                  <div class="taxi-item_feature"><span><img src="<?=base_url('user/assets/img/icon/taxi_f_2_3.svg')?>" alt="">Base Rate:</span><span class="taxi-item_info">$10.50</span></div>
                  <div class="taxi-item_feature"><span><img src="<?=base_url('user/assets/img/icon/taxi_f_2_4.svg')?>" alt="">Air Conditioner:</span><span class="taxi-item_info">yes</span></div><a href="taxi-details.html" class="th-btn fw-btn">book Now Taxi<i class="fa-regular fa-arrow-right ms-2"></i></a>
                </div>
              </div>
              <div class="col-auto">
                <div class="taxi-item">
                  <div class="taxi-item_img"><img src="<?=base_url('user/assets/img/taxi/taxi_5_1.png')?>" alt="service image"></div>
                  <h3 class="taxi-item_title"><a href="taxi-details.html">BMW A5 2031</a></h3>
                  <p class="taxi-item_subtitle">$0.68/km</p>
                  <div class="taxi-item_feature"><span><img src="<?=base_url('user/assets/img/icon/taxi_f_2_1.svg')?>" alt="">Passengers</span><span class="taxi-item_info">4</span></div>
                  <div class="taxi-item_feature"><span><img src="<?=base_url('user/assets/img/icon/taxi_f_2_2.svg')?>" alt="">Luggage's:</span><span class="taxi-item_info">2</span></div>
                  <div class="taxi-item_feature"><span><img src="<?=base_url('user/assets/img/icon/taxi_f_2_3.svg')?>" alt="">Base Rate:</span><span class="taxi-item_info">$10.50</span></div>
                  <div class="taxi-item_feature"><span><img src="<?=base_url('user/assets/img/icon/taxi_f_2_4.svg')?>" alt="">Air Conditioner:</span><span class="taxi-item_info">yes</span></div><a href="taxi-details.html" class="th-btn fw-btn">book Now Taxi<i class="fa-regular fa-arrow-right ms-2"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-three" role="tabpanel" aria-labelledby="nav-three-tab">
            <div class="row slider-shadow th-carousel" data-slide-show="3" data-lg-slide-show="2" data-md-slide-show="2" data-arrows="true">
              <div class="col-auto">
                <div class="taxi-item">
                  <div class="taxi-item_img"><img src="<?=base_url('user/assets/img/taxi/taxi_1_1.png')?>" alt="service image"></div>
                  <h3 class="taxi-item_title"><a href="taxi-details.html">BMW X6 2030</a></h3>
                  <p class="taxi-item_subtitle">$0.88/km</p>
                  <div class="taxi-item_feature"><span><img src="<?=base_url('user/assets/img/icon/taxi_f_2_1.svg')?>" alt="">Passengers</span><span class="taxi-item_info">4</span></div>
                  <div class="taxi-item_feature"><span><img src="<?=base_url('user/assets/img/icon/taxi_f_2_2.svg')?>" alt="">Luggage's:</span><span class="taxi-item_info">2</span></div>
                  <div class="taxi-item_feature"><span><img src="<?=base_url('user/assets/img/icon/taxi_f_2_3.svg')?>" alt="">Base Rate:</span><span class="taxi-item_info">$10.50</span></div>
                  <div class="taxi-item_feature"><span><img src="<?=base_url('user/assets/img/icon/taxi_f_2_4.svg')?>" alt="">Air Conditioner:</span><span class="taxi-item_info">yes</span></div><a href="taxi-details.html" class="th-btn fw-btn">book Now Taxi<i class="fa-regular fa-arrow-right ms-2"></i></a>
                </div>
              </div>
              <div class="col-auto">
                <div class="taxi-item">
                  <div class="taxi-item_img"><img src="<?=base_url('user/assets/img/taxi/taxi_1_4.png')?>" alt="service image"></div>
                  <h3 class="taxi-item_title"><a href="taxi-details.html">BMW M7 2031</a></h3>
                  <p class="taxi-item_subtitle">$0.95/km</p>
                  <div class="taxi-item_feature"><span><img src="<?=base_url('user/assets/img/icon/taxi_f_2_1.svg')?>" alt="">Passengers</span><span class="taxi-item_info">4</span></div>
                  <div class="taxi-item_feature"><span><img src="<?=base_url('user/assets/img/icon/taxi_f_2_2.svg')?>" alt="">Luggage's:</span><span class="taxi-item_info">2</span></div>
                  <div class="taxi-item_feature"><span><img src="<?=base_url('user/assets/img/icon/taxi_f_2_3.svg')?>" alt="">Base Rate:</span><span class="taxi-item_info">$10.50</span></div>
                  <div class="taxi-item_feature"><span><img src="<?=base_url('user/assets/img/icon/taxi_f_2_4.svg')?>" alt="">Air Conditioner:</span><span class="taxi-item_info">yes</span></div><a href="taxi-details.html" class="th-btn fw-btn">book Now Taxi<i class="fa-regular fa-arrow-right ms-2"></i></a>
                </div>
              </div>
              <div class="col-auto">
                <div class="taxi-item">
                  <div class="taxi-item_img"><img src="<?=base_url('user/assets/img/taxi/taxi_1_3.png')?>" alt="service image"></div>
                  <h3 class="taxi-item_title"><a href="taxi-details.html">BMW A5 2035</a></h3>
                  <p class="taxi-item_subtitle">$0.89/km</p>
                  <div class="taxi-item_feature"><span><img src="<?=base_url('user/assets/img/icon/taxi_f_2_1.svg')?>" alt="">Passengers</span><span class="taxi-item_info">4</span></div>
                  <div class="taxi-item_feature"><span><img src="<?=base_url('user/assets/img/icon/taxi_f_2_2.svg')?>" alt="">Luggage's:</span><span class="taxi-item_info">2</span></div>
                  <div class="taxi-item_feature"><span><img src="<?=base_url('user/assets/img/icon/taxi_f_2_3.svg')?>" alt="">Base Rate:</span><span class="taxi-item_info">$10.50</span></div>
                  <div class="taxi-item_feature"><span><img src="<?=base_url('user/assets/img/icon/taxi_f_2_4.svg')?>" alt="">Air Conditioner:</span><span class="taxi-item_info">yes</span></div><a href="taxi-details.html" class="th-btn fw-btn">book Now Taxi<i class="fa-regular fa-arrow-right ms-2"></i></a>
                </div>
              </div>
              <div class="col-auto">
                <div class="taxi-item">
                  <div class="taxi-item_img"><img src="<?=base_url('user/assets/img/taxi/taxi_1_5.png')?>" alt="service image"></div>
                  <h3 class="taxi-item_title"><a href="taxi-details.html">BMW A5 2036</a></h3>
                  <p class="taxi-item_subtitle">$0.93/km</p>
                  <div class="taxi-item_feature"><span><img src="<?=base_url('user/assets/img/icon/taxi_f_2_1.svg')?>" alt="">Passengers</span><span class="taxi-item_info">4</span></div>
                  <div class="taxi-item_feature"><span><img src="<?=base_url('user/assets/img/icon/taxi_f_2_2.svg')?>" alt="">Luggage's:</span><span class="taxi-item_info">2</span></div>
                  <div class="taxi-item_feature"><span><img src="<?=base_url('user/assets/img/icon/taxi_f_2_3.svg')?>" alt="">Base Rate:</span><span class="taxi-item_info">$10.50</span></div>
                  <div class="taxi-item_feature"><span><img src="<?=base_url('user/assets/img/icon/taxi_f_2_4.svg')?>" alt="">Air Conditioner:</span><span class="taxi-item_info">yes</span></div><a href="taxi-details.html" class="th-btn fw-btn">book Now Taxi<i class="fa-regular fa-arrow-right ms-2"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="download-area3 overflow-hidden space-top" data-bg-src="<?=base_url('user/assets/img/bg/download_bg_3.jpg')?>">
      <div class="container">
        <div class="row">
          <div class="col-xl-6 text-center text-xl-start wow fadeInLeft">
            <div class="title-area mb-30"><span class="sub-title">Download Taxiar App Now</span>
              <h2 class="sec-title text-capitalize">Get A Free Taxiar App From Online Store</h2>
              <p class="sec-text">Competently re-engineer cross-media meta-services whereas best of breed processes matrix just in time content...</p>
            </div>
            <div class="download-btn-wrap style2"><a target="_blank" href="https://play.google.com/" class="download-btn"><i class="fa-brands fa-google-play"></i>
                <div class="text-group"><span class="small-text">Download From</span>
                  <h6 class="big-text">Google Play</h6>
                </div>
              </a><a target="_blank" href="https://www.apple.com/store" class="download-btn style2"><i class="fa-brands fa-apple"></i>
                <div class="text-group"><span class="small-text">Download From</span>
                  <h6 class="big-text">App Store</h6>
                </div>
              </a></div>
          </div>
          <div class="col-xl-6">
            <div class="download-image wow fadeInRight"><img src="<?=base_url('user/assets/img/bg/phone_1.png')?>" alt=""></div>
          </div>
        </div>
      </div>
    </section>
    <div class="feature-area" data-bg-src="<?=base_url('user/assets/img/bg/counter_bg_2.jpg')?>">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-xl-5">
            <div class="feature-video wow fadeInLeft"><img src="<?=base_url('user/assets/img/normal/video_1.jpg')?>" alt="cta bg"><a href="https://www.youtube.com/watch?v=CcpvU_pzR-s" class="play-btn popup-video"><i class="fas fa-play"></i></a></div>
          </div>
          <div class="col-xl-7">
            <div class="ps-xxl-5 ms-xl-5 wow fadeInRight">
              <div class="title-area text-center text-xl-start"><span class="sub-title">Why Choose Us</span>
                <h2 class="sec-title text-white">We Ensure Your Happy To Taxi Journey</h2>
              </div>
              <div class="counter-wrap style2">
                <div class="counter-line"></div>
                <div class="counter-wrapper">
                  <div class="counter-card style2">
                    <div class="counter-card_icon"><img src="<?=base_url('user/assets/img/icon/counter_2_1.svg')?>" alt="icon"></div>
                    <div class="counter-card_number"><span class="counter-number">32.5</span>k<span class="text-theme">+</span></div>
                    <p class="counter-card_text">Special Vehicles</p>
                  </div>
                  <div class="counter-card style2">
                    <div class="counter-card_icon"><img src="<?=base_url('user/assets/img/icon/counter_2_2.svg')?>" alt="icon"></div>
                    <div class="counter-card_number"><span class="counter-number">13.8</span>k<span class="text-theme">+</span></div>
                    <p class="counter-card_text">People Dropped</p>
                  </div>
                  <div class="counter-card style2">
                    <div class="counter-card_icon"><img src="<?=base_url('user/assets/img/icon/counter_2_3.svg')?>" alt="icon"></div>
                    <div class="counter-card_number"><span class="counter-number">65.2</span>k<span class="text-theme">+</span></div>
                    <p class="counter-card_text">Satisfied Clients</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="space overflow-hidden">
      <div class="container">
        <div class="title-area text-center"><span class="brand-title"><span class="counter-card_number"><span class="counter-number">10</span>k+<span class="counter-title">Our Trusted Partner</span></span></span></div>
        <div class="row brand-slide th-carousel" data-slide-show="5" data-lg-slide-show="4" data-md-slide-show="3" data-sm-slide-show="2" data-xs-slide-show="2">
          <div class="col-auto brand-img style2 wow fadeInLeft"><img src="<?=base_url('user/assets/img/brand/brand_1_1.png')?>" alt="Brand Logo"></div>
          <div class="col-auto brand-img style2 wow fadeInLeft"><img src="<?=base_url('user/assets/img/brand/brand_1_2.png')?>" alt="Brand Logo"></div>
          <div class="col-auto brand-img style2 wow fadeInLeft"><img src="<?=base_url('user/assets/img/brand/brand_1_3.png')?>" alt="Brand Logo"></div>
          <div class="col-auto brand-img style2 wow fadeInLeft"><img src="<?=base_url('user/assets/img/brand/brand_1_4.png')?>" alt="Brand Logo"></div>
          <div class="col-auto brand-img style2 wow fadeInLeft"><img src="<?=base_url('user/assets/img/brand/brand_1_5.png')?>" alt="Brand Logo"></div>
        </div>
      </div>
    </div>
    <section class="bg-smoke space" data-bg-src="<?=base_url('user/assets/img/bg/testimonial_bg_1.jpg')?>">
      <div class="container">
        <div class="row justify-content-center justify-content-lg-between align-items-center">
          <div class="col-lg-8">
            <div class="title-area text-center text-lg-start"><span class="sub-title">Client’s Testimonial</span>
              <h2 class="sec-title">Our Happy Client’s Review</h2>
            </div>
          </div>
          <div class="col-auto">
            <div class="sec-btn">
              <div class="icon-item"><button data-slick-prev="#testiSlide" class="slick-arrow default"><i class="far fa-arrow-left"></i></button><button data-slick-next="#testiSlide" class="slick-arrow default"><i class="far fa-arrow-right"></i></button></div>
            </div>
          </div>
        </div>
        <div class="row slider-shadow th-carousel" id="testiSlide" data-slide-show="3" data-lg-slide-show="2" data-md-slide-show="2">
          <div class="col-md-6 col-xl-4">
            <div class="testi-item wow fadeInUp">
              <p class="testi-item_text">“Proactively synthesize schemas before foster like leveraged expertise user friendly business low before open.”</p>
              <div class="testi-item_wrapper">
                <div class="testi-item_profile">
                  <div class="testi-item_img"><img src="<?=base_url('user/assets/img/testimonial/testi_3_1.jpg')?>" alt="Avater"></div>
                  <div class="media-body">
                    <h3 class="testi-item_name">David Smith</h3>
                    <p class="testi-item_desig">Head Of Growth</p>
                  </div>
                </div>
                <div class="testi-item_quote"><img src="<?=base_url('user/assets/img/icon/quote_2.svg')?>" alt="quote"></div>
              </div>
              <div class="testi-item_review"><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i></div>
            </div>
          </div>
          <div class="col-md-6 col-xl-4">
            <div class="testi-item wow fadeInUp">
              <p class="testi-item_text">“Groactively synthesize schemas before foster like leveraged expertise user friendly business source iterate.”</p>
              <div class="testi-item_wrapper">
                <div class="testi-item_profile">
                  <div class="testi-item_img"><img src="<?=base_url('user/assets/img/testimonial/testi_3_2.jpg')?>" alt="Avater"></div>
                  <div class="media-body">
                    <h3 class="testi-item_name">Emily Isabella</h3>
                    <p class="testi-item_desig">Bank Manager</p>
                  </div>
                </div>
                <div class="testi-item_quote"><img src="<?=base_url('user/assets/img/icon/quote_2.svg')?>" alt="quote"></div>
              </div>
              <div class="testi-item_review"><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i></div>
            </div>
          </div>
          <div class="col-md-6 col-xl-4">
            <div class="testi-item wow fadeInUp">
              <p class="testi-item_text">“Troactively synthesize schemas before foster like leveraged expertise user friendly business low before open.”</p>
              <div class="testi-item_wrapper">
                <div class="testi-item_profile">
                  <div class="testi-item_img"><img src="<?=base_url('user/assets/img/testimonial/testi_3_3.jpg')?>" alt="Avater"></div>
                  <div class="media-body">
                    <h3 class="testi-item_name">Harry Callum</h3>
                    <p class="testi-item_desig">CEO Founder</p>
                  </div>
                </div>
                <div class="testi-item_quote"><img src="<?=base_url('user/assets/img/icon/quote_2.svg')?>" alt="quote"></div>
              </div>
              <div class="testi-item_review"><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i></div>
            </div>
          </div>
          <div class="col-md-6 col-xl-4">
            <div class="testi-item wow fadeInUp">
              <p class="testi-item_text">“Jroactively synthesize schemas before foster like leveraged expertise user friendly open source schemas.”</p>
              <div class="testi-item_wrapper">
                <div class="testi-item_profile">
                  <div class="testi-item_img"><img src="<?=base_url('user/assets/img/testimonial/testi_3_4.jpg')?>" alt="Avater"></div>
                  <div class="media-body">
                    <h3 class="testi-item_name">Marcos Manuel</h3>
                    <p class="testi-item_desig">Bank Manager</p>
                  </div>
                </div>
                <div class="testi-item_quote"><img src="<?=base_url('user/assets/img/icon/quote_2.svg')?>" alt="quote"></div>
              </div>
              <div class="testi-item_review"><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i></div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="space">
      <div class="container">
        <div class="title-area text-center"><span class="sub-title ms-0">Our News Update<span class="double-line"></span></span>
          <h2 class="sec-title">Latest News & Blog Post</h2>
        </div>
        <div class="row th-carousel slider-shadow" data-slide-show="3" data-lg-slide-show="2" data-md-slide-show="2" data-sm-slide-show="1" data-arrows="true" data-xl-arrows="true" data-ml-arrows="true">
          <div class="col-md-6 col-xl-4">
            <div class="blog-item wow fadeInUp">
              <div class="blog-img"><img src="<?=base_url('user/assets/img/blog/blog_4_1.jpg')?>" alt="blog image"><a class="blog-date" href="blog.html"><span class="month">15</span> May, 2023</a></div>
              <div class="blog-content">
                <div class="blog-meta style2"><a href="blog.html">by Admin</a><a href="blog.html">Comments(03)</a></div>
                <h3 class="blog-item_title"><a href="blog-details.html">Tensive quality vectors life through strategis</a></h3><a href="blog-details.html" class="link-btn">Learn More <i class="fas fa-arrow-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-xl-4">
            <div class="blog-item wow fadeInDown">
              <div class="blog-img"><img src="<?=base_url('user/assets/img/blog/blog_4_2.jpg')?>" alt="blog image"><a class="blog-date" href="blog.html"><span class="month">16</span> May, 2023</a></div>
              <div class="blog-content">
                <div class="blog-meta style2"><a href="blog.html">by Admin</a><a href="blog.html">Comments(03)</a></div>
                <h3 class="blog-item_title"><a href="blog-details.html">How to start initiating an startup in few days.</a></h3><a href="blog-details.html" class="link-btn">Learn More <i class="fas fa-arrow-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-xl-4">
            <div class="blog-item wow fadeInUp">
              <div class="blog-img"><img src="<?=base_url('user/assets/img/blog/blog_4_3.jpg')?>" alt="blog image"><a class="blog-date" href="blog.html"><span class="month">17</span> May, 2023</a></div>
              <div class="blog-content">
                <div class="blog-meta style2"><a href="blog.html">by Admin</a><a href="blog.html">Comments(03)</a></div>
                <h3 class="blog-item_title"><a href="blog-details.html">Innovative business all over the world.</a></h3><a href="blog-details.html" class="link-btn">Learn More <i class="fas fa-arrow-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-xl-4">
            <div class="blog-item wow fadeInDown">
              <div class="blog-img"><img src="<?=base_url('user/assets/img/blog/blog_4_4.jpg')?>" alt="blog image"><a class="blog-date" href="blog.html"><span class="month">18</span> May, 2023</a></div>
              <div class="blog-content">
                <div class="blog-meta style2"><a href="blog.html">by Admin</a><a href="blog.html">Comments(03)</a></div>
                <h3 class="blog-item_title"><a href="blog-details.html">Motivate quality vectors life through vectoeris</a></h3><a href="blog-details.html" class="link-btn">Learn More <i class="fas fa-arrow-right"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

      <?= $this->endSection() ?>