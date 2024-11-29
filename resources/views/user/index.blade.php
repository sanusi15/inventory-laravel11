<x-layouts>
    @if(session('status_message'))
    <div class="flash-message" data-status_message="{{session('status_message')}}" data-value_message="{{session('value_message')}}"></div>
    @endif
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                 <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">UBold</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                    <li class="breadcrumb-item active">Datatables</li>
                                </ol>
                            </div>
                            <h4 class="page-title">{{$page_title}}</h4>
                        </div>
                    </div>
                </div>     
                <!-- end page title --> 
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <button type="button" data-toggle="modal" data-target="#modal-adduser" class="btn btn-sm btn-primary waves-effect waves-light mb-2">
                                    <span class="btn-label"><i class="mdi mdi-plus"></i></span>Add Data
                                </button>
                                @if($errors->any())
                                <div class="alert alert-warning" role="alert">
                                    <i class="mdi mdi-alert-outline mr-2"></i> Warning <strong>Input not valid!</strong> 
                                </div>
                                @endif
                                <table class="table scroll-horizontal-datatable w-100 nowrap">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Action</th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Position</th>
                                            <th>Location</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $item)
                                            <tr>
                                                <td width="5%">{{$loop->iteration}}</td>
                                                <td class="d-flex" width="5%">
                                                    <a href="{{route('edit_laptop', ['laptop' => $item->username])}}" class="btn btn-xs btn-primary p-1 mr-2"><i class="fe-edit-1 mr-1"></i>Edit</a>
                                                    <a href="{{route('show_user', ['user' => $item->username])}}" class="btn btn-xs btn-success p-1 mr-2"><i class="fe-search mr-1"></i>Show</a>
                                                    <form id="frmDelete-{{ $item->code }}"  action="{{route('delete_laptop', ['laptop' => $item->username])}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-xs btn-danger p-1 btn-delete" data-id="{{$item->username}}"><i class="fe-trash mr-1"></i>Delete</button>
                                                    </form>
                                                </td>
                                                <td width="30%">{{$item->name}}</td>
                                                <td width="30%">{{$item->username}}</td>
                                                <td width="30%">{{$item->position->position_name}}</td>
                                                <td width="30%">{{$item->job->job_name}}</td>
                                            </tr>                                       
                                        @endforeach
                                    </tbody>
                                </table>
                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                    </div><!-- end col-->
                </div>

            </div>
        </div>
    </div>

     <!--  Modal content for the Large example -->
    <div class="modal fade" id="modal-adduser" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-adduser">Add User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form action="{{route('save_user')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="name">Name</label>
                                <input type="text" class="form-control form-control-sm" name="name" id="name">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="username">Username</label>
                                <input type="text" class="form-control form-control-sm" name="username" id="username">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="password">Password</label>
                                <input type="text" class="form-control form-control-sm" name="password" id="password">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="position">Position</label>
                                <select class="form-control form-control-sm" name="position" id="position">
                                    @foreach($positions as $item)
                                        <option value="{{$item->id}}">{{$item->position_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="location">Location</label>
                                <select class="form-control form-control-sm" name="location" id="location">
                                    @foreach($jobs as $item)
                                        <option value="{{$item->job_no}}">{{$item->job_no}} - {{$item->job_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-sm btn-primary" >Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <x-slot:customjs>{{$custom_js}}</x-slot:customjs>
</x-layouts>