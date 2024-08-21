<!DOCTYPE html>
<html lang="en">
<head>
  <title>Books List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark">
  <ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link text-light" href={{route('book.index')}}> <h5>Books Update</h5> </a>
    </li>
  </ul>
</nav>




@if($message = Session::get('success'))
<div class="container mt-5">
    <div class="d-flex flex-row-reverse">
        <div class="alert alert-success alert-dismissible">
            <strong class="">{{$message}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
        </div>
    </div>
</div>
    
@endif
<h1 class="container mt-3">Product Edit #{{$book->id}}</h1>
<form method="POST" class="container mt-5" action="/book/{{$book->id}}/update" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="exampleFormControlInput1">Book Name</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" name="bookname" placeholder="Book Name" value="{{old('bookname',$book->bookname)}} " >
      @if ($errors ->has('bookname'))
      <span class="text-danger">{{$errors->first('bookname')}}</span>
      @endif
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Book Description</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" name="bookdesc" rows="3">{{old('bookdesc',$book->bookdesc)}}</textarea>
      @if ($errors ->has('bookdesc'))
      <span class="text-danger">{{$errors->first('bookdesc')}}</span>
      @endif
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Book Image</label>
        <input type="file" class="form-control" name="bookimg" value="{{old('bookimg',$book->bookimg)}}" id="exampleFormControlInput1">
        @if ($errors ->has('bookimg'))
        <span class="text-danger">{{$errors->first('bookimg')}}</span>
        @endif
    </div>

    <button class="btn btn-primary" type="submit">Submit</button>
  </form>



</body>
</html>

