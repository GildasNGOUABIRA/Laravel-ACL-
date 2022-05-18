

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List of permissions') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="permission">
            <div class="col-12 text-center pt-5">
                <div class="text-left"><a href="permission/create" class="btn btn-outline-primary">Add new
                    Permission</a></div>

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
                        @forelse($permissions as $permission)
                        <tr>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->display_name }}</td>
                            <td>{{ $permission->description }}</td>
                            <td><a href="permission/{!! $permission->id !!}/edit"
                                class="btn btn-outline-primary">Edit</a>
                                <button type="button" class="btn btn-outline-danger ml-1"
                                    onClick='showModel({!! $permission->id !!})'>Delete</button></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3">No permissions found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $permissions->links() }}
            </div>
        </div>
    </div>


    <div class="modal fade" id="deleteConfirmationModel" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel">
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
        frmDelete.action = 'permission/'+id;
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
