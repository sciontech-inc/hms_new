@extends('frontend.master.index')

@section('content')
<main>
<div class="about-area section-padding2">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10">
                    <div class="about-caption mb-50">
                        <!-- Section Tittle -->
                        <div class="section-tittle section-tittle2 mb-35">
                            <span>APPOINTMENT DETAILS </span>
                            <h2>SET AN APPOINTMENT</h2>
                        </div>
                        <p>Appointment details are required for your medical record. Please fill in all the details below.</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="single-element-widget mt-30">
                                    <h3 class="mb-30">SELECT DOCTOR</h3>
                                    <div class="default-select" id="default-select"">
                                        <select>
                                            <option value=" 1">English</option>
                                            <option value="1">Spanish</option>
                                            <option value="1">Arabic</option>
                                            <option value="1">Portuguise</option>
                                            <option value="1">Bengali</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="single-element-widget mt-30">
                                    <h3 class="mb-30">SELECT DATE </h3>
                                    <div class="mt-10">
                                        <input type="date" name="last_name" placeholder="Last Name"
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'" required
                                            class="single-input">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="about-btn1 mb-30">
                            <a href="about.html" class="btn about-btn">Book Now<i class="ti-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <!-- about-img -->
                    <div class="about-img ">
                        <div class="about-font-img d-none d-lg-block">
                            <img src="frontend/img/gallery/about2.png" alt="">
                        </div>
                        <div class="about-back-img ">
                            <img src="frontend/img/gallery/about1.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </main>
@endsection

@section('styles')
<style>
    .default-select .nice-select {
        width: 100%;
    }
    .mb-30 {
        margin-top: 30px;
    }
</style>
@endsection