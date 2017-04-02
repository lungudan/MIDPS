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
                
            case '√':
            return sqrt($this->a);
            break;
            
            case '^':
            return pow($this->a, $this->b);
            break;

            default:
            return "Error";
        }   
    }
    function rezultat($a, $b, $c)
    {
        $this->a = $a;
        $this->b = $b;
        return $this->operatie($c);
    }
}

$ca = new calculator();
if(isset($_POST['submit']))
{   
    $rezult = $ca->rezultat($_POST['nr1'],$_POST['nr2'],$_POST['operatie']);
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
input[type=button], input[type=reset], input[type=submit] { background-color: #065896; border: none; color: white; padding: 16px 32px; text-decoration: none; margin: 4px 2px; cursor: pointer; positon: relative;}
input[type=number], input[type=text]{
    width: 100%;
    height: 10px;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
}

.rezultat {
positon: relative;
width:100px;

}
.sub{
positon: relative;    
left: 50px;
}
</style>
<form method="post">
<table align="center">
    
    <tr>
        <td>Nr.1</td>
        <td><input type="number" name="nr1" placeholder="Numarul 1.." autocomplete='off' required></td>
    </tr>

    <tr>
        <td>Nr.2</td>
        <td><input type="number" name="nr2" placeholder="Numarul 2.." autocomplete='off' required></td>
    </tr>

    <tr>
        <td>Operatia</td>
        <td><select name="operatie">
            <option value="+">   +   </option>
            <option value="-">   -   </option>
            <option value="*">   *   </option>
            <option value="/">   /   </option>
            <option value="√">   √   </option>
            <option value="^">   ^   </option>
        </select></td>
      
    </tr>
<tr><td>Rezultat</td><td><input readonly type="text" value="<?php echo $rezult; ?>" placeholder="Rezultat..."></td></tr>
<tr><td><input type="submit" name="submit" value="   =   "></td>
<td><input type="reset" value="Reset"></td></tr>
</table>
</form>
