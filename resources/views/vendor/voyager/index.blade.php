@extends('voyager::master')

@section('content')
    <div class="page-content">
        @include('voyager::alerts')
        @include('voyager::dimmers')
        <div class="analytics-container">
            
                <p id="msg" style="border-radius:4px; font-weight:600; padding:20px; background:#fff; margin:0; color:#999; text-align:center;">
                   Dashboard
                </p>          
                       
        </div>
    </div>   
@stop

@section('javascript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"
integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    function refresh() {
        axios.get('/new-request').then(function(response){
            var data = response.data;
            if(data.totalNewRequestsCount>0){
                toastr.success(data.msg)
                document.getElementById('msg').innerHTML = data.msg

                // add these data from data.newRequests to that table
                
            }
            else{
                document.getElementById('msg').innerText= data.msg
            }
        })
        window.setTimeout(refresh, 5000);
    }

    refresh();
</script>
@stop
