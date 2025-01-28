@extends("app.layout.ozo")

@push("page_title") Team @endpush

@push('top-nav')
white
@endpush

@section('content')
@include("app.layout.ozo_header_nav")

<div class="team">
    <div class="title">
        <p>Performance</p>
        <div>
            <button>
                <p>Earned</p>
                <p>{{ price($totalCommission) }}</p>
            </button>

            <button>
                <p>investment</p>
                <p>{{ price($totalInvest) }}</p>
            </button>
        </div>
        <div class="mt-10">
            <button>
                <p>Active Members</p>
                <p>{{ $ActiveMemberstotal }}</p>
            </button>

            <button>
                <p>Inactive Members</p>
                <p>{{ $totalTeamMember }}</p>
            </button>
        </div>
    </div>

    <div class="rank">
        <div class="tabs">
            <button type="button" class="@if($lev_id == 1) active @endif" onclick="window.location='{{ route('user.team', ['id' => 1]) }}';">Level 1</button>
            <button type="button" class="@if($lev_id == 2) active @endif" onclick="window.location='{{ route('user.team', ['id' => 2]) }}';">Level 2</button>
            <button type="button" class="@if($lev_id == 3) active @endif" onclick="window.location='{{ route('user.team', ['id' => 3]) }}';">Level 3</button>
        </div>
    </div>

    <div class="rank">
        <p>Rank List</p>
        <table>
            <thead>
                <tr><th>SN</th> <th>Member</th> <th>Assets</th></tr>
            </thead>

            <tbody>
            @php
                $lastUsers = collect($levelUsers)->reverse()->take(10)->reverse();
            @endphp

            @foreach($lastUsers as $user)

            @php
                $team_size = DB::table('users')->where('ref_by', $user->ref_id)->count();
                $total_assets = DB::table('purchases')->where('user_id', $user->id)->sum('amount');
                $formattedDateTime = \Carbon\Carbon::parse($user->created_at)->format('H:i d/m/y');
            @endphp
                <tr><td>{{ $loop->iteration }}</td> <td>{{ substr_replace($user->phone, str_repeat("*", 3), 3, 3) }}</td> <td>{{ price($total_assets) }}</td></tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('script')
@endpush