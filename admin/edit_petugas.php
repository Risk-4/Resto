<?php 
    if($id !=""){
        $sel = $dbo->select("tblpetugas where idpetugas=$id");
        foreach($sel as $row){
            $idpetugas = $row['idpetugas'];
            $nama_petugas = $row['nama_petugas'];
            $alamat= $row['alamat'];
            $no_hp = $row['no_hp'];
            $username = $row['username'];
            $role = $row['role'];
            
        }
    }

    if(isset($_POST['simpan'])){
        extract($_POST);
        $password1 = isset($_POST['password'])?$_POST['password']:"" ;
        if($password1 == ""){
            $up = $dbo->update("tblpetugas","nama_petugas='$nama_petugas', alamat='$alamat', no_hp='$no_hp', username='$username',role='$role'", "idpetugas=$idpetugas");
        }else{
            $pass = password_hash($password1, PASSWORD_DEFAULT);
            $up = $dbo->update("tblpetugas","nama_petugas='$nama_petugas', alamat='$alamat', no_hp='$no_hp', username='$username',role='$role', password='$pass'", "idpetugas=$idpetugas");
        }
        if($up){
            ?>
                <script>
                    alert('Update Berhasil');
                    location.href='?hal=petugas';
                </script>
            <?php
        }
    }
?>
<div class="judul">
    <a href="?hal=petugas" class="btn-add"><i class="fa fa-list"></i>Lihat Data</a>
    <div class="keterangan">Data Petugas</div>
</div>
<div class="data-input">
    <form action="?hal=edit_petugas" method="post">
        <table>
            <input type="hidden" name="idpetugas" value="<?=$idpetugas?>">
            <tr>
                <td>Nama petugas</td>
                <td>:</td>
                <td>
                    <input type="text" name="nama_petugas" placeholder="Nama petugas" value="<?=$nama_petugas?>" required>
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>
                    <input type="text" value="<?=$alamat?>" name="alamat" required>
                </td>
            </tr>
            <tr>
                <td>No Hp</td>
                <td>:</td>
                <td>
                    <input type="text" value="<?=$no_hp?>" name="no_hp" required>
                </td>
            </tr>
            <tr>
                <td>Foto</td>
                <td>:</td>
                <td>
                    <input type="text" name="">
                </td>
            </tr>
            <tr>
                <td>Username</td>
                <td>:</td>
                <td>
                    <input type="text" name="username" value="<?=$username?>">
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td>
                    <input type="password" name="password" placeholder="Password">
                </td>
            </tr>
            <tr>
                <td>Role</td>
                <td>:</td>
                <td>
                    <select name="role" id="">
                        <option value="">==pilih role==</option>
                        <option value="kasir">Kasir</option>
                        <option value="dapur">Dapur</option>
                        <option value="manager">Manager</option>
                        <option value="owner">Owner</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <button class="btn-add" type="submit" name="simpan" value="simpan"><i class="fa fa-save"></i>Simpan</button>
                </td>
            </tr>
        </table>
    </form>
</div>