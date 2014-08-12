<div class="container">
    <div class="page-header">
      <h1>客户管理 <small>副标题</small></h1>
    </div>

    <div class="row">
        <div class="col-md-8">
		    <div class="panel panel-default">
		      <!-- Default panel contents -->
		      <div class="panel-heading">客户列表</div>

		      <!-- Table -->
		      <table class="table">
		        <thead>
		          <tr><th>#</th><th>姓名</th><th>手机</th><th align='right'>操作</th></tr>
		        </thead>

		        <tbody>

				<?php foreach ($clients as $item): ?>
		          <tr>
		            <td><?php echo $item["id"]; ?></td>
		            <td><?php echo anchor("clients/".$item["id"],$item["name"],""); ?></td>
		            <td><?php echo $item['mobile']; ?></td>
		            <td align=right>
		            	<a href="#">编辑</a>|<a href="#">删除</a>
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
		      <div class="panel-heading">增加客户</div>
		      <div class="panel-body">
		      姓名：
              <input type="text" class="form-control" >
              手机：
              <input type="text" class="form-control" >
              IM方式(微信或QQ)：
              <input type="text" class="form-control" >
              <br>
		      <button type="submit" class="btn btn-default">增 加</button>
		      </div>

		    </div>
		</div>
    </div>

</div>