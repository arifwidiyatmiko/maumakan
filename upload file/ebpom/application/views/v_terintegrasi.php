<!-- CONTENT -->
<!-- ====================================================================================================================================================================== -->
    <div id="content" class="row">
    	<div class="col-md-1"></div>
		<div class="col-md-10" style="text-align:justify;">
        	<div class="page-header">
	        	<h1>Produk Terintegrasi</h1>
            </div>
        </div>
       	<div class="col-md-1"></div>
    </div>
    <div class="row">
    	<div class="col-md-1"></div>
        <div class="col-md-10">
        	<form class="form-inline" method="post" action="">
            	<div class="form-group">
	  		      	<label>Cari Berdasarkan :</label>
    	    	    <select name="request" class="form-control">
        	    		<option value="reg" selected="selected">Nomor Registration</option>
            		    <option value="pro">Nama Produk</option>
            		    <option value="jwb">Nama Penanggung Jawab</option>
            	    	<option value="per">Nama Perusahaan</option>
            		</select>
            		<input type="text" name="key" placeholder="Masukan kata kunci" class="form-control"/>
            		<input type="submit" value="Cari" class="btn btn-default" />
        		</div>
            </form>
        </div>
        <div class="col-md-1"></div>
    </div>
    <div class="row" style="margin-top:20px;">
    	<div class="col-md-1"></div>
        <div class="col-md-10">
        	<table class="table-hover" style="text-align:center;background-color:#33CC33;width:1090px;">
            	<tr style="height:50px;background-color:#FF9900;">
                	<th style="text-align:center">Nomor Registrasi</th>
                    <th style="text-align:center">Nama Produk</th>
                    <th style="text-align:center">Nama Penanggung Jawab</th>
                    <th style="text-align:center">Nama Perusahaan</th>
                </tr>
                <?php
						$status = "terintegrasi";
						$request = "";
						extract($_POST);
						$reg = 1;
						if($request != "")
						{
							switch($request)
							{
								default    : $result = $this->m_produk->get_produk_terintegrasi($status);
								case 'reg' : 
											 if(is_numeric($_POST['key']))
											 {
											 	$result = $this->m_produk->get_nomor_registrasi($_POST['key'],$status);
											 }else
											 {?>
											 	<div class="alert alert-danger">
                                                	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                    <strong>Kesalahan : </strong> kata kunci yang dimasukkan harus berupa angka
                                                </div><?php $reg = 0;
											 }
											 break;
								case 'pro' : $result = $this->m_produk->get_nama_produk($_POST['key'],$status);break;
								case 'jwb' : $result = $this->m_produk->get_penanggung_jawab($_POST['key'],$status);break;
								case 'per' : $result = $this->m_produk->get_nama_perusahaan($_POST['key'],$status);break;
							}
						}else {$result = $this->m_produk->get_produk_terintegrasi($status);}
					if($reg == 1)
					{					 
						foreach($result->result() as $row):
					?>
                		<tr>
                        	<td><?php echo $row->nomor_registrasi;?></td>
                            <td><?php echo $row->nama_produk;?></td>
                            <td><?php echo $row->nama_penanggung_jawab;?></td>
                            <td><?php echo $row->nama_perusahaan;?></td>
                        </tr>
                	<?php
						endforeach;
					}
					?>
            </table>
        </div>
        <div class="col-md-1"></div>
    </div>
    <div class="row">
    	<div class="col-md-12" style="height:50px;"></div>
    </div>