@extends('sales.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Sale</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('sales.index') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('sales.store') }}" method="POST">
    @csrf
  
    
    <input name="payme_sale_id" type="hidden" value="{{'id'.date_default_timezone_get()}}">
    <input name="payme_sale_code" type="hidden" value="{{'code'.date_default_timezone_get()}}">
    <input name="transaction_id" type="hidden" value="{{'transaction'.date_default_timezone_get()}}">
    <input name="sale_payment_method" type="hidden" value="credit-card">
    <input name="sale_url" type="hidden" value="dummy-url">
    <input name="status_code" type="hidden" value="1">
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product Name:</strong>
                <input type="text" name="description" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Amount:</strong>
                <input class="form-control" name="price" placeholder="price"/>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Currency:</strong>
        <select  id="currency" name="currency" class="form-control"   required="">
            @foreach (['EUR','USD','ILS'] as $currency_option)
            <option value="{{$currency_option}}">{{$currency_option}}</option>
            @endforeach
        </select>
         </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection