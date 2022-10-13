@extends('main')
@section('topscripts')
<style type="text/css">
    .dataTables_filter {
        display: none;
    }
</style>
@stop
@section('content')
<div class="container">
    {{-- <form action=""> --}}
        <div class="row">
            <div class="col-md-6 py-3">
                <h5>REPORTS</h5>
            </div>
        </div>
        <div class="row">
            <form action="">
                <div class="col-md-6">
                    <div class="col-md-6 pb-3">
                        <label for="platnum" class="form-label">No Plat</label>
                        <select class="form-select js-platnum" aria-label="Default select example" id="platnum"
                            name="platnum">
                            {{-- <option selected disabled>-- Pilih No Plat --</option> --}}
                            <option></option>
                            @foreach($noplats as $noplat)
                            <option value="{{ $noplat->name_mcar }}">{{ $noplat->name_mcar }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 pb-3">
                        <label for="exampleInputEmail1" class="form-label">Tanggal Dari</label>
                        <div class="input-group date" id="dtfrom">
                            <input type="text" class="form-control"
                                value="@php if(request('dtfrom')==NULL){ echo date('d/m/Y');} else{ echo $_GET['dtfrom']; } @endphp"
                                name="dtfrom">
                            <span class="input-group-append">
                                <span class="input-group-text bg-white d-block">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6 pb-3">
                        <label for="exampleInputEmail1" class="form-label">Sampai Tanggal</label>
                        <div class="input-group date" id="dtto">
                            <input type="text" class="form-control"
                                value="@php if(request('dtto')==NULL){ echo date('d/m/Y');} else{ echo $_GET['dtto']; } @endphp"
                                name="dtto">
                            <span class="input-group-append">
                                <span class="input-group-text bg-white d-block">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                    {{-- <div class="col-md-6 pb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" aria-label="Default select example" id="status" name="status">
                            <option selected disabled>-- Pilih Status --</option>
                            <option value="all">ALL</option>
                            <option value="ketok">Ketok</option>
                            <option value="dempul">Dempul</option>
                            <option value="epoxy">Epoxy</option>
                            <option value="cat">Cat</option>
                            <option value="poles">Poles</option>
                            <option value="finishing">Finishing</option>
                        </select>
                    </div> --}}
                    <div class="col-md- pb-3">
                        <button type="submit" formaction="{{ 'viewreports' }}" class="btn btn-primary px-5"><span>
                                View</span></button>
                    </div>
                </div>
            </form>
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="datatable">
                        <thead>
                            <tr>
                                <th scope="col" class="border-bottom-0 border-2">No</th>
                                <th scope="col" class="border-bottom-0 border-2">No Plat</th>
                                <th scope="col" class="border-bottom-0 border-2">Work Order</th>
                                <th scope="col" class="border-bottom-0 border-2">Tgl Selesai</th>
                                <th scope="col" class="border-bottom-0 border-2">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($results)
                            @php
                            $number = 1;
                            @endphp
                            @foreach($results as $item)
                            <tr>
                                <th scope="row" class="border-2">{{ $number }}</th>
                                <td class="border-2">{{ $item->name_mcar }}</td>
                                <td class="border-2">{{ $item->no_twoh }}</td>
                                <td class="border-2">{{ date("d/m/Y", strtotime($item->tdt)) }}</td>
                                <td class="border-2">{{ $item->carstat }}</td>
                            </tr>
                            @php
                            $number++;
                            @endphp
                            @endforeach
                            @endisset
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{--
    </form> --}}
</div>
@stop
@section('botscripts')
<script type="text/javascript">
    $(document).ready(function(){
        // $('#datatable').dataTable(
        //     {"ordering":false});

        $('#datatable').DataTable({"ordering":false});

        $('.js-platnum').select2({
            placeholder : 'No Plat',
            allowClear : true,
            initSelection: function(element, callback) {},
        });
    });


    $(function(){
      $('.date').datepicker({
        clearBtn: true,
        format: 'dd/mm/yyyy'
      });
    });
</script>
@endsection