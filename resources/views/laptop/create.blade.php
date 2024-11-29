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
                                <form action="{{route('add_laptop')}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="merk">Merk <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control form-control-sm @error('merk') is-invalid @enderror""  id="merk" name="merk" value="{{old('merk')}}" placeholder="ASUS">
                                                @error('merk')
                                                    <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="type">Type</label>
                                                <input type="text" class="form-control form-control-sm @error('type') is-invalid @enderror" id="type" name="type" value="{{old('type')}}" placeholder="Vivobook X1402ZA">
                                                @error('type')
                                                    <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="device_id">Device ID</label>
                                                <input type="text" class="form-control form-control-sm @error('device_id') is-invalid @enderror" id="device_id" name="device_id" value="{{old('device_id')}}" placeholder="17F71197-91A3-xxxx-xxxx">
                                                @error('device_id')
                                                    <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="product_id">Product ID</label>
                                                <input type="text" class="form-control form-control-sm @error('product_id') is-invalid @enderror" id="product_id" name="product_id" value="{{old('product_id')}}" placeholder="00330-53235-xxxx-xxxx">
                                                @error('product_id')
                                                    <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="os">OS <span class="text-danger">*</span></label>
                                                <select class="form-control form-control-sm @error('os') is-invalid @enderror" id="os" name="os" value="{{old('os')}}">
                                                    <?php foreach (['Windows 7', 'Windows 8', 'Windows 10', 'Windows 11'] as $row) :?>
                                                        <option value="<?= $row ?>" {{old('os') == $row ? 'selected' : ''}}><?= $row ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                @error('os')
                                                    <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="processor">processor <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control form-control-sm @error('processor') is-invalid @enderror" id="processor" name="processor" value="{{old('processor')}}" placeholder="Intel Core I7-1260P">
                                                @error('processor')
                                                    <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="ram">RAM (GB) <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control form-control-sm @error('ram') is-invalid @enderror inp-number" id="ram" name="ram" value="{{old('ram')}}" placeholder="16">
                                                @error('ram')
                                                    <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="storage_type_one">Storage Type 1</label>
                                                        <select class="form-control form-control-sm @error('storage_type_one') is-invalid @enderror" name="storage_type_one" id="storage_type_one">
                                                            <option value="HDD" {{old('storage_type_one') == 'HDD' ? 'selected' : ''}}>HDD</option>
                                                            <option value="SSD" {{old('storage_type_one') == 'SSD' ? 'selected' : ''}}>SSD</option>
                                                        </select>
                                                        @error('storage_type_one')
                                                            <small class="text-danger">{{$message}}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="storage_capacity_one">Storage Capacity 1</label>
                                                        <input type="text" class="form-control form-control-sm @error('storage_capacity_one') is-invalid @enderror" name="storage_capacity_one" id="storage_capacity_one" value="{{old('storage_capacity_one')}}">
                                                        @error('storage_capacity_one')
                                                            <small class="text-danger">{{$message}}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="storage_type_two">Storage Type 2</label>
                                                        <select class="form-control form-control-sm @error('storage_type_two') is-invalid @enderror" name="storage_type_two" id="storage_type_two">
                                                            <option value="">Empty</option>
                                                            <option value="HDD">HDD</option>
                                                            <option value="SSD">SSD</option>
                                                        </select>
                                                        @error('storage_type_two')
                                                            <small class="text-danger">{{$message}}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="storage_capacity_two">Storage Capacity 2</label>
                                                        <input type="text" class="form-control form-control-sm @error('storage_capacity_two') is-invalid @enderror" name="storage_capacity_two" id="storage_capacity_two" readonly>
                                                        @error('storage_capacity_two')
                                                            <small class="text-danger">{{$message}}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="detail_spec">Detail Spesification</label>
                                                <input type="text" class="form-control form-control-sm" id="detail_spec" name="detail_spesification" value="{{old('detail_spesification')}}" placeholder="Intel® UHD Graphics *Intel Iris Xᵉ Graphics...">
                                            </div>
                                            <div class="form-group">
                                                <label for="purchase_date">Pruchase Date</label>
                                                <input type="date" class="form-control form-control-sm @error('purchase_date') is-invalid @enderror" id="purchase_date" name="purchase_date" value="{{old('purchase_date')}}">
                                                @error('purchase_date')
                                                    <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="waranty_expiry">Waranty Expiry</label>
                                                <input type="date" class="form-control form-control-sm @error('waranty_expiry') is-invalid @enderror" id="waranty_expiry" name="waranty_expiry" value="{{old('waranty_expiry')}}">
                                                @error('waranty_expiry')
                                                    <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>                               
                                        </div>
                                        <div class="col-md-4">                               
                                            <div class="form-group">
                                                <label for="nominal_price">Nominal Price (Rp)</label>
                                                <input type="text" class="form-control form-control-sm @error('nominal_price') is-invalid @enderror inp-currency" id="nominal_price" name="nominal_price" value="{{old('nominal_price')}}" placeholder="12,500,000">
                                                @error('nominal_price')
                                                    <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="text" class="form-control form-control-sm @error('password') is-invalid @enderror" id="password" name="password" value="{{old('password')}}">
                                                @error('password')
                                                    <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                            @if($session_user != null)
                                                <input type="hidden" name="information" value="Dipakai oleh {{$session_user->name}}">
                                            @else
                                                <div class="form-group">
                                                    <label for="storage">Information</label>
                                                    <input type="text" class="form-control form-control-sm @error('information') is-invalid @enderror" id="information" name="information" value="{{old('information')}}" placeholder="Belum dipakai/Baru">
                                                    @error('information')
                                                        <small class="text-danger">{{$message}}</small>
                                                    @enderror
                                                </div>
                                            @endif
                                            <div class="form-group">
                                                <label for="location">Location <span class="text-danger">*</span></label>
                                                <select class="form-control form-control-sm @error('location') is-invalid @enderror" id="location" name="location" value="{{old('location')}}">
                                                    <option value="HO">HO</option>
                                                    <option value="Sites">Sites</option>
                                                </select>
                                                @error('location')
                                                    <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group row-job" style="display: none">
                                                <label for="status">Job <span class="text-danger">*</span></label>
                                                <select class="form-control form-control-sm @error('status') is-invalid @enderror select2" id="user_id" name="user_id">
                                                    <option value="">-</option>
                                                    @foreach($jobs as $item)
                                                        <option value="{{$item->job_no}}">{{$item->job_no}} - {{$item->job_name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('status')
                                                    <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                            @if ($session_user != null)
                                                <input type="hidden" name="status" value="In Use">
                                            @else
                                                <div class="form-group">
                                                    <label for="status">Status <span class="text-danger">*</span></label>
                                                    <select class="form-control form-control-sm @error('status') is-invalid @enderror" id="status_laptop" name="status" value="{{old('status')}}">
                                                        <option value="Available">Available</option>
                                                        <option value="Unavailable">Unavailable</option>
                                                    </select>
                                                    @error('status')
                                                        <small class="text-danger">{{$message}}</small>
                                                    @enderror
                                                </div>
                                            @endif
                                            @if($session_user != null)
                                                <input type="hidden" name="user_id" value="{{$session_user->id}}">
                                            @else
                                                <input type="hidden" name="user_id" value="">
                                            @endif
                                        </div>
                                    </div>
                                    @foreach(['Monitor', 'Mouse'] as $itemName)
                                        @include('includes.item_form_computer', ['itemName' => strtolower($itemName), 'data' => null])
                                    @endforeach
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-sm btn-primary float-right ml-1">Save</button>
                                                <button type="reset" class="btn btn-sm btn-secondary float-right">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                    </div><!-- end col-->
                </div>
        </div>
        </div>
    </div>

    
    <x-slot:customjs>{{$custom_js}}</x-slot:customjs>
</x-layouts>