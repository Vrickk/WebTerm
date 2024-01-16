<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>뉴스 > 기사 쓰기 - Indie, GO!</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
<script type="text/javascript" src="./ckeditor/ckeditor.js"></script>
<script type="text/javascript">

function LoadPage() {
    CKEDITOR.replace('content');
}

</script>
<script>
  function check_input() {
      if (!document.board_form.subject.value)
      {
          alert("제목을 입력하세요!");
          document.board_form.subject.focus();
          return;
      }
      if (!document.board_form.content.value)
      {
          alert("내용을 입력하세요!");    
          document.board_form.content.focus();
          return;
      }
      document.board_form.submit();
   }
</script>
</head>
<?php require('dark.php'); ?>
<body style="background-color: <?php echo $background;?>; color: <?php echo $color;?>" onload="LoadPage();">  

<header>
    <?php include "header.php";?>
</header>  
<section>
   	<div id="board_box">
	    <h3 id="board_title">
	    		게시판 > 글 쓰기
		</h3>
	    <form id="EditorForm" name="board_form" method="post" action="board_insert_news.php" enctype="multipart/form-data">
	    	 <ul id="board_form">
				<li>
					<span class="col1">이름 : </span>
					<span class="col2"><?=$username?></span>
				</li>		
	    		<li>
	    			<span class="col1">제목 : </span>
	    			<span class="col2"><input name="subject" type="text"></span>
	    		</li>	    	
	    		<li id="text_area">	
	    			<textarea id="content" name="content"></textarea>
	    		</li>
	    		<li>
			        <span class="col1"> 첨부 파일</span>
			        <span class="col2"><input type="file" name="upfile"></span>
			    </li>
	    	    </ul>
	    	<ul class="buttons">
				<li><?php if($userwriter == 1) { ?><button type="button" onclick="CKEDITOR.instances.content.updateElement(); check_input()">완료</button></li>
					<?php } else { ?> <a href="javascript:alert('기자 회원만 사용 가능합니다!')"><button>완료</button></li> <?php }?>
				<li><button type="button" onclick="location.href='board_list_news.php'">목록</button></li>
			</ul>
	    </form>
	</div>
</section> 
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
