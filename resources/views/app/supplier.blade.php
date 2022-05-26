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

        {{--==========> ALERTS <==========--}}
        <div id="alert">
            <button id="save_alert" class="d-none"
                onclick="md.showNotification('top','center','Save Successfully...!','success')"></button>
            <button id="delete_alert" class="d-none"
                onclick="md.showNotification('top','center','Deleted Successfully...!','danger')"></button>
            <button id="update_alert" class="d-none"
            onclick="md.showNotification('top','center','Updated Successfully...!','info')"></button>
            <button id="error_alert" class="d-none"
            onclick="md.showNotification('top','center','<h3 style='+'display:inline'+'>Error...! </h3>','danger')"></button>
        </div>
        {{--==========> ALERTS <==========--}}

    <div class="container-fluid">

        <div>
            <div class="">
                <x-utilities.banner title="Add Supplier" date="{{now()->format('d/m/y ')}}" subtitle="">
                    <form  id="add_supplier_form">
                        @csrf
                        {{-- <div class="mt-3">
                            <h5 class="text-primary" style="font-weight: normal"><span class="mr-2">S-NO </span><span id="s_no">042</span></h5>
                        </div> --}}
                        <div class="row">
                            <div class="col-md-4 form-group bmd-form-group">
                            <label class="bmd-label-floating">Name</label>
                            <input id="supplier_name"  type="text" name="name" class="form-control" value="{{old('name')}}"
                            style="@error('address'){{ 'border-bottom: 2px solid red; padding-left: 10px!important'}} @enderror">
                        </div>
                        <div class="col-md-2 form-group bmd-form-group">
                            <label class="bmd-label-floating">Contact</label>
                            <input id="supplier_contact"  type="text" name="contact" class="form-control" value="{{old('contact')}}"
                            style="@error('contact'){{ 'border-bottom: 2px solid red; padding-left: 10px!important'}} @enderror">
                        </div>
                        <div class="col-md-4 form-group bmd-form-group">
                            <label class="bmd-label-floating">Address</label>
                            <input id="supplier_address" type="text" name="address" class="form-control" value="{{old('address')}}"
                            style="@error('address'){{ 'border-bottom: 2px solid red; padding-left: 10px!important'}} @enderror">
                        </div>
                        <div class="col-md-2 d-flex justify-content-center align-items-center">
                            <div>
                            <button id="" type="submit" class="c-btn c-btn-primary pull-righ">Add</button>
                            </div>
                        </div>
                    </div>
                        <div class="clearfix"></div>
                    </form>
                </x-utilities.banner>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <x-utilities.banner title="Suppliers">
                    <div class="table-responsive">
                        <table id="supplier_table" class="table table-hover">
                            <thead class="">
                                <th>S-NO</th>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Address</th>
                                <th colspan="2" class="">Action</th>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </x-utilities.banner>
            </div>
            {{-- PAYMENT CARD --}}
            <div class="col-md-4">
                <div class="card card-profile">
                    <div class="card-body payment-card">
                        <h3 class="card-title m-0 text-left text-primary ">Transaction</h3>
                        <hr class="m-0">
                        <div class="px-4 mt-3">
                            <form action="">
                                <div class="payment-card-field">
                                    <p class="m-0">Total Amount</p>
                                    <input type="text" id="total_amount" class="form-control" name="" value="0/-">
                                </div>
                                <div class="payment-card-field">
                                    <p class="m-0">Discount</p>
                                    <input type="text" id="discount" class="form-control" name="" value="0/-">
                                </div>
                                <div class="payment-card-field">
                                    <p class="m-0">Net Amount</p>
                                    <input type="text" id="net_amount" class="form-control" name="" value="0/-">
                                </div>
                                <button id="" type="submit" class="c-btn c-btn-primary mt-3 pull-center">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

