
<table class="table table-condensed">
	<thead>
		<tr>
			<th>No.</th>
			<th>ID</th>
			<th>Nama Restoran</th>
			<th>Alamat</th>
			<th>Uploader</th>
			<th>Hapus</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<?php 
				$query = $this->resto_m->lihatresto();
				foreach($query->result() as $row) : 
			?>
			<td><?php echo $row->id_resto?></td>
			<td><?php echo $row->nama?></td>
			<td><?php echo $row->alamat?></td>
			<td><?php echo $row->telp?></td>
			<td>Admin 1</td>
			<td><a onclick="ConfirmDelete()" href=""><i style='color:#CB212E' class="glyphicon glyphicon-trash"></i></a></td>
		</tr>
			<?php endforeach; ?>

	</tbody>
</table>
<script type="text/javascript">
      function ConfirmDelete()
      {
            if (confirm("Yakinkah anda bahwa akan menghapus akun ini ? "))
                 location.href="<?php echo site_url(); ?>Administrator/hapusresto/?i=<?php echo $row->id_resto; ?>";
      }
  </script>