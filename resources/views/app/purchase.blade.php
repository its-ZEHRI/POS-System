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
    @if(Session::has('success_response'))
        <div class="">
            <button id="btn2" class="d-none"
            onclick="md.showNotification('top','center','{{Session::get('success_response')}}','success')"></button>
        </div>
        <script>
            window.onload = function(){
            let button = document.getElementById('btn2');
            button.onclick();
            }
        </script>
    @endif
    @if(Session::has('invalid_response'))
        <div class="">
            <button id="btn2" class="d-none"
            onclick="md.showNotification('top','center','{{Session::get('invalid_response')}}','rose')"></button>
        </div>
        <script>
            window.onload = function(){
            let button = document.getElementById('btn2');
            button.onclick();
            }
        </script>
    @endif
    <div class="container-fluid">
        <div class="row" id="top">
            <div class="col-md-8">
                <form action="/purchase/tempCreateData" method="POST" id="data_entry_form">
                    @csrf
                    <input id="temp_p_id_field" type="hidden" name="p_id">
                    <input id="temp_category_field"  type="hidden" name="category_id">
                    {{-- <input id="temp_supplier_field"  type="hidden" name="supplier"> --}}
                <x-utilities.banner title="Add Products" date="{{now()->format('d/m/y ')}}" subtitle="">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mt-3">
                                    <h5 class="text-primary" style="font-weight: normal"><span class="mr-2">S-NO </span>{{count($temp_products)+1}}</h5>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="container-flui"
                                style=" @error('category_id') {{'border-bottom: 4px solid red'}} @enderror">
                                    <div class="card card-plain mb-0 mt-4 p-0" style="position: relative">
                                        <div id="category_card" class="card-header card-header-primary d-flex justify-content-between align-items-center" style="padding: 5px 15px 3px 15px">
                                            <h5 style="height: 1.5rem; overflow-y:hidden; width:90%"
                                             class="card-title">Category</h5>
                                            <i id="catg_arrow" class="fa-solid fa-angle-down"></i>
                                        </div>
                                        <div class="card-body d-none bg-white rounded w-100 custom-dropdown"
                                             style="position: absolute; top:15px; z-index:111">
                                            <ul class="category-list">
                                                @forelse ($categories as $category)
                                                <div class="categ_list selected_category">
                                                    <span class="d-none">{{$category->id}}</span>
                                                    <li  class="categ">{{$category->category}}</li>
                                                </div>
                                                @empty
                                                    <li>No Category found</li>
                                                @endforelse
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="container-flui">
                                    <div class="card card-plain mb-0 mt-4 p-0" style="position: relative">
                                        <div id="supplier_card" class="card-header card-header-primary d-flex justify-content-between align-items-center" style="padding: 5px 15px 3px 15px">
                                            <h5 style="height: 1.5rem; overflow-y:hidden; width:90%"
                                             class="card-title">Supplier</h5>
                                            <i class="fa-solid fa-angle-down"></i>
                                        </div>
                                        <div class="card-body card-wrapper d-none bg-white rounded w-100 custom-dropdown"
                                             style="position: absolute; top:15px; z-index:111">
                                        <ul class="supplier-list">
                                            <div class="supp_list">
                                                <li class="supp">Suplier 1</li>
                                            </div>
                                            <div class="supp_list">
                                                <li class="supp">Suplier 2</li>
                                            </div>
                                            <div class="supp_list">
                                                <li class="supp">Suplier 3</li>
                                            </div>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Product Name</label>
                                <input id="temp_p_name_field"  type="text" name="product_name" class="form-control" value="{{old('product_name')}}"
                                style="@error('product_name'){{ 'border-bottom: 2px solid red; padding-left: 10px!important'}} @enderror">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Product Code</label>
                                <input id="temp_p_code_field"  type="text" name="p_code" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Purchase Price</label>
                                <input id="temp_p_price_field" type="text" name="p_price" class="form-control" value="{{old('p_price')}}"
                                style="@error('p_price'){{ 'border-bottom: 2px solid red; padding-left: 10px!important'}} @enderror">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Sale Price</label>
                                <input id="temp_s_price_field" type="text" name="s_price" class="form-control" value="{{old('s_price')}}"
                                style="@error('s_price'){{ 'border-bottom: 2px solid red; padding-left: 10px!important'}} @enderror">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Whole Sale Price</label>
                                <input id="temp_ws_price_field" type="text" name="ws_price" class="form-control" value="{{old('ws_price')}}"
                                style="@error('ws_price'){{ 'border-bottom: 2px solid red; padding-left: 10px!important'}} @enderror">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 pt-2">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Quantity</label>
                                <input id="temp_quantity_field" type="text" name="quantity" class="form-control" value="{{old('quantity')}}"
                                 style="@error('quantity'){{ 'border-bottom: 2px solid red; padding-left: 10px!important'}} @enderror">
                            </div>
                        </div>

                    </div>
                    <hr>
                    <button id="purchase_form_btn" type="submit" class="btn btn-primary pull-right">Enter</button>
                    <div class="clearfix"></div>
                </form>
            </x-utilities.banner>
            </div>
            <div class="col-md-4">
                <div class="card card-profile">
                    {{-- <div class="card-avatar">
                        <a href="#pablo">
                            <img class="img" src="../assets/img/faces/marc.jpg" />
                        </a>
                    </div> --}}
                    <div class="card-body">
                        {{-- <h6 class="card-category text-gray">CEO / Co-Founder</h6> --}}
                        <h4 class="card-title text-left ">Payment</h4>
                        <div>
                            <p>Total Amount : <span id="total_amount">0/-</span></p>
                            <p>Discount : <span>1500/-</span></p>
                            <p>Net Amount : <span>1500/-</span></p>
                            <p>Balance : <span>1500/-</span></p>
                            <p>Paid : <span>1500/-</span></p>
                        <p class="card-description">
                        </p>
                    </div>
                        <a href="#pablo" class="btn btn-primary btn-round">Save</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              <div class="card card-plain">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Table</h4>
                  <p class="card-category">Inventory</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="temp_table" class="table table-hover temp-table">
                        <thead class="text-primary">
                            <tr>
                                <th>S NO</th>
                                <th>Product Name</th>
                                <th>Product Code</th>
                                <th>Purchase Price</th>
                                <th>Sale Price</th>
                                <th>Whole Sale Price</th>
                                <th>Quantity</th>
                                <th colspan="2" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="ttt">
                            @foreach ($temp_products as $product )
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
                                <td class="col_price">{{$product->p_price}}/-</td>
                                <td>{{$product->s_price}}/-</td>
                                <td>{{$product->ws_price}}/-</td>
                                <td>{{$product->quantity}}</td>
                                <td class="d-none">{{$product->id}}</td>
                                <td>
                                    <a href="#top">
                                    <i id="" style="font-size: 20px" class="temp_edit_btn text-info fa-solid fa-pen-to-square"></i>
                                </a>
                            </td>
                                <td> <a href="purchase/destroy/{{$product->id}}"><i style="font-size: 20px" class="text-rose fa-solid fa-trash-can"></i></a></td>
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
        <x-utilities.banner title="payment" subtitle="sub payment">
            <h4>payment</h4>
        </x-utilities.banner>

    {{-- *****  SLOT END  ****** --}}
    <x-slot name="footer">
        <x-layoutUtilities.footer>
        </x-layoutUtilities.footer>
    </x-slot>
    <x-slot name="fixed_plugin">
        <x-layoutUtilities.fixedPlugin>
        </x-layoutUtilities.fixedPlugin>
    </x-slot>
</x-layout.applayout>
