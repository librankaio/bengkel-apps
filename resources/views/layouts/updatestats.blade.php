@extends('main')
@section('content')
<div class="container">
    <form action="">
        <div class="row title pt-2">
            <h1>Update Status</h1>
        </div>
        <div class="row py-2">
            <div class="col-md-4">
                <label for="platnum" class="form-label">No Plat</label>
                <select class="form-select js-platnum" aria-label="Default select example" id="platnum" name="platnum">
                    {{-- <option selected disabled>-- Pilih No Plat --</option> --}}
                    <option></option>
                    @foreach($noplats as $noplat)
                    <option value="{{ $noplat->id }}">{{ $noplat->name_mcar }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row py-2">
            <div class="col-md-4">
                {{-- <label for="hdnplat" class="form-label">Hidden PlatNum</label> --}}
                <input type="text" class="form-control" id="hdnplat" name="hdnplat" hidden>
            </div>
        </div>
        <div class="row py-2">
            <div class="col-md-4">
                <label for="notwoh" class="form-label">No WO</label>
                <select class="form-select js-notwoh" aria-label="Default select example" id="notwoh" name="notwoh">

                </select>
            </div>
        </div>
        <div class="row py-2">
            <div class="col-md-4">
                <label for="nama_cust" class="form-label">Nama Cust</label>
                <input type="text" class="form-control" id="nama_cust" name="nama_cust" readonly>
            </div>
        </div>
        <div class="row py-2">
            <div class="col-md-4">
                <label for="asuransi" class="form-label">Asuransi</label>
                <input type="text" class="form-control" id="asuransi" name="asuransi" readonly>
            </div>
        </div>
        <div class="row py-2">
            <div class="col-md-4">
                <label for="tglwo" class="form-label">Tanggal WO</label>
                <input type="text" class="form-control" id="tglwo" name="tglwo" readonly>
            </div>
        </div>
        <div class="row py-2">
            <div class="col-md-4">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" aria-label="Default select example" id="status" name="status">
                    <option selected disabled>-- Pilih Status --</option>
                    <option value="ketok">Ketok</option>
                    <option value="dempul">Dempul</option>
                    <option value="epoxy">Epoxy</option>
                    <option value="cat">Cat</option>
                    <option value="poles">Poles</option>
                    <option value="finishing">Finishing</option>
                </select>
            </div>
        </div>
        <div class="row py-2">
            <div class="col-md-4">
                <label for="pic" class="form-label">PIC</label>
                <select class="form-select js-pic" aria-label="Default select example" id="pic" name="pic">
                    {{-- <option selected disabled>-- Pilih PIC --</option> --}}
                    <option></option>
                    @foreach($pics as $pic)
                    <option value="{{ $pic->name }}">{{ $pic->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row py-2">
            <div class="col-md-4">
                <label for="dtfinish" class="form-label">Tanggal Selesai</label>
                <div class="input-group date">
                    <input type="text" class="form-control"
                        value="@php if(request('dtfinish')==NULL){ echo date('d/m/Y');} else{ echo $_GET['dtfinish']; } @endphp"
                        name="dtfinish" id="dtfinish">
                    <span class="input-group-append">
                        <span class="input-group-text bg-white d-block">
                            <i class="fa fa-calendar"></i>
                        </span>
                    </span>
                </div>
            </div>
        </div>
        <div class="row py-2">
            <div class="col-md-4">
                <label for="notes" class="form-label">Notes</label>
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Masukkan Catatan disini" id="notes" name="notes"
                        style="height: 100px"></textarea>
                </div>
            </div>
        </div>
        <div class="pb-5">
            <button type="submit" class="btn btn-primary" formaction="{{ route('saveupdatestats') }}">Save</button>
            <button type="reset" class="btn btn-outline-primary" id="clear">Clear</button>
        </div>
    </form>
</div>
@stop
@section('botscripts')
<script type="text/javascript">
    //CSRF TOKEN
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function(){
        noplat = "";
        $('.js-platnum').select2({
            placeholder : 'No Plat',
            allowClear : true,
            initSelection: function(element, callback) {},
        });
        $("#platnum").on('select2:select',function (e) {
            var id = $(this).val();
            $.ajax({
                url : '{{ route('getNoPlatDetails') }}',
                method : 'post',
                data : {'id' : id},
                headers : {
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')},
                dataType : 'json',
                success : function (response){
                    for (i=0; i < response.length; i++) {
                        if (response[i].id == id){
                            $("#nama_cust").val(response[i].name_mcust);
                            $("#asuransi").val(response[i].name_minsurance);
                            tglwo = response[i].tdt
                            let dateformat = new Date(tglwo).toLocaleDateString('en-GB');
                            $("#tglwo").val(dateformat);
                            noplat = response[i].name_mcar;
                            $("#hdnplat").val(noplat);
                        }
                    }
                    $.ajax({
                        url : '{{ route('getnotwoh') }}',
                        method : 'post',
                        data : {'noplat' : noplat},
                        headers : {
                            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')},
                        dataType : 'json',
                        success : function (response){
                            $("#notwoh").empty();
                            for (i=0; i < response.length; i++) {
                                if (noplat != ""){
                                    if(response[i].name_mcar == noplat){
                                        notwoh = response[i].no;                                        
                                        $("#notwoh").append("<option value='"+notwoh+"'>"+notwoh+"</option>");
                                    }
                                }
                            }
                            notwoh = $("#notwoh").val();
                            $.ajax({
                                url : '{{ route('gettwohdetails') }}',
                                method : 'post',
                                data : {'noplat' : noplat,
                                        'notwoh' : notwoh},
                                headers : {
                                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')},
                                dataType : 'json',
                                success : function (response){
                                    console.log(response);
                                    for (i=0; i < response.length; i++) {
                                        $("#nama_cust").val(response[i].name_mcust);
                                        $("#asuransi").val(response[i].name_minsurance);
                                        tglwo = response[i].tdt
                                        let dateformat = new Date(tglwo).toLocaleDateString('en-GB');
                                        $("#tglwo").val(dateformat);
                                        noplat = response[i].name_mcar;
                                    }
                                }
                            });
                        }
                    });
                }
            });
        });
        $('.js-pic').select2({
            placeholder : 'Select PIC',
            allowClear : true,
            initSelection: function(element, callback) {},
        });
        $("#pic").on('select2:select',function (e) {
            var picname = $(this).val();
            $.ajax({
                url : '{{ route('getpic') }}',
                method : 'post',
                data : {'picname' : picname},
                headers : {
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')},
                dataType : 'json',
                success : function (response){
                    console.log("res pic");
                    console.log(picname);
                }
            });
        });

        $('.js-notwoh').select2({
            placeholder : 'No WO',
            allowClear : true,
            initSelection: function(element, callback) {},
        });

        $("#notwoh").on('select2:select',function (e) {
            var notwoh = $(this).val();
            $.ajax({
                url : '{{ route('gettwohdetails') }}',
                method : 'post',
                data : {'noplat' : noplat,
                        'notwoh' : notwoh},
                headers : {
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')},
                dataType : 'json',
                success : function (response){
                    console.log("Item Twoh Details");
                    console.log(noplat);
                    console.log(notwoh);
                    console.log(response);
                    for (i=0; i < response.length; i++) {
                        $("#nama_cust").val(response[i].name_mcust);
                        $("#asuransi").val(response[i].name_minsurance);
                        tglwo = response[i].tdt
                        let dateformat = new Date(tglwo).toLocaleDateString('en-GB');
                        $("#tglwo").val(dateformat);
                        noplat = response[i].name_mcar;
                    }
                }
            });
        });
    });

    $(function(){
      $('.date').datepicker({
        clearBtn: true,
        format: 'dd/mm/yyyy'
      });
    });
    $(document).on("click","#clear",function(e){
        $("#platnum").val('').trigger('change');
        $("#status").val('').trigger('change');
        $("#pic").val('').trigger('change');
    });
</script>
@endsection