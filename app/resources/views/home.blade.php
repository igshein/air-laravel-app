@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!<br>

                    @php
                         // dd($results)
                    @endphp

                    <ul>
                    @foreach($results as $result)
                        <li>{{$result->event_date_number_year}}</li>

                        @if (!empty($result->mouth))
                            <ul>
                                @foreach($result->mouth as $mouths)
                                    @php
                                        ## For debug
                                        $dateObj   = DateTime::createFromFormat('!m', $mouths->event_date_number_mouth);
                                        $monthName = $dateObj->format('F');
                                    @endphp
                                    <li>{{ $monthName }}</li>

                                    @if (!empty($mouths->day))
                                    <ul>
                                        @foreach($mouths->day as $days)
                                        <li>{{ $days->event_date_number_day }}</li>
                                        @if (!empty($days->bloggerEvent))
                                        <ul>
                                            @foreach($days->bloggerEvent as $bloggersEvents)
                                            <li style="border: 1px solid #999; margin-bottom: 5px;">
                                                Event: {{ $bloggersEvents->event_name }}<br>
                                                Blogger: {{ $bloggersEvents->blogger_name }}<br>
                                                Order: {{ $bloggersEvents->blogger_event_order }}
                                            </li>
                                            @endforeach
                                        </ul>
                                        @endif
                                        @endforeach
                                    </ul>
                                    @endif

                                @endforeach
                            </ul>
                        @endif

                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
