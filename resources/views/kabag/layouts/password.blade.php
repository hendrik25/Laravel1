<div class="modal fade" id="ubahpassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                @php
                    use App\Models\User;
                    use App\Models\Admin;
                    // Mendapatkan data user yang sedang login
                    $user = Auth::user();
                    // Mengambil data admin yang terkait dengan user
                    $admins2 = $user->admin;
                @endphp
            <br><h2 style="text-align: center"> FORM UBAH PASSWORD</h2>
            <div class="modal-header"></div>
            <div class="modal-body">
                <form method="post" action="/kabag/user/update">
                    @csrf
                    <div class="row">
                        <div class="row">
                            <div class="col-sm-12">
                                <table width="auto" border="0" cellpadding="5">
                                    <tr>
                                        <td width="150px"><label class="col-form-label">NIK</label></td>
                                        <td width="350px"><input type="text" name="nik" class="form-control" value="{{ $admins2->nik }}" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label class="col-form-label">NAMA LENGKAP</label></td>
                                        <td><input type="text" name="name" class="form-control" value="{{ $admins2->name }}" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label class="col-form-label">PASSWORD LAMA</label></td>
                                        <td><input type="password" name="password" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label class="col-form-label">PASSWORD BARU</label></td>
                                        <td><input type="password" name="password2" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label class="col-form-label">PASS. CONFIRM</label></td>
                                        <td><input type="password" name="password3" class="form-control">
                                        </td>
                                    </tr>
                                </table>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Change</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
