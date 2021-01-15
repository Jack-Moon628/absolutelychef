@extends('layouts.dashboard')


@section('content')

    <div class="row mb-4">
        <div class="col-md-5">
            @lang('app.total') : {{$payments->total()}}
        </div>

        <div class="col-md-7">
            <form class="form-inline" method="get" action="">
                <div class="form-group">
                    <input type="text" name="q" value="{{request('q')}}" class="form-control" placeholder="@lang('app.payer_email')">
                </div>
                <button type="submit" class="btn btn-secondary">@lang('app.search')</button>
            </form>

        </div>
    </div>


    <div class="row">
        <div class="col-md-12">

            @if($payments->count() > 0)
                <table class="table table-hover">

                    <tr>
                        <th>@lang('app.name')</th>
                        <th>@lang('app.amount')</th>
                        <th>@lang('app.method')</th>
                        <th>@lang('app.time')</th>
                        <th>#</th>
                    </tr>

                    @foreach($payments as $payment)
                        <tr>
                            <td>
                                <a href="{{route('payment_view', $payment->id)}}">
                                    <i class="la la-user"></i> {{$payment->user->name}} <br />
                                    <i class="la la-building-o"></i> {{$payment->user->company}}
                                </a>
                            </td>
                            <td>{!! get_amount($payment->amount) !!}</td>
                            <td>{{ $payment->transactionDetail()->payment_service_type }}</td>
                            <td><span data-toggle="tooltip" title="{{$payment->created_at->format('F d, Y h:i a')}}">{{$payment->created_at->format('F d, Y')}}</span></td>

                            <td>
                                @if($payment->transactionDetail()->status  == 'PAID')
                                    <span class="text-success" data-toggle="tooltip" title="{{$payment->status}}"><i class="la la-check-circle-o"></i> </span>
                                @else
                                    <span class="text-danger" data-toggle="tooltip" title="{{$payment->status}}"><i class="la la-exclamation-circle"></i> </span>
                                @endif

                                <a href="{{route('payment_view', $payment->id)}}" class="btn btn-primary ml-2"><i class="la la-eye"></i> </a>
                            </td>

                        </tr>
                    @endforeach

                </table>

                {!! $payments->links() !!}

            @else
            <div class="row">
                <div class="col-md-12">
                    <div class="no data-wrap py-5 my-5 text-center">
                        <h1 class="display-1"><i class="la la-frown-o"></i> </h1>
                        <h1>No Data available here</h1>
                    </div>
                </div>
            </div>
            @endif


        </div>
    </div>



@endsection