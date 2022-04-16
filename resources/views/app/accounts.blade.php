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
        <x-utilities.banner title="Create User Account" subtitle="">
            <form action="#" method="POST">

            </form>
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
