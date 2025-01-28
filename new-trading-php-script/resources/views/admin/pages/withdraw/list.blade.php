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
                                        <th>User</th>
                                        <th>Method</th>
                                        <th>Number</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Active</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    use App\Models\Deposit;use App\Models\User;use App\Models\Withdrawal;
                                    ?>
                                    @foreach($withdraws as $key => $row)

                                        <?php
                                        $myDeposit = Deposit::where('user_id', $row->user->id)->where('status', 'approved')->sum('amount');
                                        $myWithdraw = Withdrawal::where('user_id', $row->user->id)->where('status', 'approved')->sum('amount');
                                        ?>


                                        <tr>
                                            <td>{{$key + 1}}</td>
                                            <td>
                                               Phone:  {{$row->user->phone ?? '--'}}<br>
                                                            UID:       {{$row->user->ref_id ?? '--'}}<br>
                                                My Deposit: {{price($myDeposit)}} <br>
                                                My Withdraw: {{price($myWithdraw)}}
                                            </td>
                                            
                                            <td>
                                                {{$row->method_name}}
                                            </td>
                                            <td>
                                                {{$row->number}}
                                            </td>
                                            <td>
                                                {{price($row->final_amount)}}
                                            </td>
                                            <td>
                                                <span class="badge @if($row->status == 'pending') badge-warning @elseif($row->status == 'approved') badge-success  @elseif($row->status == 'rejected') badge-danger @endif" style="font-size: 8px">{{$row->status}}</span>
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


