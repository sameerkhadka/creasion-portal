@extends('voyager::master')

@section('content')
    <div class="page-content">
        @include('voyager::alerts')
        @include('voyager::dimmers')
        @php
            $newRequests = \App\Models\UserRequest::with(['individual', 'institution', 'projects'])
                ->where('seen', null)
                ->orderBy('id', 'desc')
                ->take(10)
                ->get();
        @endphp
        <div class="analytics-container">
            <table class="table table-light">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Request From</th>
                        <th class="actions text-right dt-not-orderable sorting_disabled">Action</th>
                    </tr>
                </thead>
                <tbody id="requestBody">
                    
                </tbody>
            </table>

        </div>
    </div>
@stop

@section('javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"
        integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function refresh() {
            axios.get('/new-request').then(function(response) {
                var data = response.data;
                if (data.totalNewRequestsCount > 0) {
                    toastr.success(data.msg)
                    // add these data from data.newRequests to that table
                    $('#requestBody').html("");
                    let tbody = ""
                    data.newRequests.forEach((item, index) => {
                        var newData = false;
                        if (data.totalNewRequestsCount >= index + 1) {
                            newData = true;
                        }
                        tbody +=`<tr>
                                    <td class="${newData ? 'font-weight-500' : ''}">${index+1}</td>
                                    <td class="${newData ? 'font-weight-500' : ''}">${item.individual ? item.individual.name : item.institution.name}  ${ newData ? '<span class="badge badge-danger">new</span>' : '' }</td>
                                    <td><a href="/admin/responses/create?requestid=${item.id}" title="Response" class="btn btn-sm btn-success pull-right view" style="margin-right:4px">
                                            <i class="voyager-bulb"></i><span class="hidden-xs hidden-sm">Respond</span>
                                        </a>
                                    </td>
                                <tr>`
                    });
                    $('#requestBody').html(tbody);

                } else {}
            })
            window.setTimeout(refresh, 5000);
        }

        refresh();
    </script>
@stop
