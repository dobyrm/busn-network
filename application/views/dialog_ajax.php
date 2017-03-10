<div class="box-body">
  <!-- Conversations are loaded here -->
  <div class="direct-chat-messages">
    <?php
      foreach($data as $row)
      { 
    ?>
    
    <?php if($_SESSION['auchUsersSetings']['id'] == $row['id_user_a']) { 
      $divConteiner = 'direct-chat-msg';
      $pullName = 'pull-left';
      $pullDate = 'pull-right';
     } else { 
        $divConteiner = 'direct-chat-msg right';
        $pullName = 'pull-right';
        $pullDate = 'pull-left';
     } ?>
     <!-- Message. Default to the left -->
     <div class="<?=$divConteiner?>">
      <div class="direct-chat-info clearfix">
        <a href="friend?id=<?=$row['id_user_a'];?>"><span class="direct-chat-name <?=$pullName;?>"><?=$row['name'];?></span></a>
        <span class="direct-chat-timestamp <?=$pullDate;?>"><?=$row['data'];?></span>
      </div><!-- /.direct-chat-info -->
      <a href="friend?id=<?=$row['id_user_a'];?>"><img class="direct-chat-img" src="<?=$row['ava'];?>" alt="<?=$row['name'];?>"></a><!-- /.direct-chat-img -->
      <div class="direct-chat-text">
        <?php
          $phrases  = ['Хахаха', 'Хаха', 'Ха'];
          $emojis   = ["\u{1F606}", "\u{1F600}", "\u{263A}"];
        ?>
        <?=str_replace($phrases, $emojis, $row['text']);?>
      </div><!-- /.direct-chat-text -->
    </div><!-- /.direct-chat-msg -->
    <?php 
      } 
    ?>
    <div id="bms"></div>
  </div><!--/.direct-chat-messages-->
</div><!-- /.box-body -->