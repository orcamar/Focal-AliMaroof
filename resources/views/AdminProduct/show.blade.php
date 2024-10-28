<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
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
<body>
    <a href="{{ route('dashboard') }}" style="position: fixed; right: 20px; z-index: 1000;">
        Go to Dashboard
    </a>
    <div class="content">
        <h2>Product List</h2>

        <!-- Product Table -->
        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Category Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Operations</th>
                  
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$product->name}}</td>
                    <td>
                        
                        <ul>
                            @foreach ($product->categories as $category)
                            <li>
                                {{$category->name}}
                            </li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->price}}</td>
                    <td class="operations">
                        <a href="{{route('products.edit',$product)}}"><button>Edit</button></a>
                        <form action="{{route('products.destroy',$product)}}" method="POST">
                            @csrf
                            @method('DELETE')


                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
               
            </tbody>
        </table>
</body>
</html>