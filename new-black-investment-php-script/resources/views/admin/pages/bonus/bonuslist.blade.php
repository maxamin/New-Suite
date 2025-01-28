@extends('admin.partials.master')
@section('admin_content')
    <section id="dashboard-ecommerce">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4 class="card-title">
                            <div class="d-flex justify-content-between">
                                <div>Bonus Uses Lists</div>
                                {{-- <div><a href="{{route('admin.bonus.create')}}" class="btn btn-primary btn-sm"> <i class="bx bx-plus"></i> Add New Item </a> </div> --}}
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
                                        <th>Date</th>
                                        <th>Customer info</th>
                                        <th>Bonus info</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($datas as $key => $row)
                                        <tr>
                                            <td>{{$key + 1}}</td>
                                            <td>
                                                {{$row->created_at->format('d M Y - h:i A') }}
                                            </td>
                                            <td>
                                                <small>
                                                    Username: {{$row->user->username ?? '--'}}  <br>
                                                    Ref id: {{$row->user->ref_id ?? '--'}} <br>
                                                    Earnings Balance: {{price($row->user->income ?? 0) }} <br>
                                                    Recharge Balance: {{price($row->user->balance ?? 0) }} <br>
                                                </small>
                                            </td>
                                            <td>
                                                <small>
                                                    Bonus Name: {{$row->bonus ? $row->bonus->bonus_name : '--'}}  <br>
                                                    Bonus Code:  {{$row->bonus ? $row->bonus->code : '--'}} <br>
                                                    Bonus Amount:  {{price($row->bonus ? $row->amount : 0)}} <br>
                                                    Uses Count:  <span class="badge badge-success">{{$row->bonus->counter ?? '--'}}</span> <br>
                                                </small>
                                            </td>
                                            <td>
                                                Approved
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


