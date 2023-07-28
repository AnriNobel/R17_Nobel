<?php
  $content = '<div class="row">
                <!-- left column -->
                <div class="col-md-12">
                  <!-- general form elements -->
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Update Data</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputName1">Nama</label>
                          <input type="text" class="form-control" id="nama" placeholder="Enter Nama">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputName1">Jabatan</label>
                          <input type="text" class="form-control" id="jabatan" placeholder="jabatan">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Jenis Kelamin</label>
                            <div class="radio">
                                <label>
                                <input type="radio" name="jenis_kelamin" id="optionsRadios1" value="0" checked="">
                                Male
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                <input type="radio" name="jenis_kelamin" id="optionsRadios2" value="1">
                                Female
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputName1">Alamat</label>
                          <input type="text" class="form-control" id="alamat" placeholder="Alamat">
                        </div>
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer">
                        <input type="button" class="btn btn-primary" onClick="UpdateDoctor()" value="Update"></input>
                      </div>
                    </form>
                  </div>
                  <!-- /.box -->
                </div>
              </div>';
              
  include('../master.php');
?>
<script>
    $(document).ready(function(){
        $.ajax({
            type: "GET",
            url: "../api/doctor/read_single.php?id=<?php echo $_GET['id']; ?>",
            dataType: 'json',
            success: function(data) {
                $('#nama').val(data['nama']);
                $('#jabatan').val(data['jabatan']);
                $('#jenis_kelamin'+data['jenis_kelamin']).prop("checked", true);
                $('#alamat').val(data['alamat']);
            },
            error: function (result) {
                console.log(result);
            },
        });
    });
    function UpdateDoctor(){
        $.ajax(
        {
            type: "POST",
            url: '../api/doctor/update.php',
            dataType: 'json',
            data: {
                id: <?php echo $_GET['id']; ?>,
                nama: $("#nama").val(),
                jabatan: $("#jabatan").val(),
                jenis_kelamin: $("input[name='jenis_kelamin']:checked").val(),
                alamat: $("#alamat").val()
            },
            error: function (result) {
                alert(result.responseText);
            },
            success: function (result) {
                if (result['status'] == true) {
                    alert("Successfully Updated Data!");
                }
                else {
                    alert(result['message']);
                }
            }
        });
    }
</script>