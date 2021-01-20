@extends('layouts.theme')

@section('content')


    <div class="advertise-section bg-white pb-5 pt-5">
        <div class="container">

            <div class="row">
                <div class="col-md-12">

                    <div class="advertise-section-heading mb-5 text-center">

                        <h1>Advertise</h1>
                        <h5 class="text-muted">Post Jobs and View Talent Solutions at a Glance</h5>
                        <h5 class="text-muted">Get Talent Faster and Easier through <b class="text-danger">Absolutely Chef</b></h5>
                    </div>

                </div>
                <div class="col-md-12">
                    @if(session()->has('error'))
                        <div class="alert alert-warning" role="alert">
                            "Failed to add Package."
                        </div>                
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="container">
                    <div class="tabs advertise-tabs">
                        <div class="container">
                            <div class="row">
                                    <div class="col-xl-6">
                                        <ul class="nav nav-pills nav-stacked flex-column">
                                            @foreach ($p_waitings as $index => $package)
                                                <li>
                                                    <a href="#tab_{{$index}}" data-toggle="pill" class="item-option" onclick="CheckOption(this)">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="enterprise" id="m_singleJob_{{ $index }}" value="{{$index}}" {{ $index == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="m_singleJob_{{ $index }}">
                                                                {!! $package->label !!}
                                                            </label>
                                                        </div>
                                                    </a>
                                                </li>
                                            @endforeach
                                            <li>
                                                <a href="#" data-toggle="pill" class="item-option" >
                                                    <div class="form-check">
                                                        <label class="form-check-label" for="m_singleJob_{{ $index }}">
                                                            <a href="{{ route('contact_us') }}" class="">Request info about packages with CV search</a>
                                                        </label>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="tab-content">
                                            @foreach ($p_waitings as $index => $package)
                                                    <div class="tab-pane {{ $index == 0 ? 'active' : '' }}" id="tab_{{$index}}">
                                                        <h3>
                                                            {!! $package->name .',' !!} {!! get_amount($package->price ) !!} {{ $index == 0 ? 'each' : '' }}
                                                        </h3>
                                                        <ul>
                                                            <li>In a few short steps, you can create your job ad online. </li>
                                                            <li>The best value for all types of recruitment search. That is our guarantee to you.</li>
                                                            <li>Job ads live and editable for 30 days</li>
                                                        </ul>
                                                       
                                                        <a href="{{ route('addToCart', ['id' => $package->id]) }}" class="btn btn-lg btn-primary">Add To Cart</a>
                                                    </div>
                                            @endforeach
                                        </div>
                                    </div>   
                            </div>
                            
                        </div>
                    </div>
                </div>

            </div>
            <div class="advertise-section-heading m-5 text-center">

                <h3 class="h1">Management, Professional and Skilled Worker Job Ad</h3>
            </div>
            <div class="row">
                <div class="container">
                    <div class="tabs advertise-tabs">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-6">
                                    <ul class="nav nav-pills nav-stacked flex-column">
                                        @foreach ($p_profational as $index => $package)
                                                <li>
                                                    <a href="#tab_b_{{$index}}" data-toggle="pill" class="item-option" onclick="CheckOption(this)">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="managment" id="m_singleJob_{{ $index }}" value="{{$index}}" {{ $index == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="m_singleJob_{{ $index }}">
                                                                {!! $package->label !!}
                                                            </label>
                                                        </div>
                                                    </a>
                                                </li>
                                            @endforeach
                                            <li>
                                                <a href="#" data-toggle="pill" class="item-option" >
                                                    <div class="form-check">
                                                        <label class="form-check-label" for="m_singleJob_{{ $index }}">
                                                            <a href="{{ route('contact_us') }}" class="">Request info about packages with CV search</a>
                                                        </label>
                                                    </div>
                                                </a>
                                            </li>
                                    </ul>
                                </div>
                                <div class="col-xl-6">
                                    <div class="tab-content">
                                        @foreach ($p_profational as $index => $package) 
                                        
                                                <div class="tab-pane  {{ $index == 0 ? 'active' : '' }}" id="tab_b_{{$index}}">
                                                    <h3>
                                                        {!! $package->name .',' !!} {!! get_amount($package->price ) !!} {{ $index == 0 ? 'each' : '' }}                                                    </h3>
                                                    <ul>
                                                        <li>In a few short steps, you can create your job ad online. </li>
                                                        <li>The best value for all types of recruitment search. That is our guarantee to you.</li>
                                                        <li>Job ads live and editable for 30 days</li>
                                                    </ul>
                                                      
                                                    

                                                    <a href="{{ route('addToCart', ['id' => $package->id]) }}" class="btn btn-lg btn-primary">Add To Cart</a>
                                                </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        
 
        </div>
    </div>


@endsection
<script>
//     $(function() {
// 	var $a = $(".tabs li");
// 	$a.click(function() {
// 		$a.removeClass("active");
// 		$(this).addClass("active");
// 	});
// });

function CheckOption(item){
    input = item.getElementsByTagName("input")[0];
    input.checked = true;
    var container = input.closest(".row");
    var btns = container.getElementsByClassName('btn');
    var allbtns = document.getElementsByClassName('btn-primary');
    for (var ele of allbtns){
        ele.style.backgroundColor = null;
    }
    for (var ele of btns){
        ele.style.backgroundColor = "#000";
    }
};

</script>