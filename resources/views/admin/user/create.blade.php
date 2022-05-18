<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add user') }}
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
                <div class="text-left"><a href="/user" class="btn btn-outline-primary">List of users</a>
                </div>

                <form id="add-frm" method="POST" action="{{ route('user.store') }}" class="border p-3 mt-2">
                    @method('POST')
                    @csrf



                    <div class="control-group col-6 text-left mt-2">
                        <label for="body">Name</label>
                        <div>
                            <input id="name" required value="{{ old('name') }}" class="form-control mb-4" name="name"
                                placeholder="Enter name" />
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="control-group col-6 text-left mt-2">
                        <label for="body">Email</label>
                        <div>
                            <input type="email" id="email" required value="{{ old('email') }}" class="form-control mb-4" name="email"
                                placeholder="Enter email" />
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>



                    <div class="control-group col-6 text-left mt-2">
                        <label for="body">Role</label>
                        <div>
                            <select class="form-control mb-4" name="role">
                                @forelse ($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @empty
                                    <option disabled value="">Auncun role</option>
                                @endforelse
                            </select>
                            @error('role')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>


                    <div class="control-group col-6 text-left mt-2">
                        <label for="body">Password</label>
                        <div>
                            <input type="password" id="password" required value="{{ old('password') }}" class="form-control mb-4" name="password"
                                placeholder="Enter password" />
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>


                    <div class="control-group col-6 text-left mt-2">
                        <label for="body">Password confirmation</label>
                        <div>
                            <input type="password" id="password_confirmation" required value="{{ old('password_confirmation') }}" class="form-control mb-4" name="password_confirmation"
                                placeholder="Enter password confirmation" />
                            @error('password_confirmation')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>




                    <div class="control-group col-6 text-left mt-2"><button class="btn btn-primary">Add New</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
