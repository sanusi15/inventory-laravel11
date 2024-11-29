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
                                @if($errors->any())
                                <div class="alert alert-danger" role="alert">
                                    @foreach($errors->all() as $error)
                                        <i class="mdi mdi-alert-outline mr-2"></i> Warning <strong>{{$error}}</strong><br>
                                    @endforeach
                                </div>
                                @endif
                                @if($isChangeEquip)
                                <button onclick="history.back()" class="btn btn-sm btn-secondary waves-effect waves-light mb-2">
                                    <span class="btn-label"><i class="mdi mdi-skip-backward"></i></span>Kembali
                                </button>
                                @else
                                    <button class="btn btn-sm btn-primary waves-effect waves-light mb-2" data-toggle="modal" data-target="#bs-modaladd">
                                        <span class="btn-label"><i class="mdi mdi-plus"></i></span>Add
                                    </button>
                                @endif
                                <table class="table scroll-horizontal-datatable w-100 nowrap">
                                    <thead>
                                         <tr>
                                            <th>No</th>
                                            <th class="text-center">Action</th>
                                            <th>Code</th>
                                            <th>Device Code</th>
                                            <th>Type</th>
                                            <th>Merk</th>
                                            <th>Spesification</th>
                                            <th>Price</th>
                                            <th>Purchase Date</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td style="width: 5%">{{$loop->iteration}}</td>
                                                <td style="width: 5%" class="text-center">
                                                    <button class="btn btn-sm btn-secondary btn-showqr" data-code="{{$item->code}}"><i class="mdi mdi-qrcode"></i></button>
                                                    @if ($isChangeEquip)
                                                        <button class="btn btn-sm btn-primary btn-selectitem" data-code="{{$item->code}}" data-type="{{$item->jenis}}" data-computercode="{{$item->computer_code}}"><i class="mdi mdi-repeat"></i></button>
                                                    @endif
                                                </td>
                                                <td style="width: 5%;">{{$item->code}}</td>
                                                <td style="width: 5%;">{{$item->computer_code}}</td>
                                                <td style="width: 10%;">{{$item->jenis}}</td>
                                                <td style="width: 10%;">{{$item->merk}}</td>
                                                <td style="width: 15%;">{{Str::limit($item->detail_spesification, 40)}}</td>
                                                <td style="width: 10%;">Rp. <span class="float-right">{{number_format($item->nominal_price, 0)}}</span></td>
                                                <td style="width: 10%;">{{date('d-M-Y'),$item->purchase_date}}</td>
                                                <td style="width: 5%;" class="text-center">
                                                    @if($item->status == 'In Use')
                                                        <button type="button" class="btn btn-success btn-sm btn-rounded waves-effect waves-light">{{$item->status}}<span class="btn-label-right"><i class="mdi mdi-account-clock mdi-account-clock"></i></span></button>
                                                    @elseif($item->status == 'Available')
                                                        <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light">{{$item->status}}<span class="btn-label-right"><i class="mdi mdi-account-check"></i></span></button>
                                                    @else
                                                        <button type="button" class="btn btn-danger btn-sm btn-rounded waves-effect waves-light">{{$item->status}}<span class="btn-label-right"><i class="mdi  mdi-account-remove"></i></span></button>
                                                    @endif
                                                </td>
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

    {{-- start modal select new device --}}
    <div class="modal fade" id="bs-modalselectitem" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="title-modal">Select the equipment</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form action="{{route('change_equip')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <label for="condition">Is the previous device still working?</label>
                                <select class="form-control form-control-sm" name="condition" id="condition">
                                    <option value="true">Yes</option>
                                    <option value="false">No</option>
                                </select>
                            </div>
                            <div class="col-12 mb-2">
                                <label for="reason">Reasons for changing devices</label>
                                <input class="form-control form-control-sm" name="reason" id="reason">
                            </div>
                            <div class="col-12 mb-2 input-equipmentselected">
                                <label for="reason">Equipment selected</label>
                                <input class="form-control form-control-sm" name="equipselect" id="equipselect" readonly>
                            </div>
                            <input type="hidden" name="old_equipcode" id="old-equipcode">
                            <input type="hidden" name="computer_code" id="computer-code">
                            <input type="hidden" name="type" id="device-type">
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                 <h4 class="modal-title" id="title">List available equipment</h4>
                                <div class="table-responsive">
                                    <table class="table datatabledua w-100 nowrap" id="tbl-modallistequip">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Action</th>
                                                <th>Code</th>
                                                <th>Merk</th>
                                                <th>Spesification</th>
                                                <th>Price</th>
                                                <th>Purchase Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
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
    {{-- end modal show qr --}}
    {{-- start modal show qr --}}
    <div class="modal fade" id="bs-modaladd" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="title-modal">Add Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form action="{{'add_equip'}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="">Type</label>
                                <select class="form-control form-control-sm" name="type">
                                    <option value="Monitor">Monitor</option>
                                    <option value="Keyboard">Keyboard</option>
                                    <option value="Mouse">Mouse</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="">Merk</label>
                                <input type="text" class="form-control form-control-sm" name="merk">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="">Purchase Date</label>
                                <input type="date" class="form-control form-control-sm" name="purchase_date">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="">Price (Rp)</label>
                                <input type="text" class="form-control form-control-sm inp-currency" name="nominal_price">
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="">Detail Spesification</label>
                                <textarea class="form-control form-control-sm" name="detail_spesification"></textarea>
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="">Status</label>
                                <select class="form-control form-control-sm" name="status">
                                    <option value="Available">Available</option>
                                    <option value="Unavailable">Unavailable</option>
                                </select>
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
    {{-- end modal show qr --}}
    {{-- start modal show qr --}}
    <div class="modal fade" id="bs-modalshowqr" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Generate QR Code</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <img src="#" class="img-thumbnail" id="img-qrcode" alt="qr-code">
                        <div class="mt-2">
                            <a href="#" class="btn btn-sm btn-danger" id="btn-downloadqrcode" download="true">Download</a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal show qr --}}


    <x-slot:customjs>{{$custom_js}}</x-slot:customjs>
</x-layouts>