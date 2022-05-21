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
    {{-- ----------------------------------- --}}
    {{-- <x-utilities.table > --}}
         {{--:users=$users ->pass the data form controller to component --}}
    {{-- </x-utilities.table> --}}
    {{-- -------------------------------------------- --}}
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
    <div class="row">
        <div class="col-md-8">
            <x-utilities.banner title="Create Category">
                <form action="setting/createCategory" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Category</label>
                                <input type="text" name="category" class="form-control" value="{{old('category')}}"
                                style="@error('category'){{ 'border-bottom: 2px solid red; padding-left: 10px!important'}} @enderror">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button id="" type="submit" class="c-btn c-btn-primary center">Enter</button>
                        </div>
                    {{-- <div class="clearfix"></div> --}}
                    </div>
                </form>
            </x-utilities.banner>
        </div>
    </div>


    {{-- ***** SLOT END ***** --}}
    <x-slot name="footer">
        <x-layoutUtilities.footer>
        </x-layoutUtilities.footer>
    </x-slot>
    <x-slot name="fixed_plugin">
        <x-layoutUtilities.fixedPlugin>
        </x-layoutUtilities.fixedPlugin>
    </x-slot>
</x-layout.applayout>
