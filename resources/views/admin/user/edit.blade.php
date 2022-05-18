<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit user') }}
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
                <div class="text-left"><a href="/user" class="btn btn-outline-primary">List of users</a></div>
                <form id="add-frm" method="POST" action="{{ route('user.update',$user) }}" class="border p-3 mt-2">
                    @method('PUT')
                    @csrf


                    <div class="control-group col-6 text-left mt-2">
                        <label for="body">Name</label>
                        <div>
                            <input id="name" required  value="{!! $user->name !!}"  class="form-control mb-4" name="name"
                                placeholder="Enter name" />
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="control-group col-6 text-left mt-2">
                        <label for="body">Email</label>
                        <div>
                            <input  value="{!! $user->email !!}" type="email" id="email" required value="{{ old('email') }}" class="form-control mb-4" name="email"
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
                                @foreach ($user->roles as $role)
                                <option  value="{!! $role->name??null !!}" selected="selected">{{ $role->name??null }}</option>
                            @endforeach

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


                    <div class="control-group col-6 text-left mt-2"><button class="btn btn-primary">Save update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- @include('sweetalert::alert') --}}

</x-app-layout>
