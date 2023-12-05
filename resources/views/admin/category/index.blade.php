@extends('layouts.app');

@section('content')

<div class="container-fluid card">
    <div class="card-header row">
        <div class="col">
            <h3 style="font-weight: 700">Admin</h3>
        </div>
        <div class="col text-end">
            <div class="col text-end mt-1">
                <div class="dropdown">
                    <button class="btn btn-transparent" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <span class="btn px-5 rounded-5 text-white" style="background: #55AAAD"><strong>Manage Users</strong></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li class="text-center" style="margin-left: 20px"><a class="dropdown-item btn rounded-5 mb-3" href="{{ route('showSeller') }}"
                                style="background: #55AAAD; color:white; width: 85%">Show Seller</a></li>
                        <li class="text-center" style="margin-left: 20px"><a class="dropdown-item btn rounded-5 mb-3" href="{{ route('showBuyer') }}"
                            style="background: #55AAAD; color:white; width: 85%">Show Buyer</a></li>
                        <li class="text-center" style="margin-left: 20px"><a class="dropdown-item btn rounded-5 mb-3" href="{{ route('top-up.index') }}"
                            style="background: #55AAAD; color:white; width: 85%">Top up</a></li>
                        <li class="text-center" style="margin-left: 20px"><a class="dropdown-item btn rounded-5 mb-3" href="{{ route('category.index') }}"
                            style="background: #55AAAD; color:white; width: 85%">Category</a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="text-end">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-plus"></i></button>
        </div>
        <div class="table-responsive mt-5">
            <table class="table table-bordered" id="dataTable" >
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>
                                <form action="{{ route('category.destroy', $category->id) }}" method="POST" >
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

   <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('category.store') }}" method="POST" >
        @csrf
        <div class="modal-body">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" placeholder="Name" class="form-control">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
      </form>
    </div>
  </div>
</div>

    <script>
        $('#dataTable').DataTable();
    </script>
</div>
@endsection
