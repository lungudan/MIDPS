<?php 
$rezult = "";
class calculator
{
    var $a;
    var $b;

    function operatie($oprator)
    {
        switch($oprator)
        {
            case '+':
            return $this->a + $this->b;
            break;

            case '-':
            return $this->a - $this->b;
            break;

            case '*':
            return $this->a * $this->b;
            break;

            case '/':
            return $this->a / $this->b;
            break;
                
            case 'sqrt':
            return sqrt($this->a);
            break;
            
            case '^':
            return pow($this->a, $this->b);
            break;

            default:
            return "Error";
        }   
    }
    function rezultat_1($a, $c)
    {
        $this->a = $a;
        return $this->operatie($c);
    }
	function rezultat_2($a, $b, $c)
    {
        $this->a = $a;
        $this->b = $b;
        return $this->operatie($c);
    }
}

$ca = new calculator();
if(isset($_POST['submit']))
{   
if(isset($_POST['nr2'])== NULL)
{
    $rezult = $ca->rezultat_1($_POST['nr1'],$_POST['operatie']);
}else{
	$rezult = $ca->rezultat_2($_POST['nr1'],$_POST['nr2'],$_POST['operatie']);
}
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
<style type="text/css">

.box {
    border: 5px solid #434343;
    background: gray;
    padding: 10px;
    display: block;
    width: 18%;
    position: absolute;
    left: 50%;
    right: 50%;
    transform: translate3d(-50%, 50%, 0);  
    border-radius: 5px;
}
input[type=button], input[type=reset], input[type=submit] 
{ 
background: -webkit-linear-gradient(left, #000000 ,#434343); /* For Safari 5.1 to 6.0 */
background: -o-linear-gradient(right,#000000 ,#434343); /* For Opera 11.1 to 12.0 */
background: -moz-linear-gradient(right,#000000 ,#434343); /* For Firefox 3.6 to 15 */
background: linear-gradient(to right, #000000 ,#434343); /* Standard syntax */ 
border: none; color: white; padding: 14px 30px; text-decoration: none; margin: 4px 2px; cursor: pointer; positon: relative;border-radius: 10px;display: block;}
input[type=button], input[type=reset], input[type=submit]:hover
{ 
background: -webkit-linear-gradient(left, #434343 ,#000000); /* For Safari 5.1 to 6.0 */
background: -o-linear-gradient(right,  #434343 ,#000000); /* For Opera 11.1 to 12.0 */
background: -moz-linear-gradient(right, #434343 ,#000000); /* For Firefox 3.6 to 15 */
background: linear-gradient(to right,  #434343 ,#000000); /* Standard syntax */ 
border: none; color: white; padding: 14px 30px; text-decoration: none; margin: 4px 2px; cursor: pointer; positon: relative;border-radius: 10px;display: block;}
input[type=number], input[type=text]{
    border:1px solid #434343;
    width: 100%;
    height: 10px;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border-radius: 5px;
    display: block;
}

.rezultat {
positon: relative;
width:100px;

}
.sub{
positon: relative;    
left: 50px;
}
td {
color: white;  

font-size: 16px;
}

</style>
<script>
  function maxLengthCheck(object) {
    if (object.value.length > object.max.length)
      object.value = object.value.slice(0, object.max.length)
  }
  
</script>
 <script src="http://code.jquery.com/jquery-1.9.1.js"></script>     
</head>

<form method="post">
    <div class="box">
<table align="center">
    
    <tr>
        <td>Nr.1</td>
        <td><input type="number" name="nr1" placeholder="Numarul 1.." autocomplete='off' oninput="maxLengthCheck(this)"  min = "1" max = "9999999999" required></td>
    </tr>

    <tr>
        <td>Nr.2</td>
        <td><input type="number" id="nr2" name="nr2" placeholder="Numarul 2.." autocomplete='off' oninput="maxLengthCheck(this)" min = "1" max = "9999999999" required></td>
    </tr>

    <tr>
        <td>Operatia</td>
        <td><select id="operatie" name="operatie">
            <option value="+">   +   </option>
            <option value="-">   -   </option>
            <option value="*">   *   </option>
            <option value="/">   /   </option>
            <option value="sqrt">   sqrt   </option>
            <option value="^">   ^   </option>
        </select></td>
        
    </tr>
	<script>
  $('#operatie').change(function(e){
  if ($('#operatie').val() == 'sqrt'){
   $('#nr2').css('display','none');
   $("#nr2").prop('required',false);
  }else{
    $('#nr2').show();
	$("#nr1").prop('required',true);
	$("#nr2").prop('required',true);
  }
});
</script>
<tr><td>Rezultat</td><td><input readonly type="text" value="<?php echo $rezult; ?>" placeholder="Rezultat..."></td></tr>
<tr><td><input type="submit" name="submit" value="   =   "></td>
<td><input type="reset" value="Reset"></td></tr>
</table>
</div>
</form>
