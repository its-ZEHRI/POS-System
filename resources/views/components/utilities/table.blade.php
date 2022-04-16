<div class="container-fluid">
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title ">Table</h4>
          <p class="card-category">Inventory</p>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
                <thead class=" text-primary">
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ( $users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->contact}}</td>
                    </tr>
                    @endforeach --}}
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
