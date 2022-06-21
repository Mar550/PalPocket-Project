@extends('layouts.app')

@section('content')

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">     
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">  NEW CHART </h5>
            </div>

            <div class="modal-body">
                <form id="form" method="POST" action="{{ route('chart.store') }}" enctype="multipart/form-data">
                @csrf
                
                <div class="spanchart">
                    <p class="spantext"> Type </p>
                    <select class="form-select" aria-label="Default select example" name="type">
                        <option selected> Choose an option </option>
                        <option value="1"> Income </option>
                        <option value="2"> Expense </option>
                        <option value="3"> Gross Revenue </option>
                    </select>
                </div>
                <br>
                <div class="spanchart">
                    <p class="spantext"> Period </p>
                    <select class="form-select" aria-label="Default select example" name="period">
                        <option selected> Choose an option </option>
                        <option value="1"> Daily </option>
                        <option value="2"> Monthly </option>
                        <option value="3"> Yearly </option>
                    </select>
                </div>

                <br>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default"> From </span>
                    </div>
                    <input type="date" id="date" class="form-control" name="from" aria-label="Default" aria-describedby="inputGroup-sizing-default" >
                </div>


                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default"> To </span>
                    </div>
                    <input type="date" id="date" class="form-control" name="to" aria-label="Default" aria-describedby="inputGroup-sizing-default" >
                </div>

                <div class="modal-footer">
                    <button type="submit"  class="btn btn-primary"> Create </button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>

                </form>

                
                
            </div>     
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $("#staticBackdrop").modal('show');
    });
</script>
@endsection




