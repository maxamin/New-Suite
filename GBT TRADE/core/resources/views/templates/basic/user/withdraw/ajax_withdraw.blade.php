<form id="withdrawForm" action="{{ route('user.withdraw.money') }}" method="post">
    @csrf

    <div class="main-container">
        <div class="container mb-4">
            <p class="text-center text-secondary mb-1">Enter Amount to Withdraw</p>
            <div class="form-group mb-1">
                <input type="number" step="any" name="withdraw_amount" value="{{ old('withdraw_amount') }}"
                    class="form-control large-gift-card border" autocomplete="off" placeholder="00.00" required>
            </div>
            <p class="text-center text-secondary mb-4">
                Available: <span class="text-success">{{ $general->cur_sym }} {{ showAmount(auth()->user()->balance) }}</span>
            </p>
            <div class="form-group position-relative" hidden>
                <div class="bottom-right mb-1 mr-1">
                    <button class="btn btn-sm btn-success rounded">Apply</button>
                </div>
                <input type="text" class="form-control" placeholder="Promo Code (optional)">
            </div>
        </div>

        <div class="container mb-3 d-none">
            <div class="card bg-default">
                <div class="card-header">
                    <div class="row">
                        <div class="col-auto">
                            <div class="custom-control custom-switch">
                                <input type="radio" class="custom-control-input" id="pay3"
                                    checked="">
                                <label class="custom-control-label" for="pay3"></label>
                            </div>
                        </div>

                        <div class="col pl-0">
                            <h6 class="subtitle mb-0">Withdraw Via</h6>
                        </div>
                        <div class="col-5">
                            <select style="height: fit-content;" class="form-control form-select p-0 ps-1"
                                name="withdraw_method_code">
                                <option value="">@lang('Gateway')</option>
                                @foreach ($withdrawMethod as $data)
                                    <option value="{{ $data->id }}" data-resource="{{ $data }}">
                                        {{ __($data->name) }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <style>
            /* gateway-section */
            .methodItem {
                padding: 10px;
                border-radius: 11px;
                border: 1px solid #dee2e6;
                cursor: pointer;
                background: #ffffff6e;
            }

            .methodActive {
                background: #ffcf5d6e;
                border: 2px solid #ffc107 !important;
            }

            .methodItem img {
                max-width: 110px;
                width: 100%;
                transition: transform .2s;
            }

            .methodItem img:hover {
                transform: scale(1.1);
            }
        </style>
        <div class=" methodItemBody my-3">
            <h6 class="text-center mb-3">
                <i class="las la-wallet"></i> <u>Select Withdraw Method</u>
            </h6>
            <div class="row justify-content-center">
                @foreach ($withdrawMethod as $data)
                    <div class="col-4">
                        <div class="methodItem text-center" data-method="{{ $data }}">
                            <img width="100%" src="{{ getImage(imagePath()['gateway']['path'] . '/' . $data->image, imagePath()['gateway']['path']) }}" alt="">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="container mb-4 withdraw-preview-details d-none">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <ul class="list-group list-group-flush payment-list">
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>@lang('Limit')</span>
                                    <span><span class="min fw-bold">0</span> {{ __($general->cur_text) }} -
                                        <span class="max fw-bold">0</span> {{ __($general->cur_text) }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>@lang('Charge')</span>
                                    <span><span class="charge fw-bold">0</span>
                                        {{ __($general->cur_text) }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>@lang('Receivable')</span> <span><span class="receivable fw-bold">
                                            0</span> {{ __($general->cur_text) }} </span>
                                </li>
                                <li class="list-group-item d-none justify-content-between rate-element">

                                </li>
                                <li class="list-group-item d-none justify-content-between in-site-cur">
                                    <span>@lang('In') <span class="base-currency"></span></span>
                                    <strong class="final_amo">0</strong>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-5"></div>



        <div class="container text-center align-custom-bottom">
            <button type="submit" class="btn btn-default mb-3 mx-auto rounded w-100">Withdraw Money</button>
        </div>
    </div>
</form>
