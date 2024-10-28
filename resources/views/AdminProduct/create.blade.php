<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List and create product</title>
    <link rel="stylesheet" href="{{asset('resources/css/pro.css')}}">
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #121212;
            color: #ffffff;
        }
    
        a {
            text-decoration: none;
            color: inherit;
        }
    
        /* Navbar Styles */
        .navbar {
            background-color: #1f1f1f;
            padding: 15px;
            display: flex;
            justify-content: space-around;
            align-items: center;
            border-bottom: 1px solid #333;
        }
    
        .navbar a {
            color: #ffffff;
            margin-right: 20px;
            font-size: 18px;
        }
    
        .navbar a:hover {
            color: #66ccff;
        }
    
        /* Sidebar Styles */
        .sidebar {
            width: 200px;
            height: 100vh;
            background-color: #1f1f1f;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 60px;
            display: flex;
            flex-direction: column;
            border-right: 1px solid #333;
        }
    
        .sidebar a {
            padding: 15px 20px;
            color: #ffffff;
        }
    
        .sidebar a:hover {
            background-color: #333;
        }
    
        /* Content Styles */
        .content {
            margin-left: 200px;
            padding: 20px;
        }
    
        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #1f1f1f;
            color: #ffffff;
        }
    
        table th, table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #333;
        }
    
        table th {
            background-color: #333;
        }
    
        table tr:hover {
            background-color: #444;
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
    
        /* Restore buttons */
        .restore-btn {
            background-color: #66ccff;
            border: none;
            color: #000;
            padding: 10px 15px;
            cursor: pointer;
            margin-bottom: 20px;
        }
    
        .restore-btn:hover {
            background-color: #3399ff;
        }
    </style>
</head>
<body>
    <a href="{{ route('dashboard') }}" style="position: fixed; right: 20px; z-index: 1000;">
        Go to Dashboard
    </a>
    <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">

        @csrf
          <label for="name">Please Enter Product Name</label>
          <br>
          <input type="text" class="name" id="name" name="name">
          <br>

          <div class="form-group mt-4">
            <label for="" class="mb-2">Categories</label>
            @foreach ($categories as $category)

            <div class="form-check">
                <input name="categories_ids[]" class="form-check-input" type="checkbox" value="{{$category->id}}" id="{{$category->name}}">
                <label class="form-check-label" for="{{$category->name}}">
                    {{$category->name}}
                </label>
            </div>
            @endforeach
        </div>
        <label for="name">Please Enter Description</label>
        <br>
        <input type="text" class="description" id="description" name="description">
        <br>

          <label for="number">Please Enter Price</label>
          <br>
          <input type="number" class="number" id="number" name="price">
          <br>
  
          <input type="submit">
          <a href="{{ url()->previous() }}"  style="margin-top: 10px;"><button>Cancel</button></a>
      </form>
      
      <br>
      <br>
      <br>
      <hr>

</body>
</html>