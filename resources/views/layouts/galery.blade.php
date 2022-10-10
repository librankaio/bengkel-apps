@extends('main')
@section('content')
<div class="container">
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row title pt-2">
            <h1>Galery</h1>
        </div>
        <div class="row py-2">
            <div class="col-md-4">
                <label for="platnum" class="form-label">No Plat</label>
                <select class="form-select js-platnum" aria-label="Default select example" id="platnum" name="platnum">
                    {{-- <option selected disabled>-- Pilih No Plat --</option> --}}
                    <option></option>
                    @foreach($noplats as $noplat)
                    <option value="{{ $noplat->name_mcar }}">{{ $noplat->name_mcar }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <section class="uploadimg">
            <div class="row py-2">
                <div class="col-md-4">
                    <label for="formFile" class="form-label pb-3">Upload Gambar</label><button type="button"
                        class="btn btn-primary ms-3" id="addimg"><i class="fa fa-plus"></i></button>
                    <div class="description py-2">
                        <label for="desc0" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="desc0" name="desc0">
                    </div>
                    <input type="text" class="form-control" id="hdnupload0" name="hdnupload0" readonly>
                    <div class="input-group mb-3 px-2 py-1 bg-white shadow-sm"
                        style="border:1px solid #ced4da; border-radius:5px;">
                        <input id="upload0" name="upload0" type="file" onchange="readURL0(this);"
                            class="form-control border-0 upload">
                        <label id="upload-label0" for="upload0" class="font-weight-light text-muted upload-label">Choose
                            file</label>
                        <div class="input-group-append">
                            <label for="upload0" class="btn btn-light m-0 px-4"> <i
                                    class="fa fa-cloud-upload mr-2 text-muted"></i><small
                                    class="text-uppercase font-weight-bold text-muted"> Choose file</small></label>
                        </div>
                    </div>
                    <div class="image-area mt-4"><img id="imageResult0" src="" alt=""
                            class="img-fluid rounded shadow-sm mx-auto d-block"></div>
                </div>
            </div>
        </section>
        <section class="uploadimg1">
            <div class="row py-2">
                <div class="col-md-4">
                    <div class="description py-2">
                        <label for="desc1" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="desc1" name="desc1">
                    </div>
                    <input type="text" class="form-control" id="hdnupload1" name="hdnupload1" readonly>
                    <div class="input-group mb-3 px-2 py-1 bg-white shadow-sm"
                        style="border:1px solid #ced4da; border-radius:5px;">
                        <input id="upload1" name="upload1" type="file" onchange="readURL1(this);"
                            class="form-control border-0 upload">
                        <label id="upload-label1" for="upload1" class="font-weight-light text-muted upload-label">Choose
                            file</label>

                        <div class="input-group-append">
                            <label for="upload1" class="btn btn-light m-0 px-4"> <i
                                    class="fa fa-cloud-upload mr-2 text-muted"></i><small
                                    class="text-uppercase font-weight-bold text-muted"> Choose file</small></label>
                        </div>
                    </div>
                    <div class="image-area mt-4"><img id="imageResult1" src="#" alt=""
                            class="img-fluid rounded shadow-sm mx-auto d-block"></div>
                </div>
            </div>
        </section>
        <section class="uploadimg2">
            <div class="row py-2">
                <div class="col-md-4">
                    <div class="description py-2">
                        <label for="desc2" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="desc2" name="desc2">
                    </div>
                    <input type="text" class="form-control" id="hdnupload2" name="hdnupload2" readonly>
                    <div class="input-group mb-3 px-2 py-1 bg-white shadow-sm"
                        style="border:1px solid #ced4da; border-radius:5px;">
                        <input id="upload2" name="upload2" type="file" onchange="readURL2(this);"
                            class="form-control border-0 upload">
                        <label id="upload-label2" for="upload2" class="font-weight-light text-muted upload-label">Choose
                            file</label>

                        <div class="input-group-append">
                            <label for="upload2" class="btn btn-light m-0 px-4"> <i
                                    class="fa fa-cloud-upload mr-2 text-muted"></i><small
                                    class="text-uppercase font-weight-bold text-muted"> Choose file</small></label>
                        </div>
                    </div>
                    <div class="image-area mt-4"><img id="imageResult2" src="#" alt=""
                            class="img-fluid rounded shadow-sm mx-auto d-block"></div>
                </div>
            </div>
        </section>
        <section class="uploadimg3">
            <div class="row py-2">
                <div class="col-md-4">
                    <div class="description py-2">
                        <label for="desc3" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="desc3" name="desc3">
                    </div>
                    <input type="text" class="form-control" id="hdnupload3" name="hdnupload3" readonly>
                    <div class="input-group mb-3 px-2 py-1 bg-white shadow-sm"
                        style="border:1px solid #ced4da; border-radius:5px;">
                        <input id="upload3" name="upload3" type="file" onchange="readURL3(this);"
                            class="form-control border-0 upload">
                        <label id="upload-label3" for="upload3" class="font-weight-light text-muted upload-label">Choose
                            file</label>

                        <div class="input-group-append">
                            <label for="upload3" class="btn btn-light m-0 px-4"> <i
                                    class="fa fa-cloud-upload mr-2 text-muted"></i><small
                                    class="text-uppercase font-weight-bold text-muted"> Choose file</small></label>
                        </div>
                    </div>
                    <div class="image-area mt-4"><img id="imageResult3" src="#" alt=""
                            class="img-fluid rounded shadow-sm mx-auto d-block"></div>
                </div>
            </div>
        </section>
        <section class="uploadimg4">
            <div class="row py-2">
                <div class="col-md-4">
                    <div class="description py-2">
                        <label for="desc4" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="desc4" name="desc4">
                    </div>
                    <input type="text" class="form-control" id="hdnupload4" name="hdnupload4" readonly>
                    <div class="input-group mb-3 px-2 py-1 bg-white shadow-sm"
                        style="border:1px solid #ced4da; border-radius:5px;">
                        <input id="upload4" name="upload4" type="file" onchange="readURL4(this);"
                            class="form-control border-0 upload">
                        <label id="upload-label4" for="upload4" class="font-weight-light text-muted upload-label">Choose
                            file</label>

                        <div class="input-group-append">
                            <label for="upload4" class="btn btn-light m-0 px-4"> <i
                                    class="fa fa-cloud-upload mr-2 text-muted"></i><small
                                    class="text-uppercase font-weight-bold text-muted"> Choose file</small></label>
                        </div>
                    </div>
                    <div class="image-area mt-4"><img id="imageResult4" src="#" alt=""
                            class="img-fluid rounded shadow-sm mx-auto d-block"></div>
                </div>
            </div>
        </section>
        <section class="uploadimg5">
            <div class="row py-2">
                <div class="col-md-4">
                    <div class="description py-2">
                        <label for="desc5" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="desc5" name="desc5">
                    </div>
                    <input type="text" class="form-control" id="hdnupload5" name="hdnupload5" readonly>
                    <div class="input-group mb-3 px-2 py-1 bg-white shadow-sm"
                        style="border:1px solid #ced4da; border-radius:5px;">
                        <input id="upload5" name="upload5" type="file" onchange="readURL5(this);"
                            class="form-control border-0 upload">
                        <label id="upload-label5" for="upload5" class="font-weight-light text-muted upload-label">Choose
                            file</label>

                        <div class="input-group-append">
                            <label for="upload5" class="btn btn-light m-0 px-4"> <i
                                    class="fa fa-cloud-upload mr-2 text-muted"></i><small
                                    class="text-uppercase font-weight-bold text-muted"> Choose file</small></label>
                        </div>
                    </div>
                    <div class="image-area mt-4"><img id="imageResult5" src="#" alt=""
                            class="img-fluid rounded shadow-sm mx-auto d-block"></div>
                </div>
            </div>
        </section>
        <section class="uploadimg6">
            <div class="row py-2">
                <div class="col-md-4">
                    <div class="description py-2">
                        <label for="desc6" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="desc6" name="desc6">
                    </div>
                    <input type="text" class="form-control" id="hdnupload6" name="hdnupload6" readonly>
                    <div class="input-group mb-3 px-2 py-1 bg-white shadow-sm"
                        style="border:1px solid #ced4da; border-radius:5px;">
                        <input id="upload6" name="upload6" type="file" onchange="readURL6(this);"
                            class="form-control border-0 upload">
                        <label id="upload-label6" for="upload6" class="font-weight-light text-muted upload-label">Choose
                            file</label>

                        <div class="input-group-append">
                            <label for="upload6" class="btn btn-light m-0 px-4"> <i
                                    class="fa fa-cloud-upload mr-2 text-muted"></i><small
                                    class="text-uppercase font-weight-bold text-muted"> Choose file</small></label>
                        </div>
                    </div>
                    <div class="image-area mt-4"><img id="imageResult6" src="#" alt=""
                            class="img-fluid rounded shadow-sm mx-auto d-block"></div>
                </div>
            </div>
        </section>
        <section class="uploadimg7">
            <div class="row py-2">
                <div class="col-md-4">
                    <div class="description py-2">
                        <label for="desc7" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="desc7" name="desc7">
                    </div>
                    <input type="text" class="form-control" id="hdnupload7" name="hdnupload7" readonly>
                    <div class="input-group mb-3 px-2 py-1 bg-white shadow-sm"
                        style="border:1px solid #ced4da; border-radius:5px;">
                        <input id="upload7" name="upload7" type="file" onchange="readURL7(this);"
                            class="form-control border-0 upload">
                        <label id="upload-label7" for="upload7" class="font-weight-light text-muted upload-label">Choose
                            file</label>

                        <div class="input-group-append">
                            <label for="upload7" class="btn btn-light m-0 px-4"> <i
                                    class="fa fa-cloud-upload mr-2 text-muted"></i><small
                                    class="text-uppercase font-weight-bold text-muted"> Choose file</small></label>
                        </div>
                    </div>
                    <div class="image-area mt-4"><img id="imageResult7" src="#" alt=""
                            class="img-fluid rounded shadow-sm mx-auto d-block"></div>
                </div>
            </div>
        </section>
        {{-- <div class="row py-2">
            <div class="col-md-4">
                <div class="input-group mb-3 px-2 py-2 bg-white shadow-sm">
                    <input id="upload" type="file" onchange="readURL(this);" class="form-control border-0">
                    <label id="upload-label" for="upload" class="font-weight-light text-muted">Choose file</label>

                    <div class="input-group-append">
                        <label for="upload" class="btn btn-light m-0 px-4"> <i
                                class="fa fa-cloud-upload mr-2 text-muted"></i><small
                                class="text-uppercase font-weight-bold text-muted"> Choose file</small></label>
                    </div>
                </div>
            </div>
        </div> --}}
        {{-- BUTTON --}}
        <div class="row pb-5 pt-3">
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary" formaction="{{ route('updateupload') }}">Save</button>
                <button type="reset" class="btn btn-outline-primary" id="clear">Clear</button>
            </div>
        </div>

    </form>
</div>
@stop
@section('botscripts')
<script type="text/javascript">
    //CSRF TOKEN
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function(){

        $(".js-platnum option").each(function() {
            $(this).siblings('[value="'+ this.value +'"]').remove();
        });

        $('.js-platnum').select2({
            placeholder : 'No Plat',
            allowClear : true,
            initSelection: function(element, callback) {},
        });

        $("#platnum").on('select2:select',function (e) {
            var noplat = $(this).val();
            $.ajax({
                url : '{{ route('getimage') }}',
                method : 'post',
                data : {'noplat' : noplat},
                headers : {
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')},
                dataType : 'json',
                success : function (response){
                    console.log("response");
                    console.log(response);
                    for (j=0; j < 8; j++) {
                        resetdesc = "#desc"+[j];
                        resetimg = "#imageResult"+[j];
                        resetlbl = "#upload-label"+[j];
                        resetupval = "#upload"+[j];
                        $(resetimg).attr("src","");
                        $(resetdesc).val("");
                        $(resetlbl).text("Choose file");
                        $(resetupval).val("");
                    };
                    for (i=0; i < response.length; i++) {
                        if (noplat != ""){
                            if(response[i].name_mcar == noplat){
                                notwoh = response[i].no_twoh;
                                descimg = "#desc"+[i];
                                idimg = "#imageResult"+[i];
                                uploadimg = "#upload"+[i];
                                labelimg = "#upload-label"+[i];
                                hdninput = "#hdnupload"+[i];
                                img = 'storage/car-images/'+response[i].pic;
                                // return fetch(img).then((res)=> {
                                //     return res.blob();
                                // }).then((blob) => {
                                //     var bloburl = URL.createObjectURL(blob);
                                //     var idimg = "#imageResult"+[i];
                                //     $(idmg).attr("src",bloburl);
                                //     console.log(bloburl);
                                // }
                                $(descimg).val(response[i].note);
                                $(idimg).attr("src",img);
                                $(uploadimg).attr("value", response[i].pic);
                                $(labelimg).text(response[i].pic);
                                $(hdninput).val(response[i].pic);
                                console.log(response[i].pic);
                            }
                        }
                    }
                }
            });
        });

        $('.js-notwoh').select2({
            placeholder : 'No WO',
            allowClear : true,
            initSelection: function(element, callback) {},
        });
    });

        /*  ==========================================
        SHOW UPLOADED IMAGE 
    * ========================================== */
    function readURL0(input0) {
            if (input0.files && input0.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imageResult0').attr('src', e.target.result);
                };
                reader.readAsDataURL(input0.files[0]);
                console.log(input0.files[0]);
            }
        }

        $(function () {
            $('#upload0').on('change', function () {
                readURL0(input0);
            });
        });

        /*  ==========================================
            SHOW UPLOADED IMAGE NAME
        * ========================================== */
        var input0 = document.getElementById('upload0');
        var infoArea0 = document.getElementById('upload-label0');

        input0.addEventListener('change', showFileName0);

        function showFileName0(event) {
            var input0 = event.srcElement;
            var fileName0 = input0.files[0].name;
            infoArea0.textContent = 'File name: ' + fileName0;

        }

        /*  ==========================================
        SHOW UPLOADED IMAGE 1
    * ========================================== */
    function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    
                    $('#imageResult1').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
                // console.log(input.files[0]);
            }
        }

        $(function () {
            $('#upload1').on('change', function () {
                readURL1(input);
            });
        });

        /*  ==========================================
            SHOW UPLOADED IMAGE NAME 1
        * ========================================== */
        var input1 = document.getElementById('upload1');
        var infoArea1 = document.getElementById('upload-label1');

        input1.addEventListener('change', showFileName1);

        function showFileName1(event) {
            var input1 = event.srcElement;
            var fileName1 = input1.files[0].name;
            infoArea1.textContent = 'File name: ' + fileName1;

        }

        /*  ==========================================
        SHOW UPLOADED IMAGE 2
    * ========================================== */
    function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    
                    $('#imageResult2').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
                // console.log(input.files[0]);
            }
        }

        $(function () {
            $('#upload2').on('change', function () {
                readURL2(input);
            });
        });

        /*  ==========================================
            SHOW UPLOADED IMAGE NAME 2
        * ========================================== */
        var input2 = document.getElementById('upload2');
        var infoArea2 = document.getElementById('upload-label2');

        input2.addEventListener('change', showFileName2);

        function showFileName2(event) {
            var input2 = event.srcElement;
            var fileName2 = input2.files[0].name;
            infoArea2.textContent = 'File name: ' + fileName2;

        }
        
        /*  ==========================================
        SHOW UPLOADED IMAGE 3
    * ========================================== */
    function readURL3(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    
                    $('#imageResult3').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
                // console.log(input.files[0]);
            }
        }

        $(function () {
            $('#upload3').on('change', function () {
                readURL3(input);
            });
        });

        /*  ==========================================
            SHOW UPLOADED IMAGE NAME 3
        * ========================================== */
        var input3 = document.getElementById('upload3');
        var infoArea3 = document.getElementById('upload-label3');

        input3.addEventListener('change', showFileName3);

        function showFileName3(event) {
            var input3 = event.srcElement;
            var fileName3 = input3.files[0].name;
            infoArea3.textContent = 'File name: ' + fileName3;

        }

        /*  ==========================================
        SHOW UPLOADED IMAGE 4
    * ========================================== */
    function readURL4(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    
                    $('#imageResult4').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
                // console.log(input.files[0]);
            }
        }

        $(function () {
            $('#upload4').on('change', function () {
                readURL4(input);
            });
        });

        /*  ==========================================
            SHOW UPLOADED IMAGE NAME 4
        * ========================================== */
        var input4 = document.getElementById('upload4');
        var infoArea4 = document.getElementById('upload-label4');

        input4.addEventListener('change', showFileName4);

        function showFileName4(event) {
            var input4 = event.srcElement;
            var fileName4 = input4.files[0].name;
            infoArea4.textContent = 'File name: ' + fileName4;

        }

            /*  ==========================================
        SHOW UPLOADED IMAGE 5
    * ========================================== */
    function readURL5(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    
                    $('#imageResult5').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
                // console.log(input.files[0]);
            }
        }

        $(function () {
            $('#upload5').on('change', function () {
                readURL5(input);
            });
        });

        /*  ==========================================
            SHOW UPLOADED IMAGE NAME 5
        * ========================================== */
        var input5 = document.getElementById('upload5');
        var infoArea5 = document.getElementById('upload-label5');

        input5.addEventListener('change', showFileName5);

        function showFileName5(event) {
            var input5 = event.srcElement;
            var fileName5 = input5.files[0].name;
            infoArea5.textContent = 'File name: ' + fileName5;

        }

               /*  ==========================================
        SHOW UPLOADED IMAGE 6
    * ========================================== */
    function readURL6(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    
                    $('#imageResult6').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
                // console.log(input.files[0]);
            }
        }

        $(function () {
            $('#upload6').on('change', function () {
                readURL6(input);
            });
        });

        /*  ==========================================
            SHOW UPLOADED IMAGE NAME 6
        * ========================================== */
        var input6 = document.getElementById('upload6');
        var infoArea6 = document.getElementById('upload-label6');

        input6.addEventListener('change', showFileName6);

        function showFileName6(event) {
            var input6 = event.srcElement;
            var fileName6 = input6.files[0].name;
            infoArea6.textContent = 'File name: ' + fileName6;

        }

    /*  ==========================================
        SHOW UPLOADED IMAGE 7
    * ========================================== */
    function readURL7(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    
                    $('#imageResult7').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
                // console.log(input.files[0]);
            }
        }

        $(function () {
            $('#upload7').on('change', function () {
                readURL7(input);
            });
        });

        /*  ==========================================
            SHOW UPLOADED IMAGE NAME 7
        * ========================================== */
        var input7 = document.getElementById('upload7');
        var infoArea7 = document.getElementById('upload-label7');

        input7.addEventListener('change', showFileName7);

        function showFileName7(event) {
            var input7 = event.srcElement;
            var fileName7 = input7.files[0].name;
            infoArea7.textContent = 'File name: ' + fileName7;

        }

        $(document).on("click","#clear",function(e){

            $('#upload1').attr('src', "");
            infoArea1.textContent = "Choose file"
            $('#imageResult1').attr('src', "");
        });

</script>
@endsection