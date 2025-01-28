@extends($activeTemplate.'layouts.master')
@section('content')
<body class="body-scroll d-flex flex-column h-100 menu-overlay" data-page="homepage">
    <!-- Top navbar -->
    @include($activeTemplate . 'includes.side_nav')

    <!-- Begin page content -->
    <main class="flex-shrink-0 main has-footer">
        <!-- Fixed navbar -->
        @include($activeTemplate . 'includes.top_nav')
        <div class="cmn-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="title">@lang('KYC Form')</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{route('user.kyc.submit')}}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <x-viser-form identifier="act" identifierValue="kyc"></x-viser-form>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-default border-0 w-100">@lang('Submit')</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
@endsection
