@extends('admin.partials.master')
@section('admin_content')
    <section id="dashboard-ecommerce">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4 class="card-title">
                            <div class="d-flex justify-content-between">
                                <div>{{$title}} Payment Lists</div>
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
                                        <th>Payment Info</th>
                                        <th>Payment Amounts</th>
                                        <th>Payment Operation</th>
                                        <th>Active</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($payments as $key => $row)
                                        <tr>
                                            <td>{{$key + 1}}</td>
                                            <td>
                                                <small>
                                                    Name: {{$row->user->name ?? '--'}}  <br>
                                                    Username: {{$row->user->username ?? '--'}}  <br>
                                                    Ref_id: {{$row->user->ref_id ?? '--'}} <br>
                                                </small>
                                            </td>
                                            <td>
                                                <small>
                                                    Payment Number: <strong> {{$row->order_id}} </strong> <br>
                                                    Transaction ID: <strong>{{$row->transaction_id}}</strong><br>
                                                    Date : {{$row->date}}
                                                </small>
                                            </td>
                                            <td>
                                                <small>
                                                    Payment Amount: {{price($row->amount)}} <br>
                                                    Payment Charge: {{price($row->charge_amount)}} <br>
                                                    Final Add Amount : {{price($row->final_amount)}}
                                                </small>
                                            </td>
                                            <td>
                                                <small>
                                                    Status: <span class="badge @if($row->status == 'pending') badge-warning @elseif($row->status == 'approved') badge-success  @elseif($row->status == 'rejected') badge-danger @endif" style="font-size: 8px">{{$row->status}}</span> <br>
                                                    Method Name: {{$row->method_name}} <br>
                                                    Method Number: {{$row->method_number}} <br>
                                                </small>
                                            </td>
                                            <td>
                                                @if($row->status == 'pending')
                                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal{{$row->id}}" class="btn btn-success">Action</a>
                                                    <form action="{{route('payment.status.change', $row->id)}}" method="POST">@csrf
                                                        <div class="modal fade" id="myModal{{$row->id}}">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">

                                                                    <!-- Modal Header -->
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Action for payment</h4>
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    </div>

                                                                    <!-- Modal body -->
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label for="status">Status <small class="text-info">When you select approved. balance will be added in user balance</small> </label>
                                                                            <select name="status" required id="status" class="form-control">
                                                                                <option value="approved" @if($row->status == 'approved') selected @endif>Approved</option>
                                                                                <option value="rejected" @if($row->status == 'rejected') selected @endif>Rejected</option>
                                                                                <option value="pending" @if($row->status == 'pending') selected @endif>Pending</option>
                                                                            </select>
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


