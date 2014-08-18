<div class="container">
    <div class="page-header">
      <h1>任务管理 </h1>
    </div>

    <div class="row">
        <div class="col-md-8">
		    <div class="panel panel-default">
				<!-- Default panel contents -->
				<div class="panel-heading" >					
					任务列表
					<div class="input-group pull-right col-md-6">						
						<input type="text" class="form-control" id="keyword">
						<span class="input-group-btn">
							<button class="btn btn-default" type="button" onclick="do_search()">搜索</button>
						</span>
					</div><!-- /input-group -->
					<div style="clear: both"></div>
				</div>
		      
				<!-- Table -->
			  <table class="table">
		        <thead>
		          <tr><th>#</th><th>代码</th><th>名称</th><th>间隔时间</th><th>间隔里程</th>
					<th>任务时间(分钟)</th><th>任务工费(元)</th>	
					<th><div class="pull-right"> 操作</div></th></tr>
		        </thead>

		        <tbody>

				<?php foreach ($tasktypes as $item): ?>
		          <tr>
		            <td><?= $item["id"]; ?></td>
		            <td><?= $item['tcode']; ?></td>
		            <td><?= anchor("tasktypes/".$item["id"],$item["name"],""); ?></td>
		            <td><?= $item['duration1']; ?></td>
		            <td><?= $item['duration2']; ?></td>
		            <td><?= $item['tasktime']; ?></td>
		            <td><?= $item['taskprice']; ?></td>
		            <td align=right>
		            	<?= anchor("shops/".$item["id"]."/edit","编辑"); ?> |
						<a href="#" onclick="confirm_del(<?= $item["id"].",'".$item["name"]."'" ?>);">删除</a>
		            </td>
		          </tr>
				<?php endforeach ?>
		        </tbody>
		      </table>
		    </div>    
        </div>
        
        <div class="col-md-4">
		    <div class="panel panel-default">
				<!-- Default panel contents -->
				<div class="panel-heading">增加任务类型</div>				
				<div class="panel-body">				
					<?= form_open('tasktypes/save',array("role"=>"form")); ?>
					<div class="form-group">
					  <label for="exampleInputPassword1">编 码</label>
					  <?= form_input(array( 'name'  => 'tcode',
											'id'    => 'tcode',
											'class' => 'form-control'
												)); ?>
					<div class="form-group">
					  <label for="exampleInputEmail1">名 称</label>
					  <?= form_input(array( 'name'  => 'name',
											'id'    => 'name',
											'class' => 'form-control',
											)); ?>
					</div>
					</div>
					<div class="form-group">
					  <label for="exampleInputPassword1">时间间隔(天)</label>
					  <?= form_input(array( 'name'  => 'duration1',
										    'id'    => 'duration1',
											'class' => 'form-control',
											'value' => '30',
												)); ?>
					</div>

					<div class="form-group">
					  <label for="exampleInputPassword1">里程间隔(公里)</label>
					  <?= form_input(array( 'name'  => 'duration2',
										    'id'    => 'duration2',
											'class' => 'form-control',
											'value' => '3000',
												)); ?>
					</div>

					<div class="form-group">
					  <label for="exampleInputPassword1">基准工时(分钟)</label>
					  <?= form_input(array( 'name'  => 'tasktime',
										    'id'    => 'tasktime',
											'class' => 'form-control',
											'value' => '30',
												)); ?>
					</div>
					<div class="form-group">
					  <label for="exampleInputPassword1">基准费用(元)</label>
					  <?= form_input(array( 'name'  => 'taskprice',
										    'id'    => 'taskprice',
											'class' => 'form-control',
											'value' => '100',
												)); ?>
					</div>
					<button type="submit" class="btn btn-primary">增 加</button>
					</form>
				</div>
		    </div>
		</div>
    </div>

<script type="text/javascript">
	function confirm_del(sid,sname){
		$("#sname").text(sname);
		$("#shopid").text(sid);
		$('#dlg_remove').modal('show').on('shown',function() {
			 
		})
	}

	function do_del(){
		//this will redirect us in same window
		document.location.href = "shops/"+$("#shopid").text()+"?method=delete";
	}
	
	function do_search() {
		var keyword=$("#keyword").val();
		
		//this will redirect us in same window
		if (keyword.length>0){
			document.location.href = "shops?search="+keyword;
		} else {
			alert( "搜索关键字无效");
		}
		
	}
	
	function ajax_del(){
		$('#dlg_remove').modal('hide');
		var shopid=$("#shopid").text();
		$.ajax({
			type: "DELETE",
			url: "shops/"+shopid,
		})
		.done(function( msg ) {
			if (msg == "OK"){
				document.location.href = "shops/";
			} else {
				alert( "处理错误:" + msg );
			}
		});
	}

</script>  

<div id="shopid" class="hide"></div>
<div class="modal fade" id="dlg_remove">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">确认删除店铺信息</h4>
      </div>
      <div class="modal-body">
        <p>您确认要删除相关店铺信息吗:</p>
		<p id="sname"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary" onclick="ajax_del()">确定</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

</div>


