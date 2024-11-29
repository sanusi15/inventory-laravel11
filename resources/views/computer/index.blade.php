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
                                <a href="{{route('add_computer')}}" class="btn btn-sm btn-primary waves-effect waves-light mb-2">
                                    <span class="btn-label"><i class="mdi mdi-plus"></i></span>Add Data
                                </a>
                                <table class="table scroll-horizontal-datatable w-100 nowrap">
                                    <thead>
                                         <tr>
                                            <th>No</th>
                                            <th>Action</th>
                                            <th>Status</th>
                                            <th>Code</th>
                                            <th>Merk</th>
                                            <th>Type</th>
                                            <th>OS</th>
                                            <th>processor</th>
                                            <th>Storage 1</th>
                                            <th>Storage 2</th>
                                            <th>Memory</th>
                                            <th>Location</th>
                                            <th>Users</th>
                                        </tr>
                                    </thead>
                                
                                
                                    <tbody>
                                         @foreach ($computers as $item)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td class="d-flex">
                                                    <a href="{{route('edit_computer', ['computer' => $item->code])}}" class="btn btn-xs btn-primary p-1 mr-2"><i class="fe-edit-1 mr-1"></i>Edit</a>
                                                    <button class="btn btn-xs btn-success p-1 mr-2 btn-show" data-id="{{$item->code}}" data-toggle="modal" data-target="#bs-example-modal-lg"><i class="fe-search mr-1"></i>Show</button>
                                                    <form id="frmDelete-{{ $item->code }}"  action="{{route('delete_computer', ['computer' => $item->code])}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-xs btn-danger p-1 btn-delete" data-id="{{$item->code}}"><i class="fe-trash mr-1"></i>Delete</button>
                                                    </form>
                                                </td>
                                                <td>
                                                    @if($item->status == 'In Use')
                                                        <button type="button" class="btn btn-success btn-sm btn-rounded waves-effect waves-light">{{$item->status}}<span class="btn-label-right"><i class="mdi mdi-account-clock mdi-account-clock"></i></span>
                                                        </button>
                                                    @elseif($item->status == 'Available')
                                                        <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light">{{$item->status}}<span class="btn-label-right"><i class="mdi mdi-account-check"></i></span>
                                                        </button>
                                                    @else
                                                        <button type="button" class="btn btn-danger btn-sm btn-rounded waves-effect waves-light">{{$item->status}}<span class="btn-label-right"><i class="mdi  mdi-account-remove"></i></span>
                                                        </button>
                                                    @endif
                                                </td>
                                                <td>{{$item->code}}</td>
                                                <td>{{$item->merk}}</td>
                                                <td>{{Str::limit($item->type,20)}}</td>
                                                <td>{{$item->os}}</td>
                                                <td>{{$item->processor}}</td>
                                                <td>{{$item->storage_type_one}} - {{$item->storage_capacity_one}}</td>
                                                <td>{{$item->storage_type_two}} - {{$item->storage_capacity_two}}</td>
                                                <td>{{$item->ram}} GB</td>
                                                <td>{{$item->location}}</td>
                                                <td>{{optional($item->user)->name}}</td>
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
    <div class="modal fade modal-view" id="bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Detail Data Computer</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="row border-bottom">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="code">Code</label>
                                <input type="text" class="form-control form-control-sm" id="code" disabled>
                            </div>
                            <div class="form-group">
                                <label for="merk">Merk</label>
                                <input type="text" class="form-control form-control-sm" id="merk" disabled>
                            </div>
                            <div class="form-group">
                                <label for="type">Type</label>
                                <input type="text" class="form-control form-control-sm" id="type" disabled>
                            </div>
                            <div class="form-group">
                                <label for="device_id">Device ID</label>
                                <input type="text" class="form-control form-control-sm" id="device_id" disabled> 
                            </div>
                            <div class="form-group">
                                <label for="product_id">Product ID</label>
                                <input type="text" class="form-control form-control-sm" id="product_id" disabled>
                            </div>
                            <div class="form-group">
                                <label for="os">OS</label>
                                <input type="text" class="form-control form-control-sm" id="os" disabled>
                            </div>
                            <div class="form-group">
                                <label for="processor">Processor</label>
                                <input type="text" class="form-control form-control-sm" id="processor" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ram">RAM (GB)</label>
                                <input type="text" class="form-control form-control-sm" id="ram" disabled>
                            </div>
                            <div class="form-group">
                                <label for="storage_one">Storage 1</label>
                                <input type="text" class="form-control form-control-sm" id="storage_one" disabled>
                            </div>
                            <div class="form-group">
                                <label for="storage_two">Storage 2</label>
                                <input type="text" class="form-control form-control-sm" id="storage_two" disabled>
                            </div>
                            <div class="form-group">
                                <label for="detail_spesification">Detail Spesification</label>
                                <input type="text" class="form-control form-control-sm" id="detail_spesification" disabled>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <input type="text" class="form-control form-control-sm" id="status_computer" disabled>
                            </div>
                            <div class="form-group">
                                <label for="storage">Information</label>
                                <input type="text" class="form-control form-control-sm" id="information" disabled>
                            </div>
                            <div class="form-group">
                                <label for="storage">Password</label>
                                <input type="text" class="form-control form-control-sm" id="password" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="purchase_date">Purchase Date</label>
                                <input type="text" class="form-control form-control-sm" id="purchase_date" disabled>
                            </div>
                            <div class="form-group">
                                <label for="waranty_expiry">Waranty Expiry</label>
                                <input type="text" class="form-control form-control-sm" id="waranty_expiry" disabled>
                            </div>
                            <div class="form-group">
                                <label for="nominal_price">Nominal Price</label>
                                <input type="text" class="form-control form-control-sm" id="nominal_price" disabled>
                            </div>
                            <div class="form-group">
                                <label for="users">Users</label>
                                <input type="text" class="form-control form-control-sm" id="users" disabled>
                            </div>
                            <div class="form-group">
                                <label for="storage">QR Code</label>
                                <div class="text-center mb-2">
                                    <img src="#" alt="qr-code" class="img img-thumbnail img-qrcode mr-2">
                                </div>
                                <div class="d-flex justify-content-center align-items-center">
                                    <a href="#" class="btn btn-xs btn-success p-1 mr-2 show-qrcode" target="_blank"><i class="fe-eye  mr-1"></i>Show</a>
                                    <a href="#" class="btn btn-xs btn-danger p-1 mr-2 download-qrcode" download><i class="fe-download mr-1"></i>Download</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="modal-header">
                            <h4 class="modal-title">Equip Computer</h4>
                        </div>
                        <div class="modal-body" id="data-equipcomputer">
                            <div class="row"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <x-slot:customjs>{{$custom_js}}</x-slot:customjs>
</x-layouts>