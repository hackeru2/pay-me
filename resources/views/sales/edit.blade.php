@extends('sales.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Sale</h2>
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
  
    <form action="{{ route('sales.update',$sale->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Name:</strong>
                    <input type="text" name="description" value="{{ $sale->description }}" class="form-control" placeholder="description">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Amount:</strong>
                    <input class="form-control" name="price" placeholder="price" value={{ $sale->price }} />
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Sale Number:</strong>
                    <input class="form-control" name="payme_sale_code" placeholder="payme sale code" value={{ $sale->payme_sale_code }} />
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong for="select">Currency</strong>
                 
                <select  id="currency" name="currency" class="form-control"   required="">
                 @foreach (['EUR','USD','ILS'] as $currency_option)
                 <option selected={{$currency_option == $sale->currency}}  value="{{$currency_option}}">{{$currency_option}}</option>
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