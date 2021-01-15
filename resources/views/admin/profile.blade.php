@extends('layouts.dashboard')


@section('content')
    <div class="row">
        <div class="col-md-12">

            @if( ! empty($is_user_id_view))
                <a class="btn btn-primary mb-2" href="{{route('users_edit', $user->id)}}"><i class="la la-pencil-square-o"></i> @lang('app.edit') </a>
            @else
                <a class="btn btn-primary mb-2" href="{{ route('profile_edit') }}"><i class="la la-pencil-square-o"></i> @lang('app.edit') </a>
            @endif

            @if($user->is_employer() || $user->is_agent())
                <div class="profile-company-logo mb-3">
                    <img src="{{$user->logo_url}}" class="img-fluid" style="max-width: 100px;" />
                </div>
            @endif

            @if($user->is_user())
            <table class="table table-hover  mb-4">

                <tr>
                    <th>@lang('app.title')</th>
                    <td>{{ $user->title }}</td>
                </tr>
                
                <tr>
                    <th>@lang('app.name')</th>
                    <td>{{ $user->name }}</td>
                </tr>

                <tr>
                    <th>@lang('app.surename')</th>
                    <td>{{ $user->surename }}</td>
                </tr>

                <tr>
                    <th>@lang('app.postalcode')</th>
                    <td>{{ $user->postal_code }}</td>
                </tr>


                <tr>
                    <th>@lang('app.cv')</th>
                    <td>
                        @if($user->cv)
                        <a  target="_blank" href="{{ route('download_cv', ['file' => basename($user->cv)])  }}">download CV</a>
                        @else
                            
                        @endif
                    </td>
                </tr>

                <tr>
                    <th>@lang('app.email')</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th>@lang('app.home_phone')</th>
                    <td>{{ $info->home_phone }}</td>
                </tr>
                <tr>
                    <th>@lang('app.phone')</th>
                    <td>{{ $user->phone }}</td>
                </tr>


                <tr>
                    @php 
                    $website1 = json_decode($info->website_link1); 
                    $website2 = json_decode($info->website_link2); 
                    
                    @endphp
                    <th>@lang('app.website_link')</th>
                    <td><a href="{{ $website1->link  }}">{{ $website1->type  }}</a></td>
                </tr>


                <tr>
                    <th>@lang('app.website_link')</th>
                    <td><a href="{{ $website2->link  }}">{{ $website2->type  }}</a></td>
                </tr>

                <tr>
                    <th>@lang('app.employer_type')</th>
                    <td>
                        @php $employer_type = json_decode($info->employer_type, 1);  @endphp

                        @if(!empty($employer_type))    
                            @for ($i = 0; $i < count($employer_type); $i++)
                                {{ getEmployersTypes()[$employer_type[$i]] }}
                            @endfor
                        @endif

                    </td>
                </tr>
                <tr>
                    <th>@lang('app.experiences')</th>
                    <td>
                        @if(!empty($userExperiences))
                        @for ($i = 0; $i < count($userExperiences); $i++)
                           <span class="tags-panel"> {{ $userExperiences[$i]->name }}  </span> 
                        @endfor
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>@lang('app.experience_year')</th>
                    <td>
                        {{ $info->experience_year ? getExperiences()[$info->experience_year] : '' }}
                    </td>
                </tr>

                <tr>
                    <th>@lang('app.current_job')</th>
                    <td>{{ $info->current_job }}</td>
                </tr>

                <tr>
                    @php 
                    $currentSalary = json_decode($info->current_salary); 
                    @endphp
                    <th>@lang('app.current_salary')</th>
                    <td>{{ $currentSalary->type ? listSalary()[$currentSalary->type] : '' }} {{  $currentSalary->price }}</td>
                </tr>

                <tr>
                    <th>@lang('app.profile_langs')</th>
                    <td>
                        @php $langs = json_decode($info->languages);  @endphp
                        @if(!empty($langs))
                        @for ($i = 0; $i < count($langs); $i++)
                            <span class="tags-panel">
                                {{ get_languages()[$langs[$i]] }}  
                            </span>
                        @endfor
                        @endif
                    </td>
                </tr>


                <tr>
                    <th>@lang('app.desired_job')</th>
                    <td>{{ $info->desired_job }}</td>
                </tr>

                <tr>
                    <th>@lang('app.desired_location')</th>
                    <td>{{ $info->desired_location }}</td>
                </tr>

                
                <tr>
                    @php 
                    $desiredSalary = json_decode($info->deisred_salary); 
                    @endphp
                    <th>@lang('app.desired_salary')</th>
                    <td>{{ $desiredSalary->type ?  listSalary()[$desiredSalary->type]  : '' }}  {{  $desiredSalary->price }}</td>
                </tr>

                <tr>
                    @php 
                    $jobType = json_decode($info->job_type); 
                    @endphp
                    <th>@lang('app.job_type')</th>
                    <td>{{ $jobType->type ? listJobType()[$jobType->type] : '' }}  {{  $jobType->price }}</td>
                </tr>

                <tr>
                    <th>@lang('app.cover_letter')</th>
                    <td>{{ $info->cover_letter }}</td>
                </tr>

                <tr>
                    <th>@lang('app.summary')</th>
                    <td>{{ $info->summary }}</td>
                </tr>
                
                <tr>
                    <th>@lang('app.address')</th>
                    <td>{{ $user->address }}</td>
                </tr>
                <tr>
                    <th>@lang('app.country')</th>
                    <td>
                        @if($user->country)
                            {{ $user->country->name }}
                        @endif
                    </td>
                </tr>

                <tr>
                    <th>Registered at</th>
                    <td>{{ $user->signed_up_datetime() }}</td>
                </tr>
                <tr>
                    <th>@lang('app.status')</th>
                    <td>{{ $user->status_context() }}</td>
                </tr>
            </table>
            @endif




            @if($user->is_employer() || $user->is_agent())
                    <h3 class="mb-4">About Company</h3>

                    <table class="table table-bordered table-striped">
                    <tr>
                        <th>@lang('app.state')</th>
                        <td>{{ $user->state_name }}</td>
                    </tr>
                    <tr>
                        <th>@lang('app.city')</th>
                        <td>{{ $user->city }}</td>
                    </tr>

                    <tr>
                        <th>@lang('app.website')</th>
                        <td>{{ $user->website }}</td>
                    </tr>
                    <tr>
                        <th>@lang('app.company')</th>
                        <td>{{ $user->company }}</td>
                    </tr>
                    <tr>
                        <th>@lang('app.company_size')</th>
                        <td>{{company_size($user->company_size)}}</td>
                    </tr>
                    <tr>
                        <th>@lang('app.about_company')</th>
                        <td>{{ $user->about_company }}</td>
                    </tr>
                    <tr>
                        <th>@lang('app.premium_jobs_balance')</th>
                        <td>{{ $user->premium_jobs_balance }}</td>
                    </tr>
                </table>
            @endif


            @if( ! empty($is_user_id_view))
                <a href="{{route('users_edit', $user->id)}}"><i class="la la-pencil-square-o"></i> @lang('app.edit') </a>
            @else
                <a href="{{ route('profile_edit') }}"><i class="la la-pencil-square-o"></i> @lang('app.edit') </a>
            @endif


        </div>
    </div>



@endsection