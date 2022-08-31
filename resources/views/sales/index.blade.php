@extends('sales.layout')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Sales LIST</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('sales.create') }}"> Create New sale</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
@if($sales->count())
<table class="table table-bordered">
    <tr>
        <th>TIME</th>
        <th>Sale Number</th>
        <th>Product Name</th>
        <th>Amount</th>
        <th>Currency</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($sales as $i => $sale)
    <tr>
        <td>{{ $sale->created_at }}</td>
        <td>{{ $sale->payme_sale_code }}</td>
        <td>{{ $sale->description }}</td>
        <td>{{ $sale->price }}</td>
        <td>{{ $sale->currency }}</td>
        <td>
            <form action="{{ route('sales.destroy',$sale->id) }}" method="POST">
                 
                <a class="btn btn-warning center-block" style="margin-bottom:3px" href="{{ $sale->sale_url }}">Payment Link</a>
                <br>
                <a class="btn btn-info" href="{{ route('sales.show',$sale->id) }}">Show</a>

                <a class="btn btn-primary" href="{{ route('sales.edit',$sale->id) }}">Edit</a>

                @csrf
                @method('DELETE')
  
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@else 
<span>
    NOTHING TO SHOW
</span>
@endif
@endsection
