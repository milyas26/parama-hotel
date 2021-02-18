@extends('dashboard.template.home')
@section('subjudul', 'Create Info')

@section('content')
    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                    {{ $error }}
                </div>
            </div>
        @endforeach
    @endif

    @if (Session::has('success'))
        <div class="alert alert-primary alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                {{ Session('success') }}
            </div>
        </div>
    @endif


    <form action="{{route('unit.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Image</label>
                    <div class="input-group mb-3">
                        <input type="file" name="image" class="form-control" aria-describedby="file-add" required>
                        {{-- <div class="input-group-append">
                          <button class="btn btn-success" type="button" id="file-add"><i class="fa fa-plus-circle"></i></button>
                        </div> --}}
                    </div>
                </div>
                {{-- <div id="added"></div> --}}
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Title Unit" required>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea  cols="30" rows="10" name="description" id="description" class="form-control" placeholder="Description Unit" required style="height: 300px"></textarea>
                </div>
                <div class="form-row">
                    <div class="form-group col-xl">
                        <label>Floor</label>
                        <select name="floor" id="floor" class="custom-select" required>
                            <option value="0" disabled selected>-- Choose Floor --</option>
                            <option value="1-16">Lantai 1 - 16</option>
                            <option value="17-18">Lantai 17 - 18</option>
                        </select>
                    </div>
                    <div class="form-group col-xl" id="form-unit1">
                        <label>Type Unit</label>
                        <div id="u1">
                            <select name="unit1" id="unit1" class="custom-select" required>
                                <option value="0" disabled selected>-- Choose Type Unit --</option>
                                <option value="A-B">A dan B</option>
                                <option value="C-D">C dan D</option>
                                <option value="E-F">E dan F</option>
                            </select>
                        </div>
                        <div id="u2">    
                            <select name="unit2" id="unit2" class="custom-select" required>
                                <option value="0">-- Choose Type Unit --</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Luas</label>
                    <div class="input-group mb-3">
                        <input type="number" name="large" id="large" min="0" class="form-control" placeholder="Large Unit" aria-label="Username" aria-describedby="basic-addon1" required>
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">M<sup>2</sup></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Create Unit</button>
                </div>
            </form>
@endsection

@section('add-script')
<script>
    $(document).ready(function(){
        $('#form-unit1').css({
            'display' : 'none'
        });
        $('#u1').css({
            'display' : 'block'
        });
        $('#u2').css({
            'display' : 'block'
        });

        $('#floor').change(function(){
            var value = $(this).val();
            // console.log(value);

            if (value == "1-16") {
                $('#form-unit1').css({
                    'display' : 'block'
                });
                $('#u1').css({
                    'display' : 'block'
                });
                $('#u2').css({
                    'display' : 'none'
                });     
            } else {
                $('#form-unit1').css({
                    'display' : 'block'
                });
                $('#u2').css({
                    'display' : 'block'
                });
                $('#u1').css({
                    'display' : 'none'
                });     
            }
        });

        let i = 1;
        $('#file-add').click(function(){
            i++;
            $('#added').append(`
            <div class="form-group${i}" id="form-add-img${i}">
                <div class="input-group mb-3">
                    <input type="file" name="images[]" class="custom-file" aria-describedby="${i}" required>
                    <div class="input-group-append">
                        <button class="btn btn-danger hapus" type="button" id="${i}"><i class="fa fa-times-circle"></i></button>
                    </div>
                </div>
            </div>
            `);
        });

        $(document).on('click', '.hapus', function(){
            var button_hapus = $(this).attr("id");   
            $('#form-add-img'+button_hapus+'').remove(); 
        }); 

    });
</script>
@endsection