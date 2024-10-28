<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit products</title>
    <style>
          /* Content Styles */
          .content {
            margin-left: 200px;
            padding: 20px;
        }

        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #121212;
            color: #ffffff;
        }
        .operations button {
            background-color: #66ccff;
            border: none;
            color: #000;
            padding: 5px 10px;
            cursor: pointer;
        }

        .operations button:hover {
            background-color: #3399ff;
        }
    </style>
</head>
<body>
    <a href="{{ route('dashboard') }}" style="position: fixed; right: 20px; z-index: 1000;">
        Go to Dashboard
    </a>
    <form action="{{route('products.update',$product)}}" method="POST">
      @csrf
      @method('PUT')
      <label for="name">Please Enter New Product Name</label>
      <input type="text"name="name"class="name"id="name"value="{{$product->name}}">
      <br>
      <br>
       
        <div class="form-group mt-4">
            <h5><label for="" class="mb-2">Categories:</label></h5>
            @foreach ($categories as $category)
            <div >
                <input name="categories_ids[]"  type="checkbox" value="{{$category->id}}" id="{{$category->name}}"
                {{-- @if(in_array($category->id, $book->categories->pluck('id')->toArray())) checked @endif> --}}
                <label class="form-check-label" for="{{$category->name}}">
                    {{$category->name}}
                </label>
            </div>
            @endforeach
        </div>
        <label for="name">Please Enter New Description</label>
        <br>
        <input type="text" class="description" id="description" name="description">
        <br>
      
        <label for="price">Please Enter New Price</label>
        <input type="text"name="price"class="price"id="price"value="{{$product->price}}">
        
        <br>
        <input type="submit">
    </form>
    <br>
    <br>
    <br>
    <hr>
    

</body>
</html>