@extends('admin.partials.master')
@section('admin_content')
    <section id="dashboard-ecommerce">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4 class="card-title">
                            <div class="d-flex justify-content-between">
                                <div>{{$title}} Withdraw Lists</div>
                            </div>
                        </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table table-striped dataex-html5-selectors">
                                    <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>User Info</th>
                                        <th>Withdraw Info</th>
                                        <th>Amount Amounts</th>
                                        <th>Withdraw Operation</th>
                                        <th>Active</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($withdraws as $key => $row)
                                        <tr>
                                            <td>{{$key + 1}}</td>
                                            <td>
                                                <small>
                                                    Name: {{$row->user->name ?? '--'}}  <br>
                                                    Username: {{$row->user->username ?? '--'}}  <br>
                                                    Phone: {{$row->user->phone ?? '--'}}  <br>
                                                    Ref id: {{$row->user->ref_id ?? '--'}} <br>
                                                    Ref by: {{$row->user->ref_by ?? '--'}} <br>
                                                </small>
                                            </td>

                                            @php
                                                $bankinfo = ($row->account_info) ? json_decode($row->account_info, true) : '';

                                                $accountNumber = ($bankinfo) ? $bankinfo['bank_account'] : '-';
                                                $accountName = ($bankinfo) ? $bankinfo['full_name'] : '-';
                                                $bankName = ($bankinfo) ? $bankinfo['bank_name'] : '-';
                                                $bankCode = ($bankinfo) ? $bankinfo['bank_code'] : '-';
                                                $swiftCode = ($bankinfo) ? $bankinfo['swift_code'] : '-';
                                            @endphp

                                            <td>
                                                <small>
                                                    {{-- Withdraw Method: {{$row->method_name ? $row->method_name : '---'}} <br> --}}
                                                    Receiver Account: <b>{{$bankName}} | {{$accountNumber}} | {{$accountName}}</b> <br>
                                                    Swift/IFSC Code: <b>{{$swiftCode}}</b> <br>
                                                    Withdraw Order Number: {{$row->trx}} <br>
                                                    Date : {{$row->created_at}}
                                                </small>
                                            </td>
                                            <td>
                                                @if($row->usdt > 0)
                                                    <small>
                                                        USDT Amount: {{$row->usdt}} <br>
                                                        USDT Charge: {{setting('withdraw_charge_usdt')}}usdt <br>
                                                    </small>
                                                @else
                                                    <small>
                                                        Withdraw Amount: {{price($row->amount)}} <br>
                                                        Withdraw Charge: {{price($row->charge)}} <br>
                                                        Final Amount : {{price($row->final_amount)}}
                                                    </small>
                                                @endif
                                            </td>
                                            <td>
                                                <small>
                                                    Status: <span class="badge @if($row->status == 'pending') badge-warning @elseif($row->status == 'approved') badge-success  @elseif($row->status == 'rejected') badge-danger @endif" style="font-size: 8px">{{$row->status}}</span> <br>
                                                    Amount Rate: <strong> {{setting('rate')}} for usdt </strong> <br>
                                                    Currency: <strong>{{$row->currency}}</strong>
                                                </small>
                                            </td>
                                            <td>
                                                @if($row->status == 'pending')
                                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal{{$row->id}}" class="btn btn-success">Action</a>
                                                    <form action="{{route('withdraw.status.change', $row->id)}}" method="POST">@csrf
                                                        <div class="modal fade" id="myModal{{$row->id}}">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">

                                                                    <!-- Modal Header -->
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Action for withdraw</h4>
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    </div>

                                                                    <!-- Modal body -->
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label for="status">Status <small class="text-info"> You can change withdraw status link approved, rejected, pending is default </small> </label>
                                                                            <select name="status" required id="status" class="form-control">
                                                                                <option value="approved" @if($row->status == 'approved') selected @endif>Approved</option>
                                                                                <option value="rejected" @if($row->status == 'rejected') selected @endif>Rejected</option>
                                                                                <option value="pending" @if($row->status == 'pending') selected @endif>Pending</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="transfer_type">Payout Type <small class="text-info"> This action works if status you selected as Approved </small> </label>
                                                                            <select name="transfer_type" required id="transfer_type" class="form-control">
                                                                                <option value="auto" @if($row->status == 'approved') selected @endif>Automatic (Via {{ strtoupper($setting->auto_transfer_default) }})</option>
                                                                                <option value="manual" @if($row->status == 'rejected') selected @endif>Manual</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="note">Trx ID </label>
                                                                            <input name="trx" id="trx" class="form-control is-valid" placeholder="Enter send money trx id">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="note">Feedback Note <small class="text-success">(Optional)</small> </label>
                                                                            <textarea name="note" id="note" cols="30"
                                                                                      rows="4" class="form-control is-valid"></textarea>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Modal footer -->
                                                                    <div class="modal-footer">
                                                                        <input type="submit" value="Submit" class="btn btn-primary">
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                @else
                                                    <div class="text-info">Already push a action</div>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


