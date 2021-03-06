 <?php if ($action == 'view' || empty($action)){ ?>
 <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">PEMESANAN</h4>
              <!-- ========== Flashdata ========== -->
                   <?php if ($this->session->flashdata('success') || $this->session->flashdata('warning') || $this->session->flashdata('error')) { ?>
                                    <?php if ($this->session->flashdata('success')) { ?>
                                        <div class="alert alert-success">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <i class="fa fa-check sign"></i><?php echo $this->session->flashdata('success'); ?>
                                        </div>
                                    <?php } else if ($this->session->flashdata('warning')) { ?>
                                        <div class="alert alert-warning">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <i class="fa fa-check sign"></i><?php echo $this->session->flashdata('warning'); ?>
                                        </div>
                                    <?php } else { ?>
                                        <div class="alert alert-danger">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <i class="fa fa-warning sign"></i><?php echo $this->session->flashdata('error'); ?>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                    <!-- ========== End Flashdata ========== -->
                </div>

            </div>
            <div class="row">
             <div class="col-md-6">
                     <div class="panel panel-primary">
                        <div class="panel-heading">
                           BUAT PESANAN
                        </div>
                        <div class="panel-body">
                    <form role="form" action="<?php echo base_url();?>costumer/pemesanan/tambah" method="post">
                        <input type="hidden" name="costumer_id" value="<?php echo $costumer->costumer_id;?>" />
                        <label>Nama Acara : </label>
                        <input type="text" name="pemesanan_acara" required="" class="form-control" />
                        <label>Tanggal Acara : </label>
                        <input type="date" name="pemesanan_tanggal" required="" class="form-control" />
                        <label>Tempat Acara : </label>
                        <textarea name="pemesanan_tempat" class="form-control"></textarea> 
                        <hr />
                        <input type="submit" name="simpan" value="Pesan Sekarang" class="btn btn-info">
                    </form>
                    </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            PESANAN ANDA
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Acara</th>
                                            <th>Tanggal Acara</th>
                                            <th>Status Pembayaran</th>
                                            <th>Detail Pemesanan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php
                                        $no=1;             
                                         $query = $this->db->query("SELECT * FROM pemesanan WHERE costumer_id = '$costumer->costumer_id' ORDER BY pemesanan_id DESC");
                                        foreach ($query->result() as $row){ 
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $row->pemesanan_acara; ?></td>
                                            <td><?php echo dateIndo($row->pemesanan_tanggal); ?></td>
                                            <td><?php if ($row->pemesanan_status=='N'){ echo "?"; } else{ echo "Sudah Dibayar"; }?></td>
                                            <td><a href="<?php echo base_url();?>costumer/pemesanan/detail/<?php echo $row->pemesanan_id; ?>" class="btn btn-success">Detail</a> <a href="<?php echo base_url();?>costumer/pemesanan/hapus/<?php echo $row->pemesanan_id; ?>" class="btn btn-danger">Hapus</a></td>
                                        </tr>
                                    <?php $no++; } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                            </div>
                        </div>

            </div>
<?php } elseif ($action == 'detail') { ?>
 <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">PEMESANAN DETAIL</h4>
              <!-- ========== Flashdata ========== -->
                   <?php if ($this->session->flashdata('success') || $this->session->flashdata('warning') || $this->session->flashdata('error')) { ?>
                                    <?php if ($this->session->flashdata('success')) { ?>
                                        <div class="alert alert-success">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <i class="fa fa-check sign"></i><?php echo $this->session->flashdata('success'); ?>
                                        </div>
                                    <?php } else if ($this->session->flashdata('warning')) { ?>
                                        <div class="alert alert-warning">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <i class="fa fa-check sign"></i><?php echo $this->session->flashdata('warning'); ?>
                                        </div>
                                    <?php } else { ?>
                                        <div class="alert alert-danger">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <i class="fa fa-warning sign"></i><?php echo $this->session->flashdata('error'); ?>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                    <!-- ========== End Flashdata ========== -->
                </div>

            </div>
            <div class="row">
             <div class="col-md-6">
                     <div class="panel panel-primary">
                        <div class="panel-heading">
                           DETAIL MENU PEMESANAN
                        </div>
                        <div class="panel-body">
                        <script>
                        function sum() {
                              var txtFirstNumberValue = document.getElementById('txt1').value;
                              var txtSecondNumberValue = document.getElementById('txt2').value;
                              var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
                              if (!isNaN(result)) {
                                 document.getElementById('txt3').value = result;
                              }
                        }
                        </script>
                    <form role="form" action="<?php echo base_url();?>costumer/pemesanan/detail-tambah" method="post">
                        <input type="hidden" name="costumer_id" value="<?php echo $menu_id; ?>" />
                        <input type="hidden" name="menu_id" value="<?php echo $costumer->costumer_id;?>" />
                        <label>UNTUK ACARA: </label>
                         <select name='pemesanan_id' required class='form-control' style='width:'><option value=''></option>
                                     <?php
                                        $no=1;             
                                         $query = $this->db->query("SELECT * FROM pemesanan WHERE costumer_id = '$costumer->costumer_id' ORDER BY pemesanan_id DESC");
                                        foreach ($query->result() as $row1){ 
                                        ?>
                            <option value='<?php echo $row1->pemesanan_id;?>'><?php echo $row1->pemesanan_acara;?></option>
                            <?php } ?>
                         </select>
                        <label>MENU YANG DIPESAN: </label>
                        <input type="text" name="menu_nama" readonly value="<?php echo $menu_nama; ?>" class="form-control" />
                        <label>Harga : </label>
                        <input type="text" name="detail_harga" readonly value="<?php echo $menu_harga; ?>" class="form-control" id="txt1"  onkeyup="sum();" />
                        <label>Jumlah : </label>
                        <input type="number" name="detail_jumlah" required class="form-control" id="txt2"  onkeyup="sum();" />
                        <label>Total : </label>
                        <input type="number" name="detail_total" readonly class="form-control"  type="text" id="txt3" />
                        <hr />
                        <input type="submit" name="simpan" value="Pesan Sekarang" class="btn btn-info">
                    </form>
                    </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             DETAIL MENU PEMESANAN ANDA
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Acara</th>
                                            <th>Nama Menu</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php  
                                    $no=1;
                        $costumer = $costumer->costumer_id;                      
                        $query = $this->db->query("SELECT 
                        menu.menu_id AS menu_id,
                        menu.menu_nama AS menu_nama,
                        pemesanan_detail.detail_id AS detail_id,
                        pemesanan_detail.detail_jumlah AS detail_jumlah,
                        pemesanan_detail.detail_harga AS detail_harga,
                        pemesanan_detail.detail_total AS detail_total,
                        pemesanan.pemesanan_id AS pemesanan_id,
                        pemesanan.pemesanan_acara AS pemesanan_acara,
                        costumer.costumer_id AS costumer_id,
                        costumer.costumer_nama AS costumer_nama
                        FROM pemesanan_detail
                        LEFT JOIN menu ON menu.menu_id= pemesanan_detail.menu_id
                        LEFT JOIN pemesanan ON pemesanan.pemesanan_id = pemesanan_detail.pemesanan_id
                        LEFT JOIN costumer ON costumer.costumer_id = pemesanan_detail.costumer_id
                         WHERE pemesanan_detail.costumer_id ='$costumer' ORDER BY detail_id  DESC");
                                 foreach ($query->result() as $row){ 
                            ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $row->pemesanan_acara; ?></td>
                                            <td><?php echo $row->menu_nama; ?></td>
                                            <td><?php if ($row->pemesanan_status=='N'){ echo "?"; } else{ echo "Sudah Dibayar"; }?></td>
                                            <td><a href="<?php echo base_url();?>costumer/pemesanan/detail/<?php echo $row->pemesanan_id; ?>" class="btn btn-success">Detail</a> <a href="<?php echo base_url();?>costumer/pemesanan/hapus/<?php echo $row->pemesanan_id; ?>" class="btn btn-danger">Hapus</a></td>
                                        </tr>
                                    <?php $no++; } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                            </div>
                        </div>

            </div>
<?php } ?>