<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit role') }}
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
                <div class="text-left"><a href="/role" class="btn btn-outline-primary">List of roles</a></div>

                <form id="edit-frm" method="POST" action="{{ route('role.update', $role) }}" class="border p-3 mt-2">
                    @method('PUT')
                    @csrf

                    <div class="control-group col-6 text-left">
                        <label for="name">Name</label>
                        <div>
                            <input type="text" id="name" class="form-control mb-4" name="name" placeholder="Enter name"
                                value="{!! $role->name !!}" required>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="control-group col-6 text-left">
                        <label for="name">Display Name</label>
                        <div>
                            <input type="text" id="display_name" class="form-control mb-4" name="display_name" placeholder="Enter display name"
                                value="{!! $role->display_name !!}" required>
                            @error('display_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="control-group col-6 mt-2 text-left">
                        <label for="body">Description</label>
                        <div>
                            <textarea id="description" class="form-control mb-4" name="description" placeholder="Enter description" rows=""
                                required>{!! $role->description !!}</textarea>
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

        <div class="col-12 text-center pt-5">

            <form id="add-frm" method="POST" action="{{ route('attach.permission', $role) }}" class="border p-3 mt-2">
                @method('POST')
                @csrf

                <div class="control-group col-6 text-left mt-2">
                    <label for="body">Role</label>
                    <div>
                        <select class="form-control mb-4" name="permission[]" multiple>
                            @forelse ($permissions as $permission)
                                <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                            @empty
                                <option disabled value="">Auncun permission</option>
                            @endforelse
                        </select>
                        @error('permission')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <div class="control-group col-6 text-left mt-2"><button class="btn btn-primary">Add permission</button></div>


            </form>
        </div>

    </div>

    {{-- @include('sweetalert::alert') --}}

</x-app-layout>
