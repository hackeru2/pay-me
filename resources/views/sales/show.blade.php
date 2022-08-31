@extends('sales.layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Sale</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('sales.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach ($sale->toArray() as $key => $item)
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{$key }}:</strong>
                {{  $item }}
            </div>
        </div>    
        @endforeach
     </div>
   
@endsection