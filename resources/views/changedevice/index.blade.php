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
                                <button onclick="history.back()" class="btn btn-sm btn-secondary waves-effect waves-light mb-2">
                                    <span class="btn-label"><i class="mdi mdi-skip-backward"></i></span>Kembali
                                </button>
                                <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
                                    <thead>
                                         <tr>
                                            <th>No</th>
                                            <th class="text-center">Action</th>
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach ($data as $item)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td class="d-flex justify-content-center">
                                                    <button class="btn btn-xs btn-primary p-1 mr-2 btn-select" data-code="{{$item->code}}" data-toggle="modal" data-target="#bs-modal-confirm"><i class="mdi mdi-bookmark-check mr-1"></i>select</button>
                                                    <button class="btn btn-xs btn-success p-1 mr-2 btn-show" data-id="{{$item->code}}" data-toggle="modal" data-target="#bs-example-modal-lg"><i class="fe-search mr-1"></i>Show</button>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light">{{$item->status}}<span class="btn-label-right"><i class="mdi mdi-account-check"></i></span>
                                                    </button>
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

    <div id="bs-modal-confirm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="multiple-oneModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="mt-0">Please fill in the form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form action="{{route('save_changedevice')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id_encrypt" id="id_encrypt" value="{{$id_encrypt}}">
                        <input type="hidden" name="code" id="code_device">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <label for="condition">Is the previous device still working?</label>
                                <select class="form-control form-control-sm" name="condition" id="condition">
                                    <option value="true">Yes</option>
                                    <option value="false">No</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="reason">Reasons for changing devices</label>
                                <textarea class="form-control form-control-sm" name="reason" id="reason"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-sm btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--  Modal content for the Large example -->
    <div class="modal fade modal-view" id="bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Detail Data</h4>
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
                            <h4 class="modal-title">Equip Device</h4>
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