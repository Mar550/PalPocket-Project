@extends('layouts.app')

@section('content')

<!--  Edit Modal -->
<div  id="staticBackdropEd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">  EDIT INCOME </h5>
        <br>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form id="form" method="POST" action="{{ route('income.update',$income->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
            <div class="input-group mb-3">
                <input id="description" class="form-control" type="text" placeholder="Description" name="description" value="{!! $income->description !!}">
            </div>
            <span> {{ $errors->first('description')}} </span>

            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong id="descriptionError">{{ $message }}</strong>
                </span> 
            @enderror           

            <div class="input-group mb-3">
                <input id="amount" type="text" class="form-control" name="amount" placeholder="Amount" aria-label="Amount (to the nearest dollar)" value="{!! $income->amount !!}">
                <div class="input-group-append">
                    <span class="input-group-text"> € </span>
                </div>
            </div>
            <span> {{ $errors->first('amount')}} </span>

            @error('amount')
                <span class="invalid-feedback" role="alert">
                    <strong id="amountError">{{ $message }}</strong>
                </span> 
            @enderror

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Date</span>
                </div>
                <input type="date" id="date" class="form-control" name="date" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="{!! $income->date !!}">
            </div>
            <span> {{ $errors->first('date')}} </span>

            @error('date')
                <span class="invalid-feedback" role="alert">
                    <strong id="dateError">{{ $message }}</strong>
                </span> 
            @enderror
            
            <div class="input-group mb-3">
                <input id="receipt" type="file" class="form-control" name="receipt" value="{!! $income->receipt !!}">
                    @error('receipt')
                        <span class="invalid-feedback" role="alert">
                            <strong id="receiptError">{{ $message }}</strong>
                        </span> 
                    @enderror
            </div>
            <span> {{ $errors->first('receipt')}} </span>

            <div class="modal-footer">
        <button type="submit"  class="btn btn-primary"> Edit </button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>

        </form>
      </div>     
    </div>
  </div>
</div>
</div>
<br>
<br>
<!--  End Edit Modal -->

@endsection
