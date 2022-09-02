<!DOCTYPE html>
<html>
<head>
    <title>Order Page</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
 
  @if(Session::has('errors'))
  <div class="alert alert-danger">
     
      <b>Error code {{( head($errors->get('status_error_code'))  ) }}</b>
      <hr>
      @foreach ($errors->get('status_error_details') as $err_item)
      <p>{{$err_item}}</p>
      <p>Additional details : {{implode(',' , $errors->get('status_additional_info') )  }} </p>
      @endforeach
      @php
          Session::forget('errors');
      @endphp
  </div>
  @endif

  <div class="pull-right">
    <a class="btn btn-info" href="{{ route('sales.index') }}"> Sales Page</a>
</div>
  <div class="container mt-4">
    
  @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
  <div class="card">
    <div class="card-header text-center font-weight-bold">
      Create A sale
    </div>
    <div class="card-body">
      <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{url('store-form')}}">
       @csrf
       
       <input name="language" type="hidden" value="en">

        <div class="form-group">
          <label for="productName">Product Name</label>
          <input type="text"  placeholeder="Shirt"  id="productName" name="product_name" class="form-control" required="">
        </div>
        <div class="form-group">
          <label for="Price">Price</label>
          <input type="text"  placeholeder="Shirt"  id="price" name="sale_price" class="form-control" required="">
          <small class="text-danger d-none error-price">The price must be a valid whole or decimal number</small>
        </div>
        <div class="form-group">
          <label for="select">Currency</label>
          <select  id="currency" name="currency" class="form-control" required="">
            <option value="ils">ILS</option>
            <option value="usd">USD</option>
            <option value="eur" >EUR</option>
          </select>
        </div>
        {{-- <div class="form-group">
          <label for="exampleInputEmail1">Description</label>
          <textarea name="description" class="form-control" required=""></textarea>
        </div> --}}
        <button type="submit" class="btn btn-primary">Insert Payment Details</button>
      </form>
    </div>
  </div>
</div> 
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>

const priceInput = $("input#price")
const errorPrice = $(".error-price")
const onInput = ({target}) => {
  errorPrice.addClass('d-none')
if(!Number(target.value) || target.value.startsWith("0")     )  {

  errorPrice.removeClass('d-none')
console.log(Number(target.value))
console.log(errorPrice)
}   
}
priceInput.on('input', onInput)


</script>

</body>
</html>