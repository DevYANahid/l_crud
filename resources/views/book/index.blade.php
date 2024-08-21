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
      <a class="nav-link text-light" href={{route('book.index')}}> <h5>Books Product</h5> </a>
    </li>
  </ul>
</nav>
<br>

<div class="container text-right ">
    <a href={{route('book.create')}} type="button" class="btn btn-secondary m-3 ">Add Books</a>
</div>

<div class="container">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Sno.</th>
        <th scope="col">Book Name</th>
        <th scope="col">Book Description</th>
        <th scope="col">Book Image</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($books as $book)
      <tr>
        <th scope="row">{{$book->id}}</th>
        <td>{{$book->bookname}}</td>
        <td>{{$book->bookdesc}}</td>
        <td>
          <img src="bookimages/{{ $book->bookimg }}" class="rounded-circle" width="50" height="50" alt="">
        </td>
        <td>
          <a href="/books/{{$book->id}}" class="btn btn-primary">Edit</a>
          <a href="" class="btn btn-danger">Delete</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>


</body>
</html>

