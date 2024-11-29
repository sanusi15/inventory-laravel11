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
                                <a href="#" class="btn btn-sm btn-primary waves-effect waves-light mb-2" data-toggle="modal" data-target="#bs-modal-add">
                                    <span class="btn-label"><i class="mdi mdi-plus"></i></span>Add Data
                                </a>
                                <table class="table scroll-horizontal-datatable w-100 nowrap">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Action</th>
                                            <th>Job Number</th>
                                            <th>Job Name</th>
                                            <th>Job Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jobs as $item)
                                            <tr>
                                                <td style="width: 20px;">{{$loop->iteration}}</td>
                                                <td class="d-flex" style="width: 20px;">
                                                    <button class="btn btn-xs btn-primary p-1 mr-2 btn-show" data-id="{{$item->job_no}}"><i class="fe-edit-1 mr-1"></i>Edit</button>
                                                    <form id="frmDelete-{{ $item->job_no }}" action="{{route('delete_job', ['job' => $item->job_no])}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-xs btn-danger p-1 btn-delete" data-id="{{$item->job_no}}"><i class="fe-trash mr-1"></i>Delete</button>
                                                    </form>
                                                </td>
                                                <td>{{$item->job_no}}</td>
                                                <td>{{Str::limit($item->job_name,20)}}</td>
                                                <td>{{$item->job_status}}</td>
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

    <!-- Start Modal Add Job -->
     <div class="modal fade" id="bs-modal-add" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Add data job</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form action="{{route('save_job')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Job Number</label>
                                    <input type="text" class="form-control form-control-sm" name="job_number" id="job_number">
                                </div>
                                <div class="form-group">
                                    <label for="">Job Name</label>
                                    <input type="text" class="form-control form-control-sm" name="job_name" id="job_name">
                                </div>
                                <div class="form-group">
                                    <label for="">Job Status</label>
                                    <select class="form-control form-control-sm" name="job_status" id="job_status">
                                        <option value="Pelaksanaan">Pelaksanaan</option>
                                        <option value="Closed">Closed</option>
                                    </select>
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
    <!-- End Modal Add Job -->

    <x-slot:customjs>{{$custom_js}}</x-slot:customjs>
</x-layouts>