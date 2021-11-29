@extends('layouts.admin.app')
@section('title', 'User')
@section('user', 'active')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row col-12 mb-2">
                <div class="col-sm-6">
                    <h1>Create User</h1>
                </div>

            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title float-right">
                                <a href="{{ route('admin.user.index') }}" class="btn btn-primary">
                                    <i class="fa fa-arrow-left"></i> Back to List
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data"
                                id="form">
                                @csrf
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <p class="db_error"></p>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="name">Full Name &nbsp;<span class="req">*</span></label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="text" name="name"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            placeholder="Enter full name" id="" value="{{ old('name') }}">
                                                        <span class="require name text-danger"></span>
                                                        @error('name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="email">Email Address &nbsp;<span
                                                                class="req">*</span></label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="email" name="email" id="email"
                                                            onkeydown="validate(event,$(this))"
                                                            class="form-control @error('email') is-invalid @enderror"
                                                            value="{{ old('email') }}">
                                                        <span id="result"></span>
                                                        <span class="require email text-danger"></span>
                                                        @error('email')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="password">Password <span class="req">*</span></label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="password" name="password" id="password" value=""
                                                            class="form-control @error('password') is-invalid @enderror">
                                                        <span class="require password text-danger"></span>
                                                        @error('password')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="password_confirmation">Confirm Password <span
                                                                class="req">*</span></label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="password" name="password_confirmation"
                                                            class="form-control @error('password_confirmation') is-invalid @enderror">
                                                        @error('password_confirmation')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="roles">Assign Roles&nbsp;<span
                                                        class="req">*</span></label>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            @foreach ($roles as $role)
                                                                <div class="col-md-4 form-check">
                                                                    <input type="checkbox" value="{{ $role->id }}"
                                                                        class="form-check-input role example"
                                                                        name="roles[]" id="{{ $role->slug }}">
                                                                    <label for="">{{ $role->name }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <span class="require roles text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="address">Address</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="text" name="address" value="{{ old('address') }}"
                                                            class="form-control @error('address') is-invalid @enderror">
                                                        <span class="require address text-danger"></span>
                                                        @error('address')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="phone">Phone</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="text" name="phone" value="{{ old('phone') }}"
                                                            class="form-control @error('phone') is-invalid @enderror">
                                                        <span class="require phone text-danger"></span>
                                                        @error('phone')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="status">Status <span class="req">*</span></label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <select name="status"
                                                            class="form-control select2 @error('status') is-invalid @enderror"
                                                            id="status">
                                                            <option value="1"
                                                                {{ old('status') == '1' ? 'selected' : '' }}>
                                                                Active</option>
                                                            <option value="0"
                                                                {{ old('status') == '0' ? 'selected' : '' }}>
                                                                Inactive</option>
                                                        </select>
                                                        <span class="require status text-danger"></span>
                                                        @error('status')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="avatar">Upload profile pic</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="file" name="avatar" id="img"
                                                            onchange="showImg(this, 'imgPreview')"
                                                            class="form-control @error('avatar') is-invalid @enderror">
                                                        <img src="#" id="imgPreview" alt="">
                                                        <span class="require avatar text-danger"></span>
                                                        @error('avatar')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-2">Note</div>
                                                    <div class="col-md-10">
                                                        <p>Password must contain at least uppercase, lowercase, numeric and
                                                            special characters(!@&$#%(){}^*+-)</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <button type="button" onclick="submitForm(event);"
                                        class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        function submitForm(e) {
            e.preventDefault();
            $('.require').css('display', 'none');
            let url = $("#form").attr("action");
            $.ajax({
                url: url,
                type: 'post',
                data: new FormData(this.form),
                processData: false,
                contentType: false,
                cache: false,
                success: function(data) {
                    if (data.db_error) {
                        $(".alert-warning").css('display', 'block');
                        $(".db_error").html(data.db_error);
                    } else if (data.errors) {
                        var error_html = "";
                        $.each(data.errors, function(key, value) {
                            error_html = '<div>' + value + '</div>';
                            $('.' + key).css('display', 'block').html(error_html);
                        });
                    } else if (!data.errors && !data.db_error) {
                        location.href = data.redirectRoute;
                        toastr.success(data.msg);
                    }

                }
            });
        }

        $("#superadmin").removeClass('example');
        $("input:checkbox").change(function () {
            console.log('changed');
            $('input:checkbox').each(function () {
                var $this = $("#superadmin");
                if ($this.is(":checked")) {
                    $('input:checkbox').not($this).prop({disabled: true, checked: false});
                } else {
                    $('input:checkbox').prop('disabled', false);
                }
                if ($(".example:checked").length > 0) {
                    $("#superadmin").prop({disabled: true, checked: false});
                } else {
                    $("#superadmin").prop("disabled", false);
                }
            });
        });
    </script>
@endsection
