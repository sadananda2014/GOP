<label>Select Date</label>
<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                //'model'=>$model,
                'attribute'=>'date',
                'name'=>'date',
                //'value'=>date('Y-m-D'),
                // additional javascript options for the date picker plugin
                'options'=>array(
                   'showAnim'=>'drop',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                  'dateFormat' => 'yy-mm-dd',
                  'showButtonPanel'=>true,
                  //'maxDate'=>"+0D",
				  'changeMonth'=>true,
                  'changeYear'=>true,
				  'yearRange'=>'1995:2030',
                ),
                'htmlOptions'=>array(
                  'class'=>'form-control',
				  'onchange'=>'Get_age(this.value)',
                  //'readonly'=>true,
                ),
              ));  ?>
<script language="javascript">			  
function Get_age(date)
	{
		if(date=="")
		{
		  alert("select date");
		}
		else
		{
		   var url = window.location.href.split('&')[0];
		   //alert(url);
		   url = url +'&date='+date;  
           //alert(url);
			window.location.href = url;
			
		}
	}
</script>  
<h2 align="center"> Payment Report <?php if(isset($_GET['date'])){echo $_GET['date']; }  ?></h2>
<hr>
<h4 align="center">  </h4>
<div class="CSSTableGenerator" >
                <table >
                    <tr>
					<td >
                            Name
                     </td>
                        <td >
                            Date Of Payment
                        </td>
                        <td>
                            Mode Of Payment
                        </td>
						<td>
                            Next Payment Due
                        </td>
						<td>
                            Status
                        </td>
						<td>
                            Course
                        </td>
						<td>
                            Amount
                        </td>
						
						<!--<td> 
						Balance
						</td>-->
                    </tr>
                    <?php  
$balance_sum=0; $total_fee_sum=0; $pay_now_sum=0;
foreach($payment_report as $pay) { 
$duration=Fee::model()->findByPk($pay['course_id'])->duration;
$total_fee_sum=($pay['total_fee']/$duration)+$total_fee_sum;
$pay_now_sum=$pay['pay_now']+$pay_now_sum;
$balance_sum=$pay['balnce']+$balance_sum;

?>
<tr>
<td><?php echo Registration::model()->findByPk($pay['student_id'])->name; ?> </td>
<td><?php echo $pay['payment_date']; ?> </td>
<td><?php echo $pay['mode_of_payment']; ?> </td>
<td><?php echo $pay['payment_due_date']; ?> </td>
<td><?php echo $pay['status']; ?> </td>
<td><?php echo $duration; ?> </td>
<td><?php echo round($pay['total_fee']/$duration); ?> </td>
<!--<td> <?php  //echo $pay['balnce']; ?></td>-->
</tr>

<?php } ?>
      <tr >
<td colspan="6" >  </td>
<td> <?php echo round($total_fee_sum); ?>  </td>
<!--<td style="color:red;"> <?php// echo $balance_sum; ?> </td>-->
</tr>              
                </table>
				
				
            </div>



<style>
.CSSTableGenerator {
	margin:0px;padding:0px;
	width:100%;
	border:1px solid #000000;
	
	-moz-border-radius-bottomleft:14px;
	-webkit-border-bottom-left-radius:14px;
	border-bottom-left-radius:14px;
	
	-moz-border-radius-bottomright:14px;
	-webkit-border-bottom-right-radius:14px;
	border-bottom-right-radius:14px;
	
	-moz-border-radius-topright:14px;
	-webkit-border-top-right-radius:14px;
	border-top-right-radius:14px;
	
	-moz-border-radius-topleft:14px;
	-webkit-border-top-left-radius:14px;
	border-top-left-radius:14px;
}.CSSTableGenerator table{
    border-collapse: collapse;
        border-spacing: 0;
	width:100%;
	height:100%;
	margin:0px;padding:0px;
}.CSSTableGenerator tr:last-child td:last-child {
	-moz-border-radius-bottomright:14px;
	-webkit-border-bottom-right-radius:14px;
	border-bottom-right-radius:14px;
}
.CSSTableGenerator table tr:first-child td:first-child {
	-moz-border-radius-topleft:14px;
	-webkit-border-top-left-radius:14px;
	border-top-left-radius:14px;
}
.CSSTableGenerator table tr:first-child td:last-child {
	-moz-border-radius-topright:14px;
	-webkit-border-top-right-radius:14px;
	border-top-right-radius:14px;
}.CSSTableGenerator tr:last-child td:first-child{
	-moz-border-radius-bottomleft:14px;
	-webkit-border-bottom-left-radius:14px;
	border-bottom-left-radius:14px;
}.CSSTableGenerator tr:hover td{
	background-color:#e5e5e5;
		

}
.CSSTableGenerator td{
	vertical-align:middle;
		background:-o-linear-gradient(bottom, #ffffff 5%, #e5e5e5 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ffffff), color-stop(1, #e5e5e5) ); 
	background:-moz-linear-gradient( center top, #ffffff 5%, #e5e5e5 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#ffffff", endColorstr="#e5e5e5");	background: -o-linear-gradient(top,#ffffff,e5e5e5);

	background-color:#ffffff;

	border:1px solid #000000;
	border-width:0px 1px 1px 0px;
	text-align:left;
	padding:7px;
	font-size:15px;
	font-family:Arial;
	font-weight:normal;
	color:#000000;
}.CSSTableGenerator tr:last-child td{
	border-width:0px 1px 0px 0px;
}.CSSTableGenerator tr td:last-child{
	border-width:0px 0px 1px 0px;
}.CSSTableGenerator tr:last-child td:last-child{
	border-width:0px 0px 0px 0px;
}
.CSSTableGenerator tr:first-child td{
		background:-o-linear-gradient(bottom, #cccccc 5%, #b2b2b2 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #cccccc), color-stop(1, #b2b2b2) );
	background:-moz-linear-gradient( center top, #cccccc 5%, #b2b2b2 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#cccccc", endColorstr="#b2b2b2");	background: -o-linear-gradient(top,#cccccc,b2b2b2);

	background-color:#cccccc;
	border:0px solid #000000;
	text-align:center;
	border-width:0px 0px 1px 1px;
	font-size:14px;
	font-family:Arial;
	font-weight:bold;
	color:#000000;
}
.CSSTableGenerator tr:first-child:hover td{
	background:-o-linear-gradient(bottom, #cccccc 5%, #b2b2b2 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #cccccc), color-stop(1, #b2b2b2) );
	background:-moz-linear-gradient( center top, #cccccc 5%, #b2b2b2 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#cccccc", endColorstr="#b2b2b2");	background: -o-linear-gradient(top,#cccccc,b2b2b2);

	background-color:#cccccc;
}
.CSSTableGenerator tr:first-child td:first-child{
	border-width:0px 0px 1px 0px;
}
.CSSTableGenerator tr:first-child td:last-child{
	border-width:0px 0px 1px 1px;
}
</style>
