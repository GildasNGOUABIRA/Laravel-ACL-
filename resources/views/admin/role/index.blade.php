<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List of roles') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="role">
            <div class="col-12 text-center pt-5">
                <div class="text-left"><a href="role/create" class="btn btn-outline-primary">Add new
                        role</a></div>

                <table class="table mt-3  text-left">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Display Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($roles as $role)
                        <tr>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->display_name }}</td>
                            <td>{{ $role->description }}</td>
                            <td><a href="role/{!! $role->id !!}/edit"
                                    class="btn btn-outline-primary">Edit</a>
                                <button type="button" class="btn btn-outline-danger ml-1"
                                    onClick='showModel({!! $role->id !!})'>Delete</button>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="3">No roles found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $roles->links() }}
                </div>
            </div>
        </div>


        <div class="modal fade" id="deleteConfirmationModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">Are you sure to delete this record?</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" onClick="dismissModel()">Cancel</button>
                        <form id="delete-frm" class="" action="" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function showModel(id) {
                var frmDelete = document.getElementById("delete-frm");
                frmDelete.action = 'role/' + id;
                var confirmationModal = document.getElementById("deleteConfirmationModel");
                confirmationModal.style.display = 'block';
                confirmationModal.classList.remove('fade');
                confirmationModal.classList.add('show');
            }

            function dismissModel() {
                var confirmationModal = document.getElementById("deleteConfirmationModel");
                confirmationModal.style.display = 'none';
                confirmationModal.classList.remove('show');
                confirmationModal.classList.add('fade');
            }
        </script>
    </x-app-layout>
