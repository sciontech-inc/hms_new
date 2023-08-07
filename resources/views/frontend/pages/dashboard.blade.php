@extends('frontend.master.index')

@section('content')
<main>
    <!--? Hero Start -->
    <!-- Hero End -->
    <!--? department_area_start  -->
    <div class="department_area section-padding2">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center mb-50">
                        <span>Good day, {{Auth::user()->firstname}} {{Auth::user()->lastname}}!</span>
                        <h2>PATIENT DASHBOARD</h2>
                    </div>
                </div>
            </div>
            <div class="row mb-20">
                <div class="col-lg-12 mb-20">
                    <h3>PERSONAL INFORMATION</h3>
                </div>
                <div class="col-md-6">
                    <div class="mb-20">
                        <h5 class="section-title">PATIENT NAME: </h5><span>{{Auth::user()->firstname}} {{Auth::user()->lastname}}</span>
                    </div>
                    <div class="mb-20">
                        <h5 class="section-title">AGE:</h5><span>26</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-20">
                        <h5 class="section-title">GENDER: </h5><span>MALE</span>
                    </div>
                    <div class="mb-20">
                        <h5 class="section-title">EMAIL: </h5><span>{{Auth::user()->email}}</span>
                    </div>
                </div>
               
            </div>
            <div class="row mb-50">
                <div class="col-lg-12 mb-20">
                    <h3>EMERGENCY CONTACT</h3>
                </div>
                <div class="col-md-6">
                    <div class="mb-20">
                        <h5 class="section-title">EMERGENCY CONTACT NAME: </h5><span>JUAN DELA CRUZ</span>
                    </div>
                    <div class="mb-20">
                        <h5 class="section-title">ADDRESS:</h5><span>QUEZON CITY, PHILIPPINES 1117</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-20">
                        <h5 class="section-title">PHONE : </h5><span>+639 16 493 0244</span>
                    </div>
                    <div class="mb-20">
                        <h5 class="section-title">EMAIL: </h5><span>juandelacruz@gmail.com</span>
                    </div>
                </div>
               
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="depart_ment_tab mb-30">
                        <!-- Tabs Buttons -->
                        <ul class="nav" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="appointment-tab" data-toggle="tab" href="#appointment" role="tab" aria-controls="appointment" aria-selected="true">
                                    <h4>Appointments</h4>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="medical-condition-tab" data-toggle="tab" href="#medical-condition" role="tab" aria-controls="medical-condition" aria-selected="false">
                                    <h4>Medical Conditions</h4>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="allergies-tab" data-toggle="tab" href="#allergies" role="tab" aria-controls="allergies" aria-selected="false">
                                    <h4>Allergies</h4>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="current-medication-tab" data-toggle="tab" href="#current-medication" role="tab" aria-controls="current-medication" aria-selected="false">
                                    <h4>Current Medications</h4>
                                </a>
                            </li>
                           
                            <li class="nav-item">
                                <a class="nav-link" id="Blood-tab" data-toggle="tab" href="/logout" role="tab" aria-controls="contact" aria-selected="false">
                                    <h4>Logout</h4>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="dept_main_info white-bg">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="appointment" role="tabpanel" aria-labelledby="appointment-tab">
                        <div class="section-top-border table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">DOCTOR</th>
                                        <th scope="col">DATE & TIME</th>
                                        <th scope="col">REASON</th>
                                        <th scope="col">STATUS</th>
                                        <th scope="col">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td><img src="frontend/img/elements/f1.png" alt="flag">Doctor Jose Reyes, MD</td>
                                        <td>August 9, 2023 - 10:00AM</td>
                                        <td>Regular health checkups to monitor overall health and catch potential issues early.</td>
                                        <td>Pending</td>
                                        <td><a href="#" class="genric-btn primary-border">View Record</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td><img src="frontend/img/elements/f2.png" alt="flag">Dra. Rose Buenaventura, MD</td>
                                        <td>August 9, 2023 - 10:00AM</td>
                                        <td>General health screenings for specific age-related risks or conditions.</td>
                                        <td>Completed</td>
                                        <td><a href="#" class="genric-btn primary-border">View Record</a></td>

                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td><img src="frontend/img/elements/f3.png" alt="flag">Dra. Allison Cortez, MD</td>
                                        <td >August 9, 2023 - 10:00AM</td>
                                        <td>Assessment and treatment for reactions to insect bites or stings.</td>
                                        <td>Completed</td>
                                        <td><a href="#" class="genric-btn primary-border">View Record</a></td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="medical-condition" role="tabpanel" aria-labelledby="medical-condition-tab">
                        <!-- single_content  -->
                        <div class="section-top-border table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">CHIEF COMPLAINT</th>
                                        <th scope="col">DATE & TIME</th>
                                        <th scope="col">DIAGNOSIS</th>
                                        <th scope="col">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>I have a high fever and a persistent cough for the past few days.</td>
                                        <td>August 9, 2023 - 10:00AM</td>
                                        <td>Fever and Cough</td>
                                        <td><a href="#" class="genric-btn primary-border">View Record</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>I'm experiencing sharp chest pain that radiates to my left arm.</td>
                                        <td>August 9, 2023 - 10:00AM</td>
                                        <td>Chest Pain</td>
                                        <td><a href="#" class="genric-btn primary-border">View Record</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>I have severe abdominal pain and nausea.</td>
                                        <td >August 9, 2023 - 10:00AM</td>
                                        <td>Abdominal Pain</td>
                                        <td><a href="#" class="genric-btn primary-border">View Record</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- single_content  -->
                    </div>
                    <div class="tab-pane fade" id="allergies" role="tabpanel" aria-labelledby="allergies-tab">
                        <!-- single_content  -->
                        <div class="section-top-border table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">ALLERGEN</th>
                                        <th scope="col">REACTION</th>
                                        <th scope="col">DATE OF ONSET</th>
                                        <th scope="col">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Pollen</td>
                                        <td>Seasonal allergic rhinitis (hay fever) with symptoms like sneezing, runny or stuffy nose, itchy and watery eyes.</td>
                                        <td>August 9, 2023 - 10:00AM</td>
                                        <td><a href="#" class="genric-btn primary-border">View Record</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Dust Mites</td>
                                        <td>Allergic rhinitis or asthma symptoms, such as sneezing, coughing, wheezing, and shortness of breath.</td>
                                        <td>August 9, 2023 - 10:00AM</td>
                                        <td><a href="#" class="genric-btn primary-border">View Record</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Pet Dander (from cats, dogs, etc.)</td>
                                        <td>Allergic rhinitis or skin reactions like hives, with symptoms of itching, redness, and swelling.</td>
                                        <td >August 9, 2023 - 10:00AM</td>
                                        <td><a href="#" class="genric-btn primary-border">View Record</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- single_content  -->
                    </div>
                    <div class="tab-pane fade" id="current-medication" role="tabpanel" aria-labelledby="current-medication-tab">
                        <!-- single_content  -->
                        <div class="section-top-border table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">NAME</th>
                                        <th scope="col">DOSES</th>
                                        <th scope="col">TYPE</th>
                                        <th scope="col">DURATION</th>
                                        <th scope="col">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Lisinopril</td>
                                        <td>10 mg once daily</td>
                                        <td>ACE inhibitor</td>
                                        <td>Long-term, as prescribed by the healthcare provider</td>
                                        <td><a href="#" class="genric-btn primary-border">View Record</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Loratadine</td>
                                        <td>10 mg once daily</td>
                                        <td>Antihistamine</td>
                                        <td>As needed during allergy season or as prescribed by the healthcare provider</td>
                                        <td><a href="#" class="genric-btn primary-border">View Record</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Metformin</td>
                                        <td>1000 mg twice daily with meals</td>
                                        <td>Biguanide</td>
                                        <td>Long-term, as part of diabetes management</td>
                                        <td><a href="#" class="genric-btn primary-border">View Record</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- single_content  -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- department area_end  -->
    </main>
@endsection

@section('styles')

<style>
    .department_area .depart_ment_tab .nav li {
        flex: 19.5% 0 0;
    }
    h3 {
        color: #01aad3;
    }
    .progress-table-wrap {
        overflow-x: unset;
    }
    .section-top-border {
        padding: 30px 20px;
        border-top: 1px dotted #eee;
    }
    .genric-btn {
        line-height: 30px !important;
        padding: 0px 20px !important;
    }
</style>
@endsection
