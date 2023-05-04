<div id="ubahpassword" class="modalDialog">
    <div>
            @php
                use App\Models\User;
                use App\Models\Admin;
                // Mendapatkan data user yang sedang login
                $user = Auth::user();
                // Mengambil data admin yang terkait dengan user
                $admins2 = $user->admin;
            @endphp
        <a href="" id="close" title="Close" class="close">X</a><br>
        <center><h2> FORM UBAH PASSWORD</h2></center>
        <hr align=left color="#00008B"><br>
        <form method="post" action="/admin/user/update">
            @csrf
            @if($admins2)
                <div class="row">
                    <div class="col-sm-12">
                        <table width="auto" border="0" cellpadding="5">
                            <tr>
                                <td><label class="col-form-label">NIK</label></td>
                                <td width="auto"><input type="text" name="nik" class="form-control" value="{{ $admins2->nik }}" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td><label class="col-form-label">NAMA</label></td>
                                <td><input type="text" name="username" class="form-control" value="{{ $admins2->name }}" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td><label class="col-form-label">PASSWORD LAMA</label></td>
                                <td><input type="password" name="password" class="form-control">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td><label class="col-form-label">PASSWORD BARU</label></td>
                                <td>
                                    <input type="password" name="password2" class="form-control">
                                    @error('password2')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td><label class="col-form-label">PASSWORD CONFIRM</label></td>
                                <td>
                                    <input type="password" name="password3" class="form-control">
                                    @error('password3')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" name="simpan" value="SIMPAN" class="btn btn-success" style="width: 100%;"></td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                </div>
            @endif
        </form>
    </div>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif
