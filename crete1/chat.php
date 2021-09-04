<?php include 'header.php'; 
if (isset($_GET['id'])) {
    $rid = $_GET['id'];
    $getname = dbConnect()->prepare("SELECT fname, lname FROM users WHERE id='$rid'");
    $getname->execute();
    $names = $getname->fetch();
    $recName = $names['fname']." ".$names['lname'];

}
    if (isset($_POST['message'])) {
        ob_end_clean();
        // echo($_POST['message']);
        $datetime = date('Y-m-d h:i:s');
        $sendMsg = dbConnect()->prepare("INSERT INTO chat (sender, receiver, message, datetime) VALUES ( ?, ?, ?, ?)");
        $sendMsg->execute([$uid, $_GET['id'], $_POST['message'], $datetime]);
    }
?>
<?php
    if (isset($_POST['lifetech']) AND isset($_GET['id'])) {
        ob_end_clean();
        $getChat = dbConnect()->prepare("SELECT * FROM chat WHERE (receiver = '$rid' AND sender='$uid') OR (receiver = '$uid' AND sender='$rid') ");
                    $getChat->execute();
                    if ($getChat->rowcount()>0) {
                        while ($chat = $getChat->fetch()) {
                            if($chat['sender']==$uid ){?> 

                            <li class="odd">
                                    <div class="chat-content">
                                        <div class="box bg-light-inverse"><?php echo $chat['message']?></div>
                                        <br>
                                    </div>
                                    <div class="chat-time"><?php echo $chat['datetime']?></div>
                                </li>                          
                            
                        <?php }else{?>
                            <li>
                                <div class="chat-content">
                                    <div class="box bg-light-info"><?php echo $chat['message']?></div>
                                </div>
                                <div class="chat-time"><?php echo $chat['datetime']?></div>
                            </li>
                           <?php 
                       }

                        }
                    }else{?>
                        <center><h5>Start a New Chat</h5></center>
                   <?php }
                   exit();
    }
?>
                

<style type="text/css">
    ul{
        list-style: none;
    }
</style>

 <!-- ============================================================== -->

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->

<div class="row mt-3">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"></h4>
                
                    <div class="form-row">
                        <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">All Staff (<?php echo $totalUsers; ?>)</h5>
                                <div class="message-box" id="msg" style="height: 270px;position: relative;">
                                    <div class="message-widget message-scroll">
                                        <!-- Message -->
                                        <?php
                                            $users = dbConnect()->prepare("SELECT * FROM users WHERE role !='customer' AND id !='$uid' ");
                                            $users->execute();
                                            if($users->rowcount() < 1){
                                                echo 'No record in the database';
                                            }else{
                                                while ($user = $users->fetch()) {
                                               ?>
                                                <a href="?id=<?php echo $user['id']?>">
                                                    <div class="user-img"> <img src="upload/<?php echo $user['image']?>" alt="user" class="img-circle">  </div>
                                                    <div class="mail-contnet">
                                                        <h5><?php echo $user['fname'].' '.$user['lname'] ?></h5> <span class="mail-desc"><?php echo $user['phone']; ?></span>  </div>
                                                </a>

                                            <?php }} ?>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                        if (isset($_GET['id'])) {?>
<div class="col-md-6" style="height: 100px;">
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Chat With <?php echo $recName ?></h5>
        <div class="chat-box" id="chat" style="height: 220px;position:relative;display:flex;flex-direction:column-reverse;">
            <!--chat Row -->
            <ul class="chat-list" style="">
                
            </ul>
        </div>
    </div>

<div class="card-body border-top">
    <div class="row">
        <div class="col-10">
            <input name="message" class="form-control message" placeholder="Type your message here" class="form-control border-0" id="message">
        </div>
        <div class="col-2 text-right">
            <input type="submit" name="send" value="Send" id="sendMsg" class="btn btn-info btn-lg">
        </div>
    </div>
</div>
</div>
</div>

                      <?php
                        }
                    ?>
                        
 </div>
  </div>

                                        
         </form>    

<?php //include 'footer.php'; ?>

<script src="../assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/node_modules/popper/popper.min.js"></script>
    <script src="../assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="dist/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="../assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!-- Footable -->
    <script src="../assets/node_modules/moment/moment.js"></script>
    <script src="../assets/node_modules/footable/js/footable.min.js"></script>
    <!--FooTable init-->
    <!-- This is data table -->
    <script src="../assets/node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
<script type="text/javascript" src="dist/select2/js/select2.min.js"></script>
    <!-- end - This is for export functionality only -->
<script>
   $(document).ready(function(){

        $('#sendMsg').on('click', (event)=>{
            // alert($('.message').val())
            event.preventDefault();
           let data = $('.message').val();
            $.ajax({
                method:'POST',
                data: {message:data},
                success:function(){
                    $('.message').val("");
                    getChat();
                   

                }
            });
        });

        function getChat(){
            $.ajax({
                method:'POST',
                data:{lifetech:'lifetech'},
                success:function(data){
                    $('.chat-list').html(data);
                    // alert(data)
                }
            });
        }

         setInterval(getChat,1000);


         // $('#uploadFile').on('change', function(){
         //    $('#messageFrm').ajaxSubmit({
         //        target: "#message",
         //        resetForm: true
         //    })
         // })

    });
    

</script>



</body>

</html>





