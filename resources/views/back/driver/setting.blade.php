@extends('back.layout')
@section('content')

        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Hi, welcome back!</h4>
                        <p class="mb-0">Y</p>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Setting</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="profile card card-body px-3 pt-3 pb-0">
                        <div class="profile-head">
                            <div class="photo-content">
                                <div class="cover-photo rounded"></div>
                            </div>
                            <div class="profile-info">
                                <div class="profile-photo">
                                    <img src="{!! asset('back/images/profile.png') !!}" class="img-fluid rounded-circle" alt="">
                                </div>
                                <div class="profile-details">
                                    <div class="profile-name px-3 pt-2">
                                        <h4 class="text-primary mb-0">{!! $item->first_name.' '.$item->last_name !!}</h4>
                                        <p>Name</p>
                                    </div>
                                    <div class="profile-email px-2 pt-2">
                                        <h4 class="text-muted mb-0">{!! $item->email !!}</h4>
                                        <p>Email</p>
                                    </div>
                                    <div class="dropdown ms-auto">
                                        <a href="#" class="btn btn-primary light sharp" data-bs-toggle="dropdown" aria-expanded="true"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></a>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li class="dropdown-item"><i class="fa fa-user-circle text-primary me-2"></i> View profile</li>
                                            <li class="dropdown-item"><i class="fa fa-users text-primary me-2"></i> Add to btn-close friends</li>
                                            <li class="dropdown-item"><i class="fa fa-plus text-primary me-2"></i> Add to group</li>
                                            <li class="dropdown-item"><i class="fa fa-ban text-primary me-2"></i> Block</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Driver Licence</h4>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <img src="{!! asset('back/images/554.jpg') !!}" width="100" alt=""/>
                                    <div class="input-group custom_file_input mb-3">
                                        <div class="form-file">
                                            <input type="file" class="form-file-input form-control">
                                        </div>
                                        <span class="input-group-text">Driver card</span>
                                    </div>
                                </div>
                                @csrf
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Your profile</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form method="Post" name="profile">
                                            @csrf
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">First Name</label>
                                                    <input type="text" class="form-control" value="{!! $item->first_name !!}" name="first_name" placeholder="1234 Main St">
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Last Name</label>
                                                    <input type="text" name="last_name" value="{!! $item->last_name !!}" class="form-control" placeholder="1234 Main St">
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Phone</label>
                                                    <input type="text" name="phone" value="{!! $item->phone !!}" class="form-control" placeholder="1234 Main St">
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" name="email" value="{!! $item->email !!}" class="form-control" placeholder="1234 Main St">
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Address</label>
                                                    <input type="text" name="address" value="{!! $item->address !!}" class="form-control" placeholder="1234 Main St">
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Postal</label>
                                                    <input type="text" name="postal_code" value="{!! $item->postal_code !!}" class="form-control" placeholder="1234 Main St">
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                        <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Security</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form>
                                    @csrf
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">New Password</label>
                                            <input type="password" class="form-control" placeholder="*******">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Old Password</label>
                                            <input type="password" class="form-control" placeholder="*******">
                                        </div>

                                    </div>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
            </div>
        </div>



@endsection
