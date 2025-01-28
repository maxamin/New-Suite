@extends('admin.layouts.app')
@section('panel')
    <div class="row mb-none-30">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive--sm">
                        <div id="tableBlock">
                            <table class="table table--light style--two">
                            <thead id="tableHead">
                                <tr>
                                    <th scope="col">@lang('Name')</th>
                                    <th scope="col">@lang('Min')</th>
                                    <th scope="col">@lang('Max')</th>
                                    <th scope="col">@lang('Profit')</th>
                                    <th scope="col">@lang('Type')</th>
                                    <th scope="col">@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                @forelse($trade_lavels as $lev)
                                    <tr>
                                        <td data-label="@lang('Name')">{{ $lev->name }}</td>
                                        <td data-label="@lang('Min')">{{ $lev->min }}</td>
                                        <td data-label="@lang('Max')">{{ $lev->max }}</td>
                                        <td data-label="@lang('Profit')">{{ $lev->profit }} %</td>
                                        <td data-label="@lang('Type')">
                                            @if ( $lev->type=='+' )
                                                <span class="badge badge--success">@lang('Plus')</span>
                                            @else
                                                <span class="badge badge--danger text-light">@lang('Minus')</span>
                                            @endif
                                        </td>
                                        <td data-label="@lang('Action')">
                                            <button class="btn btn-outline--primary btn-sm levelBtn"
                                                data-id="{{ $lev->id }}"
                                                data-name="{{ $lev->name }}"
                                                data-min="{{ $lev->min }}"
                                                data-max="{{ $lev->max }}"
                                                data-profit="{{ $lev->profit }}"
                                                data-type="{{ $lev->type }}"
                                                data-act="Edit">
                                                <i class="la la-pencil"></i> @lang('Edit')
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="levelModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><span class="act"></span> @lang('Trade Level')</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>
                <form id="addModalForm">
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">@lang('Level Name') </label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="@lang('Level Name')" required>
                        </div>
                        <div class="form-group">
                            <label for="min">@lang('Minimum') </label>
                            <div class="input-group">
                                <input type="number" class="form-control has-append" name="min" id="min" placeholder="@lang('Enter Minimum Limit')" required>
                                <div class="input-group-text">{{ $general->cur_text }}</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="max">@lang('Maximum') </label>
                            <div class="input-group">
                                <input type="number" class="form-control has-append" name="max" id="max" placeholder="@lang('Enter Maximum Limit')" required>
                                <div class="input-group-text">{{ $general->cur_text }}</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="profit">@lang('Profit') </label>
                            <div class="input-group">
                                <input type="number" class="form-control has-append" name="profit" id="profit" placeholder="@lang('Enter Profit')" required>
                                <div class="input-group-text">%</div>
                            </div>
                        </div>
                        <label for="type">@lang('Profit Type') </label>
                        <select class="form-select form-control selectType" name="type" required>
                            <option>Profit Type</option>
                            <option value="+">Plus</option>
                            <option value="-">Minus</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn--primary w-100 submitBtn">@lang('Submit')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('breadcrumb-plugins')
    <button class="btn btn-outline--primary btn-sm levelBtn" data-id="0" data-act="Add" data-bs-toggle="modal"
        data-bs-target="#levelModal"><i class="las la-plus"></i> @lang('Add New')</button>
@endpush

@push('script')
    <script>

        $(document).on('click', '.submitBtn', function (e) {
            e.preventDefault();
            let formData = new FormData($("#addModalForm")[0])
            $.ajax({
                type: "POST",
                url: "{{ route('admin.trade.level.store') }}",
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function (res) {
                    // console.log(res);
                    $("#levelModal").modal('hide');
                    $("#addModalForm")[0].reset();
                    //---For Load Table Body---
                    $('#tableBlock').load(location.href+' #tableBlock');
                    notifyMsg(res.msg, res.cls)
                }
            });
        });

        $(document).on('click','.levelBtn', function (e) {
            e.preventDefault();
            var modal = $('#levelModal');
            let type = $(this).data('type');
            modal.find('.act').text($(this).data('act'));
            modal.find('input[name=id]').val($(this).data('id'));
            modal.find('input[name=name]').val($(this).data('name'));
            modal.find('input[name=min]').val($(this).data('min'));
            modal.find('input[name=max]').val($(this).data('max'));
            modal.find('input[name=profit]').val($(this).data('profit'));
            $(`.selectType option[value='${type}']`).prop('selected', true);

            if ($(this).data('id') == 0) {
                modal.find('form')[0].reset();
            }
            modal.modal('show');
        });
    </script>
@endpush
