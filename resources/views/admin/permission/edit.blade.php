<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit permission') }}
        </h2>
    </x-slot>

    <div class="container">
        @if (session('success_message'))

        <div class="alert alert-success">
            {{ session('success_message') }}
        </div>

        @endif
        <div class="row">
            <div class="col-12 text-center pt-5">
                <div class="text-left"><a href="/permission" class="btn btn-outline-primary">List of permissions</a></div>

                <form id="edit-frm" method="POST" action="{{ route('permission.update', $permission) }}" class="border p-3 mt-2">
                    @method('PUT')
                    @csrf

                    <div class="control-group col-6 text-left">
                        <label for="name">Name</label>
                        <div>
                            <input type="text" id="name" class="form-control mb-4" name="name" placeholder="Enter name"
                                value="{!! $permission->name !!}" required>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="control-group col-6 text-left">
                        <label for="name">Display Name</label>
                        <div>
                            <input type="text" id="display_name" class="form-control mb-4" name="display_name" placeholder="Enter display name"
                                value="{!! $permission->display_name !!}" required>
                            @error('display_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="control-group col-6 mt-2 text-left">
                        <label for="body">Description</label>
                        <div>
                            <textarea id="description" class="form-control mb-4" name="description" placeholder="Enter description" rows=""
                                required>{!! $permission->description !!}</textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    @method('PUT')
                    <div class="control-group col-6 text-left mt-2"><button class="btn btn-primary">Save Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- @include('sweetalert::alert') --}}

</x-app-layout>
