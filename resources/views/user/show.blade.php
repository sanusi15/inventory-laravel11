<x-layouts>
    @if(session('status_message'))
    <div class="flash-message" data-status_message="{{session('status_message')}}" data-value_message="{{session('value_message')}}"></div>
    @endif
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
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
                            <a href="{{route('users')}}" class="btn btn-sm btn-secondary waves-effect waves-light mb-2">
                                <span class="btn-label"><i class="mdi mdi-skip-backward"></i></span>Kembali
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-12">
                                <div class="card" style="overflow: hidden">
                                    <div class="card-body row p-0">
                                        <div class="col-md-4 d-flex justify-content-center align-items-center bg-primary">
                                            <img src="{{asset('images/logo/userdefault2.png')}}" alt="user_profile" class="w-50 img-thumbnail rounded-circle">
                                        </div>
                                        <div class="col-md-8 p-4">
                                            <div class="form-group row">
                                                <label for="" class="col-md-6">Nama</label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control form-control-sm" value="{{$user->name}}" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="" class="col-md-6">Position</label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control form-control-sm" value="{{$user->position->position_name}}" disabled>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-12">
                                                    <button class="btn btn-sm btn-primary float-right ml-2" data-toggle="modal" data-target="#multiple-one"><i class="mdi mdi-monitor-cellphone mr-2"></i>Change device</button>
                                                    <a href="#" class="btn btn-sm btn-primary float-right"><i class="mdi mdi-key mr-2"></i>Change Password</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <label><b>Device In Use :</b></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Device</th>
                                                                <th>Merk</th>
                                                                <th>Type</th>
                                                                <th>Processor</th>
                                                                <th>RAM</th>
                                                                <th>Storage</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if($user->computer != null)
                                                            <tr>
                                                                <td>Pc/Computer</td>
                                                                <td>{{$user->computer->merk}}</td>
                                                                <td>{{Str::limit($user->computer->type, 20)}}</td>
                                                                <td>{{$user->computer->processor}}</td>
                                                                <td>{{$user->computer->ram}}</td>
                                                                <td>{{$user->computer->storage_type_one}} - {{$user->computer->storage_capacity_one}} | {{$user->computer->storage_type_one}} - {{$user->computer->storage_capacity_one}} </td>
                                                                <td><a href="{{route('equip_computer', ['code_computer' =>$user->computer->code])}}" class="btn btn-sm btn-success"><i class="fe-edit mr-1"></i>Equip</a></td>
                                                            </tr>
                                                            @endif
                                                            @if($user->laptop != null)
                                                            <tr>
                                                                <td>Laptop</td>
                                                                <td>{{$user->laptop->merk}}</td>
                                                                <td>{{Str::limit($user->laptop->type, 20)}}</td>
                                                                <td>{{$user->laptop->processor}}</td>
                                                                <td>{{$user->laptop->ram}}</td>
                                                                <td>{{$user->laptop->storage_type_one}} - {{$user->laptop->storage_capacity_one}} | {{$user->laptop->storage_type_two}} - {{$user->laptop->storage_capacity_two}} </td>
                                                                <td><a href="#" class="btn btn-sm btn-success"><i class="fe-edit mr-1"></i>Equip</a></td>
                                                            </tr>
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-12">
                                        <label><b>Device Usage History :</b></label>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table scroll-horizontal-datatable w-100 nowrap">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Date</th>
                                                <th>Device ID</th>
                                                <th>Type</th>
                                                <th>Reason</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($history_device as $item)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$item->date}}</td>
                                                    <td>{{$item->device_code}}</td>
                                                    <td>{{$item->type}}</td>
                                                    <td>{{$item->reason}}</td>
                                                    <td class="text-center"> <button class="btn btn-xs btn-success p-1 mr-2 btn-show" data-id="{{$item->code}}" data-toggle="modal" data-target="#bs-example-modal-lg"><i class="fe-search mr-1"></i>Show</button></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="multiple-one" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="multiple-oneModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="mt-0">What do you want to change?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6 text-center">
                            <button class="btn btn-sm" data-target="#computer-two" data-toggle="modal"  data-dismiss="modal">
                                <img src="{{asset('images/icon/pc.png')}}" class="w-50 img-thumbnail p-2">
                                <p>PC/Computer</p>
                            </button>
                        </div>
                        <div class="col-6 text-center">
                            <button class="btn btn-sm"  data-target="#laptop-two" data-toggle="modal"  data-dismiss="modal">
                                <img src="{{asset('images/icon/laptop.png')}}" class="w-50 img-thumbnail p-2">
                                <p>Laptop</p>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div id="computer-two" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="multiple-oneModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="mt-0">Plese select one</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6 text-center">
                            <a href="{{route('change_device', ['encrypt_username' => Crypt::encryptString($user->username),'device' => 'computer'])}}" class="btn btn-sm">
                                <img src="{{asset('images/icon/monitor_check.png')}}" class="w-50 img-thumbnail p-2">
                                <p>All Ready Device</p>
                            </a>
                        </div>
                        <div class="col-6 text-center">
                            <a href="{{route('create_computer', ['username' => Crypt::encryptString($user->username)])}}" class="btn btn-sm">
                                <img src="{{asset('images/icon/monitor_add.png')}}" class="w-50 img-thumbnail p-2">
                                <p>New Device</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary"  data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
    <div id="laptop-two" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="multiple-oneModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="mt-0">Plese select one</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6 text-center">
                            <a href="{{route('change_device', ['encrypt_username' => Crypt::encryptString($user->username),'device' => 'laptop'])}}" class="btn btn-sm">
                                <img src="{{asset('images/icon/monitor_check.png')}}" class="w-50 img-thumbnail p-2">
                                <p>All Ready Device</p>
                            </a>
                        </div>
                        <div class="col-6 text-center">
                            <a href="{{route('create_laptop', ['username' => Crypt::encryptString($user->username)])}}" class="btn btn-sm">
                                <img src="{{asset('images/icon/monitor_add.png')}}" class="w-50 img-thumbnail p-2">
                                <p>New Device</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary"  data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
    <x-slot:customjs>{{$custom_js}}</x-slot:customjs>
</x-layouts>