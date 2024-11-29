<x-layouts>
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
                                <form action="{{route('edit_laptop', ['laptop' => $laptop->code])}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="merk">Merk <span class="text-danger">*</span></label>
                                                <select class="form-control form-control-sm @error('merk') is-invalid @enderror" id="merk" name="merk">
                                                    <?php foreach (['Lenovo', 'Asus', 'HP', 'Acer', 'DELL'] as $row) :?>
                                                        <option value="<?= $row ?>" {{$laptop->merk == $row ? 'selected' : ''}}><?= $row ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="type">Type <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control form-control-sm @error('type') is-invalid @enderror" id="type" name="type" value="{{$laptop->type}}">
                                                @error('type')
                                                    <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="device_id">Device ID <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control form-control-sm @error('device_id') is-invalid @enderror" id="device_id" name="device_id" value="{{$laptop->device_id}}" placeholder="17F71197-91A3-xxxx-xxxx">
                                                @error('device_id')
                                                    <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="product_id">Product ID <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control form-control-sm @error('product_id') is-invalid @enderror" id="product_id" name="product_id" value="{{$laptop->product_id}}" placeholder="00330-53235-xxxx-xxxx">
                                                @error('product_id')
                                                    <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="os">OS <span class="text-danger">*</span></label>
                                                <select class="form-control form-control-sm @error('os') is-invalid @enderror" id="os" name="os" value="{{$laptop->os}}">
                                                    <?php foreach (['Windows 7', 'Windows 8', 'Windows 10', 'Windows 11'] as $row) :?>
                                                        <option value="<?= $row ?>" {{$laptop->os == $row ? 'selected' : ''}}><?= $row ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                @error('os')
                                                    <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="processor">processor <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control form-control-sm @error('processor') is-invalid @enderror" id="processor" name="processor" value="{{$laptop->processor}}">
                                                @error('processor')
                                                    <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="ram">RAM (GB) <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control form-control-sm @error('ram') is-invalid @enderror inp-number" id="ram" name="ram" value="{{$laptop->ram}}">
                                                @error('ram')
                                                    <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="storage_type_one">Storage Type 1</label>
                                                        <select class="form-control form-control-sm @error('storage_type_one') is-invalid @enderror" name="storage_type_one" id="storage_type_one">
                                                            <option value="HDD" {{$laptop->storage_type_one == 'HDD' ? 'selected' : ''}}>HDD</option>
                                                            <option value="SSD" {{$laptop->storage_type_one == 'SSD' ? 'selected' : ''}}>SSD</option>
                                                        </select>
                                                        @error('storage_type_one')
                                                            <small class="text-danger">{{$message}}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="storage_capacity_one">Storage Capacity 1</label>
                                                        <input type="text" class="form-control form-control-sm @error('storage_capacity_one') is-invalid @enderror" name="storage_capacity_one" id="storage_capacity_one" value="{{$laptop->storage_capacity_one}}">
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
                                                            <option value="Empty">Empty</option>
                                                            <option value="HDD" {{$laptop->storage_type_two == 'HDD' ? 'selected' : ''}}>HDD</option>
                                                            <option value="SSD" {{$laptop->storage_type_two == 'SSD' ? 'selected' : ''}}>SSD</option>
                                                        </select>
                                                        @error('storage_type_two')
                                                            <small class="text-danger">{{$message}}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="storage_capacity_two">Storage Capacity 2</label>
                                                        <input type="text" class="form-control form-control-sm @error('storage_capacity_two') is-invalid @enderror" name="storage_capacity_two" id="storage_capacity_two" value="{{$laptop->storage_capacity_two}}" {{$laptop->storage_type_two == 'Empty' ? 'readonly' : ''}}>
                                                        @error('storage_capacity_two')
                                                            <small class="text-danger">{{$message}}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="detail_spec">Detail Spesification</label>
                                                <input type="text" class="form-control form-control-sm" id="detail_spec" name="detail_spesification" value="{{$laptop->detail_spesification}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="purchase_date">Pruchase Date</label>
                                                <input type="date" class="form-control form-control-sm @error('purchase_date') is-invalid @enderror" id="purchase_date" name="purchase_date" value="{{$laptop->purchase_date}}">
                                                @error('purchase_date')
                                                    <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="waranty_expiry">Waranty Expiry</label>
                                                <input type="date" class="form-control form-control-sm @error('waranty_expiry') is-invalid @enderror" id="waranty_expiry" name="waranty_expiry" value="{{$laptop->waranty_expiry}}">
                                                @error('waranty_expiry')
                                                    <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>                               
                                        </div>
                                        <div class="col-md-4">                               
                                            <div class="form-group">
                                                <label for="nominal_price">Nominal Price (Rp)</label>
                                                <input type="text" class="form-control form-control-sm @error('nominal_price') is-invalid @enderror inp-currency" id="nominal_price" name="nominal_price" value="{{number_format($laptop->nominal_price, 0)}}">
                                                @error('nominal_price')
                                                    <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="text" class="form-control form-control-sm @error('password') is-invalid @enderror" id="password" name="password" value="{{$laptop->password}}" placeholder="">
                                                @error('password')
                                                    <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="storage">Information</label>
                                                <input type="text" class="form-control form-control-sm @error('information') is-invalid @enderror" id="information" name="information" value="{{$laptop->information}}" placeholder="">
                                                @error('information')
                                                    <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="location">Location <span class="text-danger">*</span></label>
                                                <select class="form-control form-control-sm @error('location') is-invalid @enderror" id="location" name="location" value="{{$laptop->location}}">
                                                    <option value="HO">HO</option>
                                                    <option value="Sites">Sites</option>
                                                </select>
                                                @error('location')
                                                    <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="status">Status <span class="text-danger">*</span></label>
                                                <select class="form-control form-control-sm @error('status') is-invalid @enderror" id="status_laptop" name="status" value="{{$laptop->status}}">
                                                    <option value="In Use" {{$laptop->status == 'In Use' ? 'selected' : ''}}>In Use</option>
                                                    <option value="Available" {{$laptop->status == 'Available' ? 'selected' : ''}}>Available</option>
                                                    <option value="Unavailable" {{$laptop->status == 'Unavailable' ? 'selected' : ''}}>Unavailable</option>
                                                </select>
                                                @error('status')
                                                    <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                            @if($laptop->status == 'In Use')
                                                <div class="form-group row-user">
                                                    <label for="status">Users <span class="text-danger">*</span></label>
                                                    <select class="form-control form-control-sm @error('status') is-invalid @enderror select2" id="user_id" name="user_id">
                                                        <option value="">-</option>
                                                        @foreach($users as $item)
                                                            <option value="{{$item->id}}" {{$laptop->user->id == $item->id ? 'selected' : ''}} >{{$item->name}} - {{$item->position->position_name}} - {{$item->job->job_name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('status')
                                                        <small class="text-danger">{{$message}}</small>
                                                    @enderror
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    @if($laptop->equipComputer->isNotEmpty())
                                        @foreach(['Mouse', 'Monitor'] as $itemName)
                                            @php
                                                $data = $laptop->equipComputer->firstWhere('jenis', $itemName) ?? null;
                                            @endphp
                                            @include('includes.item_form_computer', ['itemName' => strtolower($itemName), 'data' => $data])
                                        @endforeach
                                    @else
                                        @foreach(['Mouse', 'Monitor'] as $itemName)
                                            @include('includes.item_form_computer', ['itemName' => strtolower($itemName), 'data' => null])
                                        @endforeach
                                    @endif
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