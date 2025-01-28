@extends($activeTemplate . 'layouts.master')
@section('content')
@php
    $items = getContent('community.element');
@endphp


    <body class="body-scroll d-flex flex-column h-100 menu-overlay" data-page="homepage">
        <!-- Top navbar -->
        @include($activeTemplate . 'includes.side_nav')

        <!-- Begin page content -->
        <main class="flex-shrink-0 main has-footer">
            <!-- Fixed navbar -->
            @include($activeTemplate . 'includes.top_nav')

            {{-- <!-- Balance Card -->
            @include('templates.basic.component.balance_card') --}}

            <div class="card mb-3">
                <div class="card-body py-2">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="text-shadow mb-0 text-center">Community</h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="main-container">
                <div class="container">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="row">
                                @foreach ($items as $item)
                                    <div class="col-3 text-center">
                                        <a href="{{@$item->data_values->links}}" class="card-box">
                                            <img src="{{ getImage('assets/images/frontend/community/' . @$item->data_values->image) }}"
                                                style="max-width: 60px; max-height: 60px;" alt="">
                                            <p>{{@$item->data_values->name}}</p>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- footer-->
        @include($activeTemplate . 'includes.bottom_nav')

    </body>
@endsection
