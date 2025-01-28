@extends('admin.partials.master')
@section('admin_content')
    <section id="dashboard-ecommerce">
        <div class="row">
            <div class="col-md-8 col-12 offset-md-2">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="text-center">
                                        <h5>Username: {{ $user->username }}</h5>
                                        <p>You can update user details the way you wish</p>
                                    </div>
                                    <form action="{{route('admin.customer.update_submit')}}" method="post" enctype="multipart/form-data">@csrf

                                        <div class="form-group">
                                            <label for="vip_id">VIP Type</label>
                                            <select name="vip_id"  class="form-control is-valid" required>
                                                @foreach($vipTypes as $type)
                                                    <option value="{{ $type->id }}" @if($user->vip->id == $type->id) selected @endif>{{ $type->name }}</option>
                                                @endforeach

                                            </select>
                                            <div class="valid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                Note: This is filed is required
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="name">Recharge Balance</label>
                                            <input type="number" name="balance" class="form-control is-valid" required value="{{ $user->balance ?? '' }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="name">Earn Balance</label>
                                            <input type="number" name="income" class="form-control is-valid" required value="{{ $user->income ?? '' }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="name">Pending Earn Balance</label>
                                            <input type="number" name="receive_able_amount" class="form-control is-valid" required value="{{ $user->receive_able_amount ?? '' }}">
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label for="">Open Deposit</label>
                                                <select name="open_deposit"  class="form-control">
                                                    <option value="1" @if($user->open_deposit == 1) selected @endif>Yes</option>
                                                    <option value="0" @if($user->open_deposit == 0) selected @endif>No</option>

                                                </select>
                                            </div>

                                            <div class="form-group col-sm-6">
                                                <label for="">Open Payout</label>
                                                <select name="open_payout"  class="form-control">
                                                    <option value="1" @if($user->open_payout == 1) selected @endif>Yes</option>
                                                    <option value="0" @if($user->open_payout == 0) selected @endif>No</option>

                                                </select>
                                            </div>

                                            <div class="form-group col-sm-6">
                                                <label for="">Can receive daily earn</label>
                                                <select name="receive_daily_earn"  class="form-control">
                                                    <option value="1" @if($user->receive_daily_earn == 1) selected @endif>Yes</option>
                                                    <option value="0" @if($user->receive_daily_earn == 0) selected @endif>No</option>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select name="status" required id="status" class="form-control">
                                                <option value="active" @if($user->status == 'active') selected @endif>Active</option>
                                                <option value="inactive" @if($user->status == 'inactive') selected @endif>Inactive</option>
                                            </select>
                                        </div>

                                        <input type="hidden" name="id" value="{{ $user->id }}">

                                        <div class="form-group text-center">
                                            <button class="btn btn-success" type="submit">Update Information</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


