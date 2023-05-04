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
        <hr align=left color="#00008B">
        <form method="post" action="/admin/user/update">
            @csrf
            @if($admins2)
                <div class="row">
                    <div class="col-sm-12">
                                <label class="col-form-label">NIK</label>
                                <input type="text" name="nik" class="form-control" value="{{ $admins2->nik }}" readonly>
                                <label class="col-form-label">NAMA</label>
                                <input type="text" name="username" class="form-control" value="{{ $admins2->name }}" readonly>
                                <label class="col-form-label">PASSWORD LAMA</label>
                                <input type="password" name="password" class="form-control">
                                <label class="col-form-label">PASSWORD BARU</label>
                                <input type="password" name="password2" class="form-control">
                                <label class="col-form-label">PASSWORD CONFIRM</label>
                                <input type="password" name="password3" class="form-control">
                                <input type="submit" name="simpan" value="SIMPAN" class="btn btn-success" style="width: 100%;">
                        </table>
                    </div>
                </div>
            @endif
        </form>
    </div>
</div>
