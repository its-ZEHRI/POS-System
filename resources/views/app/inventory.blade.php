<x-layout.applayout  noFooter>
    <x-slot name="sidebar">
        <x-layoutUtilities.sidebar>
        </x-layoutUtilities.sidebar>
    </x-slot>
    <x-slot name="header">
        <x-layoutUtilities.header>
        </x-layoutUtilities.header>
    </x-slot>
    {{-- ***** SLOT START ***** --}}
    {{--:users=$users ->pass the data form controller to component --}}
    {{-- <x-utilities.table >
    </x-utilities.table>--}}

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              <div class="card card-plai">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Table</h4>
                  <p class="card-category">Inventory</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover temp-table">
                        <thead class="text-primary">
                            <tr>
                                <th>S NO</th>
                                <th>Product Name</th>
                                <th>Product Code</th>
                                <th>Category</th>
                                <th>Purchase Price</th>
                                <th>Sale Price</th>
                                <th>Whole Sale Price</th>
                                <th>Quantity</th>
                                <th colspan="2" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="ttt">
                            @foreach ($products as $product )
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$product->product_name}}</td>
                                <td>
                                    @if($product->p_code == '' )
                                     N/A
                                     @else
                                     {{$product->p_code}}
                                    @endif
                                    </td>
                                <td>{{$product->category}}</td>
                                <td>{{$product->p_price}}/-</td>
                                <td>{{$product->s_price}}/-</td>
                                <td>{{$product->ws_price}}/-</td>
                                <td>{{$product->quantity}}</td>
                                <td class="d-none">{{$product->id}}</td>
                                <td>
                                    <a href="#top">
                                    <i id="" style="font-size: 20px" class="temp_edit_btn text-info fa-solid fa-pen-to-square"></i>
                                </a>
                            </td>
                                <td> <a href="destroy/{{$product->id}}"><i style="font-size: 20px" class="text-rose fa-solid fa-trash-can"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


    {{-- ***** SLOT END *****  --}}
    <x-slot name="footer">
        <x-layoutUtilities.footer>
        </x-layoutUtilities.footer>
    </x-slot>
    <x-slot name="fixed_plugin">
        <x-layoutUtilities.fixedPlugin>
        </x-layoutUtilities.fixedPlugin>
    </x-slot>
</x-layout.applayout>
