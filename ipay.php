<?php 
$fields = array("live"=> "0",
                "oid"=> "$oid",
                "inv"=> "$inv",
                "ttl"=> "$ttl",
                "tel"=> "$tel",
                "eml"=> "$eml",
                "vid"=> "savekakitu",
                "curr"=> "KES",
                "p1"=> "",
                "p2"=> "",
                "p3"=> "",
                "p4"=> "",
                "cbk"=> "localhost/sinai/ipaycheck.php",
                "cst"=> "0",
                "crl"=> "0"
                );

$datastring =  $fields['live'].$fields['oid'].$fields['inv'].$fields['ttl'].$fields['tel'].$fields['eml'].$fields['vid'].$fields['curr'].$fields['p1'].$fields['p2'].$fields['p3'].$fields['p4'].$fields['cbk'].$fields['cst'].$fields['crl'];
$hashkey ="Sa54KA458hgds5479TU";//use "demo" for testing where vid also is set to "demo"

$generated_hash = hash_hmac('sha1',$datastring , $hashkey);

?>

<div class="payform-hide">
   <form method="post" action="https://payments.ipayafrica.com/v3/ke" style="display: none;">

<?php 
 foreach ($fields as $key => $value) {
      echo $key;
     echo '&nbsp;:<input name="'.$key.'" type="text" value="'.$value.'"></br>';
 }
?>hsh:&nbsp;<input name="hsh" type="text" value="<?php echo $generated_hash ?>" ></td>
</div>
<button type="submit" id="book-button">PROCEED TO BOOK</button>
</form>