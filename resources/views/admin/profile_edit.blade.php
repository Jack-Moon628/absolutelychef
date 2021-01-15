@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($user->is_user())

            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row {{ $errors->has('title')? 'has-error':'' }}">
                    <label for="name" class="col-sm-4 control-label">Title </label>
                    <div class="col-sm-8">
                        
                        <select name="title" id="" class="form-control">
                            <option value="Mr" {{ $user->title == "Mr" ?  "selected" : '' }}>
                                Mr
                            </option>
                            <option value="Mrs" {{ $user->title == "Mrs" ?  "selected" : '' }}>
                                Mrs
                            </option>
                            <option value="Ms" {{ $user->title == "Ms" ?  "selected" : '' }}>
                                Ms
                            </option>
                            <option value="Miss" {{ $user->title == "Miss" ?  "selected" : '' }}>
                                Miss
                            </option>
                            <option value="Dr" {{ $user->title == "Dr" ?  "selected" : '' }}>
                                Dr
                            </option>
                            <option value="Professor" {{ $user->title == "Professor" ?  "selected" : '' }}>
                                Professor
                            </option>
                            <option value="Other" {{ $user->title == "Other" ?  "selected" : '' }}>
                                Other
                            </option>
                        </select>
                        {!! e_form_error('name', $errors) !!}
                    </div>
                </div>

                <div class="form-group row {{ $errors->has('name')? 'has-error':'' }}">
                    <label for="name" class="col-sm-4 control-label">@lang('app.name')</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="name" value="{{ old('name')? old('name') : $user->name }}" name="name" placeholder="@lang('app.name')">
                        {!! e_form_error('name', $errors) !!}
                    </div>
                </div>
                <!-- <div class="form-group row {{ $errors->has('surename')? 'has-error':'' }}">
                    <label for="surename" class="col-sm-4 control-label">@lang('app.surename')</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="surename" value="{{ old('surename')? old('surename') : $user->surename }}" name="surename" placeholder="surename">
                        {!! e_form_error('surename', $errors) !!}
                    </div>
                </div> -->
                <div class="form-group row {{ $errors->has('home_phone')? 'has-error':'' }}">
                <label for="home_phone" class="col-sm-4 control-label">Phone </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="home_phone" value="{{ old('home_phone') ? old('home_phone') : $info->home_phone }}" name="home_phone">
                        {!! e_form_error('home_phone', $errors) !!}
                    </div>
                </div>

                <div class="form-group row {{ $errors->has('phone')? 'has-error':'' }}">
                    <label for="phone" class="col-sm-4 control-label">Mobile Phone</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="phone" value="{{ old('phone')? old('phone') : $user->phone }}" name="phone" placeholder="@lang('app.phone')">
                        {!! e_form_error('phone', $errors) !!}
                    </div>
                </div>
                <div class="form-group row  mt-4 mb-4 ">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-8">
                        <input type="checkbox" name="allow_contact" class="form-check-input" value="1" id="allowContact" {{ $info->allow_contact == 1 ? 'checked' : '' }}>
                        <label class="form-check-label"   for="allowContact">Allow recruiters to contact me via SMS (text message)</label>
                    </div>
                </div>

                <div class="form-group row {{ $errors->has('country_id')? 'has-error':'' }}">
                    <label for="phone" class="col-sm-4 control-label">@lang('app.country')</label>
                    <div class="col-sm-8">
                        <select id="country_id" name="country_id" class="form-control select2">
                            <option value="">@lang('app.select_a_country')</option>
                            @foreach($countries as $country)
                                <option value="{{ $country->id }}" {{ $user->country_id == $country->id ? 'selected' :'' }}>{{ $country->country_name }}</option>
                            @endforeach
                        </select>
                        {!! e_form_error('country_id', $errors) !!}
                    </div>
                </div>

                <div class="form-group row {{ $errors->has('postCode')? 'has-error':'' }}">
                    <label for="homePostcode" class="col-sm-4 control-label">Postcode</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="homePostcode" value="{{ old('homePostcode')? old('homePostcode') : $user->postal_code }}" name="homePostcode">
                        {!! e_form_error('homePostcode', $errors) !!}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-sm-4 control-label">@lang('app.email')</label>
                    <div class="col-sm-8">
                        {{ $user->email }}                       
                    </div>
                </div>

                <div class="form-group row {{ $errors->has('resume')? 'has-error':'' }}">
                    <label for="resume" class="col-sm-4 control-label">CV</label>
                    <div class="col-sm-8">
                        <input type="file" class="form-control-file" id="resume" value="{{ old('resume')? old('resume') : $user->resume }}" name="resume">
                        {!! e_form_error('resume', $errors) !!}
                        @if($user->cv)
                        <p class="text-muted"><a href="{{ route('download_cv', ['file' => basename($user->cv)])  }}">Download CV</a></p>
                        @endif
                    </div>
                </div>
                @php 
                $website1 = json_decode($info->website_link1); 
                $website2 = json_decode($info->website_link2); 
                
                @endphp
                <div class="form-group row {{ $errors->has('website_link2')? 'has-error':'' }}">
                    <label for="website_link2" class="col-sm-4 control-label">Social Media Links</label>
                    <div class="col-sm-8">
                        <select name="website_link2[type]" id="" class="form-control">
                            <option value="Linkedin" {{ $website2->type == 'Linkedin' ? 'selected' : ''  }}>
                                Linkedin
                            </option>
                            <option value="Twitter" {{ $website2->type == 'Twitter' ? 'selected' : ''  }}>
                                Twitter
                            </option>
                            <option value="Other" {{ $website2->type == 'Other' ? 'selected' : ''  }}>
                                Other
                            </option>
                            <option value="Facebook" {{ $website2->type == 'Facebook' ? 'selected' : ''  }}>
                                Facebook
                            </option>
                            <option value="TikTOk" {{ $website1->type == 'TikTOk' ? 'selected' : ''  }}>
                                TikToK
                            </option>
                            <option value="SnapChat" {{ $website1->type == 'SnapChat' ? 'selected' : ''  }}>
                                SnapChat
                            </option>
                        </select>
                        <input type="link" class="form-control-file" id="" value="{{ old("website_link2[link]")? old("website_link2[link]") :  $website2->link  }}" name="website_link2[link]">
                        {!! e_form_error("website_link2[type]", $errors) !!}
                        {!! e_form_error("website_link2[link]", $errors) !!}
                    </div>
                </div>



                <div class="form-group row {{ $errors->has('website_link1')? 'has-error':'' }}">
                    <label for="name" class="col-sm-4 control-label"></label>
                    <div class="col-sm-8">
                        <select  name="website_link1[type]" id="" class="form-control">
                            <option value="Linkedin" {{ $website1->type == 'Linkedin' ? 'selected' : ''  }}>
                                Linkedin
                            </option>
                            <option value="Twitter" {{ $website1->type == 'Twitter' ? 'selected' : ''  }}>
                                Twitter
                            </option>
                            <option value="Other" {{ $website1->type == 'Other' ? 'selected' : ''  }}>
                                Other
                            </option>
                            <option value="Facebook" {{ $website1->type == 'Facebook' ? 'selected' : ''  }}>
                                Facebook
                            </option>
                            <option value="TikTOk" {{ $website1->type == 'TikTOk' ? 'selected' : ''  }}>
                                TikToK
                            </option>
                            <option value="SnapChat" {{ $website1->type == 'SnapChat' ? 'selected' : ''  }}>
                                SnapChat
                            </option>
                        </select>
                        <input type="link" class="form-control-file" id="" value="{{ old("website_link1[link]")? old("website_link1[link]") : $website1->link }}" name="website_link1[link]">
                        {!! e_form_error("website_link1[type]", $errors) !!}
                        {!! e_form_error("website_link1[link]", $errors) !!}
                    </div>
                    
                </div>
                
                <h4>Work experience</h4>
                <hr>

                
                
                <div class="form-group row {{ $errors->has('eligibility_eu')? 'has-error':'' }}">
                    {{-- <label for="" class="col-sm-4 control-label"></label> --}}
                    <div class="col-sm-12">
                        <div style="  column-count: 3;">
                            @foreach($experiences as $experience)
                            <div class="form-check " >
                            <input class="form-check-input"  type="checkbox" name="experiences[]"  {{ in_array($experience->id, !empty($userExperiences)?$userExperiences:[] ) ? 'checked' : '' }}  id="experiences-{{ $experience->id }}" value="{{ $experience->id }}">
                            <label class="form-check-label" for="experiences-{{ $experience->id }}">{{ $experience->name }}</label>
                            </div>
                            @endforeach
                        </div>        
                          {!! e_form_error('VisiableCV', $errors) !!}
                    </div>
                </div>  


                                
                <div class="form-group row {{ $errors->has('eligibility_eu')? 'has-error':'' }}">
                    <label for="" class="col-sm-12 control-label font-weight-bold">Employer Type</label>
                    <div class="col-sm-12">
                        <div style="  column-count: 3;">
                            @php 
                                $eTypes = getEmployersTypes(); 
                                $iTypes = json_decode($info->employer_type);
                            @endphp
                            @foreach($eTypes as $key => $value)
                            <div class="form-check">
                            <input class="form-check-input"  {{ in_array($key, !empty($iTypes)?$iTypes:[] ) ? 'checked' : ''  }} type="checkbox" name="employer_type[]" id="employer-type-{{ $key }}" value="{{ $key }}">
                            <label class="form-check-label" for="employer-type-{{ $key }}">{{ $value }}</label>
                            </div>
                            @endforeach
                        </div>        
                          {!! e_form_error('employer_type', $errors) !!}
                    </div>
                </div>  



                <div class="form-group mt-5 row {{ $errors->has('experience_year')? 'has-error':'' }}">
                    <label for="experience_year" class="col-sm-4 control-label">Sectors/ functions you have experience in:</label>
                    <div class="col-sm-8">
                        <select name="experience_year" id="experience_year" class="form-control">
                            @php $experiences_year = experience(); @endphp
                            @foreach($experiences_year as $key => $value) 
                                <option value="{{ $key }}" {{ $key ==  $info->experience_year  ? 'selected' : ''}} >{{ $value }}</option>
                            @endforeach
                        </select>
                        {!! e_form_error('experiences_year', $errors) !!}
                    </div>
                </div>

                

                <div class="form-group row {{ $errors->has('current_job')? 'has-error':'' }}">
                    <label for="current_job" class="col-sm-4 control-label">Current / most recent job title</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="current_job" value="{{ old('current_job')? old('current_job') : $info->current_job }}" name="current_job">
                        {!! e_form_error('current_job', $errors) !!}
                    </div>
                </div>
                @php 
                    $current_salary =json_decode($info->current_salary);
                @endphp
                <div class="form-group row {{ $errors->has('current_salary')? 'has-error':'' }}">
                    <label for="current_job" class="col-sm-4 control-label">Current / most recent salary</label>
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-sm-6">
                                <select value="{{ old('current_salary')? old('current_salary') : $info->current_salary }}" name="current_salary[type]" id="current_salary" class="form-control">
                                    @php $listSalary = listSalary(); @endphp
                                    @foreach($listSalary as $key => $value) 
                                        <option value="{{ $key }}" {{ $key == $current_salary->type ? 'selected' : '' }}>{{ $value }}</option>
                                    @endforeach
                                </select>                           
                                 {!! e_form_error('current_salary', $errors) !!}
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="current_salary[]" value="{{ old('current_salary')? old('current_salary') : $current_salary->price }}" name="current_salary[price]">
                                {!! e_form_error('current_salary', $errors) !!}
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="form-group row {{ $errors->has('languages')? 'has-error':'' }}">
                        <label for="experience" class="col-sm-4 control-label">Additional Languages</label>
                        <div class="col-sm-8">
                            <select value="{{ old('languages')? old('languages') : $user->languages }}" name="languages[]" multiple id="languages" class="form-control">
                                @php 
                                    $langs = get_languages(); 
                                    $iLang = json_decode($info->languages);
                                @endphp
                                @foreach($langs as $key => $value) 
                                    <option value="{{ $key }}"  {{ in_array($key, !empty($iLang)?$iLang:[]) ? 'selected' : ''  }}>{{ $value }}</option>
                                @endforeach
                            </select>
                            {!! e_form_error('languages', $errors) !!}
                        </div>
                    </div>
                <h4>Your next move</h4>
                <hr>
                <div class="form-group row {{ $errors->has('summary')? 'has-error':'' }}">
                    <label for="summary" class="col-sm-4 control-label">Personal summary</label>
                    <div class="col-sm-8">
                        <textarea name="summary"  class="form-control"  id="" cols="15" rows="5">
                            {{ old('summary')? old('summary') : $info->summary }}
                        </textarea>
                        {!! e_form_error('summary', $errors) !!}
                    </div>
                </div>

                <div class="form-group row {{ $errors->has('desired_job')? 'has-error':'' }}">
                    <label for="desired_job" class="col-sm-4 control-label">Desired job Title</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="desired_job" value="{{ old('desired_job')? old('desired_job') : $info->desired_job }}" name="desired_job">
                        {!! e_form_error('desired_job', $errors) !!}
                    </div>
                </div>

                <div class="form-group row {{ $errors->has('desired_location')? 'has-error':'' }}">
                    <label for="desired_location" class="col-sm-4 control-label">Desired job Location</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="desired_location" value="{{ old('desired_location')? old('desired_location') : $info->desired_location }}" name="desired_location">
                        {!! e_form_error('desired_location', $errors) !!}
                    </div>
                </div>

                @php 
                    $deisred_salary =json_decode($info->deisred_salary);
                @endphp 
                <div class="form-group row {{ $errors->has('deisred_salary')? 'has-error':'' }}">
                    <label for="current_job" class="col-sm-4 control-label">Desired salary</label>
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-sm-6">
                                <select  name="deisred_salary[type]" id="deisred_salary" class="form-control">
                                    @php $listSalary = listSalary(); @endphp
                                    @foreach($listSalary as $key => $value) 
                                        <option value="{{ $key }}" {{ $key == $deisred_salary->type ? 'selected' : '' }}>{{ $value }}</option>
                                    @endforeach
                                </select>                           
                                 {!! e_form_error('deisred_salary', $errors) !!}
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="deisred_salary[]" value="{{ old('deisred_salary')? old('deisred_salary') : $deisred_salary->price }}" name="deisred_salary[price]">
                                {!! e_form_error('deisred_salary', $errors) !!}
                            </div>
                        </div>
                        
                    </div>
                </div>

                @php 
                $job_type =json_decode($info->job_type);
                @endphp 
                <div class="form-group row {{ $errors->has('job_type')? 'has-error':'' }}">
                    <label for="job_type" class="col-sm-4 control-label">Job Type</label>
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-sm-6">
                                <select value="{{ old('job_type')? old('job_type') : $user->job_type }}" name="job_type[type]" id="job_type" class="form-control">
                                    @php $listjob_type = listJobType(); @endphp
                                    @foreach($listjob_type as $key => $value) 
                                        <option value="{{ $key }}" {{ $key == $job_type->type ? 'selected' : '' }}>{{ $value }}</option>
                                    @endforeach
                                </select>                           
                                 {!! e_form_error('job_type', $errors) !!}
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="job_type[]" value="{{ old('job_type')? old('job_type') : $job_type->price }}" name="job_type[price]">
                                <span style="padding: 0px 5px;margin-top: 2px;display: block;color: #696969;">More details</span>
                                {!! e_form_error('job_type', $errors) !!}
                            </div>
                        </div>
                        
                    </div>
                </div>


                <h4>Work eligibility</h4>
                <hr>

                <div class="form-group row {{ $errors->has('eligibility_uk')? 'has-error':'' }}">
                    <label for="" class="col-sm-4 control-label"></label>
                    <div class="col-sm-8">
                        <div class="">
                            <label for="">Can you prove you are eligibie to live and work in the UK</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="eligibility_uk" {{ $info->eligibility_uk == 1 ? 'checked' : '' }} id="eligibility_uk1" value="1">
                            <label class="form-check-label" for="eligibility_uk1">Yes</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="eligibility_uk" {{ $info->eligibility_uk == 0 ? 'checked' : '' }} id="eligibility_uk2" value="0">
                            <label class="form-check-label" for="eligibility_uk2">No</label>
                          </div>                       
                          {!! e_form_error('desired_location', $errors) !!}
                    </div>
                </div>

                <div class="form-group row {{ $errors->has('eligibility_eu')? 'has-error':'' }}">
                    <label for="" class="col-sm-4 control-label"></label>
                    <div class="col-sm-8">
                        <div class="">
                            <label for="">Can you prove you are eligibie to live and work in the EU</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="eligibility_eu" {{ $info->eligibility_eu == 1 ? 'checked' : '' }} id="eligibility_eu1" value="1">
                            <label class="form-check-label" for="eligibility_eu1">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="eligibility_eu" {{ $info->eligibility_eu == 0 ? 'checked' : '' }} id="eligibility_eu2" value="0">
                            <label class="form-check-label" for="eligibility_eu2">No</label>
                        </div>
                       
                          {!! e_form_error('desired_location', $errors) !!}
                    </div>
                </div>    

                <h4>Profile privacy options</h4>
                <hr>

                <div class="form-group row {{ $errors->has('eligibility_eu')? 'has-error':'' }}">
                    <label for="" class="col-sm-4 control-label"></label>
                    <div class="col-sm-8">
                        <div class="">
                            <div class="">
                                <label for="">Do you want to be visable  to potential  employers searching for Candidates ?</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" {{ $info->visiable_cv == 1 ? 'checked' : '' }} type="radio" name="visiable_cv" id="VisiableCV1" value="1">
                                <label class="form-check-label" for="VisiableCV1">Yes , I want my profile and CV to be visable to potential employers (Recommended)</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" {{ $info->visiable_cv == 0 ? 'checked' : '' }} type="radio" name="visiable_cv" id="VisiableCV2" value="0">
                                <label class="form-check-label" for="VisiableCV2">No, Please do not make my profile searchable</label>
                            </div>
                        </div>        
                          {!! e_form_error('VisiableCV', $errors) !!}
                    </div>
                </div>  



                <h4>One-click apply</h4>
                <hr>
                <div class="form-group row {{ $errors->has('cover_letter')? 'has-error':'' }}">
                    <label for="cover_letter" class="col-sm-4 control-label">Write a cover letter</label>
                    <div class="col-sm-8">
                        <textarea name="cover_letter"  class="form-control"  id="" cols="15" rows="5">
                            {{ old('cover_letter')? old('cover_letter') : $info->cover_letter }}
                        </textarea>
                        {!! e_form_error('cover_letter', $errors) !!}
                    </div>
                </div>


                <div class="form-group row {{ $errors->has('eligibility_eu')? 'has-error':'' }}">
                    <label for="" class="col-sm-4 control-label"></label>
                    <div class="col-sm-8">
                        <div class="">
                            <div class="form-check">
                                <input class="form-check-input" {{ $info->onCLick_apply == 1 ? 'checked' : '' }} type="radio" name="onCLick_apply" id="on-click-apply1" value="1">
                                <label class="form-check-label" for="on-click-apply1">Turn on one-click apply using the above CV and cover letter</label>
                            </div>
                            <div class="form-check"> 
                                <input class="form-check-input" {{ $info->onCLick_apply == 0 ? 'checked' : '' }}  type="radio" name="onCLick_apply" id="on-click-apply2" value="0">
                                <label class="form-check-label" for="on-click-apply2">Turn off one-click apply</label>
                            </div>
                        </div>        
                          {!! e_form_error('VisiableCV', $errors) !!}
                    </div>
                </div>  

                {{-- <div class="form-group row {{ $errors->has('gender')? 'has-error':'' }}">
                    <label for="gender" class="col-sm-4 control-label">@lang('app.gender')</label>
                    <div class="col-sm-8">
                        <select id="gender" name="gender" class="form-control select2">
                            <option value="">Select Gender</option>
                            <option value="male" {{ $user->gender == 'male'?'selected':'' }}>Male</option>
                            <option value="female" {{ $user->gender == 'female'?'selected':'' }}>Fe-Male</option>
                            <option value="third_gender" {{ $user->gender == 'third_gender'?'selected':'' }}>Third Gender</option>
                        </select>
                        {!! e_form_error('gender', $errors) !!}
                    </div>
                </div>


                <div class="form-group row {{ $errors->has('country_id')? 'has-error':'' }}">
                    <label for="phone" class="col-sm-4 control-label">@lang('app.country')</label>
                    <div class="col-sm-8">
                        <select id="country_id" name="country_id" class="form-control select2">
                            <option value="">@lang('app.select_a_country')</option>
                            @foreach($countries as $country)
                                <option value="{{ $country->id }}" {{ $user->country_id == $country->id ? 'selected' :'' }}>{{ $country->country_name }}</option>
                            @endforeach
                        </select>
                        {!! e_form_error('country_id', $errors) !!}
                    </div>
                </div>

                <div class="form-group row {{ $errors->has('address')? 'has-error':'' }}">
                    <label for="address" class="col-sm-4 control-label">@lang('app.address')</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="address" value="{{ old('address')? old('address') : $user->address }}" name="address" placeholder="@lang('app.address')">
                        {!! e_form_error('address', $errors) !!}
                    </div>
                </div> --}}


                <hr />

                <div class="form-group row">
                    <div class="col-sm-8 col-sm-offset-4">
                        <button type="submit" class="btn btn-primary">Save Profile</button>
                    </div>
                </div>


            </form>

            @else
            <form action="" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group row {{ $errors->has('name')? 'has-error':'' }}">
                    <label for="name" class="col-sm-4 control-label">@lang('app.name')</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="name" value="{{ old('name')? old('name') : $user->name }}" name="name" placeholder="@lang('app.name')">
                        {!! e_form_error('name', $errors) !!}
                    </div>
                </div>

                <div class="form-group row {{ $errors->has('email')? 'has-error':'' }}">
                    <label for="email" class="col-sm-4 control-label">@lang('app.email')</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="email" value="{{ old('email')? old('email') : $user->email }}" name="email" placeholder="@lang('app.email')">
                        {!! e_form_error('email', $errors) !!}
                    </div>
                </div>

                <div class="form-group row {{ $errors->has('gender')? 'has-error':'' }}">
                    <label for="gender" class="col-sm-4 control-label">@lang('app.gender')</label>
                    <div class="col-sm-8">
                        <select id="gender" name="gender" class="form-control select2">
                            <option value="">Select Gender</option>
                            <option value="male" {{ $user->gender == 'male'?'selected':'' }}>Male</option>
                            <option value="female" {{ $user->gender == 'female'?'selected':'' }}>Fe-Male</option>
                            <option value="third_gender" {{ $user->gender == 'third_gender'?'selected':'' }}>Third Gender</option>
                        </select>
                        {!! e_form_error('gender', $errors) !!}
                    </div>
                </div>

                <div class="form-group row {{ $errors->has('phone')? 'has-error':'' }}">
                    <label for="phone" class="col-sm-4 control-label">@lang('app.phone')</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="phone" value="{{ old('phone')? old('phone') : $user->phone }}" name="phone" placeholder="@lang('app.phone')">
                        {!! e_form_error('phone', $errors) !!}
                    </div>
                </div>

                <div class="form-group row {{ $errors->has('country_id')? 'has-error':'' }}">
                    <label for="phone" class="col-sm-4 control-label">@lang('app.country')</label>
                    <div class="col-sm-8">
                        <select id="country_id" name="country_id" class="form-control select2">
                            <option value="">@lang('app.select_a_country')</option>
                            @foreach($countries as $country)
                                <option value="{{ $country->id }}" {{ $user->country_id == $country->id ? 'selected' :'' }}>{{ $country->country_name }}</option>
                            @endforeach
                        </select>
                        {!! e_form_error('country_id', $errors) !!}
                    </div>
                </div>

                <div class="form-group row {{ $errors->has('address')? 'has-error':'' }}">
                    <label for="address" class="col-sm-4 control-label">@lang('app.address')</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="address" value="{{ old('address')? old('address') : $user->address }}" name="address" placeholder="@lang('app.address')">
                        {!! e_form_error('address', $errors) !!}
                    </div>
                </div>


                <hr />

                <div class="form-group row">
                    <div class="col-sm-8 col-sm-offset-4">
                        <button type="submit" class="btn btn-primary">@lang('app.edit')</button>
                    </div>
                </div>


            </form>
            @endif

        </div>
    </div>



@endsection