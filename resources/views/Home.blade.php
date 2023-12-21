<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Bootstrap CSS CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <style>
        /* Sidebar styles */
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            width: 250px;
            padding: 20px;
            background-color: #f8f9fa;
        }

        /* Content area styles */
        .content {
            margin-left: 250px; /* Adjust according to the sidebar width */
            padding: 20px;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Admin Dashboard</h2>
        <ul class="list-group">
            <li class="list-group-item"><a href="">Dashboard</a></li>
            <li class="list-group-item"><a href="#">App Gallery</a></li>
            <li class="list-group-item">Products</li>
            <li class="list-group-item">Settings</li>
        </ul>
    </div>

    <!-- Page content -->
    <div class="content row">
        <h3>Welcome to the Admin Dashboard</h3>
        <p>This is the main content area where you can display various sections, charts, tables, etc.</p>
        <a href="{{route('albums.create')}}" class="btn btn-primary me-0">create</a>
    
        <div class="container mt-4">
            <div class="row ms-5">
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                @foreach ($alldata as $item)
                <div class="col-md-4 col-sm">
                    <div class="card">
                        <img  src="{{ asset('images/' . $item->cover_image) }}" class="card-img-top" alt="Card Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <p class="card-text">{{ $item->description }}</p>
                            <a href="#" class="btn btn-primary ">View</a>
                            <form  method="POST"  action="{{ route('delete.album',$item->id)}}">
                                @csrf
                                @method('DELETE')
                            <button class="btn btn-danger me-0">Delete</button>
                           </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        
    
  </div>
  
     
    <!-- Bootstrap JS CDN -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
