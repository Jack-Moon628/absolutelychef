@extends('layouts.theme')

@section('content')

    <div class="home-hero-section">

        <div class="job-search-bar">

            <div class="container">
                <div class="row mt-4">
                    <div class="col-md-8">
                        <h1>Find the job that you deserve</h1>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-12">

                        <form action="{{route('jobs_listing')}}" class="form-inline" method="get">
                            <div class="form-row">
                                <div class="col-auto">
                                    <input type="text" name="q" class="form-control mb-2" style="min-width: 300px;" placeholder="@lang('app.job_title_placeholder')">
                                    <input type="text" name="location" class="form-control" style="min-width: 300px;"  placeholder="@lang('app.job_location_placeholder')">
                                    <button type="submit" class="btn btn-danger mb-2"><i class="la la-search"></i> @lang('app.search')</button>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>
            </div>

        </div>

    </div>

        <div class="head-section text-center p-4 mb-2 text-center w-100 bg-danger text-light">
            <h3>
                Design your world
            </h3>
            <p class="text-light-50">
                Set your career in motion with Absolutely Chef
            </p>    
        </div>
    <section  class="m-3 pt-5 pb-5">
        <div class="row">
            <div class="container">
                <div class="row ">
                    <div class="col-md-6 col-xs-12 d-block d-sm-none ">
                        <img  class="img-fluid"  src="assets/images/joboard_illustration.svg" alt="">
                    </div>
                    <div class="col-md-6 col-xs-12 mt-5 text-center">
                        <h2 class="display-3">
                            FIND YOUR PERFECT JOB MATCH
                        </h2>
                        <p class="h5">
                            Search results tuned precisely to the criteria you set so we can better connect you with relevant and personalized positions.
                        </p>
                    </div>
                    <div class="col-md-6 col-xs-12 d-none d-sm-block">
                        <img  class="img-fluid"  src="assets/images/joboard_illustration.svg" alt="">
                    </div>
                </div>
                
                
            </div>
        </div>
    </section>
   
    <section class="pt-5 pb-5 bg-light">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-xs-12 text-center">
                        <img  class="img-fluid"  src="assets/images/joboard_illustration-2.svg" alt="">
                    </div>
                    <div class="col-md-6 col-xs-12 text-center">
                        <h2 class="display-3">
                            TAKE CONTROL OVER YOUR CONTENT
                        </h2>
                        <p class="h5">
                            Actively searching? Just browsing? Control your profile visibility to get noticed by top employers.                        </p>
                    </div>
                </div>
                
                
            </div>
        </div>
    </section>

    <section class=" m-3  pt-2 pt-sm-5  pb-5">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-xs-12 d-block d-sm-none">
                        <img class="img-fluid" src="assets/images/joboard_illustration-3.svg" alt="">
                    </div>
                    <div class="col-md-6 col-xs-12 text-center">
                        <h2 class="display-3">
                            GAIN INSIGHTS INTO YOUR CAREER
                        </h2>
                        <p class="h5">
                        With your free Absolutely Chef profile and our advanced data tools, you’ve got access to personalized salary information and data insights to level up your career.
                        </p>
                    </div>
                    <div class="col-md-6 col-xs-12 d-none d-sm-block">
                        <img class="img-fluid" src="assets/images/joboard_illustration-3.svg" alt="">
                    </div>
                </div>
                
                
            </div>
        </div>
    </section>



    <div class="new-registration-page bg-light pb-5 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="home-register-account-box">
                        <h4>Seek</h4>
                        <p class="box-icon"><img src="{{secure_asset('assets/images/employee.png')}}" /></p>
                        <p> Seek a Job and see recommendations that suit you</p>                    
                    </div>
                </div>

                <div class="col-md-4 text-center">
                    <div class="home-register-account-box">
                        <h4>Quick</h4>
                        <p class="box-icon"><img src="{{secure_asset('assets/images/enterprise.png')}}" /></p>
                        <p>Apply in a few straightforward steps and access our jobs in double quick time</p>
                    </div>
                </div>

                <div class="col-md-4 text-center">
                    <div class="home-register-account-box">
                        <h4>Recruited</h4>
                        <p class="box-icon"><img src="{{secure_asset('assets/images/recruited.jpg')}}" /></p>
                        <p> Seek but also be recruited, put your CV on view for businesses</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class=" m-3  pt-2 pt-sm-5  pb-5 ">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-xs-12 d-block d-sm-none">
                        <img class="img-fluid" src="assets/images/0.jpg" alt="">
                    </div>
                    <div class="col-md-5 col-xs-12 text-center img-content-middle">
                        <h5 class=" line-2">
                            <b class="bold h1">Every good kitchen</b> is about a great Team , every successful company is about having great people work there. In every sector we provide recruitment services in we understand what makes success is great employees, we are here to assist businesses to get those people and for those businesses to recruit you.                        
                        </h5>

                    </div>
                    <div class="col-md-7 col-xs-12 d-none d-sm-block">
                        <img class="img-fluid rounded-lg shadow" src="assets/images/0.jpg" alt="Good Kitchen">
                    </div>
                </div>
                
                
            </div>
        </div>
    </section>
    <div class="new-registration-page bg-white pb-5 pt-5">
        <div class="container">
            <div class="row">

                <div class="col-md-12">

                    <div class="call-to-action-post-job justify-content-center">
                        <div class="job-post-icon my-auto">
                            <img src="{{secure_asset('assets/images/job.png')}}" />
                        </div>
                        <div class="job-post-details mr-3 ml-3 p-3 my-auto">
                            <h1>Post your job</h1>
                            <p>
                                Job seekers looking for quality job always. <br /> Post your job to get the talents
                            </p>
                        </div>

                        <div class="job-post-button my-auto">
                            <a href="{{route('employer_orders')}}" class="btn btn-danger btn-lg">Post a Job</a>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    {{-- <div class="job-stats-footer pb-5 pt-5 text-center">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-muted mb-3">Our website stats</h2>
                    <p class="text-muted mb-4">Here the stats of how many people we've helped them to find jobs, hired talents</p>

                </div>
            </div>


            <div class="row">
                <div class="col-md-3">
                    <h3>15M</h3>
                    <h5>Job Applicants</h5>
                </div>

                <div class="col-md-3">
                    <h3>12M</h3>
                    <h5>Job Posted</h5>
                </div>
                <div class="col-md-3">
                    <h3>8M</h3>
                    <h5>Employers</h5>
                </div>
                <div class="col-md-3">
                    <h3>15M</h3>
                    <h5>Recruiters</h5>
                </div>
            </div>
        </div>
    </div> --}}


@endsection
