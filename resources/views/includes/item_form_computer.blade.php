{{-- resources/views/includes/item_form_computer.blade.php --}}
@if(isset($data->code) && !empty($data->code))
    <input type="hidden" name="{{strtolower($itemName)}}_code" value="{{$data->code}}">
@endif
<div class="row border-top pt-1">
    <div class="col-md-1">
        <p class="mr-2"><b>{{ ucfirst($itemName) }}</b></p>
    </div>
    <div class="col-md-10">
        <input type="checkbox" checked data-plugin="switchery" data-color="#3db9dc" id="sw-{{ strtolower($itemName) }}" name="sw_{{ strtolower($itemName) }}" />
        <small>close if you are not using this equipment</small>
    </div>
</div>
<div class="row" id="row-{{ strtolower($itemName) }}">
    <div class="col-md-3">
        <div class="form-group">
            <label for="Merk">Merk<span class="text-danger">*</span></label>
            {{-- <input type="text" class="form-control form-control-sm @error($itemName.'_merk') is-invalid @enderror" name="{{ $itemName }}_merk" value="{{ $data->merk ?? '' }}"> --}}
            <input type="text" class="form-control form-control-sm @error($itemName.'_merk') is-invalid @enderror" name="{{ $itemName }}_merk" value="{{ $data->merk ?? old($itemName.'_merk') }}">
            @error($itemName.'_merk')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="Merk">Nominal Price</label>
                <input type="text" class="form-control form-control-sm inp-currency" name="{{ $itemName }}_nominal_price" value="{{ isset($data->nominal_price) ? number_format($data->nominal_price, 0) : (old($itemName.'_nominal_price')) }}">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="Merk">Purchase Date</label>
            <input type="date" class="form-control form-control-sm" name="{{ $itemName }}_purchase_date" value="{{ $data->purchase_date ?? old($itemName.'_purchase_date') }}">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="Merk">Detail Specification</label>
            <input type="text" class="form-control form-control-sm" name="{{ $itemName }}_detail_spesification" value="{{ $data->detail_spesification ?? old($itemName.'_detail_spesification') }}">
        </div>
    </div>
</div>
