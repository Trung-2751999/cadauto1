<?php
// require_once dirname(__FILE__) . '/securimage/securimage.php';
include_once 'inc/header.php';
include_once 'li_index/session.php';
Session::checkSession_customer();
Session::init();
?>

<html>
    <head>
        <title>Form Nạp thẻ</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta name="author" content="tranvankhiem" />
        <meta name="description" content="Thanh toán trực tuyến" />
        <!-- css -->
       <!--  <link rel="stylesheet" href="css/bootstrap.min.css" /> 
        <link rel="stylesheet" href="css/bootstrap-responsive.css" /> 
        <link rel="stylesheet" href="css/bootstrap-theme.min.css" />  -->
        
        <!-- Script -->
        <script src="js/jquery-1.7.2.min.js"></script>
        <script src="js/jquery.form.js"></script> 
        <script src="js/bootstrap.min.js"></script> 
        
        <script>
            $(document).ready(function() {
                 // nap the
                $("#fnapthe").ajaxForm({
                    dataType : 'json',
                    url: 'classes/card.php',
                    beforeSubmit : function() {
                        $("#loading_napthe").show();
						$(":submit").attr("disabled", true);
                    },
                    success: function(data) {
                        if(data.code == 0) {
                            $("#fnapthe").resetForm();
                            $("#msg_success_napthe").html(data.msg);
                            $("#msg_err_napthe").html('');
                        }
                        else {
                            $("#msg_err_napthe").html(data.msg);
                            $("#msg_success_napthe").html('');
                        }
                        $("#loading_napthe").hide();
						$(":submit").removeAttr("disabled");
                        $("#captcha").attr('src', 'securimage/securimage_show.php?sid=' + Math.random());
                    }
                });
            });
        </script>
    </head>
    <style type="text/css">
        tr,td,input,.form-control{
            font-size: 1.1vw;
            width: 18.57vw;
            height: 3.02vw;
            padding:0vw 0vw 0vw 1vw;
            margin:0;
        }
        input[type='submit']{
            width: 6vw;
            height: 3vw;
            padding:0
        }
    </style>
    <body>
        <div style="margin: 8vw auto ; width: 27.78vw">
            <h3 style="margin-bottom: 1.5vw;font-size:2vw"><span class="label label-success">Hệ thống nạp thẻ cào</span></h3>
            <form action="#" method="post" id="fnapthe">
                <table class="table table-condensed table-bordered">
                    <tbody>
                        <tr>
                            <td></td>
                            <td>
                                <div style="margin: 5px 0px;">
                                    <div class="label label-success" id="msg_success_napthe"></div>
                                    <div class="label label-danger" id="msg_err_napthe"></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Loại thẻ</td>
                            <td>
                                <select name="card_type_id" class="form-control">
                                    <option value="1">Viettel</option>
                                    <option value="2">Mobiphone</option>
                                    <option value="3">Vinaphone</option>
                                    <option value="4">Gate</option>
                                    <option value="5">VTC (vcoin)</option>
                                    <option value="6">Vietnammobile</option>
                                    <option value="7">Zing</option>
                                    <option value="8">Bit</option>
									<option value="9">Megacard</option>
									<option value="10">Oncash</option>
                                </select>
                            </td>
                        </tr>
						
                        <tr>
                            <td>Mệnh giá</td>
                            <td>
                                <select name="price_guest" class="form-control">
								
									<option value="0">- Chọn mệnh giá -</option>
                                    <option value="10000">10.000</option>
                                    <option value="20000">20.000</option>
                                    <option value="30000">30.000</option>
                                    <option value="50000">50.000</option>
                                    <option value="100000">100.000</option>
                                    <option value="200000">200.000</option>
                                    <option value="300000">300.000</option>
                                    <option value="500000">500.000</option>
                                    <option value="1000000">1.000.000</option>
                                </select>
							</td>
                        </tr>
						
                        <tr>
                            <td>Mã thẻ</td>
                            <td><input type="text" value="" name="pin" class="form-control" placeholder="Mã thẻ"/></td>
                        </tr>
                        <tr>
                            <td>Seri</td>
                            <td><input type="text" value="" name="seri" class="form-control" placeholder="Seri"/></td>
                        </tr>
						
                        <tr>
                            <td>Ghi chú</td>
                            <td><textarea name="note" id="note" class="form-control" ></textarea></td>
                        </tr>
					
						
						
                        <tr>
                            <td>Mã bảo mật</td>
                            <td>
                                
                                  <div class="security_code">
								
								<input type="text" id="ma_bao_mat" class="form-control" name="ma_bao_mat" placeholder="Mã bảo mật" />
								
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input class="btn btn-info" style="font-size: 1.1vw" type="submit" value="Nạp thẻ"/>
                                <div id="loading_napthe" style="display: none; float: right"><img src="images/loading.gif"/> &nbsp;Xin mời chờ...</div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
        <?php include_once 'inc/footer.php'; ?>
    </body>
</html>

