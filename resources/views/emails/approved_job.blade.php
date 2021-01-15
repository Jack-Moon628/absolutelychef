@component('mail::message')

Hi {{$user->name}},

Your Job posted  approved

##Name

{{$job->job_title}}

##posation

{{$job->posation}}

## skills

{{$job->skills}}

Thanks,<br>
{{ get_option('site_name') }}
@endcomponent
