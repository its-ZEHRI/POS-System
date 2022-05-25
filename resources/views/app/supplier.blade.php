<x-layout.applayout>
    <x-slot name="sidebar">
        <x-layoutUtilities.sidebar>
        </x-layoutUtilities.sidebar>
    </x-slot>
    <x-slot name="header">
        <x-layoutUtilities.header>
        </x-layoutUtilities.header>
    </x-slot>
    {{-- ***** SLOT START ***** --}}

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form  name="add_supplier_form">
                    @csrf
                <x-utilities.banner title="Add Supplier" date="{{now()->format('d/m/y ')}}" subtitle="">
                    <div class="mt-3">
                        <h5 class="text-primary" style="font-weight: normal"><span class="mr-2">S-NO </span><span id="s_no">042</span></h5>
                    </div>
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Name</label>
                        <input id=""  type="text" name="name" class="form-control" value="{{old('name')}}"
                        style="@error('address'){{ 'border-bottom: 2px solid red; padding-left: 10px!important'}} @enderror">
                    </div>
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Contact</label>
                        <input id=""  type="number" name="contact" class="form-control"
                        style="@error('contact'){{ 'border-bottom: 2px solid red; padding-left: 10px!important'}} @enderror">
                    </div>
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Address</label>
                        <input id="" type="text" name="address" class="form-control" value="{{old('addrss')}}"
                        style="@error('address'){{ 'border-bottom: 2px solid red; padding-left: 10px!important'}} @enderror">
                    </div>
                    <button id="" type="submit" class="c-btn c-btn-primary pull-right">Add</button>
                    <button id="add_supplier_form_clear_btn" class="c-btn c-btn-secondary pull-right mr-3">Clear</button>
                    <div class="clearfix"></div>
                </form>
            </x-utilities.banner>
            </div>
            <div class="col-md-6">
                <div class="card card-profile">
                    {{-- <div class="card-avatar">
                        <a href="#pablo">
                            <img class="img" src="../assets/img/faces/marc.jpg" />
                        </a>
                    </div> --}}
                    <div class="card-body payment-card">
                        {{-- <h6 class="card-category text-gray">CEO / Co-Founder</h6> --}}
                        <h4 class="card-title m-0 text-left ">Payment</h4>
                        <hr class="m-0">
                        <div class="px-4">
                            <div>
                                <p>Total Amount</p>
                                <p id="total_amount">0/-</p>
                            </div>
                            <div>
                                <p>Discount</p>
                                <p id="">0/-</p>
                            </div>
                            <div>
                                <p>Net Amount</p>
                                <p id="">0/-</p>
                            </div>
                            <div>
                                <p>Balance</p>
                                <p id="">0/-</p>
                            </div>
                            <div>
                                <p>Paid</p>
                                <p id="">0/-</p>
                            </div>
                            <div>
                                <p>Discount</p>
                                <p id="">0/-</p>
                            </div>
                        <p class="card-description">
                        </p>
                    </div>
                        <a href="#pablo" class="c-btn c-btn-primary">Save</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <x-utilities.banner title="Supplier Table">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Country</th>
                        <th>City</th>
                        <th>Salary</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Dakota Rice</td>
                            <td>Niger</td>
                            <td>Oud-Turnhout</td>
                            <td>$36,738</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </x-utilities.banner>
    </div>

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

