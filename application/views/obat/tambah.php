<div class="content-wrapper" style="">
    <div class="content">
    <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Data</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method = "POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Obat</label>
                  <input type="text" class="form-control" name="nama_obat" placeholder="Nama Obat">
                </div>
                <div class="form-group">
                  <label>Jenis Obat</label>
                  <select class="form-control" name="id_jenis_obat">
                    <option value="">--PILIH--</option>
                  <?php foreach($jenis as $data):?>
                    <option value="<?=$data['id_jenis_obat'];?>"><?=$data['nama_jenis_obat'];?></option>
                  <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Satuan</label>
                  <input type="text" class="form-control" name="satuan" placeholder="Satuan Obat">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Harga</label>
                  <input type="text" class="form-control" name="harga" placeholder="Harga">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Stok</label>
                  <input type="text" class="form-control" name="stok" placeholder="Stok Obat">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Tanggal Expired</label>
                  <input type="date" class="form-control" name="tanggal_exp" placeholder="Tanggal Exp">
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <?php
// Check if a success flash message exists
if ($this->session->flashdata('failed')) {
    echo '<div class="alert alert-danger" id="failed-message">' . $this->session->flashdata('failed') . '</div>';
}
?>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
        // Automatically hide the success message after 3 seconds
        setTimeout(function() {
            $("#failed-message").fadeOut("slow");
        }, 1000); // 3000 milliseconds = 3 seconds
    });
</script>