

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add permission') }}
        </h2>
    </x-slot>

    <div class="container">


        @if (session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

        @endif

        <div class="row">
            <div class="col-12 text-center pt-5">
                <div class="text-left"><a href="/permission" class="btn btn-outline-primary">List of permissions </a></div>

                <form id="add-frm" method="POST" action="{{ route('permission.store') }}" class="border p-3 mt-2">
                    @method('POST')
                    @csrf


                    <div class="control-group col-6 text-left mt-2">
                        <label for="body">Name</label>
                        <div>
                            <input id="name" required value="{{ old('name') }}" class="form-control mb-4" name="name" placeholder="Enter name"/>
                                @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                        </div>

                    </div>

                    <div class="control-group col-6 text-left mt-2">
                        <label for="body">Display Name</label>
                        <div>
                            <input id="display_name" required value="{{ old('display_name') }}" class="form-control mb-4" name="display_name" placeholder="Enter display name"/>
                                @error('display_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                        </div>

                    </div>


                    <div class="control-group col-6 text-left mt-2">
                        <label for="body">Description</label>
                        <div>
                            <textarea id="description" required value="{{ old('description') }}" class="form-control mb-4" name="description" placeholder="Enter description" rows=""
                                ></textarea>
                                @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                        </div>

                    </div>

                    <div class="control-group col-6 text-left mt-2"><button class="btn btn-primary">Add New</button></div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>

